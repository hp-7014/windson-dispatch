<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="shipper"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0">
                    Shipper</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="shipper-container" style="z-index: 1600"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal"
                                            data-target="#" id="AddShipper">Add
                                    </button>
                                    <input type="submit" name="submit" onclick="importShipper()"
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
                                        <th>Shipper Name</th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Postal / Zip</th>
                                        <th>Contact Name</th>
                                        <th>Contact Email</th>
                                        <th>Telephone</th>
                                        <th>Ext</th>
                                        <th>Toll Free</th>
                                        <th>Fax</th>
                                        <th>Shipping Hours</th>
                                        <th>Appointments</th>
                                        <th>Major Intersection/Directions</th>
                                        <th>Status</th>
                                        <th>Shipping Notes</th>
                                        <th>Internal Notes</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require 'model/Shipper.php';

                                    $shipper = new Shipper();
                                    $show_data = $db->shipper->find(['companyID' => $_SESSION['companyId']]);
                                    //$show_data = $db->shipper->findOne(['companyID'=>$_SESSION['companyId']],['shipper.deleteStatus'=>['$elemMatch'=>['deleteStatus'=>0,'shipperLocation'=>'anand']]]);
                                    //var_dump($show_data);


                                    $no = 1;
                                    foreach ($show_data as $show) {
                                        $show = $show['shipper'];
                                        foreach ($show as $s) {
                                            ?>
                                            <tr>
                                                <td><a href="#"><?php echo $no++; ?></a></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperName',<?php echo $s['_id']; ?>)"><?php echo $s['shipperName']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperAddress',<?php echo $s['_id']; ?>)"><?php echo $s['shipperAddress']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperLocation',<?php echo $s['_id']; ?>)"><?php echo $s['shipperLocation']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperPostal',<?php echo $s['_id']; ?>)"><?php echo $s['shipperPostal']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperContact',<?php echo $s['_id']; ?>)"><?php echo $s['shipperContact']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperEmail',<?php echo $s['_id']; ?>)"><?php echo $s['shipperEmail']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperTelephone',<?php echo $s['_id']; ?>)"><?php echo $s['shipperTelephone']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperExt',<?php echo $s['_id']; ?>)"><?php echo $s['shipperExt']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperTollFree',<?php echo $s['_id']; ?>)"><?php echo $s['shipperTollFree']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperFax',<?php echo $s['_id']; ?>)"><?php echo $s['shipperFax']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperShippingHours',<?php echo $s['_id']; ?>)"><?php echo $s['shipperShippingHours']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperAppointments',<?php echo $s['_id']; ?>)"><?php echo $s['shipperAppointments']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperIntersaction',<?php echo $s['_id']; ?>)"><?php echo $s['shipperIntersaction']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shipperStatus',<?php echo $s['_id']; ?>)"><?php echo $s['shipperStatus']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'shippingNotes',<?php echo $s['_id']; ?>)"><?php echo $s['shippingNotes']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateShipper(this,'internalNotes',<?php echo $s['_id']; ?>)"><?php echo $s['internalNotes']; ?></td>
                                                <td><a href="#" onclick="deleteShipper(<?php echo $s['_id']; ?>)"><i
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
                <button type="button" onclick="exportShipper(<?php echo $_SESSION['companyId']; ?>)"
                        class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--//---------------------------------------------------------->
