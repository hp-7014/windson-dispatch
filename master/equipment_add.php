<?php

require 'model/Equipment.php';
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

        $equipment = new Equipment();
        $equipment->importExcel($targetPath,$helper);
    }

}

// Insert Equipment Function Here
else if ($_GET['type'] == 'equipmentadd') {
    $equipment = new Equipment();
    $equipment->setId($helper->getNextSequence("equipmentcount",$db));
    $equipment->setCompanyID($_POST['companyID']);
    $equipment->setEquipment($_POST['equipmentType']);
    $equipment->Insert($equipment,$db,$helper);
    echo "Data Insert Successful";
}

// Update Equipment Function Here
else if ($_GET['type'] == 'edit_equipment'){
    $equipment = new Equipment();
    $equipment->setId($_POST['id']);
    $equipment->setCompanyID($_POST['companyID']);
    $equipment->setEquipment($_POST['value']);
    $equipment->setColumn($_POST['column']);
    $equipment->updateEquipment($equipment,$db);
    echo "Data Update Successful";
}

// Delete Equipment Function Here
else if ($_GET['type'] == 'delete_equipment'){
    $equipment = new Equipment();
    $equipment->setId($_POST['id']);
    $equipment->deleteEquipment($equipment,$db);
    echo "Data Removed Successful";
}

// Export Excel Function Here
else if ($_GET['type'] == 'export_equipment'){
    $equipment = new Equipment();
    $equipment->exportCurrency($db);
}