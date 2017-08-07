<?php
/**
 * Created by PhpStorm.
 * User: Ro
 * Date: 07-Aug-17
 * Time: 8:02 PM
 */

namespace App\Custom;


class CustomUser
{
    public $firstName = null;
    public $lastName = null;
    public $gender = null;
    public $maritalStatus = null;
    public $tinNumber = null;
    public $occupation = null;
    public $email = null;
    public $phone = null;

    public function __construct($fName, $lName, $gender, $mStatus, $tNumber, $occup, $email, $phone)
    {
        $this->firstName = $fName;
        $this->lastName = $lName;
        $this->gender = $gender;
        $this->maritalStatus = $mStatus;
        $this->tinNumber = $tNumber;
        $this->occupation = $occup;
        $this->email = $email;
        $this->phone = $phone;
    }

}