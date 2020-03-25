<!DOCTYPE html>
<html lang="en">
<?php include 'header/header.php' ?>
<br>
<br>
<br>
<br>
<div class="row">
    <div class="col-sm-6 col-md-3 m-t-30">
        <div class="text-center">
            <p class="text-muted">Admin</p>
            <!-- Large modal -->
            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                data-target="#Accounting_Manager">Accounting Manager
            </button>
        </div>
        <!--  Modal content for the above example -->
        <div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Accounting_Manager"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xxl modal-dialog-scrollable">
                <div class="modal-content custom-modal-content">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Accounting Manager</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item1 show" id="home-title">
                                <a class="nav-link1 active" id="home-tab" data-toggle="tab" href="#Delivered" role="tab"
                                    aria-controls="home" aria-selected="true">Delivered</a>
                            </li>
                            <li class="nav-item1" id="Break-title">
                                <a class="nav-link1" id="Break-tab" data-toggle="tab" href="#Break_down" role="tab"
                                    aria-controls="profile" aria-selected="false">Break Down</a>
                            </li>
                            <li class="nav-item1" id="Loaded-title">
                                <a class="nav-link1" id="Loaded-tab" data-toggle="tab" href="#Loaded" role="tab"
                                    aria-controls="contact" aria-selected="false">Loaded</a>
                            </li>
                            <li class="nav-item1" id="ArrivedShipper-title">
                                <a class="nav-link1" id="ArrivedShipper-tab" data-toggle="tab" href="#Arrived_Shipper"
                                    role="tab" aria-controls="contact" aria-selected="false">
                                    Arrived Shipper</a>
                            </li>
                            <li class="nav-item1" id="ArrivedConsignee-title">
                                <a class="nav-link1" id="ArrivedConsignee-tab" data-toggle="tab"
                                    href="#Arrived_Consignee" role="tab" aria-controls="contact" aria-selected="false">
                                    Arrived Consignee</a>
                            </li>
                            <li class="nav-item1" id="Paid-title">
                                <a class="nav-link1" id="Paid-tab" data-toggle="tab" href="#Paid" role="tab"
                                    aria-controls="contact" aria-selected="false">
                                    Paid</a>
                            </li>
                            <li class="nav-item1" id="Open-title">
                                <a class="nav-link1" id="Open-tab" data-toggle="tab" href="#Open" role="tab"
                                    aria-controls="contact" aria-selected="false">
                                    Open</a>
                            </li>
                            <li class="nav-item1" id="OnRout-title">
                                <a class="nav-link1" id="OnRout-tab" data-toggle="tab" href="#On_Rout" role="tab"
                                    aria-controls="contact" aria-selected="false">
                                    On Rout</a>
                            </li>
                            <li class="nav-item1" id="Dispatched-title">
                                <a class="nav-link1" id="Dispatched-tab" data-toggle="tab" href="#Dispatched" role="tab"
                                    aria-controls="contact" aria-selected="false">
                                    Dispatched</a>
                            </li>
                            <li class="nav-item1" id="Completed-title">
                                <a class="nav-link1" id="Completed-tab" data-toggle="tab" href="#Completed" role="tab"
                                    aria-controls="contact" aria-selected="false">
                                    Completed</a>
                            </li>
                            <li class="nav-item1" id="Invoiced-title">
                                <a class="nav-link1" id="Invoiced-tab" data-toggle="tab" href="#Invoiced" role="tab"
                                    aria-controls="contact" aria-selected="false">
                                    Invoiced</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="Delivered" role="tabpanel"
                                aria-labelledby="home-tab">

                            </div>
                            <div class="tab-pane fade" id="Break_down" role="tabpanel" aria-labelledby="profile-tab">

                            </div>
                            <div class="tab-pane fade" id="Loaded" role="tabpanel" aria-labelledby="contact-tab">

                            </div>
                            <div class="tab-pane fade" id="Arrived_Shipper" role="tabpanel"
                                aria-labelledby="Equipment-tab">

                            </div>
                            <div class="tab-pane fade" id="Arrived_Consignee" role="tabpanel"
                                aria-labelledby="Equipment-tab">

                            </div>
                            <div class="tab-pane fade" id="Paid" role="tabpanel" aria-labelledby="Equipment-tab">

                            </div>
                            <div class="tab-pane fade" id="Open" role="tabpanel" aria-labelledby="Equipment-tab">

                            </div>
                            <div class="tab-pane fade" id="On_Rout" role="tabpanel" aria-labelledby="Equipment-tab">

                            </div>
                            <div class="tab-pane fade" id="Dispatched" role="tabpanel" aria-labelledby="Equipment-tab">

                            </div>
                            <div class="tab-pane fade" id="Completed" role="tabpanel" aria-labelledby="Equipment-tab">

                            </div>
                            <div class="tab-pane fade" id="Invoiced" role="tabpanel" aria-labelledby="Equipment-tab">

                            </div>

                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
    <?php include 'header/footer.php' ?>

</html>