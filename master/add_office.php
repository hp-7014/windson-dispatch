<?php session_start();
require "../database/connection.php";?>
<div id="Office" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Office</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="office-container" style="z-index: 1800"></div>
                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                        id="Add_Office"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                        onclick="importOffice()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" accept=".csv" onchange='triggerValidation(this)' />
                    </div>
                    <a class="btn btn-outline-success waves-effect waves-light float-right"
                        href="download_csv_file.php?file=Add_Office.csv" style="margin-bottom: 2px;">CSV formate
                    </a>
                </form>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll-s" class="table-scroll-s">
                            <table id="office_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="2">No</th>
                                        <th scope="col" col width="10">Name</th>
                                        <th scope="col" col width="10">Location</th>
                                        <th scope="col" col width="10">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="officeBody">
                                    <?php
                                    $show_data = $db->office->find(['companyID' => $_SESSION['companyId']]);
                                    $i = 1;
                                    foreach ($show_data as $show) {
                                        $show = $show['office'];
                                        foreach ($show as $s) {
                                            $counter = $s['counter'];
                                            $officeName = "'".$s['officeName']."'";
                                            $officeLocation = "'".$s['officeLocation']."'";
                                            
                                            $pencilid = "'"."officePencil$i"."'";
                                            $pencilid1 = "'"."officeLocpencil$i"."'";
                                        ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td class="custom-text" id="<?php echo "officeName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('officePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('officePencil$i'); "?>">
                                            <i id="<?php echo "officePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $officeName; ?>,'updateOffice','text',<?php echo $s['_id']; ?>,'officeName','Office Name',<?php echo $pencilid; ?>)"></i>
                                            <?php echo $s['officeName']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "officeLocation".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('officeLocPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('officeLocPencil$i'); "?>">
                                            <i id="<?php echo "officeLocPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $officeLocation; ?>,'updateOffice','text',<?php echo $s['_id']; ?>,'officeLocation','Office Location',<?php echo $pencilid1; ?>)"></i>
                                            <?php echo $s['officeLocation']; ?>
                                        </td>
                                        <td>
                                            <?php if ($counter == 0) { ?>
                                            <a href="#" onclick="deleteOffice(<?php echo $s['_id']; ?>)"><i
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
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <span class="mandatory">Note: CSV files must contain atmost 1000 rows at a time.</span>
                <button type="button" onclick="exportOffice()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---- Add office Modal here ----->