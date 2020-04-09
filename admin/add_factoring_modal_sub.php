<?php
session_start();
include '../database/connection.php';
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_factoring"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="currency-container" style="z-index: 1600"></div>
        <div class="payment-container" style="z-index: 1600"></div>
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Factoring Company</h5>
                <button type="button" class="close modalFactoring" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Factoring Company Name <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Factoring Company Name *" type="text"
                                id="factoring_add_company">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Address <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Address *" type="text" id="faddress">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Location <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" onkeyup="getLocation('flocation')"
                                placeholder="Enter a location" type="text" id="flocation">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Postal / Zip <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Postal / Zip" type="text" id="fzip">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Primary Contact</label>
                        <div>
                            <input class="form-control" placeholder="Primary Contact" type="text" id="fprimary_contact">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" placeholder="Telephone" type="text" id="ftelephone">
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
                            <input class="form-control" placeholder="Contact Email" type="email" id="femail">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Secondary Contact</label>
                        <div>
                            <input class="form-control" placeholder="Secondary Contact" type="text"
                                id="fsecondaryContact">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" placeholder="Telephone" type="text" id="facttelephone">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" placeholder="Ext" type="text" id="ext">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="currencysetting">Currency Setting <span class="mandatory">*</span></label> <i
                            title="Add Currency" class="mdi mdi-plus-circle plus" id="AddCurrency"></i>
                        <input id="fcurrency" name="fcurrency" placeholder="Currency Setting *" class="form-control"
                            list="currencyset" />

                    </div>
                    <div class="form-group col-md-2">
                        <label for="currencysetting">Payment Terms <span class="mandatory">*</span></label> <i
                            title="Add Payment Terms" class="mdi mdi-plus-circle plus" id="Add_Payment_Terms"></i>
                        <input id="fpaymentterms" class="form-control" placeholder="Payment Terms *"
                            name="fpaymentterms" list="paymentterms" />
                    </div>

                    <div class="form-group col-md-2">
                        <label>Tax ID <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Tax ID *" type="text" id="ftaxid">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Internal Notes</label>
                        <div>
                            <textarea rows="2" cols="30" class="form-control" type="textarea"
                                id="finternal_notes_factoring" placeholder="Internal Notes"></textarea>
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <label class="text-danger" style="padding-right: 70%"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                <button type="button" class="btn btn-danger waves-effect modalFactoring">
                    Close
                </button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="FactoringCompany()">Save
                    <span class="spinner-border spinner-border-sm loader1">
                </button>
            </div>
            <datalist id="currencyset">
                <?php
                $show = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
                foreach ($show

                as $row) {
                $show1 = $row['currency'];
                foreach ($show1

                as $row1) {
                $id = $row1['_id'];
                $currencyType = $row1['currencyType'];
                $cur = "$currencyType";
                ?>
                <option value="<?php echo $id .")".$cur; ?>">
                    <?php }
                    } ?>
            </datalist>
            <datalist id="paymentterms">
                <?php
                $show = $db->payment_terms->find(['companyID' => $_SESSION['companyId']]);
                foreach ($show

                as $row) {
                $show1 = $row['payment'];
                foreach ($show1

                as $row1) {
                $id = $row1['_id'];
                $paymentTerms = $row1['paymentTerm'];
                $pay = "$paymentTerms";
                ?>
                <option value="<?php echo $id.")".$pay; ?>">
                    <?php }
                    } ?>
            </datalist>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->