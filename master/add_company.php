<?php session_start();
require "../database/connection.php";?>
<!------------------------------------------Company------------------------------------------------------------------------------------>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="company_modal"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="company-container" style="z-index: 1800"></div>
                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="modal"
                        data-target="#" id="AddCompany"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                        onclick="importCompany()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" accept=".csv" onchange='triggerValidation(this)' />
                    </div>
                    <a class="btn btn-outline-success waves-effect waves-light float-right"
                        href="download_csv_file.php?file=company.csv" style="margin-bottom: 5px;">CSV formate</a>
                </form>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="company_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="30">No</th>
                                        <th scope="col" col width="70">Company Name</th>
                                        <th scope="col" col width="70">Shipping Address</th>
                                        <th scope="col" col width="70">Telephone No</th>
                                        <th scope="col" col width="70">Fax No</th>
                                        <th scope="col" col width="70">M.C. No.</th>
                                        <th scope="col" col width="70">US DOT No.</th>
                                        <th scope="col" col width="70">Mailing Address</th>
                                        <th scope="col" col width="70">Factoring Company</th>
                                        <th scope="col" col width="40">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="companyBody">
                                    <?php
                                    require 'model/Company.php';
                                    $company = new Company();
                                    $show_data = $db->company->find(['companyID' => $_SESSION['companyId']]);
                                    $i = 1;
                                    foreach ($show_data as $show) {
                                        $sh = $show['company'];
                                        foreach ($sh as $s) {
                                            $id = $s['_id'];
                                            $counter = $s['counter'];
                                            $factoringid = $s['factoringCompany'];
                                            $companyName = "'".$s['companyName']."'";
                                            $shippingAddress = "'".$s['shippingAddress']."'";
                                            $telephoneNo = "'".$s['telephoneNo']."'";
                                            $faxNo = "'".$s['faxNo']."'";
                                            $mcNo = "'".$s['mcNo']."'";
                                            $usDotNo = "'".$s['usDotNo']."'";
                                            $mailingAddress = "'".$s['mailingAddress']."'";
                                            $factoringCompany = "'".$s['factoringCompany']."'";
                                            // $factoringCompanyAddress = "'".$s['factoringCompanyAddress']."'";

                                            $pencilid1 = "'"."companynmPencil$i"."'";
                                            $pencilid2 = "'"."shippingAddressPencil$i"."'";
                                            $pencilid3 = "'"."telephoneNoPencil$i"."'";
                                            $pencilid4 = "'"."faxNoPencil$i"."'";
                                            $pencilid5 = "'"."mcNoPencil$i"."'";
                                            $pencilid6 = "'"."usDotNoPencil$i"."'";
                                            $pencilid7 = "'"."mailingAddressPencil$i"."'";
                                            $pencilid8 = "'"."factoringCompanyPencil$i"."'";
                                            // $pencilid9 = "'"."factoringCompanyAddressPencil$i"."'";
                                ?>
                                    <tr>
                                        <th><?php echo $i++; ?></th>
                                        <td class="custom-text" id="<?php echo "companyName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('companynmPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('companynmPencil$i'); "?>">
                                            <i id="<?php echo "companynmPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $companyName; ?>,'updateCompany','text',<?php echo $s['_id']; ?>,'companyName','Company Name',<?php echo $pencilid1; ?>)"></i>
                                            <?php echo $s['companyName']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "shippingAddress".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('shippingAddressPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('shippingAddressPencil$i'); "?>">
                                            <i id="<?php echo "shippingAddressPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $shippingAddress; ?>,'updateCompany','text',<?php echo $s['_id']; ?>,'shippingAddress','shipping Address',<?php echo $pencilid2; ?>)"></i>
                                            <?php echo $s['shippingAddress']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "telephoneNo".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('telephoneNoPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('telephoneNoPencil$i'); "?>">
                                            <i id="<?php echo "telephoneNoPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $telephoneNo; ?>,'updateCompany','text',<?php echo $s['_id']; ?>,'telephoneNo','Telephone No.',<?php echo $pencilid3; ?>)"></i>
                                            <?php echo $s['telephoneNo']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "faxNo".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('faxNoPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('faxNoPencil$i'); "?>">
                                            <i id="<?php echo "faxNoPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $faxNo; ?>,'updateCompany','text',<?php echo $s['_id']; ?>,'faxNo','Fax No.',<?php echo $pencilid4; ?>)"></i>
                                            <?php echo $s['faxNo']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "mcNo".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('mcNoPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('mcNoPencil$i'); "?>">
                                            <i id="<?php echo "mcNoPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $mcNo; ?>,'updateCompany','text',<?php echo $s['_id']; ?>,'mcNo','MC No.',<?php echo $pencilid5; ?>)"></i>
                                            <?php echo $s['mcNo']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "usDotNo".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('usDotNoPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('usDotNoPencil$i'); "?>">
                                            <i id="<?php echo "usDotNoPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $usDotNo; ?>,'updateCompany','text',<?php echo $s['_id']; ?>,'usDotNo','US DOT No.',<?php echo $pencilid6; ?>)"></i>
                                            <?php echo $s['usDotNo']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "mailingAddress".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('mailingAddressPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('mailingAddressPencil$i'); "?>">
                                            <i id="<?php echo "mailingAddressPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $mailingAddress; ?>,'updateCompany','text',<?php echo $s['_id']; ?>,'mailingAddress','Mailing Address.',<?php echo $pencilid7; ?>)"></i>
                                            <?php echo $s['mailingAddress']; ?>
                                        </td>
                                        <td class="custom-text">
                                            <?php echo $s['factoringCompany']; ?>
                                        </td>
                                        <td>
                                            <?php if($counter == 0) { ?>
                                            <a href="#"
                                                onclick="deleteCompany(<?php echo $s['_id']; ?>,<?php echo $factoringid; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></i></a>
                                            <?php } else { ?>
                                            <a href="#" disabled onclick="deleteCurrencyError()"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #adb5bd"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php }
                                    }
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Company Name</th>
                                        <th>Shipping Address</th>
                                        <th>Telephone No</th>
                                        <th>Fax No</th>
                                        <th>M.C. No.</th>
                                        <th>US DOT No.</th>
                                        <th>Mailing Address</th>
                                        <th>Factoring Company</th>
                                        <!-- <th><marquee width="140px" direction="left" height="17px" scrollamount="1">Factoring Company Address</marquee></th> -->
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal-footer">
                <span class="mandatory">Note: CSV files must contain atmost 1000 rows at a
                    time.</span>
                <button type="button" onclick="exportCompany()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->