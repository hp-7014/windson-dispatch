<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="trailer"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="trailer-container" style="z-index: 1600"></div>
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Trailer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#add_Trailer"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="trailer_table" class="scroll" >
                                <thead>
                                    <tr>
                                        <th scope="col" col width="160">No</th>
                                        <th scope="col" col width="160" data-priority="1">Trailer Number</th>
                                        <th scope="col" col width="160" data-priority="1">Trailer Type</th>
                                        <th scope="col" col width="160" data-priority="3">License Plate</th>
                                        <th scope="col" col width="160" data-priority="1">Plate Expiry</th>
                                        <th scope="col" col width="160" data-priority="3">Inspection Expiration</th>
                                        <th scope="col" col width="160" data-priority="3">Status</th>
                                        <th scope="col" col width="160" data-priority="6">Model</th>
                                        <th scope="col" col width="160" data-priority="6">Year</th>
                                        <th scope="col" col width="160" data-priority="6">Axles</th>
                                        <th scope="col" col width="160" data-priority="1">Registered State</th>
                                        <th scope="col" col width="160" data-priority="3">VIN</th>
                                        <th scope="col" col width="160" data-priority="1">DOT Expiry Date</th>
                                        <th scope="col" col width="160" data-priority="3">Activation Date</th>
                                        <th scope="col" col width="160" data-priority="3">Internal Notes</th>
                                        <th scope="col" col width="160" data-priority="6">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                <?php
                                $i = 1;
                                $collection = $db->trailer_admin_add;
                                $show1 = $collection->aggregate([
                                    ['$match'=>['companyID'=>$_SESSION['companyId']]],
                                    ['$unwind'=>'$trailerdetails'],
                                    ['$unwind'=>'$trailer'],
                                    ['$match'=>['deleteStatus'=>0]],
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
                                ?>

                                <tr>
                                    <th><?php echo $i++ ?></th>
                                    <td>
                                        <a href="#" id="trailerNumber<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'trailerNumber');" class="text-overflow"><?php echo  $trailerNumber; ?></a>
                                        <button type="button" id="trailerNumber<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('trailerNumber',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="trailerType<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'trailerType');" class="text-overflow"><?php echo  $trailerType1; ?></a>
                                        <button type="button" id="trailerType<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('trailerType',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="licenseType<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'licenseType');" class="text-overflow"><?php echo  $licenseType; ?></a>
                                        <button type="button" id="licenseType<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('licenseType',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="plateExpiry<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'plateExpiry');" class="text-overflow"><?php echo  $plateExpiry; ?></a>
                                        <button type="button" id="plateExpiry<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('plateExpiry',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="inspectionExpiration<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'inspectionExpiration');" class="text-overflow"><?php echo  $inspectionExpiration; ?></a>
                                        <button type="button" id="inspectionExpiration<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('inspectionExpiration',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="status<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'status');" class="text-overflow"><?php echo  $status; ?></a>
                                        <button type="button" id="status<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('status',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="model<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'model');" class="text-overflow"><?php echo  $model; ?></a>
                                        <button type="button" id="model<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('model',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="year<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'year');" class="text-overflow"><?php echo  $year; ?></a>
                                        <button type="button" id="year<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('year',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="axies<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'axies');" class="text-overflow"><?php echo  $axies; ?></a>
                                        <button type="button" id="axies<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('axies',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="registeredState<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'registeredState');" class="text-overflow"><?php echo  $registeredState; ?></a>
                                        <button type="button" id="registeredState<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('registeredState',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="vin<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'vin');" class="text-overflow"><?php echo  $vin; ?></a>
                                        <button type="button" id="vin<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('vin',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="dot<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'dot');" class="text-overflow"><?php echo  $dot; ?></a>
                                        <button type="button" id="dot<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('dot',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="activationDate<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'activationDate');" class="text-overflow"><?php echo  $activationDate; ?></a>
                                        <button type="button" id="activationDate<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('activationDate',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="internalNotes<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'internalNotes');" class="text-overflow"><?php echo  $internalNotes; ?></a>
                                        <button type="button" id="internalNotes<?php echo $row1['_id']; ?>" onclick="updateTrailerAdd('internalNotes',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td><a href="#" onclick="deleteTrailerAdd(<?php echo $id; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></a></i>
                                    </td>

                                    <?php }
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
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
                                        <th>VIN</th>
                                        <th>DOT Expiry Date</th>
                                        <th>Activation Date</th>
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
                <button type="button" onclick="exportTrailerAdd()" class="btn btn-primary waves-effect waves-light">
                    Export
                </button>
                <button type="button" class="btn btn-danger waves-effect"  data-dismiss="modal">
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
                <label class="text-danger" style="padding-right: 360px"><b>Note :</b>&nbsp; The Document Upload Only One
                    Time After Upload Document You Cannot Change. Only .jpg .jpeg .png .pdf Formate Upload. File Size
                    Limit 200KB. Only 5 File Upload. </label>
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
