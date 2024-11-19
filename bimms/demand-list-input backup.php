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
      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    

      

      <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      
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
<!-- 
        <script>

$('#loading').show();
        </script> -->


               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Demand List Input</h2>
                           </div>
                        </div>
                     </div>

                     <div class="col-md-3">
        <div class="form-floating">
            <label for="floatingSelect" style="font-size:15px;">Select Item Category :</label>
            <select class="form-select" id="selectedStorage" aria-label="State" style="font-size:15px;">
                <option selected>-</option>
                <option value="">ALL</option>
                <option value="GA">GA</option>
                <option value="IT">IT</option>
                <option value="PIM">PIM</option>
                <option value="MIM">MIM</option>
                <option value="PNJ">PNJ</option>
            </select>
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
                  
                      </div>
                      </div>

       <br>


       


                                 

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
                  <select class="form-control" id="select4">
                  <option value="">Select Cost Center</option>
                  <?php echo $options_html; ?>
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

          <div class="card" >
            <div class="card-body">
              <h5 class="card-title"></h5>
              
              <div id="loading">
             
          <img src="bimms/images/logo/loadinggif.gif" alt="Loading...">
        </div>

              
   
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
        <tbody id="tableBody">
            <!-- Table content will be populated by JavaScript -->
        </tbody>
    </table>




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

              </form>
  
                     </div>

     
                     </div>

                     
 <!-- end of 1st table -->

 <br>

 
<form>

<div class="card" >
  <div class="card-body">
    <h5 class="card-title"></h5>

    


    <table id="example25" class="display"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;" >
<thead>
  
  <tr>
  <th style="text-align: center;">Remove from Cart

     </th>
      <th style="text-align: center;">Transaction Number</th>                       
      <th style="text-align: center;">Item Code</th>
      <th style="text-align: center;">Item Name</th>
      <th style="text-align: center;">Specification</th>
      <th style="text-align: center;">UOM</th>
      <th style="text-align: center;">Available Stock Quantity</th>
      <th style="text-align: center;">Section Name</th>
      <th style="text-align: center;">Cost Center</th>
      <th style="text-align: center;">Section Stock</th>
      <th style="text-align: center;">Lead Time</th>
      <th style="text-align: center;">Delivery Date</th>
      <th style="text-align: center;">January</th>
      <th style="text-align: center;">February</th>
      <th style="text-align: center;">March</th>
      <th style="text-align: center;">April</th>
      <th style="text-align: center;">May</th>
      <th style="text-align: center;">June</th>
      <th style="text-align: center;">July</th>
      <th style="text-align: center;">August</th>
      <th style="text-align: center;">September</th>
      <th style="text-align: center;">October</th>
      <th style="text-align: center;">November</th>
      <th style="text-align: center;">December</th>
  </tr>
</thead>
<tbody>
   
<?php
      $selectcommon = "SELECT * FROM tbl_mim_cart";
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
        $delivery_leadtime = $row['delivery_date'];
        $leadtime = $row['lt'];
        $jan = $row['january'];
        $feb = $row['february'];
        $mar = $row['march'];
        $apr = $row['april'];
        $may = $row['may'];
        $june = $row['june'];
        $july = $row['july'];
        $aug = $row['august'];
        $sept = $row['september'];
        $oct = $row['october'];
        $nov = $row['november'];
        $dec = $row['december'];
        $sectionname = $row['section_name'];
        $sectionstock = $row['section_stock'];
        $costcenter = $row['cost_center'];

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
                            <td style=" font-size: 12px; text-align: center;">'  . $row['uom'] .'</td>
                            <td style="font-size: 12px; text-align: center;">' . ($row['stock'] === null ? 0 : $row['stock']) . '</td>
                            <td style="font-size: 12px; text-align: center;">' .$section. '</td>
                            <td style="font-size: 12px; text-align: center;">' .$costcenter. '</td>


                            <td style="font-size: 12px; text-align: center;">' . ($row['section_stock'] === null ? 0 : $row['section_stock']) . '</td>
                       



                            <td style=" font-size: 12px; text-align: center;">'  . $row['lt'] .'</td>

                            <td data-delivery-date style=" font-size: 12px; text-align: center;" name="delivery_date">'  . $row['delivery_date'] .'</td>
                  

                           
                            <td style="font-size: 12px; text-align: center;"><input type="number" name="january[]" value="' . ($row['january'] === null ? 0 : $row['january']) . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="number" name="february[]" value="' . ($row['february'] === null ? 0 : $row['february']) . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="number" name="march[]" value="' . $row['march'] . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="number" name="april[]" value="' . $row['april'] . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="number" name="may[]" value="' . $row['may'] . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="number" name="june[]" value="' . $row['june'] . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="number" name="july[]" value="' . $row['july'] . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="number" name="august[]" value="' . $row['august'] . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="number" name="september[]" value="' . $row['september'] . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="number" name="october[]" value="' . $row['october'] . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="number" name="november[]" value="' . $row['november'] . '"></td>
                            <td style="font-size: 12px; text-align: center;"><input type="number" name="december[]" value="' . $row['december'] . '"></td>
                          
                        
                           
                      
                            
                          
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
        Remove from Cart
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
 
 
                        <div class="form-group">
 
                              <label for="select5">Section Supervisor</label>
 
                              <?php
 
                              // Perform the SQL query to fetch the options
                              $query = "SELECT section_spv FROM tbl_costcenter WHERE section = '$section'";
                              $result = pg_query($query);
 
                              // Check for errors in the query
                              if (!$result) {
                                 echo "An error occurred.\n";
                                 exit;
                              }
 
                              // Generate the HTML for the select options
                              $options_html = '';
                              while ($row = pg_fetch_assoc($result)) {
                                 $options_html .= "<option value='{$row['section_spv']}'>{$row['section_spv']}</option>";
                              }
 
 
                              ?>
                              <select class="form-control" id="select5">
                              <option value="">Select Section Supervisor</option>
                              <?php echo $options_html; ?>
                              </select>
                              </div>
 
 
                              <div class="form-group">
 
                                    <label for="select6">Section Manager</label>
 
                                    <?php
 
                                    // Perform the SQL query to fetch the options
                                    $query = "SELECT section_manager FROM tbl_costcenter WHERE section = '$section'";
                                    $result = pg_query($query);
 
                                    // Check for errors in the query
                                    if (!$result) {
                                       echo "An error occurred.\n";
                                       exit;
                                    }
 
                                    // Generate the HTML for the select options
                                    $options_html = '';
                                    while ($row = pg_fetch_assoc($result)) {
                                       $options_html .= "<option value='{$row['section_manager']}'>{$row['section_manager']}</option>";
                                    }
 
 
                                    ?>
                                    <select class="form-control" id="select6">
                                    <option value="">Select Section Manager</option>
                                    <?php echo $options_html; ?>
                                    </select>
                                    </div>
 
            </div>
 
            <div class="col-md-6 col-lg-6" >
            <div class="form-group">
                     <label for="select4">PE Section Manager</label>
                     <select class="form-control" id="select4">
                     <option value="">Select PE Manager</option>
                     <option value="option1">Option 1</option>
                     <option value="option2">Option 2</option>
                     <option value="option3">Option 3</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="select4">PE Section Supervisor</label>
                     <select class="form-control" id="select4">
                     <option value="">Select PE Section Supervisor</option>
                     <option value="option1">Option 1</option>
                     <option value="option2">Option 2</option>
                     <option value="option3">Option 3</option>
                     </select>
                  </div>
 
             <div style="text-align: right;">
                  <button type="submit" class="button-cus1" role="button" style="position: relative;"  onclick="return confirm_submit()"  >
               SUBMIT
            </button>
       
            <div>
 
           
            </div>
      </div>

   
 
 
 
               
 
                  </div>
               </div>
               
   

            <!-- end Approver card -->
 <br>
                     
                                <!-- uploading of masterlist-->
                     <div class="card">
                           <div class="card-body">   
               
                           <form action="upload_data.php" id="form1" method="post" enctype="multipart/form-data">
                              
                           
                           
                              <div class="row">

                                 
                              <div class="col-md-3">
                                          <div class="form-floating">
                                          </input>
                                       </div>
                                       </div>
                                       <br>
                                       <div class="col-md-3">
                                       <label for="masterlist_upload">Upload Master List</label>

                                                <select class="form-select" name="datatype" id="datatype" required>
                                                   <option value="" selected>Select Data Type</option>
                                                   <option value="MIM">MIM</option>
                                                   <option value="PIM">PIM</option>
                                                   <option value="P&J">P&J</option>
                                                

                                                   <!-- Add more options as needed -->
                                                </select>
                                          </div>

                              <div class="col-md-3">
                                 
                                    <input class="form-control" type="file" id="file" name="file" accept=".xlsx, .xls" required>
                              </div>
                              
                              
                           

                                 <div class="col-md-3">
                                       
                                          
                                          <button type="submit" class="button-89" id="submitBtn1">Submit</button>
                                    
                                    </div>
                              </div>
                        
                        </form>
               
                              
                        </div>
       
                  </div>
                        <!-- end uploading of masterlist-->
<br>

<br>
                     
                     <!-- uploading of masterlist-->
          <div class="card">
                <div class="card-body">   
    
                <form action="upload_prevdata.php" id="form1" method="post" enctype="multipart/form-data">
                   
                
                
                   <div class="row">

                      
                   <div class="col-md-3">
                               <div class="form-floating">
                               </input>
                            </div>
                            </div>
                            <br>
                            <div class="col-md-3">
                            <label for="masterlist_upload">Upload Master List Previous Month</label>

                                     <select class="form-select" name="datatype" id="datatype" required>
                                        <option value="" selected>Select Data Type</option>
                                        <option value="MIM">MIM</option>
                                        <option value="PIM">PIM</option>
                                        <option value="P&J">P&J</option>
                                     

                                        <!-- Add more options as needed -->
                                     </select>
                               </div>

                   <div class="col-md-3">
                      
                         <input class="form-control" type="file" id="file" name="file" accept=".xlsx, .xls" required>
                   </div>
                   
                   
                

                      <div class="col-md-3">
                            
                               
                               <button type="submit" class="button-89" id="submitBtn1">Submit</button>
                         
                         </div>
                   </div>
             
             </form>
    
                   
             </div>

       </div>
             <!-- end uploading of masterlist-->
<br>
                           <!-- uploading of costcenter approver-->
                     <div class="card">
                           <div class="card-body">   
               
                           <form action="upload_data-costcenter.php" id="form1" method="post" enctype="multipart/form-data">
                              
                           
                           
                              <div class="row">

                             

                              <div class="col-md-3">
                              <label for="masterlist_upload">Upload Cost Center List</label>
                                    <input class="form-control" type="file" id="file" name="file" accept=".xlsx, .xls" required>
                              </div>
                              
                              
                           

                                 <div class="col-md-3">
                                       
                                          
                                          <button type="submit" class="button-89" id="submitBtn1">Submit</button>
                                    
                                    </div>
                              </div>
                        
                        </form>
               
                              
                        </div>
       
                  </div>
                        <!-- end uploading of masterlist-->
 


                  
                     
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
    document.addEventListener('DOMContentLoaded', function() {

      
      // $('#loading').show();
         

        // Initialize DataTable
        let table = new DataTable('#example24', {
            initComplete: function () {
             
              //  $('#loading').hide();

             

                this.api().columns([]).every(function (index) {
                    let column = this;

                    // Create select element for filtering
                    let select = document.createElement('select');
                    select.add(new Option(''));
                    column.header().replaceChildren(select);

                    // Apply listener for user change in value
                    select.addEventListener('change', function () {
                        var val = DataTable.util.escapeRegex(select.value);
                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                  
                });

                // Add listener for item code input field
                document.getElementById('input_itemcode').addEventListener('input', function () {
                         table.column(0).search(this.value).draw();
                });

                document.getElementById('input_itemname').addEventListener('input', function () {
               table.column(2).search(this.value).draw();
                 });
            },
            columnDefs: [
                { orderable: false, targets: [1,2,3,4,5] }
            ]
        });
    });
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
        { orderable: false, targets: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22] }
        ]
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
        // Get the selected cost center
        var selectedCostCenter = document.getElementById('select4').value;

        // Check if a cost center has been selected
        if (selectedCostCenter === "") {
            // Display a warning message if no cost center has been selected
            Swal.fire({
                title: 'Select Cost Center',
                text: 'Please select a cost center before adding items to the cart!',
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        } else {
            // Cost center selected, proceed with checking selected items
            var checkboxes = document.querySelectorAll('.single-checkbox2');
            var selectedItems = [];

            checkboxes.forEach(function(checkbox) {
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
                        // Proceed with adding items to the cart
                        // window.location.href = 'sqlupdates.php?action=cart&selectedItemId=' + selectedItems.join(',') + '&fullname=' + encodeURIComponent(fullname);
                        window.location.href = 'sqlupdates.php?action=cart&selectedItemId=' + selectedItems.join(',') + '&fullname=' + encodeURIComponent(fullname) + '&costcenter=' + encodeURIComponent(selectedCostCenter);
                        // Additional actions if confirmed
                        // Redirect or submit form
                    }
                });
            }
        }
    }
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
                form.action = 'process_data.php';

                // Create an input element for selectedItemId
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selectedItemId';
                input.value = vals.join(','); // Assuming vals is an array of selected item IDs

                // Add the input element to the form
                form.appendChild(input);

                // Collect all other input fields (number inputs for months) and add them to the form
                var monthInputs = document.querySelectorAll('input[type="number"]');
                monthInputs.forEach(function(monthInput) {
                    var clonedInput = monthInput.cloneNode();
                    clonedInput.value = monthInput.value;
                    clonedInput.name = monthInput.name;
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
</script>




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

<script>
    // Use jQuery(document).ready() to ensure scripts run after the document is fully loaded
    jQuery(document).ready(function($) {
        // Function to fetch and update table data based on the selected category
        function fetchTableData(selectedCategory) {
            jQuery.ajax({
                url: 'demand-list-input-table.php',
                type: 'POST',
                data: {category: selectedCategory},
                success: function(response) {
                    $('#tableBody').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                }
            });
        }

        // Event listener for dropdown changes
        $('#selectedStorage').change(function() {
            var selectedCategory = $(this).val();
            fetchTableData(selectedCategory);
        });

        // Function to handle button clicks
        function handleButtonClick(event) {
            const optionValue = event.currentTarget.getAttribute('data-option');
            const dropdown = document.getElementById('selectedStorage');
            dropdown.value = optionValue;
            fetchTableData(optionValue);
        }

        // Add event listeners to all buttons with the class 'item-button'
        $('.item-button').on('click', handleButtonClick);

        // Get all buttons with class "item-button"
        const buttons = $('.item-button');

        // Function to reset all buttons to original color
        function resetButtons() {
            buttons.css('background-color', '#FF5722');
        }

        // Loop through each button and add click event listener
        buttons.each(function() {
            $(this).on('click', function() {
                // Reset all buttons to original color
                resetButtons();
                // Change background color to green on click
                $(this).css('background-color', '#99C569');
            });
        });
    });
</script>




 