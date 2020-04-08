<?php session_start();
require "../database/connection.php";
?>

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="External"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
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
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <form action="" method="post" enctype="multipart/form-data">
                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search"
                        onkeyup="search_carrier(this)" placeholder="search" style="margin-left: 5px;">
                    <button type="button" class="btn btn-primary waves-effect waves-light header-title"
                        data-toggle="modal" data-target="#" id="AddCarrier">ADD
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
                                        <th scope="col" col width="160" data-priority="1">Address</th>
                                        <th scope="col" col width="160" data-priority="1">Location</th>
                                        <th scope="col" col width="160" data-priority="1">Zip</th>
                                        <th scope="col" col width="160" data-priority="1">Contact Name</th>
                                        <th scope="col" col width="160" data-priority="1">Email</th>
                                        <th scope="col" col width="160" data-priority="1">Tax ID</th>
                                        <th scope="col" col width="160" data-priority="1">Telephone</th>
                                        <th scope="col" col width="160" data-priority="1">M.C</th>
                                        <th scope="col" col width="160" data-priority="1">D.O.T.</th>
                                        <th scope="col" col width="160" data-priority="1">Action</th>
                                    </tr>
                                </thead>

                                <input type="hidden" id="page_no" value="0">
                                <tbody id="carrierBody">
                                    <?php
                                require 'model/External_Carrier.php';
                                $External_Carrier = new External_Carrier();
                                $limit = 100;
                                $total_pages = 0;
                                $cursor = $db->carrier->find(array('companyID' => $_SESSION['companyId']));
                                
                                if (!empty($cursor)) {
                                    foreach ($cursor as $value) {
                                        $total_records = sizeof($value['carrier']);
                                        $total_pages = ceil($total_records / $limit);
                                    }
                                }

                                $show_data = $db->carrier->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('carrier' => array('$slice' => [0, $limit]))));

                                $i = 1;

                                foreach ($show_data as $show) {
                                    $show = $show['carrier'];
                                    foreach ($show as $s) {
                                        $counter = $s['counter'];
                                        $paymentid = $s['paymentTerms'];
                                        $factoringid = $s['factoringCompany'];
                                        $name = "'" . $s['name'] . "'";
                                        $address = "'" . $s['address'] . "'";
                                        $location = "'" . $s['location'] . "'";
                                        $zip = "'" . $s['zip'] . "'";
                                        $contactName = "'" . $s['contactName'] . "'";
                                        $email = "'" . $s['email'] . "'";
                                        $taxID = "'" . $s['taxID'] . "'";
                                        $telephone = "'" . $s['telephone'] . "'";
                                        $mc = "'" . $s['mc'] . "'";
                                        $dot = "'" . $s['dot'] . "'";

                                        $pencilid1 = "'" . "namepencil$i" . "'";
                                        $pencilid2 = "'" . "addressPencil$i" . "'";
                                        $pencilid3 = "'" . "locationPencil$i" . "'";
                                        $pencilid4 = "'" . "zipPencil$i" . "'";
                                        $pencilid5 = "'" . "contactNamePencil$i" . "'";
                                        $pencilid6 = "'" . "emailPencil$i" . "'";
                                        $pencilid7 = "'" . "taxIDPencil$i" . "'";
                                        $pencilid8 = "'" . "telephonePencil$i" . "'";
                                        $pencilid9 = "'" . "mcPencil$i" . "'";
                                        $pencilid10 = "'" . "dotPencil$i" . "'";

                                    ?>
                                    <tr>
                                        <th><?php echo $i++; ?></th>
                                        <td class="custom-text" id="<?php echo "name".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('namePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('namePencil$i'); "?>">
                                            <i id="<?php echo "namePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $name; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'name','Name',<?php echo $pencilid1; ?>)">
                                                </inpu>
                                                <?php echo $s['name']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "address".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('addressPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('addressPencil$i'); "?>">
                                            <i id="<?php echo "addressPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $address; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'address','Address',<?php echo $pencilid2; ?>)"></i>
                                            <?php echo $s['address']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "location".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('locationPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('locationPencil$i'); "?>">
                                            <i id="<?php echo "locationPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $location; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'location','Location',<?php echo $pencilid3; ?>)"></i>
                                            <?php echo $s['location']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "zip".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('zipPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('zipPencil$i'); "?>">
                                            <i id="<?php echo "zipPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $zip; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'zip','Zip',<?php echo $pencilid4; ?>)"></i>
                                            <?php echo $s['zip']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "contactName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('contactNamePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('contactNamePencil$i'); "?>">
                                            <i id="<?php echo "contactNamePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $contactName; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'contactName','Contact Name',<?php echo $pencilid5; ?>)"></i>
                                            <?php echo $s['contactName']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "email".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('emailPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('emailPencil$i'); "?>">
                                            <i id="<?php echo "emailPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $email; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'email','Email',<?php echo $pencilid6; ?>)"></i>
                                            <?php echo $s['email']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "taxID".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('taxIDPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('taxIDPencil$i'); "?>">
                                            <i id="<?php echo "taxIDPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $taxID; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'taxID','Tax ID',<?php echo $pencilid7; ?>)"></i>
                                            <?php echo $s['taxID']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "telephone".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('telephonePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('telephonePencil$i'); "?>">
                                            <i id="<?php echo "telephonePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $telephone; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'telephone','Telephone',<?php echo $pencilid8; ?>)"></i>
                                            <?php echo $s['telephone']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "mc".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('mcPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('mcPencil$i'); "?>">
                                            <i id="<?php echo "mcPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $mc; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'mc','M.C. #',<?php echo $pencilid9; ?>)"></i>
                                            <?php echo $s['mc']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "dot".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('dotPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('dotPencil$i'); "?>">
                                            <i id="<?php echo "dotPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $dot; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'dot','D.O.T',<?php echo $pencilid10; ?>)"></i>
                                            <?php echo $s['dot']; ?>
                                        </td>
                                        <td>
                                            <?php if ($counter == 0) { ?>
                                            <a href="#"
                                                onclick="deleteExternal(<?php echo $s['_id']; ?>,<?php echo $paymentid; ?>,<?php echo $factoringid; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></i></a>
                                            <?php } else { ?>
                                            <a href="#" disabled onclick="deleteCurrencyError()"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #adb5bd"></i></a>
                                            <?php } ?>
                                            <a href="#" onclick="editExternalCarrier(<?php echo $s['_id']; ?>)"><i
                                                    data-toggle="tooltip" data-placement="top" title="Edit Detail"
                                                    class="mdi mdi-file-document-edit-outline editModal"></i></a>
                                        </td>
                                    </tr>
                                    ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td class="custom-text" id="<?php echo "name" . $i; ?>"
                                            onmouseout="<?php echo "hidePencil('namePencil$i'); " ?>"
                                            onmouseover="<?php echo "showPencil('namePencil$i'); " ?>">
                                            <i id="<?php echo "namePencil" . $i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $name; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'name','Name',<?php echo $pencilid1; ?>)"></i>
                                            <?php echo $s['name']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "address" . $i; ?>"
                                            onmouseout="<?php echo "hidePencil('addressPencil$i'); " ?>"
                                            onmouseover="<?php echo "showPencil('addressPencil$i'); " ?>">
                                            <i id="<?php echo "addressPencil" . $i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $address; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'address','Address',<?php echo $pencilid2; ?>)"></i>
                                            <?php echo $s['address']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "location" . $i; ?>"
                                            onmouseout="<?php echo "hidePencil('locationPencil$i'); " ?>"
                                            onmouseover="<?php echo "showPencil('locationPencil$i'); " ?>">
                                            <i id="<?php echo "locationPencil" . $i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $location; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'location','Location',<?php echo $pencilid3; ?>)"></i>
                                            <?php echo $s['location']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "zip" . $i; ?>"
                                            onmouseout="<?php echo "hidePencil('zipPencil$i'); " ?>"
                                            onmouseover="<?php echo "showPencil('zipPencil$i'); " ?>">
                                            <i id="<?php echo "zipPencil" . $i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $zip; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'zip','Zip',<?php echo $pencilid4; ?>)"></i>
                                            <?php echo $s['zip']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "contactName" . $i; ?>"
                                            onmouseout="<?php echo "hidePencil('contactNamePencil$i'); " ?>"
                                            onmouseover="<?php echo "showPencil('contactNamePencil$i'); " ?>">
                                            <i id="<?php echo "contactNamePencil" . $i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $contactName; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'contactName','Contact Name',<?php echo $pencilid5; ?>)"></i>
                                            <?php echo $s['contactName']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "email" . $i; ?>"
                                            onmouseout="<?php echo "hidePencil('emailPencil$i'); " ?>"
                                            onmouseover="<?php echo "showPencil('emailPencil$i'); " ?>">
                                            <i id="<?php echo "emailPencil" . $i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $email; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'email','Email',<?php echo $pencilid6; ?>)"></i>
                                            <?php echo $s['email']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "taxID" . $i; ?>"
                                            onmouseout="<?php echo "hidePencil('taxIDPencil$i'); " ?>"
                                            onmouseover="<?php echo "showPencil('taxIDPencil$i'); " ?>">
                                            <i id="<?php echo "taxIDPencil" . $i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $taxID; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'taxID','Tax ID',<?php echo $pencilid7; ?>)"></i>
                                            <?php echo $s['taxID']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "telephone" . $i; ?>"
                                            onmouseout="<?php echo "hidePencil('telephonePencil$i'); " ?>"
                                            onmouseover="<?php echo "showPencil('telephonePencil$i'); " ?>">
                                            <i id="<?php echo "telephonePencil" . $i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $telephone; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'telephone','Telephone',<?php echo $pencilid8; ?>)"></i>
                                            <?php echo $s['telephone']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "mc" . $i; ?>"
                                            onmouseout="<?php echo "hidePencil('mcPencil$i'); " ?>"
                                            onmouseover="<?php echo "showPencil('mcPencil$i'); " ?>">
                                            <i id="<?php echo "mcPencil" . $i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $mc; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'mc','M.C. #',<?php echo $pencilid9; ?>)"></i>
                                            <?php echo $s['mc']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "dot" . $i; ?>"
                                            onmouseout="<?php echo "hidePencil('dotPencil$i'); " ?>"
                                            onmouseover="<?php echo "showPencil('dotPencil$i'); " ?>">
                                            <i id="<?php echo "dotPencil" . $i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $dot; ?>,'updateExternal','text',<?php echo $s['_id']; ?>,'dot','D.O.T',<?php echo $pencilid10; ?>)"></i>
                                            <?php echo $s['dot']; ?>
                                        </td>
                                        <td>
                                            <?php if ($counter == 0) { ?>
                                            <a href="#"
                                                onclick="deleteExternal(<?php echo $s['_id']; ?>,<?php echo $paymentid; ?>,<?php echo $factoringid; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></i></a>
                                            <?php } else { ?>
                                            <a href="#" disabled onclick="deleteCurrencyError()"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #adb5bd"></i></a>
                                            <?php } ?>
                                            <a href="#" onclick="editExternalCarrier(<?php echo $s['_id']; ?>)"><i
                                                    id="editDriverDetail" data-toggle="tooltip" data-placement="top"
                                                    title="Edit Detail"
                                                    class="mdi mdi-file-document-edit-outline editModal"></i></a>
                                        </td>
                                    </tr>
                                    <?php }
                                } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Zip</th>
                                        <th>Contact Namr</th>
                                        <th>Email</th>
                                        <th>Tax ID</th>
                                        <th>Telephone</th>
                                        <th>M.C.</th>
                                        <th>D.O.T.</th>
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
                                onclick="paginate_carrier(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                id="<?php echo $i; ?>"><a data-id="<?php echo $i; ?>"
                                    class="page-link"><?php echo $j; ?></a></li>
                            <?php
                                } else {
                                    ?>
                            <li class="pageitem"
                                onclick="paginate_carrier(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
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
            <div class="modal-footer1">
                <button type="button" class="mr-1 btn btn-danger waves-effect float-left" data-dismiss="modal">
                    Close
                </button>
                <nav aria-label="..." class="float-right">
                    <ul class="pagination" id="paginate">
                        <li id="bank_previous" style="display:none">
                            <a class="page-link btn btn-secondary waves-effect"
                                onclick="previous_page('paginate_carrier','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Previous</a>
                        </li>
                        <select class="form-control" id="page_active"
                            onchange="paginate_carrier(this.value * <?php echo $limit; ?>,<?php echo $limit ?>,<?php echo $total_pages; ?>)">
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
                                onclick="next_page('paginate_carrier','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Next</a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->