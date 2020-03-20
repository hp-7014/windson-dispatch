<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
$mpdf->SetHTMLHeader('<div style="text-align: right; font-size:9px">Generated: Thursday, February 06, 2020 10:15:55</div>');
$mpdf->setFooter('<a href="http://app.windsondispatch.com">www.windsondispatch.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[Load Number-17474], [Carrier Legal Name-PSM LINES LLC ]<br>page {PAGENO} / {nb}');

//Header Start
$data = $header = '<table width="100%">
    <tr>
        <td width="20%"><img src="wds.png" hight="120px" width="120px"></td>
        <td width="50%"><h2 style="font-size:14px">KELSEY KITTRIDGE</h2><p style="font-size:12px">Phone: 701-353-5939</p>
        <p style="font-size:12px">Email: kelsey@armstrongtransport.com</p></td>
        
        <td width="30%" style="text-align: left;"><h2 style="font-size:14px;">Carrier Rate Confirmation</h2><span></span>
        <p style="font-size:12px;">Load #1283235-1C</p>
        <p style="font-size:12px">Rate: $3,150.00</p>
        </td>
    </tr>
</table><hr>';
//Header End

//ONESTOP TOWING & TRANSPORT || MC || INVOICING INFO START
$data .= '<style>
    p {
        font-size:12px;
    }
    h3 {
        font-size:12px;
    }
    </style>
<table width="100%">
    <tr>
        <td width="40%" style="text-align: left;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">ONESTOP TOWING & TRANSPORT
    </h3></td>
        <td width="25%" style="background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">MC: 707562 | DOT: 488134</h3></td>
        <td width="35%" style="background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">INVOICING INFO</h3></td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td width="69%" style="border-radius:5px; line-height:1.6; text-align: left;border:1px solid #808080;padding:5px;">
        <p>Attn: Alex</p>
        <p>Phone: 219-202-4294</p>
        <p>Email: onestop747@gmail.com</p>
        </td>
    
    <td rowspan="2" width="35%" style="padding:5px; line-height:1.6; border:1px solid #808080;">
        <h3>MAIL:</h3><span style="font-weight:normal;font-size:12px;">8615 CliffCameron Dr Suite 200 Charlotte NC 28269</span>
        <h3>EMAIL:<span style="font-weight:normal">Chetancp01@gmail.com</span></h3>
        <hr>
        <p>Paperwork should reference Load #1283235-1</p>
        <p>All Invoices are paid 30 days after receipt of paperwork:</p>
        <h3>Advances:<span style="font-weight:normal"> All EFSChecks issued will be charged $5 or 4%which ever is greater.
        </span></h3>
        <h3>Check Payment Status:</h3>
        <h3>Online:<span style="font-weight:normal">windsonpayroll.com</span></h3>
        <h3>Email:<span style="font-weight:normal">chetancp01@gmail.com</span></h3></td>
    </tr>

    
    <tr>
        <td width="65%" style="border-radius:5px; line-height:1.6; text-align: left;border:1px solid #808080;padding:5px;">
        <h3>Mode:<span style="font-weight:normal"> Full TruckLoad</span></h3>
        <h3>Equipment:<span style="font-weight:normal"> F, Flatbed</span></h3>
        <h3>Product:<span style="font-weight:normal"> </span></h3>
        <h3>Temperature:<span style="font-weight:normal"> </span></h3>
        <h3>Driver:<span style="font-weight:normal"> miguel (708-931-8199)</span></h3>
        <h3>Truck#:<span style="font-weight:normal"> </span></h3>
        <h3>Trailer#:<span style="font-weight:normal"> </span></h3>
        </td>
    </tr>
</table><br>';
//ONESTOP TOWING & TRANSPORT || MC || INVOICING INFO END

//RATE DETAILS || CORPORATE INFO START
$data .= '<table width="100%">
    <tr>
        <td width="65%" style="background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">RATE DETAILS</h3></td>
        <td width="35%" style="background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">CORPORATE INFO</h3></td>
    </tr>
</table>
    <table width="100%">
    <tr>
        <td width="33%" style="border-top: 1px solid #808080; line-height:1.6; border-left: 1px solid #808080; border-bottom: 1px solid #808080; padding:5px; text-align:left;">
        <h3><span style="font-weight:normal">Line Haul</span></h3><hr>
        <h3>Total:</h3></td>
        <td width="16%" style="border-top: 1px solid #808080; line-height:1.6; border-right: 1px solid #808080; border-bottom: 1px solid #808080;padding:5px; text-align:right;">
         <h3><span style="font-weight:normal">$3,150.00</span><hr></h3>
         <h3>$3,150.00</h3>
        </td>
        
    <td rowspan="3" width="35%" style="padding:5px; line-height:1.6; border:1px solid #808080;">
        <h3></h3><span style="font-weight:normal;font-size:12px;">Armstrong TransportGroup, INC</span>
        <h3><span style="font-weight:normal">MC: 555609</span></h3>
        <p>P: 877-240-1181</p>
        <p>F: 980-225-0554</p>
        <h3><span style="font-weight:normal"> info@armstrongtransport.com</span></h3>
        <h3><span style="font-weight:normal">www.armstrongtransport.com</span></h3>
        <h3><span style="font-weight:normal">*For anyinformation about the Load, please contact the Armstrong Representative at the top of
        this document. For anyinformation about billing,
        please contact the CorporateOffice.
    </span></h3></td>
    </tr>
</table>';
//RATE DETAILS || CORPORATE INFO END


//Shipper  Start
$data .= '<div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                      <tr>
                        <td width="60%" style="text-align: left;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Stop</h3></td>
                        <td width="18%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="22%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                      </tr>
                      <tr>
                        <td width="60%" style="text-align: left;background-color:#02c58d;color:white;padding:5px;"><h3 style="font-size:11px;">Shiper 1</h3></td>
                        <td width="18%" style="text-align: center;background-color:#02c58d;color:white;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="22%" style="text-align: center;background-color:#02c58d;color:white;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                      </tr>
                    </thead>
                    <tbody >
                    <tr align="center">
                        <td width="60%" style="border-radius:5px; text-align: justify; border:1px solid #808080;padding:5px;">
                        <h3><span style="font-weight:normal">NORTH AMERICAN STAINLE 6870 HIGHWAY 42 EAST Ghent, KY, USA 41045 Phone No.502-347-6000 </span></h3><hr>
        <h3>Notes:<span style="font-weight:normal;">Drivers should confirm that the bol and material
 loaded on their trailer matches what they shoul
d be getting and that they are getting the entir
e load. We have multiple doors we load from and
depending on the product the truck might have to
 gate out and wait for hte next area to request
he gate back in. ThyssenKrupp Materials NA, Thys
senKrupp - FCFS Must call with PO number and get
 an unload # 0700-2200 ThyssenKrupp Materials NA
, ThyssenKrupp - unload number 9005NEED COIL RAC
K BEVELED LUMBER RUBBER MAT & TARPS</span></h3><hr>
<h3>Major Instruction:<span style="font-weight:normal">PLEASE MAINTAIN PICK-UP & DELIVERY ON TIME </span></h3><hr>
<h3>Description:<span style="font-weight:normal">PLEASE MAINTAIN PICK-UP & DELIVERY ON TIME </span></h3>
</td>
<td width="18%" style="border-top: 1px solid #808080; line-height:1.6; border-left: 1px solid #808080; border-bottom: 1px solid #808080; padding:5px; text-align:left;">
<h3>Date:</h3>
            <h3>Time:</h3>
            <h3>Type:</h3>
            <h3>Weight:</h3>
            <h3>Purchase Order#:</h3>
            <h3>Appointment:</h3>
            <h3>Quantity:</h3>
            <h3>Shipping Hours:</h3>
            </td>
        <td width="22%" style="border-top: 1px solid #808080; line-height:1.6; border-right: 1px solid #808080; border-bottom: 1px solid #808080;padding:5px; text-align:left;">
         <h3><span style="font-weight:normal">17/02/2020</span></h3>
         <h3><span style="font-weight:normal">09:00 AM</span></h3>
         <h3><span style="font-weight:normal">TL</span></h3>
         <h3><span style="font-weight:normal">43000</span></h3>
         <h3><span style="font-weight:normal">5400438173</span></h3>
         <h3><span style="font-weight:normal">Yes</span></h3>
         <h3><span style="font-weight:normal">1</span></h3>
         <h3><span style="font-weight:normal">08:00 AM TO 05:00 PM</span></h3>
            </td>
            </tr> </tbody></table></div>';
//Shipper END

//Consignee Start
$data .= '<div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                      <tr>
                        <td width="60%" style="text-align: left;background-color:#fc5454;color:white;padding:5px;"><h3 style="font-size:11px;">Shiper 1</h3></td>
                        <td width="18%" style="text-align: center;background-color:#fc5454;color:white;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="22%" style="text-align: center;background-color:#fc5454;color:white;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                      </tr>
                    </thead>
                    <tbody >
                    <tr align="center">
                        <td width="60%" style="border-radius:5px; text-align: justify; border:1px solid #808080;padding:5px;">
                        <h3><span style="font-weight:normal">NORTH AMERICAN STAINLE 6870 HIGHWAY 42 EAST Ghent, KY, USA 41045 Phone No.502-347-6000 </span></h3><hr>
        <h3>Notes:<span style="font-weight:normal;">Drivers should confirm that the bol and material
 loaded on their trailer matches what they shoul
d be getting and that they are getting the entir
e load. We have multiple doors we load from and
depending on the product the truck might have to
 gate out and wait for hte next area to request
he gate back in. ThyssenKrupp Materials NA, Thys
senKrupp - FCFS Must call with PO number and get
 an unload # 0700-2200 ThyssenKrupp Materials NA
, ThyssenKrupp - unload number 9005NEED COIL RAC
K BEVELED LUMBER RUBBER MAT & TARPS</span></h3><hr>
<h3>Major Instruction:<span style="font-weight:normal">PLEASE MAINTAIN PICK-UP & DELIVERY ON TIME </span></h3><hr>
<h3>Description:<span style="font-weight:normal">PLEASE MAINTAIN PICK-UP & DELIVERY ON TIME </span></h3>
</td>
<td width="18%" style="border-top: 1px solid #808080; line-height:1.6; border-left: 1px solid #808080; border-bottom: 1px solid #808080; padding:5px; text-align:left;">
<h3>Date:</h3>
            <h3>Time:</h3>
            <h3>Type:</h3>
            <h3>Weight:</h3>
            <h3>Purchase Order#:</h3>
            <h3>Appointment:</h3>
            <h3>Quantity:</h3>
            <h3>Shipping Hours:</h3>
            </td>
        <td width="22%" style="border-top: 1px solid #808080; line-height:1.6; border-right: 1px solid #808080; border-bottom: 1px solid #808080;padding:5px; text-align:left;">
         <h3><span style="font-weight:normal">17/02/2020</span></h3>
         <h3><span style="font-weight:normal">09:00 AM</span></h3>
         <h3><span style="font-weight:normal">TL</span></h3>
         <h3><span style="font-weight:normal">43000</span></h3>
         <h3><span style="font-weight:normal">5400438173</span></h3>
         <h3><span style="font-weight:normal">Yes</span></h3>
         <h3><span style="font-weight:normal">1</span></h3>
         <h3><span style="font-weight:normal">08:00 AM TO 05:00 PM</span></h3>
            </td>
            </tr> </tbody></table></div>';
//Consignee END

//SPECIAL INSTRUCTIONS Start
$data .= '<div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                      <tr>
                        <td width="100%" style="text-align: left;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Special Instructions</h3></td>
                        </tr>
                    </thead>
                    <tbody >
                    <tr align="center">
                        <td width="100%" style="border-radius:5px; text-align: justify; border:1px solid #808080;padding:10px;">
                        </td>
            </tr> </tbody></table></div><br>';
//SPECIAL INSTRUCTIONS END

//Carrier pay || Date || Truck || Total || Driver Name || Trailer || Accepted By || Cell || Signature Start
$data .= '<table width="100%" style="text-align:left;">
    <tr>
        <td width="25%" style="line-height:2.5; padding:5px;">
        <h3>Carrier pay:<span style="font-weight:normal"> $300.00</span></h3>
        <h3>Accepted By: <span style="font-weight:normal"> ________________</span></h3>
        <h3>Date:<span style="font-weight:normal"> ________________</span></h3>
        </td>
        <td width="25%" style="line-height:2.5; padding:5px; ">
        <h3>Total:<span style="font-weight:normal"> $300.00 USD</span></h3>
        <h3>Driver Name:<span style="font-weight:normal"> ________________</span></h3>
        <h3>Cell #:<span style="font-weight:normal"> ________________</span></h3>
        </td>
        <td width="25%" style="line-height:2.5; padding:5px; ">
        <h3>Truck #:<span style="font-weight:normal"> ________________</span></h3>
        <h3>Trailer #:<span style="font-weight:normal"> ________________</span></h3>
        <h3>Signature:<span style="font-weight:normal"> ________________</span></h3>
        </td>
    </tr>
    </table>';
//Carrier pay || Date || Truck || Total || Driver Name || Trailer || Accepted By || Cell || Signature END

$mpdf->WriteHTML($data);
$mpdf->output("carrier_rate_confirmation.pdf",'F');
?>