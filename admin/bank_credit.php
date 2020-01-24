<?php

require 'model/Credit_Card_Admin.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Add Credit Here
if ($_GET['type'] == 'credit_card') {
    $credit_admin = new CreditCard();
    $credit_admin->setId($helper->getNextSequence("credit_admin",$db));
    $credit_admin->setCompanyID($_POST['companyId']);
    $credit_admin->setName($_POST['Name']);
    $credit_admin->setDisplayName($_POST['displayName']);
    $credit_admin->setCardType($_POST['cardType']);
    $credit_admin->setCardHolderName($_POST['cardHolderName']);
    $credit_admin->setCardNo($_POST['cardNo']);
    $credit_admin->setOpeningBalanceDt($_POST['openingBalanceDt']);
    $credit_admin->setCardLimit($_POST['cardLimit']);
    $credit_admin->setOpeningBalance($_POST['openingBalance']);
    $credit_admin->setTransacBalance($_POST['transacBalance']);
    $credit_admin->Insert($credit_admin,$db,$helper);

}

// Export Credit Here
else if ($_GET['type'] == 'export_credit') {
    $b_credit = new CreditCard();
    $b_credit->export_Bank_Credit($db);
}

// Import Excel Here
else if ($_GET['type'] == 'import_bank_credit') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $b_credit = new CreditCard();
        $b_credit->import_Bank_Credit($targetPath,$helper);
    }
}

// Delete Credit Here
else if ($_GET['type'] == 'delete_credit') {
    $b_credit = new CreditCard();
    $b_credit->setId($_POST['id']);
    $b_credit->delete_Credits($b_credit,$db);
}

// Edit Credit Here
else if ($_GET['type'] == 'edit_credit') {
    $b_credit = new CreditCard();
    $b_credit->setId($_POST['id']);
    $b_credit->setCompanyID($_POST['companyId']);
    $b_credit->setName($_POST['value']);
    $b_credit->setColumn($_POST['column']);
    $b_credit->update_Credit($b_credit,$db);
}

