<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="truck" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="truck-container" style="z-index: 1400"></div>
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Truck</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search"
                    onkeyup="search_truck(this)" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                    id="AddTruck"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="truck_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">No.</th>
                                        <th scope="col" col width="160" data-priority="1">Truck Number</th>
                                        <th scope="col" col width="160" data-priority="1">Truck Type</th>
                                        <th scope="col" col width="160" data-priority="1">License Plate</th>
                                        <th scope="col" col width="160" data-priority="1">Plate Expiry</th>
                                        <th scope="col" col width="160" data-priority="1">Inspection Expiration</th>
                                        <th scope="col" col width="160" data-priority="1">Status</th>
                                        <th scope="col" col width="160" data-priority="1">Ownership</th>
                                        <th scope="col" col width="160" data-priority="1">Mileage</th>
                                        <th scope="col" col width="160" data-priority="1">Axles</th>
                                        <th scope="col" col width="160" data-priority="1">Year</th>
                                        <th scope="col" col width="160" data-priority="1">Fuel Type </th>
                                        <th scope="col" col width="160" data-priority="1">Start Date</th>
                                        <th scope="col" col width="160" data-priority="1">Deactivation Date</th>
                                        <th scope="col" col width="160" data-priority="1">IFTA Truck</th>
                                        <th scope="col" col width="160" data-priority="1">Registered State </th>
                                        <th scope="col" col width="160" data-priority="1">Insurance Policy</th>
                                        <th scope="col" col width="160" data-priority="1">Empty/Gross Weight</th>
                                        <th scope="col" col width="160" data-priority="1">VIN </th>
                                        <th scope="col" col width="160" data-priority="1">DOT Expiry Date</th>
                                        <th scope="col" col width="160" data-priority="1">Transponder</th>
                                        <th scope="col" col width="160" data-priority="1">Internal Notes</th>
                                        <th scope="col" col width="160" data-priority="1">Action</th>
                                    </tr>
                                </thead>

                                <input type="hidden" id="page_no" value="0">
                                <tbody id="truckBody">
                                    <?php
                                    $limit = 100;
                                    $total_pages = 0;
                                    $cursor = $db->truckadd->find(array('companyID' => $_SESSION['companyId']));
                                    
                                    if (!empty($cursor)) {
                                        foreach ($cursor as $value) {
                                            $total_records = sizeof($value['truck']);
                                            $total_pages = ceil($total_records / $limit);
                                        }
                                    }
                                    
                                    $i = 1;
                                    $collection = $db->truckadd;
                                    $show1 = $collection->aggregate([
                                        ['$lookup' => [
                                            'from' => 'truck_add',
                                            'localField' => 'companyID',
                                            'foreignField' => 'companyID',
                                            'as' => 'truckdetails'
                                        ]],
                                        ['$match'=>['companyID' => $_SESSION['companyId']]],
                                        ['$project'=>['companyID'=>$_SESSION['companyId'],'truck'=>['$slice'=>['$truck',0,$limit]],'truckdetails'=>1]]
                                    ]);
                                     
                                    foreach ($show1 as $row) {
                                        $truck = $row['truck'];
                                        $truckdetails = $row['truckdetails'];
                                        foreach ($truckdetails as $row3) {
                                            $truckmaster = $row3['truck'];
                                            $truck_Type = array();
                                            foreach ($truckmaster as $row4) {
                                                $trucktypeid = $row4['_id'];
                                                $truck_Type[$trucktypeid] = $row4['truckType'];
                                            }
                                        }
                                     
                                        foreach ($truck as $row1) {
                                            $counter = $row1['counter'];
                                            $id = $row['_id'];
                                            $truckid  = $row1['truckType'];
                                            $truckNumber = "'".$row1['truckNumber']."'";
                                            $truckType = $truck_Type[$row1['truckType']];
                                            $licensePlate = "'".$row1['licensePlate']."'";
                                            if(empty($row1['plateExpiry'])) {
                                                $plateExpiry = "";
                                            } else {
                                                $plateExpiry = date('d/m/Y',$row1['plateExpiry']);
                                            }
                                            if(empty($row1['inspectionExpiry'])) {
                                                $inspectionExpiry = "";
                                            } else {
                                                $inspectionExpiry = date('d/m/Y',$row1['inspectionExpiry']);
                                            }
                                            $status = "'".$row1['status']."'";
                                            $ownership = "'".$row1['ownership']."'";
                                            $mileage = "'".$row1['mileage']."'";
                                            $axies = "'".$row1['axies']."'";
                                            $year = "'".$row1['year']."'";
                                            $fuelType = "'".$row1['fuelType']."'";
                                            if(empty($row1['startDate'])) {
                                                $startDate = "";
                                            } else {
                                                $startDate = date('d/m/Y',$row1['startDate']);
                                            }
                                            if(empty($row1['deactivationDate'])){
                                                $deactivationDate = "";
                                            }else {
                                                $deactivationDate = date('d/m/Y',$row1['deactivationDate']);
                                            }
                                            $ifta = "'".$row1['ifta']."'";
                                            $registeredState = "'".$row1['registeredState']."'";
                                            $insurancePolicy = "'".$row1['insurancePolicy']."'";
                                            $grossWeight = "'".$row1['grossWeight']."'";
                                            $vin = "'".$row1['vin']."'";
                                            if(empty($row1['dotexpiryDate'])){
                                                $dotexpiryDate = "";
                                            }else {
                                                $dotexpiryDate = date('d/m/Y',$row1['dotexpiryDate']);
                                            }

                                            $transponder = "'".$row1['transponder']."'";
                                            $internalNotes = "'".$row1['internalNotes']."'"; 
                                            
                                            $pencilid1 = "'"."truckNumberPencil$i"."'";
                                            $pencilid2 = "'"."licensePlatePencil$i"."'";
                                            $pencilid3 = "'"."plateExpiryPencil$i"."'";
                                            $pencilid4 = "'"."inspectionExpiryPencil$i"."'";
                                            $pencilid5 = "'"."statusPencil$i"."'";
                                            $pencilid6 = "'"."ownershipPencil$i"."'";
                                            $pencilid7 = "'"."mileagePencil$i"."'";
                                            $pencilid8 = "'"."axiesPencil$i"."'";
                                            $pencilid9 = "'"."yearPencil$i"."'";
                                            $pencilid10 = "'"."fuelType$i"."'";
                                            $pencilid11 = "'"."startDatePencil$i"."'";
                                            $pencilid12 = "'"."deactivationDatePencil$i"."'";
                                            $pencilid13 = "'"."iftaPencil$i"."'";
                                            $pencilid14 = "'"."registeredStatePencil$i"."'";
                                            $pencilid15 = "'"."insurancePolicyPencil$i"."'";
                                            $pencilid16 = "'"."grossWeightPencil$i"."'";
                                            $pencilid17 = "'"."vinPencil$i"."'";
                                            $pencilid18 = "'"."dotexpiryDatePencil$i"."'";
                                            $pencilid19 = "'"."transponderPencil$i"."'";
                                            $pencilid20 = "'"."internalNotesPencil$i"."'";                                      
                                        ?>
                                    <tr>
                                        <th><?php echo $i++; ?></th>
                                        <td class="custom-text" id="<?php echo "truckNumber".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('truckNumberPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('truckNumberPencil$i'); "?>">
                                            <i id="<?php echo "truckNumberPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $truckNumber; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'truckNumber','Truck Number',<?php echo $pencilid1; ?>)"></i>
                                            <?php echo $row1['truckNumber']; ?>
                                        </td>
                                        <td class="custom-text">
                                            <?php echo $truckType; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "licensePlate".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('licensePlatePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('licensePlatePencil$i'); "?>">
                                            <i id="<?php echo "licensePlatePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $licensePlate; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'licensePlate','License Plate',<?php echo $pencilid2; ?>)"></i>
                                            <?php echo $row1['licensePlate']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "plateExpiry".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('plateExpiryPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('plateExpiryPencil$i'); "?>">
                                            <i id="<?php echo "plateExpiryPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $plateExpiry; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'plateExpiry','Plate Expiry',<?php echo $pencilid3; ?>)"></i>
                                            <?php echo $plateExpiry; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "inspectionExpiry".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('inspectionExpiryPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('inspectionExpiryPencil$i'); "?>">
                                            <i id="<?php echo "inspectionExpiryPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $inspectionExpiry; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'inspectionExpiry','Inspection Expiration',<?php echo $pencilid4; ?>)"></i>
                                            <?php echo $inspectionExpiry; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "status".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('statusPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('statusPencil$i'); "?>">
                                            <i id="<?php echo "statusPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $status; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'status','Status',<?php echo $pencilid5; ?>)"></i>
                                            <?php echo $row1['status']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "ownership".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('ownershipPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('ownershipPencil$i'); "?>">
                                            <i id="<?php echo "ownershipPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $ownership; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'ownership','Ownership',<?php echo $pencilid6; ?>)"></i>
                                            <?php echo $row1['ownership']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "mileage".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('mileagePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('mileagePencil$i'); "?>">
                                            <i id="<?php echo "mileagePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $mileage; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'mileage','Mileage',<?php echo $pencilid7; ?>)"></i>
                                            <?php echo $row1['mileage']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "axies".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('axiesPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('axiesPencil$i'); "?>">
                                            <i id="<?php echo "axiesPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $axies; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'axies','Axies',<?php echo $pencilid8; ?>)"></i>
                                            <?php echo $row1['axies']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "year".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('yearPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('yearPencil$i'); "?>">
                                            <i id="<?php echo "yearPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $year; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'year','Year',<?php echo $pencilid9; ?>)"></i>
                                            <?php echo $row1['year']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "fuelType".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('fuelTypePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('fuelTypePencil$i'); "?>">
                                            <i id="<?php echo "fuelTypePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $fuelType; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'fuelType','Fuel Type',<?php echo $pencilid10; ?>)"></i>
                                            <?php echo $row1['fuelType']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "startDate".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('startDatePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('startDatePencil$i'); "?>">
                                            <i id="<?php echo "startDatePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $startDate; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'startDate','Start Date',<?php echo $pencilid11; ?>)"></i>
                                            <?php echo $startDate; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "deactivationDate".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('deactivationDatePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('deactivationDatePencil$i'); "?>">
                                            <i id="<?php echo "deactivationDatePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $deactivationDate; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'deactivationDate','Deactivation Date',<?php echo $pencilid12; ?>)"></i>
                                            <?php echo $deactivationDate; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "ifta".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('iftaPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('iftaPencil$i'); "?>">
                                            <i id="<?php echo "iftaPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $ifta; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'ifta','IFTA Truck',<?php echo $pencilid13; ?>)"></i>
                                            <?php echo $row1['ifta']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "registeredState".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('registeredStatePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('registeredStatePencil$i'); "?>">
                                            <i id="<?php echo "registeredStatePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $registeredState; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'registeredState','Registered State',<?php echo $pencilid14; ?>)"></i>
                                            <?php echo $row1['registeredState']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "insurancePolicy".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('insurancePolicyPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('insurancePolicyPencil$i'); "?>">
                                            <i id="<?php echo "insurancePolicyPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $insurancePolicy; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'insurancePolicy','Insurance Policy',<?php echo $pencilid15; ?>)"></i>
                                            <?php echo $row1['insurancePolicy']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "grossWeight".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('grossWeightPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('grossWeightPencil$i'); "?>">
                                            <i id="<?php echo "grossWeightPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $grossWeight; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'grossWeight','Empty / Gross Weight',<?php echo $pencilid16; ?>)"></i>
                                            <?php echo $row1['grossWeight']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "vin".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('vinPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('vinPencil$i'); "?>">
                                            <i id="<?php echo "vinPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $vin; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'vin','VIN',<?php echo $pencilid17; ?>)"></i>
                                            <?php echo $row1['vin']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "dotexpiryDate".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('dotexpiryDatePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('dotexpiryDatePencil$i'); "?>">
                                            <i id="<?php echo "dotexpiryDatePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $dotexpiryDate; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'dotexpiryDate','DOT Expiry Date',<?php echo $pencilid18; ?>)"></i>
                                            <?php echo $dotexpiryDate; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "transponder".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('transponderPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('transponderPencil$i'); "?>">
                                            <i id="<?php echo "transponderPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $transponder; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'transponder','Transponder',<?php echo $pencilid19; ?>)"></i>
                                            <?php echo $row1['transponder']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "internalNotes".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('internalNotesPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('internalNotesPencil$i'); "?>">
                                            <i id="<?php echo "internalNotesPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $internalNotes; ?>,'updateTruckAdd','text',<?php echo $row1['_id']; ?>,'internalNotes','Internal Notes',<?php echo $pencilid20; ?>)"></i>
                                            <?php echo $row1['internalNotes']; ?>
                                        </td>
                                        <td>
                                            <?php if ($counter == 0) { ?>
                                            <a href="#"
                                                onclick="deleteTruckAdd(<?php echo $id; ?>,<?php echo $truckid; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></a></i>
                                            <?php } else { ?>
                                            <a href="#" disabled onclick="deleteCurrencyError()"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #adb5bd"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php }
                                        } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Truck Number</th>
                                        <th>Truck Type</th>
                                        <th>License Plate</th>
                                        <th>Plate Expiry</th>
                                        <th>Inspection Expiration</th>
                                        <th>Status</th>
                                        <th>Ownership</th>
                                        <th>Mileage</th>
                                        <th>Axles</th>
                                        <th>Year</th>
                                        <th>Fuel Type </th>
                                        <th>Start Date</th>
                                        <th>Deactivation Date</th>
                                        <th>IFTA Truck</th>
                                        <th>Registered State </th>
                                        <th>Insurance Policy</th>
                                        <th>Empty/Gross Weight</th>
                                        <th>VIN </th>
                                        <th>DOT Expiry Date</th>
                                        <th>Transponder</th>
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
                <button type="button" onclick="exportTruckAdd()"
                    class="mr-1 btn btn-primary waves-effect waves-light float-left">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">
                    Close
                </button>

                <nav aria-label="..." class="float-right">
                    <ul class="pagination" id="paginate">
                        <li id="bank_previous" style="display:none">
                            <a class="page-link btn btn-secondary waves-effect"
                                onclick="previous_page('paginate_trucks','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Previous</a>
                        </li>
                        <select class="form-control" id="page_active"
                            onchange="paginate_trucks(this.value * <?php echo $limit; ?>,<?php echo $limit ?>,<?php echo $total_pages; ?>)">
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
                                onclick="next_page('paginate_trucks','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Next</a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->