<?php session_start();
require "../database/connection.php";
?>
<div id="fuel_card" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Fuel Card Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="fuel-card-container" style="z-index: 1800"></div>
                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                        id="addfuelCard"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                        onclick="importFuelCard()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" accept=".csv" onchange='triggerValidation(this)' />
                    </div>
                    <a class="btn btn-outline-success waves-effect waves-light float-right"
                        href="download_csv_file.php?file=FuelCard.csv" style="margin-bottom: 5px;">CSV formate</a>
                </form>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll-s" class="table-scroll-s">
                            <table id="" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="2">No</th>
                                        <th scope="col" col width="10" data-priority="1">Name</th>
                                        <th scope="col" col width="10" data-priority="3">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="fuelCardBody">
                                    <?php
                                    $show = $db->fuel_Card_Type->find(['companyID' => $_SESSION['companyId']]);
                                    $i = 1;
                                    foreach ($show as $row) {
                                        $show1 = $row['fuelCard'];
                                        foreach ($show1 as $row1) {
                                            $id = $row1['_id'];
                                            $fuelCardType = "'".$row1['fuelCardType']."'";
                                            
                                            $pencilid = "'"."fuelCardTypePencil$i"."'";
                                            $counter = $row1['counter'];
                                            
                                            ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td id="<?php echo "fuelCardType".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('fuelCardTypePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('fuelCardTypePencil$i'); "?>">
                                            <i id="<?php echo "fuelCardTypePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $fuelCardType; ?>,'updateFuelCard','text',<?php echo $row1['_id']; ?>,'fuelCardType','Fuel Card Type',<?php echo $pencilid; ?>)"></i>
                                            <?php echo $row1['fuelCardType']; ?>
                                        </td>

                                        <td>
                                            <?php if ($counter == 0) { ?>
                                            <a href="#" onclick="deleteFuelCard(<?php echo $id; ?>)"><i
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
                <button type="button" onclick="exportFuelCard()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->