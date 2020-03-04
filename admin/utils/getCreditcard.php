<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

$g_data = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);
$i = 1;
$no = 0;
$table = "";

foreach ($g_data as $data) {
    $admin_credit = $data['admin_credit'];
    foreach ($admin_credit as $admin) {
        $limit = 4;
        $total_records = $admin_credit->count();
        $total_pages = ceil($total_records / $limit);
        if ($admin['delete_status'] == '0') {

            $id = $admin['_id'];
            $displayName = $admin['displayName'];
            $cardType = $admin['cardType'];
            $cardHolderName = $admin['cardHolderName'];
            $cardNo = $admin['cardNo'];
            $openingBalanceDt = $admin['openingBalanceDt'];
            $cardLimit = $admin['cardLimit'];
            $openingBalance = $admin['openingBalance'];
            $transacBalance = $admin['transacBalance'];

            $displayNameColumn = '"displayName"';
            $cardTypeColumn = '"cardType"';
            $cardHolderNameColumn = '"cardHolderName"';
            $cardNoColumn = '"cardNo"';
            $openingBalanceDtColumn = '"openingBalanceDt"';
            $cardLimitColumn = '"cardLimit"';
            $openingBalanceColumn = '"openingBalance"';
            $transacBalanceColumn = '"transacBalance"';

            $type = '"text"';

            $no += 1;
            $table .= "<tr>
                                                                    <td> $no</td>
                                                                    <td>
                                                                        <a href='#' id='1displayName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$displayNameColumn)' class='text-overflow'>$displayName</a>
                                                                        <button type='button' id='displayName$id' style='display:none; margin-left:6px;' onclick='updateDriver($displayNameColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1cardType$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$cardTypeColumn)' class='text-overflow'>$cardType</a>
                                                                        <button type='button' id='cardType$id' style='display:none; margin-left:6px;' onclick='updateDriver($cardTypeColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1cardHolderName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$cardHolderNameColumn)' class='text-overflow'>$cardHolderName</a>
                                                                        <button type='button' id='cardHolderName$id' style='display:none; margin-left:6px;' onclick='updateDriver($cardHolderNameColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1cardNo$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$cardNoColumn)' class='text-overflow'>$cardNo</a>
                                                                        <button type='button' id='cardNo$id' style='display:none; margin-left:6px;' onclick='updateDriver($cardNoColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>


                                                                    <td>
                                                                        <a href='#' id='1openingBalanceDt$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$openingBalanceDtColumn)' class='text-overflow'>$openingBalanceDt</a>
                                                                        <button type='button' id='openingBalanceDt$id' style='display:none; margin-left:6px;' onclick='updateDriver($openingBalanceDtColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1cardLimit$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$cardLimitColumn)' class='text-overflow'>$cardLimit</a>
                                                                        <button type='button' id='cardLimit$id' style='display:none; margin-left:6px;' onclick='updateDriver($cardLimitColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1openingBalance$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$openingBalanceColumn)' class='text-overflow'>$openingBalance</a>
                                                                        <button type='button' id='openingBalance$id' style='display:none; margin-left:6px;' onclick='updateDriver($openingBalanceColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1transacBalance$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$transacBalanceColumn)' class='text-overflow'>$transacBalance</a>
                                                                        <button type='button' id='transacBalance$id' style='display:none; margin-left:6px;' onclick='updateDriver($transacBalanceColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                
                                                                    <td><a href='#' onclick='deleteCredit($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
        }
    }
}
echo $table;