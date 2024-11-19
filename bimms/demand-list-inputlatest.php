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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>






      <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  

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




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>





      
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <style>



                .fixed-columns {
                    overflow-x: auto;
                }

                .fixed {
                    position: sticky;
                    left: 0;
                    background-color: white;
                    z-index: 1;
                }

                      
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



                                
                      
                .button-cus2{
                    display: inline-block;
                                outline: 0;
                                cursor: pointer;
                                border-radius: 6px;
                                border: 2px solid #982e2e;
                                color: BLACK;
                                background: 0 0;
                                padding: 8px;
                                box-shadow: rgba(0, 0, 0, 0.07) 0px 2px 4px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1.5px 0px;
                                font-weight: 800;
                                font-size: 16px;
                                height: 42px;
                                width: 200px;
                    }
                    .button-cus2:hover{
                                    background-color: #d6a6a6;
                                    color: BLACK;
                                }
                                

                                .button-cus3{
                    display: inline-block;
                                outline: 0;
                                cursor: pointer;
                                border-radius: 6px;
                                border: 2px solid #00A8DD;
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
                                    background-color: #AAE2F3;
                                    color: BLACK;
                                }

                              

                /* Hide the default checkbox */
                .single-checkbox2 {
                  display: none;
                }

                /* Style the checkbox icon */
                .checkbox-icon {
                  cursor: pointer;
                  color:white;
                
                }


                .checkbox-icon:hover {
                  color: #27A768;
                }

                .checkbox-icon {
                  font-size: 12px; /* Adjust the size as needed */
                }

                  /* Custom CSS for checkbox icon */
                  .checkbox-icon2 {
                        cursor: pointer;
                        color: white;
                        font-size: 10px; /* Adjust the size as needed */
                        transition: color 0.3s; /* Add a transition for smooth color change */
                    }

                    .checkbox-icon2.checked {
                        color: #EF7979; /* Color when checkbox is checked */
                    }

                    .checkbox-icon2:hover {
                        color: #EF7979; /* Color on hover */
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
                    background-color: #D3D3D3;
                    color: #616173;
                  
                }

                        #example24 th,
                        #example24 td {
                    border: 1px  solid gray;
                }

                  
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


                @keyframes blinker {
                        50% { opacity: 0; }
                    }


                    .item-button {
                            background-color: #99C569;
                            color: white;
                            width: 150px;
                            height: 50px;
                            font-size: 18px;
                            margin-right: 10px;
                            padding: 0;
                            border: none; /* Remove default button border */
                            cursor: pointer; /* Change cursor to pointer on hover */
                        }


                        .custom-modal-width {
                    max-width: 55%; /* You can adjust the percentage to the desired width */
                }


                .form-control{
                
                    border-radius: 0;
                  
                }

                .swal-wide {
                      width: 90% !important;
                    max-width: 1500px !important; 
                    }


                    .highlight-green {
                      background-color: green;
                    }

                    .highlight-red {
                      background-color: red;
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

                              





<br>
    

<?php


?>
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
                              
                           
                           <h2>DEMAND LIST INPUT</h2>
                           
                          
                           </div>
                        </div>
                     </div>


                     <div class="row">
                      

                     <button class="btn item-button" data-option="ALL" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fa-solid fa-cloud" style="font-size: 26px;"></i> <span style="vertical-align: middle;">ALL</span>
                      </button>

                  
<!-- 
                     <button class="btn item-button" data-option="GA" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fas fa-hard-hat" style="font-size: 26px;"></i> <span style="vertical-align: middle;">GA</span>
                      </button>

                      <button class="btn item-button" data-option="IT" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fa-solid fa-computer" style="font-size: 26px;"></i> <span style="vertical-align: middle;">IT</span>
                      </button>

                      <button class="btn item-button" data-option="F2_PIM" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fa-solid fa-gears" style="font-size: 26px;"></i> <span style="vertical-align: middle;">PIM</span>
                      </button>

                      <button class="btn item-button" data-option="IM_F3 PIM" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fa-solid fa-gears" style="font-size: 26px;"></i> <span style="vertical-align: middle;">IM_F3 PIM</span>
                      </button>


                      <button class="btn item-button" data-option="F1_MIM" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fa-solid fa-box-archive" style="font-size: 26px;"></i> <span style="vertical-align: middle;">MIM</span>
                      </button>

                      <button class="btn item-button" data-option="PNJ" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fa-solid fa-hammer" style="font-size: 26px;"></i> <span style="vertical-align: middle;">PNJ</span>
                      </button> -->


 
                      
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




<script>
// Function to execute when the button is clicked (you can define your own logic)
function showSelectedValue() {
    
    document.getElementById('selectedValue').textContent = selectedValue; // Update the selected value display in the modal
    console.log('Selected value:', selectedValue);
}
</script>


<script>
// Function to execute when the button is clicked (you can define your own logic)
function showSelectedValueAdd() {
    
    document.getElementById('selectedValueAdd').textContent = selectedValueAdd; // Update the selected value display in the modal
    console.log('Selected value:', selectedValueAdd);
}
</script>








<script>
    document.getElementById('form1').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submit behavior

        var form = this;
        var formData = new FormData(form); // Create FormData object from form

        fetch('im-list-data.php', {
    method: 'POST',
    body: formData
})
.then(response => {
    if (!response.ok) {
        throw new Error('Network response was not ok');
    }
    return response.json(); // Assuming your PHP script sends JSON response
})
.then(data => {
    // Check the response for success or error message
    if (data && data.success) {
        console.log('Response from server:', data.message);
        alert('Data successfully inserted into database.');
        window.location.href = 'im-list.php';
        form.reset();
    } else {
        console.error('Error from server:', data.message);
        alert('Error inserting data into database. Please try again.');
    }
})
.catch(error => {
    console.error('Error:', error);
    alert('Error inserting data into database. Please try again.');
});


    });
</script>

 
</div>
<br>              
</div>
<br>



<form>

          <div class="card" >
            <div class="card-body">
              <h5 class="card-title"></h5>

              
              
  <div class="form-group">
  <div class="col-md-3">
    
          <label for="select2">Cost Center</label>
          <?php
          // Perform the SQL query to fetch the options
          $query = "SELECT cost_center, costcenter_name FROM tbl_costcenter WHERE section = $1";
          $result = pg_query_params($conn, $query, array($section));

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
          <select class="form-control" id="cost_center" name="cost_center">
            <option value="">Select Cost Center</option>
            <?php echo $options_html; ?>
          </select>
      </div>
    </div>




        <!-- <div class="form-group">
            <div class="col-md-3">
                <label for="storage_id">Storage Location</label>
                <select class="form-control" id="storage_id" name="storage_id">
                    <option value="">Select Storage Location</option>
                    <option value="IT">IT</option>
                    <option value="GA">GA</option>
                    <option value="F2_PIM">PIM</option>
                    <option value="IM_F3 PIM">IM_F3 PIM</option>
                    <option value="F1_MIM">MIM</option>
                    <option value="PNJ">PNJ</option>
                </select>
            </div>
        </div> -->

        <?php
        // Query to get the material categories
$query_materialcategory = "SELECT DISTINCT material_category FROM tbl_mim";
$result_materialcategory = pg_query($conn, $query_materialcategory);
        
        ?>
      <div class="form-group">
        <div class="col-md-3">
            <label for="storage_id">Material Category</label>
            <select class="form-control" id="storage_id" name="storage_id">
                <option value="">Select Material Category</option>

                <?php
                // Loop through the query result and populate the dropdown
                while ($row = pg_fetch_assoc($result_materialcategory)) {
                    $category = $row['material_category'];
                    echo "<option value='" . htmlspecialchars($category) . "'>" . htmlspecialchars($category) . "</option>";
                }
                ?>

            </select>
        </div>
    </div>

    <?php

   
    // PHP code to fetch initial data and set $selectedItems
$selectcommon = "SELECT * FROM tbl_mim";
$qry_selectcommon = pg_query($conn, $selectcommon);
$selectedItems = isset($_POST['selected']) && is_array($_POST['selected']) ? $_POST['selected'] : [];

    ?>
<table id="example24" class="display" style="width:100%; overflow-x: auto; white-space: nowrap; display: block;">
    <thead>
        <tr>
            <th style="text-align: center;">Add Item</th>
            <th style="text-align: center;">Item Code</th>
            <th style="text-align: center;">Item Name</th>
            <th style="text-align: center;">Specification</th>
            <th style="text-align: center;">UOM</th>
            <th style="text-align: center;">Available Stock Quantity</th>
            <th style="text-align: center;">Material Category</th>
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
            $storage_location = $row['storage_location'];
            $material_category = $row['material_category'];
            
            // Check if the item code is in the selectedItems array
            $checked = in_array($item_code, $selectedItems) ? 'checked' : '';

            echo '<tr>
                  <td style="width: 15px; text-align: center;">
                      <i class="fa-solid fa-cart-shopping checkbox-icon" id="icon-' . $id2 . '" style="background-color:#33BF7A;  padding: 5px; border-radius: 3px;"> Add</i>
                      <input type="checkbox" name="selected[]" class="single-checkbox2" id="selected-' . $id2 . '" value="' . $item_code . '" ' . $checked . '>
                  </td>
                  <td style="font-size: 12px; text-align: center;">' . $row['item_code'] . '</td>
                  <td style="font-size: 12px; text-align: center;">' . $row['item_name'] . '</td>
                  <td style="font-size: 12px; text-align: center;">' . $row['specification'] . '</td>
                  <td style="font-size: 12px; text-align: center;">' . $row['uom'] . '</td>
                  <td style="font-size: 12px; text-align: center;">' . ($row['stock'] === null ? 0 : $row['stock']) . '</td>
                  <td style="font-size: 12px; text-align: center;">' . $row['material_category'] . '</td>
                  </tr>';
        }
        ?>
    </tbody>
</table>


<br>



             



              <div class="row">

              
                <div class="col-12" style="display:flex; justify-content:right; align-items:left;">

               
<button type="button" class="button-cus1" role="button" style="justify-content: left; position: relative;" onclick="return add_item('<?php echo $fullname; ?>','<?php echo $section; ?>','<?php echo $email; ?>')">
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


<br>
                  
<div class="card" >
  <div class="card-body">
    <h5 class="card-title"></h5>

    


    <table id="example25" class="display"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;" >
<thead>
  
  <tr>
  <th style="text-align: center;">Delete Item</th>
      <th style="text-align: center;">Transaction Number</th>                       
      <th style="text-align: center;">Item Code</th>
      <th style="text-align: center;">Item Name</th>
      <th style="text-align: center;">Specification</th>
      <th style="text-align: center;">UOM</th>
      <th style="text-align: center;">Available PE Stock Quantity</th>
      <th style="text-align: center;">Section Name</th>
      <th style="text-align: center;">Cost Center</th>
      <th style="text-align: center;">Section Demand Stock</th>
      <th style="text-align: center;">Lead Time</th>
      <th style="text-align: center;">Calculated Availability Date</th> <!-- New column for calculated delivery date -->
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
      $selectcommon = "SELECT * FROM tbl_mim_cart WHERE requestor_name = '$fullname'";
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


        $leadtimenew = (int) $leadtime; // Cast $leadtime to float (or (int) for integer)
        $leadtimenew += 10; // Now add 10 to $leadtime


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


        $today = new DateTime();
    
        $currentLeadDate = clone $today;
        $currentLeadDate->modify("+$leadtimenew days");
  
        $currentLeadMonth = (int)$currentLeadDate->format('m');
        $calculatedLeadTime = $currentLeadDate->format('Y-m-d');
    
     

                echo '<tr>
              

               


                  <td style="width: 15px; text-align: center;">
                      <i class="fa-solid fa-cart-shopping checkbox-icon2" id="icon-' . $id3 . '" style="background-color:#E83636;  padding: 5px; border-radius: 3px;"> Delete</i>
                      <input type="hidden" name="selected2[]" class="single-checkbox3" id="selected-' . $id3 . '" value="' . $item_code2 . '">
                  </td>

                <td style="font-size: 12px; text-align: center;">' . $transno . '</td>
                <td style="font-size: 12px; text-align: center;">' . $item_code2 . '</td>
                <td style="font-size: 12px; text-align: center;">' . $item_name2 . '</td>
                <td style="font-size: 12px; text-align: center;">' . $specification2 . '</td>
                <td style="font-size: 12px; text-align: center;">' . $uom2 . '</td>
                <td style="font-size: 12px; text-align: center;">' . ($stock2 === null ? 0 : $stock2) . '</td>
                <td style="font-size: 12px; text-align: center;">' . $sectionname . '</td>
                <td style="font-size: 12px; text-align: center;">' . $costcenter . '</td>
                <td style="font-size: 12px; text-align: center;">' . ($sectionstock === null ? 0 : $sectionstock) . '</td>
                <td style="font-size: 12px; text-align: center;">' . $leadtime . '</td>
                <td style="font-size: 12px; text-align: center;">' . $currentLeadDate->format('Y-m-d') . '</td>
                <td data-delivery-date style="font-size: 12px; text-align: center;" name="delivery_date">' . $row['delivery_date'] . '</td>
                <td style="font-size: 12px; text-align: center;"><input type="number" class="month-input" data-month="1" name="january[]" value="' . ($jan === null ? 0 : $jan) . '"></td>
                <td style="font-size: 12px; text-align: center;"><input type="number" class="month-input" data-month="2" name="february[]" value="' . ($feb === null ? 0 : $feb) . '"></td>
                <td style="font-size: 12px; text-align: center;"><input type="number" class="month-input" data-month="3" name="march[]" value="' . ($mar === null ? 0 : $mar) . '"></td>
                <td style="font-size: 12px; text-align: center;"><input type="number" class="month-input" data-month="4" name="april[]" value="' . ($apr === null ? 0 : $apr) . '"></td>
                <td style="font-size: 12px; text-align: center;"><input type="number" class="month-input" data-month="5" name="may[]" value="' . ($may === null ? 0 : $may) . '"></td>
                <td style="font-size: 12px; text-align: center;"><input type="number" class="month-input" data-month="6" name="june[]" value="' . ($june === null ? 0 : $june) . '"></td>
                <td style="font-size: 12px; text-align: center;"><input type="number" class="month-input" data-month="7" name="july[]" value="' . ($july === null ? 0 : $july) . '"></td>
                <td style="font-size: 12px; text-align: center;"><input type="number" class="month-input" data-month="8" name="august[]" value="' . ($aug === null ? 0 : $aug) . '"></td>
                <td style="font-size: 12px; text-align: center;"><input type="number" class="month-input" data-month="9" name="september[]" value="' . ($sept === null ? 0 : $sept) . '"></td>
                <td style="font-size: 12px; text-align: center;"><input type="number" class="month-input" data-month="10" name="october[]" value="' . ($oct === null ? 0 : $oct) . '"></td>
                <td style="font-size: 12px; text-align: center;"><input type="number" class="month-input" data-month="11" name="november[]" value="' . ($nov === null ? 0 : $nov) . '"></td>
                <td style="font-size: 12px; text-align: center;"><input type="number" class="month-input" data-month="12" name="december[]" value="' . ($dec === null ? 0 : $dec) . '"></td>
            </tr>';
        }
    
    ?>
</tbody>

</table>



<br>
   



    <div class="row">

    
      <div class="col-12" style="display:flex; justify-content:right; align-items:left;">


     


<!--                
<button type="button" class="button-cus1" role="button" style="justify-content: left; position: relative;" >
    <i class="fa fa-trash" style="color:black;"></i>
    Remove from Cart
    <span class="badge" id="badgeValue2">0</span> 
</button> -->
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
                           <select class="form-control" id="select4"  name="select4" >
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
                              <select class="form-control" id="select5" >
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
                                    <select class="form-control" id="select6" >
                                    <option value="">Select Section Manager</option>
                                    <?php echo $options_html; ?>
                                    </select>
                                    </div>
 
            </div>
 
            <div class="col-md-6 col-lg-6" >
            <div class="form-group">
                     <label for="select4">PE Section Supervisor</label>
                     <?php
 
                                    // Perform the SQL query to fetch the options
                                    $query = "SELECT section_spv FROM tbl_costcenter WHERE section = 'PE'";
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
                                    <select class="form-control" id="select7" >
                                    <option value="">Select PE Supervisor</option>
                                    <?php echo $options_html; ?>
                                    </select>
                  </div>
 
            <div class="form-group">
                     <label for="select4">PE Section Manager</label>
                     <?php
 
                                    // Perform the SQL query to fetch the options
                                    $query = "SELECT section_manager FROM tbl_costcenter WHERE section = 'PE'";
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
                                    <select class="form-control" id="select8" >
                                    <option value="">Select PE Manager</option>
                                    <?php echo $options_html; ?>
                                    </select>
                  </div>
                 
             <div style="text-align: right;">
            
                  <button type="submit" class="button-cus3" role="button" style="position: relative;"  onclick="return confirm_submit()"  >
                  <i class="fa fa-paper-plane" style="color:black;"></i> <!-- Font Awesome icon -->
               SUBMIT
            </button>
       
            <div>
 
           
            </div>
      </div>

   
 
 
 
               
 
                  </div>
               </div>
               
   

            <!-- end Approver card -->
 <br>

 </div>
 </div>
 <br>
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   </body>
</html>




<!-- <script>
function confirm_edit() {
  var checkboxes = document.getElementsByClassName('single-checkbox');
  var vals = [];
  var count = 0;

  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      vals.push(checkboxes[i].value);
      count++;
    }
  }

  if (count > 0) {
    Swal.fire({
      title: 'Are you sure you want to edit the selected items?',
      html: 'IM Code: <br>' + (vals.length > 0 ? vals.join('<br>') : '') ,  
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, edit it!',
      
    }).then((result) => {
      if (result.isConfirmed) {
       

      }
    });
  } else {
    Swal.fire('No items selected', 'Please select at least one item to edit.', 'warning');
  }
}
</script> -->


<script>
function confirm_edit() {
    var checkboxes = document.getElementsByClassName('single-checkbox');
    var vals = [];
    var count = 0;

    // Collect selected IM codes
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            vals.push(checkboxes[i].value);
            count++;
        }
    }

    if (count === 0) {
        Swal.fire({
            title: 'No Selection',
            text: 'Please select at least one item to edit.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    } else if (count > 1) {
        Swal.fire({
            title: 'Multiple Selection',
            text: 'Please select only one item to edit.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
    } else {
        Swal.fire({
            title: 'Are you sure you want to edit the selected item?',
            html: 'IM Code: <br>' + vals[0],
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, edit it!',
        }).then((result) => {
            if (result.isConfirmed) {
                var hiddenInput = document.getElementById('hiddenitemid');
                hiddenInput.value = vals[0];
                
                // Call function to fetch data and populate input fields
                fetchItemData(vals[0]);
            }
        });
    }
}

function fetchItemData(itemid) {
    $.ajax({
        url: "im-list-getdata.php",
        method: "POST",
        data: { itemIdentification: itemid},
        dataType: "JSON",
        success: function(data) {
            if (data && data.im_code && data.item_name) {
              Swal.fire({
    title: 'Edit Item Details',
    html: 
    '<div class="container" style="max-width:100%; overflow-x:hidden;">' +
        '<div class="row align-items-center mb-3">' +
            '<div class="col-md-12">' +
                '<div class="input-group">' +
                    '<div class="input-group-prepend">' +
                        '<span class="input-group-text" style="width:120px; background-color:#E9ECEF;">IM Code</span>' +
                    '</div>' +
                    '<input type="text" class="form-control" id="fetchimcode" name="fetchimcode" value="' + data.im_code + '">' +
                '</div>' +
            '</div>' +
        '</div>' +
        '<div class="row align-items-center mb-3">' +
            '<div class="col-md-12">' +
                '<div class="input-group">' +
                    '<div class="input-group-prepend">' +
                        '<span class="input-group-text" style="width:120px; background-color:#E9ECEF;">Item Name</span>' +
                    '</div>' +
                    '<input type="text" class="form-control" id="fetchitemname" name="fetchitemname" value="' + data.item_name + '">' +
                '</div>' +
            '</div>' +
        '</div>' +
        '<div class="row align-items-center mb-3">' +
            '<div class="col-md-12">' +
                '<div class="input-group">' +
                    '<div class="input-group-prepend">' +
                        '<span class="input-group-text" style="width:120px; background-color:#E9ECEF;">Specification</span>' +
                    '</div>' +
                    '<input type="text" class="form-control" id="fetchspecs" name="fetchspecs" value="' + data.specification + '">' +
                '</div>' +
            '</div>' +
        '</div>' +
        '<div class="row align-items-center mb-3">' +
            '<div class="col-md-12">' +
                '<div class="input-group">' +
                    '<div class="input-group-prepend">' +
                        '<span class="input-group-text" style="width:120px; background-color:#E9ECEF;">PE UOM</span>' +
                    '</div>' +
                    '<input type="text" class="form-control" id="fetchpeuom" name="fetchpeuom" value="' + data.ga_uom + '">' +
                '</div>' +
            '</div>' +
        '</div>' +
        '<div class="row align-items-center mb-3">' +
            '<div class="col-md-12">' +
                '<div class="input-group">' +
                    '<div class="input-group-prepend">' +
                        '<span class="input-group-text" style="width:120px; background-color:#E9ECEF;">PE Unit Cost</span>' +
                    '</div>' +
                    '<input type="text" class="form-control" id="fetchpeunitprice" name="fetchpeunitprice" value="' + data.ga_unit_cost + '">' +
                '</div>' +
            '</div>' +
        '</div>' +
        '<div class="row align-items-center mb-3">' +
            '<div class="col-md-12">' +
                '<div class="input-group">' +
                    '<div class="input-group-prepend">' +
                        '<span class="input-group-text" style="width:120px; background-color:#E9ECEF;">Conversion</span>' +
                    '</div>' +
                    '<input type="text" class="form-control" id="fetchconversion" name="fetchconversion" value="' + data.conversion + '">' +
                '</div>' +
            '</div>' +
        '</div>' +
        '<div class="row align-items-center mb-3">' +
            '<div class="col-md-12">' +
                '<div class="input-group">' +
                    '<div class="input-group-prepend">' +
                        '<span class="input-group-text" style="width:120px; background-color:#E9ECEF;">Inventory Out</span>' +
                    '</div>' +
                    '<input type="text" class="form-control" id="fetchinventoryout" name="fetchinventoryout" value="' + data.out_of_inventory + '">' +
                '</div>' +
            '</div>' +
        '</div>' +
        '<div class="row align-items-center mb-3">' +
            '<div class="col-md-12">' +
                '<div class="input-group">' +
                    '<div class="input-group-prepend">' +
                        '<span class="input-group-text" style="width:120px; background-color:#E9ECEF;">FI Uom</span>' +
                    '</div>' +
                    '<input type="text" class="form-control" id="fetchfiuom" name="fetchfiuom" value="' + data.fi_uom + '">' +
                '</div>' +
            '</div>' +
        '</div>' +
        '<div class="row align-items-center mb-3">' +
            '<div class="col-md-12">' +
                '<div class="input-group">' +
                    '<div class="input-group-prepend">' +
                        '<span class="input-group-text" style="width:120px; background-color:#E9ECEF;">FI Unit Cost</span>' +
                    '</div>' +
                    '<input type="text" class="form-control" id="fetchfiunitcost" name="fetchfiunitcost" value="' + data.fi_unit_cost + '">' +
                '</div>' +
            '</div>' +
        '</div>' +
        '<div class="row align-items-center mb-3">' +
            '<div class="col-md-12">' +
                '<div class="input-group">' +
                    '<div class="input-group-prepend">' +
                        '<span class="input-group-text" style="width:120px; background-color:#E9ECEF;">Supplier Name</span>' +
                    '</div>' +
                    '<input type="text" class="form-control" id="fetchsuppliername" name="fetchsuppliername" value="' + data.supplier_name + '">' +
                '</div>' +
            '</div>' +
        '</div>' +
        '<div class="row align-items-center mb-3">' +
            '<div class="col-md-12">' +
                '<div class="input-group">' +
                    '<div class="input-group-prepend">' +
                        '<span class="input-group-text" style="width:150px; background-color:#E9ECEF;">Storage Location</span>' +
                    '</div>' +
                    '<input type="text" class="form-control" id="fetchstoragelocation" name="fetchstoragelocation" value="' + data.storage_location + '">' +
                '</div>' +
            '</div>' +
        '</div>' +
    '</div>',
    showCancelButton: true,
    confirmButtonText: 'Save',
    showLoaderOnConfirm: true,
    customClass: {
        popup: 'swal-wide'
    },
    preConfirm: () => {
        return updateItemDetails();
    }
});

            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'No data found for the given item code.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        },
        error: function() {
            Swal.fire({
                title: 'Error',
                text: 'An error occurred while fetching data.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}

function updateItemDetails() {
    var imCode = document.getElementById('fetchimcode').value;
    var itemName = document.getElementById('fetchitemname').value;
    var specification = document.getElementById('fetchspecs').value;
    var peUom = document.getElementById('fetchpeuom').value;
    var peUnitPrice = document.getElementById('fetchpeunitprice').value;
    var conversion = document.getElementById('fetchconversion').value;
    var inventoryOut = document.getElementById('fetchinventoryout').value;
    var fiUom = document.getElementById('fetchfiuom').value;
    var fiUnitCost = document.getElementById('fetchfiunitcost').value;
    var supplierName = document.getElementById('fetchsuppliername').value;
    var storageLocation = document.getElementById('fetchstoragelocation').value;

    // Log fetched values to console for verification
    console.log("Fetched Values:");
    console.log("IM Code:", document.getElementById('fetchimcode').value);
    console.log("Item Name:", document.getElementById('fetchitemname').value);
    console.log("Specification:", specification);
    console.log("PE UOM:", peUom);
    console.log("PE Unit Price:", peUnitPrice);
    console.log("Conversion:", conversion);
    console.log("Inventory Out:", inventoryOut);
    console.log("FI UOM:", fiUom);
    console.log("FI Unit Cost:", fiUnitCost);
    console.log("Supplier Name:", supplierName);
    console.log("Storage Location:", storageLocation);

    return $.ajax({
        url: "im-list-update.php",
        method: "POST",
        data: {
            im_code: imCode,
            item_name: itemName,
            specification: specification,
            ga_uom: peUom,
            ga_unit_cost: peUnitPrice,
            conversion: conversion,
            out_of_inventory: inventoryOut,
            fi_uom: fiUom,
            fi_unit_cost: fiUnitCost,
            supplier_name: supplierName,
            storage_location: storageLocation
        },
        success: function(response) {
            // Handle success message
            Swal.fire({
                title: 'Success',
                text: 'Item details updated successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                // Optionally reload the page or update UI as needed
                location.reload(); 
            });
        },
        error: function(xhr, status, error) {
            // Handle error message
            console.error("Error:", error);
            Swal.fire({
                title: 'Error',
                text: 'An error occurred while updating data.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    });
}

</script>

<script>
        $(document).ready(function() {
          var usercategory = <?php echo json_encode($usercategory); ?>;

        

            if (usercategory === 'user') {
                $('#btnupload').hide();
                $('#btnedit').hide();
                $('#btnadd').hide();
                $('#btntemplate').hide();
                $('#btnaddlist').show();
            }else if(usercategory === 'admin'){
              $('#btnupload').show();
                $('#btnedit').show();
                $('#btnadd').show();
                $('#btntemplate').show();
                $('#btnaddlist').show();
        
            }
        });
  </script>






<script>
function confirm_addlist() {
  var checkboxes = document.getElementsByClassName('single-checkbox');
  var vals = [];
  var accountCodes1 = {};
  var accountCodes2 = {};
  var count = 0;
  var section = '<?php echo $section; ?>'; // Embed the PHP variable into JavaScript
  var costcenter = $('#cost_center').val(); // Get the value of the cost center select dropdown

  // Collect selected IM codes and their corresponding account codes
  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      var imCode = checkboxes[i].value;
      vals.push(imCode);
      count++;

      // Find the parent row of the checkbox
      var parentRow = checkboxes[i].closest('tr');

      // Get the account code dropdowns within the parent row
      var accountCode1Dropdown = parentRow.querySelector('select[name="account_code1[' + imCode + ']"]');
      var accountCode2Dropdown = parentRow.querySelector('select[name="account_code2[' + imCode + ']"]');

      // Collect the values of the dropdowns
      if (accountCode1Dropdown && accountCode2Dropdown) {
        accountCodes1[imCode] = accountCode1Dropdown.value;
        accountCodes2[imCode] = accountCode2Dropdown.value;
      } else {
        console.error('Dropdowns not found for IM code:', imCode);
      }
    }
  }

  if (count === 0) {
    Swal.fire({
      title: 'No Selection',
      text: 'Please select at least one item to add.',
      icon: 'warning',
      confirmButtonText: 'OK'
    });
  } else {
    Swal.fire({
      title: 'Are you sure you want to add the selected items?',
      html: 'IM Codes: <br>' + vals.join('<br>'),
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, edit it!',
    }).then((result) => {
      if (result.isConfirmed) {
        var hiddenInput = document.getElementById('hiddenitemid');
        hiddenInput.value = vals.join(',');

        // Debugging: log the collected data before sending
        console.log('Collected IM codes:', vals);
        console.log('Collected Account Codes 1:', accountCodes1);
        console.log('Collected Account Codes 2:', accountCodes2);

        // AJAX call to update the selected items
        $.ajax({
          url: 'im-list-addlist.php', // Replace with your server-side script
          method: 'POST',
          data: {
            item_ids: vals,
            section: section,
            costcenter: costcenter,
            account_codes1: accountCodes1,
            account_codes2: accountCodes2
          },
          success: function(response) {
            // Handle success response
            console.log("Server response: ", response);
            Swal.fire({
              title: 'Updated!',
              text: 'The selected items have been added.',
              icon: 'success',
              confirmButtonText: 'OK'
            });

        
            setTimeout(function() {
              
             location.reload();
             }, 1500); 
          },
          error: function(xhr, status, error) {
            // Handle error response
            console.error("Error: ", error);
            Swal.fire({
              title: 'Error',
              text: 'There was an error adding the items. Please try again.',
              icon: 'error',
              confirmButtonText: 'OK'
            });
          }
        });
      }
    });
  }
}

</script>



<script>
    new DataTable('#example25', {
      lengthMenu: [], // Disable the length menu
      pageLength: -1, // Set page length to -1 to show all entries
        initComplete: function () {

     // Hide the length menu container
     document.querySelector('#example25_length').style.display = 'none';

            this.api()
                .columns([])
                .every(function () {
                    let column = this;
                    let select = document.createElement('select');
                    select.add(new Option(''));
                    column.header().replaceChildren(select);
                    select.addEventListener('change', function () {
                        var val = DataTable.util.escapeRegex(select.value);
                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });
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

    document.addEventListener("DOMContentLoaded", function() {
        let rows = document.querySelectorAll("#example25 tbody tr");

        rows.forEach(row => {
            let currentLeadDate = new Date(row.cells[11].innerText);
            let currentLeadMonth = currentLeadDate.getMonth() + 1;

            row.querySelectorAll('.month-input').forEach(input => {
                let inputMonth = parseInt(input.getAttribute('data-month'));

                if (inputMonth < currentLeadMonth) {
                    input.style.backgroundColor = 'red';
                    input.readOnly = true;
                }
            });
        });
    });
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
            input.style.backgroundColor = 'white';
          }
        }
      });
    }
  });
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
    // Check if all required selects have been chosen
    var select4 = document.getElementById('select4');
    var select5 = document.getElementById('select5');
    var select6 = document.getElementById('select6');
    var select7 = document.getElementById('select7');
    var select8 = document.getElementById('select8');

    if (select4.value === '' || select5.value === '' || select6.value === '' || select7.value === '' || select8.value === '') {
        Swal.fire({
            title: 'Error',
            text: 'Please choose Approvers.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return; // Prevent form submission
    }

    var checkboxes = document.getElementsByClassName('single-checkbox3');
    var vals = [];
    var count = 0;
    var usersession = '<?php echo $fullname?>';

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
                form.action = 'process_data_backup.php';

                // Create an input element for selectedItemId
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selectedItemId';
                input.value = vals.join(','); // Assuming vals is an array of selected item IDs
                form.appendChild(input);


                    // Add usersession as a hidden input
                    var usersessionInput = document.createElement('input');
                usersessionInput.type = 'hidden';
                usersessionInput.name = 'usersession';
                usersessionInput.value = usersession;
                form.appendChild(usersessionInput);


                    // Create an input element for selectedItemId
                    var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selectedItemId';
                input.value = vals.join(','); // Assuming vals is an array of selected item IDs
                form.appendChild(input);

                // Add usersession as a hidden input
                var usersessionInput = document.createElement('input');
                usersessionInput.type = 'hidden';
                usersessionInput.name = 'usersession';
                usersessionInput.value = usersession;
                form.appendChild(usersessionInput);

                // Add dropdown values as hidden inputs
                var select4Input = document.createElement('input');
                select4Input.type = 'hidden';
                select4Input.name = 'sectionBudgetController';
                select4Input.value = select4.value;
                form.appendChild(select4Input);

                var select5Input = document.createElement('input');
                select5Input.type = 'hidden';
                select5Input.name = 'sectionSupervisor';
                select5Input.value = select5.value;
                form.appendChild(select5Input);

                var select6Input = document.createElement('input');
                select6Input.type = 'hidden';
                select6Input.name = 'sectionManager';
                select6Input.value = select6.value;
                form.appendChild(select6Input);

                var select7Input = document.createElement('input');
                select7Input.type = 'hidden';
                select7Input.name = 'peSectionSupervisor';
                select7Input.value = select7.value;
                form.appendChild(select7Input);

                var select8Input = document.createElement('input');
                select8Input.type = 'hidden';
                select8Input.name = 'peSectionManager';
                select8Input.value = select8.value;
                form.appendChild(select8Input);

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

                // window.location.href = 'demand-list-input.php';
            }
        });
    }
}



</script>



<script>
  // Declare table globally
  let table;

  document.addEventListener('DOMContentLoaded', function() {
    // Show loading GIF
    console.log('Showing loading GIF');
    $('#loading').show();

    // Initialize DataTable
    table = new DataTable('#example24', {
      initComplete: function () {
        // Add dropdown filters for other columns
        this.api().columns([]).every(function () {
          let column = this;

          // Create select element for filtering
          let select = document.createElement('select');

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

        // Add change event listener to external dropdown
        $('#storage_id').on('change', function() {
          let val = $(this).val();

          // Filter DataTable based on selected value
          table.column(6).search(val ? '^' + val + '$' : '', true, false).draw();
        });

        // Hide loading GIF
        console.log('Hiding loading GIF');
        $('#loading').hide();

        // Call the function to hide the "Add" button on initialization
        hideAddButtons();
      },
      columnDefs: [
        { orderable: false, targets: [1, 2, 3, 4, 5] }
      ]
    });

    // Re-apply the hideAddButtons function whenever the table is redrawn
    table.on('draw', function() {
      hideAddButtons();
    });
  });

  // Function to hide "Add" buttons based on item codes existing in the second table
  function hideAddButtons() {
    // Get the item codes from the second table (example25)
    let existingItemCodes = [];
    $('#example25 tbody tr').each(function() {
      let itemCode = $(this).find('td:nth-child(3)').text().trim(); // Assuming item code is in the 3rd column of the second table
      if (itemCode) {
        existingItemCodes.push(itemCode); // Add each item code to the array
      }
    });

    // Loop through each row of the first table (example24)
    $('#example24 tbody tr').each(function() {
      // Get the item code from the second column (index starts at 1)
      let itemCode = $(this).find('td:nth-child(2)').text().trim();

      // If the item code exists in the second table, hide the "Add" button and checkbox
      if (existingItemCodes.includes(itemCode)) {
        $(this).find('.checkbox-icon').hide();  // Hide the cart icon
        $(this).find('.single-checkbox2').hide();  // Hide the checkbox
      }
    });
  }
</script>



<script>
   document.addEventListener('DOMContentLoaded', function() {
    // Attach event listener to the entire table
    document.getElementById('example24').addEventListener('change', function(event) {
        // Check if the change event originated from a checkbox with the class 'single-checkbox2'
        if (event.target.matches('.single-checkbox2')) {
          add_item('<?php echo $fullname; ?>','<?php echo $section?>','<?php echo $email?>','<?php echo $adid?>'); // Call the confirmation function with $fullname
        }
    });
});

function add_item(fullname,section,email,adid) {
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
                  window.location.href = 'sqlupdates.php?action=cart&selectedItemId=' + selectedItems.join(',') + '&fullname=' + encodeURIComponent(fullname) + '&costcenter=' + encodeURIComponent(selectedCostCenter) + '&usersection=' + encodeURIComponent(section)+ '&useremail=' + encodeURIComponent(adid)+ '&useradid=' + encodeURIComponent(adid);
                }
            });
        }
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





<script>


// jQuery document ready function
$(document).ready(function() {
    // Click event handler for all item buttons
    $('.item-button').click(function() {
        // Get the data-option attribute value from the clicked button
        var option = $(this).data('option');
        
        // Set the value of the dropdown
        $('#storage_id').val(option);

        // Trigger change event on the dropdown manually
        $('#storage_id').trigger('change');
    });

    
});
</script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
  var $j = jQuery.noConflict();
  $j(document).ready(function() {
    $j('.checkbox-icon2').click(function() {
      var row = $j(this).closest('tr');
      var itemId = row.find('.single-checkbox3').val();
      if (confirm('Are you sure you want to delete this item?')) {
        $j.ajax({
          url: 'demand-list-delete.php',
          method: 'POST',
          data: { selectedItemId: itemId },
          success: function(response) {
            row.remove();
            alert("Deleted Successfully!");
            location.reload();
          },
          error: function(xhr, status, error) {
            console.error('Failed to delete item:', error);
            alert("Deletion failed!");
          }
        });
      }
    });
  });
</script>

