<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->consignee->find(['companyID' => $_SESSION['companyId']]);
$no = 0;
$table = "";
$list  = "";
foreach ($show as $row) {
    $show1 = $row['consignee'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $consigneeName = $row1['consigneeName'];
        $consigneeAddress = $row1['consigneeAddress'];
        $consigneeLocation = $row1['consigneeLocation'];
        $consigneePostal = $row1['consigneePostal'];
        $consigneeContact = $row1['consigneeContact'];
        $consigneeEmail = $row1['consigneeEmail'];
        $consigneeTelephone = $row1['consigneeTelephone'];
        $consigneeExt = $row1['consigneeExt'];
        $consigneeTollFree = $row1['consigneeTollFree'];
        $consigneeFax = $row1['consigneeFax'];
        $consigneeShippingHours = $row1['consigneeReceiving'];
        $consigneeAppointments = $row1['consigneeAppointments'];
        $consigneeIntersaction = $row1['consigneeIntersaction'];
        $consigneeStatus = $row1['consigneeStatus'];
        $consigneeNotes = $row1['consigneeRecivingNote'];
        $internalNotes = $row1['consigneeInternalNote'];

        $consigneeNameColmn = 'consigneeName';
        $consigneeAddressColmn = 'consigneeAddress';
        $consigneeLocationColmn = 'consigneeLocation';
        $consigneePostalColmn = 'consigneePostal';
        $consigneeContactColmn = 'consigneeContact';
        $consigneeEmailColmn = 'consigneeEmail';
        $consigneeTelephoneColmn = 'consigneeTelephone';
        $consigneeExtColmn = 'consigneeExt';
        $consigneeTollFreeColmn = 'consigneeTollFree';
        $consigneeFaxColmn = 'consigneeFax';
        $consigneeShippingHoursColmn = 'consigneeShippingHours';
        $consigneeAppointmentsColmn = 'consigneeAppointments';
        $consigneeIntersactionColmn = 'consigneeIntersaction';
        $consigneerStatusColmn = 'consigneeStatus';
        $consigneeNotesColmn = 'consigneeNotes';
        $internalNotesColmn = 'internalNotes';
        $type = 'text';
        $no += 1;
        $table .=  "<tr>
                <th>$no</th>
                <td>
                    <a href='#' id='consigneeName".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,consigneeName)' class='text-overflow'>$consigneeName</a>
                    <button type='button' id='shipperName".$id."1' onclick='updateShipper($consigneeNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeAddress".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeAddressColmn)' class='text-overflow'>$consigneeAddress</a>
                    <button type='button' id='shipperAddress".$id."1' onclick='updateShipper($consigneeAddressColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeLocation".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeLocationColmn)' class='text-overflow'>$consigneeLocation</a>
                    <button type='button' id='shipperLocation".$id."1' onclick='updateShipper($consigneeLocationColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneePostal".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneePostalColmn)' class='text-overflow'>$consigneePostal</a>
                    <button type='button' id='shipperPostal".$id."1' onclick='updateShipper($consigneePostalColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeContact".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeContactColmn)' class='text-overflow'>$consigneeContact</a>
                    <button type='button' id='shipperContact".$id."1' onclick='updateShipper($consigneeContactColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeEmail".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeEmailColmn)' class='text-overflow'>$consigneeEmail</a>
                    <button type='button' id='shipperEmail".$id."1' onclick='updateShipper($consigneeEmailColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeTelephone".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeTelephoneColmn)' class='text-overflow'>$consigneeTelephone</a>
                    <button type='button' id='shipperTelephone".$id."1' onclick='updateShipper($consigneeTelephoneColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeExt".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeExtColmn)' class='text-overflow'>$consigneeExt</a>
                    <button type='button' id='shipperExt".$id."1' onclick='updateShipper($consigneeExtColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeTollFree".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeTollFreeColmn)' class='text-overflow'>$consigneeTollFree</a>
                    <button type='button' id='shipperTollFree".$id."1' onclick='updateShipper($consigneeTollFreeColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeFax".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeFaxColmn)' class='text-overflow'>$consigneeFax</a>
                    <button type='button' id='shipperFax".$id."1' onclick='updateShipper($consigneeFaxColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeShippingHours".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeShippingHoursColmn)' class='text-overflow'>$consigneeShippingHours</a>
                    <button type='button' id='shipperShippingHours".$id."1' onclick='updateShipper($consigneeShippingHoursColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeAppointments".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeAppointmentsColmn)' class='text-overflow'>$consigneeAppointments</a>
                    <button type='button' id='shipperAppointments".$id."1' onclick='updateShipper($consigneeAppointmentsColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeIntersaction".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeIntersactionColmn)' class='text-overflow'>$consigneeIntersaction</a>
                    <button type='button' id='shipperIntersaction".$id."1' onclick='updateShipper($consigneeIntersactionColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeStatus".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeStatus)' class='text-overflow'>$consigneeStatus</a>
                    <button type='button' id='shipperStatus".$id."1' onclick='updateShipper($consigneeStatus,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='consigneeNotes".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeNotes)' class='text-overflow'>$consigneeNotes</a>
                    <button type='button' id='shippingNotes".$id."1' onclick='updateShipper($consigneeNotes,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
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
        $value = "'".$id.")&nbsp;".$consigneeName."'";
        $list .="<option value=$value></option>";
    }
}

echo $table."^".$list;

