<?php

require 'Auth.php';   // class file
require 'master/utils/Helper.php'; // helper method
require 'vendor/autoload.php';

// connection to mongoDB
$connect = new MongoDB\Client("mongodb://127.0.0.1/");

// database selection
$db = $connect->WindsonDispatch;

$helper = new Helper();

if ($_GET['type'] == 'register') {
    $auth = new Auth();
    $auth->setId($helper->getNextSequence("companyAdmin",$db));
    $auth->setcompanyName($_POST['companyName']);
    $auth->setcompanyEmail($_POST['companyEmail']);
    $auth->setcompanyContact($_POST['companyContact']);
    $auth->setcompanyAddress($_POST['companyAddress']);
    $auth->setcompanyPassword($_POST['companyPassword']);
    $auth->insert($auth,$db);
    echo "Data Added Successfully";
}
else if ($_GET['type'] == 'login') {
    $auth = new Auth();
    $auth->setcompanyEmail($_POST['companyEmail']);
    $auth->setcompanyPassword($_POST['companyPassword']);
    $auth->login($auth,$db);
}