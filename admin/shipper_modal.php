<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="shipper"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0">
                    Shipper</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="shipper-container" style="z-index: 1600"></div>
                <form action="" method="post" enctype="multipart/form-data">
                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" onkeyup="search_shipper(this)" placeholder="search" style="margin-left: 5px;">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#" id="AddShipper"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>
                    <input type="submit" name="submit" onclick="importShipper()"
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

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="shipper_table" class="scroll" >
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">#</th>
                                        <th scope="col" col width="160" data-priority="1">Shipper Name</th>
                                        <th scope="col" col width="160" data-priority="3">Address</th>
                                        <th scope="col" col width="160" data-priority="1">Location</th>
                                        <th scope="col" col width="160" data-priority="3">Postal / Zip</th>
                                        <th scope="col" col width="160" data-priority="3">Contact Name</th>
                                        <th scope="col" col width="160" data-priority="6">Contact Email</th>
                                        <th scope="col" col width="160" data-priority="6">Telephone</th>
                                        <th scope="col" col width="160" data-priority="6">Ext</th>
                                        <th scope="col" col width="160" data-priority="1">Toll Free</th>
                                        <th scope="col" col width="160" data-priority="3">Fax</th>
                                        <th scope="col" col width="160" data-priority="1">Shipping Hours</th>
                                        <th scope="col" col width="160" data-priority="3">Appointments</th>
                                        <th scope="col" col width="160" data-priority="3"><marquee width="140px" direction="left" height="17px" scrollamount="1">Major Intersection/Directions</marquee></th>
                                        <th scope="col" col width="160" data-priority="6">Status</th>
                                        <th scope="col" col width="160" data-priority="6">Shipping Notes</th>
                                        <th scope="col" col width="160" data-priority="6">Internal Notes</th>
                                        <th scope="col" col width="160" data-priority="1">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="shipperBody">
                                    <?php
                                    require 'model/Shipper.php';

                                    $limit = 100;
                                    $cursor = $db->shipper->find(array('companyID' => $_SESSION['companyId']));
                                    
                                    foreach ($cursor as $value) {
                                        $total_records = sizeof($value['shipper']);
                                        $total_pages = ceil($total_records / $limit);
                                    }

                                    $shipper = new Shipper();
                                    $show_data = $db->shipper->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('shipper' => array('$slice' => [0, $limit]))));
                                    $i = 1;
                                    foreach ($show_data as $show) {
                                        $show = $show['shipper'];
                                        foreach ($show as $s) {
                                            $counter = $s['counter'];
                                            $shipperName = "'".$s['shipperName']."'";
                                            $shipperAddress = "'".$s['shipperAddress']."'";
                                            $shipperLocation = "'".$s['shipperLocation']."'";
                                            $shipperPostal = "'".$s['shipperPostal']."'";
                                            $shipperContact = "'".$s['shipperContact']."'";
                                            $shipperEmail = "'".$s['shipperEmail']."'";
                                            $shipperTelephone = "'".$s['shipperTelephone']."'";
                                            $shipperExt = "'".$s['shipperExt']."'";
                                            $shipperTollFree = "'".$s['shipperTollFree']."'";
                                            $shipperFax = "'".$s['shipperFax']."'";
                                            $shipperShippingHours = "'".$s['shipperShippingHours']."'";
                                            $shipperAppointments = "'".$s['shipperAppointments']."'";
                                            $shipperIntersaction = "'".$s['shipperIntersaction']."'";
                                            $shipperStatus = "'".$s['shipperStatus']."'";
                                            $shippingNotes = "'".$s['shippingNotes']."'";
                                            $internalNotes = "'".$s['internalNotes']."'";

                                            $pencilid1 = "'"."shipperNamePencil$i"."'";
                                            $pencilid2 = "'"."shipperAddressPencil$i"."'";
                                            $pencilid3 = "'"."shipperLocationPencil$i"."'";
                                            $pencilid4 = "'"."shipperPostalPencil$i"."'";
                                            $pencilid5 = "'"."shipperContactPencil$i"."'";
                                            $pencilid6 = "'"."shipperEmailPencil$i"."'";
                                            $pencilid7 = "'"."shipperTelephonePencil$i"."'";
                                            $pencilid8 = "'"."shipperExtPencil$i"."'";
                                            $pencilid9 = "'"."shipperTollFreePencil$i"."'";
                                            $pencilid10 = "'"."shipperFaxPencil$i"."'";
                                            $pencilid11 = "'"."shipperShippingHoursPencil$i"."'";
                                            $pencilid12 = "'"."shipperAppointmentsPencil$i"."'";
                                            $pencilid13 = "'"."shipperIntersactionPencil$i"."'";
                                            $pencilid14 = "'"."shipperStatusPencil$i"."'";
                                            $pencilid15 = "'"."shippingNotesPencil$i"."'";
                                            $pencilid16 = "'"."internalNotesPencil$i"."'";
                                    ?>  
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td class="custom-text" id="<?php echo "shipperName".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperNamePencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperNamePencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperNamePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperName; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperName','Shipper Name',<?php echo $pencilid1; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperName']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperAddress".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperAddressPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperAddressPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperAddressPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperAddress; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperAddress','Address',<?php echo $pencilid2; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperAddress']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperLocation".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperLocationPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperLocationPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperLocationPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperLocation; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperLocation','Location',<?php echo $pencilid3; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperLocation']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperPostal".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperPostalPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperPostalPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperPostalPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperPostal; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperPostal','Postal / Zip',<?php echo $pencilid4; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperPostal']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperContact".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperContactPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperContactPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperContactPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperContact; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperContact','Contact Name',<?php echo $pencilid5; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperContact']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperEmail".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperEmailPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperEmailPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperEmailPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperEmail; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperEmail','Contact Email',<?php echo $pencilid6; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperEmail']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperTelephone".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperTelephonePencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperTelephonePencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperTelephonePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperTelephone; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperTelephone','Telephone',<?php echo $pencilid7; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperTelephone']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperExt".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperExtPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperExtPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperExtPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperExt; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperExt','Ext',<?php echo $pencilid8; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperExt']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperTollFree".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperTollFreePencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperTollFreePencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperTollFreePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperTollFree; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperTollFree','Toll Free',<?php echo $pencilid9; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperTollFree']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperFax".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperFaxPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperFaxPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperFaxPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperFax; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperFax','Fax',<?php echo $pencilid10; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperFax']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperShippingHours".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperShippingHoursPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperShippingHoursPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperShippingHoursPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperShippingHours; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperShippingHours','Shipping Hours',<?php echo $pencilid11; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperShippingHours']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperAppointments".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperAppointmentsPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperAppointmentsPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperAppointmentsPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperAppointments; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperAppointments','Appointments',<?php echo $pencilid12; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperAppointments']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperIntersaction".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperIntersactionPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperIntersactionPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperIntersactionPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperIntersaction; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperIntersaction','Major Intersection / Directions',<?php echo $pencilid13; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperIntersaction']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shipperStatus".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shipperStatusPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shipperStatusPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shipperStatusPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shipperStatus; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shipperStatus','Status',<?php echo $pencilid14; ?>)"
                                                    ></i>
                                                    <?php echo $s['shipperStatus']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "shippingNotes".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('shippingNotesPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('shippingNotesPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "shippingNotesPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $shippingNotes; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'shippingNotes','Shipping Notes',<?php echo $pencilid15; ?>)"
                                                    ></i>
                                                    <?php echo $s['shippingNotes']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "internalNotes".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('internalNotesPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('internalNotesPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "internalNotesPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $internalNotes; ?>,'updateShipper','text',<?php echo $s['_id']; ?>,'internalNotes','Internal Notes',<?php echo $pencilid16; ?>)"
                                                    ></i>
                                                    <?php echo $s['internalNotes']; ?>
                                                </td>                                                
                                                <td>
                                                    <?php if ($counter == 0) { ?>
                                                        <a href="#" onclick="deleteShipper(<?php echo $s['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                    <?php } else { ?>
                                                        <a href="#" disabled onclick="deleteCurrencyError()"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #adb5bd"></i></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
                                </tbody>
                                
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Shipper Name</th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Postal / Zip</th>
                                        <th>Contact Name</th>
                                        <th>Contact Email</th>
                                        <th>Telephone</th>
                                        <th>Ext</th>
                                        <th>Toll Free</th>
                                        <th>Fax</th>
                                        <th>Shipping Hours</th>
                                        <th>Appointments</th>
                                        <th><marquee width="140px" direction="left" height="17px" scrollamount="1">Major Intersection/Directions</marquee></th>
                                        <th>Status</th>
                                        <th>Shipping Notes</th>
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
                                        onclick="paginate_shipper(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                        id="<?php echo $i; ?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i; ?>"
                                            class="page-link"><?php echo $j; ?></a></li>

                            <?php
                                } else {
                                    ?>
                                    <li class="pageitem"
                                        onclick="paginate_shipper(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                        id="<?php echo $i; ?>"><a href="JavaScript:Void(0);" class="page-link"
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
                <button type="button" onclick="exportShipper(<?php echo $_SESSION['companyId']; ?>)"
                        class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--//---------------------------------------------------------->