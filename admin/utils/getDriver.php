<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->driver->find(['companyID' => $_SESSION['companyId']]);
$no = 0;
$table = "";
$list = "";
foreach ($show as $row) {
    $show1 = $row['driver'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $driverName = $row1['driverName'];
        $driverUsername = $row1['driverUsername'];
        $driverPassword = $row1['driverPassword'];
        $driverTelephone = $row1['driverTelephone'];
        $driverAlt = $row1['driverAlt'];
        $driverEmail = $row1['driverEmail'];
        $driverAddress = $row1['driverAddress'];
        $driverLocation = $row1['driverLocation'];
        $driverZip = $row1['driverZip'];
        $driverStatus = $row1['driverStatus'];
        $driverSocial = $row1['driverSocial'];
        $dateOfbirth = date("d-m-Y", $row1['dateOfbirth']);
        $dateOfhire = date("d-m-Y", $row1['dateOfhire']);
        $driverLicenseNo = $row1['driverLicenseNo'];
        $driverLicenseIssue = $row1['driverLicenseIssue'];
        $driverLicenseExp = date("d-m-Y", $row1['driverLicenseExp']);
        $driverLastMedical = date("d-m-Y", $row1['driverLastMedical']);
        $driverNextMedical = date("d-m-Y", $row1['driverNextMedical']);
        $driverLastDrugTest = date("d-m-Y", $row1['driverLastDrugTest']);
        $driverNextDrugTest = date("d-m-Y", $row1['driverNextDrugTest']);
        $passportExpiry = date("d-m-Y", $row1['passportExpiry']);
        $fastCardExpiry = date("d-m-Y", $row1['fastCardExpiry']);
        $hazmatExpiry = date("d-m-Y", $row1['hazmatExpiry']);
        $driverMile = $row1['driverMile'];
        $driverFlat = $row1['driverFlat'];
        $driverStop = $row1['driverStop'];
        $driverTrap = $row1['driverTrap'];
        $InternalNote = $row1['InternalNote'];
        $driverPercentage = $row1['driverPercentage'];
        $column = 'currencyType';
        $no += 1;
        $table .= "<tr>
             <td> $no</td>
             
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverName</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverUsername</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverTelephone</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverAlt</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>                                                                       <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverEmail</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverAddress</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverLocation</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverZip</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverStatus</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverSocial</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$dateOfbirth</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$dateOfhire</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverLicenseNo</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverLicenseIssue</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverLicenseExp</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverLastMedical</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverNextMedical</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverLastDrugTest</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverNextDrugTest</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$passportExpiry</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$fastCardExpiry</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$hazmatExpiry</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverMile</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverFlat</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverStop</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverTrap</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$InternalNote</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverPercentage</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>


             <td><a href='#' onclick='deleteDriver($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
            $value = "'".$id.")&nbsp;".$driverName."'";
            $list .= "<option value=$value></option>";
    }
}
echo $table."^".$list;