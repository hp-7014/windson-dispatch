<?php
session_start();
require "../database/connection.php";
?>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_customer"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Customer</h5>
                <button type="button" class="close modalCustomer" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="currency-container" style="z-index: 1600"></div>
                <div class="payment-container" style="z-index: 1600"></div>
                <div class="factoring-container" style="z-index: 1600"></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item1 show" id="home-title">
                        <a class="nav-link1 active" onclick="toggle()" id="home-tab" data-toggle="tab" href="#"
                            role="tab" aria-controls="home" aria-selected="true">Add Customer
                        </a>
                    </li>
                    <li class="nav-item1" id="profile-title">
                        <a class="nav-link1" onclick="toggle()" id="profile-tab" data-toggle="tab" href="#" role="tab"
                            aria-controls="profile" aria-selected="false">Add Advance</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Customer Name <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Company Name *" type="text" id="custName">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Address <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Address *" type="text" id="custAddress">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Location <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Location *"
                                        onkeyup="getLocation('custLocation')" type="text" id="custLocation">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Zip <span style="color: red">*</span></label>
                                <div>
                                    <input class="form-control" placeholder="Zip Code *" type="text" id="custZip">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Billing Address</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1"
                                        name="sameAsMailingAddress" data-parsley-multiple="groups"
                                        onclick="setBillingDetail(this.value)" data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="customCheck1">Same
                                        as Mailing Address</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Billing Address</label>
                                <div>
                                    <input class="form-control" placeholder="Billing Address" type="text"
                                        id="billingAddress">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Location </label>
                                <div>
                                    <input class="form-control" placeholder="Enter a location"
                                        onclick="getLocation(this.id)" type="text" id="billingLocation">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Zip </label>
                                <div>
                                    <input class="form-control" placeholder="Zip Code" type="text" id="billingZip">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Primary Contact</label>
                                <div>
                                    <input class="form-control" placeholder="Primary Contact" type="text"
                                        id="primaryContact">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Telephone</label>
                                <div>
                                    <input class="form-control" placeholder="Telephone" type="text" id="custTelephone">
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <label>Ext</label>
                                <div>
                                    <input class="form-control" placeholder="Ext" type="text" id="custExt">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Email</label>
                                <div>
                                    <input class="form-control" placeholder="Email" type="email" id="custEmail">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Fax</label>
                                <div>
                                    <input class="form-control" placeholder="Fax" type="text" id="custFax">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Billing Contact</label>
                                <div>
                                    <input class="form-control" placeholder="Billing Contact" type="text"
                                        id="billingContact">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Billing Email</label>
                                <div>
                                    <input class="form-control" type="email" placeholder="Billing Email"
                                        id="billingEmail">
                                </div>
                            </div>
                            <div class="form-group col-md-2 ">
                                <label>Billing Telephone</label>
                                <div>
                                    <input class="form-control" placeholder="Billing Telephone" type="text"
                                        id="billingTelephone">
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <label>Ext</label>
                                <div>
                                    <input class="form-control" placeholder="Ext" type="text" id="billingExt">
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <label>URS</label>
                                <div>
                                    <input class="form-control" placeholder="URS" type="text" id="URS">
                                </div>
                            </div>
                            <div class="form-group col-md-1" id="mcShow" style="display: none">
                                <label>M.C.</label>
                                <div>
                                    <input class="form-control" placeholder="M.C." type="text" id="MC">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Blacklisted</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2"
                                        name="blacklisted" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="customCheck2">This
                                        Customer is Blacklisted</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Is Broker </label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3"
                                        onclick="showFields()" name="isBroker" value="1" data-parsley-multiple="groups"
                                        data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="customCheck3">This
                                        is a Broker</label>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Duplicate</label>
                                <div class="row">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck7"
                                            name="AsShipper" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="customCheck7">As a Shipper</label>
                                    </div>&nbsp;&nbsp;
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck8"
                                            name="AsConsignee" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="customCheck8">As a Consignee</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <label class="text-danger" style="padding-right: 70%"><b>Note :</b>&nbsp; * Fields are
                            mandatory</label>
                        <button onclick="toggle()" class="btn btn-success float-right">Next
                        </button>

                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <br>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Currency Setting</label>&nbsp;<i title="Add Currency"
                                    class="mdi mdi-plus-circle plus" id="AddCurrency"></i>

                                <select class="form-control" id="currencySetting">

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
                                    title="Add Payment Terms" id="Add_Payment_Terms"></i>
                                <input id="paymentTerms" class="form-control" placeholder="--select--"
                                    list="paymentlist" />
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
                                    <input class="form-control" placeholder="Credit Limit $" type="text"
                                        id="creditLimit">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sales Representative</label>
                                <input id="salesRep" class="form-control" placeholder="--select--" list="userlist" />
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
                                    title="Add Factoring Company" id="AddFactoring"></i>
                                <input id="factoringCompany" class="form-control" placeholder="--select--"
                                    list="factoringlist" />
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
                                    <input class="form-control" placeholder="Federal ID" type="text" id="federalID">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Worker's Comp #</label>
                                <div>
                                    <input class="form-control" placeholder="Worker's Comp # " type="text"
                                        id="workerComp">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Website URL</label>
                                <div>
                                    <input class="form-control" placeholder="Website URL" type="text" id="websiteURL">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Numbers on Invoice
                                </label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5"
                                        name="numberOninvoice" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="customCheck5">Show
                                        tel. and fax number on Invoice</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Customer Rate</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6"
                                        name="customerRate" data-parsley-multiple="groups" data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="customCheck6">Show
                                        detailed Rate on Invoice</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Internal Notes</label>
                                <div>
                                    <textarea rows="3" cols="30" class="form-control" type="textarea"
                                        id="internalNotes"></textarea>
                                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <label class="text-danger"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                        <button onclick="addCustomer()" class="float-right btn btn-primary">Save
                            <span class="spinner-border spinner-border-sm loader1">
                        </button>
                        <button style="margin-right: 3px" class="float-right btn btn-danger modalCustomer">
                            Close
                        </button>
                        <button onclick="toggle()" style="margin-right: 3px" class="float-right btn btn-secondary">
                            Previous
                        </button>

                    </div>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->