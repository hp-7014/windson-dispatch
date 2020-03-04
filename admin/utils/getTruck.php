<?php
    session_start();
    $helper = "helper";
    require "../../database/connection.php";
    $no = 0;
    $table = "";
    $list = "";
    $type = 'text';
    $truckNameColmn = 'truckNumber';
        $collection = $db->truckadd;
        $show1 = $collection->aggregate([
            ['$match'=>['companyID'=>$_SESSION['companyId']]],
            ['$lookup' => [
                'from' => 'truck_add',
                'localField' => 'companyID',
                'foreignField' => 'companyID',
                'as' => 'truckdetails'
            ]
            
            ]
            ]);
            
            foreach ($show1 as $row) {
                $companyID = $row['companyID'];
                if ($companyID == $_SESSION['companyId']) {
                $truckNumber = $row['truck'];
                $truckdetails = $row['truckdetails'];
                $truckTypes = array();
                foreach ($truckdetails as $row2) {
                            $truckdetails = $row2['truck'];
                            $k = 0;
                            foreach ($truckdetails as $row3) {
                                $id = $row3['_id'];
                                $truckTypes[$k] = $row3['truckType'];
                                $k++;
                            }    
                    }
            
                $j = 0;
                        foreach ($truckNumber as $row1) {
                            $id = $row1['_id'];
                            $truckNumber = $row1['truckNumber'];
                            $truckType = $truckTypes[$row1['truckType']];
                            $j++;
                            $licensePlate = $row1['licensePlate'];
                            if(empty($row1['plateExpiry'])) {
                                $plateExpiry = "";
                            } else {
                                $plateExpiry = date('d/m/Y',$row1['plateExpiry']);
                            }
                            if(empty($row1['inspectionExpiry'])) {
                                $inspectionExpiry = "";
                            } else {
                                $inspectionExpiry = date('d/m/Y',$row1['inspectionExpiry']);
                            }
                            $status = $row1['status'];
                            $ownership = $row1['ownership'];
                            $mileage = $row1['mileage'];
                            $axies = $row1['axies'];
                            $year = $row1['year'];
                            $fuelType = $row1['fuelType'];
                            if(empty($row1['startDate'])) {
                                $startDate = "";
                            } else {
                                $startDate = date('d/m/Y',$row1['startDate']);
                            }
                            if(empty($row1['deactivationDate'])){
                                $deactivationDate = "";
                            }else {
                                $deactivationDate = date('d/m/Y',$row1['deactivationDate']);
                            }
                            $ifta = $row1['ifta'];
                            $registeredState = $row1['registeredState'];
                            $insurancePolicy = $row1['insurancePolicy'];
                            $grossWeight = $row1['grossWeight'];
                            $vin = $row1['vin'];
                            if(empty($row1['dotexpiryDate'])){
                                $dotexpiryDate = "";
                            }else {
                                $dotexpiryDate = date($row1['dotexpiryDate']);
                            }
                            $transponder = $row1['transponder'];
                            $internalNotes = $row1['internalNotes'];
                $limit = 4;
                $total_records = $row1->count();
                $total_pages = ceil($total_records / $limit);
                $no++;
    $table .= "<tr>
    <th>$no</th>
    <td>
        <a href='#' id='truckNumber".$id."1' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$truckNumber</a>
        <button type='button' id='truckNumber'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."2' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$truckType</a>
        <button type='button' id='truckType'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."3' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$licensePlate</a>
        <button type='button' id='licensePlate'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."4' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$plateExpiry</a>
        <button type='button' id='plateExpiry'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."5' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$inspectionExpiry</a>
        <button type='button' id='inspectionExpiry'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."6' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$status</a>
        <button type='button' id='status'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."7' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$ownership</a>
        <button type='button' id='ownership'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."8' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$mileage</a>
        <button type='button' id='mileage'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."9' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$axies</a>
        <button type='button' id='axies'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."10' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$year</a>
        <button type='button' id='year'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."11' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$fuelType</a>
        <button type='button' id='fuelType'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."12' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$startDate</a>
        <button type='button' id='startDate'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."13' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$ifta</a>
        <button type='button' id='deactivationDate'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."14' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$deactivationDate</a>
        <button type='button' id='ifta'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."15' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$registeredState</a>
        <button type='button' id='registeredState'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."16' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$insurancePolicy</a>
        <button type='button' id='insurancePolicy'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."17' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$grossWeight</a>
        <button type='button' id='grossWeight'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."18' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$vin</a>
        <button type='button' id='vin'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."19' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$dotexpiryDate</a>
        <button type='button' id='dotexpiryDate'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."20' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$transponder</a>
        <button type='button' id='transponder'.$id.'1' onclick='updateTruckAdd($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' id='truckNumber".$id."21' data-type='textarea' ondblclick='showTextarea(this.id,$type,$id,shipperName)' class='text-overflow'>$internalNotes</a>
        <button type='button' id='internalNotes'.$id.'1' onclick='updateTruckAdd ($truckNameColmn,$id)' style='display:none; margin-left:6px;' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi-check'></i></button>
    </td>
    <td>
        <a href='#' onclick='deleteTruckAdd($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a>
    </td>
</tr>
";
$value = "'".$id.")&nbsp;".$truckNumber."'";
$list .= "<option value=$value></option>";
    }
}
}

echo $table."^".$list;