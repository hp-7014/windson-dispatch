<?php

require 'model/StatusType.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

if ($_GET['type'] == 'status_type') {
    $status = new StatusType();
    $status->setId($helper->getNextSequence("status_type",$db));
    $status->setCompanyID($_POST['companyId']);
    $status->setStatusName($_POST['status_name']);
    $status->setStatusColor($_POST['status_color']);
    $status->Insert($status,$db,$helper);
}

// edit function here
else if ($_GET['type'] == 'edit_status'){
//    echo $_POST['value'].' '.$_POST['column'];
    $status = new StatusType();
    $status->setId($_POST['id']);
    $status->setCompanyID($_POST['companyId']);
    $status->setStatusName($_POST['value']);
    //$status->setStatusColor($_POST['statuscolor']);
    $status->setColumn($_POST['column']);
    //print_r($status);
    $status->updateStatustype($status,$db);
}

else if ($_GET['type'] == 'edit_color'){
//    echo $_POST['value'].' '.$_POST['column'];
    $status = new StatusType();
    $status->setId($_POST['id']);
    $status->setCompanyID($_POST['companyId']);
    //$status->setStatusName($_POST['value']);
    $status->setStatusColor($_POST['statuscolor']);
    $status->setColumn($_POST['column']);
    //print_r($status);
    $status->update_Statustype($status,$db);
}

// Import Excel Here
else if ($_GET['type'] == 'importStatus') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $status = new StatusType();
        $status->importStatus($targetPath,$helper,$db);
    }
}

// delete function here
else if ($_GET['type'] == 'delete_Status'){
    $status = new StatusType();
    $status->setId($_POST['id']);
    $status->deleteStatusTe($status,$db);
}
