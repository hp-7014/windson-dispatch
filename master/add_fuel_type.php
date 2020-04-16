<?php

require 'model/FuelCardType.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Insert Fuel Card Function Here
if ($_GET['type'] == 'fueltypeadd') {
    $fuelcard = new FuelCard();
    $fuelcard->setId($helper->getNextSequence("fuel_Card_Type",$db));
    $fuelcard->setCompanyID($_SESSION['companyId']);
    $fuelcard->setFuelCardType($_POST['fuelcard_type']);
    $fuelcard->setOpeningfuelBal($_POST['openingfuelBal']);
    $fuelcard->Insert($fuelcard,$db,$helper);
}

// edit function here
else if ($_GET['type'] == 'edit_fueltype'){
    $fuelcard = new FuelCard();
    $fuelcard->setId($_POST['id']);
    $fuelcard->setCompanyID($_POST['companyID']);
    $fuelcard->setFuelCardType($_POST['value']);
    $fuelcard->setColumn($_POST['column']);
    $fuelcard->updateFuelCard($fuelcard,$db);
}

// Delete Fuel Here
else if ($_GET['type'] == 'delete_fueltype') {
    $fuelcard = new FuelCard();
    $fuelcard->setId($_POST['id']);
    $fuelcard->deleteFuelCard($fuelcard,$db);
}

// Export Fuel Here
else if ($_GET['type'] == 'export_fueltype') {
    $fuelcard = new FuelCard();
    $fuelcard->exportExcelfuel($db);
}

// Import Fuel Here
else if ($_GET['type'] == 'importExcel_Fuel') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $fuel = new FuelCard();
        $fuel->importFuel($targetPath,$helper,$db);
    }
}



