<?php

require 'model/Bank_Admin.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Add Bank Here
if ($_GET['type'] == 'bank_admin') {
    $b_admin = new Bank_Admin();
    $b_admin->setId($helper->getNextSequence("bank_admin",$db));
    $b_admin->setCompanyID($_POST['companyId']);
    $b_admin->setBankName($_POST['bankName']);
    $b_admin->setBankAddresss($_POST['bankAddresss']);
    $b_admin->setAccountHolder($_POST['accountHolder']);
    $b_admin->setAccountNo($_POST['accountNo']);
    $b_admin->setRoutingNo($_POST['routingNo']);
    $b_admin->setOpeningBalDate($_POST['openingBalDate']);
    $b_admin->setOpeningBalance($_POST['openingBalance']);
    $b_admin->setCurrentcheqNo($_POST['currentcheqNo']);
    $b_admin->setTransacBalance($_POST['transacBalance']);
    $b_admin->Insert($b_admin,$db,$helper);

}

// Edit Bank Here
else if ($_GET['type'] == 'edit_bank') {
    $b_admin = new Bank_Admin();
    $b_admin->setId($_POST['id']);
    $b_admin->setCompanyID($_POST['companyId']);
    $b_admin->setBankName($_POST['value']);
    $b_admin->setColumn($_POST['column']);
    $b_admin->update_Bank($b_admin,$db);
}

// Edit Account Here
else if ($_GET['type'] == 'edit_account') {
    $acc = new Bank_Admin();
    $acc->setId($_POST['id']);
    $acc->setCompanyID($_POST['companyId']);
    $acc->setAccountHolder($_POST['accountHolder']);
    $acc->setColumn($_POST['column']);
    $acc->update_Account($acc,$db);
}

// Delete Bank Here
else if ($_GET['type'] == 'delete_bank') {
    $b_admin = new Bank_Admin();
    $b_admin->setId($_POST['id']);
    $b_admin->delete_Banks($b_admin,$db);
}

// Import Excel Here
else if ($_GET['type'] == 'import_admin_bank') {
    print_r($_FILES['file']);
    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $b_admin = new Bank_Admin();
        $b_admin->import_Bank_Admin($targetPath,$helper);
    }
}

// Export Excel Here
else if ($_GET['type'] == 'export_admin') {
    $b_admin = new Bank_Admin();
    $b_admin->export_Bank_A($db);
}



