<?php
require 'model/Account.php';
//require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

//$helper = new Helper();

// Add Credit Here
if ($_GET['type'] == 'UpdateStatus') {
    $account = new Account();
    $account->setId($_POST['id']);
    $account->setValue($_POST['value']);
    $account->setSetStatusTimeColumn($_POST['statusTimeColumn']);
    $account->update($account,$db);
    echo "Data Update Successfully";
}