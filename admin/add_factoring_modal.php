<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="factoring"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Factoring Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
            <div class="factoring-container" style="z-index: 1400"></div>
                   
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#" id="AddFactoring"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>
                                        <input type="submit" name="submit" onclick="importDriver()"
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
                                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                                    <br>
                
                

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="factoring_table" class="scroll" >
                                <thead>
                                    <tr>
                                        <th scope="col" col width="160">No</th>
                                        <th scope="col" col width="160" data-priority="1">Factoring Company Name</th>
                                        <th scope="col" col width="160" data-priority="3">Address</th>
                                        <th scope="col" col width="160" data-priority="1">Location</th>
                                        <th scope="col" col width="160" data-priority="3">Postal/Zip</th>
                                        <th scope="col" col width="160" data-priority="3">Primary Contact</th>
                                        <th scope="col" col width="160" data-priority="6">Telephone</th>
                                        <th scope="col" col width="160" data-priority="6">Ext</th>
                                        <th scope="col" col width="160" data-priority="6">Fax</th>
                                        <th scope="col" col width="160" data-priority="1">Toll Free</th>
                                        <th scope="col" col width="160" data-priority="3">Contact Email</th>
                                        <th scope="col" col width="160" data-priority="1">Secondary Contact</th>
                                        <th scope="col" col width="160" data-priority="3">Telephone</th>
                                        <th scope="col" col width="160" data-priority="3">Ext</th>
                                        <th scope="col" col width="160" data-priority="6">Currency Setting</th>
                                        <th scope="col" col width="160" data-priority="6">Payment Terms</th>
                                        <th scope="col" col width="160" data-priority="6">Tax ID</th>
                                        <th scope="col" col width="160" data-priority="1">Internal Notes</th>
                                        <th scope="col" col width="160" data-priority="3">Action</th>
                                    </tr>
                                </thead>
                               
                                <?php
                                    $no = 1;
                                    $show = $db->factoring_company_add->find(['companyID' => $_SESSION['companyId']]);
                                    foreach ($show as $row){
                                        $show1 = $row['factoring'];
                                        foreach ($show1 as $row1) {
                                            $id = $row1['_id'];
                                            $factoringCompany = $row1['factoringCompanyname'];
                                            $address = $row1['address'];
                                            $location = $row1['location'];
                                            $zip = $row1['zip'];
                                            $primarycontact = $row1['primaryContact'];
                                            $factoringtelephone = $row1['telephone'];
                                            $factoringext = $row1['extFactoring'];
                                            $fax = $row1['fax'];
                                            $tollFree = $row1['tollFree'];
                                            $email = $row1['email'];
                                            $secondarycontact = $row1['secondaryContact'];
                                            $telephone = $row1['telephone'];
                                            $ext = $row1['ext'];
                                            $currency = $row1['currencySetting'];
                                            $payment = $row1['paymentTerms'];
                                            $taxtid = $row1['taxID'];
                                            $finternalNotes = $row1['internalNote'];
                                            $limit = 4;
                                            $total_records = $row1->count();
                                            $total_pages = ceil($total_records / $limit);
                                ?>
                                <tbody>
                                    <tr>
                                        <th><?php echo $no++; ?></th>
                                        <td>
                                            <a href="#" id="factoringCompanyname<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'factoringCompanyname');" class="text-overflow"><?php echo $factoringCompany; ?></a>
                                            <button type="button" id="factoringCompanyname<?php echo $row1['_id']; ?>" onclick="updateFactoring('factoringCompanyname',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="address<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'address');" class="text-overflow"><?php echo $address; ?></a>
                                            <button type="button" id="address<?php echo $row1['_id']; ?>" onclick="updateFactoring('address',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="location<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'location');" class="text-overflow"><?php echo $location; ?></a>
                                            <button type="button" id="location<?php echo $row1['_id']; ?>" onclick="updateFactoring('location',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>    
                                        <td>
                                            <a href="#" id="zip<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'zip');" class="text-overflow"><?php echo $zip; ?></a>
                                            <button type="button" id="zip<?php echo $row1['_id']; ?>" onclick="updateFactoring('zip',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="primaryContact<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'primaryContact');" class="text-overflow"><?php echo $primarycontact; ?></a>
                                            <button type="button" id="primaryContact<?php echo $row1['_id']; ?>" onclick="updateFactoring('primaryContact',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="extFactoring<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'extFactoring');" class="text-overflow"><?php echo $factoringext; ?></a>
                                            <button type="button" id="extFactoring<?php echo $row1['_id']; ?>" onclick="updateFactoring('extFactoring',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="fax<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'fax');" class="text-overflow"><?php echo $fax; ?></a>
                                            <button type="button" id="fax<?php echo $row1['_id']; ?>" onclick="updateFactoring('fax',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>           
                                        <td>
                                            <a href="#" id="tollFree<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'tollFree');" class="text-overflow"><?php echo $tollFree; ?></a>
                                            <button type="button" id="tollFree<?php echo $row1['_id']; ?>" onclick="updateFactoring('tollFree',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="email<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'email');" class="text-overflow"><?php echo $email; ?></a>
                                            <button type="button" id="email<?php echo $row1['_id']; ?>" onclick="updateFactoring('email',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="secondaryContact<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'secondaryContact');" class="text-overflow"><?php echo $secondarycontact; ?></a>
                                            <button type="button" id="secondaryContact<?php echo $row1['_id']; ?>" onclick="updateFactoring('secondaryContact',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>   
                                        <td>
                                            <a href="#" id="factoringtelephone<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'factoringtelephone');" class="text-overflow"><?php echo $telephone; ?></a>
                                            <button type="button" id="factoringtelephone<?php echo $row1['_id']; ?>" onclick="updateFactoring('factoringtelephone',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="ext<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'ext');" class="text-overflow"><?php echo $ext; ?></a>
                                            <button type="button" id="ext<?php echo $row1['_id']; ?>" onclick="updateFactoring('ext',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="currencySetting<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'currencySetting');" class="text-overflow"><?php echo $currency; ?></a>
                                            <button type="button" id="currencySetting<?php echo $row1['_id']; ?>" onclick="updateFactoring('currencySetting',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="paymentTerms<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'paymentTerms');" class="text-overflow"><?php echo $payment; ?></a>
                                            <button type="button" id="paymentTerms<?php echo $row1['_id']; ?>" onclick="updateFactoring('paymentTerms',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="taxID<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'taxID');" class="text-overflow"><?php echo $taxtid; ?></a>
                                            <button type="button" id="taxID<?php echo $row1['_id']; ?>" onclick="updateFactoring('taxID',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="internalNote<?php echo $row1['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $row1['_id']; ?>,'internalNote');" class="text-overflow"><?php echo $finternalNotes; ?></a>
                                            <button type="button" id="internalNote<?php echo $row1['_id']; ?>" onclick="updateFactoring('internalNote',<?php echo $row1['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>        
                                        <td><a href="#" onclick="deletefactoring(<?php echo $id; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></a></i>
                                        </td>
                                    </tr>
                                    <?php }
                                    } ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Factoring Company Name</th>
                                        <th>Address</th>
                                        <th>Location</th>
                                        <th>Postal/Zip</th>
                                        <th>Primary Contact</th>
                                        <th>Telephone</th>
                                        <th>Ext</th>
                                        <th>Fax</th>
                                        <th>Toll Free</th>
                                        <th>Contact Email</th>
                                        <th>Secondary Contact</th>
                                        <th>Telephone</th>
                                        <th>Ext</th>
                                        <th>Currency Setting</th>
                                        <th>Payment Terms</th>
                                        <th>Tax ID</th>
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
                <button type="button" onclick="exportFactoring()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


