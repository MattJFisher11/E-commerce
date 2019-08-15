<?php

/**
 * Created by PhpStorm.
 * User: stc615
 * Date: 12/12/17
 * Time: 14:44
 */
class AddData
{
    //created protected fields which are then assigned values from the database
    public $AddID, $ProductName, $ProductPrice, $ProductCondition, $ProductExpiry,$AdvertImage, $Name, $EmailAddress, $Address, $Mobile;

    public function __construct($dbRow) {
        //the variable add id is given the value from which was stored in the database
        $this->AddID = $dbRow['AddID'];
        //the variable product name is given the value from which was stored in the database
        $this->ProductName = $dbRow['ProductName'];
        //the variable product price is given the value from which was stored in the database
        $this->ProductPrice = $dbRow['ProductPrice'];
        //the variable product condition is given the value from which was stored in the database
        $this->ProductCondition = $dbRow['ProductCondition'];
        //the variable Product Expiry is given the value from which was stored in the database
        $this->ProductExpiry = $dbRow['ProductExpiry'];
        //the variable advert image is given the value from which was stored in the database
        $this->AdvertImage = $dbRow['AdvertImage'];
        //the variable name is given the value from which was stored in the database
        $this->Name = $dbRow['FirstName'];
        //the variable email address is given the value from which was stored in the database
        $this->EmailAddress = $dbRow['EmailAddress'];
        //the variable address is given the value from which was stored in the database
        $this->Address = $dbRow['Address'];
        //the variable mobile is given the value from which was stored in the database
        $this->Mobile = $dbRow['Mobile'];
    }
    //a getter function which can be called to retrieve the value
    public function getAddID() {
        //return the value addid
        return $this->AddID;
    }
    //a getter function which can be called to retrieve the value
    public function getProductName() {
        //return the value product name
        return $this->ProductName;
    }
    //a getter function which can be called to retrieve the value
    public function getProductPrice() {
        //return the value product price
        return $this->ProductPrice;
    }
    //a getter function which can be called to retrieve the value
    public function getProductCondition() {
        //return the value product condition
        return $this->ProductCondition;
    }
    //a getter function which can be called to retrieve the value
    public function getProductExpiry() {
        //return the value product expiry
        return $this->ProductExpiry;
    }
    //a getter function which can be called to retrieve the value
    public function getName() {
        //return the value name
        return $this->Name;
    }
    //a getter function which can be called to retrieve the value
    public function getEmailAddress() {
        //return the value email address
        return $this->EmailAddress;
    }
    //a getter function which can be called to retrieve the value
    public function getAddress() {
        //return the value address
        return $this->Address;
    }
    //a getter function which can be called to retrieve the value
    public function getImage() {
        //return the value image
        return $this->AdvertImage;
    }
    //a getter function which can be called to retrieve the value
    public function getMobileNumberSeller() {
        return $this->Mobile;
        //return the value mobile
    }
}