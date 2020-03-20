<?php
session_start();
require "../database/connection.php";
?>

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Driver"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
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

                <form action="" method="post" enctype="multipart/form-data">
                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text"
                           id="search" placeholder="search" style="margin-left: 5px;">
                    <input type="hidden" id="getnewaa" name="getnewaa"
                           value="2">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal"
                            data-target="#" id="AddDriver"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <input type="submit" name="submit" onclick="importDriver()"
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
                <br>
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="driver_table" class="scroll">
                                <thead>
                                <tr>
                                    <th scope="col" col width="160">#</th>
                                    <th scope="col" col width="160" data-priority="1">Name</th>
                                    <th scope="col" col width="160" data-priority="1">Telephone</th>
                                    <th scope="col" col width="160" data-priority="3">Email</th>
                                    <th scope="col" col width="160" data-priority="6">Location</th>
                                    <th scope="col" col width="160" data-priority="6">Social Security No</th>
                                    <th scope="col" col width="160" data-priority="1">Date of Birth</th>
                                    <th scope="col" col width="160" data-priority="3">Date of Hire
                                    </th>
                                    <th scope="col" col width="160" data-priority="3">License No
                                    </th>
                                    <th scope="col" col width="160" data-priority="6">License Issue
                                        State
                                    </th>
                                    <th scope="col" col width="160" data-priority="6">License Exp.
                                        Date
                                    </th>
                                    <th scope="col" col width="160" data-priority="6">Action</th>
                                </tr>
                                </thead>

                                <tbody id="driverBody">
                                <?php
                                require 'model/Driver.php';

                                $driver = new Driver();
                                $show_data = $db->driver->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($show_data as $show) {
                                    $show = $show['driver'];
                                    foreach ($show as $s) {
                                        $limit = 10;
                                        $total_records = $s->count();
                                        $total_pages = ceil($total_records / $limit);
                                        if ($s['deleteStatus'] == '0') {
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
                                                <td><a href="#" onclick="deleteDriver(<?php echo $s['_id']; ?>)"><i
                                                                data-toggle="tooltip" data-placement="top" title="Delete Detail"
                                                                class="mdi mdi-delete-sweep-outline deleteModal"></i></a>
                                                    <a href="#" onclick="editDriver(<?php echo $s['_id']; ?>)"><i id="editDriverDetail" data-toggle="tooltip" data-placement="top" title="Edit Detail"
                                                                   class="mdi mdi-file-document-edit-outline editModal"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                } ?>
                                </tbody>

                                <tfoot>
                                <th scope="col" col width="160">#</th>
                                <th scope="col" col width="160" data-priority="1">Name</th>
                                <th scope="col" col width="160" data-priority="1">Telephone</th>
                                <th scope="col" col width="160" data-priority="3">Email</th>
                                <th scope="col" col width="160" data-priority="6">Location</th>
                                <th scope="col" col width="160" data-priority="6">Social Security No</th>
                                <th scope="col" col width="160" data-priority="1">Date of Birth</th>
                                <th scope="col" col width="160" data-priority="3">Date of Hire
                                </th>
                                <th scope="col" col width="160" data-priority="3">License No
                                </th>
                                <th scope="col" col width="160" data-priority="6">License Issue
                                    State
                                </th>
                                <th scope="col" col width="160" data-priority="6">License Exp.
                                    Date
                                </th>
                                <th scope="col" col width="160" data-priority="6">Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                    <nav aria-label="..." class="float-right">
                        <ul class="pagination">
                            <?php
                            for ($i = 1; $i <= $total_pages; $i++) {
                                if ($i == 1) {
                                    ?>
                                    <li class="pageitem active" id="<?php echo $i; ?>"><a href="JavaScript:Void(0);"
                                                                                          data-id="<?php echo $i; ?>"
                                                                                          class="page-link"><?php echo $i; ?></a>
                                    </li>

                                    <?php
                                } else {
                                    ?>
                                    <li class="pageitem" id="<?php echo $i; ?>"><a href="JavaScript:Void(0);"
                                                                                   class="page-link"
                                                                                   data-id="<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="export_Driver()" class="btn btn-primary waves-effect"
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
</div>