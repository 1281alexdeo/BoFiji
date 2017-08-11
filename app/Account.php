<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['account_number', 'fnpf_number', 'firc_id', 'account_type', 'debit_card_number', 'branch', 'balance'];

    public function user(){
        return $this->hasOne('App\User');
    }
}
