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

 
/* Styles for screens smaller than 600px */
@media only screen and (max-width: 600px) {
  #example24_wrapper {
  
    overflow: auto;
  }
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
                              <h2 style="margin-top:20px;">Item Input Query & Modify</h2>
 
                           </div>
                        </div>
                     </div>
<!--                   
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
  -->
 
 
 
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
          { value: "Excess WH", text: "Excess WH" },
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

        if (warehouseOptions[selectedCategory]) {
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

                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"  style="width:150px; background-color:white; font-size:12px;"><span style="color:red;">*</span>Date Inputted From</span>
                  </div>
                  <input type="date" class="form-control" id="date_input_from" name="date_input_from" >
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
                    <span class="input-group-text"  style="width:150px; background-color:white; font-size:12px;"><span style="color:red;">*</span>Date Inputted To</span>
                  </div>
                  <input type="date" class="form-control" id="date_input_to" name="date_input_to" >
                </div>

            </div>

            <div class="col-md-6 col-lg-6">
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"  style="width:150px; background-color:white; font-size:12px;">Item Code</span>
                  </div>
                  <input type="text" class="form-control" id="itemcodeSearch" name="itemcodeSearch" >
                </div>
                </div>
                <div class="col-md-6 col-lg-6"> 
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
    <div class="card">
        <div class="card-body" style="overflow:scroll;">
            <h5 class="card-title"></h5>
            <table id="example24" class="display bordered-table" >
                <thead>
                    <tr>
                        <th style="text-align: center;">Received Date</th>
                        <th style="text-align: center;">Warehouse</th>
                        <th style="text-align: center;">Item Code</th>
                        <th style="text-align: center;">Item Name</th>
                        <th style="text-align: center;">Specification</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: center;">UOM</th>
                        <th style="text-align: center;">PO Number</th>
                        <th style="text-align: center;">Supplier</th>
                        <th style="text-align: center;">Unit Cost</th>
                        <th style="text-align: center;">Currency</th>
                        <th style="text-align: center;">Updated By</th>
                        <th style="text-align: center;">Remarks</th>
                        <th style="text-align: center;">Updated Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $selectcommon = "SELECT * FROM tbl_mim_update_history ORDER BY received_date DESC";
                    $stmt3 = pg_query($conn, $selectcommon);

                    while ($row = pg_fetch_assoc($stmt3)) {
                        echo '<tr>
                            <td style="font-size: 12px; text-align: center;">' . $row['received_date'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['warehouse'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['item_code'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['item_name'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['specification'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['stock'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['uom'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['po_number'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['supplier'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['unit_cost'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['currency'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['pic'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['remarks'] . '</td>
                            <td style="font-size: 12px; text-align: center;">' . $row['received_date'] . '</td>
                        </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</form>





             

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
        { orderable: false, targets: [1,2,3,4,6,7,8,10,11,12] }
      ],
      order: [[0, 'desc']] // Sort by the first column (received_date) in descending order
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
            const dateinputTo = document.getElementById('date_input_to');
            const dateinputFrom = document.getElementById('date_input_from');

            if (materialDropdown.value !== '' && warehouseDropdown.value !== '' && dateinputTo.value !== '' && dateinputFrom.value !== '') {
                searchButton.disabled = false;
            } else {
                searchButton.disabled = true;
            }
        }

        // Add event listeners to dropdowns
        document.getElementById('select4-material').addEventListener('change', checkDropdowns);
        document.getElementById('select4-warehouse').addEventListener('change', checkDropdowns);
        document.getElementById('date_input_to').addEventListener('change', checkDropdowns);
        document.getElementById('date_input_from').addEventListener('change', checkDropdowns);

        // Initial check
        checkDropdowns();
    </script>










