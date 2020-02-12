<?php
session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="consignee"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0">
                    Consignee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="consignee-container" style="z-index: 1800"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal"
                                            data-target="#" id="AddConsignee">Add
                                    </button>
                                    <input type="submit" name="submit" onclick="importConsignee()"
                                           class="btn btn-outline-info waves-effect waves-light float-right"
                                           value="Upload"/>
                                    <div class="custom-upload-btn-wrapper float-right">
                                        <button class="custom-btn">Choose file</button>
                                        <input type="file" name="file" id="file" accept=".csv"/>
                                    </div>
                                    <button type="button"
                                            class="btn btn-outline-success waves-effect waves-light float-right">CSV
                                        formate
                                    </button>
                                </form>
                                <br>
                                <table id="mainTable"
                                       class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Consignee Name</th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Postal / Zip</th>
                                        <th>Contact Name</th>
                                        <th>Contact Email</th>
                                        <th>Telephone</th>
                                        <th>Ext</th>
                                        <th>Toll Free</th>
                                        <th>Fax</th>
                                        <th>Receiving Hours</th>
                                        <th>Appointments</th>
                                        <th>Major Intersection/Directions</th>
                                        <th>Status</th>
                                        <th>Receiving Notes</th>
                                        <th>Internal Notes</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require 'model/Consignee.php';

                                    $consignee = new Consignee();
                                    $show_data = $db->consignee->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    foreach ($show_data as $show) {
                                        $show = $show['consignee'];
                                        foreach ($show as $s) {
                                            ?>
                                            <tr>
                                                <td><a href="#"><?php echo $no++; ?></a></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeName',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeName']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeAddress',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeAddress']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeLocation',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeLocation']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneePostal',<?php echo $s['_id']; ?>)"><?php echo $s['consigneePostal']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeContact',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeContact']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeEmail',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeEmail']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeTelephone',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeTelephone']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeExt',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeExt']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeTollFree',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeTollFree']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeFax',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeFax']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeReceiving',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeReceiving']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeAppointments',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeAppointments']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeIntersaction',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeIntersaction']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeStatus',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeStatus']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeRecivingNote',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeRecivingNote']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateConsignee(this,'consigneeInternalNote',<?php echo $s['_id']; ?>)"><?php echo $s['consigneeInternalNote']; ?></td>
                                                <td><a href="#" onclick="deleteConsignee(<?php echo $s['_id']; ?>)"><i
                                                                class="mdi mdi-delete-sweep-outline"
                                                                style="font-size: 20px; color: #FC3B3B"></i></a></td>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div>
            <div class="modal-footer">
                <button type="button" onclick="exportConsignee(<?php echo $_SESSION['companyId']; ?>)"
                        class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!---------------------------------------------------------------------------------------->
