<?php session_start();
require "../database/connection.php"; ?>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     id="addCredit_Category" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Bank Credit Category</h5>
                <button type="button" class="close modalCreditcategory" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12">
                    <label>Name <span style="color: red">*</span></label>
                    <div>
                        <input class="form-control" placeholder="Name" name="credit_category_name" type="text"
                               id="credit_category_name">
                        <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect modalCreditcategory">
                    Close
                </button>
                <button type="submit" name="submit" onclick="addCreditCategory()"
                        class="btn btn-primary waves-effect waves-light">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->