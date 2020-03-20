<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
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
$no = 0;
$table = "";
$factoringCompanynamecolumn = '"factoringCompanyname"';
$addresscolumn = '"address"';
$locationcolumn = '"location"';
$zipcolumn = '"zip"';
$primaryContactcolumn = '"primaryContact"';
$telephonecolumn = '"telephone"';
$extFactoringcolumn = '"extFactoring"';
$faxcolumn = '"fax"';
$tollFreecolumn = '"tollFree"';
$emailcolumn = '"email"';
$secondaryContactcolumn = '"secondaryContact"';
$factoringtelephonecolumn = '"factoringtelephone"';
$extcolumn = '"ext"';
$currencySettingcolumn = '"currencySetting"';
$paymentTermscolumn = '"paymentTerms"';
$taxIDcolumn = '"taxID"';
$internalNotecolumn = '"internalNote"';
$type = '"text"';
$list = "<option value='0'>--Select--</option>";
$list1 = "<option value='0'>--Select--</option>";
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
                    $no++;
        $table .= "<tr>
        <th>$no</th>
             
             <td>
                 <div id='1factoringCompanyname$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$factoringCompanynamecolumn)' class='text-overflow'>$factoringCompanyname</div>
                 <button type='button' id='factoringCompanyname$id' onclick='updateFactoring($factoringCompanynamecolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1address$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$addresscolumn)' class='text-overflow'>$address</div>
                 <button type='button' id='address$id' onclick='updateFactoring($addresscolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1location$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$locationcolumn)' class='text-overflow'>$location</div>
                 <button type='button' id='location$id' onclick='updateFactoring($locationcolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1zip$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$zipcolumn)' class='text-overflow'>$zip</div>
                 <button type='button' id='zip$id' onclick='updateFactoring($zipcolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1primaryContact$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$primaryContactcolumn)' class='text-overflow'>$primaryContact</div>
                 <button type='button' id='primaryContact$id' onclick='updateFactoring($primaryContactcolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1telephone$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$telephonecolumn)' class='text-overflow'>$telephone</div>
                 <button type='button' id='telephone$id' onclick='updateFactoring($telephonecolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1extFactoring$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$extFactoringcolumn)' class='text-overflow'>$extFactoring</div>
                 <button type='button' id='extFactoring$id' onclick='updateFactoring($extFactoringcolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1fax$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$faxcolumn)' class='text-overflow'>$fax</div>
                 <button type='button' id='fax$id' onclick='updateFactoring($faxcolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1tollFree$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$tollFree)' class='text-overflow'>$tollFree</div>
                 <button type='button' id='tollFree$id' onclick='updateFactoring($tollFree,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1email$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$email)' class='text-overflow'>$email</div>
                 <button type='button' id='email$id' onclick='updateFactoring($email,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1secondaryContact$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$secondaryContactcolumn)' class='text-overflow'>$secondaryContact</div>
                 <button type='button' id='secondaryContact$id' onclick='updateFactoring($secondaryContactcolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1factoringtelephone$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$factoringtelephonecolumn)' class='text-overflow'>$factoringtelephone</div>
                 <button type='button' id='factoringtelephone$id' onclick='updateFactoring($factoringtelephonecolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1ext$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$email)' class='text-overflow'>$ext</div>
                 <button type='button' id='ext$id' onclick='updateFactoring($email,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1currencySetting$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$currencySettingcolumn)' class='text-overflow'>$currencySetting</div>
                 <button type='button' id='currencySetting$id' onclick='updateFactoring($currencySettingcolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1paymentTerms$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$paymentTermscolumn)' class='text-overflow'>$paymentTerms</div>
                 <button type='button' id='paymentTerms$id' onclick='updateFactoring($paymentTermscolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1taxID$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$taxIDcolumn)' class='text-overflow'>$taxID</div>
                 <button type='button' id='taxID$id' onclick='updateFactoring($taxIDcolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>
             <td>
                 <div id='1internalNote$id' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,$internalNotecolumn)' class='text-overflow'>$internalNote</div>
                 <button type='button' id='internalNote$id' onclick='updateFactoring($internalNotecolumn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center now'><i class='mdi mdi-check'></i></button>
             </td>

             <td><a href='#' onclick='deletefactoring($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
        $list .= "<option value=$id)$factoringCompanyname></option>";
        $value = "'".$id.")&nbsp;".$factoringCompanyname."'";
        $list1 .= "<option value=$value></option>";
    }
}
echo $table."^".$list."^".$list1;