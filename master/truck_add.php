<?php
require 'model/Truck.php';
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

        $truck = new Truck();
        $truck->importExcel($targetPath,$helper);
    }

}

// Insert Truck Type Function Here
else if ($_GET['type'] == 'truckadd') {
    $truck = new Truck();
    $truck->setId($helper->getNextSequence("trucktypecount",$db));
    $truck->setCompanyID($_POST['companyID']);
    $truck->setTruckType($_POST['truckType']);
    $truck->Insert($truck,$db,$helper);
    echo "Data Insert Successfully";
}

// Update Truck Type Function Here
else if ($_GET['type'] == 'edit_truck'){
    $truck = new Truck();
    $truck->setId($_POST['id']);
    $truck->setCompanyID($_POST['companyID']);
    $truck->setTruckType($_POST['value']);
    $truck->setColumn($_POST['column']);
    $truck->updateTruck($truck,$db);
    echo "Data Update Successful";
}

// Delete Truck Type Function Here
else if ($_GET['type'] == 'delete_Truck'){
    $truck = new Truck();
    $truck->setId($_POST['id']);
    $truck->deleteTruck($truck,$db);
    echo "Data Removed Successful";
}

// Export Excel Function Here
else if ($_GET['type'] == 'export_truck'){
    $truck = new Truck();
    $truck->exportTruck($db);
}