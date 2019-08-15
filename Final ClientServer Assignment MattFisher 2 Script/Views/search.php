<?php
require_once("../Models/GetAdd.php");


$UserInput = ($_GET['q']);
//var_dump($UserInput);
    $search = new GetAdd();
    //var_dump($search->TestLiveSearch($UserInput));
    $search->TestLiveSearch($UserInput);

