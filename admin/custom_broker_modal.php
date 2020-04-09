<?php
session_start();
include '../database/connection.php';
?>

<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Custom_Broker"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
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
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search"
                    onkeyup="search_custom_b(this)" placeholder="search" style="margin-left: 5px;">
                <form action="" method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                        id="AddCustomBroker"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                        onclick="import_Custom_Broker()">Upload
                    </button>

                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" accept=".csv" onchange='triggerValidation(this)' />
                    </div>
                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV
                        formate
                    </button>
                </form>
                <br>
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="custom_broker_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">No</th>
                                        <th scope="col" col width="160" data-priority="1">Name</th>
                                        <th scope="col" col width="160" data-priority="1">Crossing</th>
                                        <th scope="col" col width="160" data-priority="1">Telephone</th>
                                        <th scope="col" col width="160" data-priority="1">Ext</th>
                                        <th scope="col" col width="160" data-priority="1">Toll Free</th>
                                        <th scope="col" col width="160" data-priority="1">Fax</th>
                                        <th scope="col" col width="160" data-priority="1">Status</th>
                                        <th scope="col" col width="160" data-priority="1">Action</th>
                                    </tr>
                                </thead>

                                <input type="hidden" id="page_no" value="0">
                                <tbody id="custom_broker_body">
                                    <?php
                                $limit = 100;
                                $total_pages = 0;
                                // $collection = $db->customs_broker;
                                // $cursor = $collection->find();
                                $cursor = $db->customs_broker->find(array('companyID' => $_SESSION['companyId']));
                                
                                if (!empty($cursor)) {
                                    foreach ($cursor as $value) {
                                        $total_records = sizeof($value['custom_b']);
                                        $total_pages = ceil($total_records / $limit);
                                    }
                                }

                                $broker = $db->customs_broker->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('custom_b' => array('$slice' => [0, $limit]))));
                                $i = 0;
                                
                                foreach ($broker as $brok) {
                                    $c_broker = $brok['custom_b'];

                                    foreach ($c_broker as $custom) {
                                        $i++;
                                        $pencilid1 = "'"."brokerPencil$i"."'";
                                        $pencilid2 = "'"."crossingPencil$i"."'";
                                        $pencilid3 = "'"."telephonePencil$i"."'";
                                        $pencilid4 = "'"."extPencil$i"."'";
                                        $pencilid5 = "'"."tollfreePencil$i"."'";
                                        $pencilid6 = "'"."faxPencil$i"."'";
                                        $pencilid7 = "'"."StatusPencil$i"."'";

                                        $name = "'".$custom['brokerName']."'";
                                        $crossing = "'".$custom['crossing']."'";
                                        $telephone = "'".$custom['telephone']."'";
                                        $ext = "'".$custom['ext']."'";
                                        $tollfree = "'".$custom['tollfree']."'";
                                        $fax = "'".$custom['fax']."'";
                                        $Status = "'".$custom['Status']."'";

                                        ?>
                                    <tr>
                                        <th><?php echo $i ?></th>
                                        <td class="custom-text" id="<?php echo "brokerName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('brokerPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('brokerPencil$i'); "?>">
                                            <i id="<?php echo "brokerPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $name; ?>,'updateCustom','text',<?php echo $custom['_id']; ?>,'brokerName','Broker Name',<?php echo $pencilid1; ?>)"></i>
                                            <?php echo $custom['brokerName']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "crossing".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('crossingPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('crossingPencil$i'); "?>">
                                            <i id="<?php echo "crossingPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $crossing; ?>,'updateCustom','text',<?php echo $custom['_id']; ?>,'crossing','Crossing',<?php echo $pencilid2; ?>)"></i>
                                            <?php echo $custom['crossing']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "telephone".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('telephonePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('telephonePencil$i'); "?>">
                                            <i id="<?php echo "telephonePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $telephone; ?>,'updateCustom','text',<?php echo $custom['_id']; ?>,'telephone','Telephone',<?php echo $pencilid3; ?>)"></i>
                                            <?php echo $custom['telephone']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "ext".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('extPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('extPencil$i'); "?>">
                                            <i id="<?php echo "extPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $ext; ?>,'updateCustom','text',<?php echo $custom['_id']; ?>,'ext','Ext',<?php echo $pencilid4; ?>)"></i>
                                            <?php echo $custom['ext']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "tollfree".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('tollfreePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('tollfreePencil$i'); "?>">
                                            <i id="<?php echo "tollfreePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $tollfree; ?>,'updateCustom','text',<?php echo $custom['_id']; ?>,'tollfree','Toll Free',<?php echo $pencilid5; ?>)"></i>
                                            <?php echo $custom['tollfree']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "fax".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('faxPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('faxPencil$i'); "?>">
                                            <i id="<?php echo "faxPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $fax; ?>,'updateCustom','text',<?php echo $custom['_id']; ?>,'fax','Fax',<?php echo $pencilid6; ?>)"></i>
                                            <?php echo $custom['fax']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "Status".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('StatusPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('StatusPencil$i'); "?>">
                                            <i id="<?php echo "StatusPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $Status; ?>,'updateCustom','text',<?php echo $custom['_id']; ?>,'Status','Status',<?php echo $pencilid7; ?>)"></i>
                                            <?php echo $custom['Status']; ?>
                                        </td>

                                        <td><a href="#" onclick="deleteCustom(<?php echo $custom['_id']; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></i></a>
                                        </td>
                                    </tr>
                                    <?php 
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

                </div>
            </div>

            <div class="modal-footer1">
                <button type="button" onclick="export_CustomBroker()"
                    class="mr-1 btn btn-primary waves-effect float-left" data-dismiss="modal">
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
                                onclick="previous_page('paginate_custom_broker','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Previous</a>
                        </li>
                        <select class="form-control" id="page_active"
                            onchange="paginate_custom_broker(this.value * <?php echo $limit; ?>,<?php echo $limit ?>,<?php echo $total_pages; ?>)">
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
                                onclick="next_page('paginate_custom_broker','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Next</a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->