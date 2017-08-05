<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'address_id','first_name','last_name', 'gender', 'marital_status','tin_number', 'occupation', 'email','phone', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function address(){
        return $this->belongsTo('App\Address');
    }

    public function account(){
        return $this->belongsTo('App\Account');
    }
}
