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
                'transID' => Str::random(5),
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

    public function getCheckout(){
        //get checkout amount from session
        $send_total = Session::has('receiver_amount') ? Session::get('receiver_amount') : null;
        //concatenate with prefix 00
        $total_amount = $send_total.'.00';
        $user = Session::has('user') ? Session::get('user') : null;
        //send the amount to view
        return view('frontend.payment.checkout', ['total' => $total_amount, 'user' => $user]);
    }

    public function getSchedulePay(){
        if(Session::has('user')){
            $user = Session::get('user');
            return view('frontend.payment.schedule', ['user' => $user]);
        }

        return redirect()->route('home');
    }
}
