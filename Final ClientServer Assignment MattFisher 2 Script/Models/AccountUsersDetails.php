<?php

class AccountUsersDetails
{
    //created protected fields which are then assigned values from the database
    public $FirstName, $LastName, $EmailAddress, $Address,$DateOfBirth, $Password, $Mobile;

    public function __construct($dbRow) {

        //the variable first name is given the value from which was stored in the database
        $this->FirstName = $dbRow['FirstName'];
        //the variable last name is given the value from which was stored in the database
        $this->LastName = $dbRow['LastName'];
        //the variable email Address is given the value from which was stored in the database
        $this->EmailAddress = $dbRow['EmailAddress'];
        //the variable Address is given the value from which was stored in the database
        $this->Address = $dbRow['Address'];
        //the variable Mobile is given the value from which was stored in the database
        $this->Mobile = $dbRow['Mobile'];
        //the variable Date Of Birth is given the value from which was stored in the database
        $this->DateOfBirth = $dbRow['DateOfBirth'];
        //the variable password is given the value from which was stored in the database
        $this->Password = $dbRow['Password'];
    }
    //a getter function which can be called to retrieve the value
    public function getFirstName() {
        //return the value first name
        return $this->FirstName;
    }
    //a getter function which can be called to retrieve the value
    public function getLastName() {
        //return the value last name
        return $this->LastName;
    }
    //a getter function which can be called to retrieve the value
    public function getEmailAddress() {
        //return the value email address
        return $this->EmailAddress;
    }
    //a getter function which can be called to retrieve the value
    public function getAddress() {
        //return the value first name
        return $this->Address;
    }
    //a getter function which can be called to retrieve the value
    public function getDateOfBirth() {
        //return the value first name
        return $this->DateOfBirth;
    }
    //a getter function which can be called to retrieve the value
    public function getMobileNumber() {
        //return the value first name
        return $this->Mobile;
    }
    //a getter function which can be called to retrieve the value
    public function getPassword() {
        //return the value first name
        return $this->Password;
}

}