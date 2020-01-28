<?php
require 'model/TruckAdd.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Insert Truck Function Here
if ($_GET['type'] == 'truckadd') {
    $truck = new TruckAdd();
    $truck->setId($helper->getNextSequence("truckcount",$db));
    $truck->setCompanyID($_POST['companyId']);
    $truck->setTruckNumber($_POST['truck_number']);
    $truck->setTruckType($_POST['trucktype']);
    $truck->setLicensePlate($_POST['license_plate']);
    $truck->setPlateExpiry(strtotime($_POST['plate_expiry']));
    $truck->setInspectionExpiry(strtotime($_POST['inspection']));
    $truck->setStatus($_POST['status']);
    $truck->setOwnership($_POST['ownership']);
    $truck->setMileage($_POST['mileage']);
    $truck->setAxies($_POST['axies']);
    $truck->setYear($_POST['year']);
    $truck->setFuelType($_POST['fuel_type']);
    $truck->setStartDate(strtotime($_POST['start_date']));
    $truck->setDeactivationDate(strtotime($_POST['deactivation']));
    $truck->setIfta($_POST['ifta']);
    $truck->setRegisteredState($_POST['registered_state']);
    $truck->setInsurancePolicy($_POST['Insurance_Policy']);
    $truck->setGrossWeight($_POST['gross']);
    $truck->setVin($_POST['vin']);
    $truck->setDotexpiryDate(strtotime($_POST['dot']));
    $truck->setTransponder($_POST['transponder']);
    $truck->setInternalNotes($_POST['Internal_note']);
    $truck->Insert($truck,$db,$helper);
    echo "Data Insert Successful";
}

// Import Excel Function Here
elseif ($_GET['type'] == 'truckimport') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $truck = new TruckAdd();
        $truck->importExceltruck($targetPath,$helper);
    }

}

// Update Function Here
else if ($_GET['type'] == 'edit_truck'){
    $truck = new TruckAdd();
    $truck->setId($_POST['id']);
    $truck->setCompanyID($_POST['companyId']);
    $truck->setTruckNumber($_POST['value']);
    $truck->setColumn($_POST['column']);
    $truck->updateTruckAdd($truck,$db);
    echo "Data Update Successful";
}

// Delete Function Here
else if ($_GET['type'] == 'delete_truck'){
    $truck = new TruckAdd();
    $truck->setId($_POST['id']);
    $truck->deleteTruckAdd($truck,$db);
    echo "Data Removed Successful";
}

// Export Excel Function Here
elseif ($_GET['type'] == 'truckexport'){
    $truck = new TruckAdd();
    $truck->exportTruck($db);
}