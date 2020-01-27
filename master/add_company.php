<?php session_start();
require "../database/connection.php";?>
<!------------------------------------------Company------------------------------------------------------------------------------------>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="company_modal"
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
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal"
                                            data-target="#add_company">Add
                                    </button>
                                    <input type="submit" name="submit" onclick="importCompany()"
                                           class="btn btn-outline-info waves-effect waves-light float-right"
                                           value="Upload"/>
                                    <div class="custom-upload-btn-wrapper float-right">
                                        <button class="custom-btn">Choose file</button>
                                        <input type="file" name="file" id="file" accept=".csv"/>
                                    </div>
                                    <button type="button"
                                            class="btn btn-outline-success waves-effect waves-light float-right">CSV
                                        formate
                                    </button>
                                </form>
                                <br>
                                <table id="mainTable"
                                       class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company Name</th>
                                        <th>Shipping Address</th>
                                        <th>Telephone No</th>
                                        <th>Fax No</th>
                                        <th>M.C. No.</th>
                                        <th>US DOT No.</th>
                                        <th>Mailing Address</th>
                                        <th>Factoring Company</th>
                                        <th>Factoring Company Address</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require 'model/Company.php';
                                    $company = new Company();
                                    $show_data = $db->company->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    foreach ($show_data as $show) {
                                        $sh = $show['company'];
                                        foreach ($sh as $s) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCompany(this,'companyName',<?php echo $s['_id']; ?>)"><?php echo $s['companyName']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCompany(this,'shippingAddress',<?php echo $s['_id']; ?>)"><?php echo $s['shippingAddress']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCompany(this,'telephoneNo',<?php echo $s['_id']; ?>)"><?php echo $s['telephoneNo']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCompany(this,'faxNo',<?php echo $s['_id']; ?>)"><?php echo $s['faxNo']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCompany(this,'mcNo',<?php echo $s['_id']; ?>)"><?php echo $s['mcNo']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCompany(this,'usDotNo',<?php echo $s['_id']; ?>)"><?php echo $s['usDotNo']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCompany(this,'mailingAddress',<?php echo $s['_id']; ?>)"><?php echo $s['mailingAddress']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCompany(this,'factoringCompany',<?php echo $s['_id']; ?>)"><?php echo $s['factoringCompany']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateCompany(this,'factoringCompanyAddress',<?php echo $s['_id']; ?>)"><?php echo $s['factoringCompanyAddress']; ?></td>
                                                <td><a href="#" onclick="deleteCompany(<?php echo $s['_id']; ?>)"><i
                                                                class="mdi mdi-delete-sweep-outline"
                                                                style="font-size: 20px; color: #FC3B3B"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div>
            <div class="modal-footer">
                <button type="button" onclick="exportCompany()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
                    <button type="button" class="btn btn-danger waves-effect"
                            data-dismiss="modal">Close
                    </button>
                    <input type="submit" onclick="addCompany()" name="submit"
                           class="btn btn-primary waves-effect waves-light" value="Save"/>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->