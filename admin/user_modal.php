<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="user"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0">
                    User</h5>
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
                                            data-target="#add_user">Add
                                    </button>
                                    <input type="submit" name="submit" onclick="importUser()"
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
                                    require 'model/User.php';

                                    $User = new User();
                                    $show_data = $db->user->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    foreach ($show_data as $show) {
                                        $show = $show['user'];
                                        foreach ($show as $s) {
                                            ?>
                                            <tr>
                                                <td><a href="#"><?php echo $no++; ?></a></td>
                                                <td contenteditable="true"
                                                    onblur="updateUser(this)"></td>

                                                <td><a href="#" onclick="deleteUser(<?php echo $s['_id']; ?>)"><i
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
                <button type="button" onclick="exportUser(<?php echo $_SESSION['companyId']; ?>)"
                        class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--//---------------------------------------------------------------------------------------->
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_user"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Email <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" id="userEmail" placeholder="Email *" type="text"
                            >
                            <input id="companyId" type="hidden" value="<?php echo $_SESSION['companyId']; ?>"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Username <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" id="userName" placeholder="Username *" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Password <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" id="userPass" placeholder="Password *"
                                   type="password">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>First Name <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" id="userFirstName" placeholder="First Name *" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Last Name <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" id="userLastName" placeholder="Last Name *" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Address <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" id="userAddress" placeholder="Address *" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Location </label>
                        <div>
                            <input class="form-control" id="userLocation" placeholder="Location" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Zip</label>
                        <div>
                            <input class="form-control" id="userZip" placeholder="Postal / Zip" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" id="userTelephone" placeholder="Telephone" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" id="userExt" placeholder="Ext" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Toll Free</label>
                        <div>
                            <input class="form-control" id="uerTollFree" aria-placeholder="Toll Free"
                                   placeholder="Toll Free" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Fax</label>
                        <div>
                            <input class="form-control" id="userFax" placeholder="Fax" type="text"
                            >
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th>Master</th>
                            <th>Check</th>
                            <th>Admin</th>
                            <th>Check</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Add Bank</td>
                            <td><input type="checkbox" id="addBank"></td>
                            <td>Add customer</td>
                            <td><input type="checkbox" id="addCustomer"></td>
                        </tr>
                        <tr>
                            <td>Company</td>
                            <td><input type="checkbox" id="addCompany"></td>
                            <td>Add Shipper</td>
                            <td><input type="checkbox" id="addShipper"></td>
                        </tr>
                        <tr>
                            <td>Currency</td>
                            <td><input type="checkbox" id="currency"></td>
                            <td>Add Consignee</td>
                            <td><input type="checkbox" id="addConsignee"></td>
                        </tr>
                        <tr>
                            <td>Payment Terms</td>
                            <td><input type="checkbox" id="paymentTerms"></td>
                            <td>Add Driver</td>
                            <td><input type="checkbox" id="addDriver"></td>
                        </tr>
                        <tr>
                            <td>Office</td>
                            <td><input type="checkbox" id="office"></td>
                            <td>Add Truck</td>
                            <td><input type="checkbox" id="addTruck"></td>
                        </tr>
                        <tr>
                            <td>Equipment Type</td>
                            <td><input type="checkbox" id="equipmentType"></td>
                            <td>Add Trailer</td>
                            <td><input type="checkbox" id="addTrailer"></td>
                        </tr>
                        <tr>
                            <td>Truck Type</td>
                            <td><input type="checkbox" id="truckType"></td>
                            <td>Add External Carrier</td>
                            <td><input type="checkbox" id="addExternalCarrier"></td>
                        </tr>
                        <tr>
                            <td>Trailer Type</td>
                            <td><input type="checkbox" id="trailerType"></td>
                            <td>Factoring Company</td>
                            <td><input type="checkbox" id="factoringCompany"></td>
                        </tr>
                        <tr>
                            <td>Status Type</td>
                            <td><input type="checkbox" id="statusType"></td>
                            <td>Customs Broker</td>
                            <td><input type="checkbox" id="customsBroker"></td>
                        </tr>
                        <tr>
                            <td>Load Type</td>
                            <td><input type="checkbox" id="loadType"></td>
                            <td>Owner Operator</td>
                            <td><input type="checkbox" id="ownerOperator"></td>
                        </tr>
                        <tr>
                            <td>Fix pay category</td>
                            <td><input type="checkbox" id="fixPayCategory"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" onclick="addUser()" class="btn btn-primary waves-effect waves-light">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->