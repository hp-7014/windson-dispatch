<?php

require 'vendor/autoload.php';

// connection to mongoDB
$connect = new MongoDB\Client("mongodb://127.0.0.1/");

// database selection
$db = $connect->WindsonDispatch;

$show = $db->currency_add->find(['companyID' => 1,'currency.$._id' => 1]);

    foreach ($show as $row) {
        $row1 = $row['currency'];
        foreach ($row1 as $c){
            $show1 = $c['currencyType'];
            print_r($show1);
        }
    }