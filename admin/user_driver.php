<?php

require 'model/User.php';
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

// add shipper
if ($_GET['type'] == 'add_user') {

    $user = new User();
    $user->setId($helper->getNextSequence("user",$db));
    $user->setCompanyID($_POST['companyID']);
    $user->setUserEmail($_POST['userEmail']);
    $user->setUserName($_POST['userName']);
    $user->setUserPass($_POST['userPass']);
    $user->setUserFirstName($_POST['userFirstName']);
    $user->setUserLastName($_POST['userLastName']);
    $user->setUserAddress($_POST['userAddress']);
    $user->setUserLocation($_POST['userLocation']);
    $user->setUserZip($_POST['userZip']);
    $user->setUserTelephone($_POST['userTelephone']);
    $user->setUserExt($_POST['userExt']);
    $user->setUerTollFree($_POST['TollFree']);
    $user->setUserFax($_POST['userFax']);
    $user->setAddBank($_POST['addBank']);
    $user->setAddCustomer($_POST['addCustomer']);
    $user->setAddCompany($_POST['addCompany']);
    $user->setAddShipper($_POST['addShipper']);
    $user->setCurrency($_POST['currency']);
    $user->setAddConsignee($_POST['addConsignee']);
    $user->setPaymentTerms($_POST['paymentTerms']);
    $user->setAddDriver($_POST['addDriver']);
    $user->setOffice($_POST['office']);
    $user->setAddTruck($_POST['addTruck']);
    $user->setEquipmentType($_POST['equipmentType']);
    $user->setAddTrailer($_POST['addTrailer']);
    $user->setTruckType($_POST['truckType']);
    $user->setAddExternalCarrier($_POST['addExternalCarrier']);
    $user->setTrailerType($_POST['trailerType']);
    $user->setFactoringCompany($_POST['factoringCompany']);
    $user->setStatusType($_POST['statusType']);
    $user->setCustomsBroker($_POST['customsBroker']);
    $user->setLoadType($_POST['loadType']);
    $user->setOwnerOperator($_POST['ownerOperator']);
    $user->setFixPayCategory($_POST['fixPayCategory']);
    $user->insert($user,$db,$helper);
    echo "Data Added Successfully";
}

//import shipper
else if ($_GET['type'] == 'import_user') {

    $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'upload/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $user = new User();
        $user->importExcel($targetPath, $helper);
        echo 'File Upload Successfully';
    }
}

// export excel function here
else if ($_GET['type'] == 'export_user') {
    $user = new User();
    $user->exportUser($db);
}

//// delete function here
//else if ($_GET['type'] == 'delete_shipper') {
//    $user = new Shipper();
//    $user->setId($_POST['id']);
//    $user->deleteShipper($user, $db);
//    echo 'Data Removed Successfully';
//}
//
//// update function here
//else if ($_GET['type'] == 'edit_shipper') {
//    $user = new Shipper();
//    $user->setId($_POST['id']);
//    $user->setCompanyId($_POST['companyid']);
//    $user->setShipperName($_POST['value']);
//    $user->setColumn($_POST['column']);
//    $user->updateShipper($user, $db);
//    echo 'Data Update Successfully';
//}