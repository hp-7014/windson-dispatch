<?php

if(isset($page)) {
    require 'vendor/autoload.php';
}
else if(isset($helper)){
    require '../../vendor/autoload.php';
}
else{
    require '../vendor/autoload.php';
}

// connection to mongoDB
//$connect = new MongoDB\Client("mongodb://localhost:27017");

$connect = new MongoDB\Client(
    'mongodb+srv://windson:7WUUxJojmKHEKu5d@cluster0-xlwja.mongodb.net/test');
//$db = $connect->test;

// database selection
$db = $connect->WindsonDispatch;