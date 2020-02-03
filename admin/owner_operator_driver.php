<?php

require 'model/Owner_Operator_Driver.php';
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

// insert consignee
if ($_GET['type'] == 'addOwner') {

    $owner = new Owner_Operator_Driver();
    $owner->setId($helper->getNextSequence("driver_owner_operator", $db));
    $owner->setDriverName($_POST['driverName']);
    $owner->setPercentage($_POST['percentage']);
    $owner->setTruckNo($_POST['truckNo']);
    $owner->setInstallment($_POST['installmentCategory'],$_POST['installmentType'],$_POST['amount'],$_POST['installment'],$_POST['installment'],$_POST['startNo'],$_POST['startDate'],$_POST['internalNote']);
    $owner->insert($owner, $db, $helper);
    echo "Data Added Successfully";
}