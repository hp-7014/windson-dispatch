<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$no = 0;
$type = '"text"';
$table = "";
$list = "<option value=''>--select--</option>";

$trailerNumberColmn = '"trailerNumber"';
$trailerTypeColmn = '"trailerType"';
$licenseTypeColmn = '"licenseType"';
$plateExpiryColmn = '"plateExpiry"';
$inspectionExpirationColmn = '"inspectionExpiration"';
$statusColmn = '"status"';
$modelColmn = '"model"';
$yearColmn = '"year"';
$axiesColmn = 'axies';
$registeredStateColmn = '"registeredState"';
$vinColmn = '"vin"';
$dotColmn = '"dot"';
$activationDateColmn = '"activationDate"';
$internalNotesColmn = '"internalNotes"';

$collection = $db->trailer_admin_add;
$show1 = $collection->aggregate([
    ['$lookup' => [
        'from' => 'trailer_add',
        'localField' => 'companyID',
        'foreignField' => 'companyID',
        'as' => 'trailerdetails'
    ]],
    ['$match' => ['companyID' => 1]],
    ['$unwind' => '$trailer'],
    ['$sort' => ['trailer._id' => -1]],
    ['$match' => ['trailer.deleteStatus' => 0]]
]);

foreach ($show1 as $row) {
    $trailer = array();
    $trailerType = array();
    $k = 0;
    $trailer[$k] = $row['trailer'];
    $k++;
    $trailerdetails = $row['trailerdetails'];
    foreach ($trailerdetails as $row2) {
        $trailerdetails1 = $row2['trailer'];
        $k = 0;
        foreach ($trailerdetails1 as $row3) {
            $id = $row3['_id'];
            $trailerType[$k] = $row3['trailerType'];
            $k++;
        }
    }
    $j = 0;
    foreach ($trailer as $row1) {
        $id = $row1['_id'];
        $trailerNumber = $row1['trailerNumber'];
        $trailerType1 = $trailerType[$row1['trailerType']];
        $j++;
        $licenseType = $row1['licenseType'];
        if (empty($row1['plateExpiry'])) {
            $plateExpiry = "";
        } else {
            $plateExpiry = date('d/m/Y', $row1['plateExpiry']);
        }
        if (empty($row1['inspectionExpiration'])) {
            $inspectionExpiration = "";
        } else {
            $inspectionExpiration = date('d/m/Y', $row1['inspectionExpiration']);
        }
        $status = $row1['status'];
        $model = $row1['model'];
        $year = $row1['year'];
        $axies = $row1['axies'];
        $registeredState = $row1['registeredState'];
        $vin = $row1['vin'];
        $dot = $row1['dot'];
        if (empty($row1['activationDate'])) {
            $activationDate = "";
        } else {
            $activationDate = date('d/m/Y', $row1['activationDate']);
        }
        $internalNotes = $row1['internalNotes'];
        $limit = 4;
        $total_records = $row1->count();
        $total_pages = ceil($total_records / $limit);
        $no++;
        $table .= "<tr>
                                            <th>$no</th>
                                            <td>
                                                <a href='#' id='1trailerNumber$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$trailerNumberColmn)' class='text-overflow'>$trailerNumber</a>
                                                <button type='button' id='trailerNumber$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($trailerNumberColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1trailerType$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$trailerTypeColmn)' class='text-overflow'>$trailerType1</a>
                                                <button type='button' id='trailerType$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($trailerTypeColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1licenseType$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$licenseTypeColmn)' class='text-overflow'>$licenseType</a>
                                                <button type='button' id='licenseType$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($licenseTypeColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1plateExpiry$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$plateExpiryColmn)' class='text-overflow'>$plateExpiry</a>
                                                <button type='button' id='plateExpiry$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($plateExpiryColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1inspectionExpiration$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$inspectionExpirationColmn)' class='text-overflow'>$inspectionExpiration</a>
                                                <button type='button' id='inspectionExpiration$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($inspectionExpirationColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1status$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$statusColmn)' class='text-overflow'>$status</a>
                                                <button type='button' id='status$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($statusColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1model$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$modelColmn)' class='text-overflow'>$model</a>
                                                <button type='button' id='model$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($modelColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1year$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$yearColmn)' class='text-overflow'>$year</a>
                                                <button type='button' id='year$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($yearColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1axies$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$axiesColmn)' class='text-overflow'>$axies</a>
                                                <button type='button' id='axies$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($axiesColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1registeredState$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$registeredStateColmn)' class='text-overflow'>$registeredState</a>
                                                <button type='button' id='registeredState$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($registeredStateColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1vin$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$vinColmn)' class='text-overflow'>$vin</a>
                                                <button type='button' id='vin$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($vinColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1dot$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$dotColmn)' class='text-overflow'>$dot</a>
                                                <button type='button' id='dot$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($dotColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1activationDate$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$activationDateColmn)' class='text-overflow'>$activationDate</a>
                                                <button type='button' id='activationDate$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($activationDateColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1internalNotes$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$internalNotesColmn)' class='text-overflow'>$internalNotes</a>
                                                <button type='button' id='internalNotes$id' style='display:none; margin-left:6px;' onclick='updateTrailerAdd($internalNotesColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' onclick='deleteTrailerAdd($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a>
                                            </td>
                                        </tr>
                                    ";
    }
}
echo $table;