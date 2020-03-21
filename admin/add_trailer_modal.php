<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="trailer"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="trailer-container" style="z-index: 1600"></div>
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">

                <div class="trailer-container" style="z-index: 1600"></div>

                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Trailer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#" id="AddTrailer"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="trailer_table" class="scroll" >
                                <thead>
                                    <tr>
                                        <th scope="col" col width="160">No</th>
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
                                $i = 1;
                                $collection = $db->trailer_admin_add;
                                    $show1 = $collection->aggregate([
                                        ['$lookup' => [
                                            'from' => 'trailer_add',
                                            'localField' => 'companyID', 
                                            'foreignField' => 'companyID',
                                            'as' => 'trailerdetails'
                                        ]],
                                        ['$match'=>['companyID'=>1]]
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
                                            foreach ($trailer as $row4) {
                                                    $id = $row4['_id'];
                                                    $trailerNumber = $row4['trailerNumber'];
                                                    $trailerType = $trailer_type[$row4['trailerType']];
                                                    $licenseType = $row4['licenseType'];
                                                    if(empty($row4['plateExpiry'])) {
                                                        $plateExpiry = "";
                                                    } else {
                                                        $plateExpiry = date('d/m/Y',$row4['plateExpiry']);
                                                    }
                                                    if(empty($row4['inspectionExpiration'])) {
                                                        $inspectionExpiration = "";
                                                    } else {
                                                        $inspectionExpiration = date('d/m/Y',$row4['inspectionExpiration']);
                                                    }
                                                    $status = $row4['status'];
                                                    $model = $row4['model'];
                                                    $year = $row4['year'];
                                                    $axies = $row4['axies'];
                                                    $registeredState = $row4['registeredState'];
                                                    $vin = $row4['vin'];
                                                    if(empty($row4['dot'])) {
                                                        $dot = "";
                                                    } else {
                                                        $dot = date('d/m/Y',$row4['dot']);
                                                    }
                                                    if(empty($row4['activationDate'])) {
                                                        $activationDate = "";
                                                    } else {
                                                        $activationDate = date('d/m/Y',$row4['activationDate']);
                                                    }
                                                    $internalNotes = $row4['internalNotes'];
                                                    $limit = 4;
                                                    $total_records = $row4->count();
                                                    $total_pages = ceil($total_records / $limit);
                                        ?>

                                <tr>
                                <th><?php echo $i++ ?></th>
                                    <td>
                                        <a href="#" id="trailerNumber<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'trailerNumber');" class="text-overflow"><?php echo  $trailerNumber; ?></a>
                                        <button type="button" id="trailerNumber<?php echo $id; ?>" onclick="updateTrailerAdd('trailerNumber',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="trailerType<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'trailerType');" class="text-overflow"><?php echo  $trailerType; ?></a>
                                        <button type="button" id="trailerType<?php echo $id; ?>" onclick="updateTrailerAdd('trailerType',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="licenseType<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'licenseType');" class="text-overflow"><?php echo  $licenseType; ?></a>
                                        <button type="button" id="licenseType<?php echo $id; ?>" onclick="updateTrailerAdd('licenseType',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="plateExpiry<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'plateExpiry');" class="text-overflow"><?php echo  $plateExpiry; ?></a>
                                        <button type="button" id="plateExpiry<?php echo $id; ?>" onclick="updateTrailerAdd('plateExpiry',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="inspectionExpiration<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'inspectionExpiration');" class="text-overflow"><?php echo  $inspectionExpiration; ?></a>
                                        <button type="button" id="inspectionExpiration<?php echo $id; ?>" onclick="updateTrailerAdd('inspectionExpiration',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="status<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'status');" class="text-overflow"><?php echo  $status; ?></a>
                                        <button type="button" id="status<?php echo $id; ?>" onclick="updateTrailerAdd('status',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="model<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'model');" class="text-overflow"><?php echo  $model; ?></a>
                                        <button type="button" id="model<?php echo $id; ?>" onclick="updateTrailerAdd('model',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="year<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'year');" class="text-overflow"><?php echo  $year; ?></a>
                                        <button type="button" id="year<?php echo $id; ?>" onclick="updateTrailerAdd('year',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="axies<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'axies');" class="text-overflow"><?php echo  $axies; ?></a>
                                        <button type="button" id="axies<?php echo $id; ?>" onclick="updateTrailerAdd('axies',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="registeredState<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'registeredState');" class="text-overflow"><?php echo  $registeredState; ?></a>
                                        <button type="button" id="registeredState<?php echo $id; ?>" onclick="updateTrailerAdd('registeredState',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="vin<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'vin');" class="text-overflow"><?php echo  $vin; ?></a>
                                        <button type="button" id="vin<?php echo $id; ?>" onclick="updateTrailerAdd('vin',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="dot<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'dot');" class="text-overflow"><?php echo  $dot; ?></a>
                                        <button type="button" id="dot<?php echo $id; ?>" onclick="updateTrailerAdd('dot',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="activationDate<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'activationDate');" class="text-overflow"><?php echo  $activationDate; ?></a>
                                        <button type="button" id="activationDate<?php echo $id; ?>" onclick="updateTrailerAdd('activationDate',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td>
                                        <a href="#" id="internalNotes<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'internalNotes');" class="text-overflow"><?php echo  $internalNotes; ?></a>
                                        <button type="button" id="internalNotes<?php echo $id; ?>" onclick="updateTrailerAdd('internalNotes',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                    </td>
                                    <td><a href="#" onclick="deleteTrailerAdd(<?php echo $id; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></a></i>
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
                            for($i=1; $i<=$total_pages; $i++){
                                if($i == 1){
                                    ?>
                                    <li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i;?>" class="page-link" ><?php echo $i;?></a></li>

                                    <?php
                                }
                                else{
                                    ?>
                                    <li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
                                    <?php
                                }
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
