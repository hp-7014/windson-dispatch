<?php

require 'model/Currency.php';
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

        $currency = new Currency();
        $currency->importExcel($targetPath,$helper);
    }

}

// Insert Currency Function Here
else if ($_GET['type'] == 'currencyadd') {
    $currency = new Currency();
    $currency->setId($helper->getNextSequence("currencycount",$db));
    $currency->setCompanyID($_POST['companyID']);
    $currency->setCurrencyType($_POST['currencyType']);
    $currency->Insert($currency,$db,$helper);
    echo "Insert Currency Successful";
}

// Update Currency Function Here
else if ($_GET['type'] == 'edit_currency'){
    $currency = new Currency();
    $currency->setId($_POST['id']);
    $currency->setCompanyID($_POST['companyID']);
    $currency->setCurrencyType($_POST['value']);
    $currency->setColumn($_POST['column']);
    $currency->updateCurrency($currency,$db);
    echo "Update Currency Successful";
}

// Delete Currency Function Here
else if ($_GET['type'] == 'delete_currency'){
    $currency = new Currency();
    $currency->setId($_POST['id']);
    $currency->deleteCurrency($currency,$db);
    echo "Delete Currency Successful";
}

// Export Excel Function Here
else if ($_GET['type'] == 'export_currency'){
    $currency = new Currency();
    $currency->exportCurrency($db);
}