<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="shipper"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#add_shipper"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

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
                                        <th scope="col" col width="160" data-priority="3">Major Intersection/Directions</th>
                                        <th scope="col" col width="160" data-priority="6">Status</th>
                                        <th scope="col" col width="160" data-priority="6">Shipping Notes</th>
                                        <th scope="col" col width="160" data-priority="6">Internal Notes</th>
                                        <th scope="col" col width="160" data-priority="1">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="shipperBody">
                                    <?php
                                    require 'model/Shipper.php';

                                    $shipper = new Shipper();
                                    $show_data = $db->shipper->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    foreach ($show_data as $show) {
                                        $show = $show['shipper'];
                                        foreach ($show as $s) {
                                            $limit = 4;
                                            $total_records = $s->count();
                                            $total_pages = ceil($total_records / $limit);
                                    ?>
                                            <tr>
                                                <th><?php echo $no++; ?></th>
                                                <td>
                                                    <a href="#" id="shipperName<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperName');" class="text-overflow"><?php echo $s['shipperName']; ?></a>
                                                    <button type="button" id="shipperName<?php echo $s['_id']; ?>" onclick="updateShipper('shipperName',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperAddress<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperAddress');" class="text-overflow"><?php echo $s['shipperAddress']; ?></a>
                                                    <button type="button" id="shipperAddress<?php echo $s['_id']; ?>" onclick="updateShipper('shipperAddress',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperLocation<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperLocation');" class="text-overflow"><?php echo $s['shipperLocation']; ?></a>
                                                    <button type="button" id="shipperLocation<?php echo $s['_id']; ?>" onclick="updateShipper('shipperLocation',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperPostal<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperPostal');" class="text-overflow"><?php echo $s['shipperPostal']; ?></a>
                                                    <button type="button" id="shipperPostal<?php echo $s['_id']; ?>" onclick="updateShipper('shipperPostal',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperContact<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperContact');" class="text-overflow"><?php echo $s['shipperContact']; ?></a>
                                                    <button type="button" id="shipperContact<?php echo $s['_id']; ?>" onclick="updateShipper('shipperContact',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperEmail<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperEmail');" class="text-overflow"><?php echo $s['shipperEmail']; ?></a>
                                                    <button type="button" id="shipperEmail<?php echo $s['_id']; ?>" onclick="updateShipper('shipperEmail',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperTelephone<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperTelephone');" class="text-overflow"><?php echo $s['shipperTelephone']; ?></a>
                                                    <button type="button" id="shipperTelephone<?php echo $s['_id']; ?>" onclick="updateShipper('shipperTelephone',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperExt<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperExt');" class="text-overflow"><?php echo $s['shipperExt']; ?></a>
                                                    <button type="button" id="shipperExt<?php echo $s['_id']; ?>" onclick="updateShipper('shipperExt',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperTollFree<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperTollFree');" class="text-overflow"><?php echo $s['shipperTollFree']; ?></a>
                                                    <button type="button" id="shipperTollFree<?php echo $s['_id']; ?>" onclick="updateShipper('shipperTollFree',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperFax<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperFax');" class="text-overflow"><?php echo $s['shipperFax']; ?></a>
                                                    <button type="button" id="shipperFax<?php echo $s['_id']; ?>" onclick="updateShipper('shipperFax',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperShippingHours<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperShippingHours');" class="text-overflow"><?php echo $s['shipperShippingHours']; ?></a>
                                                    <button type="button" id="shipperShippingHours<?php echo $s['_id']; ?>" onclick="updateShipper('shipperShippingHours',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperAppointments<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperAppointments');" class="text-overflow"><?php echo $s['shipperAppointments']; ?></a>
                                                    <button type="button" id="shipperAppointments<?php echo $s['_id']; ?>" onclick="updateShipper('shipperAppointments',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperIntersaction<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperIntersaction');" class="text-overflow"><?php echo $s['shipperIntersaction']; ?></a>
                                                    <button type="button" id="shipperIntersaction<?php echo $s['_id']; ?>" onclick="updateShipper('shipperIntersaction',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shipperStatus<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shipperStatus');" class="text-overflow"><?php echo $s['shipperStatus']; ?></a>
                                                    <button type="button" id="shipperStatus<?php echo $s['_id']; ?>" onclick="updateShipper('shipperStatus',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="shippingNotes<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'shippingNotes');" class="text-overflow"><?php echo $s['shippingNotes']; ?></a>
                                                    <button type="button" id="shippingNotes<?php echo $s['_id']; ?>" onclick="updateShipper('shippingNotes',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="internalNotes<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'internalNotes');" class="text-overflow"><?php echo $s['internalNotes']; ?></a>
                                                    <button type="button" id="internalNotes<?php echo $s['_id']; ?>" onclick="updateShipper('internalNotes',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                
                                                <td><a href="#" onclick="deleteShipper(<?php echo $s['_id']; ?>)"><i
                                                                class="mdi mdi-delete-sweep-outline"
                                                                style="font-size: 20px; color: #FC3B3B"></i></a></td>
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
                                        <th>Major Intersection/Directions</th>
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
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_shipper"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Shipper</h5>
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
                    <input type="submit" name="submit" onclick="importShipper()" class="btn btn-outline-info waves-effect waves-light float-right" value="Upload"/> 
                </div>
                <hr>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Shipper Name <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Shipper Name *" required type="text"
                                   id="shipperName">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Address <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Address *" type="text"
                                   id="shipperAddress">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Location <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" onkeydown="getLocation('shipperLocation')" placeholder="Location *"
                                   type="text" id="shipperLocation">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Postal / Zip <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Postal / Zip *" type="text"
                                   id="shipperPostal">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Contact Name</label>
                        <div>
                            <input class="form-control" placeholder="Contact Name" type="text"
                                   id="shipperContact">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Contact Email</label>
                        <div>
                            <input class="form-control" placeholder="Contact Email" type="email" id="shipperEmail">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" type="text" placeholder="Telephone" id="shipperTelephone">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" type="text" placeholder="Ext" id="shipperExt">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Toll Free</label>
                        <div>
                            <input class="form-control" placeholder="Toll Free" type="text"
                                   id="shipperTollFree">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Fax</label>
                        <div>
                            <input class="form-control" placeholder="Fax" type="text"
                                   id="shipperFax">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Shipping Hours</label>
                        <div>
                            <input class="form-control" placeholder="Shipping Hours" type="text"
                                   id="shipperShippingHours">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>
                            Appointments</label>
                        <select class="form-control" id="shipperAppointments">
                            <option value="no">--select--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Major Intersection/Directions</label>
                        <div>
                            <input class="form-control" placeholder="Major Intersection/Directions" type="text" id="shipperIntersaction">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Duplicate Info </label>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"
                                   id="customCheck1" name="shipperASconsignee" data-parsley-multiple="groups"
                                   data-parsley-mincheck="2">
                            <label class="custom-control-label" for="customCheck1">Add as
                                Consignee</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                        <label>Status </label>
                        <div class="row">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input"
                                       id="defaultInline1" value="Active" name="shipperStatus"
                                       checked>
                                <label class="custom-control-label"
                                       for="defaultInline1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input"
                                       id="defaultInline2" value="Inactive" name="shipperStatus">
                                <label class="custom-control-label" for="defaultInline2">Inactive</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Shipping Notes</label>
                        <div>
                            <textarea rows="3" cols="30" placeholder="Shipping Notes" class="form-control" type="textarea"
                                      id="shippingNotes"></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-5">
                        <label>Internal Notes</label>
                        <div>
                            <textarea rows="3" cols="30" placeholder="Internal Notes" class="form-control" type="textarea"
                                      id="internalNotes"></textarea>
                            <input type="hidden" id="companyID" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" onclick="addShipper()" class="btn btn-primary waves-effect waves-light">Save
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
