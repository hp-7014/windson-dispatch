<?php
session_start();
include '../database/connection.php';
?>

<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Add_Toll"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="toll-container" style="z-index: 1600"></div>
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Add Toll</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" onkeyup="searchText_Toll(this)" placeholder="search" style="margin-left: 5px;">
                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#add_toll_s"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importTolls()">Upload</button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" />
                    </div>

                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV formate</button>
                </form>
                <br>

                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="tech-companies-1" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">No</th>
                                        <th scope="col" col width="160" data-priority="1">Invoice No.</th>
                                        <th scope="col" col width="160" data-priority="3">Transaction Date</th>
                                        <th scope="col" col width="160" data-priority="1">Transaction Type</th>
                                        <th scope="col" col width="160" data-priority="3">Location</th>
                                        <th scope="col" col width="160" data-priority="3">Transponder</th>
                                        <th scope="col" col width="160" data-priority="6">License Plate</th>
                                        <th scope="col" col width="160" data-priority="6">Amount</th>
                                        <th scope="col" col width="160" data-priority="6">Truck No.</th>
                                        <th scope="col" col width="160" data-priority="1">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody id="tollBody">
                                <?php
                                    $limit = 100;
                                    $cursor =  $db->ifta_toll->find(['companyID' => $_SESSION['companyId']]);
                                    
                                    foreach ($cursor as $value) {
                                        $total_records = sizeof($value['tolls']);
                                        $total_pages = ceil($total_records / $limit);
                                    }
                                    
                                    $g_data = $db->ifta_toll->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('tolls' => array('$slice' => [0, $limit]))));
                                    
                                    $i = 1;
                                    
                                    foreach ($g_data as $data) {
                                    $toll_s = $data['tolls'];
                                    
                                    foreach ($toll_s as $toll) {      
                                        $counter = $toll['counter']; 
                                        $truckid = $toll['truckNo'];                             
                                        $tollDate = "'".$toll['tollDate']."'";
                                        $transType = "'".$toll['transType']."'";
                                        $location = "'".$toll['location']."'";
                                        $transponder = "'".$toll['transponder']."'";
                                        $amount = "'".$toll['amount']."'";
                                        $licensePlate = "'".$toll['licensePlate']."'";

                                        $pencilid1 = "'"."tollDatePencil$i"."'";
                                        $pencilid2 = "'"."transTypePencil$i"."'";
                                        $pencilid3 = "'"."locationPencil$i"."'";
                                        $pencilid4 = "'"."transponderPencil$i"."'";
                                        $pencilid5 = "'"."amountPencil$i"."'";
                                        $pencilid6 = "'"."licensePlatePencil$i"."'";

                                ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php  echo $toll['invoiceNumber']; ?>
                                            <td class="custom-text" id="<?php echo "tollDate".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('tollDatePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('tollDatePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "tollDatePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $tollDate; ?>,'updateTolls','text',<?php echo $toll['_id']; ?>,'tollDate','Toll Date',<?php echo $pencilid1; ?>)"
                                                ></i>
                                                <?php echo $toll['tollDate']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "transType".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('transTypePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('transTypePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "transTypePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $transType; ?>,'updateTolls','text',<?php echo $toll['_id']; ?>,'transType','Transaction Type',<?php echo $pencilid2; ?>)"
                                                ></i>
                                                <?php echo $toll['transType']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "location".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('locationPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('locationPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "locationPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $location; ?>,'updateTolls','text',<?php echo $toll['_id']; ?>,'location','Location',<?php echo $pencilid3; ?>)"
                                                ></i>
                                                <?php echo $toll['location']; ?>
                                            </td>                                            
                                            <td class="custom-text" id="<?php echo "transponder".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('transponderPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('transponderPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "transponderPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $transponder; ?>,'updateTolls','text',<?php echo $toll['_id']; ?>,'transponder','Transponder',<?php echo $pencilid4; ?>)"
                                                ></i>
                                                <?php echo $toll['transponder']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "amount".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('amountPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('amountPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "amountPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $amount; ?>,'updateTolls','text',<?php echo $toll['_id']; ?>,'amount','Amount',<?php echo $pencilid5; ?>)"
                                                ></i>
                                                <?php echo $toll['amount']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "licensePlate".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('licensePlatePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('licensePlatePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "licensePlatePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $licensePlate; ?>,'updateTolls','text',<?php echo $toll['_id']; ?>,'licensePlate','License Plate',<?php echo $pencilid6; ?>)"
                                                ></i>
                                                <?php echo $toll['licensePlate']; ?>
                                            </td>
                                            <td><?php echo $toll['truckNo']; ?></td>

                                            <td>
                                                <?php if ($counter == 0) { ?>
                                                    <a href="#" onclick="deleteTolls(<?php echo $toll['_id']; ?>,<?php echo $truckid; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                <?php } else { ?>
                                                    <a href="#" disabled onclick="deleteCurrencyError()"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #adb5bd"></i></a>
                                                <?php } ?>
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
                                        <th>Invoice No.</th>
                                        <th>Transaction Date</th>
                                        <th>Transaction Type</th>
                                        <th>Location</th>
                                        <th>Transponder</th>
                                        <th>License Plate</th>
                                        <th>Amount</th>
                                        <th>Truck No.</th>
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
                                        onclick="paginate_ifta_toll(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                        id="<?php echo $i; ?>"><a data-id="<?php echo $i; ?>"
                                            class="page-link"><?php echo $j; ?></a></li>
                            <?php
                                } else {
                                    ?>
                                    <li class="pageitem"
                                        onclick="paginate_ifta_toll(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
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

            <div class="modal-footer">
                <button type="button" onclick="exportTolls()" class="btn btn-primary waves-effect" data-dismiss="modal">
                    Export
                </button>

                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-----------------------------------------------Add Sub CreditCard------------------------------------------------------------------------------------->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_toll_s"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Toll</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">

                    <div class="form-group col-md-3">
                        <label>Invoice No <span class="mandatory">*</span></label>
                        <div>
                            <select class="form-control " name="invoiceNumber" id="invoiceNumber" >
                                <option value="">Select Invoice No.</option>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Date <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" type="date" name="tollDate" id="tollDate">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Transaction Type <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Transaction Type" type="text" name="transType" id="transType" style="text-transform:uppercase">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Location <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Location" type="text" name="location" id="location" onkeydown="getLocation('location')" >
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Transponder <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Transponder" type="text" name="transponder" id="transponder">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Amount <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Amount" type="text" name="amount" id="amount">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>License Plate <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="License Plate" type="text" name="licensePlate" id="licensePlate">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Truck No <span class="mandatory">*</span></label>
                        <div>
                            <select class="form-control" name="truckNo" id="truckNo" >
                                <option value="">Select Truck Number</option>
                                <?php

                                $show_data = $db->truckadd->find(['companyID' => $_SESSION['companyId']]);

                                foreach ($show_data as $show) {
                                    $show = $show['truck'];
                                    foreach ($show as $s) {
                                        ?>
                                        <option value="<?php echo $s['_id']; ?>"><?php echo $s['truckNumber']; ?></option>
                                    <?php }
                                }?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <label class="text-danger" style="padding-right: 600px"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                <button type="button" onclick="Add_TollData()" class="btn btn-primary waves-effect waves-light" >Save</button>
            </div>

        </div>
    </div> 
</div>
