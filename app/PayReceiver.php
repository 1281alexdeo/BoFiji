<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayReceiver extends Model
{
    protected $fillable = ['name', 'account_number', 'amount', 'description'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
