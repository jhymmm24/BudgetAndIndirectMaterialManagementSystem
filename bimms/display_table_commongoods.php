<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

      <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css">
    <!-- Include Buttons CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.2/css/buttons.dataTables.min.css">



    <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<!-- Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<!-- Buttons JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<!-- JSZip (required for Excel export) -->
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<!-- HTML5 Export buttons JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

      

<?php 




include 'Connection/connection.php';




// Retrieve selected common training from AJAX request
$selectedOption = $_POST['option'];
$usercategory = $_POST['usercategory'];
$POSTFILENAME = $_POST['filename'];


// Perform database query based on the selected option
if ($selectedOption === 'ALL') {


    

    if($usercategory === 'admin'){


        ?>

<button type="button"  class="button-cus2" role="button" style="position: relative; width: 150px;"    ><i class="fa-solid fa-file-export" style="color:black; margin-right:10px;"aria-hidden="true"></i>
              EXPORT
  </button>

        <h1>User Category : <?php echo $usercategory;?></h1>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">PE UOM</th>
                 <th style="text-align: center;">PE UNIT COST ($)</th>
                 <th style="text-align: center; width:250px;">Conversion</th>
                 <th style="text-align: center; width:250px;">Inventory Out</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT * FROM tbl_common_goods_data ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                 $classification  = $row['classification'];
                 $pe_uom = $row['pe_uom'];
                 $pe_unit_cost = $row['pe_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['inventory_out'];
                 $filename = $row['filename'];
                
             ?>
            <tr>
      
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['pe_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['pe_unit_cost'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['conversion'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['inventory_out'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
    
           </tr>
      
             <?php

             
             }
             ?>
         </tbody>
     </table>


     <?php



    }else if($usercategory === 'user'){

        ?>

<button type="button"  class="button-cus2" role="button" style="position: relative; width: 150px;"    ><i class="fa-solid fa-file-export" style="color:black; margin-right:10px;"aria-hidden="true"></i>
              EXPORT
  </button>

        <h1>User Category : <?php echo $usercategory;?></h1>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT * FROM tbl_common_goods_data ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                 $classification  = $row['classification'];
                 $pe_uom = $row['pe_uom'];
                 $pe_unit_cost = $row['pe_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['inventory_out'];
                 $filename = $row['filename'];
                
             ?>
            <tr>
      
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
     
     
           </tr>
      
             <?php
     
             
             }
             ?>
         </tbody>
     </table>


     <?php
    
    }else{

    }
    


    

} elseif ($selectedOption === 'GA') {





    if($usercategory === 'admin'){


        ?>
        <button type="button"  class="button-cus2" role="button" style="position: relative; width: 150px;"    ><i class="fa-solid fa-file-export" style="color:black; margin-right:10px;"aria-hidden="true"></i>
              EXPORT
  </button>

        <h1>User Category : <?php echo $usercategory;?></h1>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">PE UOM</th>
                 <th style="text-align: center;">PE UNIT COST ($)</th>
                 <th style="text-align: center; width:250px;">Conversion</th>
                 <th style="text-align: center; width:250px;">Inventory Out</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT * FROM tbl_common_goods_data WHERE category ='GA' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                 $classification  = $row['classification'];
                 $pe_uom = $row['pe_uom'];
                 $pe_unit_cost = $row['pe_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['inventory_out'];
                 $filename = $row['filename'];
                
             ?>
            <tr>
      
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['pe_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['pe_unit_cost'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['conversion'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['inventory_out'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
    
           </tr>
      
             <?php

             
             }
             ?>
         </tbody>
     </table>


     <?php



    }else if($usercategory === 'user'){

        ?>
        <button type="button"  class="button-cus2" role="button" style="position: relative; width: 150px;"    ><i class="fa-solid fa-file-export" style="color:black; margin-right:10px;"aria-hidden="true"></i>
              EXPORT
  </button>

        <h1>User Category : <?php echo $usercategory;?></h1>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT *
                        FROM tbl_common_goods_data
                        WHERE category = 'GA'
                        ORDER BY TRIM(item_name) ASC;
                        ";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                 $classification  = $row['classification'];
                 $pe_uom = $row['pe_uom'];
                 $pe_unit_cost = $row['pe_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['inventory_out'];
                 $filename = $row['filename'];
                
             ?>
            <tr>
      
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
     
     
           </tr>
      
             <?php
     
             
             }
             ?>
         </tbody>
     </table>


     <?php
    
    }else{

    }
    












  
} elseif ($selectedOption === 'IT') {



    



    if($usercategory === 'admin'){


        ?>
        <button type="button"  class="button-cus2" role="button" style="position: relative; width: 150px;"    ><i class="fa-solid fa-file-export" style="color:black; margin-right:10px;"aria-hidden="true"></i>
              EXPORT
  </button>

        <h1>User Category : <?php echo $usercategory;?></h1>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">PE UOM</th>
                 <th style="text-align: center;">PE UNIT COST ($)</th>
                 <th style="text-align: center; width:250px;">Conversion</th>
                 <th style="text-align: center; width:250px;">Inventory Out</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT * FROM tbl_common_goods_data WHERE category ='IT'  ORDER BY TRIM(item_name) ASC ";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                 $classification  = $row['classification'];
                 $pe_uom = $row['pe_uom'];
                 $pe_unit_cost = $row['pe_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['inventory_out'];
                 $filename = $row['filename'];
                
             ?>
            <tr>
      
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['pe_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['pe_unit_cost'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['conversion'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['inventory_out'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
    
           </tr>
      
             <?php

             
             }
             ?>
         </tbody>
     </table>


     <?php



    }else if($usercategory === 'user'){

        ?>
        <button type="button"  class="button-cus2" role="button" style="position: relative; width: 150px;"    ><i class="fa-solid fa-file-export" style="color:black; margin-right:10px;"aria-hidden="true"></i>
              EXPORT
  </button>

        <h1>User Category : <?php echo $usercategory;?></h1>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT * FROM tbl_common_goods_data WHERE category ='IT'  ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                 $classification  = $row['classification'];
                 $pe_uom = $row['pe_uom'];
                 $pe_unit_cost = $row['pe_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['inventory_out'];
                 $filename = $row['filename'];
                
             ?>
            <tr>
      
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
     
     
           </tr>
      
             <?php
     
             
             }
             ?>
         </tbody>
     </table>


     <?php
    
    }else{

    }






    

  
} elseif ($selectedOption === 'PIM') {



    



    if($usercategory === 'admin'){


        ?>
        <button type="button"  class="button-cus2" role="button" style="position: relative; width: 150px;"    ><i class="fa-solid fa-file-export" style="color:black; margin-right:10px;"aria-hidden="true"></i>
              EXPORT
  </button>

        <h1>User Category : <?php echo $usercategory;?></h1>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">PE UOM</th>
                 <th style="text-align: center;">PE UNIT COST ($)</th>
                 <th style="text-align: center; width:250px;">Conversion</th>
                 <th style="text-align: center; width:250px;">Inventory Out</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT * FROM tbl_common_goods_data WHERE category ='PIM'  ORDER BY TRIM(item_name) ASC ";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                 $classification  = $row['classification'];
                 $pe_uom = $row['pe_uom'];
                 $pe_unit_cost = $row['pe_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['inventory_out'];
                 $filename = $row['filename'];
                
             ?>
            <tr>
      
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['pe_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['pe_unit_cost'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['conversion'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['inventory_out'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
    
           </tr>
      
             <?php

             
             }
             ?>
         </tbody>
     </table>


     <?php



    }else if($usercategory === 'user'){

        ?>
<button type="button"  class="button-cus2" role="button" style="position: relative; width: 150px;"    ><i class="fa-solid fa-file-export" style="color:black; margin-right:10px;"aria-hidden="true"></i>
              EXPORT
  </button>
        <h1>User Category : <?php echo $usercategory;?></h1>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT * FROM tbl_common_goods_data WHERE category ='PIM'  ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                 $classification  = $row['classification'];
                 $pe_uom = $row['pe_uom'];
                 $pe_unit_cost = $row['pe_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['inventory_out'];
                 $filename = $row['filename'];
                
             ?>
            <tr>
      
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
     
     
           </tr>
      
             <?php
     
             
             }
             ?>
         </tbody>
     </table>


     <?php
    
    }else{

    }
    

    


  
} elseif ($selectedOption === 'MIM') {



    



    if($usercategory === 'admin'){


        ?>
        <button type="button"  class="button-cus2" role="button" style="position: relative; width: 150px;"    ><i class="fa-solid fa-file-export" style="color:black; margin-right:10px;"aria-hidden="true"></i>
              EXPORT
  </button>

        <h1>User Category : <?php echo $usercategory;?></h1>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">PE UOM</th>
                 <th style="text-align: center;">PE UNIT COST ($)</th>
                 <th style="text-align: center; width:250px;">Conversion</th>
                 <th style="text-align: center; width:250px;">Inventory Out</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT * FROM tbl_common_goods_data WHERE category ='MIM'   ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                 $classification  = $row['classification'];
                 $pe_uom = $row['pe_uom'];
                 $pe_unit_cost = $row['pe_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['inventory_out'];
                 $filename = $row['filename'];
                
             ?>
            <tr>
      
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['pe_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['pe_unit_cost'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['conversion'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['inventory_out'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
    
           </tr>
      
             <?php

             
             }
             ?>
         </tbody>
     </table>


     <?php



    }else if($usercategory === 'user'){

        ?>
        <button type="button"  class="button-cus2" role="button" style="position: relative; width: 150px;"    ><i class="fa-solid fa-file-export" style="color:black; margin-right:10px;"aria-hidden="true"></i>
              EXPORT
  </button>

        <h1>User Category : <?php echo $usercategory;?></h1>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT * FROM tbl_common_goods_data WHERE category ='MIM'  ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                 $classification  = $row['classification'];
                 $pe_uom = $row['pe_uom'];
                 $pe_unit_cost = $row['pe_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['inventory_out'];
                 $filename = $row['filename'];
                
             ?>
            <tr>
      
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
     
     
           </tr>
      
             <?php
     
             
             }
             ?>
         </tbody>
     </table>


     <?php
    
    }else{

    }
    



  
} elseif ($selectedOption === 'PNJ') {



    



    if($usercategory === 'admin'){


        ?>
        <button type="button"  class="button-cus2" role="button" style="position: relative; width: 150px;"    ><i class="fa-solid fa-file-export" style="color:black; margin-right:10px;"aria-hidden="true"></i>
              EXPORT
  </button>

        <h1>User Category : <?php echo $usercategory;?></h1>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">PE UOM</th>
                 <th style="text-align: center;">PE UNIT COST ($)</th>
                 <th style="text-align: center; width:250px;">Conversion</th>
                 <th style="text-align: center; width:250px;">Inventory Out</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT * FROM tbl_common_goods_data WHERE category ='PNJ'  ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                 $classification  = $row['classification'];
                 $pe_uom = $row['pe_uom'];
                 $pe_unit_cost = $row['pe_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['inventory_out'];
                 $filename = $row['filename'];
                
             ?>
            <tr>
      
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['pe_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['pe_unit_cost'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['conversion'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['inventory_out'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
    
           </tr>
      
             <?php

             
             }
             ?>
         </tbody>
     </table>


     <?php



    }else if($usercategory === 'user'){

        ?>
        <button type="button"  class="button-cus2" role="button" style="position: relative; width: 150px;"    ><i class="fa-solid fa-file-export" style="color:black; margin-right:10px;"aria-hidden="true"></i>
              EXPORT
  </button>

        <h1>User Category : <?php echo $usercategory;?></h1>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT * FROM tbl_common_goods_data WHERE category ='PNJ' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                 $classification  = $row['classification'];
                 $pe_uom = $row['pe_uom'];
                 $pe_unit_cost = $row['pe_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['inventory_out'];
                 $filename = $row['filename'];
                
             ?>
            <tr>
      
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
     
     
           </tr>
      
             <?php
     
             
             }
             ?>
         </tbody>
     </table>


     <?php
    
    }else{

    }
    




  
} else {
    // Handle invalid selection
    echo "Please select a valid option.";
    exit;
}


?>


<!-- 
<script>
       new DataTable('#example23', {
            initComplete: function () {
                this.api()
                    .columns([])
                    .every(function () {
                        let column = this;
        
                        // Create select element
                        let select = document.createElement('select');
                        select.add(new Option(''));
                        column.header().replaceChildren(select);
        
                        // Apply listener for user change in value
                        select.addEventListener('change', function () {
                            var val = DataTable.util.escapeRegex(select.value);
        
                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });
        
                        // Add list of options
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.add(new Option(d));
                            });
                    });
            },
            columnDefs: [
        { orderable: false, targets: [] }
        ]
        });


  </script> -->


<script>
 $(document).ready(function() {
    var filename = '<?php echo $POSTFILENAME ?? ''; ?>'; // Ensure fallback for undefined variable
    var category = '<?php echo $selectedOption ?? ''; ?>';

    var table = $('#example23').DataTable({
        initComplete: function () {
            this.api().columns([]).every(function () {
                let column = this;
                let select = document.createElement('select');
                select.add(new Option(''));
                column.header().replaceChildren(select);

                select.addEventListener('change', function () {
                    var val = DataTable.util.escapeRegex(select.value);
                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                });

                column.data().unique().sort().each(function (d, j) {
                    select.add(new Option(d));
                });
            });
        },
        lengthMenu: [ [10, 20, 50, 100], [10, 20, 50, 100] ], // Options for number of rows per page
        pageLength: 10, // Default page length
        paging: true, // Enable pagination
        columnDefs: [
            { orderable: false, targets: [] }
        ],
        dom: 'Blfrtip', // Include the Buttons extension
        buttons: [
            {
                extend: 'excelHtml5',
                title: filename + '-' + category,
                className: 'd-none',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
    });

    $('.button-cus2').on('click', function () {
        table.button('.buttons-excel').trigger();
    });
});


</script>







  <script>
function toggleAll(source) {
  var checkboxes = document.querySelectorAll('.single-checkbox');
  checkboxes.forEach(function(checkbox) {
    checkbox.checked = source.checked;
    // Update icon color if needed
    if (source.checked) {
      $(checkbox).prev('.checkbox-icon').css('color', '#57FF22'); //green
      // Increase the value of the badge when checkbox is checked
      updateBadgeValue(1);
    } else {
      $(checkbox).prev('.checkbox-icon').css('color', '');
      // Decrease the value of the badge when checkbox is unchecked
      updateBadgeValue(-1);
    }
  });
}

// Function to update the badge value dynamically
function updateBadgeValue(change) {
  var badge = $('#badgeValue');
  var currentValue = parseInt(badge.text());
  var newValue = currentValue + change;
  badge.text(newValue);
}
</script>



<script>
    function setModalContent(fileName) {
        document.getElementById('modalTitle').innerText = 'History Details ' + fileName;
    }
</script>



<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include DataTables and Buttons JS -->
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.2/js/buttons.html5.min.js"></script>





