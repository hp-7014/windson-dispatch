<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="trailer"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Trailer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <form method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target="#add_Trailer">ADD
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                            onclick="importExceltrailer()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile"/>
                    </div>
                    <button type="button"
                            class="btn btn-outline-success waves-effect waves-light float-right">CSV formate
                    </button>
                </form>
                <br>
            <div id="table-scroll" class="table-scroll">
                <table id="main-table" class="main-table ">
                    <thead>
                    <tr>
                        <th scope="col" style="background-color:#666666">Trailer Number</th>
                        <th scope="col">Trailer Type</th>
                        <th scope="col">License Plate</th>
                        <th scope="col">Plate Expiry</th>
                        <th scope="col">Inspection Expiration</th>
                        <th scope="col">Status</th>
                        <th scope="col">Model</th>
                        <th scope="col">Year</th>
                        <th scope="col">Axles</th>
                        <th scope="col">Registered State</th>
                        <th scope="col">VIN </th>
                        <th scope="col">DOT Expiry Date</th>
                        <th scope="col">Activation Date</th>
                        <th scope="col">Internal Notes</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <?php
                    $show = $db->trailer_admin_add->find(['companyID' => $_SESSION['companyId']]);
                    foreach ($show as $row){
                        $show1 = $row['trailer'];
                        foreach ($show1 as $row1) {
                            $id = $row1['_id'];
                            $trailer = $row1['trailerNumber'];
                            $trailerType = $row1['trailerType'];
                            $licensePlate = $row1['licenseType'];
                            $plateExpiry = $row1['plateExpiry'];
                            $inspection = $row1['inspectionExpiration'];
                            $status = $row1['status'];
                            $model = $row1['model'];
                            $year = $row1['year'];
                            $axies = $row1['axies'];
                            $registerstate = $row1['registeredState'];
                            $vin = $row1['vin'];
                            $dot = $row1['dot'];
                            $activationdate = $row1['dot'];
                            $internalNotes = $row1['internalNotes'];
                            ?>
                    <tbody>
                    <tr>
                        <th><div contenteditable="true" onblur="updateTrailerAdd(this,'trailerNumber','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $trailer; ?></div></th>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'trailerType','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $trailerType; ?></div><br>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'licenseType','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $licensePlate; ?></div></td>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'plateExpiry','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo date('d/m/Y', $plateExpiry); ?></div></td>
                        <th><div contenteditable="true" onblur="updateTrailerAdd(this,'inspectionExpiration','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo date('d/m/Y',$inspection); ?></div></th>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'status','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $status; ?></div><br>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'model','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $model; ?></div></td>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'year','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $year; ?></div></td>
                        <th><div contenteditable="true" onblur="updateTrailerAdd(this,'axies','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $axies; ?></div></th>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'registeredState','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $registerstate; ?></div><br>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'vin','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $vin; ?></div></td>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'dot','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo date('d/m/Y',$dot); ?></div></td>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'activationDate','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo date('d/m/Y',$activationdate) ?></div></td>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'internalNotes','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $internalNotes ?></div></td>
                        <td><a href="#" onclick="deleteTrailerAdd(<?php echo $id; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></a></i>
                        </td>
                    </tr>
                    <?php }
                    } ?>
                    </tbody>
                </table>
    </div>
            <div class="modal-footer">
                <button type="button" onclick="exportTrailerAdd()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_Trailer"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Trailer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label>Trailer Number *</label>
                        <div>
                            <input class="form-control" placeholder="Trailer Number *"
                                   type="text" id="trailer_number">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>
                            Trailer Type</label>
                        <select class="form-control" id="traileradd_type">
                            <?php
                            $show = $db->trailer_add->find(['companyID' => $_SESSION['companyId']]);
                            foreach ($show as $row){
                            $show1 = $row['trailer'];
                            foreach ($show1 as $row1) {
                            $id = $row1['_id'];
                            $trailerType = $row1['trailerType'];
                            ?>
                            <option value="<?php echo $trailerType; ?>"><?php echo $trailerType;  ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>License Plate</label>
                        <div>
                            <input class="form-control" placeholder="License Plate"
                                   type="text" id="license_plate">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Plate Expiry</label>
                        <div>
                            <input class="form-control" type="date" id="plate_expiry">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Inspection Expiration</label>
                        <div>
                            <input class="form-control" type="date" id="inspection">
                        </div>
                    </div>

                    <div class="form-group col-md-2">
                        <label>
                            Status</label>
                        <select class="form-control" id="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Not Available">Not Available</option>
                        </select>
                    </div>

                    <div class="form-group col-md-2">
                        <label>Model</label>
                        <div>
                            <input class="form-control" placeholder="Model" type="text" id="truckmod">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Year</label>
                        <div>
                            <input class="form-control" placeholder="Year" type="text"
                                   id="year">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Axles</label>
                        <div>
                            <input class="form-control" placeholder="Axles"
                                   type="text" id="axies">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>
                            Registered State *</label>
                        <select class="form-control" id="register_state">
                            <option value="LA">LA</option>
                            <option value="NY">NY</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>VIN #</label>
                        <div>
                            <input class="form-control" type="text" placeholder="VIN #" id="vin">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>DOT Expiry Date</label>
                        <div>
                            <input class="form-control" type="date" id="dot">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Activation Date</label>
                        <div>
                            <input class="form-control" type="date" id="activation_date">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Internal Notes</label>
                        <div>
                            <textarea rows="2" cols="30" class="form-control" type="textarea" id="internal_notes"></textarea>
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="Traileradd()">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->