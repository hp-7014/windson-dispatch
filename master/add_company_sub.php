<?php
session_start();
include '../database/connection.php';
?>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="add_company"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">

    <div class="factoring-container" style="z-index: 1600"></div>

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add Company</h5>
                <button type="button" class="close modalCompany" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label> Company Name <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Company Name" id="companyName" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Shipping Address </label>
                        <div>
                            <input class="form-control" placeholder="Shipping Address " type="text"
                                id="shippingAddress">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Telephone No <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Telephone No" type="text" id="telephoneNo">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fax No</label>
                        <div>
                            <input class="form-control" placeholder="Fax No" type="text" id="faxNo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>M.C. No.: </label>
                        <div>
                            <input class="form-control" placeholder="M.C. No.: " type="text" id="mcNo">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>US DOT No.: </label>
                        <div>
                            <input class="form-control" placeholder="US DOT No.: " type="text" id="usDotNo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Mailing Address: <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Mailing Address * " type="text"
                                id="mailingAddress">
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Factoring Company: </label> <i class="mdi mdi-plus-circle plus"
                            title="Add Factoring Company" id="AddFactoring"></i>
                        <div>
                            <input list="searchFactoring" class="form-control" placeholder="--select--"
                                id="factoringCompany" name="factoringCompany">
                            <datalist id="searchFactoring">
                                <?php
                                $show_carrier = $db->factoring_company_add->find(['companyID' => $_SESSION['companyId']]);
                                foreach ($show_carrier as $carrier) {
                                    foreach ($carrier['factoring'] as $scar) {
                                        $factoring = $scar['factoringCompanyname'];
                                        $fact = "$factoring";
                                        ?>
                                <option value="<?php echo $scar['_id'] . ") " . $fact; ?>"></option>
                                <?php
                                    }
                                }
                                ?>
                            </datalist>
                        </div>
                    </div>
                    <!--                    <div class="form-group col-md-6">-->
                    <!--                        <label>Factoring Company Address: </label>-->
                    <!--                        <div>-->
                    <!--                            <input class="form-control" placeholder="Factoring Company Address: "-->
                    <!--                                   type="text" id="factoringCompanyAddress">-->
                    <!--                            <input type="hidden" id="companyId" value="-->
                    <?php //echo $_SESSION['companyId']; ?>
                    <!--">-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                </div>

                <div class="modal-footer">
                    <label class="text-danger" style="padding-right: 120px"><b>Note :</b>&nbsp; * Fields are
                        mandatory</label>
                    <button type="button" class="btn btn-danger modalCompany">Close</button>
                    <input type="submit" onclick="addCompany()" name="submit"
                        class="btn btn-primary waves-effect waves-light" value="Save" />
                    <span class="spinner-border spinner-border-sm loader1"></span>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->