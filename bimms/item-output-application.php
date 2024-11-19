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
                border: 2px solid #D24747;
                color: BLACK;
                background: 0 0;
                padding: 8px;
                box-shadow: rgba(0, 0, 0, 0.07) 0px 2px 4px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1.5px 0px;
                font-weight: 800;
                font-size: 16px;
                height: 42px;
                width: 200px;
    }

    .button-cus1:hover .fa.fa-sign-out {
            color: white;
        }

        .button-cus1:hover {
            background-color: #D24747;
            color: white;
        }
        .button-cus1:disabled {
            cursor: not-allowed;
            background-color: gray;
            color: white;
            border-color: gray;
        }

      
        .button-cus2{
    display: inline-block;
                outline: 0;
                cursor: pointer;
                border-radius: 6px;
                border: 2px solid #1B85B8;
                color: BLACK;
                background: 0 0;
                padding: 8px;
                box-shadow: rgba(0, 0, 0, 0.07) 0px 2px 4px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1.5px 0px;
                font-weight: 800;
                font-size: 16px;
                height: 42px;
                width: 200px;
    }


        .button-cus2:hover {
            background-color: #1B85B8;
            color: white;
        }
        .button-cus2:disabled {
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

#example25 th {
    background-color: #D3D3D3;
    color: #616173;
   
}

        #example25 th,
        #example25 td {
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
.modal-backdrop {
            z-index: 1040 !important;
        }
        .modal {
            z-index: 1050 !important;
        }
        .input-group-text-clickable {
            cursor: pointer;
            background-color: white;
            border: 1px solid #ced4da;
            transition: background-color 0.3s ease, color 0.3s ease;
            font-size: 12px;
        }
        .input-group-text-clickable:hover {
            background-color: #367FA9 !important;
            color: white !important; /* Ensuring text color changes on hover */
        }


          /* Change cursor to pointer for transaction number cells */
    /* Hover effect for transaction number cells */
    .transaction-cell:hover {
            cursor: pointer;
            font-family: 'Arial', sans-serif; /* Change to your desired font family */
            font-size: 14px; /* Change to your desired font size */
            font-weight: bold; /* Change to your desired font weight */
            color: blue; /* Change to your desired font color */
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
                              <h2 style="margin-top:20px;">Item Output with Application</h2>
 
                           </div>
                        </div>
                     </div>
                  
                     <!-- <div class="row">
                      

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
                      
        
 
 </div> -->
 
 
 
 
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
          { value: "MIMCE1 - For Improvement", text: "MIMCE1 - For Improvement" },
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





<script>
    document.addEventListener("DOMContentLoaded", function() {
      const materialCategory = document.getElementById('select4-material');
      const purpose = document.getElementById('select4-purpose');

      const purposeOptions = {
        "IM_F1-MIM": [
          { value: "All Warehouse", text: "All Warehouse" },
          { value: "MIMCE2 - Newly Start-up", text: "MIMCE2 - Newly Start-up" },
          { value: "MIMCE3 - Sudden Broken/Machine Repair", text: "MIMCE3 - Sudden Broken/Machine Repair" },
          { value: "MIMCE4 - Preventive Maintenance Use", text: "MIMCE4 - Preventive Maintenance Use" },
          { value: "MIMCE5 - Machine Fabrication", text: "MIMCE5 - Machine Fabrication" },
          { value: "MIMCE6 - Others", text: "MIMCE6 - Others" },
          { value: "CIPFA - CIP:FIXED ASSET", text: "CIPFA - CIP:FIXED ASSET" }
        ],
        "IM_F2-PIM": [
          { value: "PIM3 - IM_Prod others", text: "PIM3 - IM_Prod others" },
          { value: "PIM4 - IM_Proportional", text: "PIM4 - IM_Proportional" }
        
        ],
        "IM_F2-PnJ": [
          { value: "PnJCE1 - IM_Prod others", text: "PnJCE1 - IM_Prod others" }
       
        ],
        "IM_F3-MIM": [
          { value: "All Warehouse", text: "All Warehouse" },
          { value: "MIMCE2 - Newly Start-up", text: "MIMCE2 - Newly Start-up" },
          { value: "MIMCE3 - Sudden Broken/Machine Repair", text: "MIMCE3 - Sudden Broken/Machine Repair" },
          { value: "MIMCE4 - Preventive Maintenance Use", text: "MIMCE4 - Preventive Maintenance Use" },
          { value: "MIMCE5 - Machine Fabrication", text: "MIMCE5 - Machine Fabrication" },
          { value: "MIMCE6 - Others", text: "MIMCE6 - Others" },
          { value: "CIPFA - CIP:FIXED ASSET", text: "CIPFA - CIP:FIXED ASSET" }
        ],
        "IM_F3-PIM": [
          { value: "PIM3 - IM_Prod others", text: "PIM3 - IM_Prod others" },
          { value: "PIM4 - IM_Proportional", text: "PIM4 - IM_Proportional" }
        
        ],
        "IM_F3-CTRG": [
          { value: "PIM1 - IM_Prod others", text: "PIM1 - IM_Prod others" }
         
        ],
        "GA": [
          { value: "Office Supplies", text: "Office Supplies" }
         
        ],
        "IT": [
          { value: "Common Goods", text: "Common Goods" }
         
        ]
        // Add more options for other Material Categories here
      };

      materialCategory.addEventListener('change', function() {
        const selectedCategory = this.value;

        // Clear the current warehouse options
        purpose.innerHTML = '<option value="">-Select-</option>';

        if (purposeOptions[selectedCategory]) {
          purposeOptions[selectedCategory].forEach(option => {
            const opt = document.createElement('option');
            opt.value = option.value;
            opt.textContent = option.text;
            purpose.appendChild(opt);
          });
        }
      });
        // Set the default option for purpose when the page loads or when material category is not selected
  purpose.innerHTML = '<option value="">-Select-</option>';
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
                        <span class="input-group-text" style="width:150px; background-color:white; font-size:12px;">
                            <span style="color:red;">*</span>Material Category
                        </span>
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
            <button type="button" class="input-group-text input-group-text-clickable" data-bs-toggle="modal" data-bs-target="#applicationNumberModal">
                <span style="color:red;">*</span> Application Number
            </button>
        </div>
        <input type="text" class="form-control" id="applicationnumber" name="applicationnumber" style="background-color:#F6F9D3">
    </div>
</div>

               
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px; background-color:white;  font-size:12px;">Application Date</span>
              </div>
              <input type="text" class="form-control" id="applicationdate" name="applicationdate" readonly >
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
                <span class="input-group-text" style="width:150px; background-color:white;  font-size:12px;">Section</span>
              </div>
              <input type="text" class="form-control" id="section" name="section" readonly >
            </div>

            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width:150px; background-color:white;  font-size:12px;">Requestor</span>
              </div>
              <input type="text" class="form-control" id="requestor" name="requestor" readonly >
            </div>




            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="applicationNumberModal" tabindex="-1" aria-labelledby="applicationNumberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applicationNumberModalLabel">Output Application List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="example25" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th style="text-align: center;">Transaction Number</th>
                            <th style="text-align: center;">Request Date</th>
                            <th style="text-align: center;">Section</th>
                            <th style="text-align: center;">Requestor Name</th>
                            <th style="text-align: center;">Item Count</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $selectcommon = "SELECT transaction_number, MIN(request_date) AS request_date, MIN(section) AS section, MIN(requestor_name) AS requestor_name, COUNT(*) AS item_count, MIN(approved_qty) AS approved_qty FROM tbl_mim_itemrequest_approval WHERE request_status = 'For Item Out' GROUP BY transaction_number";
                            $stmt3 = pg_query($conn, $selectcommon);
                            while ($row = pg_fetch_assoc($stmt3)) {
                                echo '<tr>';
                                echo '<td style="font-size: 12px; text-align: center;" class="transaction-cell" data-transaction="' . $row['transaction_number'] . '">' . $row['transaction_number'] . '</td>';
                                echo '<td style="font-size: 12px; text-align: center;">' . $row['request_date'] . '</td>';
                                echo '<td style="font-size: 12px; text-align: center;">' . $row['section'] . '</td>';
                                echo '<td style="font-size: 12px; text-align: center;">' . $row['requestor_name'] . '</td>';
                                echo '<td style="font-size: 12px; text-align: center;">' . $row['item_count'] . '</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #EA5564;">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function saveApplicationNumber() {
        const modalInput = document.getElementById('modalApplicationNumber').value;
        const applicationNumberInput = document.getElementById('applicationnumber');
        applicationNumberInput.value = modalInput;
        const modal = bootstrap.Modal.getInstance(document.getElementById('applicationNumberModal'));
        modal.hide();
    }
</script>

<br>
<!-- New Card for Transaction Details -->
<div class="card">
    <div class="card-body">


        <h5 class="card-title">Transaction Details</h5>

        
        <div class="row">
            <div class="col-12 text-right">
                <button type="button" class="button-cus2" role="button" style="position: relative;"   id="print-button">
                    <i class="fa fa-print" style="color:black;"></i> <!-- Font Awesome icon -->  <a href="item-outputprint.php?transaction_number=" id="item-outputprint">Print</a>
                 
                </button>
            </div>
        </div>

     
      

     
      <!-- JavaScript to dynamically update the href -->
      <script>
          // Function to update the href attribute of the anchor tag
          function updatePrintHref() {
              // Get the value of the applicationnumber input field
              var applicationNumberValue = document.getElementById('applicationnumber').value;
              
              // Construct the new href with the application number value
              var newHref = "item-outputprint.php?transaction_number=" + encodeURIComponent(applicationNumberValue);
              
              // Update the href attribute of the anchor tag
              document.getElementById('item-outputprint').setAttribute('href', newHref);
          }

          // Attach an event listener to update href when anchor tag is clicked
          document.getElementById('item-outputprint').addEventListener('click', updatePrintHref);
      </script>

        <br>

        <div id="transaction-details">
            <!-- Detailed table will be inserted here -->
        </div>

        <br>

        

        
      

    
        <div class="row">

            <div class="col-6 text-right">
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                
                  </div>
   
            </div>
            </div>
            

            <div class="col-6 text-right">
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:150px; background-color:white;  font-size:12px;">Date</span>
                  </div>
                  <input type="date" class="form-control" id="date" name="date"  style="background-color: #F6F9D3;">
            </div>
            </div>


            
            <div class="col-6 text-right">
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                
                  </div>
   
            </div>
            </div>
            

            <div class="col-6 text-right">
            <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" style="width:150px; background-color:white;  font-size:12px;">PIC</span>
                  </div>
                  <input type="text" class="form-control" id="pic" name="pic"  style="background-color: #F6F9D3;">
            </div>
            </div>


        </div>


        <div class="row">
            <div class="col-12 text-right">
                <button type="button" class="button-cus1" role="button" style="position: relative;" onclick="return confirm_search()"  id="output-button">
                    <i class="fa fa-sign-out" style="color:black;"></i> <!-- Font Awesome icon -->
                    Output
                </button>
            </div>
        </div>



    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>





<script>
document.addEventListener('DOMContentLoaded', function() {
    const transactionCells = document.querySelectorAll('.transaction-cell');

    transactionCells.forEach(cell => {
        cell.addEventListener('dblclick', function() {
            const transactionNumber = this.getAttribute('data-transaction');

            // Perform an AJAX request to fetch details
            $.ajax({
                url: 'item-outputapplication-details.php',
                method: 'GET',
                data: { transaction_number: transactionNumber },
                success: function(response) {
                    // Parse the response (assuming it's JSON)
                    const data = JSON.parse(response);

                    // Populate the application number input field
                    const applicationNumberInput = document.getElementById('applicationnumber');
                    applicationNumberInput.value = data.applicationNumber;

                    const sectionInput = document.getElementById('section');
                    sectionInput.value = data.section;

                    const requestorInput = document.getElementById('requestor');
                    requestorInput.value = data.requestor;

                    const applicationdateInput = document.getElementById('applicationdate');
                    applicationdateInput.value = data.applicationdate;

                    // Insert the response into the transaction details div
                    const detailsDiv = document.getElementById('transaction-details');
                    detailsDiv.innerHTML = data.detailsHtml;

                    // Check if DataTable is already initialized
                    if ($.fn.DataTable.isDataTable('#example25')) {
                        // Destroy the existing DataTable instance
                        $('#example25').DataTable().clear().destroy();
                    }

                    // Initialize DataTable for the new table
                    $('#example25').DataTable({
                        columnDefs: [{ orderable: false, targets: [] }]
                    });
                },
                error: function(xhr, status, error) {
                    // Handle error if needed
                    Swal.fire('Error', 'Failed to fetch transaction details.', 'error');
                }
            });
        });
    });
});
</script>


<?php 
$dateTODAY = date('Y-m-d h:i:s A');

?>


<!-- jQuery script to handle dropdown change -->

<!-- jQuery script to handle dropdown change -->
<script>
    $(document).ready(function() {
        $('#requestor').change(function() {
            var adid = $(this).val(); // Get selected user's adid
            if (adid !== '') {
                // AJAX call to fetch section based on adid
                $.ajax({
                    url: 'fetch_outputinfo_s.php',
                    type: 'POST',
                    data: { adid: adid },
                    dataType: 'json',
                    success: function(response) {
                        $('#section').val(response.section); // Update section input

                        // Check if section is retrieved before fetching cost_center
                        if (response.section !== '') {
                            // AJAX call to fetch cost_center based on section
                            $.ajax({
                                url: 'fetch_outputinfo_cs.php',
                                type: 'POST',
                                data: { section: response.section },
                                dataType: 'json',
                                success: function(response_cost_center) {
                                    var cost_center_dropdown = $('#cost_center');
                                    cost_center_dropdown.empty(); // Clear existing options
                                    cost_center_dropdown.append('<option value="">-Select-</option>'); // Add default option
                                    $.each(response_cost_center.cost_centers, function(index, cost_center) {
                                        cost_center_dropdown.append('<option value="' + cost_center.cost_center + '">' + cost_center.cost_center + ' - ' + cost_center.costcenter_name + '</option>');
                                    });
                                },
                                error: function(xhr, status, error) {
                                    console.error('AJAX Error: ' + status + ' - ' + error);
                                }
                            });
                        } else {
                            $('#cost_center').empty(); // Clear cost_center input if section is not retrieved
                            $('#cost_center').append('<option value="">-Select-</option>'); // Add default option
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ' + status + ' - ' + error);
                    }
                });
            } else {
                $('#section').val(''); // Clear section input if no user selected
                $('#cost_center').empty(); // Clear cost_center input if no user selected
                $('#cost_center').append('<option value="">-Select-</option>'); // Add default option
            }
        });
    });
</script>


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
      
            document.getElementById('stock_quantity').value = "";
          


                  



        } else {
            $.ajax({
                url: "process_data_iteminput.php",
                method: "POST",
                data: { itemIdentification: itemid },
                dataType: "JSON",
                success: function(data) {
                    if (data) {
                    
                    $('#itemcode').val(data.item_code);
                 
                    $('#stock_quantity').val(data.stock_quantity);
              
               


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
    formData.push({ name: 'savedby', value: $('#savedby').val() });
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

            if (materialDropdown.value !== '' && warehouseDropdown.value !== '') {
                searchButton.disabled = false;
            } else {
                searchButton.disabled = true;
            }
        }

        // Add event listeners to dropdowns
        document.getElementById('select4-material').addEventListener('change', checkDropdowns);
        document.getElementById('select4-warehouse').addEventListener('change', checkDropdowns);

        // Initial check
        checkDropdowns();
    </script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Show loading GIF

        $('#loading').show();

        // Initialize DataTable
        let table = new DataTable('#example25', {
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
                { orderable: false, targets: [] }
            ]
        });
    });
</script>





