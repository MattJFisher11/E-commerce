<?php
require_once('Models/Users.php');
require_once('Models/GetAdd.php');

    //creates an new class called view
    $view = new stdClass();
    //getadd is given the value of a get add class
    $GetAdd = new GetAdd();
    //view is then passed the wish list adverts function
    $view->GetAdd = $GetAdd->WishListAdverts();
    //user is given the value of a users class
    $User = new Users();
    //view is then passed the fetch user function
    $view->fetchUser = $User->fetchUser();

    if (isset($_POST['DeleteWish']))
    {
        //creates an new class called view
        $view = new stdClass();
        //getadd is given the value of a get add class
        $GetAdd = new GetAdd();
        //view is then passed the delete add wish list function
        $view->GetAdd = $GetAdd->DeleteAddWishList();
        //view is then passed the fetch all adds function
        $view->GetAdd = $GetAdd->fetchAllAdds();
        //Refreshes The Page
        header("Refresh:0");
    }

require_once('Views/WishList.phtml');
