<?php session_start();
require "../database/connection.php"; ?>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     id="Addcustomeremail" aria-hidden="true" style="z-index: 10000">
    <div class="load"></div>
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Customer Email </h5>
                <button type="button" class="close modelcustomer" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Email-1 <span style="color: red;">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Email-1" type="text"
                                   id="emailcustomer1" disabled>
                        </div>
                        <label>Email-2 </label>
                        <div>
                            <input class="form-control" placeholder="Email-2" type="text"
                                   id="emailcustomer2">
                        </div>
                        <label>Email-3 </label>
                        <div>
                            <input class="form-control" placeholder="Email-3" type="text"
                                   id="emailcustomer3">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect modelcustomer"
                            >Close
                    </button>
                    <button type="submit" name="submit" onclick="getcustomerload()"
                            class="btn btn-primary waves-effect waves-light">
                        Save
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>