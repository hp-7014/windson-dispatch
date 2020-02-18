<?php
session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="consignee"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#add_consignee"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="consignee_table" class="scroll" >
                                <thead>
                                    <tr>
                                        <th scope="col" col width="160">No</th>
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
                                        <th scope="col" col width="160" data-priority="3">Major Intersection/Directions</th>
                                        <th scope="col" col width="160" data-priority="6">Status</th>
                                        <th scope="col" col width="160" data-priority="6">Receiving Notes</th>
                                        <th scope="col" col width="160" data-priority="6">Internal Notes</th>
                                        <th scope="col" col width="160" data-priority="1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require 'model/Consignee.php';

                                    $consignee = new Consignee();
                                    $show_data = $db->consignee->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    foreach ($show_data as $show) {
                                        $show = $show['consignee'];
                                        foreach ($show as $s) {
                                            $limit = 4;
                                            $total_records = $s->count();
                                            $total_pages = ceil($total_records / $limit);
                                            ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td>
                                                    <a href="#" id="consigneeName<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeName');" class="text-overflow"><?php echo $s['consigneeName']; ?></a>
                                                    <button type="button" id="consigneeName<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeName',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeAddress<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeAddress');" class="text-overflow"><?php echo $s['consigneeAddress']; ?></a>
                                                    <button type="button" id="consigneeAddress<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeAddress',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeLocation<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeLocation');" class="text-overflow"><?php echo $s['consigneeLocation']; ?></a>
                                                    <button type="button" id="consigneeLocation<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeLocation',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneePostal<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneePostal');" class="text-overflow"><?php echo $s['consigneePostal']; ?></a>
                                                    <button type="button" id="consigneePostal<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneePostal',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeContact<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeContact');" class="text-overflow"><?php echo $s['consigneeContact']; ?></a>
                                                    <button type="button" id="consigneeContact<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeContact',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeEmail<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeEmail');" class="text-overflow"><?php echo $s['consigneeEmail']; ?></a>
                                                    <button type="button" id="consigneeEmail<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeEmail',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeTelephone<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeTelephone');" class="text-overflow"><?php echo $s['consigneeTelephone']; ?></a>
                                                    <button type="button" id="consigneeTelephone<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeTelephone',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeExt<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeExt');" class="text-overflow"><?php echo $s['consigneeExt']; ?></a>
                                                    <button type="button" id="consigneeExt<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeExt',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeTollFree<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeTollFree');" class="text-overflow"><?php echo $s['consigneeTollFree']; ?></a>
                                                    <button type="button" id="consigneeTollFree<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeTollFree',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeFax<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeFax');" class="text-overflow"><?php echo $s['consigneeFax']; ?></a>
                                                    <button type="button" id="consigneeFax<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeFax',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeReceiving<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeReceiving');" class="text-overflow"><?php echo $s['consigneeReceiving']; ?></a>
                                                    <button type="button" id="consigneeReceiving<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeReceiving',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeAppointments<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeAppointments');" class="text-overflow"><?php echo $s['consigneeAppointments']; ?></a>
                                                    <button type="button" id="consigneeAppointments<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeAppointments',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeIntersaction<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeIntersaction');" class="text-overflow"><?php echo $s['consigneeIntersaction']; ?></a>
                                                    <button type="button" id="consigneeIntersaction<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeIntersaction',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeStatus<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeStatus');" class="text-overflow"><?php echo $s['consigneeStatus']; ?></a>
                                                    <button type="button" id="consigneeStatus<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeStatus',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeRecivingNote<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeRecivingNote');" class="text-overflow"><?php echo $s['consigneeRecivingNote']; ?></a>
                                                    <button type="button" id="consigneeRecivingNote<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeRecivingNote',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="consigneeInternalNote<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'consigneeInternalNote');" class="text-overflow"><?php echo $s['consigneeInternalNote']; ?></a>
                                                    <button type="button" id="consigneeInternalNote<?php echo $s['_id']; ?>" onclick="updateConsignee('consigneeInternalNote',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                
                                                <td><a href="#" onclick="deleteConsignee(<?php echo $s['_id']; ?>)"><i
                                                                class="mdi mdi-delete-sweep-outline"
                                                                style="font-size: 20px; color: #FC3B3B"></i></a></td>
                                            </tr>
                                        <?php }
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
                                        <th>Major Intersection/Directions</th>
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
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_consignee"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Consignee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV formate</button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" name="file" id="file" accept=".csv"/>
                    </div>
                    <input type="submit" name="submit" onclick="importConsignee()" class="btn btn-outline-info waves-effect waves-light float-right" value="Upload"/>
                </div>
                <hr>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Consignee Name <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Consignee Name *"
                                   type="text" id="consigneeName">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Address <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Address *" type="text"
                                   id="consigneeAddress">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Location <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Location *"
                                   type="text" id="consigneeLocation">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Postal / Zip <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Postal / Zip *" type="text"
                                   id="consigneePostal">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Contact Name</label>
                        <div>
                            <input class="form-control" placeholder="Contact Name" type="text"
                                   id="consigneeContact">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Contact Email</label>
                        <div>
                            <input class="form-control" placeholder="Contact Email" type="email" id="consigneeEmail">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" type="text" placeholder="Telephone" id="consigneeTelephone">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" type="text" placeholder="Ext" id="consigneeExt">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Toll Free</label>
                        <div>
                            <input class="form-control" placeholder="Toll Free" type="text"
                                   id="consigneeTollFree">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Fax</label>
                        <div>
                            <input class="form-control" placeholder="Fax" type="text"
                                   id="consigneeFax">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Receiving Hours</label>
                        <div>
                            <input class="form-control" placeholder="Receiving Hours"
                                   type="text" id="consigneeReceiving">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Appointments</label>
                        <select class="form-control" id="consigneeAppointments">
                            <option value="">--select--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Major Intersection/Directions</label>
                        <div>
                            <input class="form-control" placeholder="Major Intersection/Directions" type="text" id="consigneeIntersaction">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Duplicate Info </label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"
                                   id="customCheck1" name="consignASshipper" data-parsley-multiple="groups"
                                   data-parsley-mincheck="2">
                            <label class="custom-control-label" for="customCheck1">Add as
                                Shipper</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <label>Status </label>
                        <div class="row">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input"
                                       id="defaultInline1" value="Active" name="consigneeStatus"
                                       checked>
                                <label class="custom-control-label"
                                       for="defaultInline1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input"
                                       id="defaultInline2" value="Inactive" name="consigneeStatus">
                                <label class="custom-control-label" for="defaultInline2">Inactive</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Receiving Notes</label>
                        <div>
                            <textarea rows="3" cols="30" placeholder="Receiving Notes" class="form-control" type="textarea"
                                      id="consigneeRecivingNote"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Internal Notes</label>
                        <div>
                            <textarea rows="3" cols="30" placeholder="Internal Notes" class="form-control" type="textarea"
                                      id="consigneeInternalNote"></textarea>
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" onclick="addConsignee()" class="btn btn-primary waves-effect waves-light">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<style>
    .table-scroll {
        position: relative;
        width: 100%;
        z-index: 1;
        margin: auto;
        overflow: auto;
        height: 320px;
    }

    .table-scroll table {
        width: 100%;
        min-width: 1280px;
        margin: auto;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-wrap {
        position: relative;
    }

    .table-scroll th,
    .table-scroll td {
        /*padding: 5px 10px;*/
        border: 1px solid #000;
        background: #fff;
        vertical-align: bottom;
        text-align: center;
    }

    .table-scroll thead th {
        background: #30419B;
        color: #fff;
        padding: 4px;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
    }

    /* safari and ios need the tfoot itself to be position:sticky also */
    .table-scroll tfoot,
    .table-scroll tfoot th,
    .table-scroll tfoot td {
        position: -webkit-sticky;
        position: sticky;
        bottom: 0;
        background: #666;
        color: #fff;
        z-index: 4;
    }

    /* testing links*/

    th:first-child {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 2;
        background: #ccc;
    }

    thead th:first-child,
    tfoot th:first-child {
        z-index: 5;
    }

    table {
        table-layout: fixed;
    }

    .text-overflow {
        padding-top: 10px;
        display:block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    a.editable-click { border-bottom: none;
        color: #000000;}
    a.editable-click:hover{
        border-bottom: none;
    }
    .table-scroll::-webkit-scrollbar {
        width: 12px;
        height: 8px;
    }

    /* Track */

    .table-scroll::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }


    .table-scroll::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: rgb(48, 65, 155);
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }

</style>
