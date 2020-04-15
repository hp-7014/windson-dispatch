<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if ($_GET['type'] == 'getdriver') {
    $year = (int)$_POST['year'];
    $month = $_POST['month'];
    $collection = $db->payment_bank;
    $show1 = $collection->aggregate([
            ['$match'=>['companyID'=>$_SESSION['companyId'],'year'=>$year]],
            ['$unwind'=>'$'.$month],
            ['$match'=>[$month.'.payto'=>"driver"]]
            ]);
            $table = "";
            $i = 0;
            $mon = array();
            foreach($show1 as $row) {
                $id = $row['_id'];
                $k = 0;
                $mon[$k]= $row[$month];
                $k++;
                foreach($mon as $row1) {
                    $i++;
                    $docid = $row1['_id'];
                    $paymentfrom = $row1['paymentfrom'];
                    $companyselect = $row1['companyselect'];
                    $bankname = $row1['bankname'];
                    $payto = $row1['payto'];
                    $driver = $row1['driver'];
                    $debitcategory = $row1['debitcategory'];
                    $amount = $row1['amount'];
                    $advance = $row1['advance'];
                    $finalamount = $row1['finalamount'];
                    $checkdate = $row1['checkdate'];
                    $cheque = $row1['cheque'];
                    $ach = $row1['ach'];
                    $memo = $row1['memo'];

                    echo $table .= "<td>$i</td>
                    <td>$paymentfrom</td>
                    <td>$companyselect</td>
                    <td>$bankname</td>
                    <td>$payto</td>
                    <td>$driver</td>
                    <td>$debitcategory</td>
                    <td>$amount</td>
                    <td>$advance</td>
                    <td>$finalamount</td>
                    <td>$checkdate</td>
                    <td>$cheque</td>
                    <td>$ach</td>
                    <td>$memo</td>";
                }
            }
}