<?php

require 'model/BankDebitCategory.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

//Indert Data here
if ($_GET['type'] == 'bank_debit') {
    /*$options = array(
        'cluster' => 'ap2',
        'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
        '4ded3d01749ec39a35e6',
        '8814dbac3b53a29bac5c',
        '933904',
        $options
    );*/

    $debit = new BankDebitCategory();
    $debit->setId($helper->getNextSequence("bank_debit_category",$db));
    $debit->setCompanyID($_POST['companyId']);
    $debit->setCategoryName($_POST['bankName']);
    $debit->Insert($debit,$db,$helper);

   /* $data['message'] = $_POST['bankName'];
    $pusher->trigger('my-channel', 'my-event', $data);*/
}

// delete function here
else if ($_GET['type'] == 'delete_bank_term'){
    $debit = new BankDebitCategory();
    $debit->setId($_POST['id']);
    $debit->deleteBankDebit($debit,$db);
}

// edit function here
else if ($_GET['type'] == 'edit_bank_term'){
    $debit = new BankDebitCategory();
    $debit->setId($_POST['id']);
    $debit->setCompanyID($_POST['companyId']);
    $debit->setCategoryName($_POST['value']);
    $debit->setColumn($_POST['column']);
    $debit->updateBankDebit($debit,$db);
}

// export excel function here
else if ($_GET['type'] == 'export_bank_terms') {
    $debit = new BankDebitCategory();
    $debit->export_Excel($db);
}

// Import Excel Here
else if ($_GET['type'] == 'import_Excel') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $debit = new BankDebitCategory();
        $debit->import_Debit($targetPath,$helper,$db);
    }
}

