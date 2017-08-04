<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['house_number', 'street_name', 'town', 'suburb'];

    public  function user(){
        return $this->hasOne('App\User');
    }
}
