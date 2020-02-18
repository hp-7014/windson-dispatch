<?php
session_start();
include '../database/connection.php';
?>

<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Custom_Broker"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Customs Broker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#Add_Customs_Broker"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="custom_broker_table" class="scroll" >
                                <thead>
                                <tr>
                                    <th scope="col" col width="160">No</th>
                                    <th scope="col" col width="160" data-priority="1">Name</th>
                                    <th scope="col" col width="160" data-priority="3">Crossing</th>
                                    <th scope="col" col width="160" data-priority="1">Telephone</th>
                                    <th scope="col" col width="160" data-priority="3">Ext</th>
                                    <th scope="col" col width="160" data-priority="3">Toll Free</th>
                                    <th scope="col" col width="160" data-priority="6">Fax</th>
                                    <th scope="col" col width="160" data-priority="6">Status</th>
                                    <th scope="col" col width="160" data-priority="6">Action</th>
                                </tr>
                                </thead>
                                <?php
                                    $broker = $db->customs_broker->find(['companyID' => $_SESSION['companyId']]);
                                    $i = 1;
                                ?>

                                <tbody>
                                <?php foreach ($broker as $brok) {
                                    $c_broker = $brok['custom_b'];

                                    foreach ($c_broker as $custom) {
                                        $limit = 4;
                                        $total_records = $custom->count();
                                        $total_pages = ceil($total_records / $limit);
                                        if ($custom['delete_status'] == '0') {
                                            ?>
                                            <tr>
                                                <th><?php echo $i++ ?></th>
                                                <td>
                                                    <a href="#" id="brokerName<?php echo $custom['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'brokerName');" class="text-overflow"><?php echo $custom['brokerName']; ?></a>
                                                    <button type="button" id="brokerName<?php echo $custom['_id']; ?>" onclick="updateCustom('brokerName',<?php echo $custom['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="crossing<?php echo $custom['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'crossing');" class="text-overflow"><?php echo $custom['crossing']; ?></a>
                                                    <button type="button" id="crossing<?php echo $custom['_id']; ?>" onclick="updateCustom('crossing',<?php echo $custom['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="telephone<?php echo $custom['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'telephone');" class="text-overflow"><?php echo $custom['telephone']; ?></a>
                                                    <button type="button" id="telephone<?php echo $custom['_id']; ?>" onclick="updateCustom('telephone',<?php echo $custom['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="ext<?php echo $custom['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'ext');" class="text-overflow"><?php echo $custom['ext']; ?></a>
                                                    <button type="button" id="ext<?php echo $custom['_id']; ?>" onclick="updateCustom('ext',<?php echo $custom['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="tollfree<?php echo $custom['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'tollfree');" class="text-overflow"><?php echo $custom['tollfree']; ?></a>
                                                    <button type="button" id="tollfree<?php echo $custom['_id']; ?>" onclick="updateCustom('tollfree',<?php echo $custom['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="fax<?php echo $custom['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'fax');" class="text-overflow"><?php echo $custom['fax']; ?></a>
                                                    <button type="button" id="fax<?php echo $custom['_id']; ?>" onclick="updateCustom('fax',<?php echo $custom['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="Status<?php echo $custom['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'Status');" class="text-overflow"><?php echo $custom['Status']; ?></a>
                                                    <button type="button" id="Status<?php echo $custom['_id']; ?>" onclick="updateCustom('Status',<?php echo $custom['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td><a href="#" onclick="deleteCustom(<?php echo $custom['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Crossing</th>
                                    <th>Telephone</th>
                                    <th>Ext</th>
                                    <th>Toll Free</th>
                                    <th>Fax</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                    <nav aria-label="..." class="float-right">
                        <ul class="pagination">
                            <?php
                            for($i=1; $i<=$total_pages; $i++){
                                if($i == 1){
                                    ?>
                                    <li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i;?>" class="page-link" ><?php echo $i;?></a></li>

                                    <?php
                                }
                                else{
                                    ?>
                                    <li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="export_CustomBroker()" class="btn btn-primary waves-effect" data-dismiss="modal">
                    Export
                </button>

                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-----------------------------------------------Add Custom Broker------------------------------------------------------------------------------------->
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="Add_Customs_Broker"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add Customs Broker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV formate</button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" />
                    </div>

                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="import_Custom_Broker()">Upload</button>
                </div>
                <br>
                <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Broker Name <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Broker Name *" type="text" name="brokerName" id="brokerName">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Crossing <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Crossing *" type="text" name="crossing" id="crossing">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" placeholder="Telephone No" type="text" name="telephone" id="telephone">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" placeholder="Ext" type="text" name="ext" id="ext">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Toll Free</label>
                        <div>
                            <input class="form-control" placeholder="Toll Free" type="text" name="tollfree" id="tollfree">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fax</label>
                        <div>
                            <input class="form-control" placeholder="Fax No" type="text" name="fax" id="fax">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status </label>
                        <div class="row">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="status1" name="Status" value="Active" checked>
                                <label class="custom-control-label" for="status1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="status2" name="Status" value="InActive">
                                <label class="custom-control-label" for="status2">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="Add_CustomBroker()">Save</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<style>
    .table-scroll {
        position: relative;
        width: 100%;
        z-index: 1;
        margin: auto;
        overflow: auto;
        height: 320px;
    }

    .table-scroll table {
        width: 100%;
        min-width: 1280px;
        margin: auto;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-wrap {
        position: relative;
    }

    .table-scroll th,
    .table-scroll td {
        /*padding: 5px 10px;*/
        border: 1px solid #000;
        background: #fff;
        vertical-align: bottom;
        text-align: center;
    }

    .table-scroll thead th {
        background: #30419B;
        color: #fff;
        padding: 4px;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
    }

    /* safari and ios need the tfoot itself to be position:sticky also */
    .table-scroll tfoot,
    .table-scroll tfoot th,
    .table-scroll tfoot td {
        position: -webkit-sticky;
        position: sticky;
        bottom: 0;
        background: #666;
        color: #fff;
        z-index: 4;
    }

    /* testing links*/

    th:first-child {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 2;
        background: #ccc;
    }

    thead th:first-child,
    tfoot th:first-child {
        z-index: 5;
    }

    table {
        table-layout: fixed;
    }

    .text-overflow {
        padding-top: 10px;
        display:block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    a.editable-click { border-bottom: none;
        color: #000000;}
    a.editable-click:hover{
        border-bottom: none;
    }
    .table-scroll::-webkit-scrollbar {
        width: 12px;
        height: 8px;
    }

    /* Track */

    .table-scroll::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }


    .table-scroll::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: rgb(48, 65, 155);
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }

</style>

