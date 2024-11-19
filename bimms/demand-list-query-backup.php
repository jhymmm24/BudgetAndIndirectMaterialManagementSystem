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
    <!-- <link rel="stylesheet" href="css/colors.css" /> -->
    <!-- select bootstrap -->
    <link rel="stylesheet" href="css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/custom.css" />

    <!-- Font Awesome -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script> <!-- Only one jQuery version -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    

  
    <!-- DataTables CSS -->
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.3/css/buttons.dataTables.min.css">
<!-- Buttons CSS -->
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.4.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.3/js/buttons.html5.min.js"></script>
<!-- DataTables Buttons CSS -->

<!-- DataTables JS -->
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
               <div id="loading">
                  <div class="loading-container">
                      <div class="container">
                          <div class="cube">
                              <div class="sides">
                                  <div class="top"></div>
                                  <div class="right"></div>
                                  <div class="bottom"></div>
                                  <div class="left"></div>
                                  <div class="front"></div>
                                  <div class="back"></div>
                              </div>
                          </div>
                          <div class="text">LOADING DATA...</div>
                      </div>
                  </div>
            


        </div>

        <script>

$('#loading').show();
        </script>
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Demand List Query</h2>
 
                           </div>
                        </div>
                     </div>
                  
                     <!-- <div class="row column1 social_media_section">
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
                     </div> -->

       
              
                                 

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
<!--              
          <img src="bimms/images/logo/loadinggif.gif" alt="Loading..."> -->
        </div>
       

              
              <table id="example24" class="display" >
        <thead>
            
            <tr>
            <th style="text-align: center;">Select</th>
            <th style="text-align: center;">Transaction Number</th>
            <th style="text-align: center;">Requestor Name</th>
            <th style="text-align: center;">Application Date</th>
            <th style="text-align: center;">Request Status</th>
            
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Available Stock Quantity</th>
                <th style="text-align: center;">Request Quantity</th>
             
            </tr>
        </thead>
        <tbody>
        <?php
               $selectcommon = "SELECT * FROM tbl_mim_approval";
               $stmt3 = pg_query($conn,$selectcommon);
                         

            while ($row = pg_fetch_assoc($stmt3)) {
               $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
               $item_code = $row['item_code']; // Assuming column names in PostgreSQL are in lowercase
               $item_name = $row['item_name'];
               $specification = $row['specification'];
               $uom = $row['uom'];
               $stock = $row['stock'];
               $transactionnumber = $row['transaction_number'];
               $requestorname = $row['requestor_name'];
               $requestdate = $row['request_date'];
               $requeststatus = $row['request_status'];
               $totaldemand = $row['total_demand_quantity'];
               // Check if $stock is null and set it to 0
              

               echo '<tr>';
               echo '<td style="width: 15px;">';

                // Conditionally show edit button only if the status is "For Budget Controller"

    if ($requeststatus === 'For Budget Controller') {
      echo '<i class="fa fa-pencil-square-o checkbox-icon" id="icon-' . htmlspecialchars($item_code) . '" data-transaction-number="' . htmlspecialchars($transactionnumber) . '"></i>';
      echo '<input type="hidden" name="selected[]" class="single-checkbox" id="selected-' . htmlspecialchars($item_code) . '" value="' . htmlspecialchars($item_code) . '">';
  }

               echo '<i class="fa fa-trash checkbox-icon2" id="icon-' . htmlspecialchars($item_code) . '" data-transaction-number="' . htmlspecialchars($transactionnumber) . '"></i>';
               echo '<input type="hidden" name="selected[]" class="single-checkbox3" id="selected-' . htmlspecialchars($item_code) . '" value="' . htmlspecialchars($item_code) . '">';
               echo '</td>';

               echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($row['transaction_number']) . '</td>';
               echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($row['request_date']) . '</td>';
               echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($row['requestor_name']) . '</td>';
               echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($row['request_status']) . '</td>';
               echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($row['item_code']) . '</td>';
               echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($row['item_name']) . '</td>';
               echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($row['specification']) . '</td>';
               echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($row['uom']) . '</td>';
               echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($row['stock'] === null ? 0 : $row['stock']) . '</td>';
               echo '<td style="font-size: 12px; text-align: center;">' . htmlspecialchars($row['total_demand_quantity']) . '</td>';
               echo '</tr>';


                              }

              
              ?>
        </tbody>
       
    </table>



<br>

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"  >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editItemModalLabel">Edit Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="overflow: auto;">
                <table class="table table-bordered table-responsive" id="itemTable">
                    <thead>
                        <tr>
                            <th>Item Code</th>
                            <th style="width: 150px;">Item Name</th>
                            <th>Specification</th>
                            <th>UOM</th>
                            <th>Stock</th>
                            <th>Total Request Quantity</th>
                            <th>January</th>
                            <th>February</th>
                            <th>March</th>
                            <th>April</th>
                            <th>May</th>
                            <th>June</th>
                            <th>July</th>
                            <th>August</th>
                            <th>September</th>
                            <th>October</th>
                            <th>November</th>
                            <th>December</th>
                        </tr>
                    </thead>
                    <tbody id="modalItemDetails">
                        <!-- Details will be populated here via JavaScript -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="saveChangesButton">Save Changes</button>
        </div>
        </div>
    </div>
</div>


             



              <div class="row">

              
                <div class="col-12" style="display:flex; justify-content:right; align-items:left;">

             
                </div>
              </div>

              </form>
  
                     </div>

     
                     </div>



                     <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show loading GIF
            $('#loading').show();

            // Initialize DataTable with buttons
            let table = new DataTable('#example24', {
                dom: 'Bfrtip', // Add buttons to the DataTable
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        text: 'Export PDF',
                        title: 'My DataTable Export',
                        customize: function (doc) {
                            // Customize the PDF layout
                            doc.pageMargins = [40, 60, 40, 60]; // Margins: [left, top, right, bottom]
                            doc.pageSize = 'A4'; // Page size (A4, letter, etc.)
                            doc.content[0].layout = 'lightHorizontalLines'; // Table layout style
                            doc.content[0].table.widths = '*'; // Auto width for columns
                            doc.content[0].table.heights = function (row) { return 20; }; // Row height
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Export Excel',
                        title: 'My DataTable Export'
                    },
                    {
                        extend: 'csvHtml5',
                        text: 'Export CSV',
                        title: 'My DataTable Export'
                    },
                    {
                        extend: 'print',
                        text: 'Print Table'
                    }
                ],
                initComplete: function () {
                    // Hide loading GIF once the table is initialized
                    $('#loading').hide();

                    // Setup column filtering
                    this.api().columns([]).every(function (index) {
                        let column = this;

                        // Create a select element for each column for filtering
                        let select = document.createElement('select');
                        select.add(new Option('')); // Default empty option
                        column.header().replaceChildren(select); // Replace header content with the select

                        // Listen for changes and filter the column
                        select.addEventListener('change', function () {
                            var val = DataTable.util.escapeRegex(select.value);
                            column.search(val ? '^' + val + '$' : '', true, false).draw();
                        });
                    });

                    // Filter by item code
                    document.getElementById('input_itemcode').addEventListener('input', function () {
                        table.column(5).search(this.value).draw();
                    });

                    // Filter by item name
                    document.getElementById('input_itemname').addEventListener('input', function () {
                        table.column(6).search(this.value).draw();
                    });

                    // Date range filtering for application dates
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

                // Make specific columns non-orderable
                columnDefs: [
                    { orderable: false, targets: [] }
                ]
            });
        });
    </script>


 <br>
 
 
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    // jQuery noConflict
    var $jq = jQuery.noConflict();

    document.addEventListener('DOMContentLoaded', function() {
        // Function to open the modal and load item details
        function editItem(itemCode, transactionNumber) {
            $jq.ajax({
                url: 'fetch_item_details.php',
                type: 'GET',
                data: { item_code: itemCode, transaction_number: transactionNumber },
                dataType: 'json',
                success: function(data) {
                    try {
                        if (data.error) {
                            Swal.fire('Error', data.error, 'error');
                        } else {
                            // Update the modal with fetched item details
                            $jq('#modalItemDetails').html(`
                                <tr>
                                    <td>${data.item_code}</td>
                                    <td>${data.item_name}</td>
                                    <td>${data.specification}</td>
                                    <td>${data.uom}</td>
                                    <td>${data.stock}</td>
                                    <td>${data.total_demand_quantity}</td>
                                    <td data-editable="true" data-column="january">${data.january}</td>
                                    <td data-editable="true" data-column="february">${data.february}</td>
                                    <td data-editable="true" data-column="march">${data.march}</td>
                                    <td data-editable="true" data-column="april">${data.april}</td>
                                    <td data-editable="true" data-column="may">${data.may}</td>
                                    <td data-editable="true" data-column="june">${data.june}</td>
                                    <td data-editable="true" data-column="july">${data.july}</td>
                                    <td data-editable="true" data-column="august">${data.august}</td>
                                    <td data-editable="true" data-column="september">${data.september}</td>
                                    <td data-editable="true" data-column="october">${data.october}</td>
                                    <td data-editable="true" data-column="november">${data.november}</td>
                                    <td data-editable="true" data-column="december">${data.december}</td>
                                </tr>
                            `);
                            $jq('#modalItemDetails').data('item-code', itemCode);
                            $jq('#modalItemDetails').data('transaction-number', transactionNumber); // Store transaction number
                            $jq('#editItemModal').modal('show');
                        }
                    } catch (e) {
                        console.error('Error handling response:', e, data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching item details:', xhr.responseText);
                }
            });
        }

        // Function to handle double-click on table cells
        function handleDoubleClick(event) {
            const cell = event.target;
            const originalText = cell.innerText;

            if (cell.tagName === 'TD' && cell.dataset.editable === 'true') {
                const input = document.createElement('input');
                input.type = 'text';
                input.value = originalText;
                input.style.width = '100%';

                cell.innerHTML = '';
                cell.appendChild(input);
                input.focus();

                input.addEventListener('blur', function() {
                    const newValue = input.value;
                    cell.innerText = newValue;

                    const columnName = cell.getAttribute('data-column');
                    const itemCode = $jq('#modalItemDetails').data('item-code');
                    const transactionNumber = $jq('#modalItemDetails').data('transaction-number');

                    console.log('Sending AJAX request:', { item_code: itemCode, transaction_number: transactionNumber, column: columnName, value: newValue });

                    $jq.ajax({
                        url: 'update_item_detail.php',
                        type: 'POST',
                        data: {
                            item_code: itemCode,
                            transaction_number: transactionNumber,
                            column: columnName,
                            value: newValue
                        },
                        success: function(response) {
                            try {
                                const result = typeof response === 'string' ? JSON.parse(response) : response;
                                if (result.success) {
                                    Swal.fire('Success', result.success, 'success');
                                } else if (result.error) {
                                    Swal.fire('Error', result.error, 'error');
                                }
                            } catch (e) {
                                console.error('Failed to parse JSON response:', e);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error updating item detail:', xhr.responseText);
                        }
                    });
                });
            }
        }

        // Add event listener to the table
        $jq('#itemTable').on('dblclick', 'td', handleDoubleClick);

        // Event listener for Save Changes button
        $jq('#saveChangesButton').on('click', function() {
            const itemCode = $jq('#modalItemDetails').data('item-code');
            const rows = $jq('#modalItemDetails').find('tr');
            const transactionNumber = $jq('#modalItemDetails').data('transaction-number');

            rows.each(function() {
                const cells = $jq(this).find('td');
                cells.each(function() {
                    const columnName = $jq(this).data('column');
                    const newValue = $jq(this).text();

                    if (columnName && newValue) {
                        $jq.ajax({
                            url: 'update_item_detail.php',
                            type: 'POST',
                            data: {
                                item_code: itemCode,
                                transaction_number: transactionNumber,
                                column: columnName,
                                value: newValue
                            },
                            success: function(response) {
                                console.log('Update successful for column:', columnName);
                            },
                            error: function(xhr, status, error) {
                                console.error('Error updating item detail for column:', columnName, xhr.responseText);
                            }
                        });
                    }
                });
            });

            Swal.fire('Success', 'Item details have been updated.', 'success');
        });

        // Add event listener for edit icons
        var editIcons = document.querySelectorAll('.fa-pencil-square-o');
        editIcons.forEach(function(icon) {
            icon.addEventListener('click', function() {
                var itemCode = this.getAttribute('id').replace('icon-', '');
                var transactionNumber = this.getAttribute('data-transaction-number');
                Swal.fire({
                    title: `Are you sure you want to edit, ${itemCode}?`,
                    text: "You are about to edit this item.",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, edit it!",
                    cancelButtonText: "No, cancel!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        editItem(itemCode, transactionNumber);
                    } else if (result.isDismissed) {
                        console.log('Cancel clicked, unchecking checkboxes...');
                        var checkboxes = document.querySelectorAll('input.single-checkbox:checked');
                        console.log('Checkboxes to uncheck:', checkboxes.length);
                        document.querySelectorAll('.checkbox-icon').forEach(function(icon) {
                            icon.style.color = '#898989';
                        });
                        console.log('All checkboxes have been unchecked.');
                    }
                });
            });
        });
    });
</script>


                  
                     
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

   </body>
</html>





<!-- JavaScript -->
<!-- <script>
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
</script> -->



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
        var itemCode = this.getAttribute('id').replace('icon-', ''); // Get the item code
        var transactionNumber = this.getAttribute('data-transaction-number'); // Get the transaction number

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
                deleteItem(itemCode, transactionNumber); // Pass both itemCode and transactionNumber
            } else {
                // Revert color to normal
                // Assuming you want to revert the color of the icon to its original color
                icon.style.color = ''; // Revert to default color
            }
        });
    });
});

// Function to handle item deletion
// Function to handle item deletion using AJAX
// Function to handle item deletion using AJAX
// Function to handle item deletion using AJAX
function deleteItem(itemCode, transactionNumber) {
    // Perform an AJAX request to the server to delete the item
    fetch('delete_item.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ itemCode: itemCode, transactionNumber: transactionNumber }) // Send both itemCode and transactionNumber
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Notify success
            Swal.fire("Deleted!", "Item has been deleted.", "success")
            .then(() => {
                // Reload the page after the SweetAlert is confirmed
                location.reload();
            });
        } else {
            // Notify failure
            Swal.fire("Error", "An error occurred while deleting the item.", "error");
        }
    })
    .catch(error => {
        console.error("Error:", error);
        Swal.fire("Error", "An error occurred while deleting the item.", "error");
    });
}


</script>

