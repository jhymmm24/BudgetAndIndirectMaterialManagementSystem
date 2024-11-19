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






      <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
      
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

                        .button-cus1:disabled {
                    cursor: not-allowed;
                    background-color: gray;
                    color: white;
                    border-color: gray;
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
            background-color: #D3D3D3;
            color: #616173;
          
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
                              <h2 style="margin-top:20px;">Item Input</h2>
 
                           </div>
                        </div>
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
  document.addEventListener("DOMContentLoaded", function() {
    const materialCategory = document.getElementById('select4-material');
    const warehouse = document.getElementById('select4-warehouse');

    const warehouseOptions = {
      "IM_F1-MIM": [
        { value: "All Warehouse", text: "All Warehouse" },
        { value: "Excess WH", text: "Excess WH" },
        { value: "F1_3F_Stockroom", text: "F1_3F_Stockroom" }
      ],
      "IM_F2-PnJ": [
        { value: "All Warehouse", text: "All Warehouse" },
        { value: "Excess WH", text: "Excess WH" },
        { value: "F2_2F_Stockroom", text: "F2_2F_Stockroom" }
      ],
      "IM_F2-PIM": [
        { value: "All Warehouse", text: "All Warehouse" },
        { value: "Excess WH", text: "Excess WH" },
        { value: "F2_2F_Stockroom", text: "F2_2F_Stockroom" }
      ],
      "IM_F3-CTRG": [
        { value: "All Warehouse", text: "All Warehouse" },
        { value: "F3_4F_Stockroom", text: "F3_4F_Stockroom" }
      ],
      "IM_F3-MIM": [
        { value: "All Warehouse", text: "All Warehouse" },
        { value: "Excess WH", text: "Excess WH" },
        { value: "F3_4F_Stockroom", text: "F3_4F_Stockroom" }
      ],
      "IM_F3-PIM": [
        { value: "All Warehouse", text: "All Warehouse" },
        { value: "Excess WH", text: "Excess WH" },
        { value: "F3_4F_Stockroom", text: "F3_4F_Stockroom" }
      ]
      // Add more options for other Material Categories here
    };

    materialCategory.addEventListener('change', function() {
      const selectedCategory = this.value;

      // Clear the current warehouse options
      warehouse.innerHTML = '<option value="">-Select-</option>';

      if (selectedCategory && warehouseOptions[selectedCategory]) {
        warehouseOptions[selectedCategory].forEach(option => {
          const opt = document.createElement('option');
          opt.value = option.value;
          opt.textContent = option.text;
          warehouse.appendChild(opt);
        });
      }
    });
  });
</script>





</div>

 
<div class="card">
    <div class="card-body">
        <h5 class="card-title"></h5>

        <div class="row">
            <div class="col-md-6 col-lg-6">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"  style="width:150px; background-color:white; font-size:12px;"><span style="color:red;">*</span>Material Category</span>
                </div>
                    <select class="form-control" id="select4-material" style="background-color:#D3EAF9">
                        <option value="">-Select-</option>
                        <option value="IM_F1-MIM">IM_F1-MIM</option>
                        <option value="IM_F2-PnJ">IM_F2-PnJ</option>
                        <option value="IM_F2-PIM">IM_F2-PIM</option>
                        <option value="IM_F3-CTRG">IM_F3-CTRG</option>
                        <option value="IM_F3-MIM">IM_F3-MIM</option>
                        <option value="IM_F3-PIM">IM_F3-PIM</option>
                    </select>
                </div>

                <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"  style="width:150px; background-color:white; font-size:12px;">Item Code</span>
                  </div>
                  <input type="text" class="form-control" id="itemcodeSearch" name="itemcodeSearch" >
                </div>
                </div>
            </div>

            

            <div class="col-md-6 col-lg-6">
               <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"  style="width:150px; background-color:white; font-size:12px;"><span style="color:red;">*</span>Warehouse</span>
                </div>
                <select class="form-control" id="select4-warehouse" style="background-color:#D3EAF9">
                <option value="">-Select-</option>
                </select>
                </div>

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"  style="width:150px; background-color:white; font-size:12px;">Item Name</span>
                  </div>
                  <input type="text" class="form-control" id="itemnameSearch" name="itemnameSearch" >
                </div>
            </div>
            
        </div>

        <div class="row">
            <div class="col-12 text-right">
                <button type="button" class="button-cus1" role="button" style="position: relative;" onclick="return confirm_search()" id="search-button">
                    <i class="fa fa-search" style="color:black;"></i> <!-- Font Awesome icon -->
                    Search
                </button>
            </div>
        </div>
    </div>
</div>



 <br>



    



<form>

          <div class="card" >
            <div class="card-body" style="overflow:scroll;">
              <h5 class="card-title"></h5>
              





              <div class="form-group">
            <div class="col-md-3">
                <label for="storage_id">Storage Location</label>
                <select class="form-control" id="storage_id" name="storage_id">
                    <option value="">Select Storage Location</option>
                    <option value="IT">IT</option>
                    <option value="GA">GA</option>
                    <option value="PIM">PIM</option>
                    <option value="MIM">MIM</option>
                    <option value="PNJ">PNJ</option>
                </select>
            </div>
        </div>

              
        <table id="example24" class="display bordered-table" style="width:100%;  display: block;">
        <thead>
            
            <tr>
            <th style="text-align: center;">Select</th>
            <th style="text-align: center;">Item Code</th>
            <th style="text-align: center;">Item Name</th>
            <th style="text-align: center;">Specification</th>
            <th style="text-align: center;">Stock</th>
            <th style="text-align: center;">UOM</th>
            <th style="text-align: center;">Unit Cost</th>
            <th style="text-align: center;">Currency</th>
            <th style="text-align: center;">Supplier</th>
            <th style="text-align: center;">Storage Location</th> 
            <th style="text-align: center;">Photo</th>
        
             
            </tr>
        </thead>
        <tbody>
        <?php
               $selectcommon = "SELECT * FROM tbl_mim LIMIT 200";
               $stmt3 = pg_query($conn,$selectcommon);
                         

            while ($row = pg_fetch_assoc($stmt3)) {
               $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
               $item_code = $row['item_code']; // Assuming column names in PostgreSQL are in lowercase
               $item_name = $row['item_name'];
               $specification = $row['specification'];
               $uom = $row['uom'];
               $unitcost = $row['unit_cost'];
               $currency = $row['currency'];
               $storagelocation = $row['storage_location'];
              

               $stock = $row['stock'];
           
                echo '<tr>
                <td style="width: 35px;  text-align: center;">
                <i class="fa fa-check-circle checkbox-icon" id="icon-'.$id2.'"></i>
                <input type="hidden" name="selected[]" class="single-checkbox" id="'. $id2.'" value="'.$item_code.'">

           
                </td>
             

                <td style="font-size: 12px; text-align: center;">' . $row['item_code'] . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['item_name'] . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['specification'] . '</td>
                     <td style="font-size: 12px; text-align: center;">' . $row['stock'] . '</td>

                
                <td style="font-size: 12px; text-align: center;">' . $row['uom'] . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['unit_cost'] . '</td>
                <td style="font-size: 12px; text-align: center;">' . $row['currency'] . '</td>
                <td style="font-size: 12px; text-align: center; ">' . $row['specification'] . '</td>
                <td style="font-size: 12px; text-align: center; ">' . $row['storage_location'] . '</td>
                <td style="font-size: 12px; text-align: center; ">' . $row['specification'] . '</td>
                ';
        
      
        
                              

                              }

              
              ?>
        </tbody>
       
    </table>



<br>



  <div class="row">
    <div class="col-md-9"></div> <!-- Empty column to take up space on the left -->
    <div class="col-md-3">
      <div class="input-group mb-3">
        <button type="button" class="btn btn-primary float-right" style="width:150px;"  onclick="return confirm_approved()">Proceed</button>
      </div>
    </div>
  </div>


  </form>



<div class="container">
  <div class="row">
    <div class="col-md-6">
    <form id="itemForm">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"  style="width:150px; background-color:white;">Item Code</span>
        </div>
        <input type="text" class="form-control" id="itemcode" name="itemcode" readonly>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"  style="width:150px; background-color:white;">PO No.</span>
        </div>
        <input type="text" class="form-control" id="po_number" name="po_number" style="background-color: #F9D2D2;">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"  style="width:150px; background-color:white;">Item Name</span>
        </div>
        <input type="text" class="form-control"  id="itemname" name="itemname"  readonly>
      </div>
    </div>
 

    <div class="col-md-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"   style="width:150px; background-color:white;">Quantity</span>
        </div>
        <input type="text" class="form-control"  id="stock_quantity"  name="stock_quantity"  style="background-color: #F6F9D3;"  >
      </div>
    </div>


    <div class="col-md-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"   style="width:150px; background-color:white;">Specification</span>
        </div>
        <input type="text" class="form-control"  id="specification"  name="specification"  style="background-color: #F6F9D3;"  >
      </div>
    </div>

    
    <div class="col-md-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"   style="width:150px; background-color:white;">UOM</span>
        </div>
        <input type="text" class="form-control"  id="uom"  name="uom"  style="background-color: #F6F9D3;"  >
      </div>
    </div>

    <div class="col-md-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"   style="width:150px; background-color:white;">Supplier</span>
        </div>
        <input type="text" class="form-control"  id="supplier"  name="supplier"  style="background-color: #F6F9D3;"  >
      </div>
    </div>


    <div class="col-md-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"style="width:150px; background-color:white;">Unit Price</span>
        </div>
        <input type="text" class="form-control"   id="unit_cost" name="unit_cost"  style="background-color: #F6F9D3;">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"  style="width:150px; background-color:white;">Remarks</span>
        </div>
        <input type="text" class="form-control"  id="remarks"  name="remarks"  style="background-color: #F6F9D3;">
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:150px; background-color:white;">Received Date</span>
        </div>
        <input type="text"  class="form-control"  id="delivery_date" name="delivery_date"  style="background-color: #F6F9D3;">
      </div>
    </div>

    <div class="col-md-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:150px; background-color:white;">Warehouse</span>
        </div>
        <input type="text"  class="form-control"  id="warehouse" name="warehouse"  style="background-color: #F6F9D3;"  >
      </div>
    </div>

    <div class="col-md-6">
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:150px; background-color:white;">PIC</span>
        </div>
        <input type="text"  class="form-control"  id="pic" name="pic"  value ="<?php echo $fullname;?>" style="background-color: #F6F9D3;" readonly >
      </div>
    </div>


    <input type="hidden" name="updatedby" id="updatedby" value="<?php echo $fullname;?>">

    <input type="hidden" name="hiddenitemid" id="hiddenitemid" value="">

    <div class="col-md-6">
    <div class="input-group mb-3" >
    <button type="submit" class="btn btn-primary" style="width:150px;">Update</button>
    </div>
    </form>
    </div>



  </div>
</div>


 


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
          table.column(8).search(val ? '^' + val + '$' : '', true, false).draw();
        });

        // Hide loading GIF
        console.log('Hiding loading GIF');
        $('#loading').hide();
      },
      columnDefs: [
        { orderable: false, targets: [0,1, 2, 4, 5,6,7,8,9] }
      ]
    });
  });
</script>



<!-- JavaScript -->
<script>
  // jQuery
  $(document).on('click', '.checkbox-icon', function() {
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


<script>
function confirm_approved() {
    var checkboxes = document.getElementsByClassName('single-checkbox');
    var checkedCheckbox = null;

    // Find the checked checkbox
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            if (checkedCheckbox === null) {
                checkedCheckbox = checkboxes[i];
            } else {
                // If more than one checkbox is checked, alert and return
                Swal.fire({
                    title: 'Only one item can be selected',
                    text: 'Please deselect the other item before proceeding.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return;
            }
        }
    }

    // If no checkbox is checked, alert and return
    if (checkedCheckbox === null) {
        Swal.fire({
            title: 'Kindly select Item Code',
            text: 'No selected Item Code detected!',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    // Show confirmation dialog with the selected checkbox
    Swal.fire({
        title: 'Are you sure you want to proceed with the selected Item Code?',
        html: 'Item Code: <br>' + checkedCheckbox.value,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, please proceed'
    }).then((result) => {
        if (result.isConfirmed) {
            var hiddenInput = document.getElementById('hiddenitemid');
            hiddenInput.value = checkedCheckbox.value;

            checkTransNo();
        }
    });
}

function checkTransNo() {
    $(document).ready(function() {
        var itemid = document.getElementById('hiddenitemid').value;

        if (itemid === "") {
            document.getElementById('itemcode').value = "";
            document.getElementById('itemname').value = "";
            document.getElementById('specification').value = "";
            document.getElementById('stock_quantity').value = "";
            document.getElementById('unit_cost').value = "";
            document.getElementById('po_number').value = "";
            document.getElementById('delivery_date').value = "";
            document.getElementById('remarks').value = "";
            document.getElementById('specification').value = "";
            document.getElementById('uom').value = "";
            document.getElementById('supplier').value = "";
            document.getElementById('warehouse').value = "";


                  



        } else {
            $.ajax({
                url: "process_data_iteminput.php",
                method: "POST",
                data: { itemIdentification: itemid },
                dataType: "JSON",
                success: function(data) {
                    if (data) {
                    
                    $('#itemcode').val(data.item_code);
                    $('#itemname').val(data.item_name);
                    $('#specification').val(data.specification);
                    $('#stock_quantity').val(data.stock_quantity);
                    $('#unit_cost').val(data.unit_cost);
                    $('#po_number').val(data.po_number);
                    $('#delivery_date').val(data.delivery_date);
                    $('#remarks').val(data.remarks);
                    $('#uom').val(data.uom);
                    $('#supplier').val(data.supplier);
                    $('#warehouse').val(data.warehouse);
               


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
                        text: 'An error occurred while fetching...',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            });
        }
    });
}
</script>

<script>
$(document).ready(function() {
  // Handle form submission
  $('#itemForm').on('submit', function(event) {
    event.preventDefault(); // Prevent default form submission

    // Validate itemcode field
    var itemCodeValue = $('#itemcode').val().trim();
    if (itemCodeValue === '') {
      Swal.fire({
        title: 'Error',
        text: 'Item Code cannot be empty!',
        icon: 'error',
        confirmButtonText: 'OK'
      });
      return; // Exit the function if validation fails
    }

    // Gather form data
    var formData = $(this).serializeArray();
    formData.push({ name: 'updatedby', value: $('#updatedby').val() });
    formData.push({ name: 'hiddenitemid', value: $('#hiddenitemid').val() });

    // AJAX call to update database
    $.ajax({
      url: 'item-input-update.php', // Replace with your server-side script for database update
      method: 'POST',
      data: formData,
      success: function(response) {
        // Handle success response
        console.log('Database updated successfully.');
        console.log(response); // Log the response to see the query output
        // Show success message
        Swal.fire({
          title: 'Success',
          text: 'Database updated successfully!',
          icon: 'success',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            location.reload();  // Reload the page
          }
        });
      },
      error: function() {
        // Handle error
        console.error('Error updating database.');
        // Show error message
        Swal.fire({
          title: 'Error',
          text: 'An error occurred while updating the database.',
          icon: 'error',
          confirmButtonText: 'OK'
        });
      }
    });
  });
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



<script>
        // Function to check if either dropdown has a value selected
        function checkDropdowns() {
            const materialDropdown = document.getElementById('select4-material');
            const warehouseDropdown = document.getElementById('select4-warehouse');
            const searchButton = document.getElementById('search-button');
            const itemnameSearch = document.getElementById('itemnameSearch');
            const itemcodeSearch = document.getElementById('itemcodeSearch');

            if (materialDropdown.value !== '' && warehouseDropdown.value !== '') {
                searchButton.disabled = false;
                itemnameSearch.disabled = false;
                itemcodeSearch.disabled=false;
                itemcodeSearch.style.backgroundColor = '#F6F9D3'; // Corrected line
                itemnameSearch.style.backgroundColor = '#F6F9D3'; // Corrected line
         

            } else {
                searchButton.disabled = true;
                itemnameSearch.disabled = true;
                itemcodeSearch.disabled=true;
                itemnameSearch.value = ''; // Clear itemnameSearch value
                itemcodeSearch.value = ''; // Clear itemcodeSearch value
                itemcodeSearch.style.backgroundColor = '#E9ECEF'; // Corrected line
                itemnameSearch.style.backgroundColor = '#E9ECEF'; // Corrected line
              
                
            }

        }

        // Add event listeners to dropdowns
        document.getElementById('select4-material').addEventListener('change', checkDropdowns);
        document.getElementById('select4-warehouse').addEventListener('change', checkDropdowns);
        document.getElementById('itemnameSearch').addEventListener('change', checkDropdowns);
        document.getElementById('itemcodeSearch').addEventListener('change', checkDropdowns);

        // Initial check
        checkDropdowns();
  </script>











