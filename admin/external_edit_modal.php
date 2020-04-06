<?php
session_start();
require "../database/connection.php";
?>

<!------------------------------------------Add External Carrier------------------------------------------------------------------------------------>

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
     id="edit_External"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Edit
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
                           aria-selected="true" onclick="toggleAll1('first');">Add External Carrier</a>
                    </li>
                    <li class="nav-item1" id="insurance-title">
                        <a class="nav-link1" id="insurance-tab" data-toggle="tab"
                           href="#insurance" role="tab" aria-controls="profile"
                           aria-selected="false" onclick="toggleAll1('second');">Add Insurance</a>
                    </li>
                    <li class="nav-item1" id="accounting-title">
                        <a class="nav-link1" id="accounting-tab" data-toggle="tab"
                           href="#accounting" role="tab" aria-controls="contact"

                           aria-selected="false" onclick="toggleAll1('third');">Add Accounting</a>
                    </li>
                    <li class="nav-item1" id="equipment-title">
                        <a class="nav-link1" id="equipment-tab" data-toggle="tab"
                           href="#equipment" role="tab" aria-controls="contact"

                           aria-selected="false" onclick="toggleAll1('fourth');">Add Equipment</a>
                    </li>
                </ul>
                <?php
                $collection = $db->carrier;
                $show1 = $collection->aggregate([
                    ['$lookup' => [
                        'from' => 'payment_terms',
                        'localField' => 'companyID',
                        'foreignField' => 'companyID',
                        'as' => 'paymentTerms'
                    ]],
                    ['$lookup' => [
                        'from' => 'factoring_company_add',
                        'localField' => 'companyID',
                        'foreignField' => 'companyID',
                        'as' => 'factoringCompany'
                    ]],
                    ['$match' => ['companyID' => (int)$_SESSION['companyId']]],
                    ['$unwind' => '$carrier'],
                    ['$match' => ['carrier._id' => (int)$_GET['id']]]

                ]);

                foreach ($show1

                as $row) {
                $carrier = array();
                $carrier[] = $row['carrier'];
                $paymentTerms = $row['paymentTerms'];
                $factoringCompany = $row['factoringCompany'];

                foreach ($paymentTerms as $row1) {
                    $payment = $row1['payment'];
                    $paymentTerm = array();
                    foreach ($payment as $row2) {
                        $paymentid = $row2['_id'];
                        $paymentTerm[$paymentid] = $row2['paymentTerm'];
                    }
                }

                foreach ($factoringCompany as $row3) {
                    $factoring = $row3['factoring'];
                    $factoringCompanyname = array();
                    foreach ($factoring as $row4) {
                        $factoringid = $row4['_id'];
                        $factoringCompanyname[$factoringid] = $row4['factoringCompanyname'];
                    }
                }

                foreach ($carrier

                as $row4) {
                $carrierid = $row4['_id'];
                $name = $row4['name'];
                $address = $row4['address'];
                $location = $row4['location'];
                $zip = $row4['zip'];
                $contactName = $row4['contactName'];
                $email = $row4['email'];
                $telephone = $row4['telephone'];
                $ext = $row4['ext'];
                $tollfree = $row4['tollfree'];
                $fax = $row4['fax'];
                $paymentTerms = $row4['paymentTerms']."&nbsp;".@$paymentTerm[$row4['paymentTerms']];
                $taxID = $row4['taxID'];
                $mc = $row4['mc'];
                $dot = $row4['dot'];
                $factoringCompany = $row4['factoringCompany']."&nbsp;".@$factoringCompanyname[$row4['factoringCompany']];
                $carrierNotes = $row4['carrierNotes'];
                $blacklisted = $row4['blacklisted'];
                $corporation = $row4['corporation'];
                $insuranceLiabilityCompany = $row4['insuranceLiabilityCompany'];
                $insurancePolicyNo = $row4['insurancePolicyNo'];
                $expiryDate = $row4['expiryDate'];
                $insuranceTelephone = $row4['insuranceTelephone'];
                $insuranceExt = $row4['insuranceExt'];
                $insuranceContactName = $row4['insuranceContactName'];
                $insuranceLiabilityAmount = $row4['insuranceLiabilityAmount'];
                $insuranceNotes = $row4['insuranceNotes'];
                $autoInsuranceCompany = $row4['autoInsuranceCompany'];
                $autoInsPolicyNo = $row4['autoInsPolicyNo'];
                $autoInsExpiryDate = $row4['autoInsExpiryDate'];
                $autoInsTelephone = $row4['autoInsTelephone'];
                $autoInsExt = $row4['autoInsExt'];
                $autoInsContactName = $row4['autoInsContactName'];
                $autoInsLiabilityAmount = $row4['autoInsLiabilityAmount'];
                $autoInsuranceNotes = $row4['autoInsuranceNotes'];
                $cargoCompany = $row4['cargoCompany'];
                $cargoPolicyNo = $row4['cargoPolicyNo'];
                $cargoExpiryDate = $row4['cargoExpiryDate'];
                $cargoTelephone = $row4['cargoTelephone'];
                $cargoExt = $row4['cargoExt'];
                $cargoContactName = $row4['cargoContactName'];
                $cargoInsuranceAmt = $row4['cargoInsuranceAmt'];
                $WSIBNo = $row4['WSIBNo'];
                $cargoNotes = $row4['cargoNotes'];
                $primaryName = $row4['primaryName'];
                $primaryTelephone = $row4['primaryTelephone'];
                $primaryEmail = $row4['primaryEmail'];
                $secondaryName = $row4['secondaryName'];
                $secondaryTelephone = $row4['secondaryTelephone'];
                $secondaryEmail = $row4['secondaryEmail'];
                $accountingNotes = $row4['accountingNotes'];
                $sizeOfFleet = $row4['sizeOfFleet'];
                $equipmentNotes = $row4['equipmentNotes'];
                $equipment = $row4['equipment'];

                ?>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="carrier"
                         role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Name <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Name" value="<?php echo $name; ?>"
                                           id="carrierNameEdit" name="carrierName"
                                           type="text">
                                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                                    <input type="hidden" id="carrierid" value="<?php echo $$carrierid; ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Address <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Address *" value="<?php echo $address; ?>"
                                           id="carrierAddressEdit"
                                           name="carrierAddress"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Location <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Enter a location"
                                           onkeyup="getLocation('carrierLocation')" type="text"
                                           value="<?php echo $location; ?>" id="carrierLocationEdit"
                                           name="carrierLocation">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Zip <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Zip Code"
                                           type="text" value="<?php echo $zip; ?>" id="carrierZipEdit"
                                           name="carrierZip">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Contact Name</label>
                                <div>
                                    <input class="form-control" placeholder="Contact Name"
                                           type="text" value="<?php echo $contactName; ?>" id="carrierContactNameEdit"
                                           name="carrierContactName">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Email <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" type="email"
                                           value="<?php echo $email; ?>" id="carrierEmailEdit" placeholder="Email"
                                           name="carrierEmail">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Telephone <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" type="text" value="<?php echo $telephone; ?>"
                                           id="carrierTelephoneEdit"
                                           name="carrierTelephone" placeholder="Telephone"
                                    >
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <label>Ext</label>
                                <div>
                                    <input class="form-control" placeholder="Ext"
                                           type="text" value="<?php echo $ext; ?>" id="carrierExtEdit"
                                           name="carrierExt">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Toll Free</label>
                                <div>
                                    <input class="form-control" placeholder="Toll Free"
                                           type="text" value="<?php echo $tollfree; ?>" id="carrierTollFreeEdit"
                                           name="carrierTollFree">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Fax</label>
                                <div>
                                    <input class="form-control" placeholder="Fax"
                                           type="text" value="<?php echo $fax; ?>" id="carrierFaxEdit"
                                           name="carrierFax">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Payment Terms</label> <i class="mdi mdi-plus-circle plus"
                                                                title="Add Payment Terms" id="Add_Payment_Terms"></i>
                                <input list="browsers" class="form-control" value="<?php echo $paymentTerms; ?>"
                                       id="carrierPayTermsEdit" name="carrierPayTerms">
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
                                           type="text" value="<?php echo $taxID; ?>" id="carrierTaxIDEdit"
                                           name="carrierTaxID">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>M.C. #: <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="M.C. #: *"
                                           type="text" value="<?php echo $mc; ?>" id="carrierMCEdit" name="carrierMC">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>D.O.T. <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="D.O.T. *"
                                           type="text" value="<?php echo $dot; ?>" id="carrierDOTEdit"
                                           name="carrierDOT">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Factoring Company</label> <i class="mdi mdi-plus-circle plus"
                                                                    title="Add Factoring Company" id="AddFactoring"></i>
                                <input list="browsers1" class="form-control" value="<?php echo $factoringCompany; ?>"
                                       id="carrierFactoringEdit"
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
                                                                          type="textarea"
                                                                          value="<?php echo $carrierNotes; ?>"
                                                                          id="carrierNotesEdit"
                                                                          name="carrierNotes"
                                                                ></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Blacklisted</label>
                                <div class="custom-control custom-checkbox">
                                    <?php if ($blacklisted == "on") { ?>
                                        <input type="checkbox" checked class="custom-control-input"
                                               id="carrierBlacklistedEdit" name="carrierBlacklisted"
                                               data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                    <?php } else { ?>
                                        <input type="checkbox" class="custom-control-input" id="carrierBlacklistedEdit"
                                               name="carrierBlacklisted"
                                               data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                    <?php } ?>
                                    <label class="custom-control-label" for="carrierBlacklistedEdit">This
                                        Carrier is Blacklisted</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Corporation</label>
                                <div class="custom-control custom-checkbox">
                                    <?php if ($corporation == "on") { ?>
                                        <input type="checkbox" checked class="custom-control-input"
                                               id="carrierCorporationEdit" name="carrierCorporation"
                                               data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                    <?php } else { ?>
                                        <input type="checkbox" class="custom-control-input" id="carrierCorporationEdit"
                                               name="carrierCorporation"
                                               data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                    <?php } ?>
                                    <label class="custom-control-label" for="carrierCorporationEdit">This
                                        carrier is a corporation</label>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button onclick="toggleCarrier1('first')" class="btn btn-success float-right">Next
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
                                                       type="text" value="<?php echo $insuranceLiabilityCompany; ?>"
                                                       id="liabilityCompanyEdit" name="liabilityCompany">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Policy #</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Policy #"
                                                       type="text" value="<?php echo $insurancePolicyNo; ?>"
                                                       id="liabilityPolicyEdit" name="liabilityPolicy">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Exp. Date</label>
                                            <div>
                                                <input class="form-control"
                                                       type="date" value="<?php echo $expiryDate; ?>"
                                                       id="liabilityExpDateEdit" name="liabilityExpDate">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Telephone *</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Telephone *" type="text"
                                                       value="<?php echo $insuranceTelephone; ?>"
                                                       id="liabilityTelephoneEdit"
                                                       name="liabilityTelephone">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Ext</label>
                                            <div>
                                                <input class="form-control" placeholder="Ext"
                                                       type="text" value="<?php echo $insuranceExt; ?>"
                                                       id="liabilityEXTEdit" name="liabilityEXT">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Contact Name</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Contact Name"
                                                       type="text" value="<?php echo $insuranceContactName; ?>"
                                                       id="liabilityContactEdit" name="liabilityContact">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Liability ($)</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Liability ($)"
                                                       type="text" value="<?php echo $insuranceLiabilityAmount; ?>"
                                                       id="liabilityAmountEdit" name="liabilityAmount">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Internal Notes</label>
                                            <div>
                                                <textarea rows="1" cols="30"
                                                          class="form-control" type="textarea"
                                                          value="<?php echo $insuranceNotes; ?>" id="liabilityNotesEdit"
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
                                                   data-parsley-mincheck="2" onclick="setMobileInsurer1(this.value)">
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
                                                       type="text" value="<?php echo $autoInsuranceCompany; ?>"
                                                       id="insuranceCompanyEdit" name="insuranceCompany">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Policy #</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Policy #"
                                                       type="text" value="<?php echo $autoInsPolicyNo; ?>"
                                                       id="insurancePolicyEdit" name="insurancePolicy">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Exp. Date</label>
                                            <div>
                                                <input class="form-control"
                                                       type="date" value="<?php echo $autoInsExpiryDate; ?>"
                                                       id="insuranceExpDateEdit" name="insuranceExpDate">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Telephone *</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Telephone *" type="text"
                                                       value="<?php echo $autoInsTelephone; ?>"
                                                       id="insuranceTelephoneEdit"
                                                       name="insuranceTelephone"
                                                >
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Ext</label>
                                            <div>
                                                <input class="form-control" placeholder="Ext"
                                                       type="text" value="<?php echo $autoInsExt; ?>"
                                                       id="insuranceExtEdit" name="insuranceExt">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Contact Name</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Contact Name"
                                                       type="text" value="<?php echo $autoInsContactName; ?>"
                                                       id="insuranceContactNameEdit"
                                                       name="insuranceContactName">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Liability ($)</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Liability ($)"
                                                       type="text" value="<?php echo $autoInsLiabilityAmount; ?>"
                                                       id="insuranceAmtEdit" name="insuranceAmt">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Internal Notes</label>
                                            <div>
                                                                        <textarea rows="1" cols="30"
                                                                                  class="form-control" type="textarea"
                                                                                  value="<?php echo $autoInsuranceNotes; ?>"
                                                                                  id="insuranceNotesEdit"
                                                                                  name="insuranceNotes">
																		</textarea>
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
                                                   data-parsley-mincheck="2" onclick="setCargoInsurer1()">
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
                                                       type="text" value="<?php echo $cargoCompany; ?>"
                                                       id="cargoNameEdit" name="cargoName">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Policy #</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Policy #"
                                                       type="text" value="<?php echo $cargoPolicyNo; ?>"
                                                       id="cargoPolicyEdit" name="cargoPolicy">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Exp. Date</label>
                                            <div>
                                                <input class="form-control"
                                                       type="date" value="<?php echo $cargoExpiryDate; ?>"
                                                       id="cargoExpDateEdit" name="cargoExpDate">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Telephone *</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Telephone *" type="text"
                                                       value="<?php echo $cargoTelephone; ?>" id="cargoTelephoneEdit"
                                                       name="cargoTelephone">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label>Ext</label>
                                            <div>
                                                <input class="form-control" placeholder="Ext"
                                                       type="text" value="<?php echo $cargoExt; ?>" id="cargoExtEdit"
                                                       name="cargoExt">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Contact Name</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Contact Name"
                                                       type="text" value="<?php echo $cargoContactName; ?>"
                                                       id="cargoContactNameEdit" name="cargoContactName">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Cargo Insurance ($)</label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="Cargo Insurance ($)"
                                                       type="text" value="<?php echo $cargoInsuranceAmt; ?>"
                                                       id="cargoInsuranceAmountEdit"
                                                       name="cargoInsuranceAmount">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Internal Notes</label>
                                            <div>
                                                                <textarea rows="1" cols="30" class="form-control"
                                                                          type="textarea"
                                                                          value="<?php echo $cargoNotes; ?>"
                                                                          id="cargoNotesEdit"
                                                                          name="cargoNotes"
                                                                ></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>WSIB # </label>
                                            <div>
                                                <input class="form-control"
                                                       placeholder="WSIB # "
                                                       type="text" value="<?php echo $WSIBNo; ?>" id="wsibEdit"
                                                       name="wsib">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <button onclick="toggleCarrier1('second')" style="margin-right: 3px"
                                class="btn btn-success float-right">Next
                        </button>
                        <button onclick="togglePrev1('second')" style="margin-right: 3px"
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
                                           type="text" value="<?php echo $primaryName; ?>" id="primaryNameEdit"
                                           name="primaryName">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Primary Telephone</label>
                                <div>
                                    <input class="form-control" placeholder="Primary Telephone"
                                           type="text" value="<?php echo $primaryTelephone; ?>"
                                           id="primaryTelephoneEdit" name="primaryTelephone">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>
                                    Primary Email</label>
                                <div>
                                    <input class="form-control" type="email"
                                           value="bootstrap@example.com" value="<?php echo $primaryEmail; ?>"
                                           id="primaryEmailEdit" name="primaryEmail">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Secondary Name </label>
                                <div>
                                    <input class="form-control" placeholder="Secondary Name "
                                           type="text" value="<?php echo $secondaryName; ?>" id="secondaryNameEdit"
                                           name="secondaryName">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>Secondary Telephone</label>
                                <div>
                                    <input class="form-control"
                                           placeholder="Secondary  Telephone"
                                           type="text" value="<?php echo $secondaryTelephone; ?>"
                                           id="secondaryTelephoneEdit" name="secondaryTelephone">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label>
                                    Secondary Email</label>
                                <div>
                                    <input class="form-control" type="email"
                                           value="bootstrap@example.com"
                                           value="<?php echo $secondaryEmail; ?>" id="secondaryEmailEdit"
                                           name="secondaryEmail">
                                </div>

                            </div>
                            <div class="form-group col-md-12">
                                <label>Add Notes</label>
                                <div>
                                                                <textarea rows="3" cols="30" class="form-control"
                                                                          type="textarea"
                                                                          value="<?php echo $accountingNotes; ?>"
                                                                          id="primaryNotesEdit"
                                                                          name="primaryNotes"
                                                                ></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button onclick="toggleCarrier1('third')" style="margin-right: 3px"
                                class="btn btn-success float-right">Next
                        </button>
                        <button onclick="togglePrev1('third')" style="margin-right: 3px"
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
                                           placeholder="Size Of Fleet :" value="<?php echo $sizeOfFleet; ?>"
                                           id="sizeOfFleetEdit" name="sizeOfFleet">
                                </div>
                            </div>
                        </center>
                        <?php
                        foreach ($equipment as $row5) {
                            $equipmenttype = $row5['equipment'];
                            $amount = $row5['amount'];
                            ?>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Quantity</label>
                                    <div>
                                        <input class="form-control"
                                               type="text" value="<?php echo $amount; ?>" name="quantity">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Equipment Type</label>
                                    <div>
                                        <input class="form-control"
                                               type="text" name="equipment"
                                               value="<?php echo $equipmenttype; ?>">
                                    </div>
                                </div>
                            </div>
                        <?php }
                        }
                        } ?>
                        <hr>
                        <button onclick="toggleCarrier1('fourth')" style="margin-right: 3px"
                                class="float-right btn btn-secondary">
                            Previous
                        </button>
                        <button onclick="editExternalCarrierID()" style="margin-right: 3px"
                                class="float-right btn btn-primary">
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