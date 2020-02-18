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
            <div class="modal-body custom-modal-body">
                <form method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target="#" id="AddTrailer">ADD
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
                <button type="button" class="btn btn-danger waves-effect"  data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

