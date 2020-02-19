<?php
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
// Define the Header/Footer before writing anything so they appear on the first page
$mpdf->SetHTMLHeader('<table width="100%">
    <tr>
        <td width="20%"><img src="wds.png" hight="120px" width="120px"></td>
        <td width="50%"><h2 style="font-size:14px">KELSEY KITTRIDGE</h2><p style="font-size:12px">Phone: 701-353-5939</p>
        <p style="font-size:12px">Email: kelsey@armstrongtransport.com</p></td>
        
        <td width="30%" style="text-align: left;"><h2 style="font-size:14px;">Carrier Rate Confirmation</h2><span></span>
        <p style="font-size:12px;">Load #1283235-1C</p>
        <hr><p style="font-size:12px">Rate: $3,150.00</p>
        <p style="font-size:8px">Generated: Thursday, February 06, 2020 10:15:55</p>
        </td>
    </tr>
</table>');
$mpdf->SetHTMLFooter('
<table width="100%">
    <tr>
        <td width="33%">{DATE j-m-Y}</td>
        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
        <td width="33%" style="text-align: right;">My document</td>
    </tr>
</table>');

$mpdf->WriteHTML('Hello World');

$mpdf->Output();