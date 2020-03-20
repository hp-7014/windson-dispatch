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
        <td width="40%" style="text-align: right;"><h2 style="font-size:18px">Driver Pay Statement</h2>
        
        <td width="32%" style="text-align: right;"><p style="font-size:12px;">2994 BURR ST.</p><span></span>
        <p style="font-size:12px;">GARY, IN 46406 </p>
        <h3 style="font-size:12px;">PHONE #:<span style="font-weight:normal"> 219-979-4711</span></h3>
        </td>
    </tr>
</table><hr>';
//Header End

//Driver Name || Date Start
$data .= '<table width="100%">
    <tr>
        <td width="70%" style="text-align: left;background-color:#db7f06;color:white;padding:10px;"><h3 style="font-size:11px;">Driver Name : THAKOR PATEL</h3></td>
        <td width="30%" style="background-color:#30149B;color:white;padding:10px;"><h3 style="font-size:11px;">11-01-19 TO 11-08-19</h3></td>
    </tr>
</table>';
//Driver Name || Date END

//Pick Up Date || Truck || Trailer || Pick Up || Destination || Tarp || Stop || Empty Miles || Loaded Miles || Total Miles || Gross Driver Pay || Net Driver Pay Start
$data .= '<div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                      <tr>
                        <td width="40%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Pick Up Date - 11-01-2019</h3></td>
                        <td width="30%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Truck: 863  </h3></td>
                        <td width="30%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Trailer: 532004 </h3></td>
                  
                      </tr>
                    </thead>
                    <tbody >
                    <tr align="center">
                        <td width="40%" style="border-left: 1px solid #808080;padding:15px;"><h3>Pick Up:<span style="font-weight:normal"> Grove City , OH </span></h3><h3>Destination:<span style="font-weight:normal"> Lewisville , TX </span></h3></td>
                        <td width="30%" style="padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="30%" style="border-right: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                      
                    </tr> 
                    </tbody></table>
                    <table cellspacing="0" width="100%" style="font-size:12px; border-left:1px solid #808080;border-right:1px solid #808080;border-bottom:1px solid #808080;">
                    <thead>
                      <tr>
                        <th style="text-align:center" width="10%">Tarp</th><hr>
                        <th style="text-align:center" width="10%" >Stop</th><hr>
                        <th style="text-align:center" width="15%">Empty Miles</th><hr>
                        <th style="text-align:center" width="15%">Loaded Miles</th><hr>
                        <th style="text-align:center" width="15%">Total Miles</th><hr>
                        <th style="text-align:center" width="20%">Gross Driver Pay</th><hr>
                        <th style="text-align:center" width="15%">Net Driver Pay</th><hr>
                      </tr>
                    </thead>
                    <tbody >
                <tr style="text-align:center;">
                    <td style="text-align:center">0</td>
                    <td style="text-align:center">0</td>
                    <td style="text-align:center">12.12</td>
                    <td style="text-align:center">110.60</td> 
                    <td style="text-align:center">122.72</td>
                    <td style="text-align:center">364.77</td>
                    <td style="text-align:center">364.77</td>
                </tr></tbody></table></div>
                <div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                      <tr>
                        <td width="40%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Pick Up Date - 11-01-2019</h3></td>
                        <td width="30%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Truck: 863  </h3></td>
                        <td width="30%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Trailer: 532004 </h3></td>
                  
                      </tr>
                    </thead>
                    <tbody >
                    <tr align="center">
                        <td width="40%" style="border-left: 1px solid #808080;padding:15px;"><h3>Pick Up:<span style="font-weight:normal"> Grove City , OH </span></h3><h3>Destination:<span style="font-weight:normal"> Lewisville , TX </span></h3></td>
                        <td width="30%" style="padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="30%" style="border-right: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                      
                    </tr> 
                    </tbody></table>
                    <table cellspacing="0" width="100%" style="font-size:12px; border-left:1px solid #808080;border-right:1px solid #808080;border-bottom:1px solid #808080;">
                    <thead>
                      <tr>
                        <th style="text-align:center" width="10%">Tarp</th><hr>
                        <th style="text-align:center" width="10%" >Stop</th><hr>
                        <th style="text-align:center" width="15%">Empty Miles</th><hr>
                        <th style="text-align:center" width="15%">Loaded Miles</th><hr>
                        <th style="text-align:center" width="15%">Total Miles</th><hr>
                        <th style="text-align:center" width="20%">Gross Driver Pay</th><hr>
                        <th style="text-align:center" width="15%">Net Driver Pay</th><hr>
                      </tr>
                    </thead>
                    <tbody >
                <tr style="text-align:center;">
                    <td style="text-align:center">0</td>
                    <td style="text-align:center">0</td>
                    <td style="text-align:center">12.12</td>
                    <td style="text-align:center">110.60</td> 
                    <td style="text-align:center">122.72</td>
                    <td style="text-align:center">364.77</td>
                    <td style="text-align:center">364.77</td>
                </tr></tbody></table></div>
                <div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                      <tr>
                        <td width="40%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Pick Up Date - 11-01-2019</h3></td>
                        <td width="30%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Truck: 863  </h3></td>
                        <td width="30%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Trailer: 532004 </h3></td>
                  
                      </tr>
                    </thead>
                    <tbody >
                    <tr align="center">
                        <td width="40%" style="border-left: 1px solid #808080;padding:15px;"><h3>Pick Up:<span style="font-weight:normal"> Grove City , OH </span></h3><h3>Destination:<span style="font-weight:normal"> Lewisville , TX </span></h3></td>
                        <td width="30%" style="padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="30%" style="border-right: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                      
                    </tr> 
                    </tbody></table>
                    <table cellspacing="0" width="100%" style="font-size:12px; border-left:1px solid #808080;border-right:1px solid #808080;border-bottom:1px solid #808080;">
                    <thead>
                      <tr>
                        <th style="text-align:center" width="10%">Tarp</th><hr>
                        <th style="text-align:center" width="10%" >Stop</th><hr>
                        <th style="text-align:center" width="15%">Empty Miles</th><hr>
                        <th style="text-align:center" width="15%">Loaded Miles</th><hr>
                        <th style="text-align:center" width="15%">Total Miles</th><hr>
                        <th style="text-align:center" width="20%">Gross Driver Pay</th><hr>
                        <th style="text-align:center" width="15%">Net Driver Pay</th><hr>
                      </tr>
                    </thead>
                    <tbody >
                <tr style="text-align:center;">
                    <td style="text-align:center">0</td>
                    <td style="text-align:center">0</td>
                    <td style="text-align:center">12.12</td>
                    <td style="text-align:center">110.60</td> 
                    <td style="text-align:center">122.72</td>
                    <td style="text-align:center">364.77</td>
                    <td style="text-align:center">364.77</td>
                </tr></tbody></table></div>
                <div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                      <tr>
                        <td width="40%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Pick Up Date - 11-01-2019</h3></td>
                        <td width="30%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Truck: 863  </h3></td>
                        <td width="30%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Trailer: 532004 </h3></td>
                  
                      </tr>
                    </thead>
                    <tbody >
                    <tr align="center">
                        <td width="40%" style="border-left: 1px solid #808080;padding:15px;"><h3>Pick Up:<span style="font-weight:normal"> Grove City , OH </span></h3><h3>Destination:<span style="font-weight:normal"> Lewisville , TX </span></h3></td>
                        <td width="30%" style="padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="30%" style="border-right: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                      
                    </tr> 
                    </tbody></table>
                    <table cellspacing="0" width="100%" style="font-size:12px; border-left:1px solid #808080;border-right:1px solid #808080;border-bottom:1px solid #808080;">
                    <thead>
                      <tr>
                        <th style="text-align:center" width="10%">Tarp</th><hr>
                        <th style="text-align:center" width="10%" >Stop</th><hr>
                        <th style="text-align:center" width="15%">Empty Miles</th><hr>
                        <th style="text-align:center" width="15%">Loaded Miles</th><hr>
                        <th style="text-align:center" width="15%">Total Miles</th><hr>
                        <th style="text-align:center" width="20%">Gross Driver Pay</th><hr>
                        <th style="text-align:center" width="15%">Net Driver Pay</th><hr>
                      </tr>
                    </thead>
                    <tbody >
                <tr style="text-align:center;">
                    <td style="text-align:center">0</td>
                    <td style="text-align:center">0</td>
                    <td style="text-align:center">12.12</td>
                    <td style="text-align:center">110.60</td> 
                    <td style="text-align:center">122.72</td>
                    <td style="text-align:center">364.77</td>
                    <td style="text-align:center">364.77</td>
                </tr></tbody></table></div>
                <div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                      <tr>
                        <td width="40%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Pick Up Date - 11-01-2019</h3></td>
                        <td width="30%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Truck: 863  </h3></td>
                        <td width="30%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Trailer: 532004 </h3></td>
                  
                      </tr>
                    </thead>
                    <tbody >
                    <tr align="center">
                        <td width="40%" style="border-left: 1px solid #808080;padding:15px;"><h3>Pick Up:<span style="font-weight:normal"> Grove City , OH </span></h3><h3>Destination:<span style="font-weight:normal"> Lewisville , TX </span></h3></td>
                        <td width="30%" style="padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="30%" style="border-right: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                      
                    </tr> 
                    </tbody></table>
                    <table cellspacing="0" width="100%" style="font-size:12px; border-left:1px solid #808080;border-right:1px solid #808080;border-bottom:1px solid #808080;">
                    <thead>
                      <tr>
                        <th style="text-align:center" width="10%">Tarp</th><hr>
                        <th style="text-align:center" width="10%" >Stop</th><hr>
                        <th style="text-align:center" width="15%">Empty Miles</th><hr>
                        <th style="text-align:center" width="15%">Loaded Miles</th><hr>
                        <th style="text-align:center" width="15%">Total Miles</th><hr>
                        <th style="text-align:center" width="20%">Gross Driver Pay</th><hr>
                        <th style="text-align:center" width="15%">Net Driver Pay</th><hr>
                      </tr>
                    </thead>
                    <tbody >
                <tr style="text-align:center;">
                    <td style="text-align:center">0</td>
                    <td style="text-align:center">0</td>
                    <td style="text-align:center">12.12</td>
                    <td style="text-align:center">110.60</td> 
                    <td style="text-align:center">122.72</td>
                    <td style="text-align:center">364.77</td>
                    <td style="text-align:center">364.77</td>
                </tr></tbody></table></div>
                <div class="row" style="margin-top:20px;border:none;background-color:white">
                    <table  cellspacing="0" width="100%" style="font-size:10px;">
                    <thead>
                      <tr>
                        <td width="40%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Pick Up Date - 11-01-2019</h3></td>
                        <td width="30%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Truck: 863  </h3></td>
                        <td width="30%" style="text-align: center;background-color:#30149B;color:white;padding:5px;"><h3 style="font-size:11px;">Trailer: 532004 </h3></td>
                  
                      </tr>
                    </thead>
                    <tbody >
                    <tr align="center">
                        <td width="40%" style="border-left: 1px solid #808080;padding:15px;"><h3>Pick Up:<span style="font-weight:normal"> Grove City , OH </span></h3><h3>Destination:<span style="font-weight:normal"> Lewisville , TX </span></h3></td>
                        <td width="30%" style="padding:5px;"><h3 style="font-size:11px;"></h3></td>
                        <td width="30%" style="border-right: 1px solid #808080;padding:5px;"><h3 style="font-size:11px;"></h3></td>
                      
                    </tr> 
                    </tbody></table>
                    <table cellspacing="0" width="100%" style="font-size:12px; border-left:1px solid #808080;border-right:1px solid #808080;border-bottom:1px solid #808080;">
                    <thead>
                      <tr>
                        <th style="text-align:center" width="10%">Tarp</th><hr>
                        <th style="text-align:center" width="10%" >Stop</th><hr>
                        <th style="text-align:center" width="15%">Empty Miles</th><hr>
                        <th style="text-align:center" width="15%">Loaded Miles</th><hr>
                        <th style="text-align:center" width="15%">Total Miles</th><hr>
                        <th style="text-align:center" width="20%">Gross Driver Pay</th><hr>
                        <th style="text-align:center" width="15%">Net Driver Pay</th><hr>
                      </tr>
                    </thead>
                    <tbody >
                <tr style="text-align:center;">
                    <td style="text-align:center">0</td>
                    <td style="text-align:center">0</td>
                    <td style="text-align:center">12.12</td>
                    <td style="text-align:center">110.60</td> 
                    <td style="text-align:center">122.72</td>
                    <td style="text-align:center">364.77</td>
                    <td style="text-align:center">364.77</td>
                </tr></tbody></table></div>';
//Pick Up Date || Truck || Trailer || Pick Up || Destination || Tarp || Stop || Empty Miles || Loaded Miles || Total Miles || Gross Driver Pay || Net Driver Pay END

// Total Start
$data .= '<div class="row" style="margin-top:20px;border: 1px solid black;background-color:#C0C0C0">
                    <table width="100%" style="text-align:center;font-size:12px;font-weight:bold">
                    <tr>
                        <td><h4>Total</h4></td><hr>
                    </tr>
                    </table>
                    <table  cellspacing="0" width="100%" style="font-size:12px;">
                    <thead>
                      <tr>
                        <th style="text-align:center" width="10%">Tarp</th><hr>
                        <th style="text-align:center" width="10%" >Stop</th><hr>
                        <th style="text-align:center" width="15%">Empty Miles</th><hr>
                        <th style="text-align:center" width="15%">Loaded Miles</th><hr>
                        <th style="text-align:center" width="15%">Total Miles</th><hr>
                        <th style="text-align:center" width="20%">Gross Driver Pay</th><hr>
                        <th style="text-align:center" width="15%">Net Driver Pay</th><hr>
                      </tr>
                    </thead>
                    <tbody >
                     <tr align="center">
                        <td style="text-align:center">0.00</td>
                        <td style="text-align:center">0.00</td>
                        <td style="text-align:center">220.48</td>
                        <td style="text-align:center">3968.38</td> 
                        <td style="text-align:center">4188.86</td>
                        <td style="text-align:center">5667.17</td>
                        <td style="text-align:center">5667.17</td>
                   </tr> </tbody></table></div>';
// Total END

//Notes || Amount Start
$data .= '<div class="row" style="margin-top:20px;border: 1px solid black;">
                    <table  cellspacing="0" width="100%" style="font-size:12px;">
                    <thead>
                      <tr>
                        
                        <th style="text-align:center" width="50%">Notes</th><hr>
                        <th style="text-align:center" width="50%" >Amount</th><hr>
                        
                      </tr>
                    </thead>
                    <tbody >
                     <tr align="center">
                        <td style="text-align:center">Net Driver Pay</td>
                        <td style="text-align:center">5667.17</td>
                   </tr></tbody></table></div><br>';
//Notes || Amount END

//Note Start
$data .= '<div class="row" style="margin-top:10px;border:1px solid black;font-size:15px;color:black;padding:10px;text-align:center;">
          <p> Notes : Send BOL within <b style="color:red"><u>24 hours</u></b> of delivery. Otherwise, We will charge $50 per day.
          </div><br>';
//Note END

//Total Earning Start
$data .= '<table width="100%">
    <tr>
        <td width="70%" style="text-align: right;background-color:#db7f06;color:white;padding:10px;"><h3 style="font-size:11px;">Total Earning :</h3></td>
        <td width="30%" style="background-color:#30149B;color:white;padding:10px;"><h3 style="font-size:11px;">5667.17</h3></td>
    </tr>
</table>';
//Total Earning END

$mpdf->WriteHTML($data);
$mpdf->output();
?>