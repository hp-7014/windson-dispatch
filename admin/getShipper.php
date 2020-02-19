<?php
session_start();
require "../database/connection.php";
$show_shipper = $db->shipper->find(['companyID' => $_SESSION['companyId']]);
$no = 1;
foreach ($show_shipper as $showshipper) {
    $shipper = $showshipper['shipper'];
    foreach ($shipper as $sshi) {

        echo "<option value="."'".$sshi['_id'].") ".$sshi['shipperName']."'"."</option>";

    } }