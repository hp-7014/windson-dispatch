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
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text"
                                           id="search" onkeyup="search_customer(this)" placeholder="search" style="margin-left: 5px;">
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
                                                    <th scope="col" col width="50">No</th>
                                                    <th scope="col" col width="160" data-priority="1">Customer Name</th>
                                                    <th scope="col" col width="160" data-priority="3">Location</th>
                                                    <th scope="col" col width="160" data-priority="1">Zip</th>
                                                    <th scope="col" col width="160" data-priority="3">Primary Contact
                                                    </th>
                                                    <th scope="col" col width="160" data-priority="3">Telephone</th>
                                                    <th scope="col" col width="160" data-priority="6">Email</th>
                                                    <th scope="col" col width="160" data-priority="6">Action</th>
                                                </tr>
                                                </thead>

                                                <tbody id="customerBody">
                                                <?php
                                                    require 'model/Customer.php';
                                                    $customer = new Customer();
                                                    $limit = 100;
                                                    $cursor = $db->customer->find(array('companyID' => $_SESSION['companyId']));
                                                    
                                                    foreach ($cursor as $value) {
                                                        $total_records = sizeof($value['customer']);
                                                        $total_pages = ceil($total_records / $limit);
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
                                                            $custName = "'".$s['custName']."'";
                                                            $custLocation = "'".$s['custLocation']."'";
                                                            $custZip = "'".$s['custZip']."'";
                                                            $primaryContact = "'".$s['primaryContact']."'";
                                                            $custTelephone = "'".$s['custTelephone']."'";
                                                            $custEmail = "'".$s['custEmail']."'";

                                                            $pencilid1 = "'"."custNamePencil$i"."'";
                                                            $pencilid2 = "'"."custLocationPencil$i"."'";
                                                            $pencilid3 = "'"."custZipPencil$i"."'";
                                                            $pencilid4 = "'"."primaryContactPencil$i"."'";
                                                            $pencilid5 = "'"."custTelephonePencil$i"."'";
                                                            $pencilid6 = "'"."custEmailPencil$i"."'";

                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i++ ?></td>
                                                            <td class="custom-text" id="<?php echo "custName".$i; ?>"
                                                                onmouseout="<?php echo "hidePencil('custNamePencil$i'); "?>"
                                                                onmouseover="<?php echo "showPencil('custNamePencil$i'); "?>"
                                                                >
                                                                <i id="<?php echo "custNamePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                                    onclick="updateTableColumn(<?php echo $custName; ?>,'updateCustomer','text',<?php echo $s['_id']; ?>,'custName','Customer Name',<?php echo $pencilid1; ?>)"
                                                                ></i>
                                                                <?php echo $s['custName']; ?>
                                                            </td>
                                                            <td class="custom-text" id="<?php echo "custLocation".$i; ?>"
                                                                onmouseout="<?php echo "hidePencil('custLocationPencil$i'); "?>"
                                                                onmouseover="<?php echo "showPencil('custLocationPencil$i'); "?>"
                                                                >
                                                                <i id="<?php echo "custLocationPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                                    onclick="updateTableColumn(<?php echo $custLocation; ?>,'updateCustomer','text',<?php echo $s['_id']; ?>,'custLocation','Location',<?php echo $pencilid2; ?>)"
                                                                ></i>
                                                                <?php echo $s['custLocation']; ?>
                                                            </td>
                                                            <td class="custom-text" id="<?php echo "custZip".$i; ?>"
                                                                onmouseout="<?php echo "hidePencil('custZipPencil$i'); "?>"
                                                                onmouseover="<?php echo "showPencil('custZipPencil$i'); "?>"
                                                                >
                                                                <i id="<?php echo "custZipPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                                    onclick="updateTableColumn(<?php echo $custZip; ?>,'updateCustomer','text',<?php echo $s['_id']; ?>,'custZip','Zip',<?php echo $pencilid3; ?>)"
                                                                ></i>
                                                                <?php echo $s['custZip']; ?>
                                                            </td>
                                                            <td class="custom-text" id="<?php echo "primaryContact".$i; ?>"
                                                                onmouseout="<?php echo "hidePencil('primaryContactPencil$i'); "?>"
                                                                onmouseover="<?php echo "showPencil('primaryContactPencil$i'); "?>"
                                                                >
                                                                <i id="<?php echo "primaryContactPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                                    onclick="updateTableColumn(<?php echo $primaryContact; ?>,'updateCustomer','text',<?php echo $s['_id']; ?>,'primaryContact','Primary Contact',<?php echo $pencilid4; ?>)"
                                                                ></i>
                                                                <?php echo $s['primaryContact']; ?>
                                                            </td>
                                                            <td class="custom-text" id="<?php echo "custTelephone".$i; ?>"
                                                                onmouseout="<?php echo "hidePencil('custTelephonePencil$i'); "?>"
                                                                onmouseover="<?php echo "showPencil('custTelephonePencil$i'); "?>"
                                                                >
                                                                <i id="<?php echo "custTelephonePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                                    onclick="updateTableColumn(<?php echo $custTelephone; ?>,'updateCustomer','text',<?php echo $s['_id']; ?>,'custTelephone','Telephone',<?php echo $pencilid5; ?>)"
                                                                ></i>
                                                                <?php echo $s['custTelephone']; ?>
                                                            </td>
                                                            <td class="custom-text" id="<?php echo "custEmail".$i; ?>"
                                                                onmouseout="<?php echo "hidePencil('custEmailPencil$i'); "?>"
                                                                onmouseover="<?php echo "showPencil('custEmailPencil$i'); "?>"
                                                                >
                                                                <i id="<?php echo "custEmailPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                                    onclick="updateTableColumn(<?php echo $custEmail; ?>,'updateCustomer','text',<?php echo $s['_id']; ?>,'custEmail','Email',<?php echo $pencilid6; ?>)"
                                                                ></i>
                                                                <?php echo $s['custEmail']; ?>
                                                            </td>
                                                            
                                                            <td>
                                                                <?php if ($counter == 0) { ?>
                                                                    <a href="#" onclick="deleteCustomer(<?php echo $s['_id']; ?>,<?php echo $currencyid; ?>,<?php echo $paymentid; ?>,<?php echo $factoringid; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                                <?php } else { ?>
                                                                    <a href="#" disabled onclick="deleteCurrencyError()"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #adb5bd"></i></a>
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
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <br>
                                <nav aria-label="..." class="float-right">
                                    <ul class="pagination">
                                        <?php
                                        $j = 1;
                                        for ($i = 0; $i < $total_pages; $i++) {
                                            if ($i == 0) {
                                                ?>
                                                <li class="pageitem active"
                                                    onclick="paginate_customer(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                                    id="<?php echo $i; ?>"><a data-id="<?php echo $i; ?>"
                                                        class="page-link"><?php echo $j; ?></a></li>
                                        <?php
                                            } else {
                                                ?>
                                                <li class="pageitem"
                                                    onclick="paginate_customer(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                                    id="<?php echo $i; ?>"><a class="page-link"
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
                    </div>
                </div>
            </div>
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
   
   