<?php
session_start();
require "../database/connection.php";
$show_consignee = $db->consignee->find(['companyID' => $_SESSION['companyId']]);
$no = 1;
foreach ($show_consignee as $showconsignee) {
    $consignee = $showconsignee['consignee'];
    foreach ($consignee as $scon) {

        echo "<option value="."'".$scon['_id'].") ".$scon['consigneeName']."'"."</option>";

    } }