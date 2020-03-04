<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

$g_data = $db->bank_admin->find(['companyID' => $_SESSION['companyId']]);
$i = 1;
$no = 0;
$table = "";

foreach ($g_data as $data) {
    $bank_admin = $data['admin_bank'];

    foreach ($bank_admin as $admin) {
        $limit = 4;
        $total_records = $admin->count();
        $total_pages = ceil($total_records / $limit);
        if ($admin['delete_status'] == '0') {

            $id = $admin['_id'];
            $bankName = $admin['bankName'];
            $bankAddresss = $admin['bankAddresss'];
            $accountHolder = $admin['accountHolder'];
            $accountNo = $admin['accountNo'];
            $routingNo = $admin['routingNo'];
            $openingBalDate = $admin['openingBalDate'];
            $openingBalance = $admin['openingBalance'];
            $currentcheqNo = $admin['currentcheqNo'];
            $transacBalance = $admin['transacBalance'];

            $bankNameColumn = '"bankName"';
            $bankAddresssColumn = '"bankAddresss"';
            $accountHolderColumn = '"accountHolder"';
            $accountNoColumn = '"accountNo"';
            $routingNoColumn = '"routingNo"';
            $openingBalDateColumn = '"openingBalDate"';
            $openingBalanceColumn = '"openingBalance"';
            $currentcheqNoColumn = '"currentcheqNo"';
            $transacBalanceColumn = '"transacBalance"';

            $type = '"text"';

            $no += 1;
            $table .= "<tr>
                                                                    <td> $no</td>
                                                                    <td>
                                                                        <a href='#' id='1bankName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$bankNameColumn)' class='text-overflow'>$bankName</a>
                                                                        <button type='button' id='bankName$id' style='display:none; margin-left:6px;' onclick='updateBank($bankNameColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1bankAddresss$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$bankAddresssColumn)' class='text-overflow'>$bankAddresss</a>
                                                                        <button type='button' id='bankAddresss$id' style='display:none; margin-left:6px;' onclick='updateBank($bankAddresssColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1accountHolder$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$accountHolderColumn)' class='text-overflow'>$accountHolder</a>
                                                                        <button type='button' id='accountHolder$id' style='display:none; margin-left:6px;' onclick='updateBank($accountHolderColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1accountNo$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$accountNoColumn)' class='text-overflow'>$accountNo</a>
                                                                        <button type='button' id='accountNo$id' style='display:none; margin-left:6px;' onclick='updateBank($accountNoColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>


                                                                    <td>
                                                                        <a href='#' id='1routingNo$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$routingNoColumn)' class='text-overflow'>$routingNo</a>
                                                                        <button type='button' id='routingNo$id' style='display:none; margin-left:6px;' onclick='updateBank($routingNoColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1openingBalDate$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$openingBalDateColumn)' class='text-overflow'>$openingBalDate</a>
                                                                        <button type='button' id='openingBalDate$id' style='display:none; margin-left:6px;' onclick='updateBank($openingBalDateColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1openingBalance$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$openingBalanceColumn)' class='text-overflow'>$openingBalance</a>
                                                                        <button type='button' id='openingBalance$id' style='display:none; margin-left:6px;' onclick='updateBank($openingBalanceColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1currentcheqNo$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$currentcheqNoColumn)' class='text-overflow'>$currentcheqNo</a>
                                                                        <button type='button' id='currentcheqNo$id' style='display:none; margin-left:6px;' onclick='updateBank($currentcheqNoColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1transacBalance$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$transacBalanceColumn)' class='text-overflow'>$transacBalance</a>
                                                                        <button type='button' id='transacBalance$id' style='display:none; margin-left:6px;' onclick='updateBank($transacBalanceColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                
                                                                    <td><a href='#' onclick='deleteBank($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
        }
    }
}
echo $table;