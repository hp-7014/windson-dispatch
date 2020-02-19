<?php

if(isset($page)) {
    require 'vendor/autoload.php';
}else{
    require '../vendor/autoload.php';
}

// connection to mongoDB
$connect = new MongoDB\Client("mongodb://localhost:27017");

// database selection
$db = $connect->WindsonDispatch;