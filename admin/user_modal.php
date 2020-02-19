<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="user"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0">
                    User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#add_user"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="user_table" class="scroll" >
                                <thead>
                                <tr>
                                    <th scope="col" col width="160">No</th>
                                    <th scope="col" col width="160" data-priority="1">Email</th>
                                    <th scope="col" col width="160" data-priority="3">Username</th>
                                    <th scope="col" col width="160" data-priority="1">Password</th>
                                    <th scope="col" col width="160" data-priority="3">First Name</th>
                                    <th scope="col" col width="160" data-priority="3">Last Name</th>
                                    <th scope="col" col width="160" data-priority="6">Address</th>
                                    <th scope="col" col width="160" data-priority="6">Location</th>
                                    <th scope="col" col width="160" data-priority="6">Zip</th>
                                    <th scope="col" col width="160" data-priority="1">Telephone</th>
                                    <th scope="col" col width="160" data-priority="3">Ext</th>
                                    <th scope="col" col width="160" data-priority="1">Toll Free</th>
                                    <th scope="col" col width="160" data-priority="3">Fax</th>
                                    <th scope="col" col width="160" data-priority="3">Privilege</th>
                                    <th scope="col" col width="160" data-priority="6">Action</th>
                                </tr>
                                </thead>
                                <?php
                                require 'model/User.php';

                                $User = new User();
                                $show_data = $db->user->find(['companyID' => $_SESSION['companyId']]);
                                $i = 1;
                                ?>

                                <tbody>
                                <?php foreach ($show_data as $show) {
                                    $show = $show['user'];
                                    foreach ($show as $s) {
                                        $limit = 4;
                                        $total_records = $s->count();
                                        $total_pages = ceil($total_records / $limit);
                                        if ($s['deleteStatus'] == '0') {
                                            ?>
                                            <tr>
                                                <th><?php echo $i++ ?></th>
                                                <td>
                                                    <a href="#" id="userEmail<?php echo $s['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'userEmail');" class="text-overflow"><?php echo $s['userEmail']; ?></a>
                                                    <button type="button" id="userEmail<?php echo $s['_id']; ?>" onclick="updateUser('userEmail',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="userName<?php echo $s['_id']; ?>2" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'userName');" class="text-overflow"><?php echo $s['userName']; ?></a>
                                                    <button type="button" id="userName<?php echo $s['_id']; ?>" onclick="updateUser('userName',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="userPass<?php echo $s['_id']; ?>3" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'userPass');" class="text-overflow"><?php echo $s['userPass']; ?></a>
                                                    <button type="button" id="userPass<?php echo $s['_id']; ?>" onclick="updateUser('userPass',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="userFirstName<?php echo $s['_id']; ?>4" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'userFirstName');" class="text-overflow"><?php echo $s['userFirstName']; ?></a>
                                                    <button type="button" id="userFirstName<?php echo $s['_id']; ?>" onclick="updateUser('userFirstName',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="userLastName<?php echo $s['_id']; ?>5" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'userLastName');" class="text-overflow"><?php echo $s['userLastName']; ?></a>
                                                    <button type="button" id="userLastName<?php echo $s['_id']; ?>" onclick="updateUser('userLastName',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="userAddress<?php echo $s['_id']; ?>6" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'userAddress');" class="text-overflow"><?php echo $s['userAddress']; ?></a>
                                                    <button type="button" id="userAddress<?php echo $s['_id']; ?>" onclick="updateUser('userAddress',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="userLocation<?php echo $s['_id']; ?>7" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'userLocation');" class="text-overflow"><?php echo $s['userLocation']; ?></a>
                                                    <button type="button" id="userLocation<?php echo $s['_id']; ?>" onclick="updateUser('userLocation',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="userZip<?php echo $s['_id']; ?>8" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'userZip');" class="text-overflow"><?php echo $s['userZip']; ?></a>
                                                    <button type="button" id="userZip<?php echo $s['_id']; ?>" onclick="updateUser('userZip',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="userTelephone<?php echo $s['_id']; ?>9" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'userTelephone');" class="text-overflow"><?php echo $s['userTelephone']; ?></a>
                                                    <button type="button" id="userTelephone<?php echo $s['_id']; ?>" onclick="updateUser('userTelephone',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="userExt<?php echo $s['_id']; ?>10" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'userExt');" class="text-overflow"><?php echo $s['userExt']; ?></a>
                                                    <button type="button" id="userExt<?php echo $s['_id']; ?>" onclick="updateUser('userExt',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="TollFree<?php echo $s['_id']; ?>11" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'TollFree');" class="text-overflow"><?php echo $s['TollFree']; ?></a>
                                                    <button type="button" id="TollFree<?php echo $s['_id']; ?>" onclick="updateUser('TollFree',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="userFax<?php echo $s['_id']; ?>12" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $s['_id']; ?>,'userFax');" class="text-overflow"><?php echo $s['userFax']; ?></a>
                                                    <button type="button" id="userFax<?php echo $s['_id']; ?>" onclick="updateUser('userFax',<?php echo $s['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>

                                                <td><a href="#" onclick="show_privilege(<?php echo $s['_id']; ?>)" data-toggle="modal" data-target="#show_privilege" class="btn btn-warning">Privilege</a></td>
                                                <td><a href="#" onclick="deleteUser(<?php echo $s['_id']; ?>)"><i
                                                                class="mdi mdi-delete-sweep-outline"
                                                                style="font-size: 20px; color: #FC3B3B"></i></a></td>

                                            </tr>
                                        <?php }
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>Location</th>
                                    <th>Zip</th>
                                    <th>Telephone</th>
                                    <th>Ext</th>
                                    <th>Toll Free</th>
                                    <th>Fax</th>
                                    <th>Privilege</th>
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
                <button type="button" onclick="exportUser(<?php echo $_SESSION['companyId']; ?>)"
                        class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!----------------------------------------------------------------------------------------------->
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="show_privilege"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Privilege</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th>Master</th>
                            <th>Check</th>
                            <th>Admin</th>
                            <th>Check</th>
                        </tr>
                        </thead>
                        <tbody id="final_privilege">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" onclick="updatePrivilege()" class="btn btn-primary waves-effect waves-light">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--//------------------------------------------------------------------------------------------->
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_user"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Add User</h5>
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
                    <input type="submit" name="submit" onclick="importUser()" class="btn btn-outline-info waves-effect waves-light float-right" value="Upload"/>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Email <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" id="userEmail" placeholder="Email *" type="text"
                            >
                            <input id="companyId" type="hidden" value="<?php echo $_SESSION['companyId']; ?>"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Username <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" id="userName" placeholder="Username *" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Password <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" id="userPass" placeholder="Password *"
                                   type="password">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>First Name <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" id="userFirstName" placeholder="First Name *" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Last Name <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" id="userLastName" placeholder="Last Name *" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Address <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" id="userAddress" placeholder="Address *" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Location </label>
                        <div>
                            <input class="form-control" onclick="getLocation(this.id)" id="userLocation" placeholder="Location" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Zip</label>
                        <div>
                            <input class="form-control" id="userZip" placeholder="Postal / Zip" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" id="userTelephone" placeholder="Telephone" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" id="userExt" placeholder="Ext" type="text">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Toll Free</label>
                        <div>
                            <input class="form-control" id="uerTollFree" aria-placeholder="Toll Free"
                                   placeholder="Toll Free" type="text"
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Fax</label>
                        <div>
                            <input class="form-control" id="userFax" placeholder="Fax" type="text"
                            >
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                        <tr>
                            <th>Master</th>
                            <th>Check</th>
                            <th>Admin</th>
                            <th>Check</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Add Bank</td>
                            <td><input type="checkbox" id="addBank"></td>
                            <td>Add customer</td>
                            <td><input type="checkbox" id="addCustomer"></td>
                        </tr>
                        <tr>
                            <td>Company</td>
                            <td><input type="checkbox" id="addCompany"></td>
                            <td>Add Shipper</td>
                            <td><input type="checkbox" id="addShipper"></td>
                        </tr>
                        <tr>
                            <td>Currency</td>
                            <td><input type="checkbox" id="currency"></td>
                            <td>Add Consignee</td>
                            <td><input type="checkbox" id="addConsignee"></td>
                        </tr>
                        <tr>
                            <td>Payment Terms</td>
                            <td><input type="checkbox" id="paymentTerms"></td>
                            <td>Add Driver</td>
                            <td><input type="checkbox" id="addDriver"></td>
                        </tr>
                        <tr>
                            <td>Office</td>
                            <td><input type="checkbox" id="office"></td>
                            <td>Add Truck</td>
                            <td><input type="checkbox" id="addTruck"></td>
                        </tr>
                        <tr>
                            <td>Equipment Type</td>
                            <td><input type="checkbox" id="equipmentType"></td>
                            <td>Add Trailer</td>
                            <td><input type="checkbox" id="addTrailer"></td>
                        </tr>
                        <tr>
                            <td>Truck Type</td>
                            <td><input type="checkbox" id="truckType"></td>
                            <td>Add External Carrier</td>
                            <td><input type="checkbox" id="addExternalCarrier"></td>
                        </tr>
                        <tr>
                            <td>Trailer Type</td>
                            <td><input type="checkbox" id="trailerType"></td>
                            <td>Factoring Company</td>
                            <td><input type="checkbox" id="factoringCompany"></td>
                        </tr>
                        <tr>
                            <td>Status Type</td>
                            <td><input type="checkbox" id="statusType"></td>
                            <td>Customs Broker</td>
                            <td><input type="checkbox" id="customsBroker"></td>
                        </tr>
                        <tr>
                            <td>Load Type</td>
                            <td><input type="checkbox" id="loadType"></td>
                            <td>Owner Operator</td>
                            <td><input type="checkbox" id="ownerOperator"></td>
                        </tr>
                        <tr>
                            <td>Fix pay category</td>
                            <td><input type="checkbox" id="fixPayCategory"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" onclick="addUser()" class="btn btn-primary waves-effect waves-light">Save
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
