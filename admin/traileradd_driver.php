<?php
require 'model/TrailerAdd.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Insert Truck Function Here
if ($_GET['type'] == 'traileradd') {
    $trailer = new TrailerAdd();
    $trailer->setId($helper->getNextSequence("traileraddcount",$db));
    $trailer->setCompanyID($_POST['companyId']);
    $trailer->setTrailerNumber($_POST['trailer_number']);
    $trailer->setTrailerType($_POST['trailer_type']);
    $trailer->setLicenseType($_POST['license_plate']);
    $trailer->setPlateExpiry(strtotime($_POST['plate_expiry']));
    $trailer->setInspectionExpiration(strtotime($_POST['inspection']));
    $trailer->setStatus($_POST['status']);
    $trailer->setModel($_POST['model']);
    $trailer->setYear($_POST['year']);
    $trailer->setAxies($_POST['axies']);
    $trailer->setRegisteredState($_POST['register_state']);
    $trailer->setVin($_POST['vin']);
    $trailer->setDot(strtotime($_POST['dot']));
    $trailer->setActivationDate(strtotime($_POST['activation_date']));
    $trailer->setInternalNotes($_POST['internal_notes']);
    $trailer->Insert($trailer,$db,$helper);
    echo "Data Insert Successful";
}

// Import Excel Function Here
elseif ($_GET['type'] == 'trailerimport') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $trailer = new TrailerAdd();
        $trailer->importExceltrailer($targetPath,$helper);
    }

}

// Update Function Here
else if ($_GET['type'] == 'edit_trailer'){
    $trailer = new TrailerAdd();
    $trailer->setId($_POST['id']);
    $trailer->setCompanyID($_POST['companyId']);
    $trailer->setTrailerNumber($_POST['value']);
    $trailer->setColumn($_POST['column']);
    $trailer->updateTrailer($trailer,$db);
    echo "Data Update Successful";
}

// Delete Function Here
else if ($_GET['type'] == 'delete_trailer'){
    $trailer = new TrailerAdd();
    $trailer->setId($_POST['id']);
    $trailer->deleteTrailer($trailer,$db);
    echo "Data Removed Successful";
}

// Export Excel Function Here
elseif ($_GET['type'] == 'trailerexport'){
    $trailer = new TrailerAdd();
    $trailer->exportTrailer($db);
}