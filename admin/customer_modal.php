<?php
session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="customer"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0">
                    Customer</h5>
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
                                            data-target="#add_customer">Add
                                    </button>
                                    <input type="submit" name="submit" onclick="importCustomer()"
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
                                        <th>Customer Name</th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Zip</th>
                                        <th>Billing Address</th>
                                        <th>Location</th>
                                        <th>Zip</th>
                                        <th>Primary Contact</th>
                                        <th>Telephone</th>
                                        <th>Ext</th>
                                        <th>Email</th>
                                        <th>Fax</th>
                                        <th>Billing Contact</th>
                                        <th>Billing Email</th>
                                        <th>Billing Telephone</th>
                                        <th>Ext</th>
                                        <th>URS</th>
                                        <th>M.C.</th>
                                        <th>Currency Setting</th>
                                        <th>Payment Terms</th>
                                        <th>Credit Limit $</th>
                                        <th>Sales Rep</th>
                                        <th>Factoring Company</th>
                                        <th>Federal ID</th>
                                        <th>Worker's Comp #</th>
                                        <th>Website URL</th>
                                        <th>Internal Notes</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require 'model/Customer.php';

                                    $customer = new Customer();
                                    $show_data = $db->customer->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    foreach ($show_data as $show) {
                                        $show = $show['customer'];
                                        foreach ($show as $s) {
                                            ?>
                                            <tr>
                                                <td><a href="#"><?php echo $no++; ?></a></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'custName',<?php echo $s['_id']; ?>)"><?php echo $s['custName']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'custAddress',<?php echo $s['_id']; ?>)"><?php echo $s['custAddress']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'custLocation',<?php echo $s['_id']; ?>)"><?php echo $s['custLocation']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'custZip',<?php echo $s['_id']; ?>)"><?php echo $s['custZip']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'billingAddress',<?php echo $s['_id']; ?>)"><?php echo $s['billingAddress']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'billingLocation',<?php echo $s['_id']; ?>)"><?php echo $s['billingLocation']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'billingZip',<?php echo $s['_id']; ?>)"><?php echo $s['billingZip']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'primaryContact',<?php echo $s['_id']; ?>)"><?php echo $s['primaryContact']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'custTelephone',<?php echo $s['_id']; ?>)"><?php echo $s['custTelephone']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'custExt',<?php echo $s['_id']; ?>)"><?php echo $s['custExt']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'custEmail',<?php echo $s['_id']; ?>)"><?php echo $s['custEmail']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'custFax',<?php echo $s['_id']; ?>)"><?php echo $s['custFax']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'billingContact',<?php echo $s['_id']; ?>)"><?php echo $s['billingContact']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'billingEmail',<?php echo $s['_id']; ?>)"><?php echo $s['billingEmail']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'billingTelephone',<?php echo $s['_id']; ?>)"><?php echo $s['billingTelephone']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'billingExt',<?php echo $s['_id']; ?>)"><?php echo $s['billingExt']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'URS',<?php echo $s['_id']; ?>)"><?php echo $s['URS']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'MC',<?php echo $s['_id']; ?>)"><?php echo $s['MC']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'currencySetting',<?php echo $s['_id']; ?>)"><?php echo $s['currencySetting']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'paymentTerms',<?php echo $s['_id']; ?>)"><?php echo $s['paymentTerms']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'creditLimit',<?php echo $s['_id']; ?>)"><?php echo $s['creditLimit']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'salesRep',<?php echo $s['_id']; ?>)"><?php echo $s['salesRep']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'factoringCompany',<?php echo $s['_id']; ?>)"><?php echo $s['factoringCompany']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'federalID',<?php echo $s['_id']; ?>)"><?php echo $s['federalID']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'workerComp',<?php echo $s['_id']; ?>)"><?php echo $s['workerComp']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'websiteURL',<?php echo $s['_id']; ?>)"><?php echo $s['websiteURL']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCustomer(this,'internalNotes',<?php echo $s['_id']; ?>)"><?php echo $s['internalNotes']; ?></td>
                                                <td><a href="#" onclick="deleteCustomer(<?php echo $s['_id']; ?>)"><i
                                                                class="mdi mdi-delete-sweep-outline"
                                                                style="font-size: 20px; color: #FC3B3B"></i></a></td>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="exportCustomer(<?php echo $_SESSION['companyId']; ?>)"
                            class="btn btn-primary waves-effect waves-light">Export
                    </button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_customer"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                        Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-modal-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item show" id="home-title">
                            <a class="nav-link active" onclick="toggle()" id="home-tab" data-toggle="tab" href="#"
                               role="tab" aria-controls="home"
                               aria-selected="true">Add Customer
                            </a>
                        </li>
                        <li class="nav-item" id="profile-title">
                            <a class="nav-link" onclick="toggle()" id="profile-tab" data-toggle="tab" href="#"
                               role="tab" aria-controls="profile"
                               aria-selected="false">Add Advance</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                             aria-labelledby="home-tab">
                            <br>

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Customer Name <span style="color: red">*</span></label>
                                    <div>
                                        <input class="form-control" placeholder="Company Name *"
                                               type="text" id="custName">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Address <span style="color: red">*</span></label>
                                    <div>
                                        <input class="form-control" placeholder="Address *"
                                               type="text" id="custAddress">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Location <span style="color: red">*</span></label>
                                    <div>
                                        <input class="form-control"
                                               placeholder="Location *" type="text"
                                               id="custLocation">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Zip <span style="color: red">*</span></label>
                                    <div>
                                        <input class="form-control" placeholder="Zip Code *"
                                               type="text" id="custZip">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Billing Address</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="customCheck1" name="sameAsMailingAddress"
                                               data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="customCheck1">Same
                                            as Mailing Address</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Billing Address</label>
                                    <div>
                                        <input class="form-control"
                                               placeholder="Billing Address" type="text"
                                               id="billingAddress">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Location </label>
                                    <div>
                                        <input class="form-control"
                                               placeholder="Enter a location" type="text"
                                               id="billingLocation">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Zip </label>
                                    <div>
                                        <input class="form-control" placeholder="Zip Code"
                                               type="text" id="billingZip">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Primary Contact</label>
                                    <div>
                                        <input class="form-control"
                                               placeholder="Primary Contact" type="text"
                                               id="primaryContact">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Telephone</label>
                                    <div>
                                        <input class="form-control" placeholder="Telephone" type="text"
                                               id="custTelephone">
                                    </div>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Ext</label>
                                    <div>
                                        <input class="form-control" placeholder="Ext"
                                               type="text" id="custExt">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Email</label>
                                    <div>
                                        <input class="form-control" placeholder="Email" type="email"
                                               id="custEmail">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Fax</label>
                                    <div>
                                        <input class="form-control" placeholder="Fax"
                                               type="text" id="custFax">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Billing Contact</label>
                                    <div>
                                        <input class="form-control"
                                               placeholder="Billing Contact" type="text"
                                               id="billingContact">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Billing Email</label>
                                    <div>
                                        <input class="form-control" type="email"
                                               placeholder="Billing Email" id="billingEmail">
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
                                        <input class="form-control" placeholder="Ext"
                                               type="text" id="billingExt">
                                    </div>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>URS</label>
                                    <div>
                                        <input class="form-control" placeholder="URS"
                                               type="text" id="URS">
                                    </div>
                                </div>
                                <div class="form-group col-md-1" id="mcShow" style="display: none">
                                    <label>M.C.</label>
                                    <div>
                                        <input class="form-control" placeholder="M.C."
                                               type="text" id="MC">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Blacklisted</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="customCheck2" name="blacklisted" data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
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
                            <button onclick="toggle()" class="btn btn-success float-right">Next
                            </button>

                        </div>

                        <div class="tab-pane fade" id="profile" role="tabpanel"
                             aria-labelledby="profile-tab">
                            <br>

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Currency Setting</label>
                                    <select class="form-control" id="currencySetting">
                                        <option>---select---</option>
                                        <?php
                                        $currency = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
                                        foreach ($currency as $cur) {
                                            $show = $cur['currency'];
                                            foreach ($show as $s) {
                                                ?>
                                                <option value="<?php echo $s['currencyType'] ?>"><?php echo $s['currencyType'] ?></option>
                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Payment Terms</label>
                                    <select class="form-control" id="paymentTerms">
                                        <option>---select---</option>
                                        <?php
                                        $payment = $db->payment_terms->find(['companyID' => $_SESSION['companyId']]);
                                        foreach ($payment as $pay) {
                                            $show = $pay['payment'];
                                            foreach ($show as $s) {
                                                ?>
                                                <option value="<?php echo $s['paymentTerm'] ?>"><?php echo $s['paymentTerm'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Credit Limit $</label>
                                    <div>
                                        <input class="form-control" placeholder="Credit Limit $"
                                               type="text" id="creditLimit">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Sales Rep</label>
                                    <select class="form-control" id="salesRep">
                                        <option>---select---</option>
                                        <option>abc</option>
                                        <option>xyz</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Factoring Company</label>
                                    <select class="form-control" id="factoringCompany">
                                        <option>---select---</option>
                                        <option>abc</option>
                                        <option>xyz</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Federal ID</label>
                                    <div>
                                        <input class="form-control" placeholder="Federal ID"
                                               type="text" id="federalID">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Worker's Comp #</label>
                                    <div>
                                        <input class="form-control"
                                               placeholder="Worker's Comp # " type="text"
                                               id="workerComp">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Website URL</label>
                                    <div>
                                        <input class="form-control" placeholder="Website URL"
                                               type="text" id="websiteURL">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Numbers on Invoice
                                    </label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="customCheck5" name="numberOninvoice" data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="customCheck5">Show
                                            tel. and fax number on Invoice</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Customer Rate</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="customCheck6" name="customerRate" data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="customCheck6">Show
                                            detailed Rate on Invoice</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Internal Notes</label>
                                    <div>
                                        <textarea rows="3" cols="30" class="form-control"
                                                  type="textarea" id="internalNotes"></textarea>
                                        <input type="hidden" id="companyId"
                                               value="<?php echo $_SESSION['companyId']; ?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button onclick="addCustomer()" class="float-right btn btn-primary">Save</button>
                            <button style="margin-right: 3px" data-dismiss="modal" class="float-right btn btn-danger">
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
