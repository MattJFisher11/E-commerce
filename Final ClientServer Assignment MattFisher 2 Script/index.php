<?php
//get the users class
require_once('Models/Users.php');
//get the get add class
require_once('Models/GetAdd.php');

//if button clicked then
if (isset($_POST['PriceLow-Submit']))
{
    //creates an new class called view
    $view = new stdClass();
    //creates a new class from getadd class
    $GetAdd = new GetAdd();
    //view is then passed the low to high function
    $view->GetAdd = $GetAdd->LowToHigh();
}
//if button clicked then
else if (isset($_POST['PriceHigh-Submit']))
{
    //creates an new class called view
    $view = new stdClass();
    //creates a new class from getadd class
    $GetAdd = new GetAdd();
    //view is then passed the high to low function
    $view->GetAdd = $GetAdd->HighToLow();

}
//if button clicked then
else if (isset($_POST['ProductExpiryEndingSoonest']))
{
    //creates an new class called view
    $view = new stdClass();
    //creates a new class from getadd class
    $GetAdd = new GetAdd();
    //view is then passed the ending soonest function
    $view->GetAdd = $GetAdd->ProductEndingSoonest();

}
//if button clicked then
else if (isset($_POST['ProductNameAZ-Submit']))
{
    //creates an new class called view
    $view = new stdClass();
    //creates a new class from getadd class
    $GetAdd = new GetAdd();
    //view is then passed the name A-Z function
    $view->GetAdd = $GetAdd->ProductNameAZ();

}
//if button clicked then
else if (isset($_POST['ProductNameZA-Submit']))
{
    //creates an new class called view
    $view = new stdClass();
    //creates a new class from getadd class
    $GetAdd = new GetAdd();
    //view is then passed the name Z-A function
    $view->GetAdd = $GetAdd->ProductNameZA();

}
//if button clicked then
else if (isset($_POST['Search-Submit']))
{
    //creates an new class called view
    $view = new stdClass();
    //creates a new class from getadd class
    $GetAdd = new GetAdd();
    //view is then passed the search function
    $view->GetAdd = $GetAdd->Search();
}
//other wise just show all the adds without any filters
else
{
    //create a new class called view
    $view = new stdClass();
    //creates a new class from getadd class
    $GetAdd = new GetAdd();
    //view is then passed the fetch all adds function
    $view->GetAdd = $GetAdd->fetchAllAdds();
    //create a new users class called users
    $User = new Users();
    //view is then passed the fetch user function
    $view->fetchUser = $User->fetchUser();
}

if (isset($_POST['Login-Submit']))
{
    //creates an new class called view
    $view = new stdClass();
    $login = new Users();
    //view is then passed the login function
    $view->login = $login->login();
}

$CaptchaText = $_POST['textCaptchaInput'];
$StoreRandomVar = $_POST['StoreRandomVar'];

if (isset($_POST['Register-Submit'])) {

    if ($CaptchaText == $StoreRandomVar) {
        //creates an new class called view
        $view = new stdClass();
        $Register = new Users();
        //view is then passed the register function
        $view->Register = $Register->register();
    } else {
        echo "Your Not In";
    }
}

if (isset($_POST['Post-Submit'])) {
    //creates an new class called view
    $view = new stdClass();
    $PostAdd = new Users();
    //view is then passed the post add function
    $view->PostAdd = $PostAdd->postAdd();
}
if (isset($_POST['Wish'])) {
    //creates an new class called view
    $view = new stdClass();
    //creates a new class from getadd class
    $GetAdd = new GetAdd();
    //view is then passed the add wish list function
    $view->GetAdd = $GetAdd->AddWishList();
    //Refreshes The Page
    header("Refresh:0");
}

require_once('Views/index.phtml');


