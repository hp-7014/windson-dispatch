<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->driver->find(['companyID' => $_SESSION['companyId']]);
$no = 0;
$table = "";

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

        $driverNameColumn = '"driverName"';
        $driverUsernameColumn = '"driverUsername"';
        $driverPasswordColumn = '"driverPassword"';
        $driverTelephoneColumn = '"driverTelephone"';
        $driverAltColumn = '"driverAlt"';
        $driverEmailColumn = '"driverEmail"';
        $driverAddressColumn = '"driverAddress"';
        $driverLocationColumn = '"driverLocation"';
        $driverZipColumn = '"driverZip"';
        $driverStatusColumn = '"driverStatus"';
        $driverSocialColumn = '"driverSocial"';
        $dateOfbirthColumn = '"dateOfbirth"';
        $dateOfhireColumn = '"dateOfhire"';
        $driverLicenseNoColumn = '"driverLicenseNo"';
        $driverLicenseIssueColumn = '"driverLicenseIssue"';
        $driverLicenseExpColumn = '"driverLicenseExp"';
        $driverLastMedicalColumn = '"driverLastMedical"';
        $driverNextMedicalColumn = '"driverNextMedical"';
        $driverLastDrugTestColumn = '"driverLastDrugTest"';
        $driverNextDrugTestColumn = '"driverNextDrugTest"';
        $passportExpiryColumn = '"passportExpiry"';
        $fastCardExpiryColumn = '"fastCardExpiry"';
        $hazmatExpiryColumn = '"hazmatExpiry"';
        $driverMileColumn = '"driverMile"';
        $driverFlatColumn = '"driverFlat"';
        $driverStopColumn = '"driverStop"';
        $driverTrapColumn = '"driverTrap"';
        $InternalNoteColumn = '"InternalNote"';
        $driverPercentageColumn = '"driverPercentage"';

        $type = '"text"';

        $no += 1;
        $table .= "<tr>
             <td> $no</td>
             
                                                                    <td>
                                                                        <a href='#' id='1driverName$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverNameColumn)' class='text-overflow'>$driverName</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverNameColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverUsername$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverUsernameColumn)' class='text-overflow'>$driverUsername</a>
                                                                        <button type='button' id='driverUsername$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverUsernameColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverTelephone$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverTelephoneColumn)' class='text-overflow'>$driverTelephone</a>
                                                                        <button type='button' id='driverTelephone$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverTelephoneColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverAlt$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverAltColumn)' class='text-overflow'>$driverAlt</a>
                                                                        <button type='button' id='driverAlt$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverAltColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverEmail$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverEmailColumn)' class='text-overflow'>$driverEmail</a>
                                                                        <button type='button' id='driverEmail$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverEmailColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverAddress$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverAddressColumn)' class='text-overflow'>$driverAddress</a>
                                                                        <button type='button' id='driverAddress$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverAddressColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverLocation$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverLocationColumn)' class='text-overflow'>$driverLocation</a>
                                                                        <button type='button' id='driverLocation$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverLocationColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverZip$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverZipColumn)' class='text-overflow'>$driverZip</a>
                                                                        <button type='button' id='driverZip$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverZipColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverStatus$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverStatusColumn)' class='text-overflow'>$driverStatus</a>
                                                                        <button type='button' id='driverStatus$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverStatusColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverSocial$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverSocialColumn)' class='text-overflow'>$driverSocial</a>
                                                                        <button type='button' id='driverSocial$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverSocialColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1dateOfbirth$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$dateOfbirthColumn)' class='text-overflow'>$dateOfbirth</a>
                                                                        <button type='button' id='dateOfbirth$id' style='display:none; margin-left:6px;' onclick='updateDriver($dateOfbirthColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1dateOfhire$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$dateOfhireColumn)' class='text-overflow'>$dateOfhire</a>
                                                                        <button type='button' id='dateOfhire$id' style='display:none; margin-left:6px;' onclick='updateDriver($dateOfhireColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverLicenseNo$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverLicenseNoColumn)' class='text-overflow'>$driverLicenseNo</a>
                                                                        <button type='button' id='driverLicenseNo$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverLicenseNoColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverLicenseIssue$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverLicenseIssueColumn)' class='text-overflow'>$driverLicenseIssue</a>
                                                                        <button type='button' id='driverLicenseIssue$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverLicenseIssueColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverLicenseExp$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverLicenseExpColumn)' class='text-overflow'>$driverLicenseExp</a>
                                                                        <button type='button' id='driverLicenseExp$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverLicenseExpColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverLastMedical$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverLastMedicalColumn)' class='text-overflow'>$driverLastMedical</a>
                                                                        <button type='button' id='driverLastMedical$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverLastMedicalColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverNextMedical$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverNextMedicalColumn)' class='text-overflow'>$driverNextMedical</a>
                                                                        <button type='button' id='driverNextMedical$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverNextMedicalColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverLastDrugTest$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverLastDrugTestColumn)' class='text-overflow'>$driverLastDrugTest</a>
                                                                        <button type='button' id='driverLastDrugTest$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverLastDrugTestColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverNextDrugTest$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverNextDrugTestColumn)' class='text-overflow'>$driverNextDrugTest</a>
                                                                        <button type='button' id='driverNextDrugTest$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverNextDrugTestColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1passportExpiry$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$passportExpiryColumn)' class='text-overflow'>$passportExpiry</a>
                                                                        <button type='button' id='passportExpiry$id' style='display:none; margin-left:6px;' onclick='updateDriver($passportExpiryColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1fastCardExpiry$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$fastCardExpiryColumn)' class='text-overflow'>$fastCardExpiry</a>
                                                                        <button type='button' id='fastCardExpiry$id' style='display:none; margin-left:6px;' onclick='updateDriver($fastCardExpiryColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1hazmatExpiry$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$hazmatExpiryColumn)' class='text-overflow'>$hazmatExpiry</a>
                                                                        <button type='button' id='hazmatExpiry$id' style='display:none; margin-left:6px;' onclick='updateDriver($hazmatExpiryColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverMile$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverMileColumn)' class='text-overflow'>$driverMile</a>
                                                                        <button type='button' id='driverMile$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverMileColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverFlat$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverFlatColumn)' class='text-overflow'>$driverFlat</a>
                                                                        <button type='button' id='driverFlat$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverFlatColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverStop$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverStopColumn)' class='text-overflow'>$driverStop</a>
                                                                        <button type='button' id='driverStop$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverStopColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverTrap$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverTrapColumn)' class='text-overflow'>$driverTrap</a>
                                                                        <button type='button' id='driverTrap$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverTrapColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1InternalNote$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$InternalNoteColumn)' class='text-overflow'>$InternalNote</a>
                                                                        <button type='button' id='InternalNote$id' style='display:none; margin-left:6px;' onclick='updateDriver($InternalNoteColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>
                                                                    <td>
                                                                        <a href='#' id='1driverPercentage$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$driverPercentageColumn)' class='text-overflow'>$driverPercentage</a>
                                                                        <button type='button' id='driverPercentage$id' style='display:none; margin-left:6px;' onclick='updateDriver($driverPercentageColumn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                                    </td>


             <td><a href='#' onclick='deleteDriver($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";

    }
}
echo $table;