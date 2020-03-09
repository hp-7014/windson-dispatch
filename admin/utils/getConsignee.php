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

        $consigneeNameColmn = '"consigneeName"';
        $consigneeAddressColmn = '"consigneeAddress"';
        $consigneeLocationColmn = '"consigneeLocation"';
        $consigneePostalColmn = '"consigneePostal"';
        $consigneeContactColmn = '"consigneeContact"';
        $consigneeEmailColmn = '"consigneeEmail"';
        $consigneeTelephoneColmn = '"consigneeTelephone"';
        $consigneeExtColmn = '"consigneeExt"';
        $consigneeTollFreeColmn = '"consigneeTollFree"';
        $consigneeFaxColmn = '"consigneeFax"';
        $consigneeShippingHoursColmn = '"consigneeShippingHours"';
        $consigneeAppointmentsColmn = '"consigneeAppointments"';
        $consigneeIntersactionColmn = '"consigneeIntersaction"';
        $consigneerStatusColmn = '"consigneeStatus"';
        $consigneeNotesColmn = '"consigneeNotes"';
        $internalNotesColmn = '"internalNotes"';
        $type = '"text"';
        $no += 1;
        $table .=  "<tr>
                <th>$no</th>
                <td>
                    <a href='#' id='1consigneeName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeNameColmn)' class='text-overflow'>$consigneeName</a>
                    <button type='button' id='consigneeName$id' onclick='updateConsignee($consigneeNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeAddress$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeAddressColmn)' class='text-overflow'>$consigneeAddress</a>
                    <button type='button' id='consigneeAddress$id' onclick='updateConsignee($consigneeAddressColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeLocation$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeLocationColmn)' class='text-overflow'>$consigneeLocation</a>
                    <button type='button' id='consigneeLocation$id' onclick='updateConsignee($consigneeLocationColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneePostal$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneePostalColmn)' class='text-overflow'>$consigneePostal</a>
                    <button type='button' id='consigneePostal$id' onclick='updateConsignee($consigneePostalColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeContact$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeContactColmn)' class='text-overflow'>$consigneeContact</a>
                    <button type='button' id='consigneeContact$id' onclick='updateConsignee($consigneeContactColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeEmail$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeEmailColmn)' class='text-overflow'>$consigneeEmail</a>
                    <button type='button' id='consigneeEmail$id' onclick='updateConsignee($consigneeEmailColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeTelephone$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeTelephoneColmn)' class='text-overflow'>$consigneeTelephone</a>
                    <button type='button' id='consigneeTelephone$id' onclick='updateConsignee($consigneeTelephoneColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeExt$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeExtColmn)' class='text-overflow'>$consigneeExt</a>
                    <button type='button' id='consigneeExt$id' onclick='updateConsignee($consigneeExtColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeTollFree$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeTollFreeColmn)' class='text-overflow'>$consigneeTollFree</a>
                    <button type='button' id='consigneeTelephone$id' onclick='updateConsignee($consigneeTollFreeColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeFax$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeFaxColmn)' class='text-overflow'>$consigneeFax</a>
                    <button type='button' id='consigneeFax$id' onclick='updateConsignee($consigneeFaxColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeShippingHours$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeShippingHoursColmn)' class='text-overflow'>$consigneeShippingHours</a>
                    <button type='button' id='consigneeShippingHours$id' onclick='updateConsignee($consigneeShippingHoursColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeAppointments$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeAppointmentsColmn)' class='text-overflow'>$consigneeAppointments</a>
                    <button type='button' id='consigneeAppointments$id' onclick='updateConsignee($consigneeAppointmentsColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeIntersaction$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeIntersactionColmn)' class='text-overflow'>$consigneeIntersaction</a>
                    <button type='button' id='consigneeIntersaction$id' onclick='updateConsignee($consigneeIntersactionColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeStatus$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeStatus)' class='text-overflow'>$consigneeStatus</a>
                    <button type='button' id='consigneeStatus$id' onclick='updateConsignee($consigneeStatus,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1consigneeNotes$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$consigneeNotes)' class='text-overflow'>$consigneeNotes</a>
                    <button type='button' id='consigneeNotes$id' onclick='updateConsignee($consigneeNotes,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' id='1internalNotes$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$internalNotesColmn)' class='text-overflow'>$internalNotes</a>
                    <button type='button' id='internalNotes$id' onclick='updateConsignee($internalNotesColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                </td>
                <td>
                    <a href='#' onclick='deleteConsignee($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a>
                </td>
            </tr>
        ";

        if($row1['consigneeStatus'] == "Active"){
            $value = "'".$id.")&nbsp;".$consigneeName."'";
            $list .="<option value=$value></option>";
        }
    }
}

echo $table."^".$list;

