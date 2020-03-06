<?php
session_start();
require "../database/connection.php";
?>
<!--  Modal content for the above example -->
<div id="driverpayinfo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Driver Pay Info</h5>
                <button type="button" class="close modalDriverPay" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="container">
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label>Loaded Miles <span class="mandatory">*</span>
                        </label>
                        <div>
                            <input class="form-control" id="loadedmiles" placeholder="Loaded Mi" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Empty Miles <span class="mandatory">*</span>
                        </label>
                        <div>
                            <input class="form-control" id="emptymiles" placeholder="Empty Mi" type="text">
                        </div>
                    </div>
                    </div>
                    <div class ="row col-md-12">
                    <div class="form-group col-md-6">
                        <label>Rate/Picks</label>
                        <div>
                            <input class="form-control" id="pickrate" placeholder="Rate/Pick" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Start After</label>
                        <div>
                            <input class="form-control" id="pickstart" placeholder="Start After" type="text">
                        </div>
                    </div>
                    </div>
                    <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label>Rate/Drops</label>
                        <div>
                            <input class="form-control" id="droprate" placeholder="Rate/Drop" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Start After</label>
                        <div>
                            <input class="form-control" id="dropstart" placeholder="Start After" type="text">
                        </div>
                    </div>
                    </div>
                    <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label>Rate/Tarp</label>
                        <div>
                            <input class="form-control" id="driverTarp" placeholder="Tarp" type="text">
                        </div>
                    </div> 
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect modalDriverPay">
                    Close
                </button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="getDriverPayInfo()">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
