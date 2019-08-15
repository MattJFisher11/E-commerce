<?php
/**
 * Created by PhpStorm.
 * User: MatthewFisher
 * Date: 23/11/2017
 * Time: 15:43
 */

class UsersLogout
{
    function Logout()
    {
        //starts the session
        session_start();
        //kills the session
        session_destroy();
        //takes the user back to the home page
        header("location:index.php");
    }
}