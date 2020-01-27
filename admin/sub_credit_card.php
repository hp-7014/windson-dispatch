<?php

require 'model/Sub_Credit_Card.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Add Credit Here
if ($_GET['type'] == 'sub_credit_card') {
    $sub_card = new SubCredit();
    $sub_card->setId($helper->getNextSequence("sub_credit_card",$db));
    $sub_card->setCompanyID($_POST['companyId']);
    $sub_card->setDisplayName($_POST['displayName']);
    $sub_card->setMainCard($_POST['mainCard']);
    $sub_card->setCardHolderName($_POST['cardHolderName']);
    $sub_card->setCardNo($_POST['cardNo']);

    $sub_card->Insert($sub_card,$db,$helper);

}

// Import Excel Here
else if ($_GET['type'] == 'import_sub_credit') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $sub_card = new SubCredit();
        $sub_card->import_sub_Credit($targetPath,$helper);
    }
}

// Edit Data Here
else if ($_GET['type'] == 'edit_sub_credit') {
    $s_credit = new SubCredit();
    $s_credit->setId($_POST['id']);
    $s_credit->setCompanyID($_POST['companyId']);
    $s_credit->setDisplayName($_POST['value']);
    $s_credit->setColumn($_POST['column']);
    $s_credit->update_Sub_Credit($s_credit,$db);
}

// Edit Data Here
else if ($_GET['type'] == 'edit_card_type') {
    $m_card = new SubCredit();
    $m_card->setId($_POST['id']);
    $m_card->setCompanyID($_POST['companyId']);
    $m_card->setMainCard($_POST['mainCard']);
    $m_card->setColumn($_POST['column']);
    $m_card->update_main_Card($m_card,$db);
}


// Delete Data Here
else if ($_GET['type'] == 'delete_sub_credit') {
    $s_credit = new SubCredit();
    $s_credit->setId($_POST['id']);
    $s_credit->$_POST['delete_status'];

    $s_credit->delete_Sub_Credit($s_credit,$db);
}

// Export Data Here
else if ($_GET['type'] == 'export_sub_credit') {
    $s_credit = new SubCredit();
    $s_credit->export_Sub_Credit($db);
}



