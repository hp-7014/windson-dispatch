<?php
session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="customer"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
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
                <div class="customer-container" style="z-index: 1800"></div>
                <form action="" method="post" enctype="multipart/form-data">
                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search"
                        onkeyup="search_customer(this)" placeholder="search" style="margin-left: 5px;">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                        id="AddCustomer"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                        onclick="importCustomer()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" name="file" id="file" accept=".csv" />
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
                            <table id="customer_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">No</th>
                                        <th scope="col" col width="160" data-priority="1">Customer Name</th>
                                        <th scope="col" col width="160" data-priority="1">Location</th>
                                        <th scope="col" col width="160" data-priority="1">Zip</th>
                                        <th scope="col" col width="160" data-priority="1">Primary Contact
                                        </th>
                                        <th scope="col" col width="160" data-priority="1">Telephone</th>
                                        <th scope="col" col width="160" data-priority="1">Email</th>
                                        <th scope="col" col width="160" data-priority="1">Action</th>
                                    </tr>
                                </thead>

                                <input type="hidden" id="page_no" value="0">
                                <tbody id="customerBody">
                                    <?php
                                                    require 'model/Customer.php';
                                                    $customer = new Customer();
                                                    $limit = 100;
                                                    $total_pages = 0;
                                                    $cursor = $db->customer->find(array('companyID' => $_SESSION['companyId']));
                                                    
                                                    if (!empty($cursor)) {
                                                        foreach ($cursor as $value) {
                                                            $total_records = sizeof($value['customer']);
                                                            $total_pages = ceil($total_records / $limit);
                                                        }
                                                    }
                                                    
                                                    $show_data = $db->customer->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('customer' => array('$slice' => [0, $limit]))));
                                                    
                                                    $i = 1;

                                                foreach ($show_data as $show) {
                                                    $show = $show['customer'];
                                                    foreach ($show as $s) {
                                                        $counter = $s['counter'];
                                                        $currencyid = $s['currencySetting'];
                                                        $paymentid = $s['paymentTerms'];
                                                        $factoringid = $s['factoringCompany'];
                                                        $custName = "'" . $s['custName'] . "'";
                                                        $custLocation = "'" . $s['custLocation'] . "'";
                                                        $custZip = "'" . $s['custZip'] . "'";
                                                        $primaryContact = "'" . $s['primaryContact'] . "'";
                                                        $custTelephone = "'" . $s['custTelephone'] . "'";
                                                        $custEmail = "'" . $s['custEmail'] . "'";

                                                    ?>
                                    <tr>
                                        <th><?php echo $i++ ?></th>
                                        <td class="custom-text" id="<?php echo "custName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('custNamePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('custNamePencil$i'); "?>">
                                            <i id="<?php echo "custNamePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $custName; ?>,'updateCustomer','text',<?php echo $s['_id']; ?>,'custName','Customer Name',<?php echo $pencilid1; ?>)"></input>
                                                <?php echo $s['custName']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "custLocation".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('custLocationPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('custLocationPencil$i'); "?>">
                                            <i id="<?php echo "custLocationPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $custLocation; ?>,'updateCustomer','text',<?php echo $s['_id']; ?>,'custLocation','Location',<?php echo $pencilid2; ?>)"></i>
                                            <?php echo $s['custLocation']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "custZip".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('custZipPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('custZipPencil$i'); "?>">
                                            <i id="<?php echo "custZipPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $custZip; ?>,'updateCustomer','text',<?php echo $s['_id']; ?>,'custZip','Zip',<?php echo $pencilid3; ?>)"></i>
                                            <?php echo $s['custZip']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "primaryContact".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('primaryContactPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('primaryContactPencil$i'); "?>">
                                            <i id="<?php echo "primaryContactPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $primaryContact; ?>,'updateCustomer','text',<?php echo $s['_id']; ?>,'primaryContact','Primary Contact',<?php echo $pencilid4; ?>)"></i>
                                            <?php echo $s['primaryContact']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "custTelephone".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('custTelephonePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('custTelephonePencil$i'); "?>">
                                            <i id="<?php echo "custTelephonePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $custTelephone; ?>,'updateCustomer','text',<?php echo $s['_id']; ?>,'custTelephone','Telephone',<?php echo $pencilid5; ?>)"></i>
                                            <?php echo $s['custTelephone']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "custEmail".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('custEmailPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('custEmailPencil$i'); "?>">
                                            <i id="<?php echo "custEmailPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $custEmail; ?>,'updateCustomer','text',<?php echo $s['_id']; ?>,'custEmail','Email',<?php echo $pencilid6; ?>)"></i>
                                            <?php echo $s['custEmail']; ?>
                                        </td>

                                        <td>
                                            <?php if ($counter == 0) { ?>
                                            <a href="#"
                                                onclick="deleteCustomer(<?php echo $s['_id']; ?>,<?php echo $currencyid; ?>,<?php echo $paymentid; ?>,<?php echo $factoringid; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></i></a>
                                            <?php } else { ?>
                                            <a href="#" disabled onclick="deleteCurrencyError()"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #adb5bd"></i></a>
                                            <?php } ?>
                                            <a href="#" onclick="editCustomer(<?php echo $s['_id']; ?>)"><i
                                                    id="editCustomerDetail" data-toggle="tooltip" data-placement="top"
                                                    title="Edit Detail"
                                                    class="mdi mdi-file-document-edit-outline editModal"></i></a>
                                        </td>
                                    </tr>
                                    <?php }
                                                }
                                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Customer Name</th>
                                        <th>Location</th>
                                        <th>Zip</th>
                                        <th>Primary Contact</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer1">
                    <nav aria-label="..." class="float-right">
                        <ul class="pagination" id="paginate">
                            <li id="bank_previous" style="display:none">
                                <a class="page-link btn btn-secondary waves-effect"
                                    onclick="previous_page('paginate_customer','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Previous</a>
                            </li>
                            <select class="form-control" id="page_active"
                                onchange="paginate_customer(this.value * <?php echo $limit; ?>,<?php echo $limit ?>,<?php echo $total_pages; ?>)">
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
                                    onclick="next_page('paginate_customer','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Next</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                    <span class="mandatory_admin">Note: CSV files must contain atmost 1000 rows at a time.</span>
                </div>
            </div>
        </div>
    </div>
</div>