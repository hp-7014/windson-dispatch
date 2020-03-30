<?php session_start();
require "../database/connection.php";
?>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_Truck"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <div class="trucktype-container" style="z-index: 1600"></div>
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Truck</h5>
                <button type="button" class="close modalTruck" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" id="truckform">
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
                                <label for="trucktype">Truck Type <span class="mandatory">*</span></label>&nbsp;<i
                                        class="mdi mdi-plus-circle plus" title="Add Truck Type" id="addTruckType"></i>
                                <input class="form-control" id="trucktype" name="trucktype1" list="trucktypes"
                                       placeholder="Truck Type" required/>
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
                                <input class="form-control" id="RegisteredState" name="registered_state"
                                       list="registered_state" placeholder="Registered State" required/>
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
                                <input class="form-control" type="text" placeholder="Empty / Gross Weight" id="gross"
                                       name="gross">
                            </div>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label>VIN <span class="mandatory">*</span></label>
                            <div>
                                <input class="form-control" type="text" placeholder="VIN #" id="vin" name="vin"
                                       required>
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
                                <input class="form-control" type="text" placeholder="Transponder" id="transponder"
                                       name="transponder">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>IFTA Truck</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input"
                                       id="customCheck1" name="customCheck1" data-parsley-multiple="groups"
                                       data-parsley-mincheck="2" value="IFTA Truck">
                                <label class="custom-control-label" for="customCheck1">Include this Truck for
                                    IFTA</label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Internal Notes</label>
                            <div>
                            <textarea rows="2" cols="30" class="form-control" type="textarea"
                                      id="Internal_note" placeholder="Internal Note" name="Internal_note"></textarea>
                                <input type="hidden" id="companyId" name="companyId"
                                       value="<?php echo $_SESSION['companyId']; ?>">
                            </div>
                        </div>
                        <div>
                            <div class="custom-upload-btn-wrapper float-right">
                                <button class="custom-btn" style="margin-top: 35px; margin-right: 100px">Choose file
                                </button>
                                <input type="file" id="files" onchange = "getfiles(this.files);" name="files[]" multiple accept=".png, .jpg, .jpeg, .pdf"/>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <label class="text-danger"><b>Note :</b>&nbsp; The Document Upload Only One
                    Time After Upload Document You Cannot Change. Only .jpg .jpeg .png .pdf Formate Upload. File Size
                    Limit 200KB. Only 5 File Upload. </label>
                <button type="button" class="btn btn-danger waves-effect modalTruck">
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
                        $equipValue = "'" . $row1['_id'] . ")&nbsp;" . $row1['truckType'] . "'";
                        echo " <option value=$equipValue></option>";
                    }
                } ?>
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
