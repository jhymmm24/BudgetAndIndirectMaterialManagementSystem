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


<style>
    /* Optional: Highlight style */
    tbody tr.highlighted {
        background-color: #ffcccc; /* Light red background */
    }
</style>
      

<?php 




include 'Connection/connection.php';




// Retrieve selected common training from AJAX request
$selectedOption = $_POST['option'];
$usercategory = $_POST['usercategory'];
$usersection = $_POST['usersection'];

?>



<?php

// Perform database query based on the selected option
if ($selectedOption === 'ALL') {


    

    if($usercategory === 'admin'){


        ?>



  
<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




        <h5>User Category : <?php echo $usercategory;?></h5>
        <h5>User section : <?php echo $usersection; ?></h5>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
                <th style="text-align: center;">SELECT</th>
                 <th style="text-align: center;">OS CODE</th>
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">GA UOM</th>
                 <th style="text-align: center;">GA UNIT COST ($)</th>
                 <th style="text-align: center; width:250px;">Conversion</th>
                 <th style="text-align: center; width:250px;">Inventory Out</th>
                 <th style="text-align: center; width:150px;">FI UOM</th>
                 <th style="text-align: center;">FI UNIT COST ($)</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
             $selectcommon = "SELECT * FROM tbl_mim ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                 $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                 $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                 $imcode = $row['im_code'];
                 $itemname = $row['item_name'];
                 $specification = $row['specification'];
                 $fi_uom = $row['fi_uom'];
                 $fi_unit_cost = $row['fi_unit_cost'];
                
                 $pe_uom = $row['ga_uom'];
                 $pe_unit_cost = $row['ga_unit_cost'];
                 $conversion = $row['conversion'];
                 $inventory_out = $row['out_of_inventory'];
                 $suppliername = $row['supplier_name'];
                 $storagelocation = $row['storage_location'];
                
             ?>
            <tr>
        <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $imcode; ?>" onclick="highlightRow(this)">
         </td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['os_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['ga_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['ga_unit_cost'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['conversion'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['out_of_inventory'] ?></td>
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



<div style="text-align: right;"> 
<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




<button type="button"  name="btnsave" id="btnsave" onclick="return confirm_save()"  class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fas fa-save" style="color:black; margin-right:10px;"aria-hidden="true"></i>
           SAVE
</button>

</div>


        <h5>User Category : <?php echo $usercategory;?></h5>
        <h5>User section : <?php echo $usersection; ?></h5>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
             <th style="text-align: center;">SELECT</th>
              
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">UOM</th>
                 <th style="text-align: center;">UNIT COST ($)</th>

                 <th style="text-align: center; width:250px;">[G1] Quantity</th>
                 <th style="text-align: center; width:250px;">[G1] No. of Days</th>
                 <th style="text-align: center; width:150px;">[G1] No. of Shifts</th>
                 <th style="text-align: center; width:150px;">[G1] Total</th>
                 <th style="text-align: center; width:150px;">[G1] Total Cost</th>
                 <th style="text-align: center; width:150px;">[G1] Demand List</th>

                 <!-- <th style="text-align: center; width:250px;">[G2] Quantity</th>
                 <th style="text-align: center; width:250px;">[G2] No. of Days</th>
                 <th style="text-align: center; width:150px;">[G2] No. of Shifts</th>
                 <th style="text-align: center; width:150px;">[G2] Total<th>
                 <th style="text-align: center; width:150px;">[G2] Total Cost<th>
                 <th style="text-align: center; width:150px;">[G2] Demand List<th> -->
                
                 
             </tr>
         </thead>
         <tbody>
         <?php
               $selectcommon = "SELECT * FROM tbl_mim ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                $imcode = $row['im_code'];
                $itemname = $row['item_name'];
                $specification = $row['specification'];
                $fi_uom = $row['fi_uom'];
                $fi_unit_cost = $row['fi_unit_cost'];
               
                $pe_uom = $row['ga_uom'];
                $pe_unit_cost = $row['ga_unit_cost'];
                $conversion = $row['conversion'];
                $inventory_out = $row['out_of_inventory'];
                $suppliername = $row['supplier_name'];
                $storagelocation = $row['storage_location'];
                $cost_center = $row['cost_center'];

                $quantity1 = isset($row['quantity1']) ? $row['quantity1'] : '';
                $total_cost1 = isset($row['total_cost1']) ? $row['total_cost1'] : '';
                $demand_list1 = isset($row['demand_list1']) ? $row['demand_list1'] : '';

                $quantity2 = isset($row['quantity2']) ? $row['quantity2'] : '';
                $total_cost2 = isset($row['total_cost2']) ? $row['total_cost2'] : '';
                $demand_list2 = isset($row['demand_list2']) ? $row['demand_list2'] : '';
                
                

                $account_code1 = $row['account_code1'];
                $account_code2 = $row['account_code2'];
                
             ?>
            <tr>
                
         <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $imcode; ?>" onclick="highlightRow(this)">
         </td>
            
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_quantity" id="g1_quantity" placeholder="G1 Quantity" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_days" id="g1_days" placeholder="G1 No of Days" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_shift" id="g1_shift" placeholder="G1 No of Shifts" class="user-input">
         </td>

         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_total" id="g1_total" placeholder="G1 Total" class="user-input">
         </td>


         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_totalcost" id="g1_totalcost" placeholder="G1 Total Cost" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_demand" id="g1_demand" placeholder="G1 Demand" class="user-input">
         </td>





       
    
        
         

    
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
    

  <div style="text-align: right;"> 
<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




<button type="button"  name="btnsave" id="btnsave" onclick="return confirm_save()"  class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fas fa-save" style="color:black; margin-right:10px;"aria-hidden="true"></i>
           SAVE
</button>

</div>




        <h5>User Category : <?php echo $usercategory;?></h5>
        <h5>User section : <?php echo $usersection; ?></h5>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
             <th style="text-align: center;">SELECT</th>
              
              <th style="text-align: center; width:150px">IM Code</th>
              <th style="text-align: center; width:650px;">Item Name</th>
              <th style="text-align: center; width:250px;">Specification</th>
              <th style="text-align: center; width:150px;">UOM</th>
              <th style="text-align: center;">UNIT COST ($)</th>

              <th style="text-align: center; width:250px;">[G1] Quantity</th>
              <th style="text-align: center; width:250px;">[G1] No. of Days</th>
              <th style="text-align: center; width:150px;">[G1] No. of Shifts</th>
              <th style="text-align: center; width:150px;">[G1] Total</th>
              <th style="text-align: center; width:150px;">[G1] Total Cost</th>
              <th style="text-align: center; width:150px;">[G1] Demand List</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
               $selectcommon = "SELECT * FROM tbl_forecast WHERE storage_location ='GA' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                $imcode = $row['im_code'];
                $itemname = $row['item_name'];
                $specification = $row['specification'];
                $fi_uom = $row['fi_uom'];
                $fi_unit_cost = $row['fi_unit_cost'];
               
                $pe_uom = $row['ga_uom'];
                $pe_unit_cost = $row['ga_unit_cost'];
                $conversion = $row['conversion'];
                $inventory_out = $row['out_of_inventory'];
                $suppliername = $row['supplier_name'];
                $storagelocation = $row['storage_location'];
                $cost_center = $row['cost_center'];

                $quantity1 = isset($row['quantity1']) ? $row['quantity1'] : '';
                $total_cost1 = isset($row['total_cost1']) ? $row['total_cost1'] : '';
                $demand_list1 = isset($row['demand_list1']) ? $row['demand_list1'] : '';

                $quantity2 = isset($row['quantity2']) ? $row['quantity2'] : '';
                $total_cost2 = isset($row['total_cost2']) ? $row['total_cost2'] : '';
                $demand_list2 = isset($row['demand_list2']) ? $row['demand_list2'] : '';
                
                

                $account_code1 = $row['account_code1'];
                $account_code2 = $row['account_code2'];
                
             ?>
            <tr>
                
         <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $imcode; ?>" onclick="highlightRow(this)">
         </td>
            
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_quantity" id="g1_quantity" placeholder="G1 Quantity" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_days" id="g1_days" placeholder="G1 No of Days" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_shift" id="g1_shift" placeholder="G1 No of Shifts" class="user-input">
         </td>

         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_total" id="g1_total" placeholder="G1 Total" class="user-input">
         </td>


         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_totalcost" id="g1_totalcost" placeholder="G1 Total Cost" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_demand" id="g1_demand" placeholder="G1 Demand" class="user-input">
         </td>





       
    
        
         

    
           </tr>
      
             <?php
     
             
             }
             ?>
         </tbody>
     </table>
 

     <?php



    }else if($usercategory === 'user'){

        ?>


  <div style="text-align: right;"> 
<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




<button type="button"  name="btnsave" id="btnsave" onclick="return confirm_save()"  class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fas fa-save" style="color:black; margin-right:10px;"aria-hidden="true"></i>
           SAVE
</button>

</div>

  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
<table id="example23" class="display bordered-table" style="width:100%; overflow-x: auto; white-space: nowrap; display: block;">
    <thead>
        <tr>
        <th style="text-align: center;">SELECT</th>
              
              <th style="text-align: center; width:150px">IM Code</th>
              <th style="text-align: center; width:650px;">Item Name</th>
              <th style="text-align: center; width:250px;">Specification</th>
              <th style="text-align: center; width:150px;">UOM</th>
              <th style="text-align: center;">UNIT COST ($)</th>

              <th style="text-align: center; width:250px;">[G1] Quantity</th>
              <th style="text-align: center; width:250px;">[G1] No. of Days</th>
              <th style="text-align: center; width:150px;">[G1] No. of Shifts</th>
              <th style="text-align: center; width:150px;">[G1] Total</th>
              <th style="text-align: center; width:150px;">[G1] Total Cost</th>
              <th style="text-align: center; width:150px;">[G1] Demand List</th>
        </tr>
    </thead>
    <tbody>
         <?php
               $selectcommon = "SELECT * FROM tbl_forecast  WHERE storage_location ='GA' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                $imcode = $row['im_code'];
                $itemname = $row['item_name'];
                $specification = $row['specification'];
                $fi_uom = $row['fi_uom'];
                $fi_unit_cost = $row['fi_unit_cost'];
               
                $pe_uom = $row['ga_uom'];
                $pe_unit_cost = $row['ga_unit_cost'];
                $conversion = $row['conversion'];
                $inventory_out = $row['out_of_inventory'];
                $suppliername = $row['supplier_name'];
                $storagelocation = $row['storage_location'];
                $cost_center = $row['cost_center'];

                $quantity1 = isset($row['quantity1']) ? $row['quantity1'] : '';
                $total_cost1 = isset($row['total_cost1']) ? $row['total_cost1'] : '';
                $demand_list1 = isset($row['demand_list1']) ? $row['demand_list1'] : '';

                $quantity2 = isset($row['quantity2']) ? $row['quantity2'] : '';
                $total_cost2 = isset($row['total_cost2']) ? $row['total_cost2'] : '';
                $demand_list2 = isset($row['demand_list2']) ? $row['demand_list2'] : '';
                
                

                $account_code1 = $row['account_code1'];
                $account_code2 = $row['account_code2'];
                
             ?>
            <tr>
                
         <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $imcode; ?>" onclick="highlightRow(this)">
         </td>
            
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_quantity" id="g1_quantity" placeholder="G1 Quantity" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_days" id="g1_days" placeholder="G1 No of Days" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_shift" id="g1_shift" placeholder="G1 No of Shifts" class="user-input">
         </td>

         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_total" id="g1_total" placeholder="G1 Total" class="user-input">
         </td>


         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_totalcost" id="g1_totalcost" placeholder="G1 Total Cost" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_demand" id="g1_demand" placeholder="G1 Demand" class="user-input">
         </td>





       
    
        
         

    
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
   
  <div style="text-align: right;"> 
<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




<button type="button"  name="btnsave" id="btnsave" onclick="return confirm_save()"  class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fas fa-save" style="color:black; margin-right:10px;"aria-hidden="true"></i>
           SAVE
</button>

</div>


  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
             <th style="text-align: center;">SELECT</th>
              
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">UOM</th>
                 <th style="text-align: center;">UNIT COST ($)</th>

                 <th style="text-align: center; width:250px;">[G1] Quantity</th>
                 <th style="text-align: center; width:250px;">[G1] No. of Days</th>
                 <th style="text-align: center; width:150px;">[G1] No. of Shifts</th>
                 <th style="text-align: center; width:150px;">[G1] Total</th>
                 <th style="text-align: center; width:150px;">[G1] Total Cost</th>
                 <th style="text-align: center; width:150px;">[G1] Demand List</th>
             </tr>
         </thead>
         <tbody>
         <?php
               $selectcommon = "SELECT * FROM tbl_forecast WHERE storage_location ='IT' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                $imcode = $row['im_code'];
                $itemname = $row['item_name'];
                $specification = $row['specification'];
                $fi_uom = $row['fi_uom'];
                $fi_unit_cost = $row['fi_unit_cost'];
               
                $pe_uom = $row['ga_uom'];
                $pe_unit_cost = $row['ga_unit_cost'];
                $conversion = $row['conversion'];
                $inventory_out = $row['out_of_inventory'];
                $suppliername = $row['supplier_name'];
                $storagelocation = $row['storage_location'];
                $cost_center = $row['cost_center'];

                $quantity1 = isset($row['quantity1']) ? $row['quantity1'] : '';
                $total_cost1 = isset($row['total_cost1']) ? $row['total_cost1'] : '';
                $demand_list1 = isset($row['demand_list1']) ? $row['demand_list1'] : '';

                $quantity2 = isset($row['quantity2']) ? $row['quantity2'] : '';
                $total_cost2 = isset($row['total_cost2']) ? $row['total_cost2'] : '';
                $demand_list2 = isset($row['demand_list2']) ? $row['demand_list2'] : '';
                
                

                $account_code1 = $row['account_code1'];
                $account_code2 = $row['account_code2'];
                
             ?>
            <tr>
                
         <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $imcode; ?>" onclick="highlightRow(this)">
         </td>
            
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_quantity" id="g1_quantity" placeholder="G1 Quantity" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_days" id="g1_days" placeholder="G1 No of Days" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_shift" id="g1_shift" placeholder="G1 No of Shifts" class="user-input">
         </td>

         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_total" id="g1_total" placeholder="G1 Total" class="user-input">
         </td>


         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_totalcost" id="g1_totalcost" placeholder="G1 Total Cost" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_demand" id="g1_demand" placeholder="G1 Demand" class="user-input">
         </td>





       
    
        
         

    
           </tr>
      
             <?php
     
             
             }
             ?>
         </tbody>
     </table>


     <?php



    }else if($usercategory === 'user'){

        ?>


  <div style="text-align: right;"> 
<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




<button type="button"  name="btnsave" id="btnsave" onclick="return confirm_save()"  class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fas fa-save" style="color:black; margin-right:10px;"aria-hidden="true"></i>
           SAVE
</button>

</div>

  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
             <th style="text-align: center;">SELECT</th>
              
              <th style="text-align: center; width:150px">IM Code</th>
              <th style="text-align: center; width:650px;">Item Name</th>
              <th style="text-align: center; width:250px;">Specification</th>
              <th style="text-align: center; width:150px;">UOM</th>
              <th style="text-align: center;">UNIT COST ($)</th>

              <th style="text-align: center; width:250px;">[G1] Quantity</th>
              <th style="text-align: center; width:250px;">[G1] No. of Days</th>
              <th style="text-align: center; width:150px;">[G1] No. of Shifts</th>
              <th style="text-align: center; width:150px;">[G1] Total</th>
              <th style="text-align: center; width:150px;">[G1] Total Cost</th>
              <th style="text-align: center; width:150px;">[G1] Demand List</th>
             </tr>
         </thead>
         <tbody>
         <?php
               $selectcommon = "SELECT * FROM tbl_forecast  WHERE storage_location ='IT' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                $imcode = $row['im_code'];
                $itemname = $row['item_name'];
                $specification = $row['specification'];
                $fi_uom = $row['fi_uom'];
                $fi_unit_cost = $row['fi_unit_cost'];
               
                $pe_uom = $row['ga_uom'];
                $pe_unit_cost = $row['ga_unit_cost'];
                $conversion = $row['conversion'];
                $inventory_out = $row['out_of_inventory'];
                $suppliername = $row['supplier_name'];
                $storagelocation = $row['storage_location'];
                $cost_center = $row['cost_center'];

                $quantity1 = isset($row['quantity1']) ? $row['quantity1'] : '';
                $total_cost1 = isset($row['total_cost1']) ? $row['total_cost1'] : '';
                $demand_list1 = isset($row['demand_list1']) ? $row['demand_list1'] : '';

                $quantity2 = isset($row['quantity2']) ? $row['quantity2'] : '';
                $total_cost2 = isset($row['total_cost2']) ? $row['total_cost2'] : '';
                $demand_list2 = isset($row['demand_list2']) ? $row['demand_list2'] : '';
                
                

                $account_code1 = $row['account_code1'];
                $account_code2 = $row['account_code2'];
                
             ?>
            <tr>
                
         <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $imcode; ?>" onclick="highlightRow(this)">
         </td>
            
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_quantity" id="g1_quantity" placeholder="G1 Quantity" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_days" id="g1_days" placeholder="G1 No of Days" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_shift" id="g1_shift" placeholder="G1 No of Shifts" class="user-input">
         </td>

         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_total" id="g1_total" placeholder="G1 Total" class="user-input">
         </td>


         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_totalcost" id="g1_totalcost" placeholder="G1 Total Cost" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_demand" id="g1_demand" placeholder="G1 Demand" class="user-input">
         </td>





       
    
        
         

    
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
 

  <div style="text-align: right;"> 
<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




<button type="button"  name="btnsave" id="btnsave" onclick="return confirm_save()"  class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fas fa-save" style="color:black; margin-right:10px;"aria-hidden="true"></i>
           SAVE
</button>

</div>


  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
             <th style="text-align: center;">SELECT</th>
              
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">UOM</th>
                 <th style="text-align: center;">UNIT COST ($)</th>

                 <th style="text-align: center; width:250px;">[G1] Quantity</th>
                 <th style="text-align: center; width:250px;">[G1] No. of Days</th>
                 <th style="text-align: center; width:150px;">[G1] No. of Shifts</th>
                 <th style="text-align: center; width:150px;">[G1] Total</th>
                 <th style="text-align: center; width:150px;">[G1] Total Cost</th>
                 <th style="text-align: center; width:150px;">[G1] Demand List</th>
             </tr>
         </thead>
         <tbody>
         <?php
               $selectcommon = "SELECT * FROM tbl_forecast WHERE storage_location ='PIM' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                $imcode = $row['im_code'];
                $itemname = $row['item_name'];
                $specification = $row['specification'];
                $fi_uom = $row['fi_uom'];
                $fi_unit_cost = $row['fi_unit_cost'];
               
                $pe_uom = $row['ga_uom'];
                $pe_unit_cost = $row['ga_unit_cost'];
                $conversion = $row['conversion'];
                $inventory_out = $row['out_of_inventory'];
                $suppliername = $row['supplier_name'];
                $storagelocation = $row['storage_location'];
                $cost_center = $row['cost_center'];

                $quantity1 = isset($row['quantity1']) ? $row['quantity1'] : '';
                $total_cost1 = isset($row['total_cost1']) ? $row['total_cost1'] : '';
                $demand_list1 = isset($row['demand_list1']) ? $row['demand_list1'] : '';

                $quantity2 = isset($row['quantity2']) ? $row['quantity2'] : '';
                $total_cost2 = isset($row['total_cost2']) ? $row['total_cost2'] : '';
                $demand_list2 = isset($row['demand_list2']) ? $row['demand_list2'] : '';
                
                

                $account_code1 = $row['account_code1'];
                $account_code2 = $row['account_code2'];
                
             ?>
            <tr>
                
         <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $imcode; ?>" onclick="highlightRow(this)">
         </td>
            
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_quantity" id="g1_quantity" placeholder="G1 Quantity" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_days" id="g1_days" placeholder="G1 No of Days" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_shift" id="g1_shift" placeholder="G1 No of Shifts" class="user-input">
         </td>

         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_total" id="g1_total" placeholder="G1 Total" class="user-input">
         </td>


         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_totalcost" id="g1_totalcost" placeholder="G1 Total Cost" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_demand" id="g1_demand" placeholder="G1 Demand" class="user-input">
         </td>





       
    
        
         

    
           </tr>
      
             <?php
     
             
             }
             ?>
         </tbody>
     </table>


     <?php



    }else if($usercategory === 'user'){

        ?>



  <div style="text-align: right;"> 
<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




<button type="button"  name="btnsave" id="btnsave" onclick="return confirm_save()"  class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fas fa-save" style="color:black; margin-right:10px;"aria-hidden="true"></i>
           SAVE
</button>

</div>


  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
             <th style="text-align: center;">SELECT</th>
              
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">UOM</th>
                 <th style="text-align: center;">UNIT COST ($)</th>

                 <th style="text-align: center; width:250px;">[G1] Quantity</th>
                 <th style="text-align: center; width:250px;">[G1] No. of Days</th>
                 <th style="text-align: center; width:150px;">[G1] No. of Shifts</th>
                 <th style="text-align: center; width:150px;">[G1] Total</th>
                 <th style="text-align: center; width:150px;">[G1] Total Cost</th>
                 <th style="text-align: center; width:150px;">[G1] Demand List</th>
             </tr>
         </thead>
         <tbody>
         <?php
               $selectcommon = "SELECT * FROM tbl_forecast WHERE storage_location ='PIM' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                $imcode = $row['im_code'];
                $itemname = $row['item_name'];
                $specification = $row['specification'];
                $fi_uom = $row['fi_uom'];
                $fi_unit_cost = $row['fi_unit_cost'];
               
                $pe_uom = $row['ga_uom'];
                $pe_unit_cost = $row['ga_unit_cost'];
                $conversion = $row['conversion'];
                $inventory_out = $row['out_of_inventory'];
                $suppliername = $row['supplier_name'];
                $storagelocation = $row['storage_location'];
                $cost_center = $row['cost_center'];

                $quantity1 = isset($row['quantity1']) ? $row['quantity1'] : '';
                $total_cost1 = isset($row['total_cost1']) ? $row['total_cost1'] : '';
                $demand_list1 = isset($row['demand_list1']) ? $row['demand_list1'] : '';

                $quantity2 = isset($row['quantity2']) ? $row['quantity2'] : '';
                $total_cost2 = isset($row['total_cost2']) ? $row['total_cost2'] : '';
                $demand_list2 = isset($row['demand_list2']) ? $row['demand_list2'] : '';
                
                

                $account_code1 = $row['account_code1'];
                $account_code2 = $row['account_code2'];
                
             ?>
            <tr>
                
         <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $imcode; ?>" onclick="highlightRow(this)">
         </td>
            
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_quantity" id="g1_quantity" placeholder="G1 Quantity" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_days" id="g1_days" placeholder="G1 No of Days" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_shift" id="g1_shift" placeholder="G1 No of Shifts" class="user-input">
         </td>

         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_total" id="g1_total" placeholder="G1 Total" class="user-input">
         </td>


         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_totalcost" id="g1_totalcost" placeholder="G1 Total Cost" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_demand" id="g1_demand" placeholder="G1 Demand" class="user-input">
         </td>





       
    
        
         

    
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


  <div style="text-align: right;"> 
<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




<button type="button"  name="btnsave" id="btnsave" onclick="return confirm_save()"  class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fas fa-save" style="color:black; margin-right:10px;"aria-hidden="true"></i>
           SAVE
</button>

</div>



  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
             <th style="text-align: center;">SELECT</th>
              
              <th style="text-align: center; width:150px">IM Code</th>
              <th style="text-align: center; width:650px;">Item Name</th>
              <th style="text-align: center; width:250px;">Specification</th>
              <th style="text-align: center; width:150px;">UOM</th>
              <th style="text-align: center;">UNIT COST ($)</th>

              <th style="text-align: center; width:250px;">[G1] Quantity</th>
              <th style="text-align: center; width:250px;">[G1] No. of Days</th>
              <th style="text-align: center; width:150px;">[G1] No. of Shifts</th>
              <th style="text-align: center; width:150px;">[G1] Total</th>
              <th style="text-align: center; width:150px;">[G1] Total Cost</th>
              <th style="text-align: center; width:150px;">[G1] Demand List</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
               $selectcommon = "SELECT * FROM tbl_forecast WHERE storage_location ='MIM' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                $imcode = $row['im_code'];
                $itemname = $row['item_name'];
                $specification = $row['specification'];
                $fi_uom = $row['fi_uom'];
                $fi_unit_cost = $row['fi_unit_cost'];
               
                $pe_uom = $row['ga_uom'];
                $pe_unit_cost = $row['ga_unit_cost'];
                $conversion = $row['conversion'];
                $inventory_out = $row['out_of_inventory'];
                $suppliername = $row['supplier_name'];
                $storagelocation = $row['storage_location'];
                $cost_center = $row['cost_center'];

                $quantity1 = isset($row['quantity1']) ? $row['quantity1'] : '';
                $total_cost1 = isset($row['total_cost1']) ? $row['total_cost1'] : '';
                $demand_list1 = isset($row['demand_list1']) ? $row['demand_list1'] : '';

                $quantity2 = isset($row['quantity2']) ? $row['quantity2'] : '';
                $total_cost2 = isset($row['total_cost2']) ? $row['total_cost2'] : '';
                $demand_list2 = isset($row['demand_list2']) ? $row['demand_list2'] : '';
                
                

                $account_code1 = $row['account_code1'];
                $account_code2 = $row['account_code2'];
                
             ?>
            <tr>
                
         <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $imcode; ?>" onclick="highlightRow(this)">
         </td>
            
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_quantity" id="g1_quantity" placeholder="G1 Quantity" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_days" id="g1_days" placeholder="G1 No of Days" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_shift" id="g1_shift" placeholder="G1 No of Shifts" class="user-input">
         </td>

         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_total" id="g1_total" placeholder="G1 Total" class="user-input">
         </td>


         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_totalcost" id="g1_totalcost" placeholder="G1 Total Cost" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_demand" id="g1_demand" placeholder="G1 Demand" class="user-input">
         </td>





       
    
        
         

    
           </tr>
      
             <?php
     
             
             }
             ?>
         </tbody>
     </table>


     <?php



    }else if($usercategory === 'user'){

        ?>


  <div style="text-align: right;"> 
<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




<button type="button"  name="btnsave" id="btnsave" onclick="return confirm_save()"  class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fas fa-save" style="color:black; margin-right:10px;"aria-hidden="true"></i>
           SAVE
</button>

</div>

         <h5>User Category : <?php echo $usercategory;?></h5>
        <h5>User section : <?php echo $usersection; ?></h5>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
             <th style="text-align: center;">SELECT</th>
              
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">UOM</th>
                 <th style="text-align: center;">UNIT COST ($)</th>

                 <th style="text-align: center; width:250px;">[G1] Quantity</th>
                 <th style="text-align: center; width:250px;">[G1] No. of Days</th>
                 <th style="text-align: center; width:150px;">[G1] No. of Shifts</th>
                 <th style="text-align: center; width:150px;">[G1] Total</th>
                 <th style="text-align: center; width:150px;">[G1] Total Cost</th>
                 <th style="text-align: center; width:150px;">[G1] Demand List</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
               $selectcommon = "SELECT * FROM tbl_forecast WHERE storage_location ='MIM' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                $imcode = $row['im_code'];
                $itemname = $row['item_name'];
                $specification = $row['specification'];
                $fi_uom = $row['fi_uom'];
                $fi_unit_cost = $row['fi_unit_cost'];
               
                $pe_uom = $row['ga_uom'];
                $pe_unit_cost = $row['ga_unit_cost'];
                $conversion = $row['conversion'];
                $inventory_out = $row['out_of_inventory'];
                $suppliername = $row['supplier_name'];
                $storagelocation = $row['storage_location'];
                $cost_center = $row['cost_center'];

                $quantity1 = isset($row['quantity1']) ? $row['quantity1'] : '';
                $total_cost1 = isset($row['total_cost1']) ? $row['total_cost1'] : '';
                $demand_list1 = isset($row['demand_list1']) ? $row['demand_list1'] : '';

                $quantity2 = isset($row['quantity2']) ? $row['quantity2'] : '';
                $total_cost2 = isset($row['total_cost2']) ? $row['total_cost2'] : '';
                $demand_list2 = isset($row['demand_list2']) ? $row['demand_list2'] : '';
                
                

                $account_code1 = $row['account_code1'];
                $account_code2 = $row['account_code2'];
                
             ?>
            <tr>
                
         <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $imcode; ?>" onclick="highlightRow(this)">
         </td>
            
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_quantity" id="g1_quantity" placeholder="G1 Quantity" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_days" id="g1_days" placeholder="G1 No of Days" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_shift" id="g1_shift" placeholder="G1 No of Shifts" class="user-input">
         </td>

         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_total" id="g1_total" placeholder="G1 Total" class="user-input">
         </td>


         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_totalcost" id="g1_totalcost" placeholder="G1 Total Cost" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_demand" id="g1_demand" placeholder="G1 Demand" class="user-input">
         </td>





       
    
        
         

    
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
  

  <div style="text-align: right;"> 
<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




<button type="button"  name="btnsave" id="btnsave" onclick="return confirm_save()"  class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fas fa-save" style="color:black; margin-right:10px;"aria-hidden="true"></i>
           SAVE
</button>

</div>





  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
             <th style="text-align: center;">SELECT</th>
              
                 <th style="text-align: center; width:150px">IM Code</th>
                 <th style="text-align: center; width:650px;">Item Name</th>
                 <th style="text-align: center; width:250px;">Specification</th>
                 <th style="text-align: center; width:150px;">UOM</th>
                 <th style="text-align: center;">UNIT COST ($)</th>

                 <th style="text-align: center; width:250px;">[G1] Quantity</th>
                 <th style="text-align: center; width:250px;">[G1] No. of Days</th>
                 <th style="text-align: center; width:150px;">[G1] No. of Shifts</th>
                 <th style="text-align: center; width:150px;">[G1] Total</th>
                 <th style="text-align: center; width:150px;">[G1] Total Cost</th>
                 <th style="text-align: center; width:150px;">[G1] Demand List</th>
             
                 
             </tr>
         </thead>
         <tbody>
         <?php
               $selectcommon = "SELECT * FROM tbl_forecast WHERE storage_location ='PNJ' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                $imcode = $row['im_code'];
                $itemname = $row['item_name'];
                $specification = $row['specification'];
                $fi_uom = $row['fi_uom'];
                $fi_unit_cost = $row['fi_unit_cost'];
               
                $pe_uom = $row['ga_uom'];
                $pe_unit_cost = $row['ga_unit_cost'];
                $conversion = $row['conversion'];
                $inventory_out = $row['out_of_inventory'];
                $suppliername = $row['supplier_name'];
                $storagelocation = $row['storage_location'];
                $cost_center = $row['cost_center'];

                $quantity1 = isset($row['quantity1']) ? $row['quantity1'] : '';
                $total_cost1 = isset($row['total_cost1']) ? $row['total_cost1'] : '';
                $demand_list1 = isset($row['demand_list1']) ? $row['demand_list1'] : '';

                $quantity2 = isset($row['quantity2']) ? $row['quantity2'] : '';
                $total_cost2 = isset($row['total_cost2']) ? $row['total_cost2'] : '';
                $demand_list2 = isset($row['demand_list2']) ? $row['demand_list2'] : '';
                
                

                $account_code1 = $row['account_code1'];
                $account_code2 = $row['account_code2'];
                
             ?>
            <tr>
                
         <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $imcode; ?>" onclick="highlightRow(this)">
         </td>
            
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_quantity" id="g1_quantity" placeholder="G1 Quantity" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_days" id="g1_days" placeholder="G1 No of Days" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_shift" id="g1_shift" placeholder="G1 No of Shifts" class="user-input">
         </td>

         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_total" id="g1_total" placeholder="G1 Total" class="user-input">
         </td>


         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_totalcost" id="g1_totalcost" placeholder="G1 Total Cost" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_demand" id="g1_demand" placeholder="G1 Demand" class="user-input">
         </td>





       
    
        
         

    
           </tr>
      
             <?php
     
             
             }
             ?>
         </tbody>
     </table>


     <?php



    }else if($usercategory === 'user'){

        ?>
  


  <div style="text-align: right;"> 
<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




<button type="button"  name="btnsave" id="btnsave" onclick="return confirm_save()"  class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fas fa-save" style="color:black; margin-right:10px;"aria-hidden="true"></i>
           SAVE
</button>

</div>
  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
         <thead>
             <tr>
             <th style="text-align: center;">SELECT</th>
              
              <th style="text-align: center; width:150px">IM Code</th>
              <th style="text-align: center; width:650px;">Item Name</th>
              <th style="text-align: center; width:250px;">Specification</th>
              <th style="text-align: center; width:150px;">UOM</th>
              <th style="text-align: center;">UNIT COST ($)</th>

              <th style="text-align: center; width:250px;">[G1] Quantity</th>
              <th style="text-align: center; width:250px;">[G1] No. of Days</th>
              <th style="text-align: center; width:150px;">[G1] No. of Shifts</th>
              <th style="text-align: center; width:150px;">[G1] Total</th>
              <th style="text-align: center; width:150px;">[G1] Total Cost</th>
              <th style="text-align: center; width:150px;">[G1] Demand List</th>
                 
             </tr>
         </thead>
         <tbody>
         <?php
               $selectcommon = "SELECT * FROM tbl_forecast WHERE storage_location ='PNJ' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                          
             while ($row = pg_fetch_assoc($stmt3)) {
                $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                $oscode = $row['os_code']; // Assuming column names in PostgreSQL are in lowercase
                $imcode = $row['im_code'];
                $itemname = $row['item_name'];
                $specification = $row['specification'];
                $fi_uom = $row['fi_uom'];
                $fi_unit_cost = $row['fi_unit_cost'];
               
                $pe_uom = $row['ga_uom'];
                $pe_unit_cost = $row['ga_unit_cost'];
                $conversion = $row['conversion'];
                $inventory_out = $row['out_of_inventory'];
                $suppliername = $row['supplier_name'];
                $storagelocation = $row['storage_location'];
                $cost_center = $row['cost_center'];

                $quantity1 = isset($row['quantity1']) ? $row['quantity1'] : '';
                $total_cost1 = isset($row['total_cost1']) ? $row['total_cost1'] : '';
                $demand_list1 = isset($row['demand_list1']) ? $row['demand_list1'] : '';

                $quantity2 = isset($row['quantity2']) ? $row['quantity2'] : '';
                $total_cost2 = isset($row['total_cost2']) ? $row['total_cost2'] : '';
                $demand_list2 = isset($row['demand_list2']) ? $row['demand_list2'] : '';
                
                

                $account_code1 = $row['account_code1'];
                $account_code2 = $row['account_code2'];
                
             ?>
            <tr>
                
         <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $imcode; ?>" onclick="highlightRow(this)">
         </td>
            
         <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['im_code']; ?></td>
         <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['item_name']; ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['specification'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_uom'] ?></td>
         <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['fi_unit_cost'] ?></td>
         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_quantity" id="g1_quantity" placeholder="G1 Quantity" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_days" id="g1_days" placeholder="G1 No of Days" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_shift" id="g1_shift" placeholder="G1 No of Shifts" class="user-input">
         </td>

         
         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_total" id="g1_total" placeholder="G1 Total" class="user-input">
         </td>


         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_totalcost" id="g1_totalcost" placeholder="G1 Total Cost" class="user-input">
         </td>

         <td style="font-size: 12px; text-align: center; width:150px;">
         <input type="text" name="g1_demand" id="g1_demand" placeholder="G1 Demand" class="user-input">
         </td>





       
    
        
         

    
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
                title:  category,
                className: 'd-none',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
    });

    $('.button-cus3').on('click', function () {
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
        function showSelectedValue() {
            var selectedValue = document.getElementById('selectedComboType').value;
            document.getElementById('selectedValue').innerText = selectedValue;
        }
 </script>



<script>
        function showSelectedValueAdd() {
            var selectedValueAdd = document.getElementById('selectedComboType').value;
            document.getElementById('selectedValueAdd').innerText = selectedValueAdd;
        }
 </script>


<script>
    function highlightRow(checkbox) {
        var row = checkbox.closest('tr');
        if (checkbox.checked) {
            row.style.backgroundColor = "#ffcccc"; // Light red background color
        } else {
            row.style.backgroundColor = ""; // Revert to default background color
        }
    }
</script>



<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include DataTables and Buttons JS -->
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.2/js/buttons.html5.min.js"></script>


