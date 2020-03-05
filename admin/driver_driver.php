<?php

require 'model/Driver.php';
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

// insert consignee
if ($_GET['type'] == 'addDriver') {
    $driver = new Driver();
    $driver->setId($helper->getNextSequence("driver",$db));
    $driver->setCompanyID($_SESSION['companyId']);
    $driver->setDriverName($_POST['driverName']);
    $driver->setDriverUsername($_POST['driverUsername']);
    $driver->setDriverPassword($_POST['driverPassword']);
    $driver->setDriverTelephone($_POST['driverTelephone']);
    $driver->setDriverAlt($_POST['driverAlt']);
    $driver->setDriverEmail($_POST['driverEmail']);
    $driver->setDriverAddress($_POST['driverAddress']);
    $driver->setDriverLocation($_POST['driverLocation']);
    $driver->setDriverZip($_POST['driverZip']);
    $driver->setDriverStatus($_POST['driverStatus']);
    $driver->setDriverSocial($_POST['driverSocial']);
    $driver->setDateOfbirth(strtotime($_POST['dateOfbirth']));
    $driver->setDateOfhire(strtotime($_POST['dateOfhire']));
    $driver->setDriverLicenseNo($_POST['driverLicenseNo']);
    $driver->setDriverLicenseIssue($_POST['driverLicenseIssue']);
    $driver->setDriverLicenseExp(strtotime($_POST['driverLicenseExp']));
    $driver->setDriverLastMedical(strtotime($_POST['driverLastMedical']));
    $driver->setDriverNextMedical(strtotime($_POST['driverNextMedical']));
    $driver->setDriverLastDrugTest(strtotime($_POST['driverLastDrugTest']));
    $driver->setDriverNextDrugTest(strtotime($_POST['driverNextMedical']));
    $driver->setPassportExpiry(strtotime($_POST['passportExpiry']));
    $driver->setFastCardExpiry(strtotime($_POST['fastCardExpiry']));
    $driver->setHazmatExpiry(strtotime($_POST['hazmatExpiry']));
    $driver->setRate($_POST['rate']);
    $driver->setCurrency($_POST['currency']);
    $driver->setDriverLoadedMile($_POST['driverLoadedMile']);
    $driver->setDriverEmptyMile($_POST['driverEmptyMile']);
    $driver->setPickupRate($_POST['pickupRate']);
    $driver->setPickputAfter($_POST['pickupAfter']);
    $driver->setDropRate($_POST['dropRate']);
    $driver->setDropAfter($_POST['dropAfter']);
    $driver->settarp($_POST['tarp']);
    $driver->setTerminationDate(strtotime($_POST['terminationDate']));
    $driver->setInternalNote($_POST['InternalNote']);
    $driver->setRecurrenceAdd($_POST['installmentCategoryStore']);
    $driver->insert($driver,$db,$helper);
    echo "Data Added Successfully";
}

//import driver
else if ($_GET['type'] == 'importDriver') {

    $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'upload/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $driver = new Driver();
        $driver->importExcel($targetPath, $helper);
        echo 'File Upload Successfully';
    }
}

// update function here
else if ($_GET['type'] == 'editDriver') {
    $driver = new Driver();
    $driver->setId($_POST['id']);
    $driver->setDriverName($_POST['value']);
    $driver->setColumn($_POST['column']);
    $driver->updateDriver($driver, $db);
    echo 'Data Update Successfully';
}

// Delete function here
else if ($_GET['type'] == 'delete_Driver') {
    $driver = new Driver();
    $driver->setId($_POST['id']);
    $driver->deleteDrivers($driver, $db);
    echo 'Data Removed Successfully';
}

// Export Excel Here
else if ($_GET['type'] == 'export_driver') {
    $driver = new Driver();
    $driver->exportDriver($db);
}




