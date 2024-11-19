


<?php
session_start();

include('Connection/connection.php');




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
      <title>BIMMS -Budget & Indirect Material Management System</title>
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
      <!-- calendar file css -->
      <link rel="stylesheet" href="js/semantic.min.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="inner_page login">

 
      <div class="full_container">
         <div class="container">
            <div class="center verticle_center full_height">
               <div class="login_section">
                  <div class="logo_login">
                     <div class="center">
                        <img width="210" src="images/logo/bimslogoFORLOGINWHITE.png" style="width: 500px;" alt="#" />
                     </div>
                  </div>
                  <div class="login_form">

                  <?php

                  
                     $sql = "SELECT DISTINCT(ADID) FROM Tbl_lOGIN_Request WHERE HOSTNAME = '$ip_client' AND STATUS = 'ACTIVE' AND [SYSTEM ID]= 16";
                     $params = array();
                     $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                     $stmt = sqlsrv_query( $connsql, $sql , $params, $options );
                     $row_count = sqlsrv_num_rows( $stmt );

                     if ($row_count == 1) {
                     
                        while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                           $loginADID = $row['ADID'];
                        }
                        $_SESSION['BIMMSuser_id'] = $loginADID;

                     header("location: index.php");
                     }


                  else{

                  ?>

                     <div class="card" style="font-family: segoe ui; width:  500px;">
                     <div class="card-header" style="background: #009">
                     <span style="color:#FFDF00">Can't Proceed to Login!</span>
                     </div>
                     <div class="card-body">
                     <h5 class="card-title" ></h5>
                     <p class="card-text" style="color: #000080;font-weight: 600">Sorry, no login request found in I-Portal!</p>
                     <p class="card-text" style="color: #000080;font-weight: 600">With this, kindly login to I-Portal first</p>
                     <p class="card-text" style="color: #000080;font-weight: 600">If the I-Portal application is not yet installed to your computer,</p>
                     <p class="card-text" style="color: #000080;font-weight: 600">click the button below to install.</p>
                     <p class="card-text" style="color: #000080;font-weight: 600">( Click <span style="color:green;font-weight: 700">RE-LOGIN</span> after your login to I-Portal )</p>
                     <br>
                     <a target="_blank" href="
                     http://apbiphbpswb01:8080/approval-system/Views/iportal-dashboard.php"
                     class="btn btn-primary">Open / Install I-Portal System</a>
                     </div>
                     <div class="card-footer">
                     <span style="float: right; font-size: 12px;font-style: italic;color:black">If you have any concern, you may call BPS-Application group local no. 3407</span>
                     </div>
                     </div>
                  <?php
                  
                  }


                  


                  ?>


               


               

                  </div>
               </div>
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
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>