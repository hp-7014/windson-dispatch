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