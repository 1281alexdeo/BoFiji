<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class UserController extends Controller
{
    public  function index(){
        return view('frontend.index');
    }

    public function getProfile(){
        return view('frontend.user.profile');
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
            'suburb' => 'required'
        ]);

        $address = new Address([
            'street_name' => $request['street'],
            'house_number' => $request['houseNumber'],
            'town' => $request['town'],
            'suburb' => $request['suburb']
            ]);
        $address->save();

        $user = new User([
            'first_name' => $request['firstName'],
            'last_name' => $request['lastName'],
            'gender' => $request['gender'],
            'marital_status' => $request['marriedStatus'],
            'tin_number' => $request['tinNumber'],
            'occupation' => $request['occupation'],
            'email' => $request['email'],
            'phone' => $request['phone']
        ]);
        $address->user()->save($user);

        return redirect()->route('user.profile')->with([
            'success' => $request['firstName'] . ' '. $request['lastName']. ' successfully registered.'
        ]);
    }
}
