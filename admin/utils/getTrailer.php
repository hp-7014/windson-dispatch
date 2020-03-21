<?php
    session_start();
    $helper = "helper";
    require "../../database/connection.php";
    $no = 0;
    $table = "";
    $list = "";
    $type = 'text';

                                $trailerNumberColmn = 'trailerNumber';
                                $trailerTypeColmn = 'trailerType';
                                $licenseTypeColmn = 'licenseType';
                                $plateExpiryColmn = 'plateExpiry';
                                $inspectionExpirationColmn = 'inspectionExpiration';
                                $statusColmn = 'status';
                                $modelColmn = 'model';
                                $yearColmn = 'year';
                                $axiesColmn = 'axies';
                                $registeredStateColmn = 'registeredState';
                                $vinColmn = 'vin';
                                $dotColmn = 'dot';
                                $activationDateColmn = 'activationDate';
                                $internalNotesColmn = 'internalNotes';

                                $collection = $db->trailer_admin_add;
                                    $show1 = $collection->aggregate([
                                        ['$lookup' => [
                                            'from' => 'trailer_add',
                                            'localField' => 'companyID', 
                                            'foreignField' => 'companyID',
                                            'as' => 'trailerdetails'
                                        ]],
                                        ['$match'=>['companyID'=>1]]
                                     ]);
                                    
                                     foreach ($show1 as $row) {
                                            $trailer = $row['trailer'];
                                            $trailerdetails = $row['trailerdetails'];
                                            foreach ($trailerdetails as $row2) {
                                                $trailermaster = $row2['trailer'];
                                                $trailer_type = array();
                                                foreach ($trailermaster as $row3) {
                                                    $trailerid = $row3['_id'];
                                                    $trailer_type[$trailerid] = $row3['trailerType'];
                                                }
                                            }
                                            foreach ($trailer as $row4) {
                                                    $id = $row4['_id'];
                                                    $trailerNumber = $row4['trailerNumber'];
                                                    $trailerType = $trailer_type[$row4['trailerType']];
                                                    $licenseType = $row4['licenseType'];
                                                    if(empty($row4['plateExpiry'])) {
                                                        $plateExpiry = "";
                                                    } else {
                                                        $plateExpiry = date('d/m/Y',$row4['plateExpiry']);
                                                    }
                                                    if(empty($row4['inspectionExpiration'])) {
                                                        $inspectionExpiration = "";
                                                    } else {
                                                        $inspectionExpiration = date('d/m/Y',$row4['inspectionExpiration']);
                                                    }
                                                    $status = $row4['status'];
                                                    $model = $row4['model'];
                                                    $year = $row4['year'];
                                                    $axies = $row4['axies'];
                                                    $registeredState = $row4['registeredState'];
                                                    $vin = $row4['vin'];
                                                    if(empty($row4['dot'])) {
                                                        $dot = "";
                                                    } else {
                                                        $dot = date('d/m/Y',$row4['dot']);
                                                    }
                                                    if(empty($row4['activationDate'])) {
                                                        $activationDate = "";
                                                    } else {
                                                        $activationDate = date('d/m/Y',$row4['activationDate']);
                                                    }
                                                    $internalNotes = $row4['internalNotes'];
                                                $limit = 4;
                                                $total_records = $row4->count();
                                                $total_pages = ceil($total_records / $limit);
                                            $no++;
                                    $table .= "<tr>
                                            <th>$no</th>
                                            <td>
                                                <a href='#' id='1trailerNumber$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$trailerNumberColmn)' class='text-overflow'>$trailerNumber</a>
                                                <button type='button' id='trailerNumber$id' style='display:none; margin-left:6px;' onclick='updateDriver($trailerNumberColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1trailerType$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$trailerTypeColmn)' class='text-overflow'>$trailerType</a>
                                                <button type='button' id='trailerType$id' style='display:none; margin-left:6px;' onclick='updateDriver($trailerTypeColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1licenseType$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$licenseTypeColmn)' class='text-overflow'>$licenseType</a>
                                                <button type='button' id='licenseType$id' style='display:none; margin-left:6px;' onclick='updateDriver($licenseTypeColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1plateExpiry$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$plateExpiryColmn)' class='text-overflow'>$plateExpiry</a>
                                                <button type='button' id='plateExpiry$id' style='display:none; margin-left:6px;' onclick='updateDriver($plateExpiryColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1inspectionExpiration$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$inspectionExpirationColmn)' class='text-overflow'>$inspectionExpiration</a>
                                                <button type='button' id='inspectionExpiration$id' style='display:none; margin-left:6px;' onclick='updateDriver($inspectionExpirationColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1status$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$statusColmn)' class='text-overflow'>$status</a>
                                                <button type='button' id='status$id' style='display:none; margin-left:6px;' onclick='updateDriver($statusColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1model$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$modelColmn)' class='text-overflow'>$model</a>
                                                <button type='button' id='model$id' style='display:none; margin-left:6px;' onclick='updateDriver($modelColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1year$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$yearColmn)' class='text-overflow'>$year</a>
                                                <button type='button' id='year$id' style='display:none; margin-left:6px;' onclick='updateDriver($yearColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1axies$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$axiesColmn)' class='text-overflow'>$axies</a>
                                                <button type='button' id='axies$id' style='display:none; margin-left:6px;' onclick='updateDriver($axiesColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1registeredState$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$registeredStateColmn)' class='text-overflow'>$registeredState</a>
                                                <button type='button' id='registeredState$id' style='display:none; margin-left:6px;' onclick='updateDriver($registeredStateColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1vin$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$vinColmn)' class='text-overflow'>$vin</a>
                                                <button type='button' id='vin$id' style='display:none; margin-left:6px;' onclick='updateDriver($vinColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1dot$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$dotColmn)' class='text-overflow'>$dot</a>
                                                <button type='button' id='dot$id' style='display:none; margin-left:6px;' onclick='updateDriver($dotColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1activationDate$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$activationDateColmn)' class='text-overflow'>$activationDate</a>
                                                <button type='button' id='activationDate$id' style='display:none; margin-left:6px;' onclick='updateDriver($activationDateColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' id='1internalNotes$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$internalNotesColmn)' class='text-overflow'>$internalNotes</a>
                                                <button type='button' id='internalNotes$id' style='display:none; margin-left:6px;' onclick='updateDriver($internalNotesColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                            </td>
                                            <td>
                                                <a href='#' onclick='deleteTrailerAdd($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a>
                                            </td>
                                        </tr>
";
$value = "'".$id.")&nbsp;".$trailerNumber."'";
$list .= "<option value=$value></option>";

    }
}
echo $table."^".$list;