<?php
/**
 * Created by PhpStorm.
 * User: Ro
 * Date: 07-Aug-17
 * Time: 7:42 PM
 */
namespace App;

Class CustomAddress{

    public $houseNumber = null;
    public $streetName = null;
    public $suburb = null;
    public $town = null;

    public function __construct($house_num, $street, $suburb, $town)
    {
        $this->houseNumber = $house_num;
        $this->streetName = $street;
        $this->suburb = $suburb;
        $this->town = $town;
    }

    public function getHouseNumber(){
        return $this->houseNumber;
    }

    public function getStreetName(){
        return $this->streetName;
    }

    public function getSuburb(){
        return $this->suburb;
    }

    public function getTown(){
        return $this->town;
    }
}