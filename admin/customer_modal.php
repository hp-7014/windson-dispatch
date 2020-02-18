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
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#add_customer"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="customer_table" class="scroll" >
                                <thead>
                                <tr>
                                    <th scope="col" col width="160">No</th>
                                    <th scope="col" col width="160" data-priority="1">Customer Name</th>
                                    <th scope="col" col width="160" data-priority="3">Address</th>
                                    <th scope="col" col width="160" data-priority="1">Location</th>
                                    <th scope="col" col width="160" data-priority="3">Zip</th>
                                    <th scope="col" col width="160" data-priority="3">Billing Address</th>
                                    <th scope="col" col width="160" data-priority="6">Location</th>
                                    <th scope="col" col width="160" data-priority="6">Zip</th>
                                    <th scope="col" col width="160" data-priority="6">Primary Contact</th>
                                    <th scope="col" col width="160" data-priority="1">Telephone</th>
                                    <th scope="col" col width="160" data-priority="3">Ext</th>
                                    <th scope="col" col width="160" data-priority="1">Email</th>
                                    <th scope="col" col width="160" data-priority="3">Fax</th>
                                    <th scope="col" col width="160" data-priority="3">Billing Contact</th>
                                    <th scope="col" col width="160" data-priority="6">Billing Email</th>
                                    <th scope="col" col width="160" data-priority="6">Billing Telephone</th>
                                    <th scope="col" col width="160" data-priority="6">Ext</th>
                                    <th scope="col" col width="160" data-priority="1">URS</th>
                                    <th scope="col" col width="160" data-priority="3">M.C.</th>
                                    <th scope="col" col width="160" data-priority="1">Currency Setting</th>
                                    <th scope="col" col width="160" data-priority="3">Payment Terms</th>
                                    <th scope="col" col width="160" data-priority="3">Credit Limit $</th>
                                    <th scope="col" col width="160" data-priority="6">Sales Rep</th>
                                    <th scope="col" col width="160" data-priority="6">Factoring Company</th>
                                    <th scope="col" col width="160" data-priority="6">Federal ID</th>
                                    <th scope="col" col width="160" data-priority="1">Worker's Comp #</th>
                                    <th scope="col" col width="160" data-priority="3">Website URL</th>
                                    <th scope="col" col width="160" data-priority="1">Internal Notes</th>
                                    <th scope="col" col width="160" data-priority="3">Action</th>
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
                                            $limit = 4;
                                            $total_records = $s->count();
                                            $total_pages = ceil($total_records / $limit);
                                ?>
                                    <tr>
                                        <th><?php echo $no++ ?></th>
                                        <td>
                                            <a href="#" id="custName<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'custName');" class="text-overflow"><?php echo $s['custName']; ?></a>
                                            <button type="button" id="custName<?php echo $s['_id']; ?>" onclick="updateCustomer('custName',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="custAddress<?php echo $s['_id']; ?>2" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'custAddress');" class="text-overflow"><?php echo $s['custAddress']; ?></a>
                                            <button type="button" id="custAddress<?php echo $s['_id']; ?>" onclick="updateCustomer('custAddress',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="custLocation<?php echo $s['_id']; ?>3" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'custLocation');" class="text-overflow"><?php echo $s['custLocation']; ?></a>
                                            <button type="button" id="custLocation<?php echo $s['_id']; ?>" onclick="updateCustomer('custLocation',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="custZip<?php echo $s['_id']; ?>4" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'custZip');" class="text-overflow"><?php echo $s['custZip']; ?></a>
                                            <button type="button" id="custZip<?php echo $s['_id']; ?>" onclick="updateCustomer('custZip',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="billingAddress<?php echo $s['_id']; ?>5" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'billingAddress');" class="text-overflow"><?php echo $s['billingAddress']; ?></a>
                                            <button type="button" id="billingAddress<?php echo $s['_id']; ?>" onclick="updateCustomer('billingAddress',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="billingLocation<?php echo $s['_id']; ?>6" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'billingLocation');" class="text-overflow"><?php echo $s['billingLocation']; ?></a>
                                            <button type="button" id="billingLocation<?php echo $s['_id']; ?>" onclick="updateCustomer('billingLocation',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="billingZip<?php echo $s['_id']; ?>7" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'billingZip');" class="text-overflow"><?php echo $s['billingZip']; ?></a>
                                            <button type="button" id="billingZip<?php echo $s['_id']; ?>" onclick="updateCustomer('billingZip',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="primaryContact<?php echo $s['_id']; ?>8" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'primaryContact');" class="text-overflow"><?php echo $s['primaryContact']; ?></a>
                                            <button type="button" id="primaryContact<?php echo $s['_id']; ?>" onclick="updateCustomer('primaryContact',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="custTelephone<?php echo $s['_id']; ?>9" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'custTelephone');" class="text-overflow"><?php echo $s['custTelephone']; ?></a>
                                            <button type="button" id="custTelephone<?php echo $s['_id']; ?>" onclick="updateCustomer('custTelephone',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="custExt<?php echo $s['_id']; ?>10" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'custExt');" class="text-overflow"><?php echo $s['custExt']; ?></a>
                                            <button type="button" id="custExt<?php echo $s['_id']; ?>" onclick="updateCustomer('custExt',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="custEmail<?php echo $s['_id']; ?>11" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'custEmail');" class="text-overflow"><?php echo $s['custEmail']; ?></a>
                                            <button type="button" id="custEmail<?php echo $s['_id']; ?>" onclick="updateCustomer('custEmail',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="custFax<?php echo $s['_id']; ?>12" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'custFax');" class="text-overflow"><?php echo $s['custFax']; ?></a>
                                            <button type="button" id="custFax<?php echo $s['_id']; ?>" onclick="updateCustomer('custFax',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="billingContact<?php echo $s['_id']; ?>13" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'billingContact');" class="text-overflow"><?php echo $s['billingContact']; ?></a>
                                            <button type="button" id="billingContact<?php echo $s['_id']; ?>" onclick="updateCustomer('billingContact',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="billingEmail<?php echo $s['_id']; ?>14" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'billingEmail');" class="text-overflow"><?php echo $s['billingEmail']; ?></a>
                                            <button type="button" id="billingEmail<?php echo $s['_id']; ?>" onclick="updateCustomer('billingEmail',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="billingTelephone<?php echo $s['_id']; ?>15" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'billingTelephone');" class="text-overflow"><?php echo $s['billingTelephone']; ?></a>
                                            <button type="button" id="billingTelephone<?php echo $s['_id']; ?>" onclick="updateCustomer('billingTelephone',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="billingExt<?php echo $s['_id']; ?>16" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'billingExt');" class="text-overflow"><?php echo $s['billingExt']; ?></a>
                                            <button type="button" id="billingExt<?php echo $s['_id']; ?>" onclick="updateCustomer('billingExt',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="URS<?php echo $s['_id']; ?>17" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'URS');" class="text-overflow"><?php echo $s['URS']; ?></a>
                                            <button type="button" id="URS<?php echo $s['_id']; ?>" onclick="updateCustomer('URS',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="MC<?php echo $s['_id']; ?>18" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'MC');" class="text-overflow"><?php echo $s['MC']; ?></a>
                                            <button type="button" id="MC<?php echo $s['_id']; ?>" onclick="updateCustomer('MC',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="currencySetting<?php echo $s['_id']; ?>19" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'currencySetting');" class="text-overflow"><?php echo $s['currencySetting']; ?></a>
                                            <button type="button" id="currencySetting<?php echo $s['_id']; ?>" onclick="updateCustomer('currencySetting',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="paymentTerms<?php echo $s['_id']; ?>20" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'paymentTerms');" class="text-overflow"><?php echo $s['paymentTerms']; ?></a>
                                            <button type="button" id="paymentTerms<?php echo $s['_id']; ?>" onclick="updateCustomer('paymentTerms',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="creditLimit<?php echo $s['_id']; ?>21" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'creditLimit');" class="text-overflow"><?php echo $s['creditLimit']; ?></a>
                                            <button type="button" id="creditLimit<?php echo $s['_id']; ?>" onclick="updateCustomer('creditLimit',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="salesRep<?php echo $s['_id']; ?>22" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'salesRep');" class="text-overflow"><?php echo $s['salesRep']; ?></a>
                                            <button type="button" id="salesRep<?php echo $s['_id']; ?>" onclick="updateCustomer('salesRep',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="factoringCompany<?php echo $s['_id']; ?>23" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'factoringCompany');" class="text-overflow"><?php echo $s['factoringCompany']; ?></a>
                                            <button type="button" id="factoringCompany<?php echo $s['_id']; ?>" onclick="updateCustomer('factoringCompany',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="federalID<?php echo $s['_id']; ?>24" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'federalID');" class="text-overflow"><?php echo $s['federalID']; ?></a>
                                            <button type="button" id="federalID<?php echo $s['_id']; ?>" onclick="updateCustomer('federalID',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="workerComp<?php echo $s['_id']; ?>25" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'workerComp');" class="text-overflow"><?php echo $s['workerComp']; ?></a>
                                            <button type="button" id="workerComp<?php echo $s['_id']; ?>" onclick="updateCustomer('workerComp',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="websiteURL<?php echo $s['_id']; ?>26" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'websiteURL');" class="text-overflow"><?php echo $s['websiteURL']; ?></a>
                                            <button type="button" id="websiteURL<?php echo $s['_id']; ?>" onclick="updateCustomer('websiteURL',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="internalNotes<?php echo $s['_id']; ?>26" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'internalNotes');" class="text-overflow"><?php echo $s['internalNotes']; ?></a>
                                            <button type="button" id="internalNotes<?php echo $s['_id']; ?>" onclick="updateCustomer('internalNotes',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td><a href="#" onclick="deleteCustomer(<?php echo $s['_id']; ?>)"><i
                                                        class="mdi mdi-delete-sweep-outline"
                                                        style="font-size: 20px; color: #FC3B3B"></i></a></td>
                                    </tr>
                                    <?php }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
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
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                    <nav aria-label="..." class="float-right">
                        <ul class="pagination">
                            <?php
                            for($i=1; $i<=$total_pages; $i++){
                                if($i == 1){
                                    ?>
                                    <li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i;?>" class="page-link" ><?php echo $i;?></a></li>

                                    <?php
                                }
                                else{
                                    ?>
                                    <li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
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
                    <div class="row">
                        <button type="button"
                                class="btn btn-outline-success waves-effect waves-light float-right">CSV
                            formate
                        </button>
                        <div class="custom-upload-btn-wrapper float-right">
                            <button class="custom-btn">Choose file</button>
                            <input type="file" name="file" id="file" accept=".csv"/>
                        </div>
                        <input type="submit" name="submit" onclick="importCustomer()"
                               class="btn btn-outline-info waves-effect waves-light float-right"
                               value="Upload"/>
                    </div>
                    <hr>

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
            display:block;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        a.editable-click { border-bottom: none;
            color: #000000;}
        a.editable-click:hover{
            border-bottom: none;
        }
        .table-scroll::-webkit-scrollbar {
            width: 12px;
            height: 8px;
        }

        /* Track */

        .table-scroll::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            -webkit-border-radius: 10px;
            border-radius: 10px;
        }


        .table-scroll::-webkit-scrollbar-thumb {
            -webkit-border-radius: 10px;
            border-radius: 10px;
            background: rgb(48, 65, 155);
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
        }

    </style>
