<?php
//get the users logout class
require_once('Models/UsersLogout.php');
    //creates an new class called view
    $view = new stdClass();
    //logout is given the value of a users logout class
    $logout = new UsersLogout();
    //view is then passed the logout function
    $view->logout = $logout->Logout();
//gets the index page view
require_once('Views/index.phtml');