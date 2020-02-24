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
        $column = 'currencyType';
        $no += 1;
        $table .= "<tr>
             <td> $no</td>
             
                                                                    <td>
                                                                        <a href='#' id='driverName$id' data-type='textarea' class='text-overflow'>$driverName</a>
                                                                        <button type='button' id='driverName$id' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                                                    </td>


             <td><a href='#' onclick='deleteDriver($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";

    }
}
echo $table;