<?php

/**
 * Created by PhpStorm.
 * User: stc615
 * Date: 06/02/18
 * Time: 18:39
 */
class WishListData
{
    //created protected fields which are then assigned values from the database
    public $WishListID, $WishImage, $ProductName, $ProductPrice, $ProductCondition, $ProductExpiry,$ProductSellerName, $ProductSellerEmail, $ProductSellerAddress;

    public function __construct($dbRow) {
        //the variable wish list id is given the value from which was stored in the database
        $this->WishListID = $dbRow['WishListID'];
        //the variable product name is given the value from which was stored in the database
        $this->ProductName = $dbRow['ProductName'];
        //the variable product price is given the value from which was stored in the database
        $this->ProductPrice = $dbRow['ProductPrice'];
        //the variable product condition is given the value from which was stored in the database
        $this->ProductCondition = $dbRow['ProductCondition'];
        //the variable product expiry is given the value from which was stored in the database
        $this->ProductExpiry = $dbRow['ProductExpiry'];
        //the variable seller name is given the value from which was stored in the database
        $this->ProductSellerName = $dbRow['ProductSellerName'];
        //the variable product seller email  is given the value from which was stored in the database
        $this->ProductSellerEmail = $dbRow['ProductSellerEmail'];
        //the variable product seller address is given the value from which was stored in the database
        $this->ProductSellerAddress = $dbRow['ProductSellerAddress'];
        //the variable wish list image is given the value from which was stored in the database
        $this->WishImage = $dbRow['WishImage'];
    }
    //a getter function which can be called to retrieve the value
    public function getWishListID() {
        //return the value wish list id
        return $this->WishListID;
    }
    //a getter function which can be called to retrieve the value
    public function getProductName() {
        //return the value product name
        return $this->ProductName;
    }
    //a getter function which can be called to retrieve the value
    public function getWishImage() {
        //return the value wish image
        return $this->WishImage;
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
    public function getProductSellerName() {
        //return the value product seller name
        return $this->ProductSellerName;
    }
    //a getter function which can be called to retrieve the value
    public function getProductSellerEmail() {
        //return the value product seller email
        return $this->ProductSellerEmail;
    }
    //a getter function which can be called to retrieve the value
    public function getProductSellerAddress() {
        //return the value product seller address
        return $this->ProductSellerAddress;
    }


}