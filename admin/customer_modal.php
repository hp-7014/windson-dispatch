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
                <div class="customer-container" style="z-index: 1400"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal"
                                            data-target="#" id="AddCustomer">Add
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

