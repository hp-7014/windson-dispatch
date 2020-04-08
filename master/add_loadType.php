<?php session_start();
require "../database/connection.php";?>
<!--  Modal content for the above example -->
<div id="Load_Type" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Active Load Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="loadtype-container" style="z-index: 1800"></div>
                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                        id="Active_Load_Type"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                        onclick="importLoadType()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" accept=".csv" onchange='triggerValidation(this)' />
                    </div>
                    <a class="btn btn-outline-success waves-effect waves-light float-right"
                        href="download_csv_file.php?file=Active_Load_Type.csv" style="margin-bottom: 2px;">CSV formate
                    </a>
                </form>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll-s" class="table-scroll-s">
                            <table id="loadType_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="2">No</th>
                                        <th scope="col" col width="10" data-priority="1">Name</th>
                                        <th scope="col" col width="10" data-priority="3">Unit</th>
                                        <th scope="col" col width="10" data-priority="1">Delete</th>
                                    </tr>
                                </thead>

                                <tbody id="loadTypeBody">
                                    <?php
                                        require 'model/LoadType.php';

                                        $load_type = new LoadType();
                                        $show_data = $db->load_type->find(['companyID' => $_SESSION['companyId']]);
                                        $i = 1;
                                        foreach ($show_data as $show) {
                                            $show = $show['loadType'];
                                            foreach ($show as $s) {
                                                $counter = $s['counter'];
                                                $loadName = "'".$s['loadName']."'";
                                                $loadType = "'".$s['loadType']."'";
                                                
                                                $pencilid = "'"."loadPencil$i"."'";
                                                $pencilid1 = "'"."loadTypepencil$i"."'";
                                     ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td class="custom-text" id="<?php echo "loadName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('loadPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('loadPencil$i'); "?>">
                                            <i id="<?php echo "loadPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $loadName; ?>,'updateloadType','text',<?php echo $s['_id']; ?>,'loadName','Load Name',<?php echo $pencilid; ?>)"></i>
                                            <?php echo $s['loadName']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "loadType".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('loadTypepencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('loadTypepencil$i'); "?>">
                                            <i id="<?php echo "loadTypepencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $loadType; ?>,'updateloadType','text',<?php echo $s['_id']; ?>,'loadType','Load Type',<?php echo $pencilid1; ?>)"></i>
                                            <?php echo $s['loadType']; ?>
                                        </td>

                                        <td>
                                            <?php if ($counter == 0) { ?>
                                            <a href="#" onclick="deleteloadType(<?php echo $s['_id']; ?>)"><i
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
                                        <th>Unit</th>
                                        <th>Delete</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <span class="mandatory">Note: CSV files must contain atmost 1000 rows at a time.</span>
                <button type="button" onclick="exportLoadType()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<!-----------------------------------------------------------------------Add Active Load Type-------------------------------------------------------------------------->