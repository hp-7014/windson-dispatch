<!-----------------------------------------------Add Custom Broker------------------------------------------------------------------------------------->
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="Add_Customs_Broker"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add Customs Broker</h5>
                <button type="button" class="close modalBroker"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Broker Name <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Broker Name *" type="text" name="brokerName" id="brokerName">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Crossing <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Crossing *" type="text" name="crossing" id="crossing">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" placeholder="Telephone No" type="text" name="telephone" id="telephone">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" placeholder="Ext" type="text" name="ext" id="ext">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Toll Free</label>
                        <div>
                            <input class="form-control" placeholder="Toll Free" type="text" name="tollfree" id="tollfree">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fax</label>
                        <div>
                            <input class="form-control" placeholder="Fax No" type="text" name="fax" id="fax">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status </label>
                        <div class="row">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="status1" name="Status" value="Active" checked>
                                <label class="custom-control-label" for="status1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="status2" name="Status" value="InActive">
                                <label class="custom-control-label" for="status2">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect modalBroker" >Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="Add_CustomBroker()">Save</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
