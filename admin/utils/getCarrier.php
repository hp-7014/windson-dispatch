<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->carrier->find(['companyID' => $_SESSION['companyId']]);
$no = 0;
$table = "";

foreach ($show as $row) {
    $show1 = $row['carrier'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $name = $row1['name'];
        $address = $row1['address'];
        $contactName = $row1['contactName'];
        $email = $row1['email'];
        $telephone = $row1['telephone'];
        $mc = $row1['mc'];
        $dot = $row1['dot'];
        $factoringCompany = $row1['factoringCompany'];
        $type = '"text"';

        $nameColumn = '"name"';
        $addressColumn = '"address"';
        $contactNameColumn = '"contactName"';
        $emailColumn = '"email"';
        $telephoneColumn = '"telephone"';
        $mcColumn = '"mc"';
        $dotColumn = '"dot"';
        $factoringCompanyColumn = '"factoringCompany"';

        $no += 1;
        $table .= "<tr>
             <td> $no</td>
             <td>
                 <div id='1name$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$nameColumn)' class='text-overflow'>$name</div>
                 <button type='button' id='name$id' onclick='updateExternal($nameColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1address$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$addressColumn)' class='text-overflow'>$address</div>
                 <button type='button' id='address$id' onclick='updateExternal($addressColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1contactName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$contactNameColumn)' class='text-overflow'>$contactName</div>
                 <button type='button' id='contactName$id' onclick='updateExternal($contactNameColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1email$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$emailColumn)' class='text-overflow'>$email</div>
                 <button type='button' id='email$id' onclick='updateExternal($emailColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1telephone$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$telephoneColumn)' class='text-overflow'>$telephone</div>
                 <button type='button' id='telephone$id' onclick='updateExternal($telephoneColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1mc$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$mcColumn)' class='text-overflow'>$mc</div>
                 <button type='button' id='mc$id' onclick='updateExternal($mcColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1dot$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$dotColumn)' class='text-overflow'>$dot</div>
                 <button type='button' id='dot$id' onclick='updateExternal($dotColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1factoringCompany$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$factoringCompanyColumn)' class='text-overflow'>$factoringCompany</div>
                 <button type='button' id='factoringCompany$id' onclick='updateExternal($factoringCompanyColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td><a href='#' onclick='deleteExternal($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
    }
}

echo $table;

?>
<script>
    function getParentId(e) {
        alert(10);
        console.log(e.target.parentNode.id);
    }
</script>