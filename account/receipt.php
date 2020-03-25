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
                data-target="#Receipt_Registration">Receipt Registration
            </button>
        </div>
        <!--  Modal content for the above example -->
        <div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Receipt_Registration"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xxl modal-dialog-scrollable">
                <div class="modal-content custom-modal-content">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Receipt Registration</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                        <button class="btn btn-primary float-left" data-toggle="modal" data-target="#Add_Receipt"
                            style="margin-right:8px;"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item1 show" id="home-title">
                                <a class="nav-link1 active" id="home-tab" data-toggle="tab" href="#Receipt" role="tab"
                                    aria-controls="home" aria-selected="true">Receipt</a>
                            </li>
                            <li class="nav-item1" id="Receipt-title">
                                <a class="nav-link1" id="Receipt-tab" data-toggle="tab" href="#other_Receipt" role="tab"
                                    aria-controls="profile" aria-selected="false">Other</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="Receipt" role="tabpanel"
                                aria-labelledby="home-tab">

                            </div>
                            <div class="tab-pane fade" id="other_Receipt" role="tabpanel" aria-labelledby="profile-tab">

                            </div>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!------------------------------------------------------------------------------------------------------------------------------>
        <!--  Modal content for the above example -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="Add_Receipt"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content custom-modal-content">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Receipt</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Company Name *</label>
                                <select class="form-control">
                                    <option>xyz</option>
                                    <option>abc</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Bank Name*</label>
                                <select class="form-control">
                                    <option>xyz</option>
                                    <option>abc</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Receipt Type</label>
                                <select class="form-control" id='receipt'>
                                    <option value='0'>--select--</option>
                                    <option value='1'>Receipt</option>
                                    <option value='2'>Other</option>
                                </select>
                            </div>
                            <!--Receipt-->
                            <div class="form-group col-md-2 receipt" style="display:none;">
                                <label>Customer</label>
                                <div>
                                    <input class="form-control" placeholder="Customer" type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-2 receipt" style="display:none;">
                                <label>Credit Category</label>
                                <select class="form-control">
                                    <option>xyz</option>
                                    <option>abc</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 receipt" style="display:none;">
                                <div class="dropdown" style="padding-top:24px;">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"
                                        style="padding-left:30px;padding-right:30px;">Invoice #&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class=" caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li class="check"><a href="#"><input type=checkbox>HTML</a></li>
                                        <li class="check"><a href="#"><input type=checkbox>CSS</a></li>
                                        <li class="check"><a href="#"><input type=checkbox>JavaScript</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="form-group col-md-2 receipt" style="display:none;">
                                <label>Amount *</label>
                                <div>
                                    <input class="form-control" placeholder="Amount *" type="text">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline1"
                                        name="inlineDefaultRadiosExample" checked onclick="Showcheque()" />
                                    <label class="custom-control-label" for="defaultInline1">Cheque</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="defaultInline2"
                                        name="inlineDefaultRadiosExample" onclick="Showach()">
                                    <label class="custom-control-label" for="defaultInline2">ACH</label>
                                </div>
                            </div>
                            <div class="form-group col-md-2 cheque">
                                <label>Cheque #</label>
                                <div>
                                    <input class=" form-control" placeholder="Cheque #" type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-2 ach" style="display:none;">
                                <label>ACH #*</label>
                                <div>
                                    <input class="form-control" placeholder="ACH #*" type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-2 receipt" style="display:none;">
                                <label>Due Charge</label>
                                <div>
                                    <input class="form-control" placeholder="Due Charge" type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-2 receipt" style="display:none;">
                                <label>Final Amount *</label>
                                <div>
                                    <input class="form-control" placeholder="Final Amount *" type="text">
                                </div>
                            </div>
                            <!-- other -->
                            <div class="form-group col-md-2 other" style="display:none;">
                                <label>Depositor's Name</label>
                                <div>
                                    <input class="form-control" placeholder="Depositor's Name" type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-2 other" style="display:none;">
                                <label>Credit Category</label>
                                <select class="form-control">
                                    <option>xyz</option>
                                    <option>abc</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 other" style="display:none;">
                                <label>Amount *</label>
                                <div>
                                    <input class="form-control" placeholder="Amount *" type="text">
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <div class="upload-button">
                                    <label>Upload Files</label>
                                    <button class="button">Upload a file</button>
                                    <input type="file" name="myfile" />
                                </div>
                                <div class="form-group col-md-10">
                                    <label>Memo *</label>
                                    <div>
                                        <textarea class="form-control" rows="1" placeholder="Memo *"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect waves-light">ADD
                        </button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>
<?php include 'header/footer.php' ?>

</html>