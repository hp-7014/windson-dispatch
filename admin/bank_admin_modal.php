<?php
session_start();
include '../database/connection.php';
?>

<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="bank"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" onkeyup="searchText_Bank(this)" placeholder="search" style="margin-left: 5px;">

                <div class="bank-container" style="z-index: 1400"></div>
                <form action="" method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                            id="AddBank"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV
                        formate
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile"/>
                    </div>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                            onclick="import_Admin()">Upload
                    </button>
                </form>

                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="tech-companies-1" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">No</th>
                                        <th scope="col" col width="160" data-priority="1">Name of Bank</th>
                                        <th scope="col" col width="160" data-priority="3">Address / Branch</th>
                                        <th scope="col" col width="160" data-priority="1">Account Holder Name</th>
                                        <th scope="col" col width="160" data-priority="3">Bank Account</th>
                                        <th scope="col" col width="160" data-priority="3">Bank Routing</th>
                                        <th scope="col" col width="160" data-priority="6">Opening Bal Dt</th>
                                        <th scope="col" col width="160" data-priority="6">Opening Balance</th>
                                        <th scope="col" col width="160" data-priority="6">Transac Balance</th>
                                        <th scope="col" col width="160" data-priority="1">Check #</th>
                                        <th scope="col" col width="160" data-priority="3">Action</th>
                                    </tr>
                                </thead>
                                
                                <?php
                                    $limit = 100;
                                    $cursor = $db->bank_admin->find(array('companyID' => $_SESSION['companyId']));
                                    
                                    foreach ($cursor as $value) {
                                        $total_records = sizeof($value['admin_bank']);
                                        $total_pages = ceil($total_records / $limit);
                                    }

                                    // $collection = $db->bank_admin;
                                    // $g_data = $collection->aggregate([
                                    //     ['$lookup' => [
                                    //         'from' => 'company',
                                    //         'localField' => 'companyID',
                                    //         'foreignField' => 'companyID',
                                    //         'as' => 'companydetails'
                                    //     ]],
                                    //     ['$match'=>['companyID' => $_SESSION['companyId']]],
                                    //     ['$project'=>['companyID'=>$_SESSION['companyId'],'company'=>['$slice'=>['$company',0,$limit]],'companydetails'=>1]]
                                    // ]);
                                    
                                    //print_r($g_data);
                                    $g_data = $db->bank_admin->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('admin_bank' => array('$slice' => [0, $limit]))));                              
                                    
                                    $i = 1;
                                ?>

                                <tbody id="bankBody">
                                <?php foreach ($g_data as $data) {
                                    $bank_admin = $data['admin_bank'];
                                    //$companydetails = $data['companydetails'];
                                    // foreach ($companydetails as $row3) {
                                    //     $bankmaster = $row3['admin_bank'];
                                    //     $bank_Type = array();
                                    //     foreach ($bankmaster as $row4) {
                                    //         $bankktypeid = $row4['_id'];
                                    //         $bank_Type[$bankktypeid] = $row4['accountHolder'];
                                    //     }
                                    // }
                                    
                                    foreach ($bank_admin as $admin) {      
                                        $counter = $admin['counter'];                              
                                        $bankName = "'".$admin['bankName']."'";
                                        $bankAddresss = "'".$admin['bankAddresss']."'";
                                        $accountHolder = $admin['accountHolder'];
                                        $accountHolder = "'".$admin['accountHolder']."'";
                                        $accountNo = "'".$admin['accountNo']."'";
                                        $routingNo = "'".$admin['routingNo']."'";
                                        $openingBalDate = "'".$admin['openingBalDate']."'";
                                        $currentcheqNo = "'".$admin['currentcheqNo']."'";

                                        $pencilid1 = "'"."bankNamePencil$i"."'";
                                        $pencilid2 = "'"."bankAddresssPencil$i"."'";
                                        $pencilid3 = "'"."accountHolderPencil$i"."'";
                                        $pencilid4 = "'"."accountNoPencil$i"."'";
                                        $pencilid5 = "'"."routingNoPencil$i"."'";
                                        $pencilid6 = "'"."openingBalDatePencil$i"."'";
                                        $pencilid7 = "'"."currentcheqNoPencil$i"."'";

                                ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td class="custom-text" id="<?php echo "bankName".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('bankNamePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('bankNamePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "bankNamePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $bankName; ?>,'updateBank','text',<?php echo $admin['_id']; ?>,'bankName','Bank Name',<?php echo $pencilid1; ?>)"
                                                ></i>
                                                <?php echo $admin['bankName']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "bankAddresss".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('bankAddresssPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('bankAddresssPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "bankAddresssPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $bankAddresss; ?>,'updateBank','text',<?php echo $admin['_id']; ?>,'bankAddresss','Bank Address',<?php echo $pencilid2; ?>)"
                                                ></i>
                                                <?php echo $admin['bankAddresss']; ?>
                                            </td>
                                            <td class="custom-text">
                                                <?php echo $admin['accountHolder']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "accountNo".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('accountNoPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('accountNoPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "accountNoPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $accountNo; ?>,'updateBank','text',<?php echo $admin['_id']; ?>,'accountNo','Account Number',<?php echo $pencilid4; ?>)"
                                                ></i>
                                                <?php echo $admin['accountNo']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "routingNo".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('routingNoPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('routingNoPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "routingNoPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $routingNo; ?>,'updateBank','text',<?php echo $admin['_id']; ?>,'routingNo','Bank Rounting',<?php echo $pencilid5; ?>)"
                                                ></i>
                                                <?php echo $admin['routingNo']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "openingBalDate".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('openingBalDatePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('openingBalDatePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "openingBalDatePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $openingBalDate; ?>,'updateBank','text',<?php echo $admin['_id']; ?>,'openingBalDate','Opening Bal Dt',<?php echo $pencilid6; ?>)"
                                                ></i>
                                                <?php echo $admin['openingBalDate']; ?>
                                            </td>
                                            <td class="custom-text">
                                                <?php echo $admin['openingBalance']; ?>
                                            </td>
                                            <td class="custom-text">
                                                <?php echo $admin['openingBalance']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "currentcheqNo".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('currentcheqNoPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('currentcheqNoPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "currentcheqNoPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $currentcheqNo; ?>,'updateBank','text',<?php echo $admin['_id']; ?>,'currentcheqNo','Current Cheque No.',<?php echo $pencilid7; ?>)"
                                                ></i>
                                                <?php echo $admin['currentcheqNo']; ?>
                                            </td>
                                            <td>
                                                <?php if ($counter == 0) { ?>
                                                    <a href="#" onclick="deleteBank(<?php echo $admin['_id']; ?>,<?php echo $accountHolder ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
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
                                        <th>Name of Bank</th>
                                        <th>Address / Branch</th>
                                        <th>Account Holder Name</th>
                                        <th>Bank Account</th>
                                        <th>Bank Routing</th>
                                        <th>Opening Bal Dt</th>
                                        <th>Opening Balance</th>
                                        <th>Transac Balance</th>
                                        <th>Check #</th>
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
                                        onclick="paginate_bank_admin(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                        id="<?php echo $i; ?>"><a data-id="<?php echo $i; ?>"
                                            class="page-link"><?php echo $j; ?></a></li>
                            <?php
                                } else {
                                    ?>
                                    <li class="pageitem"
                                        onclick="paginate_bank_admin(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
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
                <button type="button" onclick="export_Admin()" class="btn btn-primary waves-effect"
                        data-dismiss="modal">
                    Export
                </button>

                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>

                <!--<button type="button" class="btn btn-primary waves-effect waves-light">Save
                </button>-->
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-----------------------------------------------Add bank------------------------------------------------------------------------------------->

<script type="text/javascript">
    // $("#search").keyup(function () {
    //     //alert(this.value);
    //     var value = this.value.toLowerCase().trim();

    //     $("table tr").each(function (index) {
    //         if (!index) return;
    //         $(this).find("td").each(function () {
    //             var id = $(this).text().toLowerCase().trim();
    //             var not_found = (id.indexOf(value) == -1);
    //             $(this).closest('tr').toggle(!not_found);
    //             return not_found;
    //         });
    //     });
    // });
</script>
