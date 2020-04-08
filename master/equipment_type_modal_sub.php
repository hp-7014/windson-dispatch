<?php
session_start();
require "../database/connection.php";
?>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    id="Add_Equipment_Type" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Equipment Type</h5>
                <button type="button" class="close modalEquipmentType" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Name <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Name *" type="text" id="equipment_add_type">
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                </div>
                <span class="mandatory">Note: * Fields are Mandatory</span>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect modalEquipmentType">Close
                    </button>
                    <button type="button" onclick="addEquipment()" id=""
                        class="btn btn-primary waves-effect waves-light">
                        <span class="spinner-border spinner-border-sm loader1"></span>
                        Save
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>