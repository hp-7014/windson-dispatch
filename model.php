<!DOCTYPE html>
<html lang="en">
<?php include 'header/header.php' ?>
<div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Modals Examples</h4>
                            <p class="sub-title">Modals are streamlined, but flexible
                                dialog prompts powered by JavaScript. They support a number of use cases
                                from user notification to completely custom content and feature a
                                handful of helpful subcomponents, sizes, and more.</p>
                <div class="row">
<!-----------------------------------------------------------Add Shipper--------------------------------------------------------------------->
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Admin</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#add_shipper">Add Shipper
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_shipper"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content custom-modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                                            Shipper</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>Shipper Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Company Name" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Address *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Address *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Location *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Enter a location"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Postal / Zip*</label>
                                                <div>
                                                    <input class="form-control" placeholder="Postal / Zip" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Contact Name</label>
                                                <div>
                                                    <input class="form-control" placeholder="Contact Name" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Contact Email</label>
                                                <div>
                                                    <input class="form-control" type="email"
                                                           value="bootstrap@example.com" id="example-email-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Telephone</label>
                                                <div>
                                                    <input class="form-control" type="text" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Ext</label>
                                                <div>
                                                    <input class="form-control" type="text" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Toll Free</label>
                                                <div>
                                                    <input class="form-control" placeholder="Toll Free" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Fax</label>
                                                <div>
                                                    <input class="form-control" placeholder="Fax" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Shipping Hours</label>
                                                <div>
                                                    <input class="form-control" placeholder="Shipping Hours" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>
                                                    Appointments</label>
                                                <select class="form-control">
                                                    <option>--select--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Major Intersection/Directions</label>
                                                <div>
                                                    <input class="form-control" type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Duplicate Info *</label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck1" data-parsley-multiple="groups"
                                                           data-parsley-mincheck="2">
                                                    <label class="custom-control-label" for="customCheck1">Add as
                                                        Consignee</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label>Status *</label>
                                                <div class="row">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                               id="defaultInline1" name="inlineDefaultRadiosExample"
                                                               checked>
                                                        <label class="custom-control-label"
                                                               for="defaultInline1">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                               id="defaultInline2" name="inlineDefaultRadiosExample">
                                                        <label class="custom-control-label" for="defaultInline2">Inactive</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Shipping Notes</label>
                                                <div>
                                                    <textarea rows="3" cols="30" class="form-control" type="textarea"
                                                              id="example-text-input"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Internal Notes</label>
                                                <div>
                                                    <textarea rows="3" cols="30" class="form-control" type="textarea"
                                                              id="example-text-input"></textarea>
                                                </div>
                                            </div>
                                        </div>

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
                    </div>
<!------------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------Add Consignee---------------------------------------------------------------------------------->
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Admin</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#add_consignee">Add Consignee
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_consignee"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content custom-modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                                            Consignee</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>Consignee Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Consignee Name "
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Address *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Address *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Location *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Enter a location"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Postal / Zip*</label>
                                                <div>
                                                    <input class="form-control" placeholder="Postal / Zip" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Contact Name</label>
                                                <div>
                                                    <input class="form-control" placeholder="Contact Name" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Contact Email</label>
                                                <div>
                                                    <input class="form-control" type="email"
                                                           value="bootstrap@example.com" id="example-email-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Telephone</label>
                                                <div>
                                                    <input class="form-control" type="text" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Ext</label>
                                                <div>
                                                    <input class="form-control" type="text" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Toll Free</label>
                                                <div>
                                                    <input class="form-control" placeholder="Toll Free" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Fax</label>
                                                <div>
                                                    <input class="form-control" placeholder="Fax" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Receiving Hours</label>
                                                <div>
                                                    <input class="form-control" placeholder="Receiving Hours"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>
                                                    Appointments</label>
                                                <select class="form-control">
                                                    <option>--select--</option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Major Intersection/Directions</label>
                                                <div>
                                                    <input class="form-control" type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Duplicate Info *</label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck1" data-parsley-multiple="groups"
                                                           data-parsley-mincheck="2">
                                                    <label class="custom-control-label" for="customCheck1">Add as
                                                        Consignee</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label>Status *</label>
                                                <div class="row">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                               id="defaultInline1" name="inlineDefaultRadiosExample"
                                                               checked>
                                                        <label class="custom-control-label"
                                                               for="defaultInline1">Active</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input"
                                                               id="defaultInline2" name="inlineDefaultRadiosExample">
                                                        <label class="custom-control-label" for="defaultInline2">Inactive</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Receiving Notes</label>
                                                <div>
                                                    <textarea rows="3" cols="30" class="form-control" type="textarea"
                                                              id="example-text-input"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-5">
                                                <label>Internal Notes</label>
                                                <div>
                                                    <textarea rows="3" cols="30" class="form-control" type="textarea"
                                                              id="example-text-input"></textarea>
                                                </div>
                                            </div>
                                        </div>

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
                    </div>
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------Add Customer------------------------------------------------------------------------------------>
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Admin</p>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#add_customer">Add Customer
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_customer"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content custom-modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                                            Customer</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                   role="tab" aria-controls="home"
                                                   aria-selected="true">Add Customer
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                   role="tab" aria-controls="profile"
                                                   aria-selected="false">Add Advance</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                 aria-labelledby="home-tab">
                                                <br>
                                                <form>
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label>Customer Name *</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Company Name"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Address *</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Address *"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Location *</label>
                                                            <div>
                                                                <input class="form-control"
                                                                       placeholder="Enter a location" type="text"
                                                                       id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Zip *</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Zip Code"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Billing Address</label>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="customCheck1" data-parsley-multiple="groups"
                                                                       data-parsley-mincheck="2">
                                                                <label class="custom-control-label" for="customCheck1">Same
                                                                    as Mailing Address</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Billing Address</label>
                                                            <div>
                                                                <input class="form-control"
                                                                       placeholder="Billing Address" type="text"
                                                                       id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Location </label>
                                                            <div>
                                                                <input class="form-control"
                                                                       placeholder="Enter a location" type="text"
                                                                       id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Zip </label>
                                                            <div>
                                                                <input class="form-control" placeholder="Zip Code"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Primary Contact</label>
                                                            <div>
                                                                <input class="form-control"
                                                                       placeholder="Primary Contact" type="text"
                                                                       id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Telephone</label>
                                                            <div>
                                                                <input class="form-control" type="text"
                                                                       id="example-tel-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-1">
                                                            <label>Ext</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Ext"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Email</label>
                                                            <div>
                                                                <input class="form-control" type="email"
                                                                       value="bootstrap@example.com"
                                                                       id="example-email-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Fax</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Fax"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Billing Contact</label>
                                                            <div>
                                                                <input class="form-control"
                                                                       placeholder="Billing Contact" type="text"
                                                                       id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Billing Email</label>
                                                            <div>
                                                                <input class="form-control" type="email"
                                                                       value="bootstrap@example.com"
                                                                       id="example-email-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2 ">
                                                            <label>Billing Telephone</label>
                                                            <div>
                                                                <input class="form-control" type="text"
                                                                       id="example-tel-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-1">
                                                            <label>Ext</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Ext"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Blacklisted</label>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="customCheck2" data-parsley-multiple="groups"
                                                                       data-parsley-mincheck="2">
                                                                <label class="custom-control-label" for="customCheck2">This
                                                                    Customer is Blacklisted</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Is Broker </label>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="customCheck3" data-parsley-multiple="groups"
                                                                       data-parsley-mincheck="2">
                                                                <label class="custom-control-label" for="customCheck3">This
                                                                    is a Broker</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Duplicate</label>
                                                            <div class="row">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                           id="customCheck7"
                                                                           data-parsley-multiple="groups"
                                                                           data-parsley-mincheck="2">
                                                                    <label class="custom-control-label"
                                                                           for="customCheck7">As a Shipper</label>
                                                                </div>&nbsp;&nbsp;
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                           id="customCheck8"
                                                                           data-parsley-multiple="groups"
                                                                           data-parsley-mincheck="2">
                                                                    <label class="custom-control-label"
                                                                           for="customCheck8">As a Consignee</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                                 aria-labelledby="profile-tab">
                                                <br>
                                                <form>
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label>Currency Setting *</label>
                                                            <select class="form-control">
                                                                <option>USD</option>
                                                                <option>USD</option>
                                                                <option>CAD</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Payment Terms*</label>
                                                            <select class="form-control">
                                                                <option>30 Days</option>
                                                                <option>abc</option>
                                                                <option>xyz</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Credit Limit $</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Credit Limit $"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Sales Rep</label>
                                                            <select class="form-control">
                                                                <option>Select</option>
                                                                <option>abc</option>
                                                                <option>xyz</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label>Factoring Company</label>
                                                            <select class="form-control">
                                                                <option>Select</option>
                                                                <option>abc</option>
                                                                <option>xyz</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Federal ID</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Federal ID"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Worker's Comp #</label>
                                                            <div>
                                                                <input class="form-control"
                                                                       placeholder="Worker's Comp # " type="text"
                                                                       id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Website URL</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Website URL"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label>Numbers on Invoice
                                                            </label>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="customCheck5" data-parsley-multiple="groups"
                                                                       data-parsley-mincheck="2">
                                                                <label class="custom-control-label" for="customCheck5">Show
                                                                    tel. and fax number on Invoice</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Customer Rate</label>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="customCheck6" data-parsley-multiple="groups"
                                                                       data-parsley-mincheck="2">
                                                                <label class="custom-control-label" for="customCheck6">Show
                                                                    detailed Rate on Invoice</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Internal Notes</label>
                                                            <div>
                                                                <textarea rows="3" cols="30" class="form-control"
                                                                          type="textarea"
                                                                          id="example-text-input"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
                    </div>
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------Add Driver---------------------------------------------------------------------------------->
<div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Admin</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#add_Driver">Add Driver
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_Driver"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content custom-modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Driver</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <label>Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Name "
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Username</label>
                                                <div>
                                                    <input class="form-control" placeholder="Username"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Password</label>
                                                <div>
                                                    <input class="form-control" placeholder="Password"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Telephone</label>
                                                <div>
                                                    <input class="form-control" type="text" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Alt - Tel#</label>
                                                <div>
                                                    <input class="form-control" type="text" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Email</label>
                                                <div>
                                                    <input class="form-control" type="email"
                                                           value="bootstrap@example.com" id="example-email-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Address *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Address *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Location *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Enter a location"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Zip</label>
                                                <div>
                                                    <input class="form-control" placeholder="Postal / Zip" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>
                                                Status</label>
                                                <select class="form-control">
                                                    <option>Active</option>
                                                    <option>Inactive</option>
                                                    <option>Not Available</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Social Security No</label>
                                                <div>
                                                    <input class="form-control" placeholder="Social Security No" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Date of Birth</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Date of Hire</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>License No.</label>
                                                <div>
                                                    <input class="form-control" placeholder="License No." type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>License Issue State</label>
                                                <div>
                                                    <input class="form-control" placeholder="License Issue State"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>License Exp. Date</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Last Medical</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Next Medical</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Last Drug Test</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Next Drug Test</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                            <label>Passport Expiry</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                            <label>Fast Card Expiry</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                            <label>Hazmat Expiry</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Mile</label>
                                                <div>
                                                    <input class="form-control" placeholder="Mile" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Flat</label>
                                                <div>
                                                    <input class="form-control" placeholder="Flat" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Stop</label>
                                                <div>
                                                    <input class="form-control" placeholder="Stop" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Tarp</label>
                                                <div>
                                                    <input class="form-control" placeholder="Tarp" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Percentage</label>
                                                <div>
                                                    <input class="form-control" placeholder="Percentage" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                            <label>Termination Date</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Internal Notes</label>
                                                <div>
                                                    <textarea rows="3" cols="30" class="form-control" type="textarea"
                                                              id="example-text-input"></textarea>
                                                </div>
                                            </div>
                                        </div>

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
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------->
                    <!-------------------------------------------- Add Truck---------------------------------------------------------------------------------->
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Admin</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#add_Truck"> Add Truck
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_Truck"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content custom-modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Truck</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label>Truck Number *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Truck Number *"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>
                                                    Truck Type</label>
                                                <select class="form-control">
                                                    <option>--Select--</option>
                                                    <option>Xyz</option>
                                                    <option>ABC</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>License Plate</label>
                                                <div>
                                                    <input class="form-control" placeholder="License Plate"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Plate Expiry</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Inspection Expiration</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>
                                                    Status</label>
                                                <select class="form-control">
                                                    <option>Active</option>
                                                    <option>Inactive</option>
                                                    <option>Not Available</option>
                                                </select>
                                            </div>

                                                <div class="form-group col-md-2">
                                                    <label>Ownership</label>
                                                    <div class="row">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input"
                                                                   id="ownership" name="inlineDefaultRadiosExample"
                                                            >
                                                            <label class="custom-control-label"
                                                                   for="ownership">Company Truck</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input"
                                                                   id="Own" name="inlineDefaultRadiosExample">
                                                            <label class="custom-control-label" for="Own">Owner Operator</label>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Mileage</label>
                                                <div>
                                                    <input class="form-control" placeholder="Mileage" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Axles</label>
                                                <div>
                                                    <input class="form-control" placeholder="Axles"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Year</label>
                                                <div>
                                                    <input class="form-control" placeholder="Year" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>
                                                    Fuel Type</label>
                                                <select class="form-control">
                                                    <option>gas</option>
                                                    <option>etc</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-2 ">
                                                <label>Start Date</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Deactivation Date</label>
                                                <div>
                                                    <input class="form-control" placeholder="Toll Free" type="date"
                                                           id="example-text-input">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>
                                                    Registered State *</label>
                                                <select class="form-control">
                                                    <option>LA</option>
                                                    <option>NY</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Insurance Policy #</label>
                                                <div>
                                                    <input class="form-control" placeholder="Insurance Policy #"
                                                           type="text" id="Insurance Policy#">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Empty / Gross Weight</label>
                                                <div>
                                                    <input class="form-control" type="text"  placeholder="Empty / Gross Weight" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>VIN #</label>
                                                <div>
                                                    <input class="form-control" type="text"  placeholder="VIN #" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>DOT Expiry Date</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Transponder</label>
                                                <div>
                                                    <input class="form-control" type="text"  placeholder="Transponder" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>IFTA Truck</label>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customCheck1" data-parsley-multiple="groups"
                                                           data-parsley-mincheck="2">
                                                    <label class="custom-control-label" for="customCheck1">Include this Truck for IFTA</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Internal Notes</label>
                                                <div>
                                                    <textarea rows="2" cols="30" class="form-control" type="textarea"
                                                              id="example-text-input"></textarea>
                                                </div>
                                            </div>

                                        </div>

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
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------->
                    <!-------------------------------------------- Add Trailer---------------------------------------------------------------------------------->
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Admin</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#add_Trailer"> Add Trailer
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_Trailer"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content custom-modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Truck</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                                <label>Trailer Number *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Trailer Number *"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>
                                                    Trailer Type</label>
                                                <select class="form-control">
                                                    <option>--Select--</option>
                                                    <option>Xyz</option>
                                                    <option>ABC</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>License Plate</label>
                                                <div>
                                                    <input class="form-control" placeholder="License Plate"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Plate Expiry</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Inspection Expiration</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>
                                                    Status</label>
                                                <select class="form-control">
                                                    <option>Active</option>
                                                    <option>Inactive</option>
                                                    <option>Not Available</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-2">
                                                <label>Model</label>
                                                <div>
                                                    <input class="form-control" placeholder="Model" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Year</label>
                                                <div>
                                                    <input class="form-control" placeholder="Year" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Axles</label>
                                                <div>
                                                    <input class="form-control" placeholder="Axles"
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>
                                                    Registered State *</label>
                                                <select class="form-control">
                                                    <option>LA</option>
                                                    <option>NY</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>VIN #</label>
                                                <div>
                                                    <input class="form-control" type="text"  placeholder="VIN #" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>DOT Expiry Date</label>
                                                <div>
                                                    <input class="form-control" type="date" id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2 ">
                                                <label>Activation Date</label>
                                                <div>
                                                    <input class="form-control" type="date"  id="example-tel-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Internal Notes</label>
                                                <div>
                                                    <textarea rows="2" cols="30" class="form-control" type="textarea"
                                                              id="example-text-input"></textarea>
                                                </div>
                                            </div>

                                        </div>

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
                    </div>
                    <!----------------------------------------------------------------------------------------------------------------------------------------->
                    <!------------------------------------------Add External Carrier------------------------------------------------------------------------------------>
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Admin</p>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Add_External_Carrier">Add External Carrier
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="Add_External_Carrier"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content custom-modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add External Carrier</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#External_Carrier"
                                                   role="tab" aria-controls="home"
                                                   aria-selected="true">Add External Carrier
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Add_Insurance"
                                                   role="tab" aria-controls="profile"
                                                   aria-selected="false">Add Insurance</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab"
                                                   href="#Add_Accounting" role="tab" aria-controls="contact"
                                                   aria-selected="false">Credit Card Category</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="External_Carrier" role="tabpanel"
                                                 aria-labelledby="home-tab">
                                                <br>
                                                <form>
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label>Name *</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Name"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Address *</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Address *"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Location *</label>
                                                            <div>
                                                                <input class="form-control"
                                                                       placeholder="Enter a location" type="text"
                                                                       id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Zip *</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Zip Code"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Contact Name</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Zip Code"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Email</label>
                                                            <div>
                                                                <input class="form-control" type="email"
                                                                       value="bootstrap@example.com"
                                                                       id="example-email-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Telephone</label>
                                                            <div>
                                                                <input class="form-control" type="text"
                                                                       id="example-tel-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-1">
                                                            <label>Ext</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Ext"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Toll Free</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Toll Free"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Fax</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Fax"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Payment Terms</label>
                                                            <select class="form-control">
                                                                <option>xyz</option>
                                                                <option>abc</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Tax ID *</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Tax ID *"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>M.C. #: *</label>
                                                            <div>
                                                                <input class="form-control" placeholder="M.C. #: *"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>D.O.T. *</label>
                                                            <div>
                                                                <input class="form-control" placeholder="D.O.T. *"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Factoring Company</label>
                                                            <select class="form-control">
                                                                <option>xyz</option>
                                                                <option>abc</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Internal Notes</label>
                                                            <div>
                                                                <textarea rows="1" cols="30" class="form-control"
                                                                          type="textarea"
                                                                          id="example-text-input"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Blacklisted *</label>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="custom2" data-parsley-multiple="groups"
                                                                       data-parsley-mincheck="2">
                                                                <label class="custom-control-label" for="custom2">This
                                                                    Carrier is Blacklisted</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Coporation * </label>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="custom3" data-parsley-multiple="groups"
                                                                       data-parsley-mincheck="2">
                                                                <label class="custom-control-label" for="custom3">This
                                                                    carrier is a corporation</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="tab-pane fade" id="Add_Insurance" role="tabpanel"
                                                 aria-labelledby="profile-tab">
                                                <br>
                                                <form>
                                                    <div class="row">
                                                        <div class="form-group col-md-3">
                                                            <label>Liablity Company</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Liablity Company"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Policy #</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Policy #"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Exp. Date</label>
                                                            <div>
                                                                <input class="form-control"
                                                                       type="date" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Telephone *</label>
                                                            <div>
                                                                <input class="form-control"
                                                                       placeholder="Telephone *" type="text"
                                                                       id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-1">
                                                            <label>Ext</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Ext"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Contact Name</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Zip Code"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Liability ($)</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Liability ($)"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Internal Notes</label>
                                                            <div>
                                                                <textarea rows="1" cols="30" class="form-control"
                                                                          type="textarea"
                                                                          id="example-text-input"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label></label>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input"
                                                                       id="customCheck5" data-parsley-multiple="groups"
                                                                       data-parsley-mincheck="2">
                                                                <label class="custom-control-label" for="customCheck5">Same as Liability Company</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Auto Insurance Company</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Auto Insurance Company"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Cargo Company</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Cargo Company"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Policy #</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Policy #"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Exp. Date</label>
                                                            <div>
                                                                <input class="form-control"
                                                                       type="date" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Telephone *</label>
                                                            <div>
                                                                <input class="form-control"
                                                                       placeholder="Telephone *" type="text"
                                                                       id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-1">
                                                            <label>Ext</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Ext"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Cargo Insurance ($)</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Cargo Insurance ($)"
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Internal Notes</label>
                                                            <div>
                                                                <textarea rows="1" cols="30" class="form-control"
                                                                          type="textarea"
                                                                          id="example-text-input"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>WSIB # </label>
                                                            <div>
                                                                <input class="form-control" placeholder="WSIB # "
                                                                       type="text" id="example-text-input">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    </div>
                                                </form>
                                            </div>

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
                    </div>
                    <!-------------------------------------------------------------------------------------------------------------------------------------------->

                    <!-----------------------------------------ADD BANK------------------------------------------------------------------------------------------->
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Master</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#add_bank">Add Bank
                            </button>
                        </div>


                        <!--  Modal content for the above example -->
                        <div id="add_bank" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                                            Bank</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                   href="#Bank_Debit_Category" role="tab" aria-controls="home"
                                                   aria-selected="true">Debit Category </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                   href="#Bank_Credit_Category" role="tab" aria-controls="profile"
                                                   aria-selected="false">Credit Category</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab"
                                                   href="#Credit_Card_Category" role="tab" aria-controls="contact"

                                                   aria-selected="false">Credit Card</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Bank_Debit_Category"
                                                 role="tabpanel" aria-labelledby="home-tab">
                                                <br>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card m-b-30">
                                                            <div class="card-body">

                                                                <button type="button"
                                                                        class="btn btn-primary waves-effect waves-light mt-0 header-title"
                                                                        data-toggle="modal"
                                                                        data-target="#Add_Bank_Debit_Category">Add
                                                                </button>
                                                                <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
                                                                <table id="mainTable"
                                                                       class="table table-striped mb-0 table-editable">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>No</th>
                                                                        <th>Name</th>
                                                                        <th>Delete</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>Car</td>
                                                                        <td><i class="mdi mdi-delete-sweep-outline"
                                                                               style="font-size: 20px; color: #FC3B3B""></i>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>Bike</td>
                                                                        <td><i class="mdi mdi-delete-sweep-outline"
                                                                               style="font-size: 20px; color: #FC3B3B""></i>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>Plane</td>
                                                                        <td><i class="mdi mdi-delete-sweep-outline"
                                                                               style="font-size: 20px; color: #FC3B3B""></i>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>Yacht</td>
                                                                        <td><i class="mdi mdi-delete-sweep-outline"
                                                                               style="font-size: 20px; color: #FC3B3B""></i>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>Segway</td>
                                                                        <td><i class="mdi mdi-delete-sweep-outline"
                                                                               style="font-size: 20px; color: #FC3B3B"></i>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->

                                            </div>
                                            <div class="tab-pane fade" id="Bank_Credit_Category" role="tabpanel"
                                                 aria-labelledby="profile-tab">
                                                <br>
                                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                                        data-toggle="modal" data-target="#Credit_Category">Add
                                                </button>
                                                <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
                                            </div>
                                            <div class="tab-pane fade" id="Credit_Card_Category" role="tabpanel"
                                                 aria-labelledby="contact-tab">
                                                <br>
                                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                                        data-toggle="modal" data-target="#Category">Add
                                                </button>
                                                <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
                                            </div>
                                        </div>
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
                    </div>
<!------------------------------------------------------------------------------------------------------------------------------------>

<!----------------------------------Add Bank Debit Category--------------------------------------------------------------------------->
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="Add_Bank_Debit_Category" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #2A3988;">
                                    <h5 class="modal-title mt-0" style="color: white;">Bank Debit Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-md-12">
                                        <label>Name *</label>
                                        <div>
                                            <input class="form-control" placeholder="Name" type="text"
                                                   id="example-text-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Save</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
<!-------------------------------------------------------------------------------------------------------------------------------------->

<!----------------------------------Add Bank Credit Category---------------------------------------------------------------------------->
                    <div class="modal fade bs-example-modal-center" tabindex="-1" id="Credit_Category" role="dialog"
                         aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #2A3988;">
                                    <h5 class="modal-title mt-0" style="color: white;">Bank Credit Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-md-12">
                                        <label>Name *</label>
                                        <div>
                                            <input class="form-control" placeholder="Name" type="text"
                                                   id="example-text-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Save</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
<!------------------------------------------------------------------------------------------------------------------------------------------>

<!----------------------------------Credit Card Category------------------------------------------------------------------------------------>
                    <div class="modal fade bs-example-modal-center" tabindex="-1" id="Category" role="dialog"
                         aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #2A3988;">
                                    <h5 class="modal-title mt-0" style="color: white;">Credit Card Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group col-md-12">
                                        <label>Name *</label>
                                        <div>
                                            <input class="form-control" placeholder="Name" type="text"
                                                   id="example-text-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-primary waves-effect waves-light">Save</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal --> 
<!------------------------------------------------------------------------------------------------------------------------------------------>

<!-----------------------------------------------Company------------------------------------------------------------------------------------>
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Master</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#company">Company
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="company"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content custom-modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add company</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                    <div class="modal-body custom-modal-body">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#add_company">Add
                                    </button>
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
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
                    </div>
<!-----------------------------------------------Add Company-------------------------------------------------->
                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="add_company"
                             aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2A3988;">
                                        <h5 class="modal-title mt-0" style="color: white;">Add Company</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Company Name" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Shipping Address *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Shipping Address "
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Telephone No</label>
                                                <div>
                                                    <input class="form-control" placeholder="Telephone No" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Fax No</label>
                                                <div>
                                                    <input class="form-control" placeholder="Fax No" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>M.C. No.: *</label>
                                                <div>
                                                    <input class="form-control" placeholder="M.C. No.: *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>US DOT No.: *</label>
                                                <div>
                                                    <input class="form-control" placeholder="US DOT No.: *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Mailing Address: * </label>
                                                <div>
                                                    <input class="form-control" placeholder="Mailing Address: * "
                                                           type="text" id="example-text-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
<!----------------------------------------------------------------------------------------------------------->
<!-------------------------------------------Currency Setting-------------------------------------------->
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Master</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Currency_Setting">Currency
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div id="Currency_Setting" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Currency Setting</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                    <div class="modal-body custom-modal-body">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#center">Add
                                    </button>
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
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
                    </div>
<!-------------------------------------------Add Currency Setting-------------------------------------------->
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="center" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2A3988;">
                                        <h5 class="modal-title mt-0" style="color: white;">Add Currency</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Name *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                Save
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-----------------------------------------Payment Terms-------------------------------------------------------------------------------->
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Master</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Payment_Terms">Payment Terms
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div id="Payment_Terms" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Payment Terms</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                    <div class="modal-body custom-modal-body">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Add_Payment_Terms">Add
                            </button>
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
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
                    </div>

<!-----------------------------------------Add Payment Terms-------------------------------------------------------------------------------->
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="Add_Payment_Terms" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2A3988;">
                                        <h5 class="modal-title mt-0" style="color: white;">Payment Terms</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Name *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                Save
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
<!------------------------------------------------------------------------------------------------------------>
<!-----------------------------------------Office------------------------------------------------------------->
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Master</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Office">Office
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div id="Office" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Office</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Add_Office">Add
                                    </button>
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
                           
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
                    </div>

<!-----------------------------------------Add Office--------------------------------------------------------->
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="Add_Office" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2A3988;">
                                        <h5 class="modal-title mt-0" style="color: white;">Add Office</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Name *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Location *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Location *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                Save
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
<!------------------------------------------------------------------------------------------------------------------------------------------>
<!--------------------------------------------Equipment Type-------------------------------------------------------------------------------->
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Master</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Equipment_Type">Equipment Type
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div id="Equipment_Type" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Equipment Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Add_Equipment_Type">Add
                                    </button>
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
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
                    </div>
<!--------------------------------------------Add Equipment Type--------------------------------------------------------------------------->
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="Add_Equipment_Type" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2A3988;">
                                        <h5 class="modal-title mt-0" style="color: white;">Equipment Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Name *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                Save
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
<!-------------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------Truck Type---------------------------------------------------------------------------->
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Master</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Truck_Type">Truck Type
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div id="Truck_Type" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Truck Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>

                                    </div>
                                    <div class="modal-body custom-modal-body">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Add_Truck_Type">Add
                                    </button>
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
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
                    </div>
<!-------------------------------------Add Truck Type-------------------------------------------------------------------------------------->
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="Add_Truck_Type" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2A3988;">
                                        <h5 class="modal-title mt-0" style="color: white;">Truck  Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Name *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                Save
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
<!------------------------------------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------Trailer Type------------------------------------------------------------------------------->
                        <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Master</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Trailer_Type">Trailer Type
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                            <div id="Trailer_Type" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Trailer Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Add_Trailer_Type">Add
                            </button>
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
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

<!----------------------------------------------Add Trailer Type-------------------------------------------------------------------------->
                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="Add_Trailer_Type" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2A3988;">
                                        <h5 class="modal-title mt-0" style="color: white;">Trailer Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Name *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                Save
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                    </div>
<!----------------------------------------------------------------------------------------------------------------------------------------------->
<!-----------------------------------------------------------Status Type-------------------------------------------------------------------------->
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Master</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Status_Type">Status Type
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div id="Status_Type" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Status Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Add_Status_Type">Add 
                                    </button>
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
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
                    </div>
 <!-----------------------------------------------------------------------Add Status Type-------------------------------------------------------------------------->
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="Add_Status_Type" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2A3988;">
                                        <h5 class="modal-title mt-0" style="color: white;">Add Status Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Name *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Color *</label>
                                                <div>
                                                    <input class="form-control" type="color" value="#30419b" id="example-color-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                Save
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
<!------------------------------------------------------------------------------------------------------------------------------------------------>
<!-----------------------------------------------------------------------Active Load Type-------------------------------------------------------------------------->
                     <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Master</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Load_Type">Load Type
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                         <div id="Load_Type" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-scrollable">
                                 <div class="modal-content">
                                     <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Active Load Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                            data-target="#Active_Load_Type">Add</button>
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
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
                    </div>
<!-----------------------------------------------------------------------Add Active Load Type-------------------------------------------------------------------------->
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="Active_Load_Type" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2A3988;">
                                        <h5 class="modal-title mt-0" style="color: white;">Active Load Type</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Name *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>
                                                    Unit # *</label>
                                                <select class="form-control">
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                Save
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div> 
<!------------------------------------------------------------------------------------------------------------------------------------------------>
<!---------------------------------------------------------------------------Fix Pay Category--------------------------------------------------------------------->
                    <div class="col-sm-6 col-md-3 m-t-30">
                        <div class="text-center">
                            <p class="text-muted">Master</p>
                            <!-- Large modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Fix_Pay">Fix Pay Category
                            </button>
                        </div>
                        <!--  Modal content for the above example -->
                        <div id="Fix_Pay" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header custom-modal-header">
                                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Fix Pay Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                    data-target="#Fix_Pay_Category">Add
                                    </button>
                                        <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV FORMATE</button>
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
                    </div>
<!----------------------------------------------------------------------- Add Fix Pay Category-------------------------------------------------------------------->
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="Fix_Pay_Category" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                    <div class="modal-header" style="background-color: #2A3988;">
                                        <h5 class="modal-title mt-0" style="color: white;">Fix Pay Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label>Name *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Name *" type="text"
                                                           id="example-text-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger waves-effect"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light">
                                                Save
                                            </button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
<!------------------------------------------------------------------------------------------------------------------------------------------>  
</div> <!-- end row -->
                        </div>
                    </div>
                </div>
            </div><!-- end row -->

<?php include 'header/footer.php' ?>

</html>
