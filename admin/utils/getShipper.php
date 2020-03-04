<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->shipper->find(['companyID' => $_SESSION['companyId']]);
$no = 0;
$table = "";
$list  = "";
foreach ($show as $row) {
    $show1 = $row['shipper'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $shipperName = $row1['shipperName'];
        $shipperAddress = $row1['shipperAddress'];
        $shipperLocation = $row1['shipperLocation'];
        $shipperPostal = $row1['shipperPostal'];
        $shipperContact = $row1['shipperContact'];
        $shipperEmail = $row1['shipperEmail'];
        $shipperTelephone = $row1['shipperTelephone'];
        $shipperExt = $row1['shipperExt'];
        $shipperTollFree = $row1['shipperTollFree'];
        $shipperFax = $row1['shipperFax'];
        $shipperShippingHours = $row1['shipperShippingHours'];
        $shipperAppointments = $row1['shipperAppointments'];
        $shipperIntersaction = $row1['shipperIntersaction'];
        $shipperStatus = $row1['shipperStatus'];
        $shippingNotes = $row1['shippingNotes'];
        $internalNotes = $row1['internalNotes'];

        $shipperNameColmn = 'shipperName';
        $shipperAddressColmn = 'shipperAddress';
        $shipperLocationColmn = 'shipperLocation';
        $shipperPostalColmn = 'shipperPostal';
        $shipperContactColmn = 'shipperContact';
        $shipperEmailColmn = 'shipperEmail';
        $shipperTelephoneColmn = 'shipperTelephone';
        $shipperExtColmn = 'shipperExt';
        $shipperTollFreeColmn = 'shipperTollFree';
        $shipperFaxColmn = 'shipperFax';
        $shipperShippingHoursColmn = 'shipperShippingHours';
        $shipperAppointmentsColmn = 'shipperAppointments';
        $shipperIntersactionColmn = 'shipperIntersaction';
        $shipperStatusColmn = 'shipperStatus';
        $shippingNotesColmn = 'shippingNotes';
        $internalNotesColmn = 'internalNotes';
        $type = 'text';
        $no += 1;
        $table .=  "<tr>
                <th>$no</th>
                <td>
                    <a href='#' id='shipperName".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$shipperName</a>
                    <button type='button' id='shipperName".$id."1' onclick='updateShipper($shipperNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperAddress".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperAddressColmn)' class='text-overflow'>$shipperAddress</a>
                    <button type='button' id='shipperAddress".$id."1' onclick='updateShipper($shipperAddressColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperLocation".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperLocationColmn)' class='text-overflow'>$shipperLocation</a>
                    <button type='button' id='shipperLocation".$id."1' onclick='updateShipper($shipperLocationColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperPostal".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperPostalColmn)' class='text-overflow'>$shipperPostal</a>
                    <button type='button' id='shipperPostal".$id."1' onclick='updateShipper($shipperPostalColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperContact".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperContactColmn)' class='text-overflow'>$shipperContact</a>
                    <button type='button' id='shipperContact".$id."1' onclick='updateShipper($shipperContactColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperEmail".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperEmailColmn)' class='text-overflow'>$shipperEmail</a>
                    <button type='button' id='shipperEmail".$id."1' onclick='updateShipper($shipperEmailColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperTelephone".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperTelephoneColmn)' class='text-overflow'>$shipperTelephone</a>
                    <button type='button' id='shipperTelephone".$id."1' onclick='updateShipper($shipperTelephoneColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperExt".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperExtColmn)' class='text-overflow'>$shipperExt</a>
                    <button type='button' id='shipperExt".$id."1' onclick='updateShipper($shipperExtColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperTollFree".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperTollFreeColmn)' class='text-overflow'>$shipperTollFree</a>
                    <button type='button' id='shipperTollFree".$id."1' onclick='updateShipper($shipperTollFreeColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperFax".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperFaxColmn)' class='text-overflow'>$shipperFax</a>
                    <button type='button' id='shipperFax".$id."1' onclick='updateShipper($shipperFaxColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperShippingHours".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperShippingHoursColmn)' class='text-overflow'>$shipperShippingHours</a>
                    <button type='button' id='shipperShippingHours".$id."1' onclick='updateShipper($shipperShippingHoursColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperAppointments".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperAppointmentsColmn)' class='text-overflow'>$shipperAppointments</a>
                    <button type='button' id='shipperAppointments".$id."1' onclick='updateShipper($shipperAppointmentsColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperIntersaction".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperIntersactionColmn)' class='text-overflow'>$shipperIntersaction</a>
                    <button type='button' id='shipperIntersaction".$id."1' onclick='updateShipper($shipperIntersactionColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shipperStatus".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shipperStatusColmn)' class='text-overflow'>$shipperStatus</a>
                    <button type='button' id='shipperStatus".$id."1' onclick='updateShipper($shipperStatusColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='shippingNotes".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$shippingNotesColmn)' class='text-overflow'>$shippingNotes</a>
                    <button type='button' id='shippingNotes".$id."1' onclick='updateShipper($shippingNotesColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='internalNotes".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$internalNotesColmn)' class='text-overflow'>$internalNotes</a>
                    <button type='button' id='internalNotes".$id."1' onclick='updateShipper($internalNotesColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' onclick='deleteShipper($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a>
                </td>
            </tr>
        ";
        $value = "'".$id.")&nbsp;".$shipperName."'";
        $list .="<option value=$value></option>";
    }
}

echo $total."^".$list;

