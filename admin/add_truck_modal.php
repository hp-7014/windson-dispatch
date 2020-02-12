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
                <div class="modal-body custom-modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                data-target="#" id="AddTruck">ADD
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
