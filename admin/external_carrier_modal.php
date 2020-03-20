<?php session_start();
require "../database/connection.php";
?>

<!--  Modal content for the above example -->

<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="External"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="carrier-container" style="z-index: 2000"></div>
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    External Carrier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-primary waves-effect waves-light header-title"
                            data-toggle="modal"
                            data-target="#" id="AddCarrier">ADD
                    </button>
                    <input type="submit" name="submit"
                           class="btn btn-outline-info waves-effect waves-light float-right"
                           value="Upload"/>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" name="file" id="file" accept=".csv"/>
                    </div>
                    <button type="button"
                            class="btn btn-outline-success waves-effect waves-light float-right">CSV
                        formate
                    </button>
                </form>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="carrier_table" class="scroll">
                                <thead>
                                <tr>
                                    <th scope="col" col width="50">#</th>
                                    <th scope="col" col width="160" data-priority="1">Name</th>
                                    <th scope="col" col width="160" data-priority="3">Address</th>
                                    <th scope="col" col width="160" data-priority="3">Location</th>
                                    <th scope="col" col width="160" data-priority="3">Zip</th>
                                    <th scope="col" col width="160" data-priority="3">Contact Name</th>
                                    <th scope="col" col width="160" data-priority="6">Contact Email</th>
                                    <th scope="col" col width="160" data-priority="6">Telephone</th>
                                    <th scope="col" col width="160" data-priority="3">M.C.</th>
                                    <th scope="col" col width="160" data-priority="6">D.O.T.</th>
                                    <th scope="col" col width="160" data-priority="6">Factoring Company</th>
                                    <th scope="col" col width="160" data-priority="6">Action</th>
                                </tr>
                                </thead>

                                <tbody id="carrierBody">
                                <?php
                                require 'model/External_Carrier.php';

                                $limit = 1;
                                $cursor = $db->carrier->find(array('companyID' => $_SESSION['companyId']));

                                $External_Carrier = new External_Carrier();
                                $show_data = $db->carrier->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($show_data as $show) {
                                    $show = $show['carrier'];
                                    foreach ($show as $s) {
                                        ?>
                                        <tr>
                                            <th><?php echo $no++; ?></th>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td><a href="#" onclick="deleteExternal(<?php echo $s['_id']; ?>)"><i
                                                            class="mdi mdi-delete-sweep-outline" data-toggle="tooltip" data-placement="top" title="Delete Detail"
                                                            style="font-size: 20px; color: #FC3B3B"></i></a>
                                                <a href="#" onclick="editExternalCarrier(<?php echo $s['_id']; ?>)"><i
                                                            id="editDriverDetail" data-toggle="tooltip" data-placement="top" title="Edit Detail"
                                                            class="mdi mdi-file-document-edit-outline editModal"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                } ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th scope="col" col width="50">#</th>
                                    <th scope="col" col width="160" data-priority="1">Name</th>
                                    <th scope="col" col width="160" data-priority="3">Address</th>
                                    <th scope="col" col width="160" data-priority="3">Location</th>
                                    <th scope="col" col width="160" data-priority="3">Zip</th>
                                    <th scope="col" col width="160" data-priority="3">Contact Name</th>
                                    <th scope="col" col width="160" data-priority="6">Contact Email</th>
                                    <th scope="col" col width="160" data-priority="6">Telephone</th>
                                    <th scope="col" col width="160" data-priority="3">M.C.</th>
                                    <th scope="col" col width="160" data-priority="6">D.O.T.</th>
                                    <th scope="col" col width="160" data-priority="6">Factoring Company</th>
                                    <th scope="col" col width="160" data-priority="6">Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary waves-effect waves-light">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


