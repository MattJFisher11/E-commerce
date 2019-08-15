<?php
require_once ('Database.php');
require_once ('AccountUsersDetails.php');

class Users
{
    protected $_dbHandle, $_dbInstance;

    public function __construct()
    {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }
    function Logout()
    {
        //start session
        session_start();
        //kill session
        session_destroy();
        //take to home page
        header("location:index.php");
    }
    public function register()
    {
        if (isset($_POST["Register-Submit"])) {
            //variable given the value of what the user typed in
            $NameRegister = $_POST['Name-Register'];
            //variable given the value of what the user typed in
            $SurnameRegister = $_POST['Surname-Register'];
            //variable given the value of what the user typed in
            $EmailRegister = $_POST['Email-Register'];
            //variable given the value of what the user typed in
            $PasswordRegister = $_POST['Password-Register'];
            //variable given the value of what the user typed in
            $AddressRegister = $_POST['Address-Register'];
            //variable given the value of what the user typed in
            $DOBRegister = $_POST['DOB-Register'];
            //variable given the value of what the user typed in
            $Mobile = $_POST['Mobile-Register'];
            //check query
            $sqlQueryCheck = 'SELECT * FROM Users';
            //pass query to db handler
            $statement = $this->_dbHandle->prepare($sqlQueryCheck);
            //execute the query
            $statement->execute();
            //count how many rows were returned
            $count = $statement->rowCount();
            //fetch the rows
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            //if rows returned are greater than 0
            if ($count > 0) {
                //if email is not equal to one already stored
                if ($EmailRegister != $row['EmailAddress']) {
                    //hash the password
                    $PasswordHash = password_hash($PasswordRegister, PASSWORD_BCRYPT);
                    //insert into users database
                    $sqlQuery = "INSERT INTO Users (FirstName, LastName, EmailAddress, Address, DateOfBirth, Password, Mobile)
                    VALUES ('$NameRegister', '$SurnameRegister', '$EmailRegister', '$AddressRegister', '$DOBRegister','$PasswordHash', '$Mobile')";
                    //pass query to db handler
                    $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
                    //execute query
                    $statement->execute(); // execute the PDO statement
                    echo "New record created successfully";
                } else {
                    echo 'sorry username already taken';
                }
            }
            else
            {
                echo 'error';
            }
            }
        }

    public function postAdd()
    {
        if (isset($_POST["Post-Submit"])) {
            session_start();
            //variable given the value of what the user typed in
            $ProductName = $_POST['Name-PostAdd'];
            //variable given the value of what the user typed in
            $ProductPrice = $_POST['ProductPrice-PostAdd'];
            //variable given the value of what the user typed in
            $ProductCondition = $_POST['ProductCondition-PostAdd'];
            //variable given the value of what the user typed in
            $ProductExpiry = $_POST['ProductExpiry-PostAdd'];
            //current user
            $Email = $_SESSION["Email-Login"];
            //target path of images folder
            $targetPath = "images/";
            //target ;ath is given the name of the image
            $targetPath = $targetPath.basename($_FILES['Advert-Image']['name']);
            if (move_uploaded_file($_FILES['Advert-Image']['tmp_name'], $targetPath)) {
                //insert into database
                $sqlQuery = "INSERT INTO Advert (AddID, ProductName, ProductPrice, ProductCondition, ProductExpiry, AdvertImage,EmailAddress) 
                VALUES (DEFAULT , '$ProductName', '$ProductPrice', '$ProductCondition', '$ProductExpiry','$targetPath', '$Email')";
                //pass to db handler
                $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
                //execute query
                $statement->execute(); // execute the PDO statement
                //echo "New record created successfully";
            } else {
                echo "record NOT Created";
            }
        }
    }
    public function fetchUser()
    {
        //start session
        session_start();
        //email given the value of current session
        $User = $_SESSION['Email-Login'];
        //query
        $sqlQuery = "SELECT * FROM Users WHERE EmailAddress = '$User'";
        //passed to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        // execute the PDO statement
        $statement->execute();
        //create an empty array
        $dataSet = [];
        //put all of the query results in dataset
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            //pass all value in the array to accoount user details
            $dataSet[] = new AccountUsersDetails($row);
            //print_r($dataSet);
        }
        return $dataSet;
    }

    public function DeleteUser()
    {
        $DeleteUser = $_POST['DeleteUserStored'];
        //query
        $sqlQuery = "DELETE FROM Users WHERE EmailAddress = '$DeleteUser'";
        //pass to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //execute query
        $statement->execute(); // execute the PDO statement
        var_dump($statement);
    }

    public function fetchAllUsers()
    {
        //query
        $sqlQuery = "SELECT * FROM Users ";
        //pass to db handler
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        //execute array
        $statement->execute(); // execute the PDO statement
        //create an empty array
        $dataSet = [];
        //pass all results to data set
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            ////pass all value in the array to accoount user details
            $dataSet[] = new AccountUsersDetails($row);
            //print_r($dataSet);
        }
        return $dataSet;
    }

    public function login()
    {
        //session_start();
        //emailed passed to what user typed in
        $Email = $_POST["Email-Login"];
        //pass is given what the user typed in
        $Pass = $_POST["Password-Login"];

        if (isset($_POST["Login-Submit"])) {
            //start session
            session_start();
            if (empty($_POST["Email-Login"]) || empty($_POST["Password-Login"])) {
                echo "Please enter a Email or Password";
            } else {
                //$sqlQuery = "SELECT * FROM Users WHERE EmailAddress = :Email AND Password = :Pass";
                $sqlQuery = "Select * From Users Where EmailAddress = '$Email'";
                $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
                $statement->execute();
                $count = $statement->rowCount();
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                // if amounts of rows which are returned in the database
                if ($count > 0) {
                    //if the password typed in  an password in
                    if (password_verify($Pass, $row['Password']))
                     {
                         //session email login is given the value of the users email address
                        $_SESSION["Email-Login"] = $_POST["Email-Login"];
                         //session password login is given the value of the users password
                        $_SESSION["Password-Login"] = $_POST["Password-Login"];
                        //changes the headers url to success if the users logged in.
                        header("location:index.php?login=success");
                    }
                    else
                    {
                        echo "passwords do not match";

                    }

                } else {
                    echo "Wrong Data";
                }

            }
        }
    }
}


