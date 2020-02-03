<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
    <div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="truck"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xxl modal-dialog-scrollable">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                        Truck</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                data-target="#add_Truck">ADD
                        </button>
                    </form>
<br>
                    <table id="mainTable"
                           class="table table-striped mb-0 table-editable">
                        <thead>
                        <tr>
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
                        </thead>
                        <tbody>
                        <?php
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
                        ?>
                        <tr>
                            <th><div contenteditable="true" onblur="updateTruckAdd(this,'truckNumber','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $truckNumber; ?></div></th>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'truckType','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $truckType; ?></div><br>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'licensePlate','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $licensePlate; ?></div></td>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'plateExpiry','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $plateExpiry; ?></div></td>
                            <th><div contenteditable="true" onblur="updateTruckAdd(this,'inspectionExpiry','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $inspectionExpiry; ?></div></th>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'status','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $status; ?></div><br>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'ownership','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $ownership; ?></div></td>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'mileage','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $mileage; ?></div></td>
                            <th><div contenteditable="true" onblur="updateTruckAdd(this,'axies','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $axies; ?></div></th>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'year','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $year; ?></div><br>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'fuelType','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $fuelType; ?></div></td>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'startDate','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $startDate; ?></div></td>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'deactivationDate','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $deactivationDate; ?></div></td>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'ifta','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $ifta; ?></div></td>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'registeredState','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $registeredState; ?></div></td>
                            <th><div contenteditable="true" onblur="updateTruckAdd(this,'insurancePolicy','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $insurancePolicy; ?></div></th>
                            <th><div contenteditable="true" onblur="updateTruckAdd(this,'grossWeight','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $grossWeight; ?></div></th>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'vin','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $vin; ?></div><br>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'dotexpiryDate','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $dotexpiryDate; ?></div></td>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'transponder','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $transponder; ?></div></td>
                            <td><div contenteditable="true" onblur="updateTruckAdd(this,'internalNotes','<?php echo $id; ?>')"
                                     onclick="activate(this)"><?php echo $internalNotes; ?></div></td>
                            <td><a href="#" onclick="deleteTruckAdd(<?php echo $id; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></a></i>
                            </td>
                        </tr>
                        <?php }
                        } ?>
                        </tbody>
                    </table>
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
                            <label>Truck Number *</label>
                            <div>
                                <input class="form-control" placeholder="Truck Number *"
                                       type="text" id="truck_number" name="truck_number" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <p class="form-box">
                                <label for="trucktype">Truck Type</label>
                                <input id="trucktype" name="trucktype" list="trucktypes" required/>
                            </p>

                        </div>
                        <div class="form-group col-md-2">
                            <label>License Plate</label>
                            <div>
                                <input class="form-control" placeholder="License Plate"
                                       type="text" id="license_plate" name="license_plate" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label>Plate Expiry</label>
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
                            <label>Ownership</label>
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
                            <label>
                                Registered State *</label>
                            <select class="form-control" id="registered_state" name="registered_state">
                                <option value="LA">LA</option>
                                <option value="NY">NY</option>
                            </select>
                        </div>

                        <div class="form-group col-md-2">
                            <label>Insurance Policy #</label>
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
                            <label>VIN #</label>
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
                        <option value="<?php echo $id; ?>"><?php echo $truckType;  ?></option>
                    <?php }
                }?>
            </datalist>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->