<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     id="addLoad_Type" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Active Load Type</h5>
                <button type="button" class="close modalLoadType" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Name *</label>
                        <div>
                            <input class="form-control" placeholder="Name *" type="text"
                                   id="loadName">
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>
                            Unit # *</label>
                        <select class="form-control" id="loadType">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect modalLoadType"
                            >Close
                    </button>
                    <button type="submit" name="submit" onclick="addLoadType()"
                            class="btn btn-primary waves-effect waves-light">
                        Save
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!------------------------------------------------------------------------------------------------------------------------------------------------>