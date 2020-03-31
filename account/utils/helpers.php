<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";

if($_GET['type'] == 'updatecompanyfields'){
    $id = (int)$_POST['companyname'];
    $collection = $db->bank_admin;
    $show1 = $collection->aggregate([
            ['$match'=>['companyID'=>$_SESSION['companyId']]],
            ['$unwind'=>'$admin_bank'],
            ['$match'=>['admin_bank.accountHolder'=>"$id"]]
    ]);
    $i = 0;
    foreach ($show1 as $row) {
    $admin_bank = array();
    $k = 0;
    $admin_bank[$k] = $row['admin_bank'];
    $k++;
    foreach ($admin_bank as $row) {
            $r['bankid'][] = $row['_id'];
            $r['bankname'][] = $row['bankName'];
            $i++;
       }
        $r['arrayLength'] = $i; 
        $output = $r;
    }
    echo json_encode($output);
 }

 if($_GET['type'] == 'updateDriverInvoice'){
    $driverid = (int)$_POST['driverName'];
    $collection = $db->active_load;
    $show1 = $collection->aggregate([
            ['$match'=>['companyID'=>$_SESSION['companyId']]],
            ['$unwind'=>'$Invoiced'],
            ['$match'=>['Invoiced.driver_name'=>"$driverid"]]
    ]);
    $i = 0;
    foreach ($show1 as $row) {
    $Invoiced = array();
    $k = 0;
    $Invoiced[$k] = $row['Invoiced'];
    $k++;
    foreach ($Invoiced as $row) {
        $a['driverid'][] = $row['_id'];
        $a['drivertotal'][] = $row['driver_total'];
        $i++;
        $other_charges_modal = $row['other_charges_modal'];
        foreach ($other_charges_modal as $row2) {
            $a['advance'][] = $row2['amount'];
        }
    }
        $a['arraysize'] = $i;
        $result = $a;
    }
    echo json_encode($result);
 }