
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

      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


      

<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
 


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     

      <style>
        .hidden {
            display: none;
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
                    background-color: #9DDAF9;
                    color: BLACK;
                }
    </style>
   </head>
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
<br>
         

<div class="card">
    <div class="card-body">
        <div class="row">

  
         
            <div class="col-md-12 col-lg-12">

          
            <div class="row">
               <div class="col-md-6 col-lg-6"> 
                  <div class="form-group">
                        <label for="input1">Section 1</label>
                        <input type="text" class="form-control" id="input1" placeholder="<?php echo $section ?> Section" readonly>
                  </div>
               </div>
               <div class="col-md-6 col-lg-6"> 
                  <div class="form-group" style="display:flex; justify-content:right; align-items:left; margin-top: 20px;">
                  <button type="button" class="button-cus1" data-toggle="modal" data-target="#myModal">
                  <i class="fa fa-refresh" style="color: black; margin-right: 10px;"></i>Update
                  </button>


                  
                                    <div class="modal fade" id="myModal">
                              <div class="modal-dialog">
                                 <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                       <h4 class="modal-title">Upload</h4>
                                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">

                                  

                                       <div class="input-group mb-3">
                                       <input type="file" class="form-control" id="inputGroupFile02">
                                     
                                       </div>

                                      

                               

                                       

                                      
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                       <button type="button" class="btn btn-success">Upload</button>
                                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                 </div>
                              </div>
                           </div>

                 
                  </div>
               </div>
            </div>


            <div class="row">
               <div class="col-md-6 col-lg-6"> 
                
               <div class="form-group">
                    <label for="select2">Cost Center</label>
                    <?php
                    // Perform the SQL query to fetch the options
                    $query = "SELECT cost_center, costcenter_name FROM tbl_costcenter WHERE section = '$section'";
                    $result = pg_query($query);

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
                    <select class="form-control" id="select4">
                        <option value="">Select Cost Center</option>
                        <?php echo $options_html; ?>
                    </select>

            </div>
               </div>
               <div class="col-md-6 col-lg-6"> 
                  <div class="form-group" style="display:flex; justify-content:right; align-items:left; margin-top: 20px;">
                  <input type="checkbox" id="toggleSwitch" data-toggle="switchbutton" checked data-onlabel="Fixed Cost" data-offlabel="Fixed Asset" data-onstyle="success" data-offstyle="danger">
                  </div>
               </div>
            </div>
  
           
        </div>
      
        
        <br>
        
        <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                        
                        </div>
                     </div>
                
                    
                  <div class="row column1">
                     <div class="col-lg-12">
                        <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Expense Budget Status</h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                 <canvas id="line_chart" class="w-100" style="height: 200px;"></canvas>
                              </div>
                        </div>
                     </div>
                  </div>

                  <div class="row column1">
                     <div class="col-lg-12">
                        <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Fixed Asset Budget Status</h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info" >
                                 <canvas id="myChart" class="w-100" height= "50px;" ></canvas>
                              </div>
                        </div>
                     </div>
                  </div>

    
                  </div>        
               </div>
          </div>
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

      <script>
    $(document).ready(function() {
        $('#toggleSwitch').change(function() {
            if ($(this).prop('checked')) {
                $('.row.column1:first').show();
                $('.row.column1:last').hide();
            } else {
                $('.row.column1:first').hide();
                $('.row.column1:last').show();
            }
        });

        // Initialize state
        if ($('#toggleSwitch').prop('checked')) {
            $('.row.column1:first').show();
            $('.row.column1:last').hide();
        } else {
            $('.row.column1:first').hide();
            $('.row.column1:last').show();
        }
    });
</script>



      
    <script>
        async function fetchData() {
            const response = await fetch('graphdata.php');
            const data = await response.json();
            return data;
        }

        fetchData().then(data => {
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'bar', // Initial chart type
                data: {
                    labels: data.labels,
                    datasets: [
                        {
                            type: 'bar',
                            label: 'Bar Dataset',
                            data: data.barData,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        },

                        {
                            type: 'line',
                            label: 'Line Dataset',
                            data: data.lineData,
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                            borderColor: 'rgba(153, 102, 255, 1)',
                            borderWidth: 2,
                            fill: false
                        }
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>



   </body>
</html>