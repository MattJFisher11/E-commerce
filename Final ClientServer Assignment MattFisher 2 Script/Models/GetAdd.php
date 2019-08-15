<?php

require_once ('Database.php');
require_once ('AddData.php');
require_once ('WishListData.php');

class GetAdd
{
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllAdds()
    {
        //query for the database
        $sqlQuery = 'Select Advert.AddID, Advert.ProductName, Advert.ProductPrice,Advert.ProductExpiry,Advert.ProductCondition, Advert.AdvertImage , Users.FirstName, Users.EmailAddress, Users.Address, Users.Mobile
        from Advert
        inner Join Users on Users.EmailAddress = Advert.EmailAddress';
        //pass the query to the databse handler which will query the databse
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //execute query
        $statement->execute(); // execute the PDO statement
        //creates
        $dataSet = [];
        //pass all results to data set
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $dataSet[] = new AddData($row);
            //print_r($dataSet);
        }
        return $dataSet;
    }

    public function LowToHigh()
    {
        //query for the database
        $sqlQuery = 'Select Advert.AddID, Advert.ProductName, Advert.ProductPrice,Advert.ProductExpiry,Advert.ProductCondition, Advert.AdvertImage , Users.FirstName, Users.EmailAddress, Users.Address, Users.Mobile
        from Advert
        inner Join Users on Users.EmailAddress = Advert.EmailAddress ORDER BY ProductPrice ASC';
        //pass to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //execute query
        $statement->execute(); // execute the PDO statement
        $dataSet = [];
        //pass all results to data set
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $dataSet[] = new AddData($row);
        }
        return $dataSet;
    }

    public function HighToLow()
    {
        //query for the database
        $sqlQuery = 'Select Advert.AddID, Advert.ProductName, Advert.ProductPrice,Advert.ProductExpiry,Advert.ProductCondition, Advert.AdvertImage , Users.FirstName, Users.EmailAddress, Users.Address, Users.Mobile
        from Advert
        inner Join Users on Users.EmailAddress = Advert.EmailAddress ORDER BY ProductPrice DESC';
        //pass to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //execute query
        $statement->execute(); // execute the PDO statement
        $dataSet = [];
        //pass all results to data set
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $dataSet[] = new AddData($row);
        }
        return $dataSet;
    }
    public function ProductNameAZ()
    {
        //query for the database
        $sqlQuery = 'Select Advert.AddID, Advert.ProductName, Advert.ProductPrice,Advert.ProductExpiry,Advert.ProductCondition, Advert.AdvertImage , Users.FirstName, Users.EmailAddress, Users.Address, Users.Mobile
        from Advert
        inner Join Users on Users.EmailAddress = Advert.EmailAddress ORDER BY ProductName ASC';
        //pass to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //execute query
        $statement->execute(); // execute the PDO statement
        $dataSet = [];
        //pass all results to data set
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $dataSet[] = new AddData($row);
        }
        return $dataSet;
    }

    public function ProductNameZA()
    {
        //query for the database
        $sqlQuery = 'Select Advert.AddID, Advert.ProductName, Advert.ProductPrice,Advert.ProductExpiry,Advert.ProductCondition, Advert.AdvertImage , Users.FirstName, Users.EmailAddress, Users.Address, Users.Mobile
        from Advert
        inner Join Users on Users.EmailAddress = Advert.EmailAddress ORDER BY ProductName DESC';
        //pass to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //execute query
        $statement->execute(); // execute the PDO statement
        //create an empty array
        $dataSet = [];
        //pass all results to data set
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $dataSet[] = new AddData($row);
        }
        return $dataSet;
    }

    public function ProductEndingSoonest()
    {
        //query for the database
        $sqlQuery = 'Select Advert.AddID, Advert.ProductName, Advert.ProductPrice,Advert.ProductExpiry,Advert.ProductCondition, Advert.AdvertImage , Users.FirstName, Users.EmailAddress, Users.Address, Users.Mobile
        from Advert
        inner Join Users on Users.EmailAddress = Advert.EmailAddress ORDER BY ProductExpiry ASC';
        //pass to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //execute query
        $statement->execute(); // execute the PDO statement
        //create an empty array
        $dataSet = [];
        //pass all results to data set
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $dataSet[] = new AddData($row);
        }
        return $dataSet;
    }

    public function Search()
    {

        $SearchName = $_POST['Search-Input'];
        //query for the database
        $sqlQuery = "Select Advert.AddID, Advert.ProductName, Advert.ProductPrice,Advert.ProductExpiry,Advert.ProductCondition, Advert.AdvertImage , Users.FirstName, Users.EmailAddress, Users.Address, Users.Mobile
        from Advert
        inner Join Users on Users.EmailAddress = Advert.EmailAddress WHERE ProductName LIKE '%". $SearchName ."%'";
        //pass to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //execute query
        $statement->execute(); // execute the PDO statement
        //create an empty array
        $dataSet = [];
        //pass all results to data set
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $dataSet[] = new AddData($row);
        }
        return $dataSet;
    }

    public function TestLiveSearch($UserInput)
    {
        $SearchName = $_POST['Search-Input'];
        //query for the database
        $sqlQuery = "SELECT * FROM Advert WHERE ProductName LIKE '%" . $UserInput . "%' or '%" . $SearchName . "%' limit 5";
        //pass to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //execute query
        $statement->execute(); // execute the PDO statement
        //create an empty array
        $json_array = array();
       // while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
                $json_array[] = $row;
            }
       print json_encode($json_array);
              //print_r($json_array['Advert'][] = $row);
//            $row_array['ProductName'] = $row['ProductName'];
//            $row_array['ProductPrice'] = $row['ProductPrice'];
//            $row_array['ProductCondition'] = $row['ProductCondition'];
//            array_push($json_array,$row_array);
    }

    public function LiveSearch($UserInput)
    {
        //$SearchName = $_POST['Search-Input'];
        //query for the database
        $sqlQuery = "Select * from Advert WHERE ProductName LIKE '%". $UserInput ."%'";
        //pass to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //execute query
        $statement->execute(); // execute the PDO statement
        //create an empty array
        $dataSet = [];
        //pass all results to data set
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $dataSet[] = new AddData($row);
        }
        return $dataSet;
    }

    public function DeleteAdd()
    {
        $AddIDDelete = $_POST['DeleteID'];
        //query for the database
        $sqlQuery = "DELETE FROM Advert WHERE AddID = '$AddIDDelete'";
        //pass to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //execute query
        $statement->execute(); // execute the PDO statement
    }

    public function AddWishList()
    {
            session_start();
            //variable given the value of what the user typed in
            $ProductName = $_POST['ProductNameWish'];
            //variable given the value of what the user typed in
            $ProductPrice = $_POST['ProductPriceWish'];
            //variable given the value of what the user typed in
            $ProductCondition = $_POST['ProductConditionWish'];
            //variable given the value of what the user typed in
            $ProductExpiry = $_POST['ProductExpiryWish'];
            //variable given the value of what the user typed in
            $ProductSellerName = $_POST['ProductSellerNameWish'];
            //variable given the value of what the user typed in
            $ProductSellerEmail = $_POST['ProductSellerEmailWish'];
            //variable given the value of what the user typed in
            $ProductSellerAddress = $_POST['ProductSellerAddressWish'];
            //variable given the value of what the user typed in
            $AdvertIDWishList = $_POST['WishAddID'];
            //variable given the value of what the user typed in
            $ProductWishListImage = $_POST['ProductWishListImage'];
            //email given the values of the current users email address
            $Email = $_SESSION["Email-Login"];
            //query for the database
            $sqlQuery = "INSERT INTO WishList (WishListID, AdvertIDWishList, ProductName, ProductPrice, ProductCondition, ProductExpiry, ProductSellerName,ProductSellerEmail, ProductSellerAddress, CurrentUser, WishImage) 
                VALUES (DEFAULT ,'$AdvertIDWishList','$ProductName','$ProductPrice', '$ProductCondition', '$ProductExpiry','$ProductSellerName', '$ProductSellerEmail', '$ProductSellerAddress', '$Email', '$ProductWishListImage')";
            $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
            //execute the query
            $statement->execute(); // execute the PDO statement
            //echo "New record created successfully";
        }
    public function WishListAdverts()
    {
        //start session
        session_start();
        //email given the values of the current users email address
        $Email = $_SESSION["Email-Login"];
        //query for the database
        $sqlQuery = "Select * from WishList Where WishList.CurrentUser = '$Email'";
        // prepare a PDO statement
        $statement = $this->_dbHandle->prepare($sqlQuery);
        // execute the PDO statement
        $statement->execute();
        //create an empty array called data set
        $dataSet = [];
        //fetch each piece of data from the database and store in dataset
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            //data set is then given to wish list data of the rows which data is stored
            $dataSet[] = new WishListData($row);
        }
        return $dataSet;
    }
    public function DeleteAddWishList()
    {
        //wishid delete passed the id for that specific item
        $WishIDDelete = $_POST['DeleteWish'];
        //query for the database
        $sqlQuery = "DELETE FROM WishList WHERE WishListID = '$WishIDDelete'";
        //passed to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //Execute the query
        $statement->execute(); // execute the PDO statement
    }


}

