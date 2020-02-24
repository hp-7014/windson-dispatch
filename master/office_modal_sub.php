<?php session_start();
require "../database/connection.php";?>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     id="addOffice" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add Office</h5>
                <button type="button" class="close modalOfficeSub" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Name <span style="color: red;">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Name *" id="officeName" type="text"
                                   id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Location <span style="color: red;">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Location *" onkeydown="getLocation('officeLocation')" id="officeLocation" type="text">
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect modalOfficeSub"
                            >Close
                    </button>
                    <input type="submit" name="submit" onclick="addOffice()" value="Save"
                           class="btn btn-primary waves-effect waves-light"/>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>