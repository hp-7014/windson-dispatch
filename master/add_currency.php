<?php session_start();
require "../database/connection.php";
?>
<div id="currency" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Currency Setting</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body custom-modal-body">
                <div class="currency-container" style="z-index: 1600"></div>
                <form method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target="#" id="AddCurrency">Add
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                            onclick="importExcel()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile"/>
                    </div>
                    <button type="button"
                            class="btn btn-outline-success waves-effect waves-light float-right">CSV formate
                    </button>
                </form>
                <br>
                <table id="mainTable"
                       class="table table-striped mb-0 table-editable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="currencyBody">
                    <?php

                    $show = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
                    $no = 1;
                    foreach ($show as $row) {
                        $show1 = $row['currency'];
                        foreach ($show1 as $row1) {
                            $id = $row1['_id'];
                            $currencyType = $row1['currencyType'];
                            $counter = $row1['counter'];
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td>
                                    <div contenteditable="true"
                                         onblur="updateCurrency(this,'currencyType','<?php echo $id; ?>')"
                                         onclick="activate(this)"><?php echo $currencyType; ?></div>
                                </td>
                                <td>
                                    <?php
                                    if ($counter == 0) {
                                        ?>
                                        <a href="#" onclick="deleteCurrency(<?php echo $id; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></a></i>
                                    <?php } else { ?>
                                        <a href="#" disabled onclick="deleteCurrencyError()"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #adb5bd"></a></i>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php }
                    } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">

                <button type="button" onclick="exportCurrency()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
