<?php session_start();
require "../database/connection.php";
?>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_Trailer"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Trailer</h5>
                <button type="button" class="close modalTrailer"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" id="trailerform" >
                <div class="modal-body custom-modal-body">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label>Trailer Number *</label>
                            <div>
                                <input class="form-control" placeholder="Trailer Number *"
                                       type="text" id="trailer_number" name="trailer_number">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="trailertype">Trailer Type</label>
                            <input id="trailertype" name="traileradd_type" list="trailertypes"/>
                        </div>
                        <div class="form-group col-md-2">
                            <label>License Plate</label>
                            <div>
                                <input class="form-control" placeholder="License Plate"
                                       type="text" id="license_plate" name="license_plate">
                            </div>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label>Plate Expiry</label>
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
                            <label>
                                Registered State *</label>
                            <select class="form-control" id="register_state" name="register_state">
                                <option value="LA">LA</option>
                                <option value="NY">NY</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 ">
                            <label>VIN #</label>
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
                        <option value="<?php echo $id; ?>"><?php echo $trailerType;  ?></option>
                    <?php }
                } ?>
            </datalist>
            <div class="modal-footer">
                <label class="text-danger" style="padding-right: 360px"><b>Note :</b>&nbsp; The Document Upload Only One Time After Upload Document You Cannot Change. Only .jpg .jpeg .png .pdf Formate Upload.  File Size Limit 200KB.  Only 5 File Upload. </label>
                <button type="button" class="btn btn-danger waves-effect modalTrailer" >
                    Close
                </button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="Traileradd()">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->