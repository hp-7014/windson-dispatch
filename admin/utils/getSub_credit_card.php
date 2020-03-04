<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

$g_data = $db->sub_credit_card->find(['companyID' => $_SESSION['companyId']]);
$i = 1;
$no = 0;
$table = "";

foreach ($g_data as $data) {
    $sub_credit = $data['sub_credit'];

    foreach ($sub_credit as $admin) {

        if ($admin['delete_status'] == '0') {

            $id = $admin['_id'];
            $displayName = $admin['displayName'];
            $mainCard = $admin['mainCard'];
            $cardHolderName = $admin['cardHolderName'];
            $cardNo = $admin['cardNo'];


            $displayNameColumn = '"displayName"';
            $mainCardColumn = '"mainCard"';
            $cardHolderNameColumn = '"cardHolderName"';
            $cardNoColumn = '"cardNo"';

            $type = '"text"';

            $no += 1;
            $table .= "<tr>
                                                                    <td> $no</td>
                                                                    <td>
                                                                        <a href='#' id='1displayName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$displayNameColumn)' class='text-overflow'>$displayName</a>
                                                                        <button type='button' id='displayName$id' style='display:none; margin-left:6px;' onclick='updateSub_Credit($displayNameColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1mainCard$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$mainCardColumn)' class='text-overflow'>$mainCard</a>
                                                                        <button type='button' id='mainCard$id' style='display:none; margin-left:6px;' onclick='updateSub_Credit($mainCardColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1cardHolderName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$cardHolderNameColumn)' class='text-overflow'>$cardHolderName</a>
                                                                        <button type='button' id='cardHolderName$id' style='display:none; margin-left:6px;' onclick='updateSub_Credit($cardHolderNameColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1cardNo$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$cardNoColumn)' class='text-overflow'>$cardNo</a>
                                                                        <button type='button' id='cardNo$id' style='display:none; margin-left:6px;' onclick='updateSub_Credit($cardNoColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                
                                                                    <td><a href='#' onclick='deleteSubCredit($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
        }
    }
}
echo $table;