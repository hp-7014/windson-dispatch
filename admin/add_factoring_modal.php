<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="factoring"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Factoring Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="factoring-container" style="z-index: 1600"></div>

                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search"
                    onkeyup="search_factoring(this)" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" id="AddFactoring"><i
                        class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="factoring_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">No</th>
                                        <th scope="col" col width="160" data-priority="1">
                                            <marquee width="140px" direction="left" height="17px" scrollamount="1">
                                                Factoring Company Name</marquee>
                                        </th>
                                        <th scope="col" col width="160" data-priority="1">Address</th>
                                        <th scope="col" col width="160" data-priority="1">Location</th>
                                        <th scope="col" col width="160" data-priority="1">Postal/Zip</th>
                                        <th scope="col" col width="160" data-priority="1">Primary Contact</th>
                                        <th scope="col" col width="160" data-priority="1">Telephone</th>
                                        <th scope="col" col width="160" data-priority="1">Ext</th>
                                        <th scope="col" col width="160" data-priority="1">Fax</th>
                                        <th scope="col" col width="160" data-priority="1">Toll Free</th>
                                        <th scope="col" col width="160" data-priority="1">Contact Email</th>
                                        <th scope="col" col width="160" data-priority="1">Secondary Contact</th>
                                        <th scope="col" col width="160" data-priority="1">Telephone</th>
                                        <th scope="col" col width="160" data-priority="1">Ext</th>
                                        <th scope="col" col width="160" data-priority="1">Currency Setting</th>
                                        <th scope="col" col width="160" data-priority="1">Payment Terms</th>
                                        <th scope="col" col width="160" data-priority="1">Tax ID</th>
                                        <th scope="col" col width="160" data-priority="1">Internal Notes</th>
                                        <th scope="col" col width="160" data-priority="1">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="factoringBody">
                                    <?php
                                    $limit = 100;
                                    $cursor = $db->factoring_company_add->find(array('companyID' => $_SESSION['companyId']));
                                    
                                    foreach ($cursor as $value) {
                                        $total_records = sizeof($value['factoring']);
                                        $total_pages = ceil($total_records / $limit);
                                    }

                                    $i = 1;
                                    $collection = $db->factoring_company_add;
                                    $show1 = $collection->aggregate([
                                        ['$lookup' => [
                                            'from' => 'currency_add',
                                            'localField' => 'companyID', 
                                            'foreignField' => 'companyID',
                                            'as' => 'currency_1'
                                        ]],
                                        ['$lookup' => [
                                            'from' => 'payment_terms',
                                            'localField' => 'companyID', 
                                            'foreignField' => 'companyID',
                                            'as' => 'payment_1'
                                        ]],
                                        ['$match'=>['companyID' => $_SESSION['companyId']]],
                                        ['$project'=>['companyID'=>$_SESSION['companyId'],'factoring'=>['$slice'=>['$factoring',0,$limit]],'payment_1'=>1,'currency_1'=>1]]
                                    ]);
                                    
                                    foreach ($show1 as $row) {
                                        $factoring = $row['factoring'];
                                        $currency_1 = $row['currency_1'];
                                        $payment_1 = $row['payment_1'];

                                        foreach ($currency_1 as $row2) {
                                            $currency = $row2['currency'];
                                            $currencyType = array();
                                            foreach ($currency as $row3) {
                                                $currencyid = $row3['_id'];
                                                $currencyType[$currencyid] = $row3['currencyType'];
                                            }
                                        }

                                        foreach ($payment_1 as $row4) {
                                            $payment = $row4['payment'];
                                            $paymentTerm = array();
                                            foreach ($payment as $row5) {
                                                $paymentid = $row5['_id'];
                                                $paymentTerm[$paymentid] = $row5['paymentTerm'];  
                                            }
                                        }
                                    
                                        foreach ($factoring as $row5) {
                                            $id  = $row5['_id'];
                                            $counter = $row5['counter'];
                                            $factoringCompanyname = "'".$row5['factoringCompanyname']."'";
                                            $address = "'".$row5['address']."'";
                                            $location = "'".$row5['location']."'";
                                            $zip = "'".$row5['zip']."'";
                                            $primaryContact = "'".$row5['primaryContact']."'";
                                            $telephone = "'".$row5['telephone']."'";
                                            $extFactoring = "'".$row5['extFactoring']."'";
                                            $fax = "'".$row5['fax']."'";
                                            $tollFree = "'".$row5['tollFree']."'";
                                            $email = "'".$row5['email']."'";
                                            $secondaryContact = "'".$row5['secondaryContact']."'";
                                            $factoringtelephone = "'".$row5['factoringtelephone']."'";
                                            $ext = "'".$row5['ext']."'";
                                            $currencySetting = $currencyType[$row5['currencySetting']];
                                            $currencyid = $row5['currencySetting'];
                                            $paymentTerms = $paymentTerm[$row5['paymentTerms']];
                                            $paymentid = $row5['paymentTerms'];
                                            $taxID = "'".$row5['taxID']."'";
                                            $internalNote = "'".$row5['internalNote']."'";
                                            
                                            $pencilid1 = "'"."factoringCompanynamePencil$i"."'"; 
                                            $pencilid2 = "'"."addressPencil$i"."'";
                                            $pencilid3 = "'"."locationPencil$i"."'";
                                            $pencilid4 = "'"."zipPencil$i"."'";
                                            $pencilid5 = "'"."primaryContactPencil$i"."'";
                                            $pencilid6 = "'"."telephonePencil$i"."'";
                                            $pencilid7 = "'"."extFactoringPencil$i"."'";
                                            $pencilid8 = "'"."faxPencil$i"."'";
                                            $pencilid9 = "'"."tollFreePencil$i"."'";
                                            $pencilid10 = "'"."emailPencil$i"."'";
                                            $pencilid11 = "'"."secondaryContactPencil$i"."'";
                                            $pencilid12 = "'"."factoringtelephonePencil$i"."'";
                                            $pencilid13 = "'"."extPencil$i"."'";
                                            $pencilid14 = "'"."taxIDPencil$i"."'";
                                            $pencilid15 = "'"."internalNotePencil$i"."'";
                                ?>
                                    <tr>
                                        <th><?php echo $i++; ?></th>
                                        <td class="custom-text" id="<?php echo "factoringCompanyname".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('factoringCompanynamePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('factoringCompanynamePencil$i'); "?>">
                                            <i id="<?php echo "factoringCompanynamePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $factoringCompanyname; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'factoringCompanyname','Factoring Company',<?php echo $pencilid1; ?>)"></i>
                                            <?php echo $row5['factoringCompanyname']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "address".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('addressPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('addressPencil$i'); "?>">
                                            <i id="<?php echo "addressPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $address; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'address','Address',<?php echo $pencilid2; ?>)"></i>
                                            <?php echo $row5['address']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "location".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('locationPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('locationPencil$i'); "?>">
                                            <i id="<?php echo "locationPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $location; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'location','Location',<?php echo $pencilid3; ?>)"></i>
                                            <?php echo $row5['location']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "zip".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('zipPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('zipPencil$i'); "?>">
                                            <i id="<?php echo "zipPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $zip; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'zip','Postal / Zip',<?php echo $pencilid4; ?>)"></i>
                                            <?php echo $row5['zip']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "primaryContact".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('primaryContactPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('primaryContactPencil$i'); "?>">
                                            <i id="<?php echo "primaryContactPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $primaryContact; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'primaryContact','Priamry Contact',<?php echo $pencilid5; ?>)"></i>
                                            <?php echo $row5['primaryContact']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "telephone".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('telephonePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('telephonePencil$i'); "?>">
                                            <i id="<?php echo "telephonePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $telephone; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'telephone','Telephone',<?php echo $pencilid6; ?>)"></i>
                                            <?php echo $row5['telephone']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "extFactoring".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('extFactoringPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('extFactoringPencil$i'); "?>">
                                            <i id="<?php echo "extFactoringPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $extFactoring; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'extFactoring','Ext Factoring',<?php echo $pencilid7; ?>)"></i>
                                            <?php echo $row5['extFactoring']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "fax".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('faxPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('faxPencil$i'); "?>">
                                            <i id="<?php echo "faxPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $fax; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'fax','Fax',<?php echo $pencilid8; ?>)"></i>
                                            <?php echo $row5['fax']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "tollFree".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('tollFreePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('tollFreePencil$i'); "?>">
                                            <i id="<?php echo "tollFreePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $tollFree; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'tollFree','Toll Free',<?php echo $pencilid9; ?>)"></i>
                                            <?php echo $row5['tollFree']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "email".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('emailPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('emailPencil$i'); "?>">
                                            <i id="<?php echo "emailPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $email; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'email','Contact Email',<?php echo $pencilid10; ?>)"></i>
                                            <?php echo $row5['email']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "secondaryContact".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('secondaryContactPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('secondaryContactPencil$i'); "?>">
                                            <i id="<?php echo "secondaryContactPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $secondaryContact; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'secondaryContact','secondary Contact',<?php echo $pencilid11; ?>)"></i>
                                            <?php echo $row5['secondaryContact']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "factoringtelephone".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('factoringtelephonePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('factoringtelephonePencil$i'); "?>">
                                            <i id="<?php echo "factoringtelephonePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $factoringtelephone; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'factoringtelephone','Fac Telephone',<?php echo $pencilid12; ?>)"></i>
                                            <?php echo $row5['factoringtelephone']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "ext".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('extPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('extPencil$i'); "?>">
                                            <i id="<?php echo "extPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $ext; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'ext','Ext',<?php echo $pencilid13; ?>)"></i>
                                            <?php echo $row5['ext']; ?>
                                        </td>
                                        <td class="custom-text">
                                            <?php echo $currencySetting; ?>
                                        </td>
                                        <td class="custom-text">
                                            <?php echo $paymentTerms; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "taxID".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('taxIDPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('taxIDPencil$i'); "?>">
                                            <i id="<?php echo "taxIDPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $taxID; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'taxID','Tax ID',<?php echo $pencilid14; ?>)"></i>
                                            <?php echo $row5['taxID']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "internalNote".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('internalNotePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('internalNotePencil$i'); "?>">
                                            <i id="<?php echo "internalNotePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $internalNote; ?>,'updateFactoring','text',<?php echo $row5['_id']; ?>,'internalNote','Internal Notes',<?php echo $pencilid15; ?>)"></i>
                                            <?php echo $row5['internalNote']; ?>
                                        </td>
                                        <td>
                                            <?php if($counter == 0) { ?>
                                            <a href="#"
                                                onclick="deletefactoring(<?php echo $id; ?>,<?php echo $currencyid; ?>,<?php echo $paymentid; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></a></i>
                                            <?php } else { ?>
                                            <a href="#" disabled onclick="deleteCurrencyError()"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #adb5bd"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    } ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>
                                            <marquee width="140px" direction="left" height="17px" scrollamount="1">
                                                Factoring Company Name</marquee>
                                        </th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Postal/Zip</th>
                                        <th>Primary Contact</th>
                                        <th>Telephone</th>
                                        <th>Ext</th>
                                        <th>Fax</th>
                                        <th>Toll Free</th>
                                        <th>Contact Email</th>
                                        <th>Secondary Contact</th>
                                        <th>Telephone</th>
                                        <th>Ext</th>
                                        <th>Currency Setting</th>
                                        <th>Payment Terms</th>
                                        <th>Tax ID</th>
                                        <th>Internal Notes</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer1">
                <button type="button" onclick="exportFactoring()"
                    class="mr-1 btn btn-primary waves-effect waves-light float-left">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">
                    Close
                </button>

                <nav aria-label="..." class="float-right">
                    <ul class="pagination" id="paginate">
                        <li id="bank_previous" style="display:none">
                            <a class="page-link btn btn-secondary waves-effect"
                                onclick="previous_page('paginate_factoring','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Previous</a>
                        </li>
                        <select class="form-control" id="page_active"
                            onchange="paginate_factoring(this.value * <?php echo $limit; ?>,<?php echo $limit ?>,<?php echo $total_pages; ?>)">
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
                                onclick="next_page('paginate_factoring','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Next</a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->