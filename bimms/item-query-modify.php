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

     
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">




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
 .bordered-table td, .bordered-table th {
        border: 1px solid black;
    }


    #example24 th {
    background-color: #7AB9EA;
    color: #42657F;
   
}

        #example24 th,
        #example24 td {
    border: 1px  solid gray;
}


@keyframes blinker {
        50% { opacity: 0; }
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

<br>

   
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Input Query and Modify</h2>
 
                           </div>
                        </div>
                     </div>
                  
                     <div class="row column1 social_media_section">
                        <div class="col-md-1 col-lg-1">
                           <div class="full socile_icons ga margin_bottom_30" >
                              <div class="social_icon" style="background-color:#FF5722;">
                              <i class="fas fa-hard-hat"></i>
                              </div>
                              <div class="social_cont">
                              <ul>
                                 <li>
                                 <span><strong>GA</strong></span>
                                 </li>
                              </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-1 col-lg-1">
                           <div class="full socile_icons it margin_bottom_30" >
                              <div class="social_icon" style="background-color:#FF5722;">
                              <i class="fa-solid fa-computer"></i>
                              </div>
                              <div class="social_cont">
                              <ul>
                                 <li>
                                 <span><strong>IT</strong></span>
                                 </li>
                              </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-1 col-lg-1">
                           <div class="full socile_icons im_f1-mim margin_bottom_30" >
                              <div class="social_icon" style="background-color:#FF5722;">
                              <i class="fa-solid fa-receipt"></i>
                              </div>
                              <div class="social_cont">
                              <ul>
                                 <li>
                                 <span><strong>IM_F1-MIM</strong></span>
                                 </li>
                              </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-1 col-lg-1">
                           <div class="full socile_icons im_f2-pnj margin_bottom_30" >
                              <div class="social_icon" style="background-color:#FF5722;">
                              <i class="fa-solid fa-hammer"></i>
                              </div>
                              <div class="social_cont">
                              <ul>
                                 <li>
                                 <span><strong>IM_F2-PnJ</strong></span>
                                 </li>
                              </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-1 col-lg-1">
                           <div class="full socile_icons im_f2-pim margin_bottom_30" >
                              <div class="social_icon" style="background-color:#FF5722;">
                              <i class="fa-solid fa-gears"></i>
                              </div>
                              <div class="social_cont">
                              <ul>
                                 <li>
                                 <span><strong>IM_F2-PIM</strong></span>
                                 </li>
                              </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-1 col-lg-1">
                           <div class="full socile_icons im_f2-pim margin_bottom_30" >
                              <div class="social_icon" style="background-color:#FF5722;">
                              <i class="fa-solid fa-gears"></i>
                              </div>
                              <div class="social_cont">
                              <ul>
                                 <li>
                                 <span><strong>IM_F2-PIM</strong></span>
                                 </li>
                              </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-1 col-lg-1">
                           <div class="full socile_icons im_f3-ctrg margin_bottom_30" >
                              <div class="social_icon" style="background-color:#FF5722;">
                              <i class="fa-solid fa-box-archive"></i>
                              </div>
                              <div class="social_cont">
                              <ul>
                                 <li>
                                 <span><strong>IM_F3-CTRG</strong></span>
                                 </li>
                              </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-1 col-lg-1">
                           <div class="full socile_icons im_f3-pim margin_bottom_30" >
                              <div class="social_icon" style="background-color:#FF5722;">
                              <i class="fa-solid fa-layer-group"></i>
                              </div>
                              <div class="social_cont">
                              <ul>
                                 <li>
                                 <span><strong>IM_F3-PIM</strong></span>
                                 </li>
                              </ul>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-1 col-lg-1">
                           <div class="full socile_icons im_f3-mim margin_bottom_30" >
                              <div class="social_icon" style="background-color:#FF5722;">
                              <i class="fa-brands fa-codepen"></i>
                              </div>
                              <div class="social_cont">
                              <ul>
                                 <li>
                                 <span><strong>IM_F3-MIM</strong></span>
                                 </li>
                              </ul>
                              </div>
                           </div>
                        </div>
                     </div>

       
              
                                 

  <div class="row">
      <div class="col-md-6 col-lg-6">

      <div class="form-group">
               <label for="input1">Section</label>
               <input type="text" class="form-control" id="input1" placeholder="<?php echo $section;?> Section" readonly>
            </div>


            
         <div class="form-group">

            <label for="select2">Cost Center </label>

            <?php

            // Perform the SQL query to fetch the options
            $query = "SELECT cost_center FROM tbl_costcenter WHERE section = '$section' ";
            $result = pg_query($query);

            // Check for errors in the query
            if (!$result) {
              echo "An error occurred.\n";
              exit;
            }

            // Generate the HTML for the select options
            $options_html = '';
            while ($row = pg_fetch_assoc($result)) {
              $options_html .= "<option value='{$row['cost_center']}'>{$row['cost_center']}</option>";
            }


            ?>
            <select class="form-control" id="select4">
            <option value="">Select Cost Center</option>
            <?php echo $options_html; ?>
            </select>
          </div>

          <div class="form-group">
    <label for="input_applicationdatefrom">Application Date From</label>
    <input type="date" class="form-control" id="input_applicationdatefrom" placeholder="Input Application Date From">
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

            <div class="form-group">
          <label for="input_applicationdateto">Application Date To</label>
          <input type="date" class="form-control" id="input_applicationdateto" placeholder="Input Application Date To">
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

              
        <table id="example24" class="display bordered-table" style="width:100%;  display: block;">
        <thead>
            
            <tr>
            <th style="text-align: center;">Select</th>
            <th style="text-align: center;">Application Date</th>
            <th style="text-align: center;">Transaction Number</th>
            <th style="text-align: center;">Item Code</th>
            <th style="text-align: center;">Item Name</th>
            <th style="text-align: center;">Specification</th>
            <th style="text-align: center;">UOM</th>
            <th style="text-align: center;">Unit Cost</th>
            <th style="text-align: center;">Currency</th>
            <th style="text-align: center;">Approved Quantity</th>
            <th style="text-align: center;">Overall Total Cost (USD)</th>
            <th style="text-align: center;">Requestor Name</th>
            <th style="text-align: center;">Cost Center</th>
            <th style="text-align: center;">Request Status</th>
            <th style="text-align: center;">Available Stock Quantity</th>
             
            </tr>
        </thead>
        <tbody>
        <?php
               $selectcommon = "SELECT * FROM tbl_mim_itemrequest_approval";
               $stmt3 = pg_query($conn,$selectcommon);
                         

            while ($row = pg_fetch_assoc($stmt3)) {
               $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
               $item_code = $row['item_code']; // Assuming column names in PostgreSQL are in lowercase
               $item_name = $row['item_name'];
               $specification = $row['specification'];
               $uom = $row['uom'];
               $unitcost = $row['unit_cost'];
               $currency = $row['currency'];
               $approvedqty = $row['approved_qty'];
               $costcenter = $row['cost_center'];

               $stock = $row['stock'];
               $transactionnumber = $row['transaction_number'];
               $requestorname = $row['requestor_name'];
               $requestdate = $row['request_date'];
               $requeststatus = $row['request_status'];
               // Check if $stock is null and set it to 0

               
                // Calculate overall_total_cost_approved_qty
                $overall_total_cost_approved_qty = $approvedqty * $unitcost;
              


                echo '<tr>
                <td style="width: 15px;">
                    <i class="fa fa-pencil-square-o checkbox-icon" id="icon-' . $id2 . '"></i>
                    <input type="hidden" name="selected[]" class="single-checkbox" id="selected-' . $id2 . '" value="' . $item_code . '">
                    <i class="fa fa-trash checkbox-icon2" id="icon-' . $id2 . '"></i>
                    <input type="hidden" name="selected[]" class="single-checkbox3" id="selected-' . $id2 . '" value="' . $item_code . '">
                </td>
                <td style="font-size: 12px; text-align: center;">' . $row['request_date'] . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['transaction_number'] . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['item_code'] . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['item_name'] . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['specification'] . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['uom'] . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['unit_cost'] . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['currency'] . '</td>
                <td style="font-size: 12px; text-align: center; background-color: #EEFAE1;">' . $row['approved_qty'] . '</td>
                <td style="font-size: 12px; text-align: center; background-color: #FCE1D4;">' . $overall_total_cost_approved_qty . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['requestor_name'] . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['cost_center'] . '</td>
                <td style="font-size: 12px; text-align: center; background-color: yellow;' . (($row['request_status'] == 'For Item Out') ? 'color: red; animation: blinker 1s linear infinite;' : (($row['request_status'] == 'For Budget Controller') ? 'color: blue;' : '')) . '">';
        
        if ($row['request_status'] == 'For Item Out') {
          echo '<i class="fa-brands fa-dropbox"></i> For Item Out';
        } else {
            echo $row['request_status'];
        }
        
        echo '</td>
                <td style="font-size: 12px; text-align: center;">' . ($row['stock'] === null ? 0 : $row['stock']) . '</td>
            </tr>';
        
                              

                              }

              
              ?>
        </tbody>
       
    </table>



<br>



             



              <div class="row">

              
                <div class="col-12" style="display:flex; justify-content:right; align-items:left;">

                <!-- <button type="button" class="button-cus1" role="button" style="justify-content: left; position: relative;" onclick="return confirm_approved()">
                  <i class="fa fa-check-circle" style="color:black;"></i> 
                 APPROVE
                  <span class="badge" id="badgeValue">0</span> 
                  </button>

                  <button type="button" class="button-cus3" role="button" style="justify-content: left; position: relative; margin-left: 5px;" onclick="return confirm_declined()">
                  <i class="fa fa-times-circle" style="color:black;"></i> 
                 DECLINE
                  <span class="badge" id="badgeValue2">0</span>
                  </button>
 -->

              <!-- <button type="button" class="btn btn-primary" style = "justify-content:left; margin-left: 5px;">Save</button> -->
                </div>
              </div>

              </form>
  
                     </div>

     
                     </div>


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
    document.addEventListener('DOMContentLoaded', function() {
        // // Show loading GIF
        // $('#loading').show();

        // Initialize DataTable
        let table = new DataTable('#example24', {
            initComplete: function () {
                // // Hide loading GIF
                // $('#loading').hide();

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

                // Add listener for application number input field
                document.getElementById('input_itemcode').addEventListener('input', function () {
                    table.column(5).search(this.value).draw();
                });

                // Add listener for requestor input field
                document.getElementById('input_itemname').addEventListener('input', function () {
                    table.column(6).search(this.value).draw();
                });


                // Add listener for application date range
              document.getElementById('input_applicationdatefrom').addEventListener('change', function () {
                  var fromDate = this.value;
                  var toDate = document.getElementById('input_applicationdateto').value;
                  table.column(3).search(fromDate + '|' + toDate, true, false).draw();
              });

              document.getElementById('input_applicationdateto').addEventListener('change', function () {
                  var fromDate = document.getElementById('input_applicationdatefrom').value;
                  var toDate = this.value;
                  table.column(3).search(fromDate + '|' + toDate, true, false).draw();
              });
                            
                
            },
            columnDefs: [
                { orderable: false, targets: [3,4,5,6,7,8,9,10,11,12,13,14] }
            ]
        });
    });
</script>



  
<script>
          function confirm_approved() {
  var inputElems = document.getElementsByTagName("input"),
      count = 0;

  for (var i = 0; i < inputElems.length; i++) {
    if (inputElems[i].type == "checkbox" && inputElems[i].checked == true) {
      count++;
    }
  }

  var checkboxes = document.getElementsByClassName('single-checkbox');
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
      title: 'Are you sure you want to approved  the selected items?',
      html: 'Item Code: <br>' + (vals.length > 0 ? vals.join('<br>') : ''),
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, add it!'
    }).then((result) => {
      if (result.isConfirmed) {
        //document.getElementById("myForm").submit();
        window.location.href = 'sqlupdates.php?action=cart&selectedItemId=' + vals.join(',');
      }
    });
  }
}
    
               
              
</script>



<script>
function confirm_submit() {
  var checkboxes = document.querySelectorAll('.single-checkbox3');
  var vals = [];

  checkboxes.forEach(function(checkbox) {
    checkbox.checked = true; // Select all checkboxes
    vals.push(checkbox.value); // Push the value into the array
  });

  if (vals.length <= 0) {
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
      title: 'Are you sure you want to submit the selected items for Approval?',
      html: 'Item Code: <br>' + (vals.length > 0 ? vals.join('<br>') : ''),
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, add it!'
    }).then((result) => {
      if (result.isConfirmed) {
        // window.location.href = 'sqlupdates.php?action=approval&selectedItemId=' + vals.join(',');
      }
    });
  }
}
</script>



<script>
          function confirm_declined() {
  var inputElems = document.getElementsByTagName("input"),
      count = 0;

  for (var i = 0; i < inputElems.length; i++) {
    if (inputElems[i].type == "checkbox" && inputElems[i].checked == true) {
      count++;
    }
  }

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
      title: 'Are you sure you want to declined the selected items?',
      html: 'Item Code: <br>' + (vals.length > 0 ? vals.join('<br>') : ''),
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
      if (result.isConfirmed) {
        //document.getElementById("myForm").submit();
        // window.location.href = 'sqlupdates.php?action=cartremove&selectedItemId=' + vals.join(',');
      }
    });
  }
}
    
               
              
</script>


<!-- JavaScript -->
<script>
  // jQuery
  $(document).ready(function() {
    $('.checkbox-icon').click(function() {
      // Toggle the checked state of the hidden checkbox
      var checkbox = $(this).next('.single-checkbox');
      checkbox.prop('checked', !checkbox.prop('checked'));

      // Change icon color to green if checkbox is checked, else revert to default
      if (checkbox.prop('checked')) {
        $(this).css('color', '#57FF22');
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



<!-- JavaScript -->
<script>
  // jQuery
  $(document).ready(function() {
    $('.checkbox-icon2').click(function() {
      // Toggle the checked state of the hidden checkbox
      var checkbox = $(this).next('.single-checkbox3');
      checkbox.prop('checked', !checkbox.prop('checked'));

      // Change icon color to green if checkbox is checked, else revert to default
      if (checkbox.prop('checked')) {
        $(this).css('color', '#FF5722');//red
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

// Select the trash icon elements
var trashIcons = document.querySelectorAll('.fa-trash');

// Add event listener to each trash icon
trashIcons.forEach(function(icon) {
    icon.addEventListener('click', function() {
        // Get the associated item code
        var itemId = this.getAttribute('id').replace('icon-trash-', '');

        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this item!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with deletion
                // Assuming you have a function to handle the deletion
                deleteItem(itemId); // Call your function to delete the item
            } else {
                // Revert color to normal
                // Assuming you want to revert the color of the icon to its original color
                icon.style.color = ''; // Revert to default color
            }
        });
    });
});

// Function to handle item deletion
function deleteItem(itemId) {
    // Assuming you have an AJAX request to delete the item
    // You can perform the necessary action here
    console.log("Item with ID " + itemId + " deleted!");
}


</script>

<script>


// Select the edit icon elements
var editIcons = document.querySelectorAll('.fa-pencil-square-o');

// Add event listener to each edit icon
editIcons.forEach(function(icon) {
    icon.addEventListener('click', function() {
        // Get the associated item code
        var itemId = this.getAttribute('id').replace('icon-', '');

        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: "Are you sure you want to edit?",
            text: "You are about to edit this item.",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, edit it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.isConfirmed) {
                // Proceed with edit
                // Assuming you have a function to handle the edit
                editItem(itemId); // Call your function to edit the item
            } else {
                // Revert color to normal
                // Assuming you want to revert the color of the icon to its original color
                icon.style.color = ''; // Revert to default color
            }
        });
    });
});

// Function to handle item edit
function editItem(itemId) {
    // Assuming you have an AJAX request to edit the item
    // You can perform the necessary action here
    console.log("Item with ID " + itemId + " edited!");
}



</script>