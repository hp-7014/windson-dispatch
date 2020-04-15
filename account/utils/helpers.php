<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if ($_GET['type'] == 'updatecompanyfields') {
    $id = (int)$_POST['companyname'];
    $collection = $db->bank_admin;
    $show1 = $collection->aggregate([
        ['$match' => ['companyID' => $_SESSION['companyId']]],
        ['$unwind' => '$admin_bank'],
        ['$match' => ['admin_bank.accountHolder' => "$id"]]
    ]);
    $i = 0;
    foreach ($show1 as $row) {
    $admin_bank = array();
    $k = 0;
    $admin_bank[$k] = $row['admin_bank'];
    $k++;
    foreach ($admin_bank as $row) {
            $r['bankid'][] = $row['_id'];
            $r['bankname'][] = $row['bankName'];
            $r['openingBalance'] = $row['openingBalance'];
            $i++;
       }
        $r['arrayLength'] = $i;
        $output = $r;
    }
    echo json_encode($output);
}

// driver invoice
if ($_GET['type'] == 'updateDriverInvoice') {
    $driverid = (int)$_POST['driverName'];
    $collection = $db->Invoiced;
    $show1 = $collection->aggregate([
        ['$match' => ['companyID' => $_SESSION['companyId']]],
        ['$unwind' => '$load'],
        ['$match' => ['load.driver_name' => "$driverid"]]
    ]);
    $i = 0;
    foreach ($show1 as $row) {
        $Invoiced = array();
        $k = 0;
        $Invoiced[$k] = $row['load'];
        $k++;
        foreach ($Invoiced as $row) {
            $a['driverid'][] = $row['_id'];
            $a['drivertotal'][] = $row['driver_total'];
            $i++;
            $other_charges_modal = $row['other_charges_modal'];
            foreach ($other_charges_modal as $row2) {
                $a['advance'][] = $row2['amount'];
            }
        }
        $a['arraysize'] = $i;
        $result = $a;
    }
    echo json_encode($result);
}

// carrier invoice
if ($_GET['type'] == 'CarrierInvoice') {
    $show = $db->carrier->aggregate([
        ['$lookup' => [
            'from' => 'Invoiced',
            'localField' => 'companyID',
            'foreignField' => 'companyID',
            'as' => 'company'
        ]],
        ['$match' => ['companyID' => (int)$_SESSION['companyId']]]
    ]);
    $cid = $_POST['carrierName'];
    $i = 0;
    foreach ($show as $show1) {
        foreach ($show1['carrier'] as $car) {
            if ($cid == $car['_id']) {
                $carrierID = $car['_id'];
                break;
            }
        }
        foreach ($show1['company'] as $s) {
            foreach ($s['load'] as $a) {
                if ($a['carrier_name'] == $carrierID) {
                    $r['invoiceId'][] = $a['_id'];
                    $r['carrierAmount'][] = $a['carrier_total'];
                    $i++;
                }
            }
            $r['arrayLength'] = $i;
            $output = $r;
        }
    }
    echo json_encode($output);
}

// factoring invoice
if ($_GET['type'] == 'factoringInvoice') {
    $collection = $db->carrier;
    $show = $collection->aggregate([
        ['$lookup' => [
            'from' => 'Invoiced',
            'localField' => 'companyID',
            'foreignField' => 'companyID',
            'as' => 'active'
        ]],
        ['$match' => ['companyID' => (int)$_SESSION['companyId']]],
        ['$unwind' => '$carrier'],
        ['$match' => ['carrier.factoringCompany' => $_POST['factoringName']]],
    ]);
    $i = 0;
    foreach ($show as $row) {
        $carrier = array();
        $k = 0;
        $carrier[$k] = $row['carrier'];
        $k++;
        $carrierid = array();
        $active = $row['active'];
        foreach ($carrier as $row1) {
            $carrierid[] = $row1['_id'];
        }
        foreach ($active as $row2) {
            $invoice = $row2['load'];
            foreach ($invoice as $row3) {
                for ($l = 0; $l < sizeof($carrierid); $l++) {
                    if ($carrierid[$l] == $row3['carrier_name']) {
                        $c['factoringInvoice'][] = $row3['_id'];
                        $c['factoringAmount'][] = $row3['carrier_total'];
                        $i++;
                    }
                }
            }
            $c['arrayLength'] = $i;
            $p = $c;
        }
    }
    echo json_encode($p);
}

//base Amount
if ($_GET['type'] == 'basebalance') {
    $id = (int)$_POST['bankname'];
    $collection = $db->bank_admin;
    $show1 = $collection->aggregate([
        ['$match' => ['companyID' => $_SESSION['companyId']]],
        ['$unwind' => '$admin_bank'],
        ['$match' => ['admin_bank._id' => $id]]
    ]);
    $i = 0;
    foreach ($show1 as $row) {
    $admin_bank = array();
    $k = 0;
    $admin_bank[$k] = $row['admin_bank'];
    $k++;
    foreach ($admin_bank as $row) {
            $r['bankid'][] = $row['_id'];
            $r['openingBalance'] = $row['openingBalance'];
            $i++;
       }
        $output = $r;
    }
    echo json_encode($output);
}

//base Amount credit card
if ($_GET['type'] == 'basebalancecredit') {
    $id = (int)$_POST['creditcard'];
    $collection = $db->credit_card_admin;
    $creditbase = $collection->aggregate([
        ['$match' => ['companyID' => $_SESSION['companyId']]],
        ['$unwind' => '$admin_credit'],
        ['$match' => ['admin_credit._id' => $id]]
    ]);
    $i = 0;
    foreach ($creditbase as $row1) {
    $admin_credit = array();
    $j = 0;
    $admin_credit[$j] = $row1['admin_credit'];
    $j++;
    foreach ($admin_credit as $row2) {
            $d['bankid'][] = $row2['_id'];
            $d['openingBalancecredit'] = $row2['openingBalance'];
            $i++;
       }
        $output = $d;
    }
    echo json_encode($output);
}