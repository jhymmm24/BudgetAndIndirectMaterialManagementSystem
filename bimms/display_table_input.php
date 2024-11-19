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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    /* Optional: Highlight style */
    tbody tr.highlighted {
        background-color: #ffcccc; /* Light red background */
    }

    .checkbox-icon {
            cursor: pointer;
        }
</style>



<?php 




include 'Connection/connection.php';




// Retrieve selected common training from AJAX request
// $selectedOption = $_POST['option'];
// $usercategory = $_POST['usercategory'];
// $usersection = $_POST['usersection'];
// $fullname = $_POST['fullname'];

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


        <table id="example23" class="display bordered-table" style="width:100%; overflow-x: auto; white-space: nowrap; display: block;">
        <thead>
            <tr>
                <th style="text-align: center;">Add to Cart</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
          
            $selectcommon = "SELECT * FROM tbl_mim ORDER BY TRIM(item_name) ASC";
            $stmt3 = pg_query($conn, $selectcommon);
            $selectedItems = isset($_POST['selected']) && is_array($_POST['selected']) ? $_POST['selected'] : [];
            while ($row = pg_fetch_assoc($stmt3)) {
                $item_code = $row['item_code'];
                $item_name = $row['item_name'];
                $specification = $row['specification'];
                $uom = $row['uom'];
                $stock = $row['stock'];

                $checked = in_array($item_code, $selectedItems) ? 'checked' : '';
      
            ?>
            <tr>
                <td style="width: 15px;">
                    <i class="fa-solid fa-cart-shopping checkbox-icon" id="icon-<?php echo $item_code; ?>"></i>
                    <input type="hidden" name="selected[]" class="single-checkbox" id="selected-<?php echo $item_code; ?>" value="<?php echo $item_code; ?>" <?php echo $checked; ?>>
                </td>
                <td style="font-size: 12px; text-align: center;"><?php echo $item_code; ?></td>
                <td style="font-size: 12px; text-align: center;"><?php echo $item_name; ?></td>
                <td style="font-size: 12px; text-align: center;"><?php echo $specification; ?></td>
                <td style="font-size: 12px; text-align: center;"><?php echo $uom; ?></td>
                <td style="font-size: 12px; text-align: center;"><?php echo ($stock === null ? 0 : $stock); ?></td>
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
                <th style="text-align: center;">Add to Cart</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
            </tr>
        </thead>
         <tbody>
         <?php


             $selectcommon = "SELECT * FROM tbl_mim  ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                        
             while ($row = pg_fetch_assoc($stmt3)){
                    $id2 = $row['id'];
                    $item_code = $row['item_code'];
                    $item_name = $row['item_name'];
                    $specification = $row['specification'];
                    $uom = $row['uom'];
                    $stock = $row['stock'];
                
             ?>


            <tr>
            <td style="width: 15px;">
                <i class="fa fa-shopping-cart checkbox-icon" style="font-size: 24px;"id="icon-<?php echo $id2; ?>" onclick="toggleSelection(<?php echo $id2; ?>)"></i>
                <input type="hidden" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $transno; ?>">
            </td>
            <td style="font-size: 12px; text-align: center;"><?php echo $item_code ?> </td>
            <td style="font-size: 12px; text-align: center;"><?php echo $item_name ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $specification ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $uom ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo ($stock === null ? 0 : $stock)?></td>
    
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
    





        <h5>User Category : <?php echo $usercategory;?></h5>
        <h5>User section : <?php echo $usersection; ?></h5>


        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
        <thead>
            <tr>
                <th style="text-align: center;">Add to Cart</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
            </tr>
        </thead>
         <tbody>
         <?php


             $selectcommon = "SELECT * FROM tbl_mim  WHERE storage_location ='GA' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                        
             while ($row = pg_fetch_assoc($stmt3)){
                    $id2 = $row['id'];
                    $item_code = $row['item_code'];
                    $item_name = $row['item_name'];
                    $specification = $row['specification'];
                    $uom = $row['uom'];
                    $stock = $row['stock'];
                
             ?>


            <tr>
            <td style="width: 15px;">
                <i class="fa fa-shopping-cart checkbox-icon" style="font-size: 24px;"id="icon-<?php echo $id2; ?>" onclick="toggleSelection(<?php echo $id2; ?>)"></i>
                <input type="hidden" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $transno; ?>">
            </td>
       
            <td style="font-size: 12px; text-align: center;"><?php echo $item_code ?> </td>
            <td style="font-size: 12px; text-align: center;"><?php echo $item_name ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $specification ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $uom ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo ($stock === null ? 0 : $stock)?></td>
    
           </tr>
      
             <?php

             
             }
             ?>
         </tbody>
     </table>

 

     <?php



    }else if($usercategory === 'user'){

        ?>



  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>

  
  <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
        <thead>
            <tr>
                <th style="text-align: center;">Add to Cart</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
            </tr>
        </thead>
         <tbody>
         <?php


             $selectcommon = "SELECT * FROM tbl_mim  WHERE storage_location ='GA' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                        
             while ($row = pg_fetch_assoc($stmt3)){
                    $id2 = $row['id'];
                    $item_code = $row['item_code'];
                    $item_name = $row['item_name'];
                    $specification = $row['specification'];
                    $uom = $row['uom'];
                    $stock = $row['stock'];
                
             ?>


            <tr>

            <td style="width: 15px;">
                <i class="fa fa-shopping-cart checkbox-icon" style="font-size: 24px;"id="icon-<?php echo $id2; ?>" onclick="toggleSelection(<?php echo $id2; ?>)"></i>
                <input type="hidden" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $transno; ?>">
            </td>
       
            <td style="font-size: 12px; text-align: center;"><?php echo $item_code ?> </td>
            <td style="font-size: 12px; text-align: center;"><?php echo $item_name ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $specification ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $uom ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo ($stock === null ? 0 : $stock)?></td>
    
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
   


  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>

  
  <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
        <thead>
            <tr>
                <th style="text-align: center;">Add to Cart</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
            </tr>
        </thead>
         <tbody>
         <?php


             $selectcommon = "SELECT * FROM tbl_mim  WHERE storage_location ='IT' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                        
             while ($row = pg_fetch_assoc($stmt3)){
                    $id2 = $row['id'];
                    $item_code = $row['item_code'];
                    $item_name = $row['item_name'];
                    $specification = $row['specification'];
                    $uom = $row['uom'];
                    $stock = $row['stock'];
                
             ?>


            <tr>

            <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $item_code; ?>" onclick="highlightRow(this)">
         </td>
       
            <td style="font-size: 12px; text-align: center;"><?php echo $item_code ?> </td>
            <td style="font-size: 12px; text-align: center;"><?php echo $item_name ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $specification ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $uom ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo ($stock === null ? 0 : $stock)?></td>
    
           </tr>
      
             <?php

             
             }
             ?>
         </tbody>
     </table>



     <?php



    }else if($usercategory === 'user'){

        ?>



  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
  
  <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
        <thead>
            <tr>
                <th style="text-align: center;">Add to Cart</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
            </tr>
        </thead>
         <tbody>
         <?php


             $selectcommon = "SELECT * FROM tbl_mim  WHERE storage_location ='IT' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                        
             while ($row = pg_fetch_assoc($stmt3)){
                    $id2 = $row['id'];
                    $item_code = $row['item_code'];
                    $item_name = $row['item_name'];
                    $specification = $row['specification'];
                    $uom = $row['uom'];
                    $stock = $row['stock'];
                
             ?>


            <tr>

            <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $item_code; ?>" onclick="highlightRow(this)">
         </td>
       
            <td style="font-size: 12px; text-align: center;"><?php echo $item_code ?> </td>
            <td style="font-size: 12px; text-align: center;"><?php echo $item_name ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $specification ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $uom ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo ($stock === null ? 0 : $stock)?></td>
    
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
 



  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
        
  <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
        <thead>
            <tr>
                <th style="text-align: center;">Add to Cart</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
            </tr>
        </thead>
         <tbody>
         <?php


             $selectcommon = "SELECT * FROM tbl_mim  WHERE storage_location ='PIM' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                        
             while ($row = pg_fetch_assoc($stmt3)){
                    $id2 = $row['id'];
                    $item_code = $row['item_code'];
                    $item_name = $row['item_name'];
                    $specification = $row['specification'];
                    $uom = $row['uom'];
                    $stock = $row['stock'];
                
             ?>


            <tr>

            <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $item_code; ?>" onclick="highlightRow(this)">
         </td>
       
            <td style="font-size: 12px; text-align: center;"><?php echo $item_code ?> </td>
            <td style="font-size: 12px; text-align: center;"><?php echo $item_name ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $specification ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $uom ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo ($stock === null ? 0 : $stock)?></td>
    
           </tr>
      
             <?php

             
             }
             ?>
         </tbody>
     </table>



     <?php



    }else if($usercategory === 'user'){

        ?>





  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
     
  <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
        <thead>
            <tr>
                <th style="text-align: center;">Add to Cart</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
            </tr>
        </thead>
         <tbody>
         <?php


             $selectcommon = "SELECT * FROM tbl_mim  WHERE storage_location ='PIM' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                        
             while ($row = pg_fetch_assoc($stmt3)){
                    $id2 = $row['id'];
                    $item_code = $row['item_code'];
                    $item_name = $row['item_name'];
                    $specification = $row['specification'];
                    $uom = $row['uom'];
                    $stock = $row['stock'];
                
             ?>


            <tr>

            <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $item_code; ?>" onclick="highlightRow(this)">
         </td>
       
            <td style="font-size: 12px; text-align: center;"><?php echo $item_code ?> </td>
            <td style="font-size: 12px; text-align: center;"><?php echo $item_name ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $specification ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $uom ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo ($stock === null ? 0 : $stock)?></td>
    
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





  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
      
  <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
        <thead>
            <tr>
                <th style="text-align: center;">Add to Cart</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
            </tr>
        </thead>
         <tbody>
         <?php


             $selectcommon = "SELECT * FROM tbl_mim  WHERE storage_location ='MIM' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                        
             while ($row = pg_fetch_assoc($stmt3)){
                    $id2 = $row['id'];
                    $item_code = $row['item_code'];
                    $item_name = $row['item_name'];
                    $specification = $row['specification'];
                    $uom = $row['uom'];
                    $stock = $row['stock'];
                
             ?>


            <tr>

            <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $item_code; ?>" onclick="highlightRow(this)">
         </td>
       
            <td style="font-size: 12px; text-align: center;"><?php echo $item_code ?> </td>
            <td style="font-size: 12px; text-align: center;"><?php echo $item_name ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $specification ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $uom ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo ($stock === null ? 0 : $stock)?></td>
    
           </tr>
      
             <?php

             
             }
             ?>
         </tbody>
     </table>



     <?php



    }else if($usercategory === 'user'){

        ?>



         <h5>User Category : <?php echo $usercategory;?></h5>
        <h5>User section : <?php echo $usersection; ?></h5>
       
        <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
        <thead>
            <tr>
                <th style="text-align: center;">Add to Cart</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
            </tr>
        </thead>
         <tbody>
         <?php


             $selectcommon = "SELECT * FROM tbl_mim  WHERE storage_location ='MIM' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                        
             while ($row = pg_fetch_assoc($stmt3)){
                    $id2 = $row['id'];
                    $item_code = $row['item_code'];
                    $item_name = $row['item_name'];
                    $specification = $row['specification'];
                    $uom = $row['uom'];
                    $stock = $row['stock'];
                
             ?>


            <tr>

            <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $item_code; ?>" onclick="highlightRow(this)">
         </td>
       
            <td style="font-size: 12px; text-align: center;"><?php echo $item_code ?> </td>
            <td style="font-size: 12px; text-align: center;"><?php echo $item_name ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $specification ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $uom ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo ($stock === null ? 0 : $stock)?></td>
    
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
  






  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
       
  <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
        <thead>
            <tr>
                <th style="text-align: center;">Add to Cart</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
            </tr>
        </thead>
         <tbody>
         <?php


             $selectcommon = "SELECT * FROM tbl_mim  WHERE storage_location ='PNJ' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                        
             while ($row = pg_fetch_assoc($stmt3)){
                    $id2 = $row['id'];
                    $item_code = $row['item_code'];
                    $item_name = $row['item_name'];
                    $specification = $row['specification'];
                    $uom = $row['uom'];
                    $stock = $row['stock'];
                
             ?>


            <tr>

            <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $item_code; ?>" onclick="highlightRow(this)">
         </td>
       
            <td style="font-size: 12px; text-align: center;"><?php echo $item_code ?> </td>
            <td style="font-size: 12px; text-align: center;"><?php echo $item_name ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $specification ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $uom ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo ($stock === null ? 0 : $stock)?></td>
    
           </tr>
      
             <?php

             
             }
             ?>
         </tbody>
     </table>

     <?php



    }else if($usercategory === 'user'){

        ?>
  




  <h5>User Category : <?php echo $usercategory;?></h5>
  <h5>User section : <?php echo $usersection; ?></h5>
     
  <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
        <thead>
            <tr>
                <th style="text-align: center;">Add to Cart</th>
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
            </tr>
        </thead>
         <tbody>
         <?php


             $selectcommon = "SELECT * FROM tbl_mim  WHERE storage_location ='PNJ' ORDER BY TRIM(item_name) ASC";
             $stmt3 = pg_query($conn,$selectcommon);
                        
             while ($row = pg_fetch_assoc($stmt3)){
                    $id2 = $row['id'];
                    $item_code = $row['item_code'];
                    $item_name = $row['item_name'];
                    $specification = $row['specification'];
                    $uom = $row['uom'];
                    $stock = $row['stock'];
                
             ?>


            <tr>

            <td style="width: 35px; text-align:center;">
            <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $item_code; ?>" onclick="highlightRow(this)">
         </td>
       
            <td style="font-size: 12px; text-align: center;"><?php echo $item_code ?> </td>
            <td style="font-size: 12px; text-align: center;"><?php echo $item_name ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $specification ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo $uom ?></td>
            <td style="font-size: 12px; text-align: center;"><?php echo ($stock === null ? 0 : $stock)?></td>
    
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
    <br>

    <div class="row">
    
                  
    <div class="col-12" style="display:flex; justify-content:right; align-items:left;">
    
    <button type="button" class="button-cus1" role="button" style="justify-content: left; position: relative;" onclick="return confirm_cart('<?php echo $fullname; ?>')">
      <i class="fa-solid fa-cart-plus"></i> <!-- Font Awesome icon -->
      Add to Cart
      <span class="badge" id="badgeValue">0</span> <!-- Badge with initial value -->
      </button>
    
    <!-- <button type="button" class="btn btn-primary" style = "justify-content:left; margin-left: 5px;">Save</button> -->
    </div>
    </div>
    </div>
    


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  

<!-- 
    <script>
    
        function initializeDataTable() {
            $('#example23').DataTable({
                initComplete: function() {
                    this.api().columns([]).every(function() {
                        let column = this;

                        let select = document.createElement('select');
                        select.add(new Option(''));
                        column.header().appendChild(select);

                        select.addEventListener('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(select.value);
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });

                        column.data().unique().sort().each(function(d, j) {
                            select.add(new Option(d));
                        });
                    });
                },
                columnDefs: [{ orderable: false, targets: [] }]
            });

           
        }

    </script>
 -->

 <script>
        function initializeDataTable() {
            $('#example23').DataTable({
                initComplete: function() {
                    this.api().columns([]).every(function() {
                        let column = this;

                        let select = document.createElement('select');
                        select.add(new Option(''));
                        column.header().appendChild(select);

                        select.addEventListener('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(select.value);
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });

                        column.data().unique().sort().each(function(d, j) {
                            select.add(new Option(d));
                        });
                    });
                },
                columnDefs: [{ orderable: false, targets: [] }]
            });

            document.getElementById('example23').addEventListener('change', function(event) {
                if (event.target.matches('.single-checkbox')) {
                    confirm_cart('<?php echo $fullname; ?>', usersection);
                }
            });
        }



        function confirm_cart(fullname, usersection) {
    var selectedCostCenter = document.getElementById('cost_center').value;

    if (selectedCostCenter === "") {
        Swal.fire({
            title: 'Select Cost Center',
            text: 'Please select a cost center before adding items to the cart!',
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    } else {
        var selectedItems = [];

        // Loop through each page of the DataTable
        $('#example23').DataTable().rows().every(function () {
            var rowData = this.data();
            var checkbox = $(this.node()).find('.single-checkbox')[0];
            if (checkbox.checked) {
                var itemCode = $(checkbox).val();
                selectedItems.push(itemCode);
            }
        });

        // If no items are selected, show a warning
        if (selectedItems.length === 0) {
            Swal.fire({
                title: 'Kindly select Item Code',
                text: 'No selected Item Code detected!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Additional actions if needed
                }
            });
        } else {
            // Show confirmation dialog with selected items
            Swal.fire({
                title: 'Are you sure you want to add the selected items in your cart?',
                html: 'Item Code: <br>' + (selectedItems.length > 0 ? selectedItems.join('<br>') : ''),
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the action to add items to cart
                    var url = 'sqlupdates.php?action=cart' +
                              '&selectedItemId=' + encodeURIComponent(selectedItems.join(',')) +
                              '&fullname=' + encodeURIComponent(fullname) +
                              '&costcenter=' + encodeURIComponent(selectedCostCenter) +
                              '&usersection=' + encodeURIComponent(usersection);

                    window.location.href = url;
                }
            });
        }
    }
}

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









<!-- JavaScript -->
<script>
  // jQuery
  $(document).ready(function() {
    // Event delegation for checkbox click handling
    $('#example23').on('click', '.checkbox-icon', function() {
      // Toggle the checked state of the hidden checkbox
      var checkbox = $(this).next('.single-checkbox');
      checkbox.prop('checked', !checkbox.prop('checked'));

      // Change icon color to green if checkbox is checked, else revert to default
      if (checkbox.prop('checked')) {
        $(this).css('color', '#FF5722');
        // Increase the value of the badge when checkbox is checked
        updateBadgeValue(1);
      } else {
        $(this).css('color', ''); // empty string resets to default
        // Decrease the value of the badge when checkbox is unchecked
        updateBadgeValue(-1);
      }
    });

    // Function to update the badge value dynamically
    function updateBadgeValue(change) {
      var badge = $('#badgeValue');
      var currentValue = parseInt(badge.text());
      var newValue = currentValue + change;
      badge.text(newValue);
    }
  });
</script>






<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include DataTables and Buttons JS -->
<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.2/js/buttons.html5.min.js"></script>


