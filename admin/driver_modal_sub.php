<?php
session_start();
require "../database/connection.php";
?>

<!--------------------------------------------Add Driver--------------------------------------------------------------------------------------->

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_Driver"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Driver</h5>
                <button type="button" class="close modalDriver"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
            
                <div class="owner-container" style="z-index: 1600"></div>
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
                                   type="password" id="driverPassword">
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
                            <input class="form-control" onclick="getLocation(this.id)" id="driverLocation" placeholder="Location *" type="text">
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
                            <input class="form-control" id="driverLicenseIssue" placeholder="License Issue State *" type="text">
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
                    <div class="form-group col-md-2">
                        <label>Rate</label>
                        <select class="form-control">
                            <option value="0" selected disabled>Select</option>
                            <option value="mile">Per Mile</option>
                            <option value="">Percentage</option>
                            <option value="">Hourly</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2 ">
                                            <label>Currency</label><i class="mdi mdi-plus-circle plus" id="add_driver_currency_modal"></i>
                                                <input list="driverCurrency" class="form-control" placeholder="--Select--" id="driverCurrencyList" name="driverCurrencyList">
                                                <datalist id="driverCurrency">
                                                <?php
                                                $show_currency = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
                                                $no = 1;
                                                foreach ($show_currency as $showcurrency) {
                                                    $currency = $showcurrency['currency'];
                                                    foreach ($currency as $scur) {
                                                        $currencyValue = "'".$scur['_id'].")&nbsp;".$scur['currencyType']."'";
                                                        echo "<option value=$currencyValue></option>";
                                                         } }?>
                                            </datalist>
                                        </div>
                    <div class="form-group col-md-2 ">
                        <label>Driver Pay Info</label>
                        <div>
                            <button  id="driverpaybutton" class="btn btn-outline-dark waves-effect waves-light">Open Pay Info</button> 
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Recurrence +</label>
                        <div>
                            <button  id="recurrenceplus" class="btn btn-outline-dark waves-effect waves-light">Open recurrence +</button> 
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Recurrence -</label>
                        <div>
                            <button  id="recurrenceminus" class="btn btn-outline-dark waves-effect waves-light">Open recurrence -</button> 
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Termination Date</label>
                        <div>
                            <input class="form-control" id="terminationDate" type="date">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Internal Notes</label>
                        <div>
                            <textarea rows="1" cols="30" placeholder="Notes" id="InternalNote" class="form-control"
                                      type="textarea"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect modalDriver" >
                    Close
                </button>
                <button type="submit" onclick="addDriver()" class="btn btn-primary waves-effect waves-light">Add as
                    Driver
                </button>
                <button type="button" onclick="addDriver()" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#" id="AddOwnerOperator">Add as Owner-operator
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->