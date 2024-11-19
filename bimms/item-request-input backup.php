<?php
include 'Connection/connection.php';


session_start();


if(!isset($_SESSION['BIMMSuser_id'])) {
  ?>
      <script>
          alert("Must Login first");
          window.location = "login.php";
      </script>
  <?php
 }

include 'Connection/connection.php';
include 'Connection/overall.php';




?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>BIMMS - Budget & Indirect Material Management System</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/logo/ICON_BIMMS.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


      <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <style>

      
.button-cus1{
    display: inline-block;
                outline: 0;
                cursor: pointer;
                border-radius: 6px;
                border: 2px solid #33691E;
                color: BLACK;
                background: 0 0;
                padding: 8px;
                box-shadow: rgba(0, 0, 0, 0.07) 0px 2px 4px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1.5px 0px;
                font-weight: 800;
                font-size: 16px;
                height: 42px;
                width: 200px;
    }
    .button-cus1:hover{
                    background-color: #C0FFC0;
                    color: BLACK;
                }
                

                .button-cus3{
    display: inline-block;
                outline: 0;
                cursor: pointer;
                border-radius: 6px;
                border: 2px solid #94090D;
                color: BLACK;
                background: 0 0;
                padding: 8px;
                box-shadow: rgba(0, 0, 0, 0.07) 0px 2px 4px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1.5px 0px;
                font-weight: 800;
                font-size: 16px;
                height: 42px;
                width: 200px;
    }
    .button-cus3:hover{
                    background-color: #D40D12;
                    color: BLACK;
                }

              

/* Hide the default checkbox */
.single-checkbox2 {
  display: none;
}

/* Style the checkbox icon */
.checkbox-icon {
  cursor: pointer;
}

.checkbox-icon {
  font-size: 20px; /* Adjust the size as needed */
}


/* Style the checkbox icon */
.checkbox-icon2 {
  cursor: pointer;
}

.checkbox-icon2 {
  font-size: 20px; /* Adjust the size as needed */
}

.fa-solid.fa-cart-plus {
  /* Adjust icon styles if needed */
  margin-right: 5px; /* Add some space between the icon and the text */
  color:black;
}

.badge {
  /* Badge styles */
  position: absolute;
  top: -5px; /* Adjust as needed to position the badge */
  right: -5px; /* Adjust as needed to position the badge */
  background-color: red; /* Badge background color */
  color: white; /* Badge text color */
  border-radius: 50%; /* Make the badge round */
 
  font-size: 16px; /* Adjust as needed */
  font-weight: bold;
}


table tr:hover td {
  background-color: #D6B3FF;
  
}



#loading {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(204, 205, 227, 0.7);
            z-index: 9999;
            text-align: center;
        }
#loading img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 200px;
            height: 200px;
        }
 .green {
        background-color: green !important; /* Ensure red background color is applied */

      
    }

.highlight-green {
      background-color: green;
    }

    .highlight-red {
      background-color: red;
    }

   
  </style>
   <body class="dashboard dashboard_1">
      <div class="full_container" >
         <div class="inner_container">
            <!-- Sidebar  -->
          <?php
          include 'sidebar.php';
          
          ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php
               
               include 'header.php';
               ?>
              
               <!-- end topbar -->
               <!-- dashboard inner -->

               

               <div id="loading">
          <img src="images/logo/loadinggif.gif" alt="Loading...">
        </div>

        <script>

$('#loading').show();
        </script>


<div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              
                           
                           <h2>DEMAND LIST INPUT</h2>
                           
                          
                           </div>
                        </div>
                     </div>


                     <div class="row">
                      

                     <button class="btn item-button" data-option="ALL" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fa-solid fa-cloud" style="font-size: 26px;"></i> <span style="vertical-align: middle;">ALL</span>
                      </button>

                  

                     <button class="btn item-button" data-option="GA" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fas fa-hard-hat" style="font-size: 26px;"></i> <span style="vertical-align: middle;">GA</span>
                      </button>

                      <button class="btn item-button" data-option="IT" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fa-solid fa-computer" style="font-size: 26px;"></i> <span style="vertical-align: middle;">IT</span>
                      </button>

                      <button class="btn item-button" data-option="PIM" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fa-solid fa-gears" style="font-size: 26px;"></i> <span style="vertical-align: middle;">PIM</span>
                      </button>

                      <button class="btn item-button" data-option="MIM" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fa-solid fa-box-archive" style="font-size: 26px;"></i> <span style="vertical-align: middle;">MIM</span>
                      </button>

                      <button class="btn item-button" data-option="PNJ" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fa-solid fa-hammer" style="font-size: 26px;"></i> <span style="vertical-align: middle;">PNJ</span>
                      </button>

                      
                      <script>
        // Get all buttons with class "item-button"
        const buttons = document.querySelectorAll('.item-button');

        // Function to reset all buttons to original color
        function resetButtons() {
            buttons.forEach(button => {
                button.style.backgroundColor = '#FF5722';
            });
        }

        // Loop through each button and add click event listener
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                // Reset all buttons to original color
                resetButtons();
                // Change background color to green on click
                this.style.backgroundColor = '#99C569';
            });
        });
    </script>
                     
       

</div>

<br>
        
<div class="card" >
            <div class="card-body">
              <h5 class="card-title"></h5>
                    
                                 

  <div class="row">
      <div class="col-md-6 col-lg-6">
            <div class="form-group">
               <label for="input1">Section</label>
               <input type="text" class="form-control" id="input1" placeholder="<?php echo $section?> Section " readonly>
            </div>
            <div class="form-group">

                  <label for="select2">Cost Center </label>

                  <?php

                  // Perform the SQL query to fetch the options
                  $query = "SELECT cost_center,costcenter_name FROM tbl_costcenter WHERE section = '$section' ";
                  $result = pg_query($query);

                  // Check for errors in the query
                  if (!$result) {
                     echo "An error occurred.\n";
                     exit;
                  }

                  // Generate the HTML for the select options
                  $options_html = '';
                  while ($row = pg_fetch_assoc($result)) {
                     $options_html .= "<option value='{$row['cost_center']}'>{$row['cost_center']} - {$row['costcenter_name']}</option>";
                  }


                  ?>
                  <select class="form-control" id="selectedcostcenter" name="selectedcostcenter">
                  <option value="">Select Cost Center</option>
                  <?php echo $options_html; ?>
                  </select>
                  </div>


                  <div class="form-group">

                  <label for="select2">Warehouse</label>
              
                  <select class="form-control" id="select4">
                  <option value="">Select Warehouse</option>
                  <option value="F1_3F Stockroom">F1_3F Stockroom</option>
                  <option value="F2_3F Stockroom">F2_3F Stockroom</option>
                 
                  </select>
                  </div>

      </div>


      

      <div class="col-md-6 col-lg-6">
         <div class="form-group">
            <label for="input_itemcode">Item Code</label>
            <input type="text" class="form-control" id="input_itemcode" placeholder="Input Item Code Here">
         </div>
         <div class="form-group">
            <label for="input_itemname">Item Name</label>
            <input type="text" class="form-control" id="input_itemname" placeholder="Input Item Name Here">
         </div>
      </div>

      
</div>




<form>

         
    <?php
    // PHP code to fetch initial data and set $selectedItems
$selectcommon = "SELECT * FROM tbl_mim 
LIMIT 200";
$qry_selectcommon = pg_query($conn, $selectcommon);
$selectedItems = isset($_POST['selected']) && is_array($_POST['selected']) ? $_POST['selected'] : [];

    ?>
<table id="example24" class="display" style="width:100%; overflow-x: auto; white-space: nowrap; display: block;">
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
        while ($row = pg_fetch_assoc($qry_selectcommon)) {
            $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
            $item_code = $row['item_code']; // Assuming column names in PostgreSQL are in lowercase
            $item_name = $row['item_name'];
            $specification = $row['specification'];
            $uom = $row['uom'];
            $stock = $row['stock'];
            
            // Check if the item code is in the selectedItems array
            $checked = in_array($item_code, $selectedItems) ? 'checked' : '';

            echo '<tr>
                  <td style="width: 15px;">
                      <i class="fa-solid fa-cart-shopping checkbox-icon" id="icon-' . $id2 . '"></i>
                      <input type="checkbox" name="selected[]" class="single-checkbox2" id="selected-' . $id2 . '" value="' . $item_code . '" ' . $checked . '>
                  </td>
                  <td style="font-size: 12px; text-align: center;">' . $row['item_code'] . '</td>
                  <td style="font-size: 12px; text-align: center;">' . $row['item_name'] . '</td>
                  <td style="font-size: 12px; text-align: center;">' . $row['specification'] . '</td>
                  <td style="font-size: 12px; text-align: center;">' . $row['uom'] . '</td>
                  <td style="font-size: 12px; text-align: center;">' . ($row['stock'] === null ? 0 : $row['stock']) . '</td>
                  </tr>';
        }
        ?>
    </tbody>
</table>


<br>



             



              <div class="row">

              
                <div class="col-12" style="display:flex; justify-content:right; align-items:left;">

               
<button type="button" class="button-cus1" role="button" style="justify-content: left; position: relative;" onclick="return confirm_cart('<?php echo $fullname; ?>')">
    <i class="fa-solid fa-cart-plus"></i> <!-- Font Awesome icon -->
    Add Item
    <span class="badge" id="badgeValue">0</span> <!-- Badge with initial value -->
</button>
              <!-- <button type="button" class="btn btn-primary" style = "justify-content:left; margin-left: 5px;">Save</button> -->
                </div>
              </div>

              </form>
  
                     </div>

     
                     </div>

                     
 <!-- end of 1st table -->

 <br>
<form>

<div class="card" >
  <div class="card-body">
    <h5 class="card-title"></h5>

    


    <table id="example25" class="display" style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;"  >
<thead>
  
  <tr>
  <th style="text-align: center;">Remove from Cart

     </th>
      <th style="text-align: center;">Transaction Number</th>                       
      <th style="text-align: center;">Item Code</th>
      <th style="text-align: center;">Item Name</th>
      <th style="text-align: center;">Specification</th>
      <th style="text-align: center;">Cost Center</th>
      <th style="text-align: center;">UOM</th>
      <th style="text-align: center;">Available Stock Quantity</th>
      <th style="text-align: center;">Section Name</th>
      <th style="text-align: center;">Section Stock</th>
      <th style="text-align: center;">Quantity</th>
      <th style="text-align: center;">Purpose</th>
      <th style="text-align: center;">Line</th>
      <th style="text-align: center;">Remarks</th>
     
  </tr>
</thead>
<tbody>
   
<?php


      $selectcommon = "SELECT * FROM tbl_mim_itemrequest";
      $stmt3 = pg_query($conn, $selectcommon);

      while ($row = pg_fetch_assoc($stmt3)) {
        $id3 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
        $transno = $row['transaction_number']; // Assuming column names in PostgreSQL are in lowercase
        $item_code2 = $row['item_code']; // Assuming column names in PostgreSQL are in lowercase
        $item_name2 = $row['item_name'];
        $specification2 = $row['specification'];
        $uom2 = $row['uom'];
        $stock2 = $row['stock'];
        $unitcost = $row['unit_cost'];
        $costcenter = $row['cost_center'];
        $totaldemandquantity = $row['total_demand_quantity'];



          // Get the current month name
        $currentMonth = date('F'); // This will give you the full month name like 'June'

        // Generate the column name based on the current month
        $currentMonthColumn = strtolower($currentMonth); // Assuming the column names are in lowercase

        // Get total_demand_quantity from tbl_mim_approval
        $selectApproval = "SELECT \"$currentMonthColumn\" FROM tbl_mim_approval WHERE item_code = '$item_code2'";
        $stmtApproval = pg_query($conn, $selectApproval);

        // Check if the query was successful
        if ($stmtApproval) {
            $approvalRow = pg_fetch_assoc($stmtApproval);
            $total_demand_currentmonth = $approvalRow[$currentMonthColumn] ?? 0;
        } else {
            // Handle query failure
            $total_demand_currentmonth = 0;
        }



     
       
     
        $today = new DateTime();
        $currentMonth = $today->format('m'); // Get the current month as a number (1-12)

        // Define the previous 3 months (considering December as 0)
        $previousMonths = array(
          ($currentMonth - 3) % 12,
          ($currentMonth - 2) % 12,
          ($currentMonth - 1) % 12,
        );
    
     


                        echo

                        '<tr>


                        <td style="width: 15px;">
                        <i class="fa fa-trash checkbox-icon2" id="icon-<?php echo $id2; ?>"></i>
                        <input type="hidden" name="selected[]" class="single-checkbox3" id="selected-<?php echo $id2; ?>" value="'.$transno.'">

                   
                    </td>
                      

                            <td style=" font-size: 12px; text-align: center;">'  . $row['transaction_number'] .'</td>
                            <td style=" font-size: 12px; text-align: center;">'  . $row['item_code'] .'</td>
                            <td style=" font-size: 12px; text-align: center;">'  . $row['item_name'] .'</td>
                            <td style=" font-size: 12px; text-align: center;">'  . $row['specification'] .'</td>
                            <td style=" font-size: 12px; text-align: center;">'  . $row['cost_center'] .'</td>
                            <td style=" font-size: 12px; text-align: center;">'  . $row['uom'] .'</td>
                            <td style="font-size: 12px; text-align: center;">' . ($row['stock'] === null ? 0 : $row['stock']) . '</td>
                            <td style="font-size: 12px; text-align: center;">' .$section. '</td>    
                          
                            

                           <td style="font-size: 12px; text-align: center;">' . $total_demand_currentmonth . '</td>


                            <td style="font-size: 12px; text-align: center;">
                                <input type="number" name="quantity[]" value="' . $row['quantity'] . '" onchange="validateQuantity(this, ' . $row['stock'] . ', ' . $total_demand_currentmonth . ')">
                            </td>



                           
                            <td style="font-size: 12px; text-align: center;"><input type="text" name="purpose[]" value="' . $row['purpose'] . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="text" name="line[]" value="' . $row['line'] . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="text" name="remarks[]" value="' . $row['remarks'] . '"></td>


                            
                       

                           
                      
                            
                          
                        ';
                    

                    }

    
    ?>
</tbody>

</table>



<br>
   



    <div class="row">

    
      <div class="col-12" style="display:flex; justify-content:right; align-items:left;">

      <button type="button" class="button-cus3" role="button" style="justify-content: left; position: relative;" onclick="return confirm_remove()">
        <i class="fa fa-trash" style="color:black;"></i> <!-- Font Awesome icon -->
        Remove Item
        <span class="badge" id="badgeValue2">0</span> <!-- Badge with initial value -->
        </button>

    <!-- <button type="button" class="btn btn-primary" style = "justify-content:left; margin-left: 5px;">Save</button> -->
      </div>
    </div>

    </form>


    






                  
           
         
           </div>


           </div>

           <br>


         <!--  Approver card -->


         <div class="card" >
               <div class="card-body">
 
                       
 
          <div class="row">
            <div class="col-md-6 col-lg-6">
                  <div class="form-group">
 
                           <label for="select4">Section Budget Controller</label>
 
                           <?php
                           
                           // Perform the SQL query to fetch the options
                           $query = "SELECT main_pic FROM tbl_costcenter WHERE section = '$section'";
                           $result = pg_query($query);
 
                           // Check for errors in the query
                           if (!$result) {
                              echo "An error occurred.\n";
                              exit;
                           }
 
                           // Generate the HTML for the select options
                           $options_html = '';
                           while ($row = pg_fetch_assoc($result)) {
                              $options_html .= "<option value='{$row['main_pic']}'>{$row['main_pic']}</option>";
                           }
 
                     
                           ?>
                           <select class="form-control" id="select4">
                           <option value="">Select Section Budget Controller</option>
                           <?php echo $options_html; ?>
                           </select>
                        </div>
 
             <div style="text-align: left;">
                  <button type="submit" class="button-cus1" role="button" style="position: relative;"  onclick="return confirm_submit()"  >
               SUBMIT
            </button>
       
            <div>
                     
 
            </div>
 <br>
           
   
 
 
 
               
 
               
      </div>
      </div>
      </div>
      </div>

               
   

            <!-- end Approver card -->
 <br>
 


                  
                     
                  </div>
                  <!-- footer -->
                  <div class="container-fluid">
                     <div class="footer">

                

                        <p>Copyright © 2024 BPS Section. All rights reserved.<br><br>
                        Design and Developed By: <a href="">JM MACARAIG</a>
                        </p>
                     </div>
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>
</html>


<script>
  // Declare table globally
let table;

    document.addEventListener('DOMContentLoaded', function() {

      $('#loading').show();

        // Initialize DataTable
         table = new DataTable('#example24', {
            initComplete: function () {
                // Hide loading GIF
                $('#loading').hide();


       
                // Filter by item code
                document.getElementById('input_itemcode').addEventListener('input', function () {
                    table.column(0).search(this.value).draw();
                });

                // Filter by item name
                document.getElementById('input_itemname').addEventListener('input', function () {
                    table.column(2).search(this.value).draw();
                });

                // Add dropdown filters for other columns
                this.api().columns([1, 3, 4, 5]).every(function () {
                    let column = this;

                    // Create select element for filtering
                    let select = document.createElement('select');
                    select.add(new Option(''));

                    // Append select to column header
                    column.header().replaceChildren(select);

                    // Apply listener for user change in value
                    select.addEventListener('change', function () {
                        var val = DataTable.util.escapeRegex(select.value);
                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                    // Add list of options
                    column.data().unique().sort().each(function (d, j) {
                        select.add(new Option(d));
                    });
                });
            },
            columnDefs: [
                { orderable: false, targets: [1, 2, 3, 4, 5] }
            ]
        });
    });
</script>


<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Attach event listener to the entire table
    document.getElementById('example24').addEventListener('change', function(event) {
        // Check if the change event originated from a checkbox with the class 'single-checkbox2'
        if (event.target.matches('.single-checkbox2')) {
         confirm_cart('<?php echo $fullname; ?>'); // Call the confirmation function with $fullname
        }
    });
});

function confirm_cart(fullname) {
    var selectedCostCenter = document.getElementById('selectedcostcenter').value;

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
        table.rows().nodes().each(function (row) {
            // Check if the checkbox in this row is checked
            var checkbox = row.querySelector('.single-checkbox2');
            if (checkbox.checked) {
                selectedItems.push(checkbox.value);
            }
        });

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
                    window.location.href = 'sqlupdates.php?action=itemrequest&selectedItemId=' + selectedItems.join(',') + '&fullname=' + encodeURIComponent(fullname) + '&selectedcostcenter=' + encodeURIComponent(selectedCostCenter);
                }
            });
        }
    }
}

</script>



<script>
        new DataTable('#example25', {
                

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
        { orderable: false, targets: [1,2,3,4,5,6,7,8,9] }
        ]
        });


  </script>









 
 









<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Attach event listener to the entire table
        document.getElementById('example25').addEventListener('change', function(event) {
            // Check if the change event originated from a checkbox with the class 'single-checkbox3'
            if (event.target.matches('.single-checkbox3')) {
                confirm_remove(); // Call the confirmation function
            }
        });
    });

    function confirm_remove() {
        var checkboxes = document.getElementsByClassName('single-checkbox3');
        var vals = [];
        var count = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                vals.push(checkboxes[i].value); // Push the value into the array
                count++;
            }
        }

        if (count <= 0) {
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
            Swal.fire({
                title: 'Are you sure you want to delete the selected items from your cart ?',
                html: 'Item Code: <br>' + (vals.length > 0 ? vals.join('<br>') : ''),
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'sqlupdates.php?action=cartremove&selectedItemId=' + vals.join(',');
                }
            });
        }
    }
</script>


<script>
 document.addEventListener('DOMContentLoaded', function() {
    // Attach event listener to the entire table
    document.getElementById('example25').addEventListener('change', function(event) {
        // Check if the change event originated from a checkbox with the class 'single-checkbox3'
        if (event.target.matches('.single-checkbox3')) {
            confirm_submit(); // Call the confirmation function
        }
    });

    // Automatically check all checkboxes when the document is loaded
    checkAllCheckboxes();
});

function checkAllCheckboxes() {
    var checkboxes = document.getElementsByClassName('single-checkbox3');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = true;
    }
}

function confirm_submit() {
    var checkboxes = document.getElementsByClassName('single-checkbox3');
    var vals = [];
    var count = 0;

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            vals.push(checkboxes[i].value); // Push the value into the array
            count++;
        }
    }

    if (count <= 0) {
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
        Swal.fire({
            title: 'Are you sure you want to submit the selected items from your cart?',
            html: 'Item Code: <br>' + (vals.length > 0 ? vals.join('<br>') : ''),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, submit it!'
        }).then((result) => {
            if (result.isConfirmed) {
                  // Create a form element
                var form = document.createElement('form');
                form.method = 'post';
                form.action = 'process_data_itemrequest.php';

                // Create an input element for selectedItemId
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selectedItemId';
                input.value = vals.join(','); // Assuming vals is an array of selected item IDs

                // Add the input element to the form
                form.appendChild(input);

                // Collect all input fields (number inputs and text inputs) and add them to the form
                var requestInputs = document.querySelectorAll('input[type="number"], input[type="text"]');
                requestInputs.forEach(function(input) {
                    var clonedInput = input.cloneNode();
                    clonedInput.value = input.value;
                    clonedInput.name = input.name;
                    form.appendChild(clonedInput);
                });

                // Add the form to the document body
                document.body.appendChild(form);

                // Submit the form
                form.submit();
            }
        });
    }
}



</script>


<!-- JavaScript -->
<script>
  // jQuery
  $(document).ready(function() {
    // Event delegation for checkbox click handling
    $('#example24').on('click', '.checkbox-icon', function() {
      // Toggle the checked state of the hidden checkbox
      var checkbox = $(this).next('.single-checkbox2');
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

</script>



<!-- JavaScript -->
<script>
  // jQuery
  $(document).ready(function() {
    // Event delegation for checkbox click handling
    $('#example25').on('click', '.checkbox-icon2', function() {
      // Toggle the checked state of the hidden checkbox
      var checkbox = $(this).next('.single-checkbox3');
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
      var badge = $('#badgeValue2');
      var currentValue = parseInt(badge.text());
      var newValue = currentValue + change;
      badge.text(newValue);
    }
  });
</script>



<script>
function toggleAll(source) {
  var checkboxes = document.querySelectorAll('.single-checkbox2');
  checkboxes.forEach(function(checkbox) {
    checkbox.checked = source.checked;
    // Update icon color if needed
    if (source.checked) {
      $(checkbox).prev('.checkbox-icon').css('color', '#99C569');
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
function validateQuantity(input, stock, totalDemand) {
    var quantity = input.value;
    if (quantity > stock) {
        alert('The current input Quantity is greater than stock.');
        input.value = stock;
    } else if (quantity > totalDemand) {
        alert('The current input Quantity is greater than total demand for the current month.');
        input.value = totalDemand;
    }
}
</script>





<!-- 
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    const currentMonth = new Date().getMonth(); // 0-based index (0 = January, 11 = December)

    const table = document.getElementById('example25');
    const rows = table.getElementsByTagName('tr');

    // Loop through each row
    for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
      const cells = rows[i].getElementsByTagName('td');
      let deliveryMonth = null;

      // Loop through cells to find delivery date
      for (let j = 0; j < cells.length; j++) {
        const input = cells[j].getElementsByTagName('input')[0];
        if (input && input.getAttribute('name') === 'delivery_date') {
          deliveryMonth = new Date(input.value).getMonth(); // Get month of delivery date
          break;
        }
      }
    }

    const previousMonths = [
      (currentMonth - 3 + 12) % 12,
      (currentMonth - 2 + 12) % 12,
      (currentMonth - 1 + 12) % 12,
    ];

    const monthColumnIndexMap = {
      0: 12, 1: 13, 2: 14, 3: 15, 4: 16, 5: 17,
      6: 18, 7: 19, 8: 20, 9: 21, 10: 22, 11: 23,
    };

    // Loop through each row
    for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
      const cells = rows[i].getElementsByTagName('td');
      previousMonths.forEach(monthIndex => {
        const columnIndex = monthColumnIndexMap[monthIndex];
        if (cells[columnIndex]) {
          cells[columnIndex].classList.add('highlight-green');
          const input = cells[columnIndex].getElementsByTagName('input')[0];
          if (input) {
            input.disabled = true;
          }
        }
      });
    }
  });
</script> -->



<!-- 
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('td[data-month]').forEach(function(td) {
            // Create input element
            var input = document.createElement('input');
            input.type = 'text';
            input.value = td.textContent.trim(); // Use the existing text content as input value
 
            // Append input element to the table cell
            td.innerHTML = ''; // Clear existing content of the table cell
            td.appendChild(input);
 
            // Calculate the current month
            var currentMonth = new Date();
            currentMonth.setFullYear(2024);
            currentMonth.setMonth(['january','february','march','april','may','june','july','august','september','october','november','december'].indexOf(td.dataset.month));
            currentMonth.setDate(1);
 
            // Calculate the previous 3 months from the current month
            // var prev3Months = new Date(currentMonth.getFullYear(), currentMonth.getMonth() - 3, 1);
 
            // Fetch the delivery date cell for this row
            var deliveryDateCell = td.closest('tr').querySelector('td[data-delivery-date]');
            if (!deliveryDateCell) {
                console.error('Delivery date cell not found for row.');
                return;
            }
 
            // Get the delivery date string from the cell content
            var deliveryDateString = deliveryDateCell.textContent.trim();
           
            // Extract the month from the delivery date string
            var deliveryMonth = new Date(deliveryDateString).getMonth(); // Month index (0-11)
 
            // Array of month abbreviations
            var monthAbbreviations = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
           
            // Get the abbreviation for the delivery month
            var deliveryMonthAbbreviation = monthAbbreviations[deliveryMonth];
 
            // Display the delivery month abbreviation in the console
            console.log('Delivery Month Abbreviation for Row:', deliveryMonthAbbreviation);
 
 
 
         
            if (deliveryMonth > currentMonth.getMonth()) {
                input.disabled = true; // Disable the input
                input.style.backgroundColor = '#EA5861'; // Set background color to red
            }
        });
    });
</script>
 -->



 

 