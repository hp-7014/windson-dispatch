<?php 
    session_start();
    require "../database/connection.php";
?>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="addstartlocation"
     aria-hidden="true" style="z-index: 10000">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add Start Location</h5>
                <button type="button" class="close modalStartLocation"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Name *</label>
                        <div>
                            <input class="form-control" placeholder="Start Location" type="text"
                                   id="add_start_location" name="add_start_location" onkeydown="getLocation('add_start_location')">
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect modalStartLocation"
                            >Close
                    </button>
                    <button type="button" onclick="addStartLocation()" id=""
                            class="btn btn-primary waves-effect waves-light">
                        Save
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>