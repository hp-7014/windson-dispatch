<?php
?>

<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="add_company"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add Company</h5>
                <button type="button" class="close modalCompany"   aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label> Company Name *</label>
                        <div>
                            <input class="form-control" placeholder="Company Name" id="companyName" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Shipping Address </label>
                        <div>
                            <input class="form-control" placeholder="Shipping Address "
                                   type="text" id="shippingAddress">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Telephone No *</label>
                        <div>
                            <input class="form-control" placeholder="Telephone No" type="text"
                                   id="telephoneNo">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fax No</label>
                        <div>
                            <input class="form-control" placeholder="Fax No" type="text"
                                   id="faxNo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>M.C. No.: </label>
                        <div>
                            <input class="form-control" placeholder="M.C. No.: " type="text"
                                   id="mcNo">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>US DOT No.: </label>
                        <div>
                            <input class="form-control" placeholder="US DOT No.: " type="text"
                                   id="usDotNo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Mailing Address: * </label>
                        <div>
                            <input class="form-control" placeholder="Mailing Address: * "
                                   type="text" id="mailingAddress">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Factoring Company: </label>
                        <div>
                            <input class="form-control" placeholder="Factoring Company: "
                                   type="text" id="factoringCompany">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Factoring Company Address: </label>
                        <div>
                            <input class="form-control" placeholder="Factoring Company Address: "
                                   type="text" id="factoringCompanyAddress">
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger modalCompany">Close</button>
                    <input type="submit" onclick="addCompany()" name="submit"
                           class="btn btn-primary waves-effect waves-light" value="Save"/>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->