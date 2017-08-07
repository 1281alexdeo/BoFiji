<?php

namespace App\Http\Controllers;

use App\Account;
use App\Address;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public  function index(Request $request, $id = null){
        if(Session::has('id')){
            $id = Session::get('id');
            $user = User::find($id);
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
            $request->session()->put('id',$user->id);
            return redirect()->route('user.profile',['id' => $user->id]);
        }
        return redirect()->back()->with(['fail' => 'Check your email or password']);
    }

    public function signout(){
        Auth::logout();

        return redirect()->route('home');
    }

    public function getProfile($id){
        $user = User::find($id);
        return view('frontend.user.profile',['user' => $user]);//errors with this method and related routes
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
            'debitCardNumber' => 'required',
            'branch' => 'required'
        ]);

        $input = $request->all();
        $userImage = null;

        if($photo = $request->file('photo')){
            $photoName = time() .'_'. $photo->getClientOriginalName();
            $photo->move('profileImage', $photoName);
            $userImage = UserPhoto::create(['profile_photo' => $photoName]);
            $input['photo'] = $userImage->id;
        }//check for uploaded photo


        $address = new Address([
            'street_name' => $request['street'],
            'house_number' => $request['houseNumber'],
            'town' => $request['town'],
            'suburb' => $request['suburb']
            ]);
        $address->save();

        $account = new Account([
            'account_number' => $request['accountNumber'],
            'fnpf_number' => $request['fnpfNumber'],
            'firc_id' => $request['fircID'],
            'account_type' => $request['accountType'],
            'debit_card_number' => $request['debitCardNumber'],
            'branch' => $request['branch'],
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

        return redirect()->route('user.signin')->with([
            'success' => $request['firstName'] . ' '. $request['lastName']. ' successfully registered.'
        ]);
    }
}
