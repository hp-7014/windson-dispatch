<?php 
    session_start();
    require "../database/connection.php";
?>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    id="updateTable" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;" id="modal-title"></h5>
                <button type="button" class="close modalupdatetable" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label id="fieldLabel"></label>
                        <div>
                            <textarea row="5" class="form-control" placeholder="Name *" type="text" id="field-value"
                                name="field-value"></textarea>
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                            <input type="hidden" id="fieldid">
                            <input type="hidden" id="fieldname">
                            <input type="hidden" id="functionname">
                            <input type="hidden" id="masterID">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect modalupdatetable">Close
                    </button>
                    <button type="button" onclick="updateTableField()" id=""
                        class="btn btn-primary waves-effect waves-light">
                        <span class="spinner-border spinner-border-sm loader1"></span>
                        Save
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>