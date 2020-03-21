<?php
session_start();
require "../database/connection.php";
?>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="edit_customer"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Edit
                    Customer</h5>
                <button type="button" class="close modalCustomerEdit" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="currency-container" style="z-index: 1600"></div>
                <div class="payment-container" style="z-index: 1600"></div>
                <div class="factoring-container" style="z-index: 1600"></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item1 show" id="home-title">
                        <a class="nav-link1 active" onclick="toggle1()" id="home-tab" data-toggle="tab" href="#"
                           role="tab" aria-controls="home"
                           aria-selected="true">Add Customer
                        </a>
                    </li>
                    <li class="nav-item1" id="profile-title">
                        <a class="nav-link1" onclick="toggle1()" id="profile-tab" data-toggle="tab" href="#"
                           role="tab" aria-controls="profile"
                           aria-selected="false">Add Advance</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                         aria-labelledby="home-tab">
                        <br>
                        <?php
                        $show1 = $db->customer->aggregate([
                            ['$lookup' => [
                                'from' => 'currency_add',
                                'localField' => 'companyID',
                                'foreignField' => 'companyID',
                                'as' => 'currencyType'
                            ]],
                            ['$lookup' => [
                                'from' => 'factoring_company_add',
                                'localField' => 'companyID',
                                'foreignField' => 'companyID',
                                'as' => 'factoringCompany'
                            ]],
                            ['$lookup' => [
                                'from' => 'user',
                                'localField' => 'companyID',
                                'foreignField' => 'companyID',
                                'as' => 'user'
                            ]],
                            ['$lookup' => [
                                'from' => 'payment_terms',
                                'localField' => 'companyID',
                                'foreignField' => 'companyID',
                                'as' => 'paymentTerms'
                            ]],
                            ['$match'=>['companyID'=>(int)$_SESSION['companyId']]],
                            ['$unwind'=>'$customer'],
                            ['$match'=>['customer._id'=>(int)$_GET['id']]]

                        ]);

                        foreach ($show1 as $row) {
                            $customer = array();
                            $customer[] = $row['customer'];
                            $currencyType = $row['currencyType'];
                            $factoringCompany = $row['factoringCompany'];
                            $user = $row['user'];
                            $paymentTerms = $row['paymentTerms'];

                            foreach ($currencyType as $row2) {
                                $currency = $row2['currency'];
                                $currencyType = array();
                                foreach ($currency as $row3) {
                                    $currencyid = $row3['_id'];
                                    $currencyType[$currencyid] = $row3['currencyType'];
                                }
                            }

                            foreach ($factoringCompany as $row4) {
                                $factoring = $row4['factoring'];
                                $factoringCompanyname = array();
                                foreach ($factoring as $row5) {
                                    $factoringid = $row5['_id'];
                                    $factoringCompanyname[$factoringid] = $row5['factoringCompanyname'];
                                }
                            }

                            foreach ($user as $row6) {
                                $user1 = $row6['user'];
                                $userName = array();
                                foreach ($user1 as $row7) {
                                    $userid = $row7['_id'];
                                    $userName[$userid] = $row7['userFirstName']." ".$row7['userLastName'];
                                }
                            }

                            foreach ($paymentTerms as $row8) {
                                $payment = $row8['payment'];
                                $payment_Term = array();
                                foreach ($payment as $row9) {
                                    $paymentid = $row9['_id'];
                                    $payment_Term[$paymentid] = $row9['paymentTerm'];
                                }
                            }

                            foreach ($customer as $row1) {
                                $customerid = $row1['_id'];
                                $custName = $row1['custName'];
                                $custAddress = $row1['custAddress'];
                                $custLocation = $row1['custLocation'];
                                $custZip = $row1['custZip'];
                                $billingAddress = $row1['billingAddress'];
                                $billingLocation = $row1['billingLocation'];
                                $billingZip = $row1['billingZip'];
                                $primaryContact = $row1['primaryContact'];
                                $custTelephone = $row1['custTelephone'];
                                $custExt = $row1['custExt'];
                                $custEmail = $row1['custEmail'];
                                $custFax = $row1['custFax'];
                                $billingContact = $row1['billingContact'];
                                $billingEmail = $row1['billingEmail'];
                                $billingTelephone = $row1['billingTelephone'];
                                $billingExt = $row1['billingExt'];
                                $URS = $row1['URS'];
                                $currencySetting = $currencyType[$row1['currencySetting']];
                                $paymentTerms = $row1['paymentTerms'].")&nbsp;".$payment_Term[$row1['paymentTerms']];
                                $creditLimit = $row1['creditLimit'];
                                $salesRep =  $row1['salesRep'].")&nbsp;".$userName[$row1['salesRep']];
                                $factoringCompany = $row1['factoringCompany'].")&nbsp;".$factoringCompanyname[$row1['factoringCompany']];
                                $federalID = $row1['federalID'];
                                $workerComp = $row1['workerComp'];
                                $websiteURL = $row1['websiteURL'];
                                $internalNotes = $row1['internalNotes'];

                                if (empty($row1['MC'])) {
                                    $mc = '';
                                } else {
                                    $mc = $row1['MC'];
                                }
                                $blacklisted = $row1['blacklisted'];
                                $numberOninvoice = $row1['numberOninvoice'];
                                $customerRate = $row1['customerRate'];
                        ?>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Customer Name <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Company Name *"
                                           type="text" value="<?php echo $custName; ?>" id="custNameEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Address <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Address *"
                                           type="text" value="<?php echo $custAddress; ?>" id="custAddressEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Location <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control"
                                           placeholder="Location *" value="<?php echo $custLocation; ?>" onkeyup="getLocation('custLocation')" type="text"
                                           id="custLocationEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Zip <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Zip Code *"
                                           type="text" value="<?php echo $custZip; ?>" id="custZipEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Billing Address</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           id="customCheck1" name="sameAsMailingAddress"
                                           data-parsley-multiple="groups" onclick="setBillingDetail1(this.value)"
                                           data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="customCheck1">Same
                                        as Mailing Address</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Billing Address</label>
                                <div>
                                    <input class="form-control"
                                           placeholder="Billing Address" value="<?php echo $billingAddress; ?>" type="text"
                                           id="billingAddressEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Location </label>
                                <div>
                                    <input class="form-control"
                                           placeholder="Enter a location" value="<?php echo $billingLocation; ?>" onclick="getLocation('billingLocation')" type="text"
                                           id="billingLocationEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Zip </label>
                                <div>
                                    <input class="form-control" placeholder="Zip Code"
                                           type="text" value="<?php echo $billingZip; ?>" id="billingZipEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Primary Contact</label>
                                <div>
                                    <input class="form-control"
                                           placeholder="Primary Contact" value="<?php echo $primaryContact; ?>" type="text"
                                           id="primaryContactEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Telephone</label>
                                <div>
                                    <input class="form-control" value="<?php echo $custTelephone; ?>" placeholder="Telephone" type="text"
                                           id="custTelephoneEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <label>Ext</label>
                                <div>
                                    <input class="form-control" value="<?php echo $custExt; ?>" placeholder="Ext"
                                           type="text" id="custExtEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Email</label>
                                <div>
                                    <input class="form-control" value="<?php echo $custEmail; ?>" placeholder="Email" type="email"
                                           id="custEmailEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Fax</label>
                                <div>
                                    <input class="form-control" placeholder="Fax"
                                           type="text" value="<?php echo $custFax; ?>" id="custFaxEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Billing Contact</label>
                                <div>
                                    <input class="form-control"
                                           placeholder="Billing Contact" value="<?php echo $billingContact; ?>" type="text"
                                           id="billingContactEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Billing Email</label>
                                <div>
                                    <input value="<?php echo $billingEmail; ?>" class="form-control" type="email"
                                           placeholder="Billing Email" id="billingEmailEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-2 ">
                                <label>Billing Telephone</label>
                                <div>
                                    <input class="form-control" value="<?php echo $billingTelephone; ?>" placeholder="Billing Telephone" type="text"
                                           id="billingTelephoneEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <label>Ext</label>
                                <div>
                                    <input class="form-control" placeholder="Ext"
                                           type="text" value="<?php echo $billingExt; ?>" id="billingExtEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <label>URS</label>
                                <div>
                                    <input class="form-control" placeholder="URS"
                                           type="text" value="<?php echo $URS; ?>" id="URSEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-1" id="mcShow" style="display: none">
                                <label>M.C.</label>
                                <div>
                                    <input class="form-control" placeholder="M.C."
                                           type="text" value="<?php echo $mc; ?>" id="MCEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Blacklisted</label>
                                <div class="custom-control custom-checkbox">
                                    <?php if ($blacklisted == "on") {?>
                                    <input type="checkbox" class="custom-control-input"
                                           id="customCheck2" checked name="blacklisted" data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <?php } else { ?>
                                        <input type="checkbox" class="custom-control-input"
                                               id="customCheck2" name="blacklisted" data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                    <?php } ?>
                                    <label class="custom-control-label" for="customCheck2">This
                                        Customer is Blacklisted</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Is Broker </label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           id="customCheck3" onclick="showFields()" name="isBroker" value="1"
                                           data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="customCheck3">This
                                        is a Broker</label>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Duplicate</label>
                                <div class="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="customCheck7"
                                               name="AsShipper"
                                               data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                        <label class="custom-control-label"
                                               for="customCheck7">As a Shipper</label>
                                    </div>&nbsp;&nbsp;
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="customCheck8" name="AsConsignee"
                                               data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                        <label class="custom-control-label"
                                               for="customCheck8">As a Consignee</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <label class="text-danger" style="padding-right: 70%"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                        <button onclick="toggle1()" class="btn btn-success float-right">Next
                        </button>

                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <br>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Currency Setting</label>&nbsp;<i title="Add Currency"
                                                                        class="mdi mdi-plus-circle plus"
                                                                        id="AddCurrency"></i>

                                <select class="form-control" value="<?php echo $currencySetting; ?>" id="currencySetting">
                                    <option>---select---</option>
                                    <?php
                                    $currency = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
                                    foreach ($currency as $cur) {
                                        $show = $cur['currency'];
                                        foreach ($show as $s) {
                                            ?>
                                            <option value="<?php echo $s['_id'] ?>"><?php echo $s['_id']; ?>
                                                )&nbsp;<?php echo $s['currencyType'] ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Payment Terms</label>&nbsp;<i class="mdi mdi-plus-circle plus"
                                                                     title="Add Payment Terms"
                                                                     id="Add_Payment_Terms"></i>
                                <input id="paymentTerms" class="form-control" value="<?php echo $paymentTerms; ?>" placeholder="--select--"
                                       list="paymentlist"/>
                                <datalist id="paymentlist">
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
                            <div class="form-group col-md-3">
                                <label>Credit Limit $</label>
                                <div>
                                    <input class="form-control" placeholder="Credit Limit $"
                                           type="text" value="<?php echo $creditLimit; ?>" id="creditLimitEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sales Representative</label>
                                <input id="salesRep" value="<?php echo $salesRep; ?>" class="form-control" placeholder="--select--" list="userlist"/>
                                <datalist id="userlist">
                                    <?php
                                    $show = $db->user->find(['companyID' => $_SESSION['companyId']]);
                                    foreach ($show

                                    as $row) {
                                    $show1 = $row['user'];
                                    foreach ($show1

                                    as $row1) {
                                    $id = $row1['_id'];
                                    $name = $row1['userFirstName'] . "&nbsp;" . $row1['userLastName'];
                                    $cur = "$name";
                                    ?>
                                    <option value="<?php echo $id . ") " . $cur; ?>">
                                        <?php }
                                        } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Factoring Company</label>&nbsp;<i class="mdi mdi-plus-circle plus"
                                                                         title="Add Factoring Company"
                                                                         id="AddFactoring"></i>
                                <input id="factoringCompany" value="<?php echo $factoringCompany; ?>" class="form-control" placeholder="--select--"
                                       list="factoringlist"/>
                                <datalist id="factoringlist">
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
                                <label>Federal ID</label>
                                <div>
                                    <input class="form-control" value="<?php echo $federalID; ?>" placeholder="Federal ID"
                                           type="text" id="federalIDEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Worker's Comp #</label>
                                <div>
                                    <input class="form-control"
                                           placeholder="Worker's Comp # " value="<?php echo $workerComp; ?>" type="text"
                                           id="workerCompEdit">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Website URL</label>
                                <div>
                                    <input class="form-control" value="<?php echo $workerComp; ?>" placeholder="Website URL"
                                           type="text" id="websiteURLEdit">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Numbers on Invoice
                                </label>
                                <div class="custom-control custom-checkbox">
                                    <?php if ($numberOninvoice == "on") {?>
                                    <input type="checkbox" checked class="custom-control-input"
                                           id="customCheck5" name="numberOninvoice" data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <?php } else { ?>
                                        <input type="checkbox" class="custom-control-input"
                                               id="customCheck5" name="numberOninvoice" data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                    <?php } ?>
                                    <label class="custom-control-label" for="customCheck5">Show
                                        tel. and fax number on Invoice</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Customer Rate</label>
                                <div class="custom-control custom-checkbox">
                                    <?php if ($customerRate == "on") {?>
                                    <input type="checkbox" checked class="custom-control-input"
                                           id="customCheck6" name="customerRate" data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <?php } else { ?>
                                        <input type="checkbox" class="custom-control-input"
                                               id="customCheck6" name="customerRate" data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                    <?php } ?>
                                    <label class="custom-control-label" for="customCheck6">Show
                                        detailed Rate on Invoice</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Internal Notes</label>
                                <div>
                                        <textarea rows="3" cols="30" class="form-control"
                                                  type="textarea" id="internalNotesEdit"><?php echo $internalNotes; ?></textarea>
                                    <input type="hidden" id="companyId"
                                           value="<?php echo $_SESSION['companyId']; ?>">
                                    <input type="hidden" id="customerUpdateID"
                                           value="<?php echo $_GET['id'];?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <label class="text-danger"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                        <button onclick="EditCustomerDetail()" class="float-right btn btn-primary">Edit</button>
                        <button style="margin-right: 3px" class="float-right btn btn-danger modalCustomerEdit">
                            Close
                        </button>
                        <button onclick="toggle1()" style="margin-right: 3px" class="float-right btn btn-secondary">
                            Previous
                        </button>
                    <?php }
                            } ?>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
