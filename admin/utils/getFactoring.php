<?php
session_start();
$helper = "helper";
$no = 0;
$type = 'text';
$factoringCol = 'factoringCompanyname';
require "../../database/connection.php";
$show = $db->factoring_company_add->find(['companyID' => $_SESSION['companyId']]);
foreach ($show as $row){
    $show1 = $row['factoring'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $factoringCompany = $row1['factoringCompanyname'];
        $address = $row1['address'];
        $location = $row1['location'];
        $zip = $row1['zip'];
        $primarycontact = $row1['primaryContact'];
        $factoringtelephone = $row1['telephone'];
        $factoringext = $row1['extFactoring'];
        $fax = $row1['fax'];
        $tollFree = $row1['tollFree'];
        $email = $row1['email'];
        $secondarycontact = $row1['secondaryContact'];
        $telephone = $row1['telephone'];
        $ext = $row1['ext'];
        $currency = $row1['currencySetting'];
        $payment = $row1['paymentTerms'];
        $taxtid = $row1['taxID'];
        $finternalNotes = $row1['internalNote'];
        $no++;

        echo "<tr>
        <th>$no</th>
        <td>
            <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$factoringCompany</a>
            <button type='button' id='truckNumber'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."2' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$address</a>
            <button type='button' id='truckType'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."3' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$location</a>
            <button type='button' id='licensePlate'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."4' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$zip</a>
            <button type='button' id='plateExpiry'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."5' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$primarycontact</a>
            <button type='button' id='inspectionExpiry'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."6' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$factoringext</a>
            <button type='button' id='status'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."7' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$fax</a>
            <button type='button' id='ownership'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."8' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$tollFree</a>
            <button type='button' id='mileage'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."9' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$email</a>
            <button type='button' id='axies'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."10' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$secondarycontact</a>
            <button type='button' id='year'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."11' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$telephone</a>
            <button type='button' id='fuelType'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."12' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$ext</a>
            <button type='button' id='startDate'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."13' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$currency</a>
            <button type='button' id='deactivationDate'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."14' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$payment</a>
            <button type='button' id='ifta'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."15' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$taxtid</a>
            <button type='button' id='registeredState'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        <td>
            <a href='#' id='truckNumber".$id."16' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$finternalNotes</a>
            <button type='button' id='insurancePolicy'.$id.'1' onclick='updateTruckAdd($factoringCol,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
        </td>
        
        <td>
            <a href='#' onclick='deletefactoring($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a>
        </td>
    </tr>
";


    }
}