<?php 

require 'model/BankCreditCategory.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Add Credit Here
if ($_GET['type'] == 'bank_credit') {
    $credit = new BankCreditCategory();
    $credit->setId($helper->getNextSequence("bank_credit_category",$db));
    $credit->setCompanyID($_POST['companyId']);
    $credit->setCategoryName($_POST['creditName']);
    $credit->Insert($credit,$db,$helper);

    /*$data['message'] = $_POST['bankName'];
    $pusher->trigger('my-channel', 'my-event', $data);*/
}

// edit function here
else if ($_GET['type'] == 'edit_bank_credit'){
    $credit = new BankCreditCategory();
    $credit->setId($_POST['id']);
    $credit->setCompanyID($_POST['companyId']);
    $credit->setCategoryName($_POST['value']);
    $credit->setColumn($_POST['column']);
    $credit->updateBankCredit($credit,$db);
}

// Delete Credit Here
else if ($_GET['type'] == 'delete_bank_credit') {
    $credit = new BankCreditCategory();
    $credit->setId($_POST['id']);
    $credit->deleteBankCredit($credit,$db);
}

// Import Credit Here
else if ($_GET['type'] == 'importCredit') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file1"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file1']['name'];
        move_uploaded_file($_FILES['file1']['tmp_name'], $targetPath);

        $credit = new BankCreditCategory();
        $credit->importCredit($targetPath,$helper,$db);
    }
}

// Export Credit Here
else if ($_GET['type'] == 'export_bank_credit') {
    $credit = new BankCreditCategory();
    $credit->exportExcelCredit($db);
}
