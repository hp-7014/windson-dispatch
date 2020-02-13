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
                </form>
                <br>
                <table id="mainTable"
                       class="table table-striped mb-0 table-editable">
                    <thead>
                    <tr>
                        <th>Trailer Number</th>
                        <th>Trailer Type</th>
                        <th>License Plate</th>
                        <th>Plate Expiry</th>
                        <th>Inspection Expiration</th>
                        <th>Status</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Axles</th>
                        <th>Registered State</th>
                        <th>VIN </th>
                        <th>DOT Expiry Date</th>
                        <th>Activation Date</th>
                        <th>Internal Notes</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $show = $db->trailer_admin_add->find(['companyID' => $_SESSION['companyId']]);
                    foreach ($show as $row){
                    $show1 = $row['trailer'];
                    foreach ($show1 as $row1) {
                    $id = $row1['_id'];
                    $trailer = $row1['trailerNumber'];
                    $trailerType = $row1['trailerType'];
                    $licensePlate = $row1['licenseType'];
                    if(empty($row1['plateExpiry'])) {
                        $plateExpiry = "";
                    } else {
                        $plateExpiry = date('d/m/Y',$row1['plateExpiry']);
                    }
                        if(empty($row1['inspectionExpiration'])) {
                            $inspection = "";
                        } else {
                            $inspection = date('d/m/Y',$row1['inspectionExpiration']);
                        }
                    $status = $row1['status'];
                    $model = $row1['model'];
                    $year = $row1['year'];
                    $axies = $row1['axies'];
                    $registerstate = $row1['registeredState'];
                    $vin = $row1['vin'];
                                if(empty($row1['dot'])) {
                                    $dot = "";
                                } else {
                                    $dot = date('d/m/Y',$row1['dot']);
                                }
                                    if(empty($row1['activationDate'])) {
                                        $activationdate = "";
                                    } else {
                                        $activationdate = date('d/m/Y',$row1['activationDate']);
                                    }
                    $internalNotes = $row1['internalNotes'];
                    ?>
                    <tr>
                        <th><div contenteditable="true" onblur="updateTrailerAdd(this,'trailerNumber','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $trailer; ?></div></th>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'trailerType','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $trailerType; ?></div><br>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'licenseType','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $licensePlate; ?></div></td>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'plateExpiry','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $plateExpiry; ?></div></td>
                        <th><div contenteditable="true" onblur="updateTrailerAdd(this,'inspectionExpiration','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $inspection; ?></div></th>
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
                                 onclick="activate(this)"><?php echo $dot; ?></div></td>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'activationDate','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $activationdate; ?></div></td>
                        <td><div contenteditable="true" onblur="updateTrailerAdd(this,'internalNotes','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $internalNotes ?></div></td>
                        <td><a href="#" onclick="deleteTrailerAdd(<?php echo $id; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></a></i>
                        </td>

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
            <form method="post" enctype="multipart/form-data" id="trailerform" >
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label>Trailer Number <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Trailer Number *"
                                   type="text" id="trailer_number" name="trailer_number">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="trailertype">Trailer Type <span class="mandatory">*</span></label>
                        <input class="form-control" id="trailertype" name="traileradd_type" list="trailertypes" placeholder="Trailer Type"/>
                    </div>
                    <div class="form-group col-md-2">
                        <label>License Plate <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="License Plate"
                                   type="text" id="license_plate" name="license_plate">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Plate Expiry <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" type="date" id="plate_expiry" name="plate_expiry">
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
                        <label>Model</label>
                        <div>
                            <input class="form-control" placeholder="Model" type="text" id="truckmod" name="truckmod">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Year</label>
                        <div>
                            <input class="form-control" placeholder="Year" type="text"
                                   id="year" name="year">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Axles</label>
                        <div>
                            <input class="form-control" placeholder="Axles"
                                   type="text" id="axies" name="axies">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <p class="form-box">
                            <label for="RegisteredState">Registered State</label>
                            <input class="form-control" id="registered_state" name="registered_state" list="registeredstate" placeholder="Registered State" required/>
                        </p>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>VIN <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" type="text" placeholder="VIN #" id="vin" name="vin">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>DOT Expiry Date</label>
                        <div>
                            <input class="form-control" type="date" id="dot" name="dot">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Activation Date</label>
                        <div>
                            <input class="form-control" type="date" id="activation_date" name="activation_date">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Internal Notes</label>
                        <div>
                            <textarea rows="2" cols="30" class="form-control" type="textarea" id="internal_notes" name="internal_notes"></textarea>
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
            <datalist id="trailertypes">
                <?php
                $show = $db->trailer_add->find(['companyID' => $_SESSION['companyId']]);
                foreach ($show as $row){
                    $show1 = $row['trailer'];
                    foreach ($show1 as $row1) {
                        $id = $row1['_id'];
                        $trailerType = $row1['trailerType'];
                        ?>
                        <option value="<?php echo $id.")".$trailerType; ?>">
                    <?php }
                } ?>
            </datalist>
            <datalist id="registeredstate">
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
            <div class="modal-footer">
                <label class="text-danger" style="padding-right: 360px"><b>Note :</b>&nbsp; The Document Upload Only One Time After Upload Document You Cannot Change. Only .jpg .jpeg .png .pdf Formate Upload.  File Size Limit 200KB.  Only 5 File Upload. </label>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="Traileradd()">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    var filesize = document.getElementById("files");
    filesize.onchange = function() {
        for (var i = 0; i < this.files.length; i++) {
            var filesize1 = this.files[i].size;
            if (filesize1 < 200000) {
            } else {
                swal("Oops...", "File size is to large! Please Select a file less than 200KB", "error");
                this.value = "";
            }
        }
    };
</script>