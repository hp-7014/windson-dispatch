<?php

require '../vendor/autoload.php';

// connection to mongoDB
$connect = new MongoDB\Client("mongodb://127.0.0.1/");

// database selection
$db = $connect->WindsonDispatch;