<?php

require 'model/Shipper.php';
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

// add shipper
if ($_GET['type'] == 'add_shipper') {

    $shipper = new Shipper();
    $shipper->setId($helper->getNextSequence("shipper",$db));
    $shipper->setCompanyID($_POST['companyID']);
    $shipper->setShipperName($_POST['shipperName']);
    $shipper->setShipperAddress($_POST['shipperAddress']);
    $shipper->setShipperLocation($_POST['shipperLocation']);
    $shipper->setShipperPostal($_POST['shipperPostal']);
    $shipper->setShipperContact($_POST['shipperContact']);
    $shipper->setShipperEmail($_POST['shipperEmail']);
    $shipper->setShipperTelephone($_POST['shipperTelephone']);
    $shipper->setShipperExt($_POST['shipperExt']);
    $shipper->setShipperTollFree($_POST['shipperTollFree']);
    $shipper->setShipperFax($_POST['shipperFax']);
    $shipper->setShipperShippingHours($_POST['shipperShippingHours']);
    $shipper->setShipperAppointments($_POST['shipperAppointments']);
    $shipper->setShipperIntersaction($_POST['shipperIntersaction']);
    $shipper->setShipperStatus($_POST['shipperStatus']);
    $shipper->setShippingNotes($_POST['shippingNotes']);
    $shipper->setInternalNotes($_POST['internalNotes']);
    $shipper->insert($shipper,$db,$helper);
    echo "Data Added Successfully";
}

//import shipper
else if ($_GET['type'] == 'importShipper') {

    $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'upload/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $shipper = new Shipper();
        $shipper->importExcel($targetPath, $helper);
        echo 'File Upload Successfully';
    }
}

// export excel function here
else if ($_GET['type'] == 'exportShipper') {
    $shipper = new Shipper();
    $shipper->exportShipper($db);
}

// delete function here
else if ($_GET['type'] == 'delete_shipper') {
    $shipper = new Shipper();
    $shipper->setId($_POST['id']);
    $shipper->deleteShipper($shipper, $db);
    echo 'Data Removed Successfully';
}

// update function here
else if ($_GET['type'] == 'edit_shipper') {
    $shipper = new Shipper();
    $shipper->setId($_POST['id']);
    $shipper->setCompanyId($_POST['companyid']);
    $shipper->setShipperName($_POST['value']);
    $shipper->setColumn($_POST['column']);
    $shipper->updateShipper($shipper, $db);
    echo 'Data Update Successfully';
}