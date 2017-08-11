<?php

namespace App\Http\Controllers;

use App\Account;
use App\Address;
use App\PayReceiver;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Khill\Lavacharts\Charts\Chart;

class UserController extends Controller
{
    public $storeAddress;
    public $storedAccount;
    public $storeUser;


    public  function index(Request $request, $id = null){
            if(Session::has('user')){
                $user = Session::get('user');
                return view('frontend.index', ['user' => $user]);
            }

        return view('frontend.index');
    }

    public function getSignin(){
        return view('frontend.user.signin');
    }

    public function postSignin(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            $user = User::where(['email' => $request['email']])->first();
            $request->session()->put(['id' => $user->id,'user' => $user]);//put user in session
            return redirect()->route('user.profile',['id' => $user->id]);
        }
        return redirect()->back()->with(['fail' => 'Check your email or password']);
    }

    public function signout(Request $request){
        Session::flush();
        Cache::flush();
        Auth::logout();
        return redirect()->route('home');
    }

    public function getProfile($id){
        $user = User::find($id);
        $paymenthistory = PayReceiver::where('user_id',$id)->orderBy('created_at', 'desc')->paginate(5);
        $totalPay = PayReceiver::where('user_id', $id)->count();

        //charts

            //to be created later link to follow =>
                //https://www.youtube.com/watch?annotation_id=annotation_2861041605&feature=iv&src_vid=IEhZTcpbknA&v=KrAvrU2XYuY

        //charts end

        return view('frontend.user.profile',['user' => $user, 'payhistory' => $paymenthistory, 'totalPay' => $totalPay]);
    }

    public function postProfile($id){
        $user = User::find($id);
        return view('frontend.user.profile',['user' => $user]);
    }

    public function getRegister(){

        return view('frontend.user.addUser');
    }

    public function postRegister(Request $request){

        $this->validate($request, [
            'firstName' => 'required|alpha',
            'lastName' => 'required|alpha',
            'gender' => 'required',
            'marriedStatus' => 'required',
            'tinNumber' => 'required',
            'occupation' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric',
            'houseNumber' => 'required',
            'street' => 'required',
            'town' => 'required',
            'suburb' => 'required',
            'accountNumber' => 'required',
            'fnpfNumber' => 'required',
            'fircID' => 'required',
            'accountType' => 'required',
            'debitCardNumber' => 'required',//still do not know if this one is required
            'branch' => 'required'
        ]);


        //send email to user
        $this->sendEmail($request);
        return redirect()->route('email.verification');
    }


    public function getEmailVerification(){
        return view('email.verification');
    }

    public function sendEmail(Request $request){
        $data = [
            'title' => 'Thank you for banking with us.',
            'content' => 'Your password is: \'test_pw\'. Use it to login by clicking the link '
        ];

        $user = ['email' => $request['email'], 'name' => $request['firstName']];

        //send email for verification and password delivery to right recipient
        $mail = Mail::send('email.test',$data,function($message) use($user){
            $message->to($user['email'], $user['name'])->subject('Account Activation');

        });

        $token = Str::random(40);
        $request->session()->put('token', $token);//token to be compared later during verification

        if(count(Mail::failures()) > 0){    //if user fail. redirect to register page with error msg.
            return redirect()->route('user.register')->with(['fail' => 'Fail to send verification code. Use legit email']);
        }

        $this->registerUser($request);//assuming email has been successfully sent. thus register user.
    }

    public function emailResponse(){
        if(Session::has('token')){
            return redirect()
                ->route('user.signin')
                ->with(['success' => 'Successfully registered. Login with your credentials']);
        }

        //redirect with error if token expire.
        return redirect()->route('user.register')->with(['fail'=>'Your registration token has expired. Register again']);
    }

    public function registerUser(Request $request){

        $address = new Address([
            'street_name' => $request['street'],
            'house_number' => $request['houseNumber'],
            'town' => $request['town'],
            'suburb' => $request['suburb']
        ]);
        $address->save();

        $defaultBalance = 10000;
        $account = new Account([
            'account_number' => $request['accountNumber'],
            'fnpf_number' => $request['fnpfNumber'],
            'firc_id' => $request['fircID'],
            'account_type' => $request['accountType'],
            'debit_card_number' => $request['debitCardNumber'],
            'branch' => $request['branch'],
            'balance' => $defaultBalance
        ]);
        $account->save();

        $user = new User([
            'first_name' => $request['firstName'],
            'last_name' => $request['lastName'],
            'gender' => $request['gender'],
            'marital_status' => $request['marriedStatus'],
            'tin_number' => $request['tinNumber'],
            'occupation' => $request['occupation'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => bcrypt('test_pw')
        ]);
        $address->user()->save($user);
        $account->user()->save($user);

    /*    return redirect()->route('user.signin')->with([  //no redirect since user will check his/her email for password
            'success' => $request['firstName'] . ' '. $request['lastName']. ' successfully registered.'
        ]);*/

    }

}
