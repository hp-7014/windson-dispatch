<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->customer->find(['companyID' => $_SESSION['companyId']]);
$no = 0;
foreach ($show as $row) {
    $show1 = $row['customer'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $custName = $row1['custName'];
        $custAddress = $row1['custAddress'];
        $custLocation = $row1['custLocation'];
        $custZip = $row1['custZip'];
        $billingAddress = $row1['billingAddress'];
        $billingLocation = $row1['billingLocation'];
        $billingZip = $row1['billingZip'];
        $primaryContact = $row1['primaryContact'];
        $custTelephone = $row1['custTelephone'];
        $custExt = $row1['custExt'];
        $custEmail = $row1['custEmail'];
        $custFax = $row1['custFax'];
        $billingContact = $row1['billingContact'];
        $billingEmail = $row1['billingEmail'];
        $billingTelephone = $row1['billingTelephone'];
        $billingExt = $row1['billingExt'];
        $URS = $row1['URS'];
        $currencySetting = $row1['currencySetting'];
        $paymentTerms = $row1['paymentTerms'];
        $creditLimit = $row1['creditLimit'];
        $salesRep = $row1['salesRep'];
        $factoringCompany = $row1['factoringCompany'];
        $federalID = $row1['federalID'];
        $workerComp = $row1['workerComp'];
        $websiteURL = $row1['websiteURL'];
        $internalNotes = $row1['internalNotes'];
        $MC = $row1['MC'];
        $type = 'text';
        $no += 1;
        echo "
        <tr>
            <th>$no</th>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$custName</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$custAddress</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$custLocation</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$custZip</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$billingLocation</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$billingZip</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$primaryContact</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$custTelephone</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$custExt</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$custEmail</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$custFax</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$billingContact</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$billingEmail</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$billingTelephone</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$billingExt</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$URS</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$MC</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$currencySetting</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$paymentTerms</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$creditLimit</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$salesRep</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$factoringCompany</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$federalID</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$workerComp</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$websiteURL</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' class='text-overflow'>$internalNotes</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        
        </tr>
        ";
    }
}