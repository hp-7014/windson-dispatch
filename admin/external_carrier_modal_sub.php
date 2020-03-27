<?php
session_start();
require "../database/connection.php";
?>

<!------------------------------------------Add External Carrier------------------------------------------------------------------------------------>

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
     id="add_External"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    External Carrier</h5>
                <button type="button" class="close modalCarrier" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="payment-container" style="z-index: 1600"></div>
                <div class="factoring-container" style="z-index: 1600"></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item1 show" id="home-title">
                        <a class="nav-link1 active" id="home-tab" data-toggle="tab"
                           href="#carrier" role="tab" aria-controls="home"
                           aria-selected="true" onclick="toggleAll('first');">Add External Carrier</a>
                    </li>
                    <li class="nav-item1" id="insurance-title">
                        <a class="nav-link1" id="insurance-tab" data-toggle="tab"
                           href="#insurance" role="tab" aria-controls="profile"
                           aria-selected="false" onclick="toggleAll('second');">Add Insurance</a>
                    </li>
                    <li class="nav-item1" id="accounting-title">
                        <a class="nav-link1" id="accounting-tab" data-toggle="tab"
                           href="#accounting" role="tab" aria-controls="contact"

                           aria-selected="false" onclick="toggleAll('third');">Add Accounting</a>
                    </li>
                    <li class="nav-item1" id="equipment-title">
                        <a class="nav-link1" id="equipment-tab" data-toggle="tab"
                           href="#equipment" role="tab" aria-controls="contact"

                           aria-selected="false" onclick="toggleAll('fourth');">Add Equipment</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="carrier"
                         role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Name <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Name" id="carrierName" name="carrierName"
                                           type="text">
                                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Address <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Address *" id="carrierAddress"
                                           name="carrierAddress"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Location <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Enter a location"
                                           onkeydown="getLocation('carrierLocation')" type="text" id="carrierLocation"
                                           name="carrierLocation">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Zip <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Zip Code"
                                           type="text" id="carrierZip" name="carrierZip">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Contact Name</label>
                                <div>
                                    <input class="form-control" placeholder="Contact Name"
                                           type="text" id="carrierContactName" name="carrierContactName">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Email <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" type="email"
                                           value="" id="carrierEmail" placeholder="Email" name="carrierEmail">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Telephone <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" type="text" id="carrierTelephone"
                                           name="carrierTelephone" placeholder="Telephone"
                                    >
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <label>Ext</label>
                                <div>
                                    <input class="form-control" placeholder="Ext"
                                           type="text" id="carrierExt" name="carrierExt">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Toll Free</label>
                                <div>
                                    <input class="form-control" placeholder="Toll Free"
                                           type="text" id="carrierTollFree" name="carrierTollFree">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Fax</label>
                                <div>
                                    <input class="form-control" placeholder="Fax"
                                           type="text" id="carrierFax" name="carrierFax">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Payment Terms</label> <i class="mdi mdi-plus-circle plus"
                                                                title="Add Payment Terms" id="Add_Payment_Terms"></i>

                                <input list="browsers" class="form-control" id="carrierPayTerms" name="carrierPayTerms">
                                <datalist id="browsers">
                                <?php
                                    $payment = $db->payment_terms->find(['companyID' => $_SESSION['companyId']]);
                                    foreach ($payment as $pay) {
                                        $show = $pay['payment'];
                                        foreach ($show as $s) {
                                            $equipValue = "'" . $s['_id'] . ")&nbsp;" . $s['paymentTerm'] . "'";
                                            echo " <option value=$equipValue></option>";
                                     }
                                    } ?>
                                </datalist>


                            </div>
                            <div class="form-group col-md-2">
                                <label>Tax ID <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Tax ID *"
                                           type="text" id="carrierTaxID" name="carrierTaxID">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>M.C. #: <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="M.C. #: *"
                                           type="text" id="carrierMC" name="carrierMC">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>D.O.T. <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="D.O.T. *"
                                           type="text" id="carrierDOT" name="carrierDOT">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Factoring Company</label> <i class="mdi mdi-plus-circle plus"
                                                                    title="Add Factoring Company" id="AddFactoring"></i>

                                <input list="browsers1" class="form-control" id="carrierFactoring"
                                       name="carrierFactoring">
                                <datalist id="browsers1">
                                <?php
                                    $payment = $db->factoring_company_add->find(['companyID' => $_SESSION['companyId']]);
                                    foreach ($payment as $pay) {
                                        $show = $pay['factoring'];
                                        foreach ($show as $s) {
                                            $equipValue = "'" . $s['_id'] . ")&nbsp;" . $s['factoringCompanyname'] . "'";
                                            echo " <option value=$equipValue></option>"
                                            ?>
                                        <?php }
                                    } ?>
                                </datalist>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Internal Notes</label>
                                <div>
                                                                <textarea rows="1" cols="30" class="form-control"
                                                                          type="textarea" id="carrierNotes"
                                                                          name="carrierNotes"
                                                                ></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Blacklisted</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           id="carrierBlacklisted" name="carrierBlacklisted"
                                           data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="carrierBlacklisted">This
                                        Carrier is Blacklisted</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Corporation</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           id="carrierCorporation" name="carrierCorporation"
                                           data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="carrierCorporation">This
                                        carrier is a corporation</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button onclick="toggleCarrier('first')" class="btn btn-success float-right">Next
                        </button>
                    </div>
                    <div class="tab-pane fade" id="insurance" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <br>
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-header">
                                    General liabity Insurer
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Liablity Company</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Liablity Company"
                                                       type="text" id="liabilityCompany" name="liabilityCompany">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Policy #</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Policy #"
                                                       type="text" id="liabilityPolicy" name="liabilityPolicy">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Exp. Date</label>
                                            <div>
                                                <input class="form-control"
                                                       type="date" id="liabilityExpDate" name="liabilityExpDate">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Telephone *</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Telephone *" type="text" id="liabilityTelephone"
                                                       name="liabilityTelephone">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Ext</label>
                                            <div>
                                                <input class="form-control" placeholder="Ext"
                                                       type="text" id="liabilityEXT" name="liabilityEXT">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Contact Name</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Contact Name"
                                                       type="text" id="liabilityContact" name="liabilityContact">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Liability ($)</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Liability ($)"
                                                       type="text" id="liabilityAmount" name="liabilityAmount">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Internal Notes</label>
                                            <div>
                                                <textarea rows="1" cols="30"
                                                          class="form-control" type="textarea" id="liabilityNotes"
                                                          name="liabilityNotes"
                                                ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-header">
                                    Auto Mobile Insurer
                                    <div class="form-group col-md-3">
                                        <label></label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="customCheck9"
                                                   data-parsley-multiple="groups"
                                                   data-parsley-mincheck="2" onclick="setMobileInsurer(this.value)">
                                            <label class="custom-control-label"
                                                   for="customCheck9">Same
                                                as Liability Company</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Auto Insurance Company</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Auto Insurance Company"
                                                       type="text" id="insuranceCompany" name="insuranceCompany">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Policy #</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Policy #"
                                                       type="text" id="insurancePolicy" name="insurancePolicy">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Exp. Date</label>
                                            <div>
                                                <input class="form-control"
                                                       type="date" id="insuranceExpDate" name="insuranceExpDate">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Telephone *</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Telephone *" type="text" id="insuranceTelephone"
                                                       name="insuranceTelephone"
                                                >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Ext</label>
                                            <div>
                                                <input class="form-control" placeholder="Ext"
                                                       type="text" id="insuranceExt" name="insuranceExt">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Contact Name</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Contact Name"
                                                       type="text" id="insuranceContactName"
                                                       name="insuranceContactName">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Liability ($)</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Liability ($)"
                                                       type="text" id="insuranceAmt" name="insuranceAmt">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Internal Notes</label>
                                            <div>
                                                                        <textarea rows="1" cols="30"
                                                                                  class="form-control" type="textarea"
                                                                                  id="insuranceNotes"
                                                                                  name="insuranceNotes"
                                                                        ></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="card m-b-30">
                                <div class="card-header">
                                    Cargo Insurer
                                    <div class="form-group col-md-3">
                                        <label></label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="customCheck10"
                                                   data-parsley-multiple="groups"
                                                   data-parsley-mincheck="2" onclick="setCargoInsurer()">
                                            <label class="custom-control-label"
                                                   for="customCheck10">Same
                                                as Liability Company</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Cargo Company</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Cargo Company"
                                                       type="text" id="cargoName" name="cargoName">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Policy #</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Policy #"
                                                       type="text" id="cargoPolicy" name="cargoPolicy">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Exp. Date</label>
                                            <div>
                                                <input class="form-control"
                                                       type="date" id="cargoExpDate" name="cargoExpDate">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Telephone *</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Telephone *" type="text" id="cargoTelephone"
                                                       name="cargoTelephone">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Ext</label>
                                            <div>
                                                <input class="form-control" placeholder="Ext"
                                                       type="text" id="cargoExt" name="cargoExt">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Contact Name</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Contact Name"
                                                       type="text" id="cargoContactName" name="cargoContactName">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Cargo Insurance ($)</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Cargo Insurance ($)"
                                                       type="text" id="cargoInsuranceAmount"
                                                       name="cargoInsuranceAmount">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Internal Notes</label>
                                            <div>
                                                                <textarea rows="1" cols="30" class="form-control"
                                                                          type="textarea" id="cargoNotes"
                                                                          name="cargoNotes"
                                                                ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>WSIB # </label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="WSIB # "
                                                       type="text" id="wsib" name="wsib">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <button onclick="toggleCarrier('second')" style="margin-right: 3px"
                                class="btn btn-success float-right">Next
                        </button>
                        <button onclick="togglePrev('second')" style="margin-right: 3px"
                                class="float-right btn btn-secondary">
                            Previous
                        </button>
                    </div>
                    <div class="tab-pane fade" id="accounting" role="tabpanel"
                         aria-labelledby="contact-tab">
                        <br>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label>Primary Name</label>
                                <div>
                                    <input class="form-control" placeholder="Primary Name"
                                           type="text" id="primaryName" name="primaryName">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Primary Telephone</label>
                                <div>
                                    <input class="form-control" placeholder="Primary Telephone"
                                           type="text" id="primaryTelephone" name="primaryTelephone">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>
                                    Primary Email</label>
                                <div>
                                    <input class="form-control" type="email"
                                           value="bootstrap@example.com" id="primaryEmail" name="primaryEmail">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Secondary Name </label>
                                <div>
                                    <input class="form-control" placeholder="Secondary Name "
                                           type="text" id="secondaryName" name="secondaryName">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Secondary Telephone</label>
                                <div>
                                    <input class="form-control"
                                           placeholder="Secondary  Telephone"
                                           type="text" id="secondaryTelephone" name="secondaryTelephone">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>
                                    Secondary Email</label>
                                <div>
                                    <input class="form-control" type="email"
                                           value="bootstrap@example.com"
                                           id="secondaryEmail" name="secondaryEmail">
                                </div>

                            </div>
                            <div class="form-group col-md-12">
                                <label>Add Notes</label>
                                <div>
                                                                <textarea rows="3" cols="30" class="form-control"
                                                                          type="textarea" id="primaryNotes"
                                                                          name="primaryNotes"
                                                                ></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button onclick="toggleCarrier('third')" style="margin-right: 3px"
                                class="btn btn-success float-right">Next
                        </button>
                        <button onclick="togglePrev('third')" style="margin-right: 3px"
                                class="float-right btn btn-secondary">
                            Previous
                        </button>

                    </div>
                    <div class="tab-pane fade" id="equipment" role="tabpanel"
                         aria-labelledby="Equipment-tab">
                        <br>
                        <center>
                            <div class="form-group col-md-6">
                                <label>Size Of Fleet :</label>
                                <div>
                                    <input class="form-control"
                                           type="text"
                                           placeholder="Size Of Fleet :" id="sizeOfFleet" name="sizeOfFleet">
                                </div>
                            </div>
                        </center>
                        <?php
                        $show_data = $db->equipment_add->find(['companyID' => $_SESSION['companyId']]);
                        $no = 1;
                        foreach ($show_data as $show) {
                            $show = $show['equipment'];
                            foreach ($show as $s) {
                                ?>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Quantity</label>
                                        <div>
                                            <input class="form-control"
                                                   type="text" name="quantity">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Equipment Type</label>
                                        <div>
                                            <input class="form-control"
                                                   type="text" name="equipment"
                                                   value="<?php echo $s['equipmentType']; ?>">
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                        <hr>
                        <button onclick="toggleCarrier('fourth')" style="margin-right: 3px"
                                class="float-right btn btn-secondary">
                            Previous
                        </button>
                        <button onclick="addCarrier()" style="margin-right: 3px" class="float-right btn btn-primary">
                            Save
                        </button>
                        <button style="margin-right: 3px" class="float-right btn btn-danger modalCarrier">
                            Close
                        </button>

                    </div>
                </div>

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<style>

</style>
<!-------------------------------------------------------------------------------------------------------------------------------------------->


