<?php

require 'model/Currency.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Insert Currency Function Here
if ($_GET['type'] == 'currencyadd') {
    $currency = new Currency();
    $currency->setId($helper->getNextSequence("currencycount",$db));
    $currency->setCompanyID($_SESSION['companyId']);
    $currency->setCurrencyType($_POST['currencyType']);
    $currency->Insert($currency,$db,$helper);
    echo "Data Insert Successful";
}

// Update Currency Function Here
else if ($_GET['type'] == 'edit_currency'){
    $currency = new Currency();
    $currency->setId($_POST['id']);
    $currency->setCompanyID($_POST['companyID']);
    $currency->setCurrencyType($_POST['value']);
    $currency->setColumn($_POST['column']);
    $currency->updateCurrency($currency,$db);
    echo "Data Update Successful";
}

// Delete Currency Function Here
else if ($_GET['type'] == 'delete_currency'){
    $currency = new Currency();
    $currency->setId($_POST['id']);
    $currency->deleteCurrency($currency,$db);
    echo "Data Removed Successful";
}

// import excel here
else if ($_GET['type'] == 'importExcel_cur') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $currency = new Currency();
        $currency->importExcel_Currency($targetPath,$helper,$db);
    }

}

// Export Excel Function Here
else if ($_GET['type'] == 'export_currency'){
    $currency = new Currency();
    $currency->exportCurrency($db);
}