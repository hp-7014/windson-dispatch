                        <?php
                                session_start();
                                $helper = "helper";
                                require "../../database/connection.php";
                                $no = 0;
                                $type = 'text';
                                $trailerNameColmn = 'trailerNumber';
                                $collection = $db->trailer_admin_add;
                                $show1 = $collection->aggregate([
                                    ['$match'=>['companyID'=>$_SESSION['companyId']]],
                                    ['$lookup' => [
                                        'from' => 'trailer_add',
                                        'localField' => 'companyID',
                                        'foreignField' => 'companyID',
                                        'as' => 'trailerdetails'
                                    ]
                                ]]);
                                
                                foreach ($show1 as $row) {
                                    $trailerNumber1 = $row['trailer'];
                                    $trailerdetails = $row['trailerdetails'];
                                    $trailerType = array();
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
                                            foreach ($trailerNumber1 as $row1) {
                                                $id = $row1['_id'];
                                                $trailerNumber = $row1['trailerNumber'];
                                                $trailerType1 = $trailerType[$row1['trailerType']];
                                                $j++;
                                                $licenseType = $row1['licenseType'];
                                                if(empty($row1['plateExpiry'])) {
                                                    $plateExpiry = "";
                                                } else {
                                                    $plateExpiry = date('d/m/Y',$row1['plateExpiry']);
                                                }
                                                if(empty($row1['inspectionExpiration'])) {
                                                    $inspectionExpiration = "";
                                                } else {
                                                    $inspectionExpiration = date('d/m/Y',$row1['inspectionExpiration']);
                                                }
                                                $status = $row1['status'];
                                                $model = $row1['model'];
                                                $year = $row1['year'];
                                                $axies = $row1['axies'];
                                                $registeredState = $row1['registeredState'];
                                                $vin = $row1['vin'];
                                                $dot = $row1['dot'];
                                                if(empty($row1['activationDate'])) {
                                                    $activationDate = "";
                                                } else {
                                                    $activationDate = date('d/m/Y',$row1['activationDate']);
                                                }
                                                $internalNotes = $row1['internalNotes'];
                                                $limit = 4;
                                                $total_records = $row1->count();
                                                $total_pages = ceil($total_records / $limit);
                                            $no++;
                                echo "<tr>
                                <th>$no</th>
                                <td>
                                    <a href='#' id='trailerNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,trailerNumber)' class='text-overflow'>$trailerNumber</a>
                                    <button type='button' id='trailerNumber'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$trailerType1</a>
                                    <button type='button' id='truckType'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$licenseType</a>
                                    <button type='button' id='licensePlate'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$plateExpiry</a>
                                    <button type='button' id='plateExpiry'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$inspectionExpiration</a>
                                    <button type='button' id='inspectionExpiry'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$status</a>
                                    <button type='button' id='status'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$model</a>
                                    <button type='button' id='ownership'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$year</a>
                                    <button type='button' id='mileage'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$axies</a>
                                    <button type='button' id='axies'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$registeredState</a>
                                    <button type='button' id='year'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$vin</a>
                                    <button type='button' id='fuelType'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$dot</a>
                                    <button type='button' id='startDate'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$activationDate</a>
                                    <button type='button' id='deactivationDate'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$internalNotes</a>
                                    <button type='button' id='ifta'.$id.'1' onclick='updateTrailerAdd($trailerNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' onclick='deleteTrailerAdd($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a>
                                </td>
                            </tr>
                        ";

                                }
                            }
            