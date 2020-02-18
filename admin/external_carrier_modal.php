<?php session_start();
require "../database/connection.php";
?>

    <!--  Modal content for the above example -->

    <div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="External"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="carrier-container" style="z-index: 2000"></div>
        <div class="modal-dialog modal-xxl modal-dialog-scrollable">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                        External Carrier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-modal-body">
                    <button type="button" class="btn btn-primary waves-effect waves-light header-title" data-toggle="modal"
                            data-target="#" id="AddCarrier">ADD
                    </button>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Save
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


