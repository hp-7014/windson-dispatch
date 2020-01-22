<?php
require 'model/Trailer.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// import excel here
if ($_GET['type'] == 'importExcel') {
    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $trailer = new Trailer();
        $trailer->importExcel($targetPath,$helper);
    }

}

// Insert Trailer Function Here
else if ($_GET['type'] == 'traileradd') {
    $trailer = new Trailer();
    $trailer->setId($helper->getNextSequence("trailercount",$db));
    $trailer->setCompanyID($_POST['companyID']);
    $trailer->setTrailerType($_POST['trailerType']);
    $trailer->Insert($trailer,$db,$helper);
    echo "Insert Trailer Type Successful";
}

// Update Trailer Function Here
else if ($_GET['type'] == 'edit_trailer'){
    $trailer = new Trailer();
    $trailer->setId($_POST['id']);
    $trailer->setCompanyID($_POST['companyID']);
    $trailer->setTrailerType($_POST['value']);
    $trailer->setColumn($_POST['column']);
    $trailer->updateTrailer($trailer,$db);
    echo "Update Trailer Type Successful";
}

// Delete Trailer Function Here
else if ($_GET['type'] == 'delete_trailer'){
    $trailer = new Trailer();
    $trailer->setId($_POST['id']);
    $trailer->deleteTrailer($trailer,$db);
    echo "Delete Trailer Type Successful";
}

// Export Excel Function Here
else if ($_GET['type'] == 'export_trailer'){
    $trailer = new Trailer();
    $trailer->exportTrailer($db);
}