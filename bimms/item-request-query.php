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
  

  <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<!-- JSZip for Excel export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.2.2/jszip.min.js"></script>
<!-- PDFMake for PDF export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
<!-- DataTables Buttons HTML5 export JS -->
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<!-- DataTables Buttons Print JS -->
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>



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

                
            @import url("https://fonts.googleapis.com/css?family=Roboto:700");
            body {
              font-family: "Roboto", sans-serif;
              background-color: #A295F3;
            }

            .container {
              display: flex;
              justify-content: center;
              align-items: center;
              flex-direction: row;
              margin: 0 auto;
              width: 50%;
              margin-top:200px;
            }

            @-webkit-keyframes rotate {
              0% {
                transform: rotateX(-37.5deg) rotateY(45deg);
              }
              50% {
                transform: rotateX(-37.5deg) rotateY(405deg);
              }
              100% {
                transform: rotateX(-37.5deg) rotateY(405deg);
              }
            }

            @keyframes rotate {
              0% {
                transform: rotateX(-37.5deg) rotateY(45deg);
              }
              50% {
                transform: rotateX(-37.5deg) rotateY(405deg);
              }
              100% {
                transform: rotateX(-37.5deg) rotateY(405deg);
              }
            }
            .cube, .cube * {
              position: absolute;
              width: 151px;
              height: 151px;
            }

            .sides {
              -webkit-animation: rotate 3s ease infinite;
                      animation: rotate 3s ease infinite;
              -webkit-animation-delay: 0.8s;
                      animation-delay: 0.8s;
              transform-style: preserve-3d;
              transform: rotateX(-37.5deg) rotateY(45deg);
            }

            .cube .sides * {
              box-sizing: border-box;
              background-color: rgba(162, 149, 243, 0.5);
              border: 15px solid white;
            }

            .cube .sides .top {
              -webkit-animation: top-animation 3s ease infinite;
                      animation: top-animation 3s ease infinite;
              -webkit-animation-delay: 0ms;
                      animation-delay: 0ms;
              transform: rotateX(90deg) translateZ(150px);
              -webkit-animation-fill-mode: forwards;
                      animation-fill-mode: forwards;
              transform-origin: 50% 50%;
            }
            @-webkit-keyframes top-animation {
              0% {
                opacity: 1;
                transform: rotateX(90deg) translateZ(150px);
              }
              20% {
                opacity: 1;
                transform: rotateX(90deg) translateZ(75px);
              }
              70% {
                opacity: 1;
                transform: rotateX(90deg) translateZ(75px);
              }
              90% {
                opacity: 1;
                transform: rotateX(90deg) translateZ(150px);
              }
              100% {
                opacity: 1;
                transform: rotateX(90deg) translateZ(150px);
              }
            }
            @keyframes top-animation {
              0% {
                opacity: 1;
                transform: rotateX(90deg) translateZ(150px);
              }
              20% {
                opacity: 1;
                transform: rotateX(90deg) translateZ(75px);
              }
              70% {
                opacity: 1;
                transform: rotateX(90deg) translateZ(75px);
              }
              90% {
                opacity: 1;
                transform: rotateX(90deg) translateZ(150px);
              }
              100% {
                opacity: 1;
                transform: rotateX(90deg) translateZ(150px);
              }
            }
            .cube .sides .bottom {
              -webkit-animation: bottom-animation 3s ease infinite;
                      animation: bottom-animation 3s ease infinite;
              -webkit-animation-delay: 0ms;
                      animation-delay: 0ms;
              transform: rotateX(-90deg) translateZ(150px);
              -webkit-animation-fill-mode: forwards;
                      animation-fill-mode: forwards;
              transform-origin: 50% 50%;
            }
            @-webkit-keyframes bottom-animation {
              0% {
                opacity: 1;
                transform: rotateX(-90deg) translateZ(150px);
              }
              20% {
                opacity: 1;
                transform: rotateX(-90deg) translateZ(75px);
              }
              70% {
                opacity: 1;
                transform: rotateX(-90deg) translateZ(75px);
              }
              90% {
                opacity: 1;
                transform: rotateX(-90deg) translateZ(150px);
              }
              100% {
                opacity: 1;
                transform: rotateX(-90deg) translateZ(150px);
              }
            }
            @keyframes bottom-animation {
              0% {
                opacity: 1;
                transform: rotateX(-90deg) translateZ(150px);
              }
              20% {
                opacity: 1;
                transform: rotateX(-90deg) translateZ(75px);
              }
              70% {
                opacity: 1;
                transform: rotateX(-90deg) translateZ(75px);
              }
              90% {
                opacity: 1;
                transform: rotateX(-90deg) translateZ(150px);
              }
              100% {
                opacity: 1;
                transform: rotateX(-90deg) translateZ(150px);
              }
            }
            .cube .sides .front {
              -webkit-animation: front-animation 3s ease infinite;
                      animation: front-animation 3s ease infinite;
              -webkit-animation-delay: 100ms;
                      animation-delay: 100ms;
              transform: rotateY(0deg) translateZ(150px);
              -webkit-animation-fill-mode: forwards;
                      animation-fill-mode: forwards;
              transform-origin: 50% 50%;
            }
            @-webkit-keyframes front-animation {
              0% {
                opacity: 1;
                transform: rotateY(0deg) translateZ(150px);
              }
              20% {
                opacity: 1;
                transform: rotateY(0deg) translateZ(75px);
              }
              70% {
                opacity: 1;
                transform: rotateY(0deg) translateZ(75px);
              }
              90% {
                opacity: 1;
                transform: rotateY(0deg) translateZ(150px);
              }
              100% {
                opacity: 1;
                transform: rotateY(0deg) translateZ(150px);
              }
            }
            @keyframes front-animation {
              0% {
                opacity: 1;
                transform: rotateY(0deg) translateZ(150px);
              }
              20% {
                opacity: 1;
                transform: rotateY(0deg) translateZ(75px);
              }
              70% {
                opacity: 1;
                transform: rotateY(0deg) translateZ(75px);
              }
              90% {
                opacity: 1;
                transform: rotateY(0deg) translateZ(150px);
              }
              100% {
                opacity: 1;
                transform: rotateY(0deg) translateZ(150px);
              }
            }
            .cube .sides .back {
              -webkit-animation: back-animation 3s ease infinite;
                      animation: back-animation 3s ease infinite;
              -webkit-animation-delay: 100ms;
                      animation-delay: 100ms;
              transform: rotateY(-180deg) translateZ(150px);
              -webkit-animation-fill-mode: forwards;
                      animation-fill-mode: forwards;
              transform-origin: 50% 50%;
            }
            @-webkit-keyframes back-animation {
              0% {
                opacity: 1;
                transform: rotateY(-180deg) translateZ(150px);
              }
              20% {
                opacity: 1;
                transform: rotateY(-180deg) translateZ(75px);
              }
              70% {
                opacity: 1;
                transform: rotateY(-180deg) translateZ(75px);
              }
              90% {
                opacity: 1;
                transform: rotateY(-180deg) translateZ(150px);
              }
              100% {
                opacity: 1;
                transform: rotateY(-180deg) translateZ(150px);
              }
            }
            @keyframes back-animation {
              0% {
                opacity: 1;
                transform: rotateY(-180deg) translateZ(150px);
              }
              20% {
                opacity: 1;
                transform: rotateY(-180deg) translateZ(75px);
              }
              70% {
                opacity: 1;
                transform: rotateY(-180deg) translateZ(75px);
              }
              90% {
                opacity: 1;
                transform: rotateY(-180deg) translateZ(150px);
              }
              100% {
                opacity: 1;
                transform: rotateY(-180deg) translateZ(150px);
              }
            }
            .cube .sides .left {
              -webkit-animation: left-animation 3s ease infinite;
                      animation: left-animation 3s ease infinite;
              -webkit-animation-delay: 100ms;
                      animation-delay: 100ms;
              transform: rotateY(-90deg) translateZ(150px);
              -webkit-animation-fill-mode: forwards;
                      animation-fill-mode: forwards;
              transform-origin: 50% 50%;
            }
            @-webkit-keyframes left-animation {
              0% {
                opacity: 1;
                transform: rotateY(-90deg) translateZ(150px);
              }
              20% {
                opacity: 1;
                transform: rotateY(-90deg) translateZ(75px);
              }
              70% {
                opacity: 1;
                transform: rotateY(-90deg) translateZ(75px);
              }
              90% {
                opacity: 1;
                transform: rotateY(-90deg) translateZ(150px);
              }
              100% {
                opacity: 1;
                transform: rotateY(-90deg) translateZ(150px);
              }
            }
            @keyframes left-animation {
              0% {
                opacity: 1;
                transform: rotateY(-90deg) translateZ(150px);
              }
              20% {
                opacity: 1;
                transform: rotateY(-90deg) translateZ(75px);
              }
              70% {
                opacity: 1;
                transform: rotateY(-90deg) translateZ(75px);
              }
              90% {
                opacity: 1;
                transform: rotateY(-90deg) translateZ(150px);
              }
              100% {
                opacity: 1;
                transform: rotateY(-90deg) translateZ(150px);
              }
            }
            .cube .sides .right {
              -webkit-animation: right-animation 3s ease infinite;
                      animation: right-animation 3s ease infinite;
              -webkit-animation-delay: 100ms;
                      animation-delay: 100ms;
              transform: rotateY(90deg) translateZ(150px);
              -webkit-animation-fill-mode: forwards;
                      animation-fill-mode: forwards;
              transform-origin: 50% 50%;
            }
            @-webkit-keyframes right-animation {
              0% {
                opacity: 1;
                transform: rotateY(90deg) translateZ(150px);
              }
              20% {
                opacity: 1;
                transform: rotateY(90deg) translateZ(75px);
              }
              70% {
                opacity: 1;
                transform: rotateY(90deg) translateZ(75px);
              }
              90% {
                opacity: 1;
                transform: rotateY(90deg) translateZ(150px);
              }
              100% {
                opacity: 1;
                transform: rotateY(90deg) translateZ(150px);
              }
            }
            @keyframes right-animation {
              0% {
                opacity: 1;
                transform: rotateY(90deg) translateZ(150px);
              }
              20% {
                opacity: 1;
                transform: rotateY(90deg) translateZ(75px);
              }
              70% {
                opacity: 1;
                transform: rotateY(90deg) translateZ(75px);
              }
              90% {
                opacity: 1;
                transform: rotateY(90deg) translateZ(150px);
              }
              100% {
                opacity: 1;
                transform: rotateY(90deg) translateZ(150px);
              }
            }

            .text {
              margin-top: 450px;
              color: #A295F3;
              font-size: 1.5rem;
              width: 100%;
              font-weight: 600;
              text-align: center;
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
<!-- 
               <div id="loading">
          <img src="images/logo/loadinggif.gif" alt="Loading...">
        </div>

        <script>

$('#loading').show();
        </script> -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2 style="margin-top:20px;">Item Request Query</h2>
 
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
            
            <th style="text-align: center;">Total Demand Quantity</th>
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
        $selectcommon = "SELECT * FROM tbl_mim_itemrequest_approval ORDER BY transaction_number ASC";
        $stmt3 = pg_query($conn, $selectcommon);

        while ($row = pg_fetch_assoc($stmt3)) {
            $id2 = $row['id']; // Assuming 'id' is the primary key column
            $item_code = $row['item_code'];
            $item_name = $row['item_name'];
            $specification = $row['specification'];
            $uom = $row['uom'];
            $unitcost = isset($_POST['unit_cost']) && is_numeric($_POST['unit_cost']) ? (float)$_POST['unit_cost'] : (float)$row['unit_cost'];
            $currency = $row['currency'];
            $approvedqty = isset($_POST['approved_qty']) && is_numeric($_POST['approved_qty']) ? (float)$_POST['approved_qty'] : (float)$row['approved_qty'];
            $costcenter = $row['cost_center'];
            $stock = $row['stock'];
            $transactionnumber = $row['transaction_number'];
            $requestorname = $row['requestor_name'];
            $requestdate = $row['request_date'];
            $requeststatus = $row['request_status'];
            $total_demand_quantity = isset($_POST['total_demand_quantity']) && is_numeric($_POST['total_demand_quantity']) ? (float)$_POST['total_demand_quantity'] : (float)$row['total_demand_quantity'];






            // Calculate overall_total_cost_approved_qty
             // Calculate overall_total_cost_approved_qty
             $overall_total_cost_approved_qty = $approvedqty * $unitcost;
            echo '<tr>';
            echo '<td style="width: 15px;">';

            // Conditionally show edit button only if the status is "For Budget Controller"
            if ($requeststatus === 'For Budget Controller') {
              echo '<i class="fa fa-pencil-square-o checkbox-icon" id="icon-' . htmlspecialchars($item_code) . '" data-item-code="' . htmlspecialchars($item_code) . '" data-transaction-number="' . htmlspecialchars($transactionnumber) . '"></i>';
echo '<input type="hidden" name="selected[]" class="single-checkbox" id="selected-' . htmlspecialchars($item_code) . '" value="' . htmlspecialchars($item_code) . '">';

            }

            echo '<i class="fa fa-trash checkbox-icon2" id="icon-' . htmlspecialchars($item_code) . '" data-transaction-number="' . htmlspecialchars($transactionnumber) . '"></i>';
            echo '<input type="hidden" name="selected[]" class="single-checkbox3" id="selected-' . htmlspecialchars($item_code) . '" value="' . htmlspecialchars($item_code) . '">';
            echo '</td>';

            echo '</td>'; // Close the td for the edit button
            echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($requestdate) . '</td>';
            echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($transactionnumber) . '</td>';
            echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($item_code) . '</td>';
            echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($item_name) . '</td>';
            echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($specification) . '</td>';
            echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($uom) . '</td>';
            echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($unitcost) . '</td>';

            echo '<td style="font-size: 12px; text-align: center; background-color: #EEFAE1;">' . htmlspecialchars($total_demand_quantity) . '</td>';
            echo '<td style="font-size: 12px; text-align: center; background-color: #EEFAE1;">' . htmlspecialchars($approvedqty) . '</td>';
            echo '<td style="font-size: 12px; text-align: center; background-color: #EEFAE1;">' . $overall_total_cost_approved_qty . '</td>';
            echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($requestorname) . '</td>';
            echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($costcenter) . '</td>';

            // Inline styling for request_status
            $statusColor = '';
            if ($row['request_status'] === 'For Item Out') {
                $statusColor = 'color: red; animation: blinker 1s linear infinite;';
            } elseif ($row['request_status'] === 'For Budget Controller') {
                $statusColor = 'color: blue;';
            }

            echo '<td style="font-size: 12px; text-align: center; background-color: yellow; ' . $statusColor . '">';

            // Conditionally show status or icon
            if ($row['request_status'] === 'For Item Out') {
                echo '<i class="fa-brands fa-dropbox"></i> For Item Out';
            } else {
                echo htmlspecialchars($row['request_status']);
            }
            echo '</td>';

            // Stock check (set to 0 if null)
            echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($stock === null ? 0 : $stock) . '</td>';
   

            echo '</tr>';
        }
    ?>
</tbody>
       
    </table>


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsModalLabel">Item Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Modal body content will be populated with JavaScript -->
        <div id="modal-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        <button type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
    $('#detailsModal').on('shown.bs.modal', function (event) {
        var modal = $(this);
        
        // Handle the "Save" button click
        modal.find('.btn-primary').on('click', function() {
            var data = {
                transaction_number: $('#transaction_number').val(),
                item_code: $('#item_code').val(),
                item_name: $('#item_name').val(),
                specification: $('#specification').val(),
                uom: $('#uom').val(),
                unit_cost: $('#unit_cost').val(),
                currency: $('#currency').val(),
                total_demand_quantity: $('#total_demand_quantity').val(),
                approved_qty: $('#approved_qty').val(),
                cost_center: $('#cost_center').val(),
                stock: $('#stock').val(),
                requestor_name: $('#requestor_name').val(),
                request_date: $('#request_date').val(),
                request_status: $('#request_status').val()
            };

            console.log("Data being sent:", data); // Log data for debugging
            
            $.ajax({
                url: 'update_itemrequest_details.php', // Server-side script to handle the update
                type: 'POST',
                data: data,
                success: function(response) {
                    console.log("Server response:", response); // Log response for debugging
                    if (response.trim() === 'Success') {
                        alert('Item updated successfully');
                        location.reload(); // Reload the page
                    } else {
                        alert('Update failed: ' + response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error updating item:', status, error);
                }
            });
        });
    });
});




</script>



<br>



             




              </form>
  
                     </div>

     
                     </div>


 <br>
 
 


                  
                     
                 
                  <!-- footer -->
                  <?php
              include 'footer.php';
              
              ?>
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
     
        // Initialize DataTable
        let table = new DataTable('#example24', {
          dom: 'Bfrtip',
                buttons: [
                   'excel',  'print'
                ],
            initComplete: function () {
              

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
                { orderable: false, targets: [] }
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







<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include Bootstrap JavaScript (if using Bootstrap) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Add this HTML where you want the DataTable to appear -->
<table id="detailsTable" class="display" style="width:100%;">
    <thead>
        <tr>
            <th>Item Code</th>
            <th>Transaction Number</th>
            <th>Item Name</th>
            <th>Specification</th>
            <th>UOM</th>
            <th>Unit Cost</th>
            <th>Currency</th>
            <th>Approved Quantity</th>
            <th>Total Cost (USD)</th>
            <th>Requestor Name</th>
            <th>Cost Center</th>
            <th>Request Status</th>
            <th>Available Stock Quantity</th>
        </tr>
    </thead>
    <tbody id="detailsTableBody">
        <!-- Data will be inserted here by JavaScript -->
    </tbody>
</table>




<script>
// Function to fetch item details and show in modal
function fetchItemDetails(itemCode, transactionNumber) {
    if (!itemCode || !transactionNumber) {
        Swal.fire('Error', 'Item code or transaction number is missing.', 'error');
        return;
    }

    console.log("Fetching details for Item Code:", itemCode, "Transaction Number:", transactionNumber);

    $.ajax({
        url: 'fetch_itemrequest_details.php',
        type: 'POST',
        data: { item_code: itemCode, transaction_number: transactionNumber },
        dataType: 'json', // Expect JSON response
        success: function(response) {
            console.log(response); // Log response for debugging

            if (response.error) {
                Swal.fire('No Details', response.error, 'info');
            } else {
              $('#modal-content').html(`
     <table class="table table-bordered">
            <tr>
                <th>Transaction Number</th>
                <td><input type="text" id="transaction_number" value="${response.transaction_number}" readonly/></td>
            </tr>
            <tr>
                <th>Item Code</th>
                <td><input type="text" id="item_code" value="${response.item_code}" /></td>
            </tr>
            <tr>
                <th>Item Name</th>
                <td><input type="text" id="item_name" value="${response.item_name}" /></td>
            </tr>
            <tr>
                <th>Specification</th>
                <td><input type="text" id="specification" value="${response.specification}" /></td>
            </tr>
            <tr>
                <th>UOM</th>
                <td><input type="text" id="uom" value="${response.uom}" /></td>
            </tr>
            <tr>
                <th>Unit Cost</th>
                <td><input type="text" id="unit_cost" value="${response.unit_cost}" /></td>
            </tr>
            <tr>
                <th>Currency</th>
                <td><input type="text" id="currency" value="${response.currency}" /></td>
            </tr>
            <tr>
                <th>Total Demand Qty</th>
                <td><input type="text" id="total_demand_quantity" value="${response.total_demand_quantity}" /></td>
            </tr>
            <tr>
                <th>Approved Qty</th>
                <td><input type="text" id="approved_qty" value="${response.approved_qty}" /></td>
            </tr>
            <tr>
                <th>Cost Center</th>
                <td><input type="text" id="cost_center" value="${response.cost_center}" /></td>
            </tr>
            <tr>
                <th>Stock</th>
                <td><input type="text" id="stock" value="${response.stock}" /></td>
            </tr>
            <tr>
                <th>Requestor Name</th>
                <td><input type="text" id="requestor_name" value="${response.requestor_name}" /></td>
            </tr>
            <tr>
                <th>Request Date</th>
                <td><input type="text" id="request_date" value="${response.request_date}" /></td>
            </tr>
            <tr>
                <th>Request Status</th>
                <td><input type="text" id="request_status" value="${response.request_status}" /></td>
            </tr>
        </table>
`);

$('#detailsModal').modal('show'); // Show the modal
            }
        },
        error: function() {
            Swal.fire('Error', 'Unable to fetch item details.', 'error');
        }
    });
}

// Select the pencil icon elements
var pencilIcons = document.querySelectorAll('.fa-pencil-square-o');

// Add event listener to each pencil icon
pencilIcons.forEach(function(icon) {
    icon.addEventListener('click', function() {
        // Get the associated item code and transaction number from data attributes
        var itemCode = this.getAttribute('data-item-code');
        var transactionNumber = this.getAttribute('data-transaction-number');

        if (!itemCode || !transactionNumber) {
            Swal.fire('Error', 'Item code or transaction number is missing.', 'error');
            return;
        }

        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: 'Confirm Edit',
            text: 'Do you want to edit this item?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, edit it!',
            cancelButtonText: 'No, cancel!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Fetch the details for the selected item and show in modal
                fetchItemDetails(itemCode, transactionNumber);
            }
        });
    });
});

// Select the trash icon elements
var trashIcons = document.querySelectorAll('.fa-trash');

// Add event listener to each trash icon
trashIcons.forEach(function(icon) {
    icon.addEventListener('click', function() {
        // Get the associated item code from the ID
        var itemCode = this.getAttribute('id').replace('icon-', '');

        if (!itemCode) {
            Swal.fire('Error', 'Item code is missing.', 'error');
            return;
        }

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
                deleteItem(itemCode); // Call your function to delete the item
            }
        });
    });
});

// Function to handle item deletion
function deleteItem(itemCode) {
    $.ajax({
        url: 'delete_item.php',
        type: 'POST',
        data: { item_code: itemCode },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                Swal.fire('Deleted!', 'The item has been deleted.', 'success');
                // Optionally, you can refresh the table or remove the row from the table
            } else {
                Swal.fire('Error', 'Failed to delete the item.', 'error');
            }
        },
        error: function() {
            Swal.fire('Error', 'Unable to delete the item.', 'error');
        }
    });
}

</script>
