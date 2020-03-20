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
                <div class="factoring-container" style="z-index: 1600"></div>

                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" id="AddFactoring"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

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
                               
                                
                                <tbody id="factoringBody">
                                <?php
                                    $no = 1;
                                    $collection = $db->factoring_company_add;
                                    $show1 = $collection->aggregate([
                                        ['$lookup' => [
                                            'from' => 'currency_add',
                                            'localField' => 'companyID', 
                                            'foreignField' => 'companyID',
                                            'as' => 'currency_1'
                                        ]],
                                        ['$lookup' => [
                                            'from' => 'payment_terms',
                                            'localField' => 'companyID', 
                                            'foreignField' => 'companyID',
                                            'as' => 'payment_1'
                                        ]],
                                        ['$match'=>['companyID'=>1]]
                                     ]);

                                     foreach ($show1 as $row) {
                                        $factoring = $row['factoring'];
                                        $currency_1 = $row['currency_1'];
                                        $payment_1 = $row['payment_1'];

                                        foreach ($currency_1 as $row2) {
                                            $currency = $row2['currency'];
                                            $currencyType = array();
                                            foreach ($currency as $row3) {
                                                $currencyid = $row3['_id'];
                                                $currencyType[$currencyid] = $row3['currencyType'];
                                            }
                                        }

                                        foreach ($payment_1 as $row4) {
                                                $payment = $row4['payment'];
                                                $paymentTerm = array();
                                                foreach ($payment as $row5) {
                                                  $paymentid = $row5['_id'];
                                                  $paymentTerm[$paymentid] = $row5['paymentTerm'];  
                                                }
                                        }

                                        foreach ($factoring as $row1) {
                                            $id = $row1['_id'];
                                            $factoringCompanyname = $row1['factoringCompanyname'];
                                            $address = $row1['address'];
                                            $location = $row1['location'];
                                            $zip = $row1['zip'];
                                            $primaryContact = $row1['primaryContact'];
                                            $telephone = $row1['telephone'];
                                            $extFactoring = $row1['extFactoring'];
                                            $fax = $row1['fax'];
                                            $tollFree = $row1['tollFree'];
                                            $email = $row1['email'];
                                            $secondaryContact = $row1['secondaryContact'];
                                            $factoringtelephone = $row1['factoringtelephone'];
                                            $ext = $row1['ext'];
                                            $currencySetting = $currencyType[$row1['currencySetting']];
                                            $paymentTerms = $paymentTerm[$row1['paymentTerms']];
                                            $taxID = $row1['taxID'];
                                            $internalNote = $row1['internalNote'];
                                                $limit = 4;
                                                $total_records = $row1->count();
                                                $total_pages = ceil($total_records / $limit);
                                ?>
                                    <tr>
                                        <th><?php echo $no++; ?></th>
                                        <td>
                                            <a href="#" id="factoringCompanyname<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'factoringCompanyname');" class="text-overflow"><?php echo $factoringCompanyname; ?></a>
                                            <button type="button" id="factoringCompanyname<?php echo $id; ?>" onclick="updateFactoring('factoringCompanyname',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="address<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'address');" class="text-overflow"><?php echo $address; ?></a>
                                            <button type="button" id="address<?php echo $id; ?>" onclick="updateFactoring('address',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="location<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'location');" class="text-overflow"><?php echo $location; ?></a>
                                            <button type="button" id="location<?php echo $id; ?>" onclick="updateFactoring('location',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>    
                                        <td>
                                            <a href="#" id="zip<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'zip');" class="text-overflow"><?php echo $zip; ?></a>
                                            <button type="button" id="zip<?php echo $id; ?>" onclick="updateFactoring('zip',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="primaryContact<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'primaryContact');" class="text-overflow"><?php echo $primaryContact; ?></a>
                                            <button type="button" id="primaryContact<?php echo $id; ?>" onclick="updateFactoring('primaryContact',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="extFactoring<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'extFactoring');" class="text-overflow"><?php echo $telephone; ?></a>
                                            <button type="button" id="extFactoring<?php echo $id; ?>" onclick="updateFactoring('extFactoring',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="fax<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'fax');" class="text-overflow"><?php echo $extFactoring; ?></a>
                                            <button type="button" id="fax<?php echo $id; ?>" onclick="updateFactoring('fax',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>           
                                        <td>
                                            <a href="#" id="tollFree<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'tollFree');" class="text-overflow"><?php echo $fax; ?></a>
                                            <button type="button" id="tollFree<?php echo $id; ?>" onclick="updateFactoring('tollFree',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="secondaryContact<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'secondaryContact');" class="text-overflow"><?php echo $tollFree; ?></a>
                                            <button type="button" id="secondaryContact<?php echo $id; ?>" onclick="updateFactoring('secondaryContact',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>   
                                        <td>
                                            <a href="#" id="factoringtelephone<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'factoringtelephone');" class="text-overflow"><?php echo $email; ?></a>
                                            <button type="button" id="factoringtelephone<?php echo $id; ?>" onclick="updateFactoring('factoringtelephone',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="ext<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'ext');" class="text-overflow"><?php echo $secondaryContact; ?></a>
                                            <button type="button" id="ext<?php echo $id; ?>" onclick="updateFactoring('ext',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="currencySetting<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'currencySetting');" class="text-overflow"><?php echo $factoringtelephone; ?></a>
                                            <button type="button" id="currencySetting<?php echo $id; ?>" onclick="updateFactoring('currencySetting',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="paymentTerms<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'paymentTerms');" class="text-overflow"><?php echo $ext; ?></a>
                                            <button type="button" id="paymentTerms<?php echo $id; ?>" onclick="updateFactoring('paymentTerms',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="taxID<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'taxID');" class="text-overflow"><?php echo $currencySetting; ?></a>
                                            <button type="button" id="taxID<?php echo $id; ?>" onclick="updateFactoring('taxID',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>
                                        <td>
                                            <a href="#" id="internalNote<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'internalNote');" class="text-overflow"><?php echo $paymentTerms; ?></a>
                                            <button type="button" id="internalNote<?php echo $id; ?>" onclick="updateFactoring('internalNote',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>  
                                        <td>
                                            <a href="#" id="internalNote<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'internalNote');" class="text-overflow"><?php echo $taxID; ?></a>
                                            <button type="button" id="internalNote<?php echo $id; ?>" onclick="updateFactoring('internalNote',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                        </td>  
                                        <td>
                                            <a href="#" id="internalNote<?php echo $id; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $id; ?>,'internalNote');" class="text-overflow"><?php echo $internalNote; ?></a>
                                            <button type="button" id="internalNote<?php echo $id; ?>" onclick="updateFactoring('internalNote',<?php echo $id; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
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