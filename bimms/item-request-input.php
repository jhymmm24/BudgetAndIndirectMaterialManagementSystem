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


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


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
            .green {
                    background-color: green !important; /* Ensure red background color is applied */

                  
                }

            .highlight-green {
                  background-color: green;
                }

                .highlight-red {
                  background-color: red;
                }


                

                #example24 th {
                background-color: #D3D3D3;
                color: #616173;
              
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
                              
                           
                           <h2 style="margin-top:20px;">Item Requesting</h2>
                           
                          
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

                      <button class="btn item-button" data-option="PIM" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
                          <i class="fa-solid fa-gears" style="font-size: 26px;"></i> <span style="vertical-align: middle;">PIM</span>
                      </button>

                      <button class="btn item-button" data-option="MIM" style="background-color:#FF5722; color:white; width:150px; height: 50px; font-size: 18px; margin-right:10px; padding: 0;">
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





       

</div>
</div>

<br>
        
<div class="card" >
            <div class="card-body">
              <h5 class="card-title"></h5>
                    
                 

  <div class="row">
      <div class="col-md-6 col-lg-6">
            <div class="form-group">
               <label for="input1">Section</label>
               <input type="text" class="form-control" id="input1" placeholder="<?php echo $section?> Section " readonly>
            </div>
          
                  

      </div>

      


      
<!-- 
      <div class="col-md-6 col-lg-6">
         <div class="form-group">
            <label for="input_itemcode">Item Code</label>
            <input type="text" class="form-control" id="input_itemcode" placeholder="Input Item Code Here">
         </div>
         <div class="form-group">
            <label for="input_itemname">Item Name</label>
            <input type="text" class="form-control" id="input_itemname" placeholder="Input Item Name Here">
         </div>
      </div> -->

     
      
</div>
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
        <select class="form-control cost-center-dropdown" id="cost_center" name="cost_center">
            <option value="">Select Cost Center</option>
            <?php echo $options_html; ?>
        </select>
    </div>
</div>

    
<!-- AJAX for dynamically populating lines dropdown based on cost center -->
<input type="hidden" id="line_hidden" name="line_hidden">
<script>jQuery(document).ready(function($) {
    // Array of enabled cost centers
    var enabledCostCenters = ['4171', '4172', '4173', '4175'];

    function toggleSecondDropdown() {
        var selectedCostCenter = $('#cost_center').val();
        var $lineDropdown = $('.line-dropdown');

        if (selectedCostCenter === '' || !enabledCostCenters.includes(selectedCostCenter)) {
            $lineDropdown.prop('disabled', true);
            $lineDropdown.html('<option value="">Select Line</option>');
        } else {
            $lineDropdown.prop('disabled', false);
            $.ajax({
                url: 'get_lines.php',
                method: 'POST',
                data: { cost_center: selectedCostCenter },
                success: function(response) {
                    $lineDropdown.html(response);
                    $('#line_hidden').val($lineDropdown.val());
                }
            });
        }

    }

    // Call the function when the document is ready
    toggleSecondDropdown();

    // Call the function when the first dropdown changes
    $('#cost_center').change(function() {
        toggleSecondDropdown();
    });

    // Update hidden input when the second dropdown changes
    $('.line-dropdown').change(function() {
        $('#line_hidden').val($(this).val());
    });
});
</script>

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
<div class="row">
            <div class="col-12 text-right">
                <button type="button" class="button-cus1" role="button" style="position: relative;" onclick="return confirm_search()" id="search-button">
                    <i class="fa fa-search" style="color:black;"></i> <!-- Font Awesome icon -->
                    Search
                </button>
            </div>
        </div>


<br>
<br>

<form>




         
    <?php
    // PHP code to fetch initial data and set $selectedItems
$selectcommon = "SELECT * FROM tbl_mim  ";
$qry_selectcommon = pg_query($conn, $selectcommon);
$selectedItems = isset($_POST['selected']) && is_array($_POST['selected']) ? $_POST['selected'] : [];

    ?>
<table id="example24" class="display" style="width:100%; overflow-x: auto; white-space: nowrap; display: block;">
    <thead>
        <tr>
            <th style="text-align: center;">Add to Cart</th>
            <th style="text-align: center;">Item Code</th>
            <th style="text-align: center;">Item Name</th>
            <th style="text-align: center;">Specification</th>
            <th style="text-align: center;">UOM</th>
            <th style="text-align: center;">Available Stock Quantity</th>
            <th style="text-align: center;">Storage Location</th>
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

                                  
                    <button type="button" class="button-cus1" role="button" style="justify-content: left; position: relative;" onclick="return confirm_cart('<?php echo $fullname; ?>')">
                        <i class="fa-solid fa-cart-plus"></i> <!-- Font Awesome icon -->
                        Add Item
                        <span class="badge" id="badgeValue">0</span> <!-- Badge with initial value -->
                    </button>
              
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

    


    <table id="example25" class="display" style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;"  >
<thead>
  
  <tr>
  <th style="text-align: center;">Remove Item</th>
      <th style="text-align: center;">Transaction Number</th>                       
      <th style="text-align: center;">Item Code</th>
      <th style="text-align: center;">Item Name</th>
      <th style="text-align: center;">Specification</th>
      <th style="text-align: center;">Cost Center</th>
      <th style="text-align: center;">UOM</th>
      <th style="text-align: center;">Available Stock Quantity</th>
      <th style="text-align: center;">Section Name</th>
      <th style="text-align: center;">Section Stock</th>
      <th style="text-align: center;">Quantity</th>
      <th style="text-align: center;">Purpose</th>
      <th style="text-align: center;">Line</th>
      <th style="text-align: center;">Remarks</th>
     
  </tr>
</thead>
<tbody>
   
<?php


      $selectcommon = "SELECT * FROM tbl_mim_itemrequest";
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
        $costcenter = $row['cost_center'];
        $totaldemandquantity = $row['total_demand_quantity'];



          // Get the current month name
        $currentMonth = date('F'); // This will give you the full month name like 'June'

        // Generate the column name based on the current month
        $currentMonthColumn = strtolower($currentMonth); // Assuming the column names are in lowercase

        // Get total_demand_quantity from tbl_mim_approval
        $selectApproval = "SELECT \"$currentMonthColumn\" FROM tbl_mim_approval WHERE item_code = '$item_code2'";
        $stmtApproval = pg_query($conn, $selectApproval);

        // Check if the query was successful
        if ($stmtApproval) {
            $approvalRow = pg_fetch_assoc($stmtApproval);
            $total_demand_currentmonth = $approvalRow[$currentMonthColumn] ?? 0;
        } else {
            // Handle query failure
            $total_demand_currentmonth = 0;
        }



     
       
     
        $today = new DateTime();
        $currentMonth = $today->format('m'); // Get the current month as a number (1-12)

        // Define the previous 3 months (considering December as 0)
        $previousMonths = array(
          ($currentMonth - 3) % 12,
          ($currentMonth - 2) % 12,
          ($currentMonth - 1) % 12,
        );
    
        echo '<tr>
        <td style="width: 15px; text-align: center;">
            <i class="fa fa-trash checkbox-icon2" id="icon-' . $id3 . '" style="background-color:#E83636; padding: 5px; border-radius: 3px;"> Delete</i>
            <input type="hidden" name="selected[]" class="single-checkbox3" id="selected-' . $id3 . '" value="' . $item_code2 . '">
        </td>
        <td style="font-size: 12px; text-align: center;">' . $row['transaction_number'] . '</td>
        <td style="font-size: 12px; text-align: center;">' . $row['item_code'] . '</td>
        <td style="font-size: 12px; text-align: center;">' . $row['item_name'] . '</td>
        <td style="font-size: 12px; text-align: center;">' . $row['specification'] . '</td>
        <td style="font-size: 12px; text-align: center;">' . $row['cost_center'] . '</td>
        <td style="font-size: 12px; text-align: center;">' . $row['uom'] . '</td>
        <td style="font-size: 12px; text-align: center;">' . ($row['stock'] === null ? 0 : $row['stock']) . '</td>
        <td style="font-size: 12px; text-align: center;">' . $section . '</td>
        <td style="font-size: 12px; text-align: center;">' . $total_demand_currentmonth . '</td>
        <td style="font-size: 12px; text-align: center;">
            <input type="number" name="quantity[]" value="' . $row['quantity'] . '" onchange="validateQuantity(this, ' . $row['stock'] . ', ' . $total_demand_currentmonth . ')">
        </td>
        <td style="font-size: 12px; text-align: center;">
            <input type="text" name="purpose[]" value="' . $row['purpose'] . '">
        </td>

         <td style="font-size: 12px; text-align: center; ">
           <select class="form-control line-dropdown" name="line[]" disabled style="width:500px;">
            <option value="">Select Line</option>
        </select>
        </td>
        
        <td style="font-size: 12px; text-align: center;">
            <input type="text" name="remarks[]" value="' . $row['remarks'] . '">
        </td>
    </tr>';
                    

 }

    
    ?>
</tbody>

</table>




<br>
   



    <div class="row">

    
      <div class="col-12" style="display:flex; justify-content:right; align-items:left;">

      <!-- <button type="button" class="button-cus3" role="button" style="justify-content: left; position: relative;" onclick="return confirm_remove()">
        <i class="fa fa-trash" style="color:black;"></i>
        Remove Item
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
                           <select class="form-control" id="select4">
                           <option value="">Select Section Budget Controller</option>
                           <?php echo $options_html; ?>
                           </select>
                        </div>
 
             <div style="text-align: left;">
                  <button type="submit" class="button-cus1" role="button" style="position: relative;"  onclick="return confirm_submit()"  >
               SUBMIT
            </button>
       
            <div>
                     
 
            </div>
 <br>
           
   
 
 
 
               
 
               
      </div>
      </div>
      </div>
      </div>

               
   

            <!-- end Approver card -->
 <br>
 


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
   </body>
</html>



<script>
  // Declare table globally
  let table;
  document.addEventListener('DOMContentLoaded', function() {
  // Show loading GIF
  console.log('Showing loading GIF');
  $('#loading').show();

  // Initialize DataTable with Buttons
  table = new DataTable('#example24', {
    dom: 'Bfrtip', // Define the position of the Buttons
    buttons: [
     'excel' // Add the export buttons
    ],
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
      { orderable: false, targets: [1, 2, 4, 5] }
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
      let itemCode = $(this).find('td:nth-child(3)').text().trim(); // Assuming item code is in the 3rd column
      if (itemCode) {
        existingItemCodes.push(itemCode); // Add each item code to the array
      }
    });

    // Loop through each row of the first table
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
         confirm_cart('<?php echo $fullname; ?>'); // Call the confirmation function with $fullname
        }
    });
});

function confirm_cart(fullname) {
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
                    window.location.href = 'sqlupdates.php?action=itemrequest&selectedItemId=' + selectedItems.join(',') + '&fullname=' + encodeURIComponent(fullname) + '&selectedcostcenter=' + encodeURIComponent(selectedCostCenter);
                }
            });
        }
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
        { orderable: false, targets: [1,2,3,4,5,6,7,8,9] }
        ]
        });


        


  </script>









 
 









<script>document.addEventListener('DOMContentLoaded', function() {
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
   
    // Get the value of the input field with ID 'input1'
    var sectionValued = '<?php echo addslashes($section); ?>'; // Ensure $section is properly quoted and escaped in PHP

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
                form.action = 'process_data_itemrequest.php';

                // Create an input element for selectedItemId
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selectedItemId';
                input.value = vals.join(','); // Assuming vals is an array of selected item IDs

                // Add the input element to the form
                form.appendChild(input);

                // Create an input element for the value of 'sectionValued'
                var section = document.createElement('input');
                section.type = 'hidden';
                section.name = 'sectionValue';
                section.value = sectionValued;

                // Add the section element to the form
                form.appendChild(section);

                // Collect all input fields (number inputs and text inputs) and add them to the form
                var requestInputs = document.querySelectorAll('input[type="number"], input[type="text"]');
                requestInputs.forEach(function(input) {
                    var clonedInput = input.cloneNode();
                    clonedInput.value = input.value;
                    clonedInput.name = input.name;
                    form.appendChild(clonedInput);
                });

                   // Include hidden field for second dropdown values
                   var lineDropdowns = document.querySelectorAll('.line-dropdown');
              lineDropdowns.forEach(function(dropdown, index) {
                  var hiddenInput = document.createElement('input');
                  hiddenInput.type = 'hidden';
                  hiddenInput.name = 'lineValues[]'; // Array notation for multiple values
                  hiddenInput.value = dropdown.value;
                  form.appendChild(hiddenInput);
              });


                // Add the form to the document body
                document.body.appendChild(form);

                // Submit the form
                form.submit();

                // window.location.href = 'item-request-input.php';
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
          url: 'item-request-delete.php',
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




<script>
        // Function to check if either dropdown has a value selected
        function checkDropdowns() {
            const selectedcostcenter = document.getElementById('selectedcostcenter');
            const warehouseDropdown = document.getElementById('select4-warehouse');
            const searchButton = document.getElementById('search-button');
            const itemCode = document.getElementById('input_itemcode');
            const itemName = document.getElementById('input_itemname');

            if (warehouseDropdown.value !== '' && selectedcostcenter.value !== '') {
                searchButton.disabled = false;
            } else {
                searchButton.disabled = true;
            }
        }

        // Add event listeners to dropdowns
        
        document.getElementById('select4-warehouse').addEventListener('change', checkDropdowns);
        document.getElementById('selectedcostcenter').addEventListener('change', checkDropdowns);
        // document.getElementById('input_itemcode').addEventListener('change', checkDropdowns);
        // document.getElementById('input_itemname').addEventListener('change', checkDropdowns);

        // Initial check
        checkDropdowns();
    </script>




