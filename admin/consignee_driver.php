<?php

require 'model/Consignee.php';
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

// insert consignee
if ($_GET['type'] == 'add_consignee') {
    echo $_POST['consigneeAppointments'];
    $consignee = new Consignee();
    $consignee->setId($helper->getNextSequence("consignee",$db));
    $consignee->setCompanyID($_POST['companyID']);
    $consignee->setConsigneeName($_POST['consigneeName']);
    $consignee->setConsigneeAddress($_POST['consigneeAddress']);
    $consignee->setConsigneeLocation($_POST['consigneeLocation']);
    $consignee->setConsigneePostal($_POST['consigneePostal']);
    $consignee->setConsigneeContact($_POST['consigneeContact']);
    $consignee->setConsigneeEmail($_POST['consigneeEmail']);
    $consignee->setConsigneeTelephone($_POST['consigneeTelephone']);
    $consignee->setConsigneeExt($_POST['consigneeExt']);
    $consignee->setConsigneeTollFree($_POST['consigneeTollFree']);
    $consignee->setConsigneeFax($_POST['consigneeFax']);
    $consignee->setConsigneeReceiving($_POST['consigneeReceiving']);
    $consignee->setConsigneeAppointments($_POST['consigneeAppointments']);
    $consignee->setConsigneeIntersaction($_POST['consigneeIntersaction']);
    $consignee->setConsigneeStatus($_POST['consigneeStatus']);
    $consignee->setConsigneeRecivingNote($_POST['consigneeRecivingNote']);
    $consignee->setConsigneeInternalNote($_POST['consigneeInternalNote']);
    $consignee->insert($consignee,$db,$helper);
    echo "Data Added Successfully";
}

//import shipper
else if ($_GET['type'] == 'importConsignee') {

    $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'upload/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Consignee = new Consignee();
        $Consignee->importExcel($targetPath, $helper);
        echo 'File Upload Successfully';
    }
}

// export excel function here
else if ($_GET['type'] == 'exportConsignee') {
    $consignee = new Consignee();
    $consignee->exportConsignee($db);
}

// update function here
else if ($_GET['type'] == 'edit_consignee') {
    $consignee = new Consignee();
    $consignee->setId($_POST['id']);
    $consignee->setCompanyId($_POST['companyid']);
    $consignee->setConsigneeName($_POST['value']);
    $consignee->setColumn($_POST['column']);
    $consignee->updateConsignee($consignee, $db);
    echo 'Data Update Successfully';
}

// delete function here
else if ($_GET['type'] == 'delete_consignee') {
    $consignee = new Consignee();
    $consignee->setId($_POST['id']);
    $consignee->deleteConsignee($consignee, $db);
    echo 'Data Removed Successfully';
}