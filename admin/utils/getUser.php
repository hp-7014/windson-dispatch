<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->user->find(['companyID' => $_SESSION['companyId']]);
$no = 0;
$table = "";

foreach ($show as $row) {
    $show1 = $row['user'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $userEmail = $row1['userEmail'];
        $userName = $row1['userName'];
        $userFirstName = $row1['userFirstName'];
        $userLastName = $row1['userLastName'];
        $userAddress = $row1['userAddress'];
        $userLocation = $row1['userLocation'];
        $userZip = $row1['userZip'];
        $userTelephone = $row1['userTelephone'];
        $userExt = $row1['userExt'];
        $TollFree = $row1['TollFree'];
        $userFax = $row1['userFax'];

        $type = '"text"';

        $userEmailColumn = '"userEmail"';
        $userNameColumn = '"userName"';
        $userFirstNameColumn = '"userFirstName"';
        $userLastNameColumn = '"userLastName"';
        $userAddressColumn = '"userAddress"';
        $userLocationColumn = '"userLocation"';
        $userZipColumn = '"userZip"';
        $userTelephoneColumn = '"userTelephone"';
        $userExtColumn = '"userExt"';
        $TollFreeColumn = '"TollFree"';
        $userFaxColumn = '"userFax"';

        $no += 1;
        $table .= "<tr>
             <td> $no</td>
             <td>
                 <div id='1userEmail$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$userEmailColumn)' class='text-overflow'>$userEmail</div>
                 <button type='button' id='userEmail$id' onclick='updateUser($userEmailColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1userName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$userNameColumn)' class='text-overflow'>$userName</div>
                 <button type='button' id='userName$id' onclick='updateUser($userNameColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1userFirstName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$userFirstNameColumn)' class='text-overflow'>$userFirstName</div>
                 <button type='button' id='userFirstName$id' onclick='updateUser($userFirstNameColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1userLastName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$userLastNameColumn)' class='text-overflow'>$userLastName</div>
                 <button type='button' id='userLastName$id' onclick='updateUser($userLastNameColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1userAddress$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$userAddressColumn)' class='text-overflow'>$userAddress</div>
                 <button type='button' id='userAddress$id' onclick='updateUser($userAddressColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1userLocation$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$userLocationColumn)' class='text-overflow'>$userLocation</div>
                 <button type='button' id='userLocation$id' onclick='updateUser($userLocationColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1userZip$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$userZipColumn)' class='text-overflow'>$userZip</div>
                 <button type='button' id='userZip$id' onclick='updateUser($userZipColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1userTelephone$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$userTelephoneColumn)' class='text-overflow'>$userTelephone</div>
                 <button type='button' id='userTelephone$id' onclick='updateUser($userTelephoneColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1userExt$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$userExtColumn)' class='text-overflow'>$userExt</div>
                 <button type='button' id='userExt$id' onclick='updateUser($userExtColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1TollFree$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$TollFreeColumn)' class='text-overflow'>$TollFree</div>
                 <button type='button' id='TollFree$id' onclick='updateUser($TollFreeColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 
                 <div id='1userFax$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$userFaxColumn)' class='text-overflow'>$userFax</div>
                 <button type='button' id='userFax$id' onclick='updateUser($userFaxColumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td><a href='#' onclick='show_privilege($id)' data-toggle='modal' data-target='#show_privilege' class='btn btn-warning'>Privilege</a></td>
             <td><a href='#' onclick='deleteUser($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
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