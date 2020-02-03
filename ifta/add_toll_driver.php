<?php
@session_start();

require 'model/Add_Toll.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Add Fuel Receipts
if ($_GET['type'] == 'toll_add') {
    $a_toll = new Add_Toll();
    $a_toll->setId($helper->getNextSequence("toll_data",$db));
    $a_toll->setCompanyID($_POST['companyId']);
    $a_toll->setInvoiceNumber($_POST['invoiceNumber']);
    $a_toll->setTollDate($_POST['tollDate']);
    $a_toll->setTransType($_POST['transType']);
    $a_toll->setLocation($_POST['location']);
    $a_toll->setTransponder($_POST['transponder']);
    $a_toll->setAmount($_POST['amount']);
    $a_toll->setLicensePlate($_POST['licensePlate']);
    $a_toll->setTruckNo($_POST['truckNo']);

    $a_toll->Insert($a_toll,$db,$helper);

}

// Edit Toll
else if ($_GET['type'] == 'edit_toll') {
    $a_toll = new Add_Toll();
    $a_toll->setId($_POST['id']);
    $a_toll->setCompanyID($_POST['companyId']);
    $a_toll->setInvoiceNumber($_POST['value']);
    $a_toll->setColumn($_POST['column']);
    $a_toll->update_FuelReceipt($a_toll,$db);
}



