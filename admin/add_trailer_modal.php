<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="trailer"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Trailer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="trailer-container-admin" style="z-index: 1800"></div>
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" onkeyup="search_trailer(this)" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#" id="AddTrailer"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="trailer_table" class="scroll" >
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">No</th>
                                        <th scope="col" col width="160" data-priority="1">Trailer Number</th>
                                        <th scope="col" col width="160" data-priority="1">Trailer Type</th>
                                        <th scope="col" col width="160" data-priority="3">License Plate</th>
                                        <th scope="col" col width="160" data-priority="1">Plate Expiry</th>
                                        <th scope="col" col width="160" data-priority="3">Inspection Expiration</th>
                                        <th scope="col" col width="160" data-priority="3">Status</th>
                                        <th scope="col" col width="160" data-priority="6">Model</th>
                                        <th scope="col" col width="160" data-priority="6">Year</th>
                                        <th scope="col" col width="160" data-priority="6">Axles</th>
                                        <th scope="col" col width="160" data-priority="1">Registered State</th>
                                        <th scope="col" col width="160" data-priority="3">VIN</th>
                                        <th scope="col" col width="160" data-priority="1">DOT Expiry Date</th>
                                        <th scope="col" col width="160" data-priority="3">Activation Date</th>
                                        <th scope="col" col width="160" data-priority="3">Internal Notes</th>
                                        <th scope="col" col width="160" data-priority="6">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="trailerBody">
                                <?php
                                    $limit = 100;
                                    $cursor = $db->trailer_admin_add->find(array('companyID' => $_SESSION['companyId']));
                                    
                                    foreach ($cursor as $value) {
                                        $total_records = sizeof($value['trailer']);
                                        $total_pages = ceil($total_records / $limit);
                                    }

                                    $i = 1;
                                    $collection = $db->trailer_admin_add;
                                    $show1 = $collection->aggregate([
                                        ['$lookup' => [
                                            'from' => 'trailer_add',
                                            'localField' => 'companyID',
                                            'foreignField' => 'companyID',
                                            'as' => 'trailerdetails'
                                        ]],
                                        ['$match'=>['companyID' => $_SESSION['companyId']]],
                                        ['$project'=>['companyID'=>$_SESSION['companyId'],'trailer'=>['$slice'=>['$trailer',0,$limit]],'trailerdetails'=>1]]
                                    ]);

                                    foreach ($show1 as $row) {
                                        $trailer = $row['trailer'];
                                        $trailerdetails = $row['trailerdetails'];
                                        foreach ($trailerdetails as $row2) {
                                            $trailermaster = $row2['trailer'];
                                            $trailer_type = array();
                                            foreach ($trailermaster as $row3) {
                                                $trailerid = $row3['_id'];
                                                $trailer_type[$trailerid] = $row3['trailerType'];
                                            }
                                        }
                                
                                        foreach ($trailer as $row1) {
                                            $counter = $row1['counter'];
                                            $id = $row1['_id'];
                                            $trailerT = $row1['trailerType'];
                                            $trailerNumber = "'".$row1['trailerNumber']."'";
                                            $trailerType = $trailer_type[$row1['trailerType']];
                                            $licenseType = "'".$row1['licenseType']."'";
                                            if(empty($row1['plateExpiry'])) {
                                                $plateExpiry = "";
                                            } else {
                                                $plateExpiry = date('d/m/Y',$row1['plateExpiry']);
                                            }
                                            if(empty($row1['inspectionExpiration'])) {
                                                $inspectionExpiration = "";
                                            } else {
                                                $inspectionExpiration = date('d/m/Y',$row1['inspectionExpiration']);
                                            }
                                            $status_r = "'".$row1['status']."'";
                                            $model = "'".$row1['model']."'";
                                            $year = "'".$row1['year']."'";
                                            $axies = "'".$row1['axies']."'";
                                            $registeredState = "'".$row1['registeredState']."'";
                                            $vin = "'".$row1['vin']."'";
                                            if(empty($row1['dot'])) {
                                                $dot = "";
                                            } else {
                                                $dot = date('d/m/Y',$row1['dot']);
                                            }
                                            
                                            if(empty($row1['activationDate'])) {
                                                $activationDate = "";
                                            } else {
                                                $activationDate = date('d/m/Y',$row1['activationDate']);
                                            }
                                            $internalNotes = "'".$row1['internalNotes']."'";
                                            
                                            $pencilid1 = "'"."trailerNumberPencil$i"."'"; 
                                            $pencilid2 = "'"."licenseTypePencil$i"."'";
                                            $pencilid3 = "'"."plateExpiryPencil$i"."'";
                                            $pencilid4 = "'"."inspectionExpirationPencil$i"."'";
                                            $pencilid5 = "'"."statusPencil$i"."'";
                                            $pencilid6 = "'"."modelPencil$i"."'";
                                            $pencilid7 = "'"."yearPencil$i"."'";
                                            $pencilid8 = "'"."axiesPencil$i"."'";
                                            $pencilid9 = "'"."registeredStatePencil$i"."'";
                                            $pencilid10 = "'"."vinPencil$i"."'";
                                            $pencilid11 = "'"."dotPencil$i"."'";
                                            $pencilid12 = "'"."activationDatePencil$i"."'";
                                            $pencilid13 = "'"."internalNotesPencil$i"."'";
                                ?>

                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td class="custom-text" id="<?php echo "trailerNumber".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('trailerNumberPencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('trailerNumberPencil$i'); "?>"
                                        >
                                        <i id="<?php echo "trailerNumberPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $trailerNumber; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'trailerNumber','Trailer Number',<?php echo $pencilid1; ?>)"
                                        ></i>
                                        <?php echo $row1['trailerNumber']; ?>
                                    </td>
                                    <td class="custom-text">
                                        <?php echo  $trailerType; ?>
                                    </td>
                                    <td class="custom-text" id="<?php echo "licenseType".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('licenseTypePencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('licenseTypePencil$i'); "?>"
                                        >
                                        <i id="<?php echo "licenseTypePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $licenseType; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'licenseType','License Plate',<?php echo $pencilid2; ?>)"
                                        ></i>
                                        <?php echo $row1['licenseType']; ?>
                                    </td>
                                    <td class="custom-text" id="<?php echo "plateExpiry".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('plateExpiryPencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('plateExpiryPencil$i'); "?>"
                                        >
                                        <i id="<?php echo "plateExpiryPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $plateExpiry; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'plateExpiry','Plate Expiry',<?php echo $pencilid3; ?>)"
                                        ></i>
                                        <?php echo $plateExpiry; ?>
                                    </td>
                                    <td class="custom-text" id="<?php echo "inspectionExpiration".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('inspectionExpirationPencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('inspectionExpirationPencil$i'); "?>"
                                        >
                                        <i id="<?php echo "inspectionExpirationPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $inspectionExpiration; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'inspectionExpiration','Inspection Expiration',<?php echo $pencilid4; ?>)"
                                        ></i>
                                        <?php echo $inspectionExpiration; ?>
                                    </td>
                                    <td class="custom-text" id="<?php echo "status".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('statusPencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('statusPencil$i'); "?>"
                                        >
                                        <i id="<?php echo "statusPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $status_r; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'status','Status',<?php echo $pencilid5; ?>)"
                                        ></i>
                                        <?php echo $row1['status']; ?>
                                    </td>
                                    <td class="custom-text" id="<?php echo "model".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('modelPencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('modelPencil$i'); "?>"
                                        >
                                        <i id="<?php echo "modelPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $model; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'model','Status',<?php echo $pencilid6; ?>)"
                                        ></i>
                                        <?php echo $row1['model']; ?>
                                    </td>
                                    <td class="custom-text" id="<?php echo "year".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('yearPencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('yearPencil$i'); "?>"
                                        >
                                        <i id="<?php echo "yearPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $year; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'year','Year',<?php echo $pencilid7; ?>)"
                                        ></i>
                                        <?php echo $row1['year']; ?>
                                    </td>
                                    <td class="custom-text" id="<?php echo "axies".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('axiesPencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('axiesPencil$i'); "?>"
                                        >
                                        <i id="<?php echo "axiesPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $axies; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'axies','Axios',<?php echo $pencilid8; ?>)"
                                        ></i>
                                        <?php echo $row1['axies']; ?>
                                    </td>
                                    <td class="custom-text" id="<?php echo "registeredState".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('registeredStatePencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('registeredStatePencil$i'); "?>"
                                        >
                                        <i id="<?php echo "registeredStatePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $registeredState; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'registeredState','Registered State',<?php echo $pencilid9; ?>)"
                                        ></i>
                                        <?php echo $row1['registeredState']; ?>
                                    </td>
                                    <td class="custom-text" id="<?php echo "vin".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('vinPencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('vinPencil$i'); "?>"
                                        >
                                        <i id="<?php echo "vinPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $vin; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'vin','VIN',<?php echo $pencilid10; ?>)"
                                        ></i>
                                        <?php echo $row1['vin']; ?>
                                    </td>
                                    <td class="custom-text" id="<?php echo "dot".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('dotPencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('dotPencil$i'); "?>"
                                        >
                                        <i id="<?php echo "dotPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $dot; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'dot','Dot Expiry Date',<?php echo $pencilid11; ?>)"
                                        ></i>
                                        <?php echo $dot; ?>
                                    </td>
                                    <td class="custom-text" id="<?php echo "activationDate".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('activationDatePencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('activationDatePencil$i'); "?>"
                                        >
                                        <i id="<?php echo "activationDatePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $activationDate; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'activationDate','Activation Date',<?php echo $pencilid12; ?>)"
                                        ></i>
                                        <?php echo $activationDate; ?>
                                    </td>
                                    <td class="custom-text" id="<?php echo "internalNotes".$i; ?>"
                                        onmouseout="<?php echo "hidePencil('internalNotesPencil$i'); "?>"
                                        onmouseover="<?php echo "showPencil('internalNotesPencil$i'); "?>"
                                        >
                                        <i id="<?php echo "internalNotesPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                            onclick="updateTableColumn(<?php echo $internalNotes; ?>,'updateTrailerAdd','text',<?php echo $row1['_id']; ?>,'internalNotes','Internal Notes',<?php echo $pencilid13; ?>)"
                                        ></i>
                                        <?php echo $row1['internalNotes']; ?>
                                    </td>
                                    <td>
                                        <?php if ($counter == 0) { ?>
                                            <a href="#" onclick="deleteTrailerAdd(<?php echo $id; ?>,<?php echo $trailerT; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></a></i>
                                        <?php } else { ?>
                                            <a href="#" disabled onclick="deleteCurrencyError()"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #adb5bd"></i></a>
                                        <?php } ?>
                                    </td>

                                    <?php }
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Trailer Number</th>
                                        <th>Trailer Type</th>
                                        <th>License Plate</th>
                                        <th>Plate Expiry</th>
                                        <th>Inspection Expiration</th>
                                        <th>Status</th>
                                        <th>Model</th>
                                        <th>Year</th>
                                        <th>Axles</th>
                                        <th>Registered State</th>
                                        <th>VIN</th>
                                        <th>DOT Expiry Date</th>
                                        <th>Activation Date</th>
                                        <th>Internal Notes</th>
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
                                        onclick="paginate_trailer(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                        id="<?php echo $i; ?>"><a data-id="<?php echo $i; ?>"
                                            class="page-link"><?php echo $j; ?></a></li>
                            <?php
                                } else {
                                    ?>
                                    <li class="pageitem"
                                        onclick="paginate_trailer(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
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
                <button type="button" onclick="exportTrailerAdd()" class="btn btn-primary waves-effect waves-light">
                    Export
                </button>
                <button type="button" class="btn btn-danger waves-effect"  data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
