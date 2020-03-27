<?php

require 'model/Customs_Broker.php';
require 'utils/Helper.php';
// require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Add Credit Here
if ($_GET['type'] == 'add_custom_broker') {
    $c_broker = new CustomsBroker();
    $c_broker->setId($helper->getNextSequence("customBroker",$db));
    $c_broker->setCompanyID($_POST['companyId']);
    $c_broker->setBrokerName($_POST['brokerName']);
    $c_broker->setCrossing($_POST['crossing']);
    $c_broker->setTelephone($_POST['telephone']);
    $c_broker->setExt($_POST['ext']);
    $c_broker->setTollfree($_POST['tollfree']);
    $c_broker->setFax($_POST['fax']);
    $c_broker->setStatus($_POST['Status']);

    $c_broker->Insert($c_broker,$db,$helper);

}

// Edit Data Here
else if ($_GET['type'] == 'edit_custom_broker') {
    $c_broker = new CustomsBroker();
    $c_broker->setId($_POST['id']);
    $c_broker->setCompanyID($_POST['companyId']);
    $c_broker->setBrokerName($_POST['value']);
    $c_broker->setColumn($_POST['column']);

    $c_broker->update_Cus_Broker($c_broker,$db);
}

// Delete Data Here
else if ($_GET['type'] == 'delete_custom_broker') {
    $c_broker = new CustomsBroker();
    $c_broker->setId($_POST['id']);

    $c_broker->delete_Custom_Broker($c_broker,$db);
}

// Export Data Here
else if ($_GET['type'] == 'export_custom_broker') {
    $c_broker = new CustomsBroker();
    $c_broker->export_Custom_Broker($db);
}

// Import Data Here
else if ($_GET['type'] == 'import_custom_broker') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $c_broker = new CustomsBroker();
        $c_broker->import_Custom_Broker($targetPath,$helper,$db);
    }
}




