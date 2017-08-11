<?php

namespace App\Http\Controllers;

use App\Account;
use App\PayReceiver;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Nexmo\Laravel\Facade\Nexmo;

class PaymentController extends Controller
{
    public function getPayNow(){
        $user = Session::has('user') ? Session::get('user') : null;

        return view('frontend.payment.create', ['user' => $user]);
    }

    public function postPayNow(Request $request){

        $this->validate($request,[
            'receiver_name' => 'required',
            'receiver_account_number' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ]);

        if(!is_null($request['amount'])){

            $user_id = Session::has('id') ? Session::get('id') : null;//retrieve user id from session

            $user = User::where('id', $user_id)->first(); //get user details from db

                //check if amount is > $1000
                if($request['amount'] > 1000){

                    //get user name and email for emailing
                    $userData = ['email' => $user->email, 'name' =>$user->first_name];

                    $concatAmount = '$'.$request['amount'].'.00';

                    $token = $token = Str::random(40);

                    //store token to User Table
                    $user->token = $token;
                    $user->save();

                    //prepare data for emailing
                    $contentData = [
                        'token' => $token,
                        'transID' => rand(0,1000000),
                        'email' => $userData['email'],
                        'recipientName' => $request['receiver_name'],
                        'senderName' => $userData['name'],
                        'amount' => $concatAmount,
                        'description' => $request['description']
                    ];

                    //send the email
                    Mail::send('email.payExceedMax', $contentData, function($message) use($userData){
                        $message->to($userData['email'], $userData['name'])->subject('Confirm Transaction');
                    });

                    //put data into session to be manipulated in postPaymentExceed Method
                    $request->session()->put([
                        'exceedPayName' => $request['receiver_name'],
                        'exceedPayAccNum' => $request['receiver_account_number'],
                        'exceedPayAmount' => $request['amount'],
                        'exceedPayDescription' => $request['description']
                    ]);

                    return redirect()->route('payExceed.Confirmation');
                }


            $userAccount = Account::where('id', $user->account_id)->first();//get related account info

            $receiver = new PayReceiver([
                'name' => $request['receiver_name'],
                'account_number' => $request['receiver_account_number'],
                'amount' => $request['amount'],
                'description' => $request['description']
            ]);
            $user->payReceiver()->save($receiver);//create payReceive Table
            $userAccount->balance -= $request['amount'];//deduct pay amount from user balance
            $userAccount->save();


            //get user name and email for emailing
            $userData = ['email' => $user->email, 'name' =>$user->first_name];

            //prepare data for emailing
            $contentData = [
                'transID' => rand(0,1000000),
                'receiverName' => $request['receiver_name'],
                'amount' => $request['amount'],
                'description' => $request['description']
            ];


            //send the email
            Mail::send('email.paymentNotification', $contentData, function($message) use($userData){
                $message->to($userData['email'], $userData['name'])->subject('BoF Transaction Summary');
            });

            //redirect back to user profile with success message
            return redirect()->route('user.profile',$user_id)->with(['success' => 'Successfully transferred $'.$request['amount']]);
        }

        //redirect back to where user came from
        return redirect()->back()->with(['fail' => 'Check your input data']);
    }

    public function getPaymentExceed(){
        $id = Session::has('id') ? Session::get('id') : null;
        $user = User::where('id', $id)->first();

        return view('email.payExceedCheck',['user' => $user, 'id' => $id]);
    }

    public function postPaymentExceed($email, $token){      //user redirect here after click confirm from email

        //get data from session

        $user_id = Session::has('id') ? Session::get('id') : null;
        $name = Session::has('exceedPayName') ? Session::get('exceedPayName') : null;
        $accountNum = Session::has('exceedPayAccNum') ? Session::get('exceedPayAccNum') : null;
        $amount = Session::has('exceedPayAmount') ? Session::get('exceedPayAmount') : null;
        $description = Session::has('exceedPayDescription') ? Session::get('exceedPayDescription') : null;

        //check if token matches with token in db
        $user = User::where(['token' => $token, 'email' => $email])->first();
        if($user){

            //deduct amount from user account
            $account = Account::where('id' ,$user->account_id)->first();
            $account->balance -= $amount;
            $account->save();

                //remove token from user table....
            $user->token = null;
            $user->save();

            //transfer amount to receiver's account...
            $receiver = new PayReceiver([
                'name' => $name,
                'account_number' => $accountNum,
                'amount' => $amount,
                'description' => $description
            ]);
            $user->payReceiver()->save($receiver);

            return redirect()->route('user.profile',$user_id)->with(['success' => 'Successfully transferred $'.$amount]);
        }else{

            return "Sorry payment for this transaction has already been made";
        }


    }

    public function getSchedulePay(){
        if(Session::has('user')){
            $user = Session::get('user');
            return view('frontend.payment.schedule', ['user' => $user]);
        }

        return redirect()->route('home');
    }
}
