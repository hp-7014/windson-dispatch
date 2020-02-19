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
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#add_Truck"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                            <br>
                            <div id="table-scroll" class="table-scroll">
                                <table id="truck_table" class="scroll" >
                                    <thead>
                                    <tr>
                                        <th scope="col" col width="160">No.</th>
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

                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $show = $db->truckadd->find(['companyID' => $_SESSION['companyId']]);
                                    foreach ($show as $row){
                                        $show1 = $row['truck'];
                                        foreach ($show1 as $row1) {
                                            $id = $row1['_id'];
                                            $truckNumber = $row1['truckNumber'];
                                            $truckType = $row1['truckType'];
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
<!-----------------------------------------------------------Add Truck--------------------------------------------------------------------->


<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_Truck"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Truck</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" id="truckform" >
                <div class="modal-body custom-modal-body">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label>Truck Number <span class="mandatory">*</span></label>
                            <div>
                                <input class="form-control" placeholder="Truck Number *"
                                       type="text" id="truck_number" name="truck_number" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <p class="form-box">
                                <label for="trucktype">Truck Type <span class="mandatory">*</span></label>
                                <input class="form-control" id="trucktype" name="trucktype1" list="trucktypes" placeholder="Truck Type" required/>
                            </p>

                        </div>
                        <div class="form-group col-md-2">
                            <label>License Plate <span class="mandatory">*</span></label>
                            <div>
                                <input class="form-control" placeholder="License Plate"
                                       type="text" id="license_plate" name="license_plate" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label>Plate Expiry <span class="mandatory">*</span></label>
                            <div>
                                <input class="form-control" type="date" id="plate_expiry" name="plate_expiry" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label>Inspection Expiration</label>
                            <div>
                                <input class="form-control" type="date" id="inspection" name="inspection">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Not Available">Not Available</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label>Ownership <span class="mandatory">*</span></label>
                            <div class="row">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input"
                                           id="ownership" name="ownershipp" value="Company Truck">
                                    <label class="custom-control-label"
                                           for="ownership">Company Truck</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input"
                                           id="Own" name="ownershipp" value="Owner Operator">
                                    <label class="custom-control-label" for="Own">Owner Operator</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Mileage</label>
                            <div>
                                <input class="form-control" placeholder="Mileage" type="text"
                                       id="mileage" name="mileage">
                            </div>
                        </div>
                        <div class="form-group col-md-1">
                            <label>Axles</label>
                            <div>
                                <input class="form-control" placeholder="Axles"
                                       type="text" id="axies" name="axies">
                            </div>
                        </div>
                        <div class="form-group col-md-1">
                            <label>Year</label>
                            <div>
                                <input class="form-control" placeholder="Year" type="text"
                                       id="year" name="year">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>
                                Fuel Type</label>
                            <select class="form-control" id="fuel_type" name="fuel_type">
                                <option value="gas">gas</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Reffer">Reffer</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2 ">
                            <label>Start Date</label>
                            <div>
                                <input class="form-control" type="date" id="start_date" name="start_date">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Deactivation Date</label>
                            <div>
                                <input class="form-control" placeholder="Toll Free" type="date"
                                       id="deactivation" name="deactivation">
                            </div>
                        </div>

                        <div class="form-group col-md-2">
                            <p class="form-box">
                                <label for="RegisteredState">Registered State</label>
                                <input class="form-control" id="RegisteredState" name="registered_state" list="registered_state" placeholder="Registered State" required/>
                            </p>

                        </div>

                        <div class="form-group col-md-2">
                            <label>Insurance Policy</label>
                            <div>
                                <input class="form-control" placeholder="Insurance Policy #"
                                       type="text" id="Insurance_Policy" name="Insurance_Policy">
                            </div>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label>Empty / Gross Weight</label>
                            <div>
                                <input class="form-control" type="text"  placeholder="Empty / Gross Weight" id="gross" name="gross">
                            </div>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label>VIN <span class="mandatory">*</span></label>
                            <div>
                                <input class="form-control" type="text"  placeholder="VIN #" id="vin" name="vin" required>
                            </div>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label>DOT Expiry Date</label>
                            <div>
                                <input class="form-control" type="date" id="dot" name="dot">
                            </div>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label>Transponder</label>
                            <div>
                                <input class="form-control" type="text"  placeholder="Transponder" id="transponder" name="transponder">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>IFTA Truck</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"
                                       id="customCheck1" name="customCheck1" data-parsley-multiple="groups"
                                       data-parsley-mincheck="2" value="IFTA Truck">
                                <label class="custom-control-label" for="customCheck1">Include this Truck for IFTA</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Internal Notes</label>
                            <div>
                            <textarea rows="2" cols="30" class="form-control" type="textarea"
                                      id="Internal_note" name="Internal_note"></textarea>
                                <input type="hidden" id="companyId" name="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                            </div>
                        </div>
                        <div>
                            <div class="custom-upload-btn-wrapper float-right">
                                <button class="custom-btn" style="margin-top: 35px; margin-right: 100px">Choose file</button>
                                <input type="file" id="files" name="files[]"  multiple accept=".png, .jpg, .jpeg, .pdf"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <label class="text-danger" style="padding-right: 360px"><b>Note :</b>&nbsp; The Document Upload Only One Time After Upload Document You Cannot Change. Only .jpg .jpeg .png .pdf Formate Upload.  File Size Limit 200KB.  Only 5 File Upload. </label>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="TruckAdd()">Save
                </button>
            </div>
            <datalist id="trucktypes">
                <?php
                $show = $db->truck_add->find(['companyID' => $_SESSION['companyId']]);
                foreach ($show as $row) {
                    $show1 = $row['truck'];
                    foreach ($show1 as $row1) {
                        $id = $row1['_id'];
                        $truckType = $row1['truckType'];
                        ?>
                        <option value="<?php echo $id.")".$truckType; ?>">
                    <?php }
                }?>
            </datalist>
            <datalist id="registered_state">
                <option value="AL">
                <option value="AK">
                <option value="AR">
                <option value="CA">
                <option value="CO">
                <option value="CT">
                <option value="DE">
                <option value="FL">
                <option value="GA">
                <option value="HI">
                <option value="ID">
                <option value="IL">
                <option value="IN">
                <option value="IA">
                <option value="KS">
                <option value="KY">
                <option value="LA">
                <option value="ME">
                <option value="MD">
                <option value="MA">
                <option value="MI">
                <option value="MN">
                <option value="MS">
                <option value="MO">
                <option value="MT">
                <option value="NE">
                <option value="NV">
                <option value="NH">
                <option value="NJ">
                <option value="NM">
                <option value="NY">
                <option value="NC">
                <option value="ND">
                <option value="OH">
                <option value="OK">
                <option value="OR">
                <option value="PA">
                <option value="RI">
                <option value="SC">
                <option value="SD">
                <option value="TN">
                <option value="TX">
                <option value="UT">
                <option value="VT">
                <option value="VA">
                <option value="WA">
                <option value="WV">
                <option value="WI">
                <option value="WY">
            </datalist>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<style>
        .table-scroll {
            position: relative;
            width: 100%;
            z-index: 1;
            margin: auto;
            overflow: auto;
            height: 320px;
        }

        .table-scroll table {
            width: 100%;
            min-width: 1280px;
            margin: auto;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-wrap {
            position: relative;
        }

        .table-scroll th,
        .table-scroll td {
            /*padding: 5px 10px;*/
            border: 1px solid #000;
            background: #fff;
            vertical-align: bottom;
            text-align: center;
        }

        .table-scroll thead th {
            background: #30419B;
            color: #fff;
            padding: 4px;
            position: -webkit-sticky;
            position: sticky;
            top: 0;
        }

        /* safari and ios need the tfoot itself to be position:sticky also */
        .table-scroll tfoot,
        .table-scroll tfoot th,
        .table-scroll tfoot td {
            position: -webkit-sticky;
            position: sticky;
            bottom: 0;
            background: #666;
            color: #fff;
            z-index: 4;
        }

        /* testing links*/

        th:first-child {
            position: -webkit-sticky;
            position: sticky;
            left: 0;
            z-index: 2;
            background: #ccc;
        }

        thead th:first-child,
        tfoot th:first-child {
            z-index: 5;
        }

        table {
            table-layout: fixed;
        }

        .text-overflow {
            padding-top: 10px;
            display:block;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        a.editable-click { border-bottom: none;
            color: #000000;}
        a.editable-click:hover{
            border-bottom: none;
        }
        .table-scroll::-webkit-scrollbar {
            width: 12px;
            height: 8px;
        }

        /* Track */

        .table-scroll::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }


        .table-scroll::-webkit-scrollbar-thumb {
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background: rgb(48, 65, 155);
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }

    </style>
