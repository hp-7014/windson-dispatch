<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);
$no = 0;
$table = "";
$list = "<option value='0'>--Select--</option>";
foreach ($show as $row) {
    $show1 = $row['admin_credit'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $Name = $row1['Name'];
        $displayName = $row1['displayName'];
        $cardType = $row1['cardType'];
        $cardHolderName = $row1['cardHolderName'];
        $cardNo = $row1['cardNo'];
        $openingBalanceDt = date("d-m-Y",$row1['openingBalanceDt']);
        $cardLimit = $row1['cardLimit'];
        $openingBalance = $row1['openingBalance'];
        $transacBalance = $row1['transacBalance'];
        $type = '"text"';

        $NameColumn = '"Name"';
        $displayNameColumn = '"displayName"';
        $cardTypeColumn = '"cardType"';
        $cardHolderNameColumn = '"cardHolderName"';
        $cardNoColumn = '"cardNo"';
        $openingBalanceDtColumn = '"openingBalanceDt"';
        $cardLimitColumn = '"cardLimit"';
        $openingBalanceColumn = '"openingBalance"';
        $openingBalanceDtColumn = '"openingBalanceDt"';
        $transacBalanceColumn = '"transacBalance"';

        $no += 1;
        $table .= "<tr>
             <td> $no</td>
             <td>
                 
                 <div id='1Name$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$NameColumn)' class='text-overflow'>$Name</div>
                 <button type='button' id='Name$id' onclick='updateCredit($NameColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1displayName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$displayNameColumn)' class='text-overflow'>$displayName</div>
                 <button type='button' id='displayName$id' onclick='updateCredit($displayNameColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1cardType$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$cardTypeColumn)' class='text-overflow'>$cardType</div>
                 <button type='button' id='cardType$id' onclick='updateCredit($cardTypeColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1cardHolderName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$cardHolderNameColumn)' class='text-overflow'>$cardHolderName</div>
                 <button type='button' id='cardHolderName$id' onclick='updateCredit($cardHolderNameColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1cardNo$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$cardNoColumn)' class='text-overflow'>$cardNo</div>
                 <button type='button' id='cardNo$id' onclick='updateCredit($cardNoColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1cardLimit$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$cardLimitColumn)' class='text-overflow'>$cardLimit</div>
                 <button type='button' id='cardLimit$id' onclick='updateCredit($cardLimitColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1openingBalanceDt$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$openingBalanceDtColumn)' class='text-overflow'>$openingBalanceDt</div>
                 <button type='button' id='openingBalanceDt$id' onclick='updateCredit($openingBalanceDtColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1openingBalance$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$openingBalanceColumn)' class='text-overflow'>$openingBalance</div>
                 <button type='button' id='openingBalance$id' onclick='updateCredit($openingBalanceColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1transacBalance$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$transacBalanceColumn)' class='text-overflow'>$transacBalance</div>
                 <button type='button' id='transacBalance$id' onclick='updateCredit($transacBalanceColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td><a href='#' onclick='deleteCredit($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
        $list .= "<option value=$id>$cardHolderName</option>";
    }
}
echo $table."^".$list;
?>