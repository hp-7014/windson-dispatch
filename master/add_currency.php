<?php session_start(); ?>
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
                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                        data-target="#center">Add
                </button>
                <form method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importExcel()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" />
                    </div></form>
                <button type="button"
                        class="btn btn-outline-success waves-effect waves-light float-right">CSV formate
                </button>
                <table id="mainTable"
                       class="table table-striped mb-0 table-editable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require '../vendor/autoload.php';
                    $connection = new MongoDB\Client("mongodb://127.0.0.1/");
                    $db = $connection->demoadd;
                    $show = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
                    $no = 1;
                    foreach ($show as $row){
                        $show1 = $row['currency'];
                            foreach ($show1 as $row1) {
                                $id = $row1['_id'];
                                $currencyType = $row1['currencyType'];
                     
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><div contenteditable="true" onblur="updateCurrency(this,'currencyType','<?php echo $id; ?>')" onclick="activate(this)"><?php echo $currencyType; ?></div></td>
                            <td><a href="#" onclick="deleteCurrency(<?php echo $id; ?>)"><i class="mdi mdi-delete-sweep-outline"  style="font-size: 20px; color: #FC3B3B"></a></i>
                            </td>
                        </tr>
                    <?php } 
                    }?>
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
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="center" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add Currency</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Name *</label>
                        <div>
                            <input class="form-control" placeholder="Name *" type="text"
                                   id="currency_add_type" name="currency_add_type">
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect"
                            data-dismiss="modal">Close
                    </button>
                    <button type="button" onclick="addCurrency()" id="" class="btn btn-primary waves-effect waves-light">
                        Save
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>