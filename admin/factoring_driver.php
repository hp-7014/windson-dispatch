<?php

require 'model/Factoring.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Insert Factoring Function Here
if ($_GET['type'] == 'factoringadd') {
    $factoring = new Factoring();
    $factoring->setId($helper->getNextSequence("factoringcompanycount",$db));
    $factoring->setCompanyID($_POST['companyId']);
    $factoring->setFactoringCompanyname($_POST['factoring_company']);
    $factoring->setAddress($_POST['faddress']);
    $factoring->setLocation($_POST['flocation']);
    $factoring->setZip($_POST['fzip']);
    $factoring->setPrimaryContact($_POST['fprimary_contact']);
    $factoring->setTelephone($_POST['factoringtelephone']);
    $factoring->setExtFactoring($_POST['fext']);
    $factoring->setFax($_POST['ffax']);
    $factoring->setTollFree($_POST['ftollfree']);
    $factoring->setEmail($_POST['femail']);
    $factoring->setSecondaryContact($_POST['fsecondaryContact']);
    $factoring->setFactoringtelephone($_POST['ftelephone']);
    $factoring->setExt($_POST['ext']);
    $factoring->setCurrencySetting($_POST['fcurrency']);
    $factoring->setPaymentTerms($_POST['fpaymentterms']);
    $factoring->setTaxID($_POST['ftaxid']);
    $factoring->setInternalNote($_POST['finternal_notes']);
    $factoring->Insert($factoring,$db,$helper);
    echo "Data Insert Successful";
}

// Update Factoring Function Here
else if ($_GET['type'] == 'edit_factoring'){
    $factoring = new Factoring();
    $factoring->setId($_POST['id']);
    $factoring->setCompanyID($_POST['companyId']);
    $factoring->setFactoringCompanyname($_POST['value']);
    $factoring->setColumn($_POST['column']);
    $factoring->updateFactoring($factoring,$db);
    echo "Data Update Successful";
}

// Delete Factoring Function Here
else if ($_GET['type'] == 'delete_factoring'){
    $factoring = new Factoring();
    $factoring->setId($_POST['id']);
    $factoring->setCurrencySetting($_POST['currencySetting']);
    $factoring->setPaymentTerms($_POST['paymentid']);
    $factoring->deleteFactoring($factoring,$db,$helper);
    echo "Data Removed Successful";
}

// Export Excel Function Here
elseif ($_GET['type'] == 'export_factoring'){
    $factoring = new Factoring();
    $factoring->exportFactoring($db);
}