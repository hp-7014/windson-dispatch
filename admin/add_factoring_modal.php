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
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#add_factoring"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

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

<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
     id="add_factoring"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Factoring Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Factoring Company Name <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Factoring Company Name *" type="text" id="factoring_add_company">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Address <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Address *" type="text" id="faddress">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Location <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Enter a location" type="text" id="flocation">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Postal / Zip<span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Postal / Zip" type="text" id="fzip">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Primary Contact</label>
                        <div>
                            <input class="form-control"
                                   placeholder="Primary Contact" type="text" id="fprimary_contact">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" type="text" id="ftelephone">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" placeholder="Ext" type="text" id="factext">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Fax</label>
                        <div>
                            <input class="form-control" placeholder="Fax" type="text" id="ffax">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Toll Free</label>
                        <div>
                            <input class="form-control" placeholder="Toll Free" type="text" id="ftollfree">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Contact Email</label>
                        <div>
                            <input class="form-control" type="email" id="femail" >
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Secondary Contact</label>
                        <div>
                            <input class="form-control" placeholder="Secondary Contact" type="text" id="fsecondaryContact">
                        </div>
                    </div>
                    <div class="form-group col-md-2 ">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" type="text" id="facttelephone">
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" placeholder="Ext" type="text" id="ext">
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="currencysetting">Currency Setting <span class="mandatory">*</span></label>
                        <input class="form-control" id="fcurrency" name="fcurrency" list="currencysetting"/>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="currencysetting">Payment Terms <span class="mandatory">*</span></label>
                        <input class="form-control" id="fpaymentterms" name="fpaymentterms" list="paymentterms"/>
                    </div>

                    <div class="form-group col-md-2">
                        <label>Tax ID <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Tax ID *"
                                   type="text" id="ftaxid">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Internal Notes</label>
                        <div>
                            <textarea rows="2" cols="30" class="form-control" type="textarea"
                                      id="finternal_notes_factoring"></textarea>
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">          
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="FactoringCompany()">Save
                </button>
            </div>
            <datalist id="currencysetting">
                <?php
                $show = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
                foreach ($show as $row) {
                    $show1 = $row['currency'];
                    foreach ($show1 as $row1) {
                        $id = $row1['_id'];
                        $currencyType = $row1['currencyType'];
                        ?>
                        <option value="<?php echo $id.")".$currencyType; ?>">
                    <?php }
                }?>
            </datalist>
            <datalist id="paymentterms">
                <?php
                $show = $db->payment_terms->find(['companyID' => $_SESSION['companyId']]);
                foreach ($show as $row) {
                    $show1 = $row['payment'];
                    foreach ($show1 as $row1) {
                        $id = $row1['_id'];
                        $paymentTerms = $row1['paymentTerm'];
                        ?>
                        <option value="<?php echo $id.")".$paymentTerms; ?>">
                    <?php }
                }?>
            </datalist>
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
