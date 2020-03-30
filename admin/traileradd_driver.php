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
    $trailer->setCompanyID($_SESSION['companyId']);
    $trailer->setTrailerNumber($_POST['trailer_number']);
    $trailer->setTrailerType($_POST['traileradd_type']);
    $trailer->setLicenseType($_POST['license_plate']);
    $trailer->setPlateExpiry(strtotime($_POST['plate_expiry']));
    $trailer->setInspectionExpiration(strtotime($_POST['inspection']));
    $trailer->setStatus($_POST['status']);
    $trailer->setModel($_POST['truckmod']);
    $trailer->setYear($_POST['year']);
    $trailer->setAxies($_POST['axies']);
    $trailer->setRegisteredState($_POST['registered_state']);
    $trailer->setVin($_POST['vin']);
    $trailer->setDot(strtotime($_POST['dot']));
    $trailer->setActivationDate(strtotime($_POST['activation_date']));
    $trailer->setInternalNotes($_POST['internal_notes']);

    if (!empty(array_filter($_FILES['files']['name']))) {
        $uploadDir = 'upload/Trailer Documents/';
        $response = '';
        $allowTypes = array('pdf', 'jpg', 'png', 'jpeg');
        $i = 0;
        $docs = array();
        foreach ($_FILES['files']['name'] as $key => $val) {
            $fileName = rand(0, 9999999999) . $_FILES["files"]["name"][$key];

            $temLoc = $_FILES['files']['tmp_name'][$key];
            $targetFilePath = $uploadDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $fileSize = $_FILES['files']['size'][$key];
            if (in_array($fileType, $allowTypes)) {
                if ($fileSize < 200000) {
                    $docs[] = $fileName;
                    $trailer->setUploadDocument($fileName, $i);

                } else {
                    echo "File Size is To Large For " . $fileName;
                    exit();
                }
            } else {
                echo "File Type Error For " . $fileName;
                exit();
            }
            $i++;
        }
        for ($i = 0; $i < count($docs); $i++) {
            move_uploaded_file($_FILES["files"]["tmp_name"][$i], $uploadDir . $docs[$i]);
        }
    }
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
    $trailer->setTrailerType($_POST['trailerType']);
    $trailer->deleteTrailer($trailer,$db,$helper);
    echo "Data Removed Successful";
}

// Export Excel Function Here
elseif ($_GET['type'] == 'trailerexport'){
    $trailer = new TrailerAdd();
    $trailer->exportTrailer($db);
}