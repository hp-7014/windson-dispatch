<?php
session_start();
require "../database/connection.php";
?>
<div class="col-sm-6 col-md-3 m-t-30">
    <div class="text-center">
        <p class="text-muted">Admin</p>
        <!-- Large modal -->
        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                data-target="#Driver">Driver
        </button>
    </div>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="modal"
                                                data-target="#add_Driver">ADD
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
                                            <th>Telephone </th>
                                            <th>Alt - Tel #</th>
                                            <th>Email</th>
                                            <th>Address </th>
                                            <th>Location </th>
                                            <th>Zip </th>
                                            <th>Status</th>
                                            <th>Social Security No</th>
                                            <th>Date of Birth</th>
                                            <th>Date of Hire</th>
                                            <th>License No</th>
                                            <th>License Issue State</th>
                                            <th>License Exp. Date </th>
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
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverName',<?php echo $s['_id']; ?>)"><?php echo $s['driverName']; ?></td>
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
                                                            onblur="updateDriver(this,'driverZip',<?php echo $s['_id']; ?>)"><?php echo $s['driverZip']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverStatus',<?php echo $s['_id']; ?>)"><?php echo $s['driverStatus']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverSocial',<?php echo $s['_id']; ?>)"><?php echo $s['driverSocial']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'dateOfbirth',<?php echo $s['_id']; ?>)"><?php echo $s['dateOfbirth']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'dateOfhire',<?php echo $s['_id']; ?>)"><?php echo $s['dateOfhire']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverLicenseNo',<?php echo $s['_id']; ?>)"><?php echo $s['driverLicenseNo']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverLicenseIssue',<?php echo $s['_id']; ?>)"><?php echo $s['driverLicenseIssue']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverLicenseExp',<?php echo $s['_id']; ?>)"><?php echo $s['driverLicenseExp']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverLastMedical',<?php echo $s['_id']; ?>)"><?php echo $s['driverLastMedical']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverNextMedical',<?php echo $s['_id']; ?>)"><?php echo $s['driverNextMedical']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverLastDrugTest',<?php echo $s['_id']; ?>)"><?php echo $s['driverLastDrugTest']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverNextDrugTest',<?php echo $s['_id']; ?>)"><?php echo $s['driverNextDrugTest']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'passportExpiry',<?php echo $s['_id']; ?>)"><?php echo $s['passportExpiry']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'fastCardExpiry',<?php echo $s['_id']; ?>)"><?php echo $s['fastCardExpiry']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'hazmatExpiry',<?php echo $s['_id']; ?>)"><?php echo $s['hazmatExpiry']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverMile',<?php echo $s['_id']; ?>)"><?php echo $s['driverMile']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverFlat',<?php echo $s['_id']; ?>)"><?php echo $s['driverFlat']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverStop',<?php echo $s['_id']; ?>)"><?php echo $s['driverStop']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverTrap',<?php echo $s['_id']; ?>)"><?php echo $s['driverTrap']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'InternalNote',<?php echo $s['_id']; ?>)"><?php echo $s['InternalNote']; ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateDriver(this,'driverPercentage',<?php echo $s['_id']; ?>)"><?php echo $s['driverPercentage']; ?></td>
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
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="export_Driver()" class="btn btn-primary waves-effect" data-dismiss="modal">
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
            <form method="post" name="form_data" id="form_data" >
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
                            }?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Pay Percentage</label>
                        <input id="percentage" type="text" class="form-control" name="percentage">
                    </div>

                    <div class="form-group col-md-4">
                        <label>Select Truck</label>
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
                                <input class="form-control" id="installmentCategory" name="installmentCategory" list="fixpaycat"/>

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
                                <textarea rows="1" cols="20" class="form-control" type="textarea" name="internalNote" id="internalNote"></textarea>
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

<datalist id="fixpaycat">
    <?php

    $show_data = $db->fixpay_add->find(['companyID' => $_SESSION['companyId']]);

    foreach ($show_data as $show) {
        $show = $show['fixPay'];
        foreach ($show as $s) {
            ?>
            <option value="<?php echo $s['fixPayType']; ?>"><?php echo $s['fixPayType']; ?></option>
        <?php }
    }?>
</datalist>
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
            +'<input id="installmentCategory" class="form-control" name="installmentCategory" list="fixpaycat"/></td>'
            +'<td width="150">'
            +'<select name="installmentType" id="installmentType" class="form-control"><option value=""> Select Type</option><option value="Weekly"> Weekly</option><option value="Monthly"> Monthly</option><option value="Yearly"> Yearly</option><option value="Quartely"> Quartely</option></select></td>'
            +'<td width="100">'
            +'<input name="amount" id="amount" type="text" class="form-control" /></td>'
            +'<td width="100">'
            +'<input name="installment" id="installment" type="text" class="form-control" /></td>'
            +'<td width="100"><input name="startNo" id="startNo" type="text" class="form-control" /></td>'
            +'<td width="10"><input name="startDate" id="startDate" type="date" class="form-control" /></td>'
            +'<td width="250"><textarea rows="1" cols="30" class="form-control" type="textarea" id="internalNote" name="internalNote"></textarea></td>'
            +'<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>'
    }
</script>

<!----------------------------------------------------------------------------------------------------------------------------------------->