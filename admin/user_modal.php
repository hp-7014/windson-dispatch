<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="user" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="user-container" style="z-index: 1800"></div>
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
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
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search"
                    onkeyup="search_user(this)" placeholder="search" style="margin-left: 5px;">

                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#" id="user_add"><i
                        class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="user_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">No</th>
                                        <th scope="col" col width="160" data-priority="1">Email</th>
                                        <th scope="col" col width="160" data-priority="1">Username</th>
                                        <!--                                    <th scope="col" col width="160" data-priority="1">Password</th>-->
                                        <th scope="col" col width="160" data-priority="1">First Name</th>
                                        <th scope="col" col width="160" data-priority="1">Last Name</th>
                                        <th scope="col" col width="160" data-priority="1">Address</th>
                                        <th scope="col" col width="160" data-priority="1">Location</th>
                                        <th scope="col" col width="160" data-priority="1">Zip</th>
                                        <th scope="col" col width="160" data-priority="1">Telephone</th>
                                        <th scope="col" col width="160" data-priority="1">Ext</th>
                                        <th scope="col" col width="160" data-priority="1">Toll Free</th>
                                        <th scope="col" col width="160" data-priority="1">Fax</th>
                                        <th scope="col" col width="160" data-priority="1">Privilege</th>
                                        <th scope="col" col width="160" data-priority="1">Action</th>
                                    </tr>
                                </thead>

                                <input type="hidden" id="page_no" value="0">
                                <tbody id="UserBody">
                                    <?php
                                    require 'model/User.php';

                                    $limit = 100;
                                    $total_pages = 0;
                                    $cursor = $db->user->find(array('companyID' => $_SESSION['companyId']));
                                    
                                    if (!empty($cursor)) {
                                        foreach ($cursor as $value) {
                                            $total_records = sizeof($value['user']);
                                            $total_pages = ceil($total_records / $limit);
                                        }
                                    }

                                    $show_data = $db->user->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('user' => array('$slice' => [0, $limit]))));                              

                                    $i = 1;
                            
                                   foreach ($show_data as $show) {
                                    $show = $show['user'];
                                    foreach ($show as $s) {
                                        $counter = $s['counter'];
                                        $userEmail = "'".$s['userEmail']."'";
                                        $userName = "'".$s['userName']."'";
                                        $userFirstName = "'".$s['userFirstName']."'";
                                        $userLastName = "'".$s['userLastName']."'";
                                        $userAddress = "'".$s['userAddress']."'";
                                        $userLocation = "'".$s['userLocation']."'";
                                        $userZip = "'".$s['userZip']."'";
                                        $userTelephone = "'".$s['userTelephone']."'";
                                        $userExt = "'".$s['userExt']."'";
                                        $TollFree = "'".$s['TollFree']."'";
                                        $userFax = "'".$s['userFax']."'";

                                        $pencilid1 = "'"."userEmailPencil$i"."'";
                                        $pencilid2 = "'"."userNamePencil$i"."'";
                                        $pencilid3 = "'"."userFirstNamePencil$i"."'";
                                        $pencilid4 = "'"."userLastNamePencil$i"."'";
                                        $pencilid5 = "'"."userAddressPencil$i"."'";
                                        $pencilid6 = "'"."userLocationPencil$i"."'";
                                        $pencilid7 = "'"."userZipPencil$i"."'";
                                        $pencilid8 = "'"."userTelephonePencil$i"."'";
                                        $pencilid9 = "'"."userExtPencil$i"."'";
                                        $pencilid10 = "'"."TollFreePencil$i"."'";
                                        $pencilid11 = "'"."userFaxPencil$i"."'";

                                    ?>
                                    <tr>
                                        <th><?php echo $i++ ?></th>
                                        <td class="custom-text" id="<?php echo "userEmail".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('userEmailPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('userEmailPencil$i'); "?>">
                                            <i id="<?php echo "userEmailPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $userEmail; ?>,'updateUser','text',<?php echo $s['_id']; ?>,'userEmail','Email',<?php echo $pencilid1; ?>)"></i>
                                            <?php echo $s['userEmail']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "userName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('userNamePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('userNamePencil$i'); "?>">
                                            <i id="<?php echo "userNamePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $userName; ?>,'updateUser','text',<?php echo $s['_id']; ?>,'userName','User Name',<?php echo $pencilid2; ?>)"></i>
                                            <?php echo $s['userName']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "userFirstName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('userFirstNamePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('userFirstNamePencil$i'); "?>">
                                            <i id="<?php echo "userFirstNamePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $userFirstName; ?>,'updateUser','text',<?php echo $s['_id']; ?>,'userFirstName','First Name',<?php echo $pencilid3; ?>)"></i>
                                            <?php echo $s['userFirstName']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "userLastName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('userLastNamePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('userLastNamePencil$i'); "?>">
                                            <i id="<?php echo "userLastNamePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $userLastName; ?>,'updateUser','text',<?php echo $s['_id']; ?>,'userLastName','Last Name',<?php echo $pencilid4; ?>)"></i>
                                            <?php echo $s['userLastName']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "userAddress".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('userAddressPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('userAddressPencil$i'); "?>">
                                            <i id="<?php echo "userAddressPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $userAddress; ?>,'updateUser','text',<?php echo $s['_id']; ?>,'userAddress','Address',<?php echo $pencilid5; ?>)"></i>
                                            <?php echo $s['userAddress']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "userLocation".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('userLocationPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('userLocationPencil$i'); "?>">
                                            <i id="<?php echo "userLocationPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $userLocation; ?>,'updateUser','text',<?php echo $s['_id']; ?>,'userLocation','Location',<?php echo $pencilid6; ?>)"></i>
                                            <?php echo $s['userLocation']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "userZip".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('userZipPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('userZipPencil$i'); "?>">
                                            <i id="<?php echo "userZipPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $userZip; ?>,'updateUser','text',<?php echo $s['_id']; ?>,'userZip','Zip',<?php echo $pencilid7; ?>)"></i>
                                            <?php echo $s['userZip']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "userTelephone".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('userTelephonePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('userTelephonePencil$i'); "?>">
                                            <i id="<?php echo "userTelephonePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $userTelephone; ?>,'updateUser','text',<?php echo $s['_id']; ?>,'userTelephone','Telephone',<?php echo $pencilid8; ?>)"></i>
                                            <?php echo $s['userTelephone']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "userExt".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('userExtPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('userExtPencil$i'); "?>">
                                            <i id="<?php echo "userExtPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $userExt; ?>,'updateUser','text',<?php echo $s['_id']; ?>,'userExt','Ext',<?php echo $pencilid9; ?>)"></i>
                                            <?php echo $s['userExt']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "TollFree".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('TollFreePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('TollFreePencil$i'); "?>">
                                            <i id="<?php echo "TollFreePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $TollFree; ?>,'updateUser','text',<?php echo $s['_id']; ?>,'TollFree','TollFree',<?php echo $pencilid10; ?>)"></i>
                                            <?php echo $s['TollFree']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "userFax".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('userFaxPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('userFaxPencil$i'); "?>">
                                            <i id="<?php echo "userFaxPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $userFax; ?>,'updateUser','text',<?php echo $s['_id']; ?>,'userFax','Fax',<?php echo $pencilid11; ?>)"></i>
                                            <?php echo $s['userFax']; ?>
                                        </td>
                                        <td><a href="#" onclick="show_privilege(<?php echo $s['_id']; ?>)"
                                                data-toggle="modal" data-target="#show_privilege"
                                                class="btn btn-warning">Privilege</a></td>
                                        <td>
                                            <?php if ($counter == 0) { ?>
                                            <a href="#" onclick="deleteUser(<?php echo $s['_id']; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></i></a>
                                            <?php } else { ?>
                                            <a href="#" disabled onclick="deleteCurrencyError()"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #adb5bd"></i></a>
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
                                        <th>Email</th>
                                        <th>Username</th>
                                        <!--                                    <th>Password</th>-->
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

                </div>
            </div>

            <div class="modal-footer1">
                <button type="button" onclick="exportUser(<?php echo $_SESSION['companyId']; ?>)"
                    class="btn btn-primary waves-effect waves-light float-left mr-1">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">
                    Close
                </button>
                <nav aria-label="..." class="float-right">
                    <ul class="pagination" id="paginate">
                        <li id="bank_previous" style="display:none">
                            <a class="page-link btn btn-secondary waves-effect"
                                onclick="previous_page('paginate_user','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Previous</a>
                        </li>
                        <select class="form-control" id="page_active"
                            onchange="paginate_user(this.value * <?php echo $limit; ?>,<?php echo $limit ?>,<?php echo $total_pages; ?>)">
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
                            if($total_pages > 0 && $total_pages > 1){
                            ?>
                        </select>
                        <li id="bank_next">
                            <a class="page-link btn btn-primary waves-effect waves-light"
                                onclick="next_page('paginate_user','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Next</a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
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
