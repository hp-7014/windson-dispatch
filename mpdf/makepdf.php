<?php
session_start();
require "../database/connection.php"; 
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->Addpage('','A4','1','b','off');
$mpdf->SetWatermarkImage('WDS.png');
$mpdf->showWatermarkImage = true;
$mpdf->setFooter('[Load Number-17474], [Carrier Legal Name-PSM LINES LLC ]<br>page {PAGENO} / {nb}');
$data = '';
$no = 1;
$data .= '<!DOCTYPE html>
    <html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<table id="mainTable" class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Zip</th>
                                        <th>Billing Address</th>
                                        <th>Location</th>
                                        <th>Zip</th>
                                        <th>Primary Contact</th>
                                        <th>Telephone</th>
                                        <th>Ext</th>
                                        <th>Email</th>
                                        <th>Fax</th>
                                        <th>Billing Contact</th>
                                        <th>Billing Email</th>
                                        <th>Billing Telephone</th>
                                        <th>Ext</th>
                                        <th>URS</th>
                                        <th>M.C.</th>
                                        <th>Currency Setting</th>
                                        <th>Payment Terms</th>
                                        <th>Credit Limit $</th>
                                        <th>Sales Rep</th>
                                        <th>Factoring Company</th>
                                        <th>Federal ID</th>
                                        <th>Workers Comp #</th>
                                        <th>Website URL</th>
                                        <th>Internal Notes</th>
                                    </tr>
                                    </thead>
                                    <tbody>';
                        $show_data = $db->customer->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    foreach ($show_data as $show) {
                                        $show = $show["customer"];
                                        foreach ($show as $s) {
                                            $custName = $s["custName"];
                                            $custAddress = $s["custAddress"];
                                            $custLocation = $s["custLocation"];
                                            $custZip = $s["custZip"];
                                            $billingAddress = $s["billingAddress"];
                                            $billingLocation = $s["billingLocation"];
                                            $billingZip = $s["billingZip"];
                                            $primaryContact = $s["primaryContact"];
                                            $custTelephone = $s["custTelephone"];
                                            $custExt = $s["custExt"];
                                            $custEmail = $s["custEmail"];
                                            $custFax = $s["custFax"];
                                            $billingContact = $s["billingContact"];
                                            $billingEmail = $s["billingEmail"];
                                            $billingTelephone = $s["billingTelephone"];
                                            $billingExt = $s["billingExt"];
                                            $URS = $s["URS"];
                                            $MC = $s["MC"];
                                            $currencySetting = $s["currencySetting"];
                                            $paymentTerms = $s["paymentTerms"];
                                            $creditLimit = $s["creditLimit"];
                                            $salesRep = $s["salesRep"];
                                            $factoringCompany = $s["factoringCompany"];
                                            $federalID = $s["federalID"];
                                            $workerComp = $s["workerComp"];
                                            $websiteURL = $s["websiteURL"];
                                            $internalNotes = $s["internalNotes"];
                                            
$data .= '<tr>
                                                <td>' .$no++. '</td>
                                                <td>' .$custName. '</td>
                                                <td>' .$custAddress. '</td>
                                                <td>' .$custLocation. '</td>
                                                <td>' .$custZip. '</td>
                                                <td>' .$billingAddress. '</td>
                                                <td>' .$billingLocation. '</td>
                                                <td>' .$billingZip. '</td>
                                                <td>' .$primaryContact. '</td>
                                                <td>' .$custTelephone. '</td>
                                                <td>' .$custExt. '</td>
                                                <td>' .$custEmail. '</td>
                                                <td>' .$custFax. '</td>
                                                <td>' .$billingContact. '</td>
                                                <td>' .$billingEmail. '</td>
                                                <td>' .$billingTelephone. '</td>
                                                <td>' .$billingExt. '</td>
                                                <td>' .$URS. '</td>
                                                <td>' .$MC. '</td>
                                                <td>' .$currencySetting. '</td>
                                                <td>' .$paymentTerms. '</td>
                                                <td>' .$creditLimit. '</td>
                                                <td>' .$salesRep. '</td>
                                                <td>' .$factoringCompany. '</td>
                                                <td>' .$federalID. '</td>
                                                <td>' .$workerComp. '</td>
                                                <td>' .$websiteURL. '</td>
                                                <td>' .$internalNotes. '</td>
                                            </tr>';
                                        }
                                    }
$data .= '</tbody></table></body></html>';
$mpdf->WriteHTML($data);
$mpdf->Output();

?>