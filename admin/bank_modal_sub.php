<?php
session_start();
include '../database/connection.php';
?>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="add_bank"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="company-container" style="z-index: 1600"></div>
        <div class="factoring-container" style="z-index: 1600"></div>
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add bank</h5>
                <button type="button" class="close modalBank" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        <input type="hidden" id="transacBalance" value="" name="transacBalance">
                        <label>Name of Bank: <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Name of Bank: *" type="text" name="bankName" id="bankName">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Address / Branch </label>
                        <div>
                            <input class="form-control" placeholder="Address / Branch " type="text" name="bankAddress" id="bankAddress">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Account Holder Name <span class="mandatory">*</span></label> <i class="mdi mdi-plus-circle plus" title="Add Company" id="AddCompany"></i>
                        <div>
                            <select class="form-control " name="accountHolder" id="accountHolder" >
                                <option value="">Select Account Holder <span style="color: red">*</span></option>
                                <?php
                                $show_data = $db->company->find(['companyID' => $_SESSION['companyId']]);

                                foreach ($show_data as $show) {
                                    $show = $show['company'];
                                    foreach ($show as $s) {
                                        ?>
                                        <option value="<?php echo $s['_id']; ?>"><?php echo $s['companyName']; ?></option>
                                    <?php }
                                }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Bank Account <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Bank Account *" type="text" name="accountNo" id="accountNo">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Bank Routing: <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Bank Routing: *" type="text" name="routingNo" id="routingNo">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Opening Bal Dt <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" type="date" name="openingBalDate" id="openingBalDate">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Opening Balance <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Opening Balance * " type="text" name="openingBalance" id="openingBalance">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Current Cheque no </label>
                        <div>
                            <input class="form-control" placeholder="Current Cheque no " type="text" name="currentcheqNo" id="currentcheqNo">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <label class="text-danger" style="padding-right: 120px"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                    <button type="button" class="btn btn-danger waves-effect modalBank">Close</button>
                    <button type="button" onclick="AddBankAdmin()" class="btn btn-primary waves-effect waves-light" >Save</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->