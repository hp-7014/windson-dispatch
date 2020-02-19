<?php
session_start();
require "../database/connection.php";
?>

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Driver"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="driver-container" style="z-index: 1400"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal"
                                            data-target="#" id="AddDriver">ADD
                                    </button>
                                    <input type="submit" name="submit" onclick="importDriver()"
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
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Telephone</th>
                                        <th>Alt - Tel #</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Zip</th>
                                        <th>Status</th>
                                        <th>Social Security No</th>
                                        <th>Date of Birth</th>
                                        <th>Date of Hire</th>
                                        <th>License No</th>
                                        <th>License Issue State</th>
                                        <th>License Exp. Date</th>
                                        <th>Last Medical</th>
                                        <th>Next Medical</th>
                                        <th>Last Drug Test</th>
                                        <th>Next Drug Test</th>
                                        <th>Passport Expiry</th>
                                        <th>Fast Card Expiry</th>
                                        <th>Hazmat Expiry</th>
                                        <th>Mile</th>
                                        <th>Flat</th>
                                        <th>Stop</th>
                                        <th>Tarp</th>
                                        <th>Percentage</th>
                                        <th>Termination Date</th>
                                        <th>Internal Notes</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require 'model/Driver.php';

                                    $driver = new Driver();
                                    $show_data = $db->driver->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    foreach ($show_data as $show) {
                                        $show = $show['driver'];
                                        foreach ($show as $s) {
                                            if ($s['deleteStatus'] == '0') {
                                                ?>
                                                <tr>
                                                    <td><a href="#"><?php echo $no++; ?></a></td>
                                                    <?php if ($s['ownerOperatorStatus'] == 1) { ?>
                                                        <td style="color:white;background: purple"
                                                            contenteditable="true"
                                                            onblur="updateDriver(this,'driverName',<?php echo $s['_id']; ?>)"><?php echo $s['driverName']; ?></td>
                                                    <?php } else { ?>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverName',<?php echo $s['_id']; ?>)"><?php echo $s['driverName']; ?></td>
                                                    <?php } ?>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverUsername',<?php echo $s['_id']; ?>)"><?php echo $s['driverUsername']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverTelephone',<?php echo $s['_id']; ?>)"><?php echo $s['driverTelephone']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverAlt',<?php echo $s['_id']; ?>)"><?php echo $s['driverAlt']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverEmail',<?php echo $s['_id']; ?>)"><?php echo $s['driverEmail']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverAddress',<?php echo $s['_id']; ?>)"><?php echo $s['driverAddress']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverLocation',<?php echo $s['_id']; ?>)"><?php echo $s['driverLocation']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverZip',<?php echo $s['_id']; ?>)"><?php echo $s['driverZip']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverStatus',<?php echo $s['_id']; ?>)"><?php echo $s['driverStatus']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverSocial',<?php echo $s['_id']; ?>)"><?php echo $s['driverSocial']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'dateOfbirth',<?php echo $s['_id']; ?>)"><?php echo date("d-m-Y", $s['dateOfbirth']); ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'dateOfhire',<?php echo $s['_id']; ?>)"><?php echo date("d-m-Y", $s['dateOfhire']); ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverLicenseNo',<?php echo $s['_id']; ?>)"><?php echo $s['driverLicenseNo']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverLicenseIssue',<?php echo $s['_id']; ?>)"><?php echo $s['driverLicenseIssue']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverLicenseExp',<?php echo $s['_id']; ?>)"><?php echo date("d-m-Y", $s['driverLicenseExp']); ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverLastMedical',<?php echo $s['_id']; ?>)"><?php echo date("d-m-Y", $s['driverLastMedical']); ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverNextMedical',<?php echo $s['_id']; ?>)"><?php echo date("d-m-Y", $s['driverNextMedical']); ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverLastDrugTest',<?php echo $s['_id']; ?>)"><?php echo date("d-m-Y", $s['driverLastDrugTest']); ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverNextDrugTest',<?php echo $s['_id']; ?>)"><?php echo date("d-m-Y", $s['driverNextDrugTest']); ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'passportExpiry',<?php echo $s['_id']; ?>)"><?php echo date("d-m-Y", $s['passportExpiry']); ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'fastCardExpiry',<?php echo $s['_id']; ?>)"><?php echo date("d-m-Y", $s['fastCardExpiry']); ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'hazmatExpiry',<?php echo $s['_id']; ?>)"><?php echo date("d-m-Y", $s['hazmatExpiry']); ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverMile',<?php echo $s['_id']; ?>)"><?php echo $s['driverMile']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverFlat',<?php echo $s['_id']; ?>)"><?php echo $s['driverFlat']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverStop',<?php echo $s['_id']; ?>)"><?php echo $s['driverStop']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverTrap',<?php echo $s['_id']; ?>)"><?php echo $s['driverTrap']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'driverPercentage',<?php echo $s['_id']; ?>)"><?php echo $s['driverPercentage']; ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'terminationDate',<?php echo $s['_id']; ?>)"><?php echo date("d-m-Y", $s['terminationDate']); ?></td>
                                                    <td contenteditable="true"
                                                        onblur="updateDriver(this,'InternalNote',<?php echo $s['_id']; ?>)"><?php echo $s['InternalNote']; ?></td>
                                                    <td><a href="#" onclick="deleteDriver(<?php echo $s['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                        <a href="#" title="Add Owner Operator" onclick="addAsOwner(<?php echo $s['_id']; ?>)"><i class="fa fa-user-circle" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="ownerOperator" style="margin-right: 82%">
                    <label class="moveLabel">Field's marked with this color are owner operator</label>
                </div>

                <button type="button" onclick="export_Driver()" class="btn btn-primary waves-effect"
                        data-dismiss="modal">
                    Export
                </button>

                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<style>
    .ownerOperator {
        height: 15px;
        width: 15px;
        background: purple;
        border: solid black 1px;
        /*margin-right: 82%;*/
    }

    .moveLabel {
        margin-left: 20px;
        width: 330px;
    }
</style>