<?php
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->SetHTMLHeader('
<div style="text-align: right; font-size:9px">Generated: Thursday, February 06, 2020 10:15:55</div>');
$mpdf->setFooter('[Load Number-17474], [Carrier Legal Name-PSM LINES LLC ]<br>page {PAGENO} / {nb}');
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
        <td width="69%" style="border-radius:5px; text-align: left;border:1px solid #808080;padding:5px;">
        <p>Attn: Alex</p>
        <p>Phone: 219-202-4294</p>
        <p>Email: onestop747@gmail.com</p>
        </td>
        <td rowspan="2" width="35%" style="padding:5px; border:1px solid #808080;">
        <h3>Via mail:</h3><span style="font-weight:normal;font-size:12px;">8615 CliffCameron Dr Suite 200 Charlotte NC 28269</span>
        <h3>Via EMAIL:<span style="font-weight:normal">Chetancp01@gmail.com</span></h3>
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
        <td width="65%" style="border-radius:5px; text-align: left;border:1px solid #808080;padding:5px;">
        <h3>Mode:<span style="font-weight:normal"> Full TruckLoad</span></h3>
        <h3>Equipment:<span style="font-weight:normal"> F, Flatbed</span></h3>
        <h3>Product:<span style="font-weight:normal"> </span></h3>
        <h3>Temperature:<span style="font-weight:normal"> </span></h3>
        <h3>Driver:<span style="font-weight:normal"> miguel (708-931-8199)</span></h3>
        <h3>Truck#:<span style="font-weight:normal"> </span></h3>
        <h3>Trailer#:<span style="font-weight:normal"> </span></h3>
        </td>
    </tr>
</table>';
$mpdf->WriteHTML($data);
$mpdf->output();
?>