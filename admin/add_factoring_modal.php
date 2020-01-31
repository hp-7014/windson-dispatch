<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="factoring"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Factoring Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                        data-target="#add_factoring">ADD
                </button>
            </div>
            <div id="table-scroll" class="table-scroll">
                <table id="main-table" class="main-table ">
                    <thead>
                    <tr>
                        <th scope="col" style="background-color:#666666">Factoring Company Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Location</th>
                        <th scope="col">Postal/Zip</th>
                        <th scope="col">Primary Contact</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Ext</th>
                        <th scope="col">Fax</th>
                        <th scope="col">Toll Free</th>
                        <th scope="col">Contact Email</th>
                        <th scope="col">Secondary Contact</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Ext</th>
                        <th scope="col">Currency Setting</th>
                        <th scope="col">Payment Terms</th>
                        <th scope="col">Tax ID</th>
                        <th scope="col">Internal Notes</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <?php
                    $show = $db->factoring_company_add->find(['companyID' => $_SESSION['companyId']]);
                    foreach ($show as $row){
                    $show1 = $row['factoring'];
                    foreach ($show1 as $row1) {
                    $id = $row1['_id'];
                    $factoringCompany = $row1['factoringCompanyname'];
                    $address = $row1['address'];
                    $location = $row1['location'];
                    $zip = $row1['zip'];
                    $primarycontact = $row1['primaryContact'];
                    $factoringtelephone = $row1['telephone'];
                    $factoringext = $row1['extFactoring'];
                    $fax = $row1['fax'];
                    $tollFree = $row1['tollFree'];
                    $email = $row1['email'];
                    $secondarycontact = $row1['secondaryContact'];
                    $telephone = $row1['telephone'];
                    $ext = $row1['ext'];
                    $currency = $row1['currencySetting'];
                    $payment = $row1['paymentTerms'];
                    $taxtid = $row1['taxID'];
                    $finternalNotes = $row1['internalNote'];
                    ?>
                    <tbody>
                    <?php
//                    $show = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
//                    foreach ($show as $row) {
//                        $show1 = $row['currency'];
//                        foreach ($show1 as $row1) {
//                            $currencyType = $row1['currencyType'];
//                            ?>
<!--                        --><?php //}
//                    }?>
                    <tr>
                        <th><div contenteditable="true" onblur="updateFactoring(this,'factoringCompanyname','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $factoringCompany; ?></div></th>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'address','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $address; ?></div><br>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'location','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $location; ?></div></td>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'zip','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $zip; ?></div></td>
                        <th><div contenteditable="true" onblur="updateFactoring(this,'primaryContact','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $primarycontact; ?></div></th>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'telephone','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $factoringtelephone; ?></div><br>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'extFactoring','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $factoringext; ?></div></td>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'fax','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $fax ?></div></td>
                        <th><div contenteditable="true" onblur="updateFactoring(this,'tollFree','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $tollFree; ?></div></th>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'email','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $email; ?></div><br>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'secondaryContact','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $secondarycontact; ?></div></td>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'factoringtelephone','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $telephone; ?></div></td>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'ext','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $ext ?></div></td>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'currencySetting','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $currency ?></div></td>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'paymentTerms','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $payment; ?></div></td>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'taxID','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $taxtid; ?></div></td>
                        <td><div contenteditable="true" onblur="updateFactoring(this,'internalNote','<?php echo $id; ?>')"
                                 onclick="activate(this)"><?php echo $finternalNotes ?></div></td>
                        <td><a href="#" onclick="deletefactoring(<?php echo $id; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></a></i>
                        </td>
                    </tr>
                    <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="exportFactoring()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
     id="add_factoring"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Factoring Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Factoring Company Name *</label>
                        <div>
                            <input class="form-control" placeholder="Factoring Company Name *" type="text" id="factoring_add_company">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Address *</label>
                        <div>
                            <input class="form-control" placeholder="Address *" type="text" id="faddress">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Location *</label>
                        <div>
                            <input class="form-control" placeholder="Enter a location" type="text" id="flocation">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Postal / Zip*</label>
                        <div>
                            <input class="form-control" placeholder="Postal / Zip" type="text" id="fzip">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Primary Contact</label>
                        <div>
                            <input class="form-control"
                                   placeholder="Primary Contact" type="text" id="fprimary_contact">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" type="text" id="ftelephone">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" placeholder="Ext" type="text" id="factext">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Fax</label>
                        <div>
                            <input class="form-control" placeholder="Fax" type="text" id="ffax">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Toll Free</label>
                        <div>
                            <input class="form-control" placeholder="Toll Free" type="text" id="ftollfree">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Contact Email</label>
                        <div>
                            <input class="form-control" type="email" id="femail" >
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Secondary Contact</label>
                        <div>
                            <input class="form-control" placeholder="Secondary Contact" type="text" id="fsecondaryContact">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" type="text" id="facttelephone">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" placeholder="Ext" type="text" id="ext">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Currency Setting *</label>
                        <select class="form-control" id="fcurrency">
                            <?php
                            $show = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
                            foreach ($show as $row) {
                                $show1 = $row['currency'];
                                foreach ($show1 as $row1) {
                                    $currencyType = $row1['currencyType'];
                                    ?>
                                    <option value="<?php echo $currencyType; ?>"><?php echo $currencyType;  ?></option>
                                <?php }
                            }?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Payment Terms*</label>
                        <select class="form-control" id="fpaymentterms">
                            <?php
                            $show = $db->payment_terms->find(['companyID' => $_SESSION['companyId']]);
                            foreach ($show as $row) {
                                $show1 = $row['payment'];
                                foreach ($show1 as $row1) {
                                    $paymentTerms = $row1['paymentTerm'];
                                    ?>
                                    <option value="<?php echo $paymentTerms; ?>"><?php echo $paymentTerms; ?></option>
                                <?php }
                            }?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Tax ID *</label>
                        <div>
                            <input class="form-control" placeholder="Tax ID *"
                                   type="text" id="ftaxid">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Internal Notes</label>
                        <div>
                            <textarea rows="2" cols="30" class="form-control" type="textarea"
                                      id="finternal_notes_factoring"></textarea>
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">          
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="FactoringCompany()">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
