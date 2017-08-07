<?php
/**
 * Created by PhpStorm.
 * User: Ro
 * Date: 07-Aug-17
 * Time: 7:57 PM
 */

namespace App\Custom;


class CustomAccount
{
    public $accountNumber = null;
    public $fnpfNumber = null;
    public $fircID = null;
    public $accountType = null;
    public $debitCardNumber = null;
    public $branch = null;

    public function __construct($acc_num, $fnpf_num, $firc_id, $acc_type, $deb_card_num, $branch)
    {
        $this->accountNumber = $acc_num;
        $this->fnpfNumber = $fnpf_num;
        $this->fircID = $firc_id;
        $this->accountType = $acc_type;
        $this->debitCardNumber = $deb_card_num;
        $this->branch = $branch;
    }

}