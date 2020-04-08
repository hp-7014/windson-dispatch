<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    id="addCreditcard" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Credit Card</h5>
                <button type="button" class="close modalCreditcard" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12">
                    <label>Name <span class="mandatory">*</span></label>
                    <div>
                        <input class="form-control" placeholder="Name" name="credit_card_name" type="text"
                            id="credit_card_name">
                        <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                    </div>
                </div>
                <span class="mandatory">Note: * Fields are Mandatory</span>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect modalCreditcard">
                        Close
                    </button>
                    <button type="submit" id="submit" onclick="addCreditCard()"
                        class="btn btn-primary waves-effect waves-light">
                        <span class="spinner-border spinner-border-sm loader1"></span>
                        Save</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->