<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$limit = 1;
//$broker = $db->customs_broker->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('custom_b' => array('$slice' => [0, $limit]))));
$broker = $db->customs_broker->find(['companyID' => $_SESSION['companyId']]);
$i = 1;
$no = 0;
$table = "";

foreach ($broker as $brok) {
    $c_broker = $brok['custom_b'];

    foreach ($c_broker as $custom) {

        if ($custom['delete_status'] == '0') {

            $id = $custom['_id'];
            $brokerName = $custom['brokerName'];
            $crossing = $custom['crossing'];
            $telephone = $custom['telephone'];
            $ext = $custom['ext'];
            $tollfree = $custom['tollfree'];
            $fax = $custom['fax'];
            $Status = $custom['Status'];


            $brokerNameColumn = '"brokerName"';
            $crossingColumn = '"crossing"';
            $telephoneColumn = '"telephone"';
            $extColumn = '"ext"';
            $tollfreeColumn = '"tollfree"';
            $faxColumn = '"fax"';
            $StatusColumn = '"Status"';

            $type = '"text"';

            $no += 1;
            $table .= "<tr>
                                                                    <td> $no</td>
                                                                    <td>
                                                                        <a href='#' id='1brokerName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$brokerNameColumn)' class='text-overflow'>$brokerName</a>
                                                                        <button type='button' id='brokerName$id' style='display:none; margin-left:6px;' onclick='updateDriver($brokerNameColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1crossing$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$crossingColumn)' class='text-overflow'>$crossing</a>
                                                                        <button type='button' id='crossing$id' style='display:none; margin-left:6px;' onclick='updateDriver($crossingColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1telephone$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$telephoneColumn)' class='text-overflow'>$telephone</a>
                                                                        <button type='button' id='telephone$id' style='display:none; margin-left:6px;' onclick='updateDriver($telephoneColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1ext$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$extColumn)' class='text-overflow'>$ext</a>
                                                                        <button type='button' id='ext$id' style='display:none; margin-left:6px;' onclick='updateDriver($extColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1tollfree$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$tollfreeColumn)' class='text-overflow'>$tollfree</a>
                                                                        <button type='button' id='tollfree$id' style='display:none; margin-left:6px;' onclick='updateDriver($tollfreeColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1fax$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$faxColumn)' class='text-overflow'>$fax</a>
                                                                        <button type='button' id='fax$id' style='display:none; margin-left:6px;' onclick='updateDriver($faxColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1Status$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$StatusColumn)' class='text-overflow'>$Status</a>
                                                                        <button type='button' id='Status$id' style='display:none; margin-left:6px;' onclick='updateDriver($StatusColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td><a href='#' onclick='deleteCustom($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
        }
    }
}
echo $table;