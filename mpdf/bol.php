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
        <td width="20%"><img src="Truck.png" hight="120px" width="120px"></td>
        <td width="40%" style="text-align: right;"><h2 style="font-size:18px">STRAIGHT BILL OF LADING</h2>
        
        <td width="28%" style="text-align: right;"><p style="font-size:12px;">4654 N MAPLEWOOD,</p><span></span>
        <p style="font-size:12px;">LA PORTE IN 46350</p>
        <h3 style="font-size:12px;">PHONE #:<span style="font-weight:normal"> 219-227-4488</span></h3>
        </td>
    </tr>
</table><hr>';
//Header End

//BOL INFO || INVOICING INFO Start
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
        <td width="65%" style="text-align: left;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">BOL INFO
    </h3></td>
        <td width="35%" style="background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">INVOICING INFO</h3></td>
    </tr>
</table>

<table width="100%">
    <tr>
        <td width="50%" style="border-radius:5px; line-height:1.6; text-align: left;border:1px solid #808080;padding:5px;">
        <h3>LOAD#<span style="font-weight:normal"> 18008</span></h3>
        <h3>BOL#<span style="font-weight:normal"> 18008</span></h3>
        </td>
    
    <td rowspan="2" width="35%" style="padding:5px; line-height:1.6; border:1px solid #808080;">
        <h3>Physical Address:</h3><span style="font-weight:normal;font-size:12px;">4654 N MAPLEWOOD,LA PORTE IN 46350.</span>
        <h3>Mailing Address:</h3><span style="font-weight:normal;font-size:12px;">OSTT BROKERAGE LLC,P.O.BOX 526 TECHNY IL 60082.</span>
    </tr>

    <tr>
        <td width="65%" style="border-radius:5px; line-height:1.6; text-align: left;border:1px solid #808080;padding:5px;">
        <h3>Phone No:<span style="font-weight:normal"> 219-227-4488</span></h3>
        <h3>Fax No:<span style="font-weight:normal"> 847-770-4429</span></h3>
        <h3>C.N. No:<span style="font-weight:normal">23015581</span></h3>
        </td>
    </tr>
</table>';
//BOL INFO || INVOICING INFO END

//Shipper Start
$data .= '<div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                        <tr>
                            <td width="50%" style="border-radius:5px; line-height:1.6; text-align: center;border:1px solid #808080;padding:5px;background-color:#02c58d;color:white;">
                            <h3>Shipper1</h3>
                            </td>
                        </tr>
                    </thead>
                    <tbody >
                     <tr align="left">
                    <td width="65%" style="border-radius:5px; line-height:1.6; text-align: left;border:1px solid #808080;padding:5px;">
                    <h3>Date:<span style="font-weight:normal"> 02-18-2020</span></h3>
                    <h3>Time:<span style="font-weight:normal"> 08:00 PM</span></h3>
                    <h3>Purchase Order #:<span style="font-weight:normal">PLEASE TELL YOUR DRIVER TO CALL FOR PO# & PU#</span></h3>
                    <h3>Notes #:<span style="font-weight:normal">FCFS / 2017 Volkswagen Golf Gti</span></h3>
                    <h3>Manheim Chicago<span style="font-weight:normal"> 20401 Cox Ave,</span></h3>
                    <h3><span style="font-weight:normal">Matteson, IL 60443</span></h3>
                    <h3>Phone No:<span style="font-weight:normal"> 815-806-4222</span></h3>
                    </td>
                    </tr> </tbody></table></div>';

//  of pieces || Description of the goods, marks, exceptions || Weight in LBS || Type || NMFC || HM || Class Start
$data .= '<div class="row" style="margin-top:20px;border:none;background-color:#C0C0C0">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                      <tr>
                        <th style="text-align:center" width="10%"># of pieces</th><hr>
                        <th style="text-align:center" width="35%" >Description of the goods, marks, exceptions</th><hr>
                        <th style="text-align:center" width="14%">Weight in LBS.</th><hr>
                        <th style="text-align:center" width="10%">Type</th><hr>
                        <th style="text-align:center" width="10%">NMFC</th><hr>
                        <th style="text-align:center" width="10%">HM</th><hr>
                        <th style="text-align:center" width="11%">Class</th><hr>
                      </tr>
                    </thead>
                    <tbody >
                     <tr align="center">
                        <td style="text-align:center">1</td>
                        <td style="text-align:center">1 car</td>
                        <td style="text-align:center">220.48</td>
                        <td style="text-align:center">LTL</td> 
                        <td style="text-align:center">4188.86</td>
                        <td style="text-align:center">5667.17</td>
                        <td style="text-align:center">5667.17</td>
                   </tr> </tbody></table></div>';
//  of pieces || Description of the goods, marks, exceptions || Weight in LBS || Type || NMFC || HM || Class END

$data .= '<div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                        <tr>
                            <td width="20%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Shipper </h3></td>
                            <td width="20%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Carrier </h3></td>
                            <td width="20%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Time </h3></td>
                            <td width="15%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Date </h3></td>
                            <td width="25%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Number Of Pieces Received </h3></td>
                        </tr>
                    </thead>
                    <tbody >
                    <tr align="center">
                        <td width="20%" style="border: 1px solid #808080;padding:15px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="20%" style="border: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="20%" style="border: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="20%" style="border: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="20%" style="border: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                    </tr>
                    </tbody></table></div>';
//Shipper END

//Consignee Start
$data .= '<div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                        <tr>
                            <td width="50%" style="border-radius:5px; line-height:1.6; text-align: center;border:1px solid #808080;padding:5px;background-color:#fc5454;color:white;">
                            <h3>Consignee1</h3>
                            </td>
                        </tr>
                    </thead>
                    <tbody >
                     <tr align="left">
                    <td width="65%" style="border-radius:5px; line-height:1.6; text-align: left;border:1px solid #808080;padding:5px;">
                    <h3>Date:<span style="font-weight:normal"> 02-18-2020</span></h3>
                    <h3>Time:<span style="font-weight:normal"> 08:00 PM</span></h3>
                    <h3>Purchase Order #:<span style="font-weight:normal">PLEASE TELL YOUR DRIVER TO CALL FOR PO# & PU#</span></h3>
                    <h3>Notes #:<span style="font-weight:normal">FCFS / 2017 Volkswagen Golf Gti</span></h3>
                    <h3>Manheim Chicago<span style="font-weight:normal"> 20401 Cox Ave,</span></h3>
                    <h3><span style="font-weight:normal">Matteson, IL 60443</span></h3>
                    <h3>Phone No:<span style="font-weight:normal"> 815-806-4222</span></h3>
                    </td>
                    </tr> </tbody></table></div>';

//  of pieces || Description of the goods, marks, exceptions || Weight in LBS || Type || NMFC || HM || Class Start
$data .= '<div class="row" style="margin-top:20px;border:none;background-color:#C0C0C0">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                      <tr>
                        <th style="text-align:center" width="10%"># of pieces</th><hr>
                        <th style="text-align:center" width="35%" >Description of the goods, marks, exceptions</th><hr>
                        <th style="text-align:center" width="14%">Weight in LBS.</th><hr>
                        <th style="text-align:center" width="10%">Type</th><hr>
                        <th style="text-align:center" width="10%">NMFC</th><hr>
                        <th style="text-align:center" width="10%">HM</th><hr>
                        <th style="text-align:center" width="11%">Class</th><hr>
                      </tr>
                    </thead>
                    <tbody >
                     <tr align="center">
                        <td style="text-align:center">1</td>
                        <td style="text-align:center">1 car</td>
                        <td style="text-align:center">220.48</td>
                        <td style="text-align:center">LTL</td> 
                        <td style="text-align:center">4188.86</td>
                        <td style="text-align:center">5667.17</td>
                        <td style="text-align:center">5667.17</td>
                   </tr> </tbody></table></div>';
//  of pieces || Description of the goods, marks, exceptions || Weight in LBS || Type || NMFC || HM || Class END

$data .= '<div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                      <tr>
                        <td width="25%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Consignee Name </h3></td>
                        <td width="25%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Date </h3></td>
                        <td width="25%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Signature </h3></td>
                        <td width="25%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Number Of Pieces Received </h3></td>
                      </tr>
                    </thead>
                    <tbody >
                    <tr align="center">
                        <td width="25%" style="border: 1px solid #808080;padding:15px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="25%" style="border: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="25%" style="border: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="25%" style="border: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                    </tr> </tbody></table></div><br>';
//Consignee END

//Note Start
$data .= '<div class="row" style="margin-top:10px;border:none;font-size:15px;color:black;padding:10px;text-align:left;">
                              <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <tr>
                        <td width="100%" style="border-radius:5px; text-align: justify; border:1px solid #808080;padding:10px;">
                        <h3>Notes:</h3>
                        </td>
            </tr></table></div><br>';
//Note END

$mpdf->WriteHTML($data);
$mpdf->output();
?>