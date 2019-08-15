<?php

require_once('Models/Users.php');

        //creates a new class
        $view = new stdClass();
        //user is given the value of the users class
        $User = new Users();
        //creates a new view which
        $view->fetchUser = $User->fetchUser();

