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
                <div class="custombroker-container" style="z-index: 1400"></div>
                <form action="" method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                        id="AddCustomBroker"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV
                        formate
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" />
                    </div>

                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                        onclick="import_Custom_Broker()">Upload
                    </button>
                </form>
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search"
                    placeholder="search" style="margin-left: 5px;">
                <br>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="custom_broker_table" class="scroll">
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
                                $limit = 100;
                                $cursor = $db->customs_broker->find(array('companyID' => $_SESSION['companyId']));
                                foreach ($cursor as $value) {
                                    $total_records = sizeof($value['custom_b']);
                                    $total_pages = ceil($total_records / $limit);
                                }
                                $broker = $db->customs_broker->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('custom_b' => array('$slice' => [0, $limit]))));
                                $i = 0;
                                ?>

                                <tbody id="custom_broker_body">
                                    <?php foreach ($broker as $brok) {
                                    $c_broker = $brok['custom_b'];

                                    foreach ($c_broker as $custom) {


                                        if ($custom['delete_status'] == '0') {
                                            $i++;
                                            $pencilid = "'"."brokerPencil$i"."'";
                                            $name = "'".$custom['brokerName']."'";
                                            ?>
                                    <tr>
                                        <th><?php echo $i ?></th>
                                        <td class="text-overflow" id="<?php echo "brokerName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('brokerPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('brokerPencil$i'); "?>"
                                            >
                                            <i id="<?php echo "brokerPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $name; ?>,'updateCustom','text',<?php echo $custom['_id']; ?>,'brokerName','Broker Name',<?php echo $pencilid; ?>)"
                                            ></i>
                                            <?php echo $custom['brokerName']; ?>
                                        </td>
                                        <td>
                                            <a href="#" id="crossing<?php echo $custom['_id']; ?>1" data-type="textarea"
                                                onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'crossing');"
                                                class="text-overflow"><?php echo $custom['crossing']; ?></a>
                                            <button type="button" id="crossing<?php echo $custom['_id']; ?>"
                                                onclick="updateCustom('crossing',<?php echo $custom['_id']; ?>)"
                                                style="display:none; margin-left:6px;"
                                                class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                <i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="telephone<?php echo $custom['_id']; ?>1"
                                                data-type="textarea"
                                                onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'telephone');"
                                                class="text-overflow"><?php echo $custom['telephone']; ?></a>
                                            <button type="button" id="telephone<?php echo $custom['_id']; ?>"
                                                onclick="updateCustom('telephone',<?php echo $custom['_id']; ?>)"
                                                style="display:none; margin-left:6px;"
                                                class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                <i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="ext<?php echo $custom['_id']; ?>1" data-type="textarea"
                                                onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'ext');"
                                                class="text-overflow"><?php echo $custom['ext']; ?></a>
                                            <button type="button" id="ext<?php echo $custom['_id']; ?>"
                                                onclick="updateCustom('ext',<?php echo $custom['_id']; ?>)"
                                                style="display:none; margin-left:6px;"
                                                class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                <i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="tollfree<?php echo $custom['_id']; ?>1" data-type="textarea"
                                                onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'tollfree');"
                                                class="text-overflow"><?php echo $custom['tollfree']; ?></a>
                                            <button type="button" id="tollfree<?php echo $custom['_id']; ?>"
                                                onclick="updateCustom('tollfree',<?php echo $custom['_id']; ?>)"
                                                style="display:none; margin-left:6px;"
                                                class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                <i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="fax<?php echo $custom['_id']; ?>1" data-type="textarea"
                                                onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'fax');"
                                                class="text-overflow"><?php echo $custom['fax']; ?></a>
                                            <button type="button" id="fax<?php echo $custom['_id']; ?>"
                                                onclick="updateCustom('fax',<?php echo $custom['_id']; ?>)"
                                                style="display:none; margin-left:6px;"
                                                class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                <i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="Status<?php echo $custom['_id']; ?>1" data-type="textarea"
                                                onclick="showTextarea(this.id,'text',<?php echo $custom['_id']; ?>,'Status');"
                                                class="text-overflow"><?php echo $custom['Status']; ?></a>
                                            <button type="button" id="Status<?php echo $custom['_id']; ?>"
                                                onclick="updateCustom('Status',<?php echo $custom['_id']; ?>)"
                                                style="display:none; margin-left:6px;"
                                                class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                <i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td><a href="#" onclick="deleteCustom(<?php echo $custom['_id']; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></i></a>
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
                            $j = 1;
                            for ($i = 0; $i < $total_pages; $i++) {
                                if ($i == 0) {
                                    ?>
                            <li class="pageitem active"
                                onclick="paginate_custom_broker(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                id="<?php echo $i; ?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i; ?>"
                                    class="page-link"><?php echo $j; ?></a></li>

                            <?php
                                } else {
                                    ?>
                            <li class="pageitem"
                                onclick="paginate_custom_broker(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                id="<?php echo $i; ?>"><a href="JavaScript:Void(0);" class="page-link"
                                    data-id="<?php echo $i; ?>"><?php echo $j; ?></a></li>
                            <?php
                                }
                                $j++;
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="export_CustomBroker()" class="btn btn-primary waves-effect"
                    data-dismiss="modal">
                    Export
                </button>

                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->