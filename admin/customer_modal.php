<?php
session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="customer"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0">
                    Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="customer-container" style="z-index: 1400"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text"
                                           id="search" placeholder="search" style="margin-left: 5px;">
                                    <button class="btn btn-primary float-left" type="button" data-toggle="modal"
                                            data-target="#" id="AddCustomer"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                                    </button>
                                    <input type="submit" name="submit" onclick="importCustomer()"
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
                                            <table id="customer_table" class="scroll">
                                                <thead>
                                                <tr>
                                                    <th scope="col" col width="160">#</th>
                                                    <th scope="col" col width="160" data-priority="1">Customer Name</th>
                                                    <th scope="col" col width="160" data-priority="3">Address</th>
                                                    <th scope="col" col width="160" data-priority="1">Location</th>
                                                    <th scope="col" col width="160" data-priority="3">Zip</th>
                                                    <th scope="col" col width="160" data-priority="6">Primary Contact
                                                    </th>
                                                    <th scope="col" col width="160" data-priority="1">Telephone</th>
                                                    <th scope="col" col width="160" data-priority="1">Email</th>
                                                    <th scope="col" col width="160" data-priority="3">M.C.</th>
                                                    <th scope="col" col width="160" data-priority="3">Action</th>
                                                </tr>
                                                </thead>

                                                <tbody id="customerBody">
                                                <?php
                                                require 'model/Customer.php';

                                                $customer = new Customer();
                                                $show_data = $db->customer->find(['companyID' => $_SESSION['companyId']]);
                                                $no = 1;
                                                foreach ($show_data as $show) {
                                                    $show = $show['customer'];
                                                    foreach ($show as $s) {
                                                        $limit = 4;
                                                        $total_records = $s->count();
                                                        $total_pages = ceil($total_records / $limit);
                                                        ?>
                                                        <tr>
                                                            <th><?php echo $no++ ?></th>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td><a href="#"
                                                                   onclick="deleteCustomer(<?php echo $s['_id']; ?>)"><i
                                                                            class="mdi mdi-delete-sweep-outline" data-toggle="tooltip" data-placement="top" title="Delete Detail"
                                                                            style="font-size: 20px; color: #FC3B3B"></i></a>
                                                                <a href="#"
                                                                   onclick="editCustomer(<?php echo $s['_id']; ?>)"><i
                                                                            id="editCustomerDetail" data-toggle="tooltip" data-placement="top" title="Edit Detail"
                                                                            class="mdi mdi-file-document-edit-outline editModal"></i></a>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                }
                                                ?>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th scope="col" col width="160">#</th>
                                                    <th scope="col" col width="160" data-priority="1">Customer Name</th>
                                                    <th scope="col" col width="160" data-priority="3">Address</th>
                                                    <th scope="col" col width="160" data-priority="1">Location</th>
                                                    <th scope="col" col width="160" data-priority="3">Zip</th>
                                                    <th scope="col" col width="160" data-priority="6">Primary Contact
                                                    </th>
                                                    <th scope="col" col width="160" data-priority="1">Telephone</th>
                                                    <th scope="col" col width="160" data-priority="1">Email</th>
                                                    <th scope="col" col width="160" data-priority="3">M.C.</th>
                                                    <th scope="col" col width="160" data-priority="3">Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                            </div>
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
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
   
   