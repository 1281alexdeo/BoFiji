<?php

namespace App\Http\Controllers;

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
            //store data in session
            $request->session()->put([
                'receiver' => $request['receiver_name'],
                'receiver_account' => $request['receiver_account_number'],
                'receiver_amount' => $request['amount'],
                'description' => $request['description']
            ]);
            return redirect()->route('checkout');
        }

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

    public function postCheckout(Request $request){
        $this->validate($request,[
           'name' => 'required',
           'card-name' => 'required',
            'card-expiry-month' => 'required',
            'card-expiry-year' => 'required',
            'card-cvc' => 'required'
        ]);

        if(Session::has('receiver')){

                $receiverName =Session::get('receiver');
                $receiverAccount = Session::get('receiver_account');
                $receiverAmount = Session::get('receiver_amount');
                $receiverDescription = Session::get('description');

                $user_id = Session::get('id');
                $user = User::find($user_id);

                $receiver = new PayReceiver([
                    'name' => $receiverName,
                    'account_number' => $receiverAccount,
                    'amount' => $receiverAmount,
                    'description' => $receiverDescription
                ]);
                $user->payReceiver()->save($receiver);
                $concatAmount = $receiverAmount.'.00';

                $userData = ['email' => $user->email, 'name' =>$user->first_name];

//                $contentData = [
//                    'title' => 'Your money transfer was successful',
//                    'content' => 'CHECKOUT AMOUNT : $' . $receiverAmount . '.00. TO : '. $receiverName .'.'
//                ];

                $contentData = [
                    'transID' => Str::random(5),
                    'receiverName' => $receiverName,
                    'amount' => $receiverAmount,
                    'description' => $receiverDescription
                ];

                //send the email
                Mail::send('email.paymentNotification', $contentData, function($message) use($userData){
                    $message->to($userData['email'], $userData['name'])->subject('BoF Transaction Summary');
                });

                //send text message
//                Nexmo::message()->send([
//                    'to' => '6797221422',
//                    'from' => 'Bank of Fiji',
//                    'text' => 'Successfully send a message'
//                ]);

                return redirect()->route('user.profile',$user_id)->with(['success' => 'Successfully transferred $'.$concatAmount]);
        }

        //if fail redirect to pay now page
        return redirect()->route('pay.now')->with(['fail' => 'Check your card details']);
    }

    public function getSchedulePay(){
        if(Session::has('user')){
            $user = Session::get('user');
            return view('frontend.payment.schedule', ['user' => $user]);
        }

        return redirect()->route('home');
    }
}
