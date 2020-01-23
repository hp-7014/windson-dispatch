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
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal"
                                            data-target="#add_shipper">Add
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
                                        <th>shipperAddress</th>
                                        <th>Telephone No</th>
                                        <th>Fax No</th>
                                        <th>M.C. No.</th>
                                        <th>US DOT No.</th>
                                        <th>Mailing Address</th>
                                        <th>Factoring Company</th>
                                        <th>Factoring Company Address</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
//                                    require 'model/Shipper.php';
//                                    $shipper = new Shipper();
//                                    $show_data = $db->shipper->find(['companyID' => $_SESSION['companyId']]);
//                                    $no = 1;
//                                    foreach ($show_data as $show) {
//                                            $sh = $show['company'];
//                                        foreach ($sh as $s) {
//                                            ?>
<!--                                            <tr>-->
<!--                                                <td>--><?php //echo $no++; ?><!--</td>-->
<!--                                                <td contenteditable="true"-->
<!--                                                    onblur="updateCompany(this,'companyName',--><?php //echo $s['_id']; ?><!--)">--><?php //echo $s['companyName']; ?><!--</td>-->
                                                <td><a href="#" onclick="deleteShipper(<?php //echo $s['_id']; ?>)"><i
                                                            class="mdi mdi-delete-sweep-outline"
                                                            style="font-size: 20px; color: #FC3B3B"></i></a>
                                                </td>
                                            </tr>
                                        <?php //}
//                                    } ?>
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
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_shipper"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Shipper</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Shipper Name *</label>
                        <div>
                            <input class="form-control" placeholder="Shipper Name" required type="text"
                                   id="shipperName">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Address *</label>
                        <div>
                            <input class="form-control" placeholder="Address *" type="text"
                                   id="shipperAddress">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Location *</label>
                        <div>
                            <input class="form-control" placeholder="Enter a location"
                                   type="text" id="shipperLocation">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Postal / Zip*</label>
                        <div>
                            <input class="form-control" placeholder="Postal / Zip" type="text"
                                   id="shipperPostal">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Contact Name</label>
                        <div>
                            <input class="form-control" placeholder="Contact Name" type="text"
                                   id="shipperContact">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Contact Email</label>
                        <div>
                            <input class="form-control" type="email" id="shipperEmail">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" type="text" id="shipperTelephone">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" type="text" id="shipperExt">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Toll Free</label>
                        <div>
                            <input class="form-control" placeholder="Toll Free" type="text"
                                   id="shipperTollFree">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Fax</label>
                        <div>
                            <input class="form-control" placeholder="Fax" type="text"
                                   id="shipperFax">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Shipping Hours</label>
                        <div>
                            <input class="form-control" placeholder="Shipping Hours" type="text"
                                   id="shipperShippingHours">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>
                            Appointments</label>
                        <select class="form-control" id="shipperAppointments">
                            <option value="no">--select--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Major Intersection/Directions</label>
                        <div>
                            <input class="form-control" type="text" id="shipperIntersaction">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Duplicate Info *</label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"
                                   id="customCheck1" name="shipperASconsignee" data-parsley-multiple="groups"
                                   data-parsley-mincheck="2">
                            <label class="custom-control-label" for="customCheck1">Add as
                                Consignee</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <label>Status *</label>
                        <div class="row">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input"
                                       id="defaultInline1" value="Active" name="shipperStatus"
                                       checked>
                                <label class="custom-control-label"
                                       for="defaultInline1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input"
                                       id="defaultInline2" value="Inactive" name="shipperStatus">
                                <label class="custom-control-label" for="defaultInline2">Inactive</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Shipping Notes</label>
                        <div>
                            <textarea rows="3" cols="30" class="form-control" type="textarea"
                                      id="shippingNotes"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Internal Notes</label>
                        <div>
                            <textarea rows="3" cols="30" class="form-control" type="textarea"
                                      id="internalNotes"></textarea>
                            <input type="hidden" id="companyID" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" onclick="addShipper()" class="btn btn-primary waves-effect waves-light">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->