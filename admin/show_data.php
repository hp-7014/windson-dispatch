<?php
session_start();
require "../database/connection.php";

if ($_POST['type'] == 'pro') {

    $pre = $db->user->find(['companyID' => $_SESSION['companyId']]);

    $output = "";
    foreach ($pre as $item) {
        $i = $item['user'];
        foreach ($i as $p) {
            if ($p['_id'] == $_POST['id']) {
                ?>
                $output .="
                <tr>
                    <td>Add Bank</td>
                    <?php if ($p['addBank'] == 1) { ?>
                        <td><input type="checkbox" id="addBank" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="addBank"></td>
                    <?php } ?>
                    <td>Add customer</td>
                    <?php if ($p['addCustomer'] == 1) { ?>
                        <td><input type="checkbox" id="addCustomer" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="addCustomer"></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Company</td>
                    <?php if ($p['addCompany'] == 1) { ?>
                        <td><input type="checkbox" id="addCompany" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="addCompany"></td>
                    <?php } ?>
                    <td>Add Shipper</td>
                    <?php if ($p['addShipper'] == 1) { ?>
                        <td><input type="checkbox" id="addShipper" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="addShipper"></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Currency</td>
                    <?php if ($p['currency'] == 1) { ?>
                        <td><input type="checkbox" id="currency" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="currency"></td>
                    <?php } ?>
                    <td>Add Consignee</td>
                    <?php if ($p['addConsignee'] == 1) { ?>
                        <td><input type="checkbox" id="addConsignee" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="addConsignee"></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Payment Terms</td>
                    <?php if ($p['paymentTerms'] == 1) { ?>
                        <td><input type="checkbox" id="paymentTerms" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="paymentTerms"></td>
                    <?php } ?>
                    <td>Add Driver</td>
                    <?php if ($p['addDriver'] == 1) { ?>
                        <td><input type="checkbox" id="addDriver" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="addDriver"></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Office</td>
                    <?php if ($p['office'] == 1) { ?>
                        <td><input type="checkbox" id="office" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="office"></td>
                    <?php } ?>
                    <td>Add Truck</td>
                    <?php if ($p['addTruck'] == 1) { ?>
                        <td><input type="checkbox" id="addTruck" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="addTruck"></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Equipment Type</td>
                    <?php if ($p['equipmentType'] == 1) { ?>
                        <td><input type="checkbox" id="equipmentType" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="equipmentType"></td>
                    <?php } ?>
                    <td>Add Trailer</td>
                    <?php if ($p['addTrailer'] == 1) { ?>
                        <td><input type="checkbox" id="addTrailer" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="addTrailer"></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Truck Type</td>
                    <?php if ($p['truckType'] == 1) { ?>
                        <td><input type="checkbox" id="truckType" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="truckType"></td>
                    <?php } ?>
                    <td>Add External Carrier</td>
                    <?php if ($p['addExternalCarrier'] == 1) { ?>
                        <td><input type="checkbox" id="addExternalCarrier" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="addExternalCarrier"></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Trailer Type</td>
                    <?php if ($p['trailerType'] == 1) { ?>
                        <td><input type="checkbox" id="trailerType" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="trailerType"></td>
                    <?php } ?>
                    <td>Factoring Company</td>
                    <?php if ($p['factoringCompany'] == 1) { ?>
                        <td><input type="checkbox" id="factoringCompany" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="factoringCompany"></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Status Type</td>
                    <?php if ($p['statusType'] == 1) { ?>
                        <td><input type="checkbox" id="statusType" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="statusType"></td>
                    <?php } ?>
                    <td>Customs Broker</td>
                    <?php if ($p['customsBroker'] == 1) { ?>
                        <td><input type="checkbox" id="customsBroker" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="customsBroker"></td>
                    <?php } ?>
                </tr>
                <tr>
                <tr>
                    <td>Load Type</td>
                    <?php if ($p['loadType'] == 1) { ?>
                        <td><input type="checkbox" id="loadType" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="loadType"></td>
                    <?php } ?>
                    <td>Owner Operator</td>
                    <?php if ($p['ownerOperator'] == 1) { ?>
                        <td><input type="checkbox" id="ownerOperator" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="ownerOperator"></td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>Fix pay category</td>
                    <?php if ($p['fixPayCategory'] == 1) { ?>
                        <td><input type="checkbox" id="fixPayCategory" checked></td>
                    <?php } else { ?>
                        <td><input type="checkbox" id="fixPayCategory"></td>
                    <?php } ?>
                    <input type="hidden" id="objID" value="<?php echo $p['_id']; ?>">
                </tr>";
                <?php
            }
        }
    }
    echo $output;
}