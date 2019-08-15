<?php
//get the users class
require_once('Models/Users.php');
//get the get add class
require_once('Models/GetAdd.php');

//creates an new class called view
$view = new stdClass();
//create a new users class which is given to user
$User = new Users();
//view is then passed the fetch user function
$view->fetchUser = $User->fetchUser();

$Admin = $_SESSION["Email-Login"];
if($Admin == "Matt@Fisher") {
    //get add is given the value of a get add class
    $GetAdd = new GetAdd();
    //view is then passed the fetch all adds function
    $view->GetAdd = $GetAdd->fetchAllAdds();
    //user is given the value of a users class
    $User = new Users();
    //view is then passed the fetch all users function
    $view->fetchUser = $User->fetchAllUsers();
}
if (isset($_POST['Delete'])) {
    //creates an new class called view
    $view = new stdClass();
    //get add is given the value of a get add class
    $GetAdd = new GetAdd();
    //view is then passed the delete add function
    $view->GetAdd = $GetAdd->DeleteAdd();
    //view is then passed the fetch all adds function
    $view->GetAdd = $GetAdd->fetchAllAdds();
    //Refreshes The Page
    header("Refresh:0");
}
if (isset($_POST['DeleteUserAdmin'])) {
    //creates an new class called view
    $view = new stdClass();
    //create a new users class which is given to user
    $User = new Users();
    //view is then passed the delete user function
    $view->DeleteUser = $User->DeleteUser();
    //user is given the value of a users class
    $User = new Users();
    //view is then passed the fetch all users function
    $view->fetchAllUsers = $User->fetchAllUsers();
    //Refreshes The Page
    header("Refresh:0");
}
//gets the admin page view
require_once('Views/admin.phtml');


