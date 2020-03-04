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

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="driver-container" style="z-index: 1400"></div>

                <form action="" method="post" enctype="multipart/form-data">
                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text"
                           id="search" placeholder="search" style="margin-left: 5px;">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal"
                            data-target="#" id="AddDriver"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
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
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="driver_table" class="scroll">
                                <thead>
                                <tr>
                                    <th scope="col" col width="160">#</th>
                                    <th scope="col" col width="160" data-priority="1">Name</th>
                                    <th scope="col" col width="160" data-priority="3">Username</th>
                                    <th scope="col" col width="160" data-priority="1">Telephone</th>
                                    <th scope="col" col width="160" data-priority="3">Alt - Tel #
                                    </th>
                                    <th scope="col" col width="160" data-priority="3">Email</th>
                                    <th scope="col" col width="160" data-priority="6">Address</th>
                                    <th scope="col" col width="160" data-priority="6">Location</th>
                                    <th scope="col" col width="160" data-priority="6">Zip</th>
                                    <th scope="col" col width="160" data-priority="1">Status</th>
                                    <th scope="col" col width="160" data-priority="3">Social
                                        Security No
                                    </th>
                                    <th scope="col" col width="160" data-priority="1">Date of
                                        Birth
                                    </th>
                                    <th scope="col" col width="160" data-priority="3">Date of Hire
                                    </th>
                                    <th scope="col" col width="160" data-priority="3">License No
                                    </th>
                                    <th scope="col" col width="160" data-priority="6">License Issue
                                        State
                                    </th>
                                    <th scope="col" col width="160" data-priority="6">License Exp.
                                        Date
                                    </th>
                                    <th scope="col" col width="160" data-priority="6">Last Medical
                                    </th>
                                    <th scope="col" col width="160" data-priority="1">Next Medical
                                    </th>
                                    <th scope="col" col width="160" data-priority="3">Last Drug
                                        Test
                                    </th>
                                    <th scope="col" col width="160" data-priority="1">Next Drug
                                        Test
                                    </th>
                                    <th scope="col" col width="160" data-priority="3">Passport
                                        Expiry
                                    </th>
                                    <th scope="col" col width="160" data-priority="3">Fast Card
                                        Expiry
                                    </th>
                                    <th scope="col" col width="160" data-priority="6">Hazmat
                                        Expiry
                                    </th>
                                    <th scope="col" col width="160" data-priority="6">Mile</th>
                                    <th scope="col" col width="160" data-priority="6">Flat</th>
                                    <th scope="col" col width="160" data-priority="1">Stop</th>
                                    <th scope="col" col width="160" data-priority="3">Tarp</th>
                                    <th scope="col" col width="160" data-priority="1">Percentage
                                    </th>
                                    <th scope="col" col width="160" data-priority="3">Internal
                                        Notes
                                    </th>
                                    <th scope="col" col width="160" data-priority="6">Action</th>
                                </tr>
                                </thead>

                                <tbody id="driverBody">
                                <?php
                                require 'model/Driver.php';

                                $driver = new Driver();
                                $show_data = $db->driver->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($show_data as $show) {
                                    $show = $show['driver'];
                                    foreach ($show as $s) {
                                        $limit = 10;
                                        $total_records = $s->count();
                                        $total_pages = ceil($total_records / $limit);
                                        if ($s['deleteStatus'] == '0') {
                                            ?>
                                            <tr>
                                                <th><?php echo $no++; ?></th>
                                                <td>
                                                    <a href="#"
                                                       id="driverName<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverName');"
                                                       class="text-overflow"><?php echo $s['driverName']; ?></a>
                                                    <button type="button"
                                                            id="driverName<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverName',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverUsername<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverUsername');"
                                                       class="text-overflow"><?php echo $s['driverUsername']; ?></a>
                                                    <button type="button"
                                                            id="driverUsername<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverUsername',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverTelephone<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverTelephone');"
                                                       class="text-overflow"><?php echo $s['driverTelephone']; ?></a>
                                                    <button type="button"
                                                            id="driverTelephone<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverTelephone',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverAlt<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverAlt');"
                                                       class="text-overflow"><?php echo $s['driverAlt']; ?></a>
                                                    <button type="button"
                                                            id="driverAlt<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverAlt',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverEmail<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverEmail');"
                                                       class="text-overflow"><?php echo $s['driverEmail']; ?></a>
                                                    <button type="button"
                                                            id="driverEmail<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverEmail',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverAddress<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverAddress');"
                                                       class="text-overflow"><?php echo $s['driverAddress']; ?></a>
                                                    <button type="button"
                                                            id="driverAddress<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverAddress',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverLocation<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverLocation');"
                                                       class="text-overflow"><?php echo $s['driverLocation']; ?></a>
                                                    <button type="button"
                                                            id="driverLocation<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverLocation',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverZip<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverZip');"
                                                       class="text-overflow"><?php echo $s['driverZip']; ?></a>
                                                    <button type="button"
                                                            id="driverZip<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverZip',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverStatus<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverStatus');"
                                                       class="text-overflow"><?php echo $s['driverStatus']; ?></a>
                                                    <button type="button"
                                                            id="driverStatus<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverStatus',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverSocial<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverSocial');"
                                                       class="text-overflow"><?php echo $s['driverSocial']; ?></a>
                                                    <button type="button"
                                                            id="driverSocial<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverSocial',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="dateOfbirth<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'dateOfbirth');"
                                                       class="text-overflow"><?php echo $s['dateOfbirth']; ?></a>
                                                    <button type="button"
                                                            id="dateOfbirth<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('dateOfbirth',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="dateOfhire<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'dateOfhire');"
                                                       class="text-overflow"><?php echo $s['dateOfhire']; ?></a>
                                                    <button type="button"
                                                            id="dateOfhire<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('dateOfhire',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverLicenseNo<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverLicenseNo');"
                                                       class="text-overflow"><?php echo $s['driverLicenseNo']; ?></a>
                                                    <button type="button"
                                                            id="driverLicenseNo<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverLicenseNo',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverLicenseIssue<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverLicenseIssue');"
                                                       class="text-overflow"><?php echo $s['driverLicenseIssue']; ?></a>
                                                    <button type="button"
                                                            id="driverLicenseIssue<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverLicenseIssue',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverLicenseExp<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverLicenseExp');"
                                                       class="text-overflow"><?php echo $s['driverLicenseExp']; ?></a>
                                                    <button type="button"
                                                            id="driverLicenseExp<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverLicenseExp',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverLastMedical<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverLastMedical');"
                                                       class="text-overflow"><?php echo $s['driverLastMedical']; ?></a>
                                                    <button type="button"
                                                            id="driverLastMedical<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverLastMedical',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverNextMedical<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverNextMedical');"
                                                       class="text-overflow"><?php echo $s['driverNextMedical']; ?></a>
                                                    <button type="button"
                                                            id="driverNextMedical<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverNextMedical',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverLastDrugTest<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverLastDrugTest');"
                                                       class="text-overflow"><?php echo $s['driverLastDrugTest']; ?></a>
                                                    <button type="button"
                                                            id="driverLastDrugTest<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverLastDrugTest',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverNextDrugTest<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverNextDrugTest');"
                                                       class="text-overflow"><?php echo $s['driverNextDrugTest']; ?></a>
                                                    <button type="button"
                                                            id="driverNextDrugTest<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverNextDrugTest',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="passportExpiry<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'passportExpiry');"
                                                       class="text-overflow"><?php echo $s['passportExpiry']; ?></a>
                                                    <button type="button"
                                                            id="passportExpiry<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('passportExpiry',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="fastCardExpiry<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'fastCardExpiry');"
                                                       class="text-overflow"><?php echo $s['fastCardExpiry']; ?></a>
                                                    <button type="button"
                                                            id="fastCardExpiry<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('fastCardExpiry',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="hazmatExpiry<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'hazmatExpiry');"
                                                       class="text-overflow"><?php echo $s['hazmatExpiry']; ?></a>
                                                    <button type="button"
                                                            id="hazmatExpiry<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('hazmatExpiry',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverMile<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverMile');"
                                                       class="text-overflow"><?php echo $s['driverMile']; ?></a>
                                                    <button type="button"
                                                            id="driverMile<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverMile',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverFlat<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverFlat');"
                                                       class="text-overflow"><?php echo $s['driverFlat']; ?></a>
                                                    <button type="button"
                                                            id="driverFlat<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverFlat',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverStop<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverStop');"
                                                       class="text-overflow"><?php echo $s['driverStop']; ?></a>
                                                    <button type="button"
                                                            id="driverStop<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverStop',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverTrap<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverTrap');"
                                                       class="text-overflow"><?php echo $s['driverTrap']; ?></a>
                                                    <button type="button"
                                                            id="driverTrap<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverTrap',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="InternalNote<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'InternalNote');"
                                                       class="text-overflow"><?php echo $s['InternalNote']; ?></a>
                                                    <button type="button"
                                                            id="InternalNote<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('InternalNote',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#"
                                                       id="driverPercentage<?php echo $s['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'driverPercentage');"
                                                       class="text-overflow"><?php echo $s['driverPercentage']; ?></a>
                                                    <button type="button"
                                                            id="driverPercentage<?php echo $s['_id']; ?>"
                                                            onclick="updateDriver('driverPercentage',<?php echo $s['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>

                                                <td><a href="#"
                                                       onclick="deleteDriver(<?php echo $s['_id']; ?>)"><i
                                                                class="mdi mdi-delete-sweep-outline"
                                                                style="font-size: 20px; color: #FC3B3B"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                } ?>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>No</th>
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
                            for ($i = 1; $i <= $total_pages; $i++) {
                                if ($i == 1) {
                                    ?>
                                    <li class="pageitem active" id="<?php echo $i; ?>"><a href="JavaScript:Void(0);"
                                                                                          data-id="<?php echo $i; ?>"
                                                                                          class="page-link"><?php echo $i; ?></a>
                                    </li>

                                    <?php
                                } else {
                                    ?>
                                    <li class="pageitem" id="<?php echo $i; ?>"><a href="JavaScript:Void(0);"
                                                                                   class="page-link"
                                                                                   data-id="<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="modal-footer">
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
</div>