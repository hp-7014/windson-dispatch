<?php
session_start();
require "../database/connection.php";

if ($_GET['type'] == "driverDataFetch") {

    $collection = $db->driver;
    $show1 = $collection->aggregate([
        ['$lookup' => [
            'from' => 'currency_add',
            'localField' => 'companyID',
            'foreignField' => 'companyID',
            'as' => 'DriverDetail'
        ]],
        ['$match' => ['companyID' => (int)$_SESSION['companyId']]],
        ['$unwind' => '$driver'],
        ['$match' => ['driver._id' => (int)$_POST['id']]],
    ]);
    foreach ($show1 as $row) {
        $id = $row['_id'];
        $driver[$id] = $row['driver'];
        $driverDetails = $row['DriverDetail'];
        foreach ($driverDetails as $row3) {
            $currency = $row3['currency'];
            $currencyType = array();
            foreach ($currency as $c) {
                $currencyId = $c['_id'];
                $currencyType[$currencyId] = $c['currencyType'];
            }
        }
        foreach ($driver as $row2) {
            $row2['masterID'] = $id;
            if ($row2['dateOfbirth'] == false) {
                $row2['dateOfbirth'] = '';
            } else {
                $row2['dateOfbirth'] = date("Y-m-d", $row2['dateOfbirth']);
            }

            if ($row2['dateOfhire'] == false) {
                $row2['dateOfhire'] = '';
            } else {
                $row2['dateOfhire'] = date("Y-m-d", $row2['dateOfhire']);
            }

            if ($row2['driverLicenseExp'] == false) {
                $row2['driverLicenseExp'] = '';
            } else {
                $row2['driverLicenseExp'] = date("Y-m-d", $row2['driverLicenseExp']);
            }

            if ($row2['driverLastMedical'] == false) {
                $row2['driverLastMedical'] = '';
            } else {
                $row2['driverLastMedical'] = date("Y-m-d", $row2['driverLastMedical']);
            }

            if ($row2['driverNextMedical'] == false) {
                $row2['driverNextMedical'] = '';
            } else {
                $row2['driverNextMedical'] = date("Y-m-d", $row2['driverNextMedical']);
            }

            if ($row2['driverLastDrugTest'] == false) {
                $row2['driverLastDrugTest'] = '';
            } else {
                $row2['driverLastDrugTest'] = date("Y-m-d", $row2['driverLastDrugTest']);
            }

            if ($row2['driverNextDrugTest'] == false) {
                $row2['driverNextDrugTest'] = '';
            } else {
                $row2['driverNextDrugTest'] = date("Y-m-d", $row2['driverNextDrugTest']);
            }

            if ($row2['passportExpiry'] == false) {
                $row2['passportExpiry'] = '';
            } else {
                $row2['passportExpiry'] = date("Y-m-d", $row2['passportExpiry']);
            }

            if ($row2['fastCardExpiry'] == false) {
                $row2['fastCardExpiry'] = '';
            } else {
                $row2['fastCardExpiry'] = date("Y-m-d", $row2['fastCardExpiry']);
            }

            if ($row2['hazmatExpiry'] == false) {
                $row2['hazmatExpiry'] = '';
            } else {
                $row2['hazmatExpiry'] = date("Y-m-d", $row2['hazmatExpiry']);
            }

            if ($row2['terminationDate'] == false) {
                $row2['terminationDate'] = '';
            } else {
                $row2['terminationDate'] = date("Y-m-d", $row2['terminationDate']);
            }
            $row2['currency'] = $row2['currency'] . ") " . $currencyType[$row2['currency']];
            $i = 0;
            $j = 0;
            foreach ($row2['recurrenceSubtract'] as $subRecArr) {
                $row2['installmentSub'][] = $subRecArr['installmentCategoryStore'];
                $row2['installmentTypSub'][] = $subRecArr['installmentTypeStore'];
                $row2['amountStoSub'][] = $subRecArr['amountStore'];
                $row2['installmentStoSub'][] = $subRecArr['installmentStore'];
                $row2['startNoStoSub'][] = $subRecArr['startNoStore'];
                $row2['startDateStoSub'][] = $subRecArr['startDateStore'];
                $row2['internalNoteStoSub'][] = $subRecArr['internalNoteStore'];
                $j++;
            }
            $row2['subRecLength'] = $j;

            foreach ($row2['recurrenceAdd'] as $addRecArr) {
                $row2['installmentAdd'][] = $addRecArr['installmentCategoryStore'];
                $row2['installmentTypAdd'][] = $addRecArr['installmentTypeStore'];
                $row2['amountStoAdd'][] = $addRecArr['amountStore'];
                $row2['installmentStoAdd'][] = $addRecArr['installmentStore'];
                $row2['startNoStoAdd'][] = $addRecArr['startNoStore'];
                $row2['startDateStoAdd'][] = $addRecArr['startDateStore'];
                $row2['internalNoteStoAdd'][] = $addRecArr['internalNoteStore'];
                $i++;
            }
            $row2['addRecLength'] = $i;

            // send data to main function
            $r = $row2;
        }
    }
    echo json_encode($r);
}