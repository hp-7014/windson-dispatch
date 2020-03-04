                            <?php
                                session_start();
                                $helper = "helper";
                                require "../../database/connection.php";
                                $no = 0;
                                $type = '"text"';
                                $table = "";

                                $truckNameColmn = '"truckNumber"';
                                $truckTypeColmn = '"truckType"';
                                $licensePlateColmn = '"licensePlate"';
                                $plateExpiryColmn = '"plateExpiry"';
                                $inspectionExpiryColmn = '"inspectionExpiry"';
                                $statusColmn = '"status"';
                                $ownershipColmn = '"ownership"';
                                $mileageColmn = '"mileage"';
                                $axiesColmn = '"axies"';
                                $yearColmn = '"year"';
                                $fuelTypeColmn = '"fuelType"';
                                $startDateColmn = '"startDate"';
                                $deactivationDateColmn = '"deactivationDate"';
                                $iftaColmn = '"ifta"';
                                $registeredStateColmn = '"registeredState"';
                                $insurancePolicyColmn = '"insurancePolicy"';
                                $grossWeightColmn = '"grossWeight"';
                                $vinColmn = '"vin"';
                                $dotexpiryDateColmn = '"dotexpiryDate"';
                                $transponderColmn = '"transponder"';
                                $internalNotesColmn = '"internalNotes"';


                                //Join truckadd and truck_add
                                $collection = $db->truckadd;
                                $show1 = $collection->aggregate([
                                    ['$lookup' => [
                                        'from' => 'truck_add',
                                        'localField' => 'companyID',
                                        'foreignField' => 'companyID',
                                        'as' => 'truckdetails'
                                    ]],
                                    ['$match'=>['companyID'=>$_SESSION['companyId']]],
                                    ['$unwind'=>'$truck'],
                                    ['$sort'=>['truck._id'=>-1]],
                                    ['$match'=>['truck.deleteStatus'=>0]]
                                 ]);
                                 
                                 foreach ($show1 as $row) {
                                     $companyID = $row['companyID'];
                                     $truckNumber = array();
                                     $b = 0;
                                     $truckNumber[$b] = $row['truck'];
                                     $b++;
                                     $truckdetails = $row['truckdetails'];
                                     $truckTypes = array();
                                     foreach ($truckdetails as $row2) {
                                                 $truckdetails = $row2['truck'];
                                                 $k = 0;
                                                 foreach ($truckdetails as $row3) {
                                                     $id = $row3['_id'];
                                                     $truckTypes[$k] = $row3['truckType'];
                                                     $k++;
                                                 }    
                                         }
                                 
                                     $j = 0;
                                             foreach ($truckNumber as $row1) {
                                                 $id = $row1['_id'];
                                                 $truckNumber = $row1['truckNumber'];
                                                 $truckType = $truckTypes[$row1['truckType']];
                                                 $j++;
                                                 $licensePlate = $row1['licensePlate'];
                                                 if(empty($row1['plateExpiry'])) {
                                                     $plateExpiry = "";
                                                 } else {
                                                     $plateExpiry = date('d/m/Y',$row1['plateExpiry']);
                                                 }
                                                 if(empty($row1['inspectionExpiry'])) {
                                                     $inspectionExpiry = "";
                                                 } else {
                                                     $inspectionExpiry = date('d/m/Y',$row1['inspectionExpiry']);
                                                 }
                                                 $status = $row1['status'];
                                                 $ownership = $row1['ownership'];
                                                 $mileage = $row1['mileage'];
                                                 $axies = $row1['axies'];
                                                 $year = $row1['year'];
                                                 $fuelType = $row1['fuelType'];
                                                 if(empty($row1['startDate'])) {
                                                     $startDate = "";
                                                 } else {
                                                     $startDate = date('d/m/Y',$row1['startDate']);
                                                 }
                                                 if(empty($row1['deactivationDate'])){
                                                     $deactivationDate = "";
                                                 }else {
                                                     $deactivationDate = date('d/m/Y',$row1['deactivationDate']);
                                                 }
                                                 $ifta = $row1['ifta'];
                                                 $registeredState = $row1['registeredState'];
                                                 $insurancePolicy = $row1['insurancePolicy'];
                                                 $grossWeight = $row1['grossWeight'];
                                                 $vin = $row1['vin'];
                                                 if(empty($row1['dotexpiryDate'])){
                                                     $dotexpiryDate = "";
                                                 }else {
                                                     $dotexpiryDate = date($row1['dotexpiryDate']);
                                                 }
                                                 $transponder = $row1['transponder'];
                                                 $internalNotes = $row1['internalNotes'];
                                        $limit = 4;
                                        $total_records = $row1->count();
                                        $total_pages = ceil($total_records / $limit);
                                            $no++;
                            $table .= "<tr>
                                <th>$no</th>
                                <td>
                                    <a href='#' id='1truckNumber$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$truckNameColmn)' class='text-overflow'>$truckNumber</a>
                                    <button type='button' id='truckNumber$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($truckNameColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1truckType$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$truckTypeColmn)' class='text-overflow'>$truckType</a>
                                    <button type='button' id='truckType$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($truckTypeColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1licensePlate$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$licensePlateColmn)' class='text-overflow'>$licensePlate</a>
                                    <button type='button' id='licensePlate$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($licensePlateColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1plateExpiry$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$plateExpiryColmn)' class='text-overflow'>$plateExpiry</a>
                                    <button type='button' id='plateExpiry$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($plateExpiryColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1inspectionExpiry$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$inspectionExpiryColmn)' class='text-overflow'>$inspectionExpiry</a>
                                    <button type='button' id='inspectionExpiry$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($inspectionExpiryColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1status$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$statusColmn)' class='text-overflow'>$status</a>
                                    <button type='button' id='status$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($statusColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1ownership$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$ownershipColmn)' class='text-overflow'>$ownership</a>
                                    <button type='button' id='ownership$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($ownershipColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1mileage$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$mileageColmn)' class='text-overflow'>$mileage</a>
                                    <button type='button' id='mileage$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($mileageColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1axies$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$axiesColmn)' class='text-overflow'>$axies</a>
                                    <button type='button' id='axies$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($axiesColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1year$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$yearColmn)' class='text-overflow'>$year</a>
                                    <button type='button' id='year$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($yearColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1fuelType$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$fuelTypeColmn)' class='text-overflow'>$fuelType</a>
                                    <button type='button' id='fuelType$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($fuelTypeColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1startDate$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$startDateColmn)' class='text-overflow'>$startDate</a>
                                    <button type='button' id='startDate$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($startDateColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1deactivationDate$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$deactivationDateColmn)' class='text-overflow'>$deactivationDate</a>
                                    <button type='button' id='deactivationDate$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($deactivationDateColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1ifta$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$iftaColmn)' class='text-overflow'>$ifta</a>
                                    <button type='button' id='ifta$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($iftaColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1registeredState$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$registeredStateColmn)' class='text-overflow'>$registeredState</a>
                                    <button type='button' id='registeredState$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($registeredStateColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1insurancePolicy$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$insurancePolicyColmn)' class='text-overflow'>$insurancePolicy</a>
                                    <button type='button' id='insurancePolicy$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($insurancePolicyColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1grossWeight$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$grossWeightColmn)' class='text-overflow'>$grossWeight</a>
                                    <button type='button' id='grossWeight$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($grossWeightColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1vin$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$vinColmn)' class='text-overflow'>$vin</a>
                                    <button type='button' id='vin$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($vinColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1dotexpiryDate$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$dotexpiryDateColmn)' class='text-overflow'>$dotexpiryDate</a>
                                    <button type='button' id='dotexpiryDate$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($dotexpiryDateColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1transponder$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$transponderColmn)' class='text-overflow'>$transponder</a>
                                    <button type='button' id='transponder$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($transponderColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' id='1internalNotes$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$internalNotesColmn)' class='text-overflow'>$internalNotes</a>
                                    <button type='button' id='internalNotes$id' style='display:none; margin-left:6px;' onclick='updateTruckAdd($internalNotesColmn,$id)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
                                </td>
                                <td>
                                    <a href='#' onclick='deleteTruckAdd($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a>
                                </td>
                            </tr>
                        ";

                                }
                            }
        echo $table;