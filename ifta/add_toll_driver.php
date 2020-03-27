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
    $a_toll->update_Tolls($a_toll,$db);
}

// Delete Toll
else if ($_GET['type'] == 'delete_toll') {
    $a_toll = new Add_Toll();
    $a_toll->setId($_POST['id']);
    $a_toll->setTruckNo($_POST['truckid']);
    $a_toll->delete_Tolls($a_toll,$db,$helper);
}

// Export Toll
else if ($_GET['type'] == 'export_toll') {
    $a_toll = new Add_Toll();
    $a_toll->export_Tolls($db);
}

// Import Toll
else if ($_GET['type'] == 'import_toll') {
    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $a_toll = new Add_Toll();
        $a_toll->import_Tolls($targetPath,$helper,$db);
    }
}


