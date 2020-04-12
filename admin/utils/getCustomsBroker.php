<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";

// Live Data Here..

if ($_GET['types'] == 'live_customs') {
   $limit = 100;
   $cursor = $db->customs_broker->find(array('companyID' => $_SESSION['companyId']));

   foreach ($cursor as $value) {
      $total_records = sizeof($value['custom_b']);
      $total_pages = ceil($total_records / $limit);
   }

   $type = '"text"';
   $table = "";
   $pages = "";
   //$show = $db->customs_broker->find(['companyID' => $_SESSION['companyId']]);
   $show1 = $db->customs_broker->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('custom_b' => array('$slice' => [0, $limit]))));

   $i = 0;
   foreach ($show1 as $row) {
      // $custom_1 = array();
      // $k = 0;
      // $custom_1[$k] = $row['custom_b'];
      // $k++;
      $custom_1 = $row['custom_b'];
      foreach ($custom_1 as $row1) {
   // foreach ($show as $row) {
   //    $show1 = $row['custom_b'];
   //    foreach ($show1 as $row1) {
         $id = $row1['_id'];    
         $brokerName = $row1['brokerName'];
         $crossing = $row1['crossing'];
         $telephone = $row1['telephone'];
         $ext = $row1['ext'];
         $tollfree = $row1['tollfree'];
         $fax = $row1['fax'];
         $Status = $row1['Status'];
         $column1 = '"brokerName"';
         $column2 = '"crossing"';
         $column3 = '"telephone"';
         $column4 = '"ext"';
         $column5 = '"tollfree"';
         $column6 = '"fax"';
         $column7 = '"Status"';

         $updateCustom = '"updateCustom"';
         $i++;

         $c_type1 = '"'.$brokerName.'"';
         $c_type2 = '"'.$crossing.'"';
         $c_type3 = '"'.$telephone.'"';
         $c_type4 = '"'.$ext.'"';
         $c_type5 = '"'.$tollfree.'"';
         $c_type6 = '"'.$fax.'"';
         $c_type7 = '"'.$Status.'"';

         $title1 = '"Broker Name"';
         $title2 = '"Crossing"';
         $title3 = '"telephone"';
         $title4 = '"ext"';
         $title5 = '"tollfree"';
         $title6 = '"fax"';
         $title7 = '"Status"';

         $pencilid1 = '"brokerNamePencil'.$i.'"';
         $pencilid2 = '"crossingPencil'.$i.'"';
         $pencilid3 = '"telephonePencil'.$i.'"';
         $pencilid4 = '"extPencil'.$i.'"';
         $pencilid5 = '"tollfreePencil'.$i.'"';
         $pencilid6 = '"faxPencil'.$i.'"';
         $pencilid7 = '"StatusPencil'.$i.'"';

         $table .= "<tr>
            <th> $i</th>
            <th class='custom-text' id='brokerName$i'
               onmouseover='showPencil_s($pencilid1)'
               onmouseout='hidePencil_s($pencilid1)'
               >
               <i id='brokerNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type1,$updateCustom,$type,$id,$column1,$title1,$pencilid1)'
               ></i>
               $brokerName
            </th>
            <td class='custom-text' id='crossing$i'
               onmouseover='showPencil_s($pencilid2)'
               onmouseout='hidePencil_s($pencilid2)'
               >
               <i id='crossingPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type2,$updateCustom,$type,$id,$column2,$title2,$pencilid2)'
               ></i>
               $crossing
            </td>
            <td class='custom-text' id='telephone$i'
               onmouseover='showPencil_s($pencilid3)'
               onmouseout='hidePencil_s($pencilid3)'
               >
               <i id='telephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type3,$updateCustom,$type,$id,$column3,$title3,$pencilid3)'
               ></i>
               $telephone
            </td>
            <td class='custom-text' id='ext$i'
               onmouseover='showPencil_s($pencilid4)'
               onmouseout='hidePencil_s($pencilid4)'
               >
               <i id='extPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type4,$updateCustom,$type,$id,$column4,$title4,$pencilid4)'
               ></i>
               $ext
            </td>
            <td class='custom-text' id='tollfree$i'
               onmouseover='showPencil_s($pencilid5)'
               onmouseout='hidePencil_s($pencilid5)'
               >
               <i id='tollfreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type5,$updateCustom,$type,$id,$column5,$title5,$pencilid5)'
               ></i>
               $tollfree
            </td>
            <td class='custom-text' id='fax$i'
               onmouseover='showPencil_s($pencilid6)'
               onmouseout='hidePencil_s($pencilid6)'
               >
               <i id='faxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type6,$updateCustom,$type,$id,$column6,$title6,$pencilid6)'
               ></i>
               $fax
            </td>
            <td class='custom-text' id='Status$i'
               onmouseover='showPencil_s($pencilid7)'
               onmouseout='hidePencil_s($pencilid7)'
               >
               <i id='StatusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type7,$updateCustom,$type,$id,$column7,$title7,$pencilid7)'
               ></i>
               $Status
            </td>
            <td><a href='#' onclick='deleteCustom($id)'><i
                     class='mdi mdi-delete-sweep-outline'
                     style='font-size: 20px; color: #FC3B3B'></a></i>
            </td>
         </tr>";
      }
      $fun_nm = '"paginate_custom_broker"';
      $p_no = '"page_no"';

      $pages .= "<li id='bank_previous' style='display:none'>
            <a class='page-link btn btn-secondary waves-effect'
               onclick='previous_page($fun_nm,$p_no,$limit,$total_pages)'>Previous</a>
            </li>
            <select class='form-control' id='page_active'
               onchange='paginate_custom_broker(this.value * $limit,$limit,$total_pages)'>";
      $j = 1;

      for ($i = 0; $i < $total_pages; $i++) {
            if ($i == 0) {
               $pages .= "<option value='$i'>$j</option>";
            } else {
               $pages .= "<option value='$i'>$j</option>";
            }
            $j++;
      } 

      if($total_pages > 0 && $total_pages > 1) {
            $pages .= "</select>
               <li id='bank_next'>
                  <a class='page-link btn btn-primary waves-effect waves-light'
                        onclick='next_page($fun_nm,$p_no,$limit,$total_pages)'>Next</a>
               </li>";

      }
   }
   echo $table."^".$pages;
}

// Pagination Page Here..

if ($_GET['types'] == 'paginate_customs') { 
   $start = (int)$_POST['start'];
   $limit = (int)$_POST['limit'];
   $i = 0;
   $cursor = $db->customs_broker->find(array('companyID' => $_SESSION['companyId']));
   foreach ($cursor as $value) {
      $total_records = sizeof($value['custom_b']);
      $total_pages = ceil($total_records / $limit);
   }
   
   $type='"text"';
   $show1 = $db->customs_broker->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('custom_b' => array('$slice' => [$start, $limit]))));

   foreach ($show1 as $row) {
      // $custom_1 = array();
      // $k = 0;
      // $custom_1[$k] = $row['custom_b'];
      // $k++;
      $custom_1 = $row['custom_b'];
      foreach ($custom_1 as $row1) {
         $start += 1;
         $id = $row1['_id'];    
         $brokerName = $row1['brokerName'];
         $crossing = $row1['crossing'];
         $telephone = $row1['telephone'];
         $ext = $row1['ext'];
         $tollfree = $row1['tollfree'];
         $fax = $row1['fax'];
         $Status = $row1['Status'];
         $column1 = '"brokerName"';
         $column2 = '"crossing"';
         $column3 = '"telephone"';
         $column4 = '"ext"';
         $column5 = '"tollfree"';
         $column6 = '"fax"';
         $column7 = '"Status"';
         
         $updateCustom = '"updateCustom"';
         $i++;

         $c_type1 = '"'.$brokerName.'"';
         $c_type2 = '"'.$crossing.'"';
         $c_type3 = '"'.$telephone.'"';
         $c_type4 = '"'.$ext.'"';
         $c_type5 = '"'.$tollfree.'"';
         $c_type6 = '"'.$fax.'"';
         $c_type7 = '"'.$Status.'"';

         $title1 = '"Broker Name"';
         $title2 = '"Crossing"';
         $title3 = '"telephone"';
         $title4 = '"ext"';
         $title5 = '"tollfree"';
         $title6 = '"fax"';
         $title7 = '"Status"';

         $pencilid1 = '"brokerNamePencil'.$i.'"';
         $pencilid2 = '"crossingPencil'.$i.'"';
         $pencilid3 = '"telephonePencil'.$i.'"';
         $pencilid4 = '"extPencil'.$i.'"';
         $pencilid5 = '"tollfreePencil'.$i.'"';
         $pencilid6 = '"faxPencil'.$i.'"';
         $pencilid7 = '"StatusPencil'.$i.'"';

         echo "<tr>
            <th> $start</th>
            <th class='custom-text' id='brokerName$i'
               onmouseover='showPencil_s($pencilid1)'
               onmouseout='hidePencil_s($pencilid1)'
               >
               <i id='brokerNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type1,$updateCustom,$type,$id,$column1,$title1,$pencilid1)'
               ></i>
               $brokerName
            </th>
            <td class='custom-text' id='crossing$i'
               onmouseover='showPencil_s($pencilid2)'
               onmouseout='hidePencil_s($pencilid2)'
               >
               <i id='crossingPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type2,$updateCustom,$type,$id,$column2,$title2,$pencilid2)'
               ></i>
               $crossing
            </td>
            <td class='custom-text' id='telephone$i'
               onmouseover='showPencil_s($pencilid3)'
               onmouseout='hidePencil_s($pencilid3)'
               >
               <i id='telephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type3,$updateCustom,$type,$id,$column3,$title3,$pencilid3)'
               ></i>
               $telephone
            </td>
            <td class='custom-text' id='ext$i'
               onmouseover='showPencil_s($pencilid4)'
               onmouseout='hidePencil_s($pencilid4)'
               >
               <i id='extPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type4,$updateCustom,$type,$id,$column4,$title4,$pencilid4)'
               ></i>
               $ext
            </td>
            <td class='custom-text' id='tollfree$i'
               onmouseover='showPencil_s($pencilid5)'
               onmouseout='hidePencil_s($pencilid5)'
               >
               <i id='tollfreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type5,$updateCustom,$type,$id,$column5,$title5,$pencilid5)'
               ></i>
               $tollfree
            </td>
            <td class='custom-text' id='fax$i'
               onmouseover='showPencil_s($pencilid6)'
               onmouseout='hidePencil_s($pencilid6)'
               >
               <i id='faxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type6,$updateCustom,$type,$id,$column6,$title6,$pencilid6)'
               ></i>
               $fax
            </td>
            <td class='custom-text' id='Status$i'
               onmouseover='showPencil_s($pencilid7)'
               onmouseout='hidePencil_s($pencilid7)'
               >
               <i id='StatusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                  onclick='updateTableColumn($c_type7,$updateCustom,$type,$id,$column7,$title7,$pencilid7)'
               ></i>
               $Status
            </td>
            <td><a href='#' onclick='deleteCustom($id)'><i
                     class='mdi mdi-delete-sweep-outline'
                     style='font-size: 20px; color: #FC3B3B'></a></i>
            </td>
         </tr>";

      }
   }
}

// Search Text Here..
if ($_GET['types'] == 'search_text') {
   $type = '"text"';
   //$table = "";
   $i = 0;
   $show_data = $db->customs_broker->find(['companyID' => $_SESSION['companyId']]);

   foreach ($show_data as $drive) {
      $d = $drive['custom_b'];
      foreach ($d as $row1) {
         $id = $row1['_id'];    
         $brokerName = $row1['brokerName'];
         $crossing = $row1['crossing'];
         $telephone = $row1['telephone'];
         $ext = $row1['ext'];
         $tollfree = $row1['tollfree'];
         $fax = $row1['fax'];
         $Status = $row1['Status'];
         $column1 = '"brokerName"';
         $column2 = '"crossing"';
         $column3 = '"telephone"';
         $column4 = '"ext"';
         $column5 = '"tollfree"';
         $column6 = '"fax"';
         $column7 = '"Status"';

         $updateCustom = '"updateCustom"';
         $i++;

         $c_type1 = '"'.$brokerName.'"';
         $c_type2 = '"'.$crossing.'"';
         $c_type3 = '"'.$telephone.'"';
         $c_type4 = '"'.$ext.'"';
         $c_type5 = '"'.$tollfree.'"';
         $c_type6 = '"'.$fax.'"';
         $c_type7 = '"'.$Status.'"';

         $title1 = '"Broker Name"';
         $title2 = '"Crossing"';
         $title3 = '"telephone"';
         $title4 = '"ext"';
         $title5 = '"tollfree"';
         $title6 = '"fax"';
         $title7 = '"Status"';

         $pencilid1 = '"brokerNamePencil'.$i.'"';
         $pencilid2 = '"crossingPencil'.$i.'"';
         $pencilid3 = '"telephonePencil'.$i.'"';
         $pencilid4 = '"extPencil'.$i.'"';
         $pencilid5 = '"tollfreePencil'.$i.'"';
         $pencilid6 = '"faxPencil'.$i.'"';
         $pencilid7 = '"StatusPencil'.$i.'"';
         
         if ($_POST['getoption'] == $row1['brokerName'] || $_POST['getoption'] == $row1['crossing'] || $_POST['getoption'] == $row1['telephone'] || $_POST['getoption'] == $row1['ext'] || $_POST['getoption'] == $row1['tollfree'] || $_POST['getoption'] == $row1['fax'] || $_POST['getoption'] == $row1['Status']) {
            
            echo "<tr>
                     <th> $i</th>
                     <th class='custom-text' id='brokerName$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='brokerNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                           onclick='updateTableColumn($c_type1,$updateCustom,$type,$id,$column1,$title1,$pencilid1)'
                        ></i>
                        $brokerName
                     </th>
                     <td class='custom-text' id='crossing$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='crossingPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                           onclick='updateTableColumn($c_type2,$updateCustom,$type,$id,$column2,$title2,$pencilid2)'
                        ></i>
                        $crossing
                     </td>
                     <td class='custom-text' id='telephone$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='telephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                           onclick='updateTableColumn($c_type3,$updateCustom,$type,$id,$column3,$title3,$pencilid3)'
                        ></i>
                        $telephone
                     </td>
                     <td class='custom-text' id='ext$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='extPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                           onclick='updateTableColumn($c_type4,$updateCustom,$type,$id,$column4,$title4,$pencilid4)'
                        ></i>
                        $ext
                     </td>
                     <td class='custom-text' id='tollfree$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='tollfreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                           onclick='updateTableColumn($c_type5,$updateCustom,$type,$id,$column5,$title5,$pencilid5)'
                        ></i>
                        $tollfree
                     </td>
                     <td class='custom-text' id='fax$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='faxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                           onclick='updateTableColumn($c_type6,$updateCustom,$type,$id,$column6,$title6,$pencilid6)'
                        ></i>
                        $fax
                     </td>
                     <td class='custom-text' id='Status$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='StatusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                           onclick='updateTableColumn($c_type7,$updateCustom,$type,$id,$column7,$title7,$pencilid7)'
                        ></i>
                        $Status
                     </td>
                     <td><a href='#' onclick='deleteCustom($id)'><i
                                    class='mdi mdi-delete-sweep-outline'
                                    style='font-size: 20px; color: #FC3B3B'></a></i>
                     </td>
                  </tr>";

               // echo $table;  
            }
      }

      if ($_POST['getoption'] == "") {
         $i = 0;
         $collection = $db->customs_broker;
         $type='"text"';
         $show1 = $db->customs_broker->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('custom_b' => array('$slice' => [0, 100]))));
         
         foreach ($show1 as $row) {
            // $custom_1 = array();
            // $k = 0;
            // $custom_1[$k] = $row['custom_b'];
            $custom_1 = $row['custom_b'];
            //$k++;
            foreach ($custom_1 as $row1) {
               $id = $row1['_id'];    
               $brokerName = $row1['brokerName'];
               $crossing = $row1['crossing'];
               $telephone = $row1['telephone'];
               $ext = $row1['ext'];
               $tollfree = $row1['tollfree'];
               $fax = $row1['fax'];
               $Status = $row1['Status'];
               $column1 = '"brokerName"';
               $column2 = '"crossing"';
               $column3 = '"telephone"';
               $column4 = '"ext"';
               $column5 = '"tollfree"';
               $column6 = '"fax"';
               $column7 = '"Status"';
               
               $updateCustom = '"updateCustom"';
               $i++;

               $c_type1 = '"'.$brokerName.'"';
               $c_type2 = '"'.$crossing.'"';
               $c_type3 = '"'.$telephone.'"';
               $c_type4 = '"'.$ext.'"';
               $c_type5 = '"'.$tollfree.'"';
               $c_type6 = '"'.$fax.'"';
               $c_type7 = '"'.$Status.'"';

               $title1 = '"Broker Name"';
               $title2 = '"Crossing"';
               $title3 = '"telephone"';
               $title4 = '"ext"';
               $title5 = '"tollfree"';
               $title6 = '"fax"';
               $title7 = '"Status"';

               $pencilid1 = '"brokerNamePencil'.$i.'"';
               $pencilid2 = '"crossingPencil'.$i.'"';
               $pencilid3 = '"telephonePencil'.$i.'"';
               $pencilid4 = '"extPencil'.$i.'"';
               $pencilid5 = '"tollfreePencil'.$i.'"';
               $pencilid6 = '"faxPencil'.$i.'"';
               $pencilid7 = '"StatusPencil'.$i.'"';

               echo "<tr>
                        <th> $i</th>
                        <th class='custom-text' id='brokerName$i'
                           onmouseover='showPencil_s($pencilid1)'
                           onmouseout='hidePencil_s($pencilid1)'
                           >
                           <i id='brokerNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                              onclick='updateTableColumn($c_type1,$updateCustom,$type,$id,$column1,$title1,$pencilid1)'
                           ></i>
                           $brokerName
                        </th>
                        <td class='custom-text' id='crossing$i'
                           onmouseover='showPencil_s($pencilid2)'
                           onmouseout='hidePencil_s($pencilid2)'
                           >
                           <i id='crossingPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                              onclick='updateTableColumn($c_type2,$updateCustom,$type,$id,$column2,$title2,$pencilid2)'
                           ></i>
                           $crossing
                        </td>
                        <td class='custom-text' id='telephone$i'
                           onmouseover='showPencil_s($pencilid3)'
                           onmouseout='hidePencil_s($pencilid3)'
                           >
                           <i id='telephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                              onclick='updateTableColumn($c_type3,$updateCustom,$type,$id,$column3,$title3,$pencilid3)'
                           ></i>
                           $telephone
                        </td>
                        <td class='custom-text' id='ext$i'
                           onmouseover='showPencil_s($pencilid4)'
                           onmouseout='hidePencil_s($pencilid4)'
                           >
                           <i id='extPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                              onclick='updateTableColumn($c_type4,$updateCustom,$type,$id,$column4,$title4,$pencilid4)'
                           ></i>
                           $ext
                        </td>
                        <td class='custom-text' id='tollfree$i'
                           onmouseover='showPencil_s($pencilid5)'
                           onmouseout='hidePencil_s($pencilid5)'
                           >
                           <i id='tollfreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                              onclick='updateTableColumn($c_type5,$updateCustom,$type,$id,$column5,$title5,$pencilid5)'
                           ></i>
                           $tollfree
                        </td>
                        <td class='custom-text' id='fax$i'
                           onmouseover='showPencil_s($pencilid6)'
                           onmouseout='hidePencil_s($pencilid6)'
                           >
                           <i id='faxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                              onclick='updateTableColumn($c_type6,$updateCustom,$type,$id,$column6,$title6,$pencilid6)'
                           ></i>
                           $fax
                        </td>
                        <td class='custom-text' id='Status$i'
                           onmouseover='showPencil_s($pencilid7)'
                           onmouseout='hidePencil_s($pencilid7)'
                           >
                           <i id='StatusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                              onclick='updateTableColumn($c_type7,$updateCustom,$type,$id,$column7,$title7,$pencilid7)'
                           ></i>
                           $Status
                        </td>
                        <td><a href='#' onclick='deleteCustom($id)'><i
                                       class='mdi mdi-delete-sweep-outline'
                                       style='font-size: 20px; color: #FC3B3B'></a></i>
                        </td>
                     </tr>";
            }
         }
      }
   }   
}