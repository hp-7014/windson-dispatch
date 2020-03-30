<?php

require 'model/Fixpay.php';
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

        $fixpay = new Fixpay();
        $fixpay->importExcel($targetPath,$helper,$db);
    }

}

// Insert Fix Pay Function Here
else if ($_GET['type'] == 'fixpayadd') {
    $fixpay = new Fixpay();
    $fixpay->setId($helper->getNextSequence("fixpaycount",$db));
    $fixpay->setCompanyID($_POST['companyID']);
    $fixpay->setFixpay($_POST['fixpay']);
    $fixpay->Insert($fixpay,$db,$helper);
    echo "Data Insert Successful";
}

// Update FixPay Function Here
else if ($_GET['type'] == 'edit_fixpay'){
    $fixpay = new Fixpay();
    $fixpay->setId($_POST['id']);
    $fixpay->setCompanyID($_POST['companyID']);
    $fixpay->setFixpay($_POST['value']);
    $fixpay->setColumn($_POST['column']);
    $fixpay->updatefixpay($fixpay,$db);
    echo "Data Update Successful";
}

// Delete Fix Pay Function Here
else if ($_GET['type'] == 'delete_fixpay'){
    $fixpay = new Fixpay();
    $fixpay->setId($_POST['id']);
    $fixpay->deletefixpay($fixpay,$db);
    echo "Data Removed Successful";
}

// Export Excel Function Here
else if ($_GET['type'] == 'export_fixpay'){
    $fixpay = new Fixpay();
    $fixpay->exportfixpay($db);
}

