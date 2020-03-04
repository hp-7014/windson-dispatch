<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
    <div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="truck"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="truck-container" style="z-index: 1400"></div>
        <div class="modal-dialog modal-xxl modal-dialog-scrollable">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                        Truck</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#" id="AddTruck"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                            <br>
                            <div id="table-scroll" class="table-scroll">
                                <table id="truck_table" class="scroll" >
                                    <thead>
                                    <tr>
                                        <th scope="col" col width="160">No.</th>
                                        <th scope="col" col width="160" data-priority="1">Truck Number</th>
                                        <th scope="col" col width="160" data-priority="1">Truck Type</th>
                                        <th scope="col" col width="160" data-priority="3">License Plate</th>
                                        <th scope="col" col width="160" data-priority="1">Plate Expiry</th>
                                        <th scope="col" col width="160" data-priority="3">Inspection Expiration</th>
                                        <th scope="col" col width="160" data-priority="3">Status</th>
                                        <th scope="col" col width="160" data-priority="6">Ownership</th>
                                        <th scope="col" col width="160" data-priority="6">Mileage</th>
                                        <th scope="col" col width="160" data-priority="6">Axles</th>
                                        <th scope="col" col width="160" data-priority="1">Year</th>
                                        <th scope="col" col width="160" data-priority="3">Fuel Type </th>
                                        <th scope="col" col width="160" data-priority="1">Start Date</th>
                                        <th scope="col" col width="160" data-priority="3">Deactivation Date</th>
                                        <th scope="col" col width="160" data-priority="3">IFTA Truck</th>
                                        <th scope="col" col width="160" data-priority="6">Registered State </th>
                                        <th scope="col" col width="160" data-priority="6">Insurance Policy</th>
                                        <th scope="col" col width="160" data-priority="6">Empty/Gross Weight</th>
                                        <th scope="col" col width="160" data-priority="1">VIN </th>
                                        <th scope="col" col width="160" data-priority="3">DOT Expiry Date</th>
                                        <th scope="col" col width="160" data-priority="1">Transponder</th>
                                        <th scope="col" col width="160" data-priority="3">Internal Notes</th>
                                        <th scope="col" col width="160" data-priority="3">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody id="truckBody">
                                    <?php
                                    $no = 1;
                                    $collection = $db->truckadd;
                                    $show1 = $collection->aggregate([
                                        ['$match'=>['companyID'=>$_SESSION['companyId']]],
                                        ['$lookup' => [
                                            'from' => 'truck_add',
                                            'localField' => 'companyID',
                                            'foreignField' => 'companyID',
                                            'as' => 'truckdetails'
                                        ]
                                       
                                     ]
                                     ]);
                                     
                                     foreach ($show1 as $row) {
                                         $companyID = $row['companyID'];
                                         $truckNumber = $row['truck'];
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
                                            
                                            ?>
                                            <tr>
                                                <th><?php echo $no++; ?></th>
                                                <td>
                                                    <a href="#" id="truckNumber<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'truckNumber');" class="text-overflow"><?php echo $truckNumber; ?></a>
                                                    <button type="button" id="truckNumber<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('truckNumber',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="truckType<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'truckType');" class="text-overflow"><?php echo $truckType; ?></a>
                                                    <button type="button" id="truckType<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('truckType',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="licensePlate<?php echo $row1['_id']; ?>2" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'licensePlate');" class="text-overflow"><?php echo $licensePlate; ?></a>
                                                    <button type="button" id="licensePlate<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('licensePlate',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="plateExpiry<?php echo $row1['_id']; ?>3" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'plateExpiry');" class="text-overflow"><?php echo $plateExpiry; ?></a>
                                                    <button type="button" id="plateExpiry<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('plateExpiry',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="inspectionExpiry<?php echo $row1['_id']; ?>4" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'inspectionExpiry');" class="text-overflow"><?php echo $inspectionExpiry; ?></a>
                                                    <button type="button" id="inspectionExpiry<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('inspectionExpiry',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="status<?php echo $row1['_id']; ?>5" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'status');" class="text-overflow"><?php echo $status; ?></a>
                                                    <button type="button" id="status<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('status',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="ownership<?php echo $row1['_id']; ?>6" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'ownership');" class="text-overflow"><?php echo $ownership; ?></a>
                                                    <button type="button" id="ownership<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('ownership',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="mileage<?php echo $row1['_id']; ?>7" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'mileage');" class="text-overflow"><?php echo $mileage; ?></a>
                                                    <button type="button" id="mileage<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('mileage',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="axies<?php echo $row1['_id']; ?>8" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'axies');" class="text-overflow"><?php echo $axies; ?></a>
                                                    <button type="button" id="axies<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('axies',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="year<?php echo $row1['_id']; ?>9" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'year');" class="text-overflow"><?php echo $year; ?></a>
                                                    <button type="button" id="year<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('year',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="fuelType<?php echo $row1['_id']; ?>10" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'fuelType');" class="text-overflow"><?php echo $fuelType; ?></a>
                                                    <button type="button" id="fuelType<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('fuelType',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="startDate<?php echo $row1['_id']; ?>11" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'startDate');" class="text-overflow"><?php echo $startDate; ?></a>
                                                    <button type="button" id="startDate<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('startDate',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="deactivationDate<?php echo $row1['_id']; ?>12" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'deactivationDate');" class="text-overflow"><?php echo $deactivationDate; ?></a>
                                                    <button type="button" id="deactivationDate<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('deactivationDate',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="ifta<?php echo $row1['_id']; ?>13" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'ifta');" class="text-overflow"><?php echo $ifta; ?></a>
                                                    <button type="button" id="ifta<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('ifta',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="registeredState<?php echo $row1['_id']; ?>14" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'registeredState');" class="text-overflow"><?php echo $registeredState; ?></a>
                                                    <button type="button" id="registeredState<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('registeredState',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="insurancePolicy<?php echo $row1['_id']; ?>15" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'insurancePolicy');" class="text-overflow"><?php echo $insurancePolicy; ?></a>
                                                    <button type="button" id="insurancePolicy<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('insurancePolicy',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="grossWeight<?php echo $row1['_id']; ?>16" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'grossWeight');" class="text-overflow"><?php echo $grossWeight; ?></a>
                                                    <button type="button" id="grossWeight<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('grossWeight',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="vin<?php echo $row1['_id']; ?>17" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'vin');" class="text-overflow"><?php echo $vin; ?></a>
                                                    <button type="button" id="vin<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('vin',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="dotexpiryDate<?php echo $row1['_id']; ?>18" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'dotexpiryDate');" class="text-overflow"><?php echo $dotexpiryDate; ?></a>
                                                    <button type="button" id="dotexpiryDate<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('dotexpiryDate',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="transponder<?php echo $row1['_id']; ?>19" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'transponder');" class="text-overflow"><?php echo $transponder; ?></a>
                                                    <button type="button" id="transponder<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('transponder',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="internalNotes<?php echo $row1['_id']; ?>20" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'internalNotes');" class="text-overflow"><?php echo $internalNotes; ?></a>
                                                    <button type="button" id="internalNotes<?php echo $row1['_id']; ?>" onclick="updateTruckAdd('internalNotes',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td><a href="#" onclick="deleteTruckAdd(<?php echo $id; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></a></i>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Truck Number</th>
                                        <th>Truck Type</th>
                                        <th>License Plate</th>
                                        <th>Plate Expiry</th>
                                        <th>Inspection Expiration</th>
                                        <th>Status</th>
                                        <th>Ownership</th>
                                        <th>Mileage</th>
                                        <th>Axles</th>
                                        <th>Year</th>
                                        <th>Fuel Type </th>
                                        <th>Start Date</th>
                                        <th>Deactivation Date</th>
                                        <th>IFTA Truck</th>
                                        <th>Registered State </th>
                                        <th>Insurance Policy</th>
                                        <th>Empty/Gross Weight</th>
                                        <th>VIN </th>
                                        <th>DOT Expiry Date</th>
                                        <th>Transponder</th>
                                        <th>Internal Notes</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <br>
                        <nav aria-label="..." class="float-right">
                            <ul class="pagination">
                                <?php
                                for($i=1; $i<=$total_pages; $i++){
                                    if($i == 1){
                                        ?>
                                        <li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i;?>" class="page-link" ><?php echo $i;?></a></li>

                                        <?php
                                    }
                                    else{
                                        ?>
                                        <li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            
                <div class="modal-footer">
                    <button type="button" onclick="exportTruckAdd()" class="btn btn-primary waves-effect waves-light">Export
                    </button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
