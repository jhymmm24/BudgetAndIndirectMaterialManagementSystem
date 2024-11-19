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

        #example24 th {
    background-color: #7AB9EA;
    color: #42657F;
   
}

        #example24 th,
        #example24 td {
    border: 1px  solid gray;
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
                              <h2 style="margin-top:20px;">Item Request Approval</h2>
 
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
            <label for="input_transactionnumber">Transaction Number</label>
            <input type="text" class="form-control" id="input_transactionnumber" placeholder="Input Transaction Number Here">
            </div>

            <div class="form-group">
            <label for="input_date">Application Date</label>
            <input type="text" class="form-control" id="input_date" placeholder="Input Application Date Here">
            </div>

            <div class="form-group">
               <label for="input1">Requestor</label>
               <input type="text" class="form-control" id="input_requestor" placeholder="Input Requestor Name Here" >
            </div>
      </div>

      <div class="col-md-6 col-lg-6">
    
      <div class="form-group">
               <label for="input1">Section</label>
               <input type="text" class="form-control" id="input1" placeholder="<?php echo $section ?> Section" readonly>
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

      </div>
      </div>





<form>

          <div class="card" >
            <div class="card-body">
              <h5 class="card-title"></h5>
              
              <!-- <div id="loading">
             
          <img src="bimms/images/logo/loadinggif.gif" alt="Loading...">
        </div> -->

              
              <table id="example24" class="display"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;" >
        <thead>
            
            <tr>
            <th style="text-align: center;">Select</th>
            <th style="text-align: center;">Transaction Number</th>
         
            
                <th style="text-align: center;">Item Code</th>
                <th style="text-align: center;">Item Name</th>
                <th style="text-align: center;">Specification</th>
                <th style="text-align: center;">UOM</th>
                <th style="text-align: center;">Unit Cost</th>
                <th style="text-align: center;">Currency</th>
                <th style="text-align: center;">Approval Status</th>
                <th style="text-align: center;">Total Demand Quantity</th>
                <th style="text-align: center;">Overall Total Cost</th>
                <th style="text-align: center;">Original Request Quantity</th>
                <th style="text-align: center;">Approved Quantity</th>
                <th style="text-align: center;">Purpose</th>
                <th style="text-align: center;">Line</th>
                <th style="text-align: center;">Remarks</th>
             
            </tr>
        </thead>
        <tbody>
        <?php
               $selectcommon = "SELECT * FROM tbl_mim_itemrequest_approval where request_status= 'For Budget Controller'";
               $stmt3 = pg_query($conn,$selectcommon);
                         

            while ($row = pg_fetch_assoc($stmt3)) {
               $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
               $transactionnumber = $row['transaction_number'];
               $item_code = $row['item_code']; // Assuming column names in PostgreSQL are in lowercase
               $item_name = $row['item_name'];
               $specification = $row['specification'];
               $requestdate = $row['request_date'];
               $requeststatus = $row['request_status'];
               $stock = $row['stock'];
               $unitcost = $row['unit_cost'];
               $currency = $row['currency'];
               $requestorname = $row['requestor_name'];               
               $costcenter = $row['cost_center'];
               $totaldemandqty = $row['total_demand_quantity'];      
               $overalltotalcost = $row['overall_total_cost'];

    
               $uom = $row['uom'];
                   
               $quantity = $row['quantity'];
               $purpose = $row['purpose'];
               $line = $row['line'];
               $remarks = $row['remarks'];
           
           
  
            
         
       
          
      

               // Check if $stock is null and set it to 0
              


                                  echo

                                  '<tr>


                                  <td style="width: 15px;">
                                  <i class="fa fa-check-circle checkbox-icon" id="icon-<?php echo $id2; ?>"></i>
                                  <input type="hidden" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="'.$transactionnumber.'">

                                  <i class="fa fa-times-circle checkbox-icon2" id="icon-<?php echo $id2; ?>"></i>
                                  <input type="hidden" name="selected[]" class="single-checkbox3" id="selected-<?php echo $id2; ?>" value="'.$transactionnumber.'">
                              </td>
                                

                                      <td style=" font-size: 12px; text-align: center;">'  . $row['transaction_number'] .'</td>
                               
                                      <td style=" font-size: 12px; text-align: center;">'  . $row['item_code'] .'</td>
                                      <td style=" font-size: 12px; text-align: center;">'  . $row['item_name'] .'</td>
                                      <td style=" font-size: 12px; text-align: center;">'  . $row['specification'] .'</td>
                                      <td style=" font-size: 12px; text-align: center;">'  . $row['uom'] .'</td>
                                      <td style=" font-size: 12px; text-align: center;">'  . $row['unit_cost'] .'</td>
                                      <td style=" font-size: 12px; text-align: center;">'  . $row['currency'] .'</td>
                                      <td style=" font-size: 12px; text-align: center; background-color: #EDC334; ">'  . $row['request_status'] .'</td>
                                     

                                

                                      <td style=" font-size: 12px; text-align: center; background-color: #D9D9D9;">'  . $row['total_demand_quantity'] .'</td>
                                      <td style=" font-size: 12px; text-align: center; background-color: #D9D9D9;">'  . $row['overall_total_cost'] .'</td>
                                      <td style=" font-size: 12px; text-align: center;">'  . $row['quantity'] .'</td>
                                      <td style="font-size: 12px; text-align: center;">  <input type="number" name="approvedqty[]" value="' . htmlspecialchars($row['approved_qty']) . '"></td>
                                      <td style=" font-size: 12px; text-align: center;">'  . $row['purpose'] .'</td>
                                      <td style=" font-size: 12px; text-align: center;">'  . $row['line'] .'</td>
                                      <td style=" font-size: 12px; text-align: center;">'  . $row['remarks'] .'</td>



                                    
                                  ';
                              

                              }

              
              ?>
        </tbody>
       
    </table>



<br>



             



              <div class="row">

              
                <div class="col-12" style="display:flex; justify-content:right; align-items:left;">

                <button type="button" class="button-cus1" role="button" style="justify-content: left; position: relative;" onclick="return confirm_approved()">
                  <i class="fa fa-check-circle" style="color:black;"></i> <!-- Font Awesome icon -->
                 APPROVE
                  <span class="badge" id="badgeValue">0</span> <!-- Badge with initial value -->
                  </button>

                  <button type="button" class="button-cus3" role="button" style="justify-content: left; position: relative; margin-left: 5px;" onclick="return confirm_declined()">
                  <i class="fa fa-times-circle" style="color:black;"></i> <!-- Font Awesome icon -->
                 DECLINE
                  <span class="badge" id="badgeValue2">0</span> <!-- Badge with initial value -->
                  </button>


              <!-- <button type="button" class="btn btn-primary" style = "justify-content:left; margin-left: 5px;">Save</button> -->
                </div>
              </div>

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
        // Show loading GIF

        $('#loading').show();

        // Initialize DataTable
        let table = new DataTable('#example24', {
            initComplete: function () {
                // Hide loading GIF
                $('#loading').hide();

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
                document.getElementById('input_transactionnumber').addEventListener('input', function () {
                    table.column(1).search(this.value).draw();
                });

              


                // Add listener for requestor input field
                document.getElementById('input_requestor').addEventListener('input', function () {
                    table.column(2).search(this.value).draw();
                });

                     // Add listener for application date input field
                     document.getElementById('input_date').addEventListener('input', function () {
                    table.column(3).search(this.value).draw();
                });
            },
            columnDefs: [
                { orderable: false, targets: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15] }
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
        { orderable: false, targets: [1,2,3,4,5] }
        ]
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
      html: 'Transaction Number: <br>' + (vals.length > 0 ? vals.join('<br>') : ''),
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, add it!'
    }).then((result) => {
      if (result.isConfirmed) {
          // Create a form element
          var form = document.createElement('form');
          form.method = 'post';
          form.action = 'process_data_itemrequest_approval.php';

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
      html: 'Transaction Number: <br>' + (vals.length > 0 ? vals.join('<br>') : ''),
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
