<?php
session_start();
require "../database/connection.php";
?>

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Driver" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Driver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="driver-container" style="z-index: 1400"></div>
                <div class="driverEdit-container" style="z-index: 1600"></div>
                <div class="owneroperator-container" style="z-index: 1600"></div>

                <form action="" method="post" enctype="multipart/form-data">
                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text"
                        onkeyup="search_driver(this)" id="search" placeholder="search" style="margin-left: 5px;">
                    <input type="hidden" id="getnewaa" name="getnewaa" value="2">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                        id="AddDriver"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                </form>
                <br>
                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="driver_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">#</th>
                                        <th scope="col" col width="160">Name</th>
                                        <th scope="col" col width="160">Email</th>
                                        <th scope="col" col width="160">Location</th>
                                        <th scope="col" col width="160">Social Security No</th>
                                        <th scope="col" col width="160">Date of Birth</th>
                                        <th scope="col" col width="160">Date of Hire</th>
                                        <th scope="col" col width="160">License No</th>
                                        <th scope="col" col width="160">License Issue State</th>
                                        <th scope="col" col width="160">License Exp. Date</th>
                                        <th scope="col" col width="160">Action</th>
                                    </tr>
                                </thead>

                                <input type="hidden" id="page_no" value="0">
                                <tbody id="driverBody">

                                    <?php
                                require 'model/Driver.php';

                                $driver = new Driver();
                                $limit = 100;
                                $total_pages = 0;
                                $cursor = $db->driver->find(array('companyID' => $_SESSION['companyId']));

                                if (!empty($cursor)) {
                                    foreach ($cursor as $value) {
                                        $total_records = sizeof($value['driver']);
                                        $total_pages = ceil($total_records / $limit);
                                    }
                                }

                                $show_data = $db->driver->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('driver' => array('$slice' => [0, $limit]))));
                                $i = 1;

                                foreach ($show_data as $show) {
                                    $show = $show['driver'];
                                    foreach ($show as $s) {
                                        $currency = $s['currency'];
                                        $driverName = "'" . $s['driverName'] . "'";
                                        $driverEmail = "'" . $s['driverEmail'] . "'";
                                        $driverLocation = "'" . $s['driverLocation'] . "'";
                                        $driverSocial = "'" . $s['driverSocial'] . "'";
                                        $dateOfbirth = "'" . $s['dateOfbirth'] . "'";
                                        $dateOfhire = "'" . $s['dateOfhire'] . "'";
                                        $driverLicenseNo = "'" . $s['driverLicenseNo'] . "'";
                                        $driverLicenseIssue = "'" . $s['driverLicenseIssue'] . "'";
                                        $driverLicenseExp = "'" . $s['driverLicenseExp'] . "'";

                                        $pencilid1 = "'" . "driverNamePencil$i" . "'";
                                        $pencilid2 = "'" . "driverEmailPencil$i" . "'";
                                        $pencilid3 = "'" . "driverLocationPencil$i" . "'";
                                        $pencilid4 = "'" . "driverSocialPencil$i" . "'";
                                        $pencilid5 = "'" . "dateOfbirthPencil$i" . "'";
                                        $pencilid6 = "'" . "dateOfhirePencil$i" . "'";
                                        $pencilid7 = "'" . "driverLicenseNoPencil$i" . "'";
                                        $pencilid8 = "'" . "driverLicenseIssuePencil$i" . "'";
                                        $pencilid9 = "'" . "driverLicenseExpPencil$i" . "'";

                                    ?>
                                    <tr>
                                        <th><?php echo $i++; ?></th>
                                        <td class="custom-text" id="<?php echo "driverName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('driverNamePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('driverNamePencil$i'); "?>">
                                            <i id="<?php echo "driverNamePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $driverName; ?>,'updateDriver','text',<?php echo $s['_id']; ?>,'driverName','Name',<?php echo $pencilid1; ?>)"></i>
                                            <?php echo $s['driverName']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "driverEmail".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('driverEmailPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('driverEmailPencil$i'); "?>">
                                            <i id="<?php echo "driverEmailPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $driverEmail; ?>,'updateDriver','text',<?php echo $s['_id']; ?>,'driverEmail','Email',<?php echo $pencilid2; ?>)"></i>
                                            <?php echo $s['driverEmail']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "driverLocation".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('driverLocationPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('driverLocationPencil$i'); "?>">
                                            <i id="<?php echo "driverLocationPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $driverLocation; ?>,'updateDriver','text',<?php echo $s['_id']; ?>,'driverLocation','Location',<?php echo $pencilid3; ?>)"></i>
                                            <?php echo $s['driverLocation']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "driverSocial".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('driverSocialPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('driverSocialPencil$i'); "?>">
                                            <i id="<?php echo "driverSocialPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $driverSocial; ?>,'updateDriver','text',<?php echo $s['_id']; ?>,'driverSocial','Social Security No',<?php echo $pencilid4; ?>)"></i>
                                            <?php echo $s['driverSocial']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "dateOfbirth".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('dateOfbirthPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('dateOfbirthPencil$i'); "?>">
                                            <i id="<?php echo "dateOfbirthPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $dateOfbirth; ?>,'updateDriver','text',<?php echo $s['_id']; ?>,'dateOfbirth','Date of Birth',<?php echo $pencilid5; ?>)"></i>
                                            <?php echo date("d-m-Y",$s['dateOfbirth']); ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "dateOfhire".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('dateOfhirePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('dateOfhirePencil$i'); "?>">
                                            <i id="<?php echo "dateOfhirePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $dateOfhire; ?>,'updateDriver','text',<?php echo $s['_id']; ?>,'dateOfhire','Date of Hire',<?php echo $pencilid6; ?>)"></i>
                                            <?php echo date("d-m-Y",$s['dateOfhire']); ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "driverLicenseNo".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('driverLicenseNoPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('driverLicenseNoPencil$i'); "?>">
                                            <i id="<?php echo "driverLicenseNoPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $driverLicenseNo; ?>,'updateDriver','text',<?php echo $s['_id']; ?>,'driverLicenseNo','License No',<?php echo $pencilid7; ?>)"></i>
                                            <?php echo $s['driverLicenseNo']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "driverLicenseIssue".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('driverLicenseIssuePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('driverLicenseIssuePencil$i'); "?>">
                                            <i id="<?php echo "driverLicenseIssuePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $driverLicenseIssue; ?>,'updateDriver','text',<?php echo $s['_id']; ?>,'driverLicenseIssue','License Issue State',<?php echo $pencilid8; ?>)"></i>
                                            <?php echo $s['driverLicenseIssue']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "driverLicenseExp".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('driverLicenseExpPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('driverLicenseExpPencil$i'); "?>">
                                            <i id="<?php echo "driverLicenseExpPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $driverLicenseExp; ?>,'updateDriver','text',<?php echo $s['_id']; ?>,'driverLicenseExp','License Exp Date',<?php echo $pencilid9; ?>)"></i>
                                            <?php echo date("d-m-Y",$s['driverLicenseExp']); ?>
                                        </td>
                                        <td>
                                            <a href="#"
                                                onclick="deleteDriver(<?php echo $s['_id']; ?>,<?php echo $currency; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></i></a>
                                            <a href="#" onclick="editDriver(<?php echo $s['_id']; ?>)"><i
                                                    id="editDriverDetail" data-toggle="tooltip" data-placement="top"
                                                    title="Edit Detail"
                                                    class="mdi mdi-file-document-edit-outline editModal"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                } ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Location</th>
                                        <th>Social Security No</th>
                                        <th>Date of Birth</th>
                                        <th>Date of Hire</th>
                                        <th>License No</th>
                                        <th>License Issue State</th>
                                        <th>License Exp. Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
            <div class="modal-footer1">
                <button type="button" onclick="export_Driver()" class="mr-1 btn btn-primary waves-effect float-left"
                    data-dismiss="modal">
                    Export
                </button>

                <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">
                    Close
                </button>
                <span class="mandatory_admin">Note: CSV files must contain atmost 1000 rows at a time.</span>
                <nav aria-label="..." class="float-right">
                    <ul class="pagination" id="paginate">
                        <li id="bank_previous" style="display:none">
                            <a class="page-link btn btn-secondary waves-effect"
                                onclick="previous_page('paginate_driver','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Previous</a>
                        </li>
                        <select class="form-control" id="page_active"
                            onchange="paginate_driver(this.value * <?php echo $limit; ?>,<?php echo $limit ?>,<?php echo $total_pages; ?>)">
                            <?php
                            $j = 1;

                            for ($i = 0; $i < $total_pages; $i++) {
                                if ($i == 0) {
                            ?>
                            <option value="<?php echo $i; ?>"> <?php echo $j; ?>
                            </option>
                            <?php } else { ?>
                            <option value="<?php echo $i; ?>"> <?php echo $j; ?> </option>
                            <?php
                                }
                                $j++;
                            } 
                            if($total_pages > 0){
                            ?>
                        </select>
                        <li id="bank_next">
                            <a class="page-link btn btn-primary waves-effect waves-light"
                                onclick="next_page('paginate_driver','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Next</a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
                </ul>
                </nav>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>