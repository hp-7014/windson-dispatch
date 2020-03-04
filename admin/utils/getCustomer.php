<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->customer->find(['companyID' => $_SESSION['companyId']]);
$no = 0;
$table = "";
$list = "";
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

        $type = '"text"';

        $custNameColumn = '"custName"';
        $custAddressColumn = '"custAddress"';
        $custLocationColumn = '"custLocation"';
        $custZipColumn = '"custZip"';
        $billingAddressColumn = '"billingAddress"';
        $billingLocationColumn = '"billingLocation"';
        $billingZipColumn = '"billingZip"';
        $primaryContactColumn = '"primaryContact"';
        $custTelephoneColumn = '"custTelephone"';
        $custExtColumn = '"custExt"';
        $custEmailColumn = '"custEmail"';
        $custFaxColumn = '"custFax"';
        $billingContactColumn = '"billingContact"';
        $billingEmailColumn = '"billingEmail"';
        $billingTelephoneColumn = '"billingTelephone"';
        $billingExtColumn = '"billingExt"';
        $URSColumn = '"URS"';
        $currencySettingColumn = '"currencySetting"';
        $paymentTermsColumn = '"paymentTerms"';
        $creditLimitColumn = '"creditLimit"';
        $salesRepColumn = '"salesRep"';
        $factoringCompanyColumn = '"factoringCompany"';
        $federalIDColumn = '"federalID"';
        $workerCompColumn = '"workerComp"';
        $websiteURLColumn = '"websiteURL"';
        $internalNotesColumn = '"internalNotes"';
        $MCColumn = '"MC"';

        $no += 1;
        $table .= "
        <tr>
            <th>$no</th>
                                        <td>
                                            <a href='#' id='1custName$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$custNameColumn)' class='text-overflow'>$custName</a>
                                            <button type='button' id='custName$id' style='display:none; margin-left:6px;' onclick='updateCustomer($custNameColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1custAddress$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$custAddressColumn)' class='text-overflow'>$custAddress</a>
                                            <button type='button' id='custAddress$id' style='display:none; margin-left:6px;' onclick='updateCustomer($custAddressColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1custLocation$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$custLocationColumn)' class='text-overflow'>$custLocation</a>
                                            <button type='button' id='custLocation$id' style='display:none; margin-left:6px;' onclick='updateCustomer($custLocationColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1custZip$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$custZipColumn)' class='text-overflow'>$custZip</a>
                                            <button type='button' id='custZip$id' style='display:none; margin-left:6px;' onclick='updateCustomer($custZipColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1billingAddress$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$billingAddressColumn)' class='text-overflow'>$billingAddress</a>
                                            <button type='button' id='billingAddress$id' style='display:none; margin-left:6px;' onclick='updateCustomer($billingAddressColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1billingLocation$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$billingLocationColumn)' class='text-overflow'>$billingLocation</a>
                                            <button type='button' id='billingLocation$id' style='display:none; margin-left:6px;' onclick='updateCustomer($billingLocationColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1billingZip$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$billingZipColumn)' class='text-overflow'>$billingZip</a>
                                            <button type='button' id='billingZip$id' style='display:none; margin-left:6px;' onclick='updateCustomer($billingZipColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1primaryContact$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$primaryContactColumn)' class='text-overflow'>$primaryContact</a>
                                            <button type='button' id='primaryContact$id' style='display:none; margin-left:6px;' onclick='updateCustomer($primaryContactColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1custTelephone$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$custTelephoneColumn)' class='text-overflow'>$custTelephone</a>
                                            <button type='button' id='custTelephone$id' style='display:none; margin-left:6px;' onclick='updateCustomer($custTelephoneColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1custExt$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$custExtColumn)' class='text-overflow'>$custExt</a>
                                            <button type='button' id='custExt$id' style='display:none; margin-left:6px;' onclick='updateCustomer($custExtColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1custEmail$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$custEmailColumn)' class='text-overflow'>$custEmail</a>
                                            <button type='button' id='custEmail$id' style='display:none; margin-left:6px;' onclick='updateCustomer($custEmailColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1custFax$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$custFaxColumn)' class='text-overflow'>$custFax</a>
                                            <button type='button' id='custFax$id' style='display:none; margin-left:6px;' onclick='updateCustomer($custFaxColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1billingContact$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$billingContactColumn)' class='text-overflow'>$billingContact</a>
                                            <button type='button' id='billingContact$id' style='display:none; margin-left:6px;' onclick='updateCustomer($billingContactColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1billingEmail$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$billingEmailColumn)' class='text-overflow'>$billingEmail</a>
                                            <button type='button' id='billingEmail$id' style='display:none; margin-left:6px;' onclick='updateCustomer($billingEmailColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1billingTelephone$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$billingTelephoneColumn)' class='text-overflow'>$billingTelephone</a>
                                            <button type='button' id='billingTelephone$id' style='display:none; margin-left:6px;' onclick='updateCustomer($billingTelephoneColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='custName1' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$billingExtColumn)' class='text-overflow'>$billingExt</a>
                                            <button type='button' id='custName' style='display:none; margin-left:6px;' onclick='updateCustomer($billingExtColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1billingExt$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$URSColumn)' class='text-overflow'>$URS</a>
                                            <button type='button' id='billingExt$id' style='display:none; margin-left:6px;' onclick='updateCustomer($URSColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1URS$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$currencySettingColumn)' class='text-overflow'>$MC</a>
                                            <button type='button' id='URS$id' style='display:none; margin-left:6px;' onclick='updateCustomer($currencySettingColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1currencySetting$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$paymentTermsColumn)' class='text-overflow'>$currencySetting</a>
                                            <button type='button' id='currencySetting$id' style='display:none; margin-left:6px;' onclick='updateCustomer($paymentTermsColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1paymentTerms$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$creditLimitColumn)' class='text-overflow'>$paymentTerms</a>
                                            <button type='button' id='paymentTerms$id' style='display:none; margin-left:6px;' onclick='updateCustomer($creditLimitColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1creditLimit$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$salesRepColumn)' class='text-overflow'>$creditLimit</a>
                                            <button type='button' id='creditLimit$id' style='display:none; margin-left:6px;' onclick='updateCustomer($salesRepColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1salesRep$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$factoringCompanyColumn)' class='text-overflow'>$salesRep</a>
                                            <button type='button' id='salesRep$id' style='display:none; margin-left:6px;' onclick='updateCustomer($factoringCompanyColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1factoringCompany$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$federalIDColumn)' class='text-overflow'>$factoringCompany</a>
                                            <button type='button' id='factoringCompany$id' style='display:none; margin-left:6px;' onclick='updateCustomer($federalIDColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1federalID$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$workerCompColumn)' class='text-overflow'>$federalID</a>
                                            <button type='button' id='federalID$id' style='display:none; margin-left:6px;' onclick='updateCustomer($workerCompColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1workerComp$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$websiteURLColumn)' class='text-overflow'>$workerComp</a>
                                            <button type='button' id='workerComp$id' style='display:none; margin-left:6px;' onclick='updateCustomer($websiteURLColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1websiteURL$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$internalNotesColumn)' class='text-overflow'>$websiteURL</a>
                                            <button type='button' id='websiteURL$id' style='display:none; margin-left:6px;' onclick='updateCustomer($internalNotesColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td>
                                            <a href='#' id='1MC$id' data-type='textarea' onclick='showTextarea(this.id,$type,$id,$MCColumn)' class='text-overflow'>$internalNotes</a>
                                            <button type='button' id='MC$id' style='display:none; margin-left:6px;' onclick='updateCustomer($MCColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                        </td>
                                        <td><a href='#' onclick='deleteCustomer($id)'><i
                                                        class='mdi mdi-delete-sweep-outline'
                                                        style='font-size: 20px; color: #FC3B3B'></i></a></td>
                                        
        </tr>
        ";
        $value = "'".$id.')&nbsp;'.$custName."'";
        $list .= "<option value=$value></option>";
    }
}

echo $table."^".$list;