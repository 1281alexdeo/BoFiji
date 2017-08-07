<?php

namespace App\Http\Controllers;

use App\PayReceiver;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function getPayNow(){
        return view('frontend.payment.create');
    }

    public function postPayNow(Request $request){

        $this->validate($request,[
            'receiver_name' => 'required',
            'receiver_account_number' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ]);

        if(!is_null($request['amount'])){
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

        $send_total = Session::has('receiver_amount') ? Session::get('receiver_amount') : null;
        $total_amount = $send_total.'.00';
        return view('frontend.payment.checkout', ['total' => $total_amount]);
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
                return redirect()->route('user.profile',$user_id)->with(['success' => 'Successfully transferred $'.$concatAmount]);
        }




        return redirect()->route('pay.now')->with(['fail' => 'Check your card details']);
    }
}
