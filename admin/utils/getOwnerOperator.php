<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
$list = "";
$collection = $db->owner_operator_driver;
$show1 = $collection->aggregate([
    ['$lookup' => [
        'from' => 'driver',
        'localField' => 'companyID',
        'foreignField' => 'companyID',
        'as' => 'owner'
    ]
    ]]);

foreach ($show1 as $row) {
    $ownerOperator = $row['ownerOperator'];
    $owner = $row['owner'];
    $drivername = array();
    foreach ($owner as $row2) {
                $owner1 = $row2['driver'];
                $k = 0;
                foreach ($owner1 as $row3) {
                    $id = $row3['_id'];
                    $drivername[$k] = $id.")&nbsp;".$row3['driverName'];
                    $k++;
                }    
        }

    $j = 0;
            foreach ($ownerOperator as $row1) {
                $drivername1 = $drivername[$row1['driverId']];
                $j++;
                $value = "'".$drivername1."'";
               $list .= "<option value=$value></option>";

            }
        }

        echo $list;
