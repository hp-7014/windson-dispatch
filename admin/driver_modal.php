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
                <div class="modal-body custom-modal-body">
                    <div class="driver-container" style="z-index: 1400"></div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">

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
                                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text"
                                           id="search" placeholder="search" style="margin-left: 5px;">
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
                                                            $limit = 4;
                                                            $total_records = $s->count();
                                                            $total_pages = ceil($total_records / $limit);
                                                            if ($s['deleteStatus'] == '0') {
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $no++; ?></td>
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
                                    </div>
                                </div>
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
<!--------------------------------------------Add Driver--------------------------------------------------------------------------------------->

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_Driver"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV
                        formate
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" name="file" id="file" accept=".csv"/>
                    </div>
                    <input type="submit" name="submit" onclick="importDriver()"
                           class="btn btn-outline-info waves-effect waves-light float-right" value="Upload"/>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Name <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Name *"
                                   type="text" id="driverName">
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Username</label>
                        <div>
                            <input class="form-control" placeholder="Username"
                                   type="text" id="driverUsername">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Password</label>
                        <div>
                            <input class="form-control" placeholder="Password"
                                   type="text" id="driverPassword">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Telephone <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Telephone *" id="driverTelephone" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Alt - Tel #</label>
                        <div>
                            <input class="form-control" placeholder="Alt - Tel #" id="driverAlt" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Email</label>
                        <div>
                            <input class="form-control" placeholder="Email" type="email" id="driverEmail">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Address <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Address *" id="driverAddress" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Location <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" id="driverLocation" placeholder="Location *" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Zip <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" id="driverZip" placeholder="Zip *" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Status</label>
                        <select class="form-control" id="driverStatus">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Not Available">Not Available</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Social Security No</label>
                        <div>
                            <input class="form-control" id="driverSocial" placeholder="Social Security No"
                                   type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Date of Birth</label>
                        <div>
                            <input class="form-control" id="dateOfbirth" type="date">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Date of Hire</label>
                        <div>
                            <input class="form-control" id="dateOfhire" type="date">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>License No. <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="License No. *" id="driverLicenseNo" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>License Issue State <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" id="driverLicenseIssue" placeholder="License Issue State *"
                                   type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>License Exp. Date <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" id="driverLicenseExp" type="date">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Last Medical</label>
                        <div>
                            <input class="form-control" id="driverLastMedical" type="date">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Next Medical</label>
                        <div>
                            <input class="form-control" id="driverNextMedical" type="date">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Last Drug Test</label>
                        <div>
                            <input class="form-control" id="driverLastDrugTest" type="date">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Next Drug Test</label>
                        <div>
                            <input class="form-control" id="driverNestDrugTest" type="date">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Passport Expiry</label>
                        <div>
                            <input class="form-control" id="passportExpiry" type="date">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Fast Card Expiry</label>
                        <div>
                            <input class="form-control" id="fastCardExpiry" type="date">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Hazmat Expiry</label>
                        <div>
                            <input class="form-control" id="hazmatExpiry" type="date">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Mile</label>
                        <div>
                            <input class="form-control" id="driverMile" placeholder="Mile" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Flat</label>
                        <div>
                            <input class="form-control" id="driverFlat" placeholder="Flat" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Stop</label>
                        <div>
                            <input class="form-control" id="driverStop" placeholder="Stop" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Tarp</label>
                        <div>
                            <input class="form-control" id="driverTrap" placeholder="Tarp" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Percentage</label>
                        <div>
                            <input class="form-control" id="driverPercentage" placeholder="Percentage" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Termination Date</label>
                        <div>
                            <input class="form-control" id="terminationDate" type="date">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Internal Notes</label>
                        <div>
                            <textarea rows="3" cols="30" placeholder="Notes" id="InternalNote" class="form-control"
                                      type="textarea"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" onclick="addDriver()" class="btn btn-primary waves-effect waves-light">Add as
                    Driver
                </button>
                <button type="button" class="btn btn-info waves-effect waves-light" data-dismiss="modal"
                        data-toggle="modal"
                        data-target="#Owner_operator">Add as Owner-operator
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!----------------------------------Add as Owner-operator----------------------------------------------------->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="Owner_operator"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add as Owner operator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" name="form_data" id="form_data">
                <div class="modal-body custom-modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Select Driver</label>
                            <select class="form-control" name="driverName" id="driverNames">
                                <option value="">Select Driver</option>
                                <?php

                                $show_data = $db->driver->find(['companyID' => $_SESSION['companyId']]);

                                foreach ($show_data as $show) {
                                    $show = $show['driver'];
                                    foreach ($show as $s) {
                                        if ($s['deleteStatus'] == '0') {
                                            ?>
                                            <option value="<?php echo $s['driverName']; ?>"><?php echo $s['driverName']; ?></option>
                                        <?php }
                                    }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Pay Percentage</label>
                            <input id="percentage" type="text" class="form-control" name="percentage">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Select Truck</label>&nbsp;<i class="mdi mdi-plus-circle plus"
                                                                id="add_Truck_Modal"></i>
                            <select class="form-control" name="truckNo" id="truckNo">
                                <option value="123">123</option>
                                <option value="456">456</option>
                            </select>
                        </div>
                    </div>
                    <div class="container">
                        <div class="table-responsive">
                            <table class=" table-responsive">
                                <thead>
                                <tr>
                                    <td>Category</td>
                                    <td>Installment Type</td>
                                    <td>Amount</td>
                                    <td>Installment</td>
                                    <td>start#</td>
                                    <td>start Date</td>
                                    <td>Internal Note</td>
                                    <td>Delete</td>
                                </tr>
                                </thead>
                                <tbody id="TextBoxContainer">
                                <td width="150">
                                    <input class="form-control" id="installmentCategory" name="installmentCategory"
                                           list="fixpaycat"/>

                                </td>
                                <td width="150">
                                    <select name="installmentType" id="installmentType" class="form-control">
                                        <option value="">Select type</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                        <option value="Quarterly">Quarterly</option>
                                    </select>
                                </td>
                                <td width="100">
                                    <input name="amount" type="text" id="amount" class="form-control"/>
                                </td>
                                <td width="100">
                                    <input name="installment" type="text" id="installment" class="form-control"/>
                                </td>
                                <td width="100">
                                    <input name="startNo" type="text" id="startNo" class="form-control"/>
                                </td>
                                <td width="10">
                                    <input name="startDate" type="date" id="startDate" class="form-control"/>
                                </td>
                                <td width="250">
                                    <textarea rows="1" cols="20" class="form-control" type="textarea"
                                              name="internalNote" id="internalNote"></textarea>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger"><span aria-hidden="true">&times;</span>
                                    </button>
                                </td>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip"
                                                data-original-title="Add more controls"><i
                                                    class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add&nbsp;
                                        </button>
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="button" onclick="addOwnerOperator()" class="btn btn-primary waves-effect waves-light">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--- for driver->owner_operator --->
<script>
    $(function () {
        $("#btnAdd").bind("click", function () {
            var div = $("<tr />");
            div.html(GetDynamicTextBox(""));
            $("#TextBoxContainer").append(div);
        });
        $("body").on("click", ".remove", function () {
            $(this).closest("tr").remove();
        });
    });

    function GetDynamicTextBox(value) {
        return '<td width="150">'
            + '<input id="installmentCategory" class="form-control" name="installmentCategory" list="fixpaycat"/></td>'
            + '<td width="150">'
            + '<select name="installmentType" id="installmentType" class="form-control"><option value=""> Select Type</option><option value="Weekly"> Weekly</option><option value="Monthly"> Monthly</option><option value="Yearly"> Yearly</option><option value="Quartely"> Quartely</option></select></td>'
            + '<td width="100">'
            + '<input name="amount" id="amount" type="text" class="form-control" /></td>'
            + '<td width="100">'
            + '<input name="installment" id="installment" type="text" class="form-control" /></td>'
            + '<td width="100"><input name="startNo" id="startNo" type="text" class="form-control" /></td>'
            + '<td width="10"><input name="startDate" id="startDate" type="date" class="form-control" /></td>'
            + '<td width="250"><textarea rows="1" cols="30" class="form-control" type="textarea" id="internalNote" name="internalNote"></textarea></td>'
            + '<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>'
    }
</script>

<!----------------------------------------------------------------------------------------------------------------------------------------->

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
        display: block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    a.editable-click {
        border-bottom: none;
        color: #000000;
    }

    a.editable-click:hover {
        border-bottom: none;
    }

    .table-scroll::-webkit-scrollbar {
        width: 12px;
        height: 8px;
    }

