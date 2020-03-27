<?php
session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="consignee"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0">
                    Consignee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="consignee-container" style="z-index: 1400"></div>
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search" onkeyup="search_consignee(this)"
                       placeholder="search" style="margin-left: 5px;">
                <form action="" method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                            id="AddConsignee"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <input type="submit" name="submit" onclick="importConsignee()"
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
                            <table id="consignee_table" class="scroll">
                                <thead>
                                <tr>
                                    <th scope="col" col width="50">No</th>
                                    <th scope="col" col width="160" data-priority="1">Consignee Name</th>
                                    <th scope="col" col width="160" data-priority="3">Address</th>
                                    <th scope="col" col width="160" data-priority="1">Location</th>
                                    <th scope="col" col width="160" data-priority="3">Postal / Zip</th>
                                    <th scope="col" col width="160" data-priority="3">Contact Name</th>
                                    <th scope="col" col width="160" data-priority="6">Contact Email</th>
                                    <th scope="col" col width="160" data-priority="6">Telephone</th>
                                    <th scope="col" col width="160" data-priority="6">Ext</th>
                                    <th scope="col" col width="160" data-priority="1">Toll Free</th>
                                    <th scope="col" col width="160" data-priority="3">Fax</th>
                                    <th scope="col" col width="160" data-priority="1">Receiving Hours</th>
                                    <th scope="col" col width="160" data-priority="3">Appointments</th>
                                    <th scope="col" col width="160" data-priority="3"><marquee width="140px" direction="left" height="17px" scrollamount="1">Major Intersection/Directions</marquee></th>
                                    <th scope="col" col width="160" data-priority="6">Status</th>
                                    <th scope="col" col width="160" data-priority="6">Receiving Notes</th>
                                    <th scope="col" col width="160" data-priority="6">Internal Notes</th>
                                    <th scope="col" col width="160" data-priority="1">Action</th>
                                </tr>
                                </thead>
                                <tbody id="consigneeBody">
                                <?php
                                require 'model/Consignee.php';
                                
                                $limit = 100;
                                $cursor = $db->consignee->find(array('companyID' => $_SESSION['companyId']));
                                
                                foreach ($cursor as $value) {
                                    $total_records = sizeof($value['consignee']);
                                    $total_pages = ceil($total_records / $limit);
                                }

                                $consignee = new Consignee();
                                $show_data = $db->consignee->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('consignee' => array('$slice' => [0, $limit]))));
                                //$show_data = $db->consignee->find(['companyID' => $_SESSION['companyId']]);
                                $i = 1;
                                foreach ($show_data as $show) {
                                    $show = $show['consignee'];
                                    foreach ($show as $s) {
                                        $counter = $s['counter'];
                                        $consigneeName = "'".$s['consigneeName']."'";
                                        $consigneeAddress = "'".$s['consigneeAddress']."'";
                                        $consigneeLocation = "'".$s['consigneeLocation']."'";
                                        $consigneePostal = "'".$s['consigneePostal']."'";
                                        $consigneeContact = "'".$s['consigneeContact']."'";
                                        $consigneeEmail = "'".$s['consigneeEmail']."'";
                                        $consigneeTelephone = "'".$s['consigneeTelephone']."'";
                                        $consigneeExt = "'".$s['consigneeExt']."'";
                                        $consigneeTollFree = "'".$s['consigneeTollFree']."'";
                                        $consigneeFax = "'".$s['consigneeFax']."'";
                                        $consigneeReceiving = "'".$s['consigneeReceiving']."'";
                                        $consigneeAppointments = "'".$s['consigneeAppointments']."'";
                                        $consigneeIntersaction = "'".$s['consigneeIntersaction']."'";
                                        $consigneeStatus = "'".$s['consigneeStatus']."'";
                                        $consigneeRecivingNote = "'".$s['consigneeRecivingNote']."'";
                                        $consigneeInternalNote = "'".$s['consigneeInternalNote']."'";

                                        $pencilid1 = "'"."consigneeNamePencil$i"."'";
                                        $pencilid2 = "'"."consigneeAddressPencil$i"."'";
                                        $pencilid3 = "'"."consigneeLocationPencil$i"."'";
                                        $pencilid4 = "'"."consigneePostalPencil$i"."'";
                                        $pencilid5 = "'"."consigneeContactPencil$i"."'";
                                        $pencilid6 = "'"."consigneeEmailPencil$i"."'";
                                        $pencilid7 = "'"."consigneeTelephonePencil$i"."'";
                                        $pencilid8 = "'"."consigneeExtPencil$i"."'";
                                        $pencilid9 = "'"."consigneeTollFreePencil$i"."'";
                                        $pencilid10 = "'"."consigneeFaxPencil$i"."'";
                                        $pencilid11 = "'"."consigneeReceivingPencil$i"."'";
                                        $pencilid12 = "'"."consigneeAppointmentsPencil$i"."'";
                                        $pencilid13 = "'"."consigneeIntersactionPencil$i"."'";
                                        $pencilid14 = "'"."consigneeStatusPencil$i"."'";
                                        $pencilid15 = "'"."consigneeRecivingNotePencil$i"."'";
                                        $pencilid16 = "'"."consigneeInternalNotePencil$i"."'";

                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td class="custom-text" id="<?php echo "consigneeName".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeNamePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeNamePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeNamePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeName; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeName','Consignee Name',<?php echo $pencilid1; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeName']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeAddress".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeAddressPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeAddressPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeAddressPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeAddress; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeAddress','Address',<?php echo $pencilid2; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeAddress']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeLocation".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeLocationPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeLocationPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeLocationPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeLocation; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeLocation','Location',<?php echo $pencilid3; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeLocation']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneePostal".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneePostalPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneePostalPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneePostalPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneePostal; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneePostal','Postal / Zip',<?php echo $pencilid4; ?>)"
                                                ></i>
                                                <?php echo $s['consigneePostal']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeContact".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeContactPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeContactPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeContactPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeContact; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeContact','Contact Name',<?php echo $pencilid5; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeContact']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeEmail".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeEmailPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeEmailPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeEmailPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeEmail; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeEmail','Contact Email',<?php echo $pencilid6; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeEmail']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeTelephone".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeTelephonePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeTelephonePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeTelephonePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeTelephone; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeTelephone','Telephone',<?php echo $pencilid7; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeTelephone']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeExt".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeExtPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeExtPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeExtPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeExt; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeExt','Ext',<?php echo $pencilid8; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeExt']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeTollFree".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeTollFreePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeTollFreePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeTollFreePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeTollFree; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeTollFree','Toll Free',<?php echo $pencilid9; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeTollFree']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeFax".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeFaxPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeFaxPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeFaxPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeFax; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeFax','Fax',<?php echo $pencilid10; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeFax']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeReceiving".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeReceivingPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeReceivingPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeReceivingPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeReceiving; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeReceiving','Receiving Hours',<?php echo $pencilid11; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeReceiving']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeAppointments".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeAppointmentsPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeAppointmentsPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeAppointmentsPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeAppointments; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeAppointments','Appointments',<?php echo $pencilid12; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeAppointments']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeIntersaction".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeIntersactionPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeIntersactionPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeIntersactionPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeIntersaction; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeIntersaction','Major Intersection/Directions',<?php echo $pencilid13; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeIntersaction']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeStatus".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeStatusPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeStatusPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeStatusPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeStatus; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeStatus','Status',<?php echo $pencilid14; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeStatus']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeRecivingNote".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeRecivingNotePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeRecivingNotePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeRecivingNotePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeRecivingNote; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeRecivingNote','Receiving Notes',<?php echo $pencilid15; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeRecivingNote']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "consigneeInternalNote".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('consigneeInternalNotePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('consigneeInternalNotePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "consigneeInternalNotePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $consigneeInternalNote; ?>,'updateConsignee','text',<?php echo $s['_id']; ?>,'consigneeInternalNote','Internal Notes',<?php echo $pencilid16; ?>)"
                                                ></i>
                                                <?php echo $s['consigneeInternalNote']; ?>
                                            </td>
                                            <td>
                                                <?php if ($counter == 0) { ?>
                                                    <a href="#" onclick="deleteConsignee(<?php echo $s['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                <?php } else { ?>
                                                    <a href="#" disabled onclick="deleteCurrencyError()"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #adb5bd"></i></a>
                                                <?php } ?>        
                                            </td>
                                        </tr>
                                    <?php 
                                    }
                                } ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Consignee Name</th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Postal / Zip</th>
                                        <th>Contact Name</th>
                                        <th>Contact Email</th>
                                        <th>Telephone</th>
                                        <th>Ext</th>
                                        <th>Toll Free</th>
                                        <th>Fax</th>
                                        <th>Receiving Hours</th>
                                        <th>Appointments</th>
                                        <th><marquee width="140px" direction="left" height="17px" scrollamount="1">Major Intersection/Directions</marquee></th>
                                        <th>Status</th>
                                        <th>Receiving Notes</th>
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
                                        onclick="paginate_consignee(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                        id="<?php echo $i; ?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i; ?>"
                                            class="page-link"><?php echo $j; ?></a></li>

                            <?php
                                } else {
                                    ?>
                                    <li class="pageitem"
                                        onclick="paginate_consignee(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
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
                <button type="button" onclick="exportConsignee(<?php echo $_SESSION['companyId']; ?>)"
                        class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!---------------------------------------------------------------------------------------->