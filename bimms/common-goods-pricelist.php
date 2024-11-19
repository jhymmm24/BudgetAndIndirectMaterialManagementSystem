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


$currentDateTime = date('Y-m-d H:i:s'); // Example format: 2024-06-13 15:30:00



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


                
      
.button-cus2{
    display: inline-block;
                outline: 0;
                cursor: pointer;
                border-radius: 6px;
                border: 2px solid #2E7798;
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
                    background-color: #A6D6D6;
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
    





          <div class="card" >
            <div class="card-body">
              <h2 class="card-title"> Current Average Unit Price</h2>
 



              <br>

              <div class="col-md-3">
                  <div class="form-floating">
                  <label for="floatingSelect" style="font-size:15px;">Select Fiscal Year :</label>



                <select class="form-select"   id="selectedComboType" aria-label="State" style="font-size:15px;">
                       <option selected>-</option>
                        <option value="FY2020">FY 2020</option>
                        <option value="FY2021">FY 2021</option>
                        <option value="FY2022">FY 2022</option>
                        <option value="FY2023">FY 2023</option>
                        <option value="FY2024">FY 2024</option>

                      
                   
                    </select>
                </div>
                </div>
             

                <div style="text-align: right;"> 
                <button type="button" class="button-cus1" data-toggle="modal" data-target="#myModal"  style="position: relative; width: 100px;"  >
             <i class="fa fa-plus" style="color:black; margin-right:10px;"aria-hidden="true"></i>
               ADD
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

                                    <form action="common-goods-data.php?user=<?php echo $fullname;?>" id="form1"  method="post" enctype="multipart/form-data">
                              
                                          <br>


                                       <div class="input-group mb-3">
                                       <input type="file" class="form-control" id="file" name="file" accept=".xlsx, .xls" required>

                                     
                                       </div>

                               

                               

                                       

                                      
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                       <button type="submit" class="btn btn-success">Upload</button>
                                       <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                 </div>
                              </div>
                           </div>





            <button type="button" class="button-cus2" role="button" style="position: relative; width: 100px;"  onclick="return confirm_edit()"   ><i class="fa fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
               EDIT
            </button>
            </div>

            

            <br>
              
           <div id="loading">
             
          <img src="bimms/images/logo/loadinggif.gif" alt="Loading...">
        </div>

<br>


        <div id="table-container"   ></div>

            <script>
            $(document).ready(function(){
            $('#selectedComboType').change(function(){
            var selectedOption = $(this).val();
            var usercategory = "<?php echo $usercategory; ?>"; // Assuming $usercategory is a PHP variable
            $.ajax({
            url: 'display_table.php',
            method: 'POST',
            data: {option: selectedOption, usercategory: usercategory},
            success: function(response){
            $('#table-container').html(response);
            }
            });
            });
            });
            </script>

         



<br>





  </div>
<br>


 





             

 
 


                  
                     
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   </body>
</html>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        // // Show loading GIF
        // $('#loading').show();

        // Initialize DataTable
        let table = new DataTable('#example24', {
            initComplete: function () {
                // // Hide loading GIF
                // $('#loading').hide();

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
      html: 'File Name: <br>' + (vals.length > 0 ? vals.join('<br>') : '') +
            '<br><br><input type="file"   id="fileedit" name="fileedit" accept=".xlsx, .xls" />' +
            '<br><br><select id="editOption" class="form-control" required>' +
            '<option value="-" disabled selected>-</option>' +
            '<option value="GA">GA</option>' +
            '<option value="IT">IT</option>' +
            '<option value="MIM">MIM</option>' +
            '<option value="PIM">PIM</option>' +
            '<option value="PNJ">PNJ</option>' +
            '</select>',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, edit it!',
      preConfirm: () => {
        const editOption = document.getElementById('editOption').value;
        if (editOption === '-') {
          Swal.showValidationMessage('Please choose an option from the dropdown.');
          return false;
        }
        return true;
      }
    }).then((result) => {
      if (result.isConfirmed) {
        const fileInput = document.getElementById('fileedit');
        const file = fileInput.files[0];
        const editOption = document.getElementById('editOption').value;

        if (file) {
          const formData = new FormData();
          formData.append('fileedit', file); // Ensure 'file' matches the expected key in your PHP script
          formData.append('editOption', editOption);

          const url = `sqlupdates.php?action=commongoodsedit&category=${editOption}&user=<?php echo $fullname?>&time=<?php echo $currentDateTime?>&fileNames=${encodeURIComponent(vals.join(','))}`;

          console.log('URL:', url); // Log the constructed URL for verification

          fetch(url, {
            method: 'POST',
            body: formData
          })
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            return response.text();
          })
          .then(data => {
            console.log('Response:', data);
            Swal.fire('Success', 'Items edited successfully!', 'success');
            // Optionally, handle further actions after successful edit
          })
          .catch(error => {
            console.error('Error:', error);
            Swal.fire('Error', 'Failed to edit items. Please try again later.', 'error');
          });
        } else {
          Swal.fire('No file selected', 'Please select a file to upload.', 'error');
        }
      }
    });
  } else {
    Swal.fire('No items selected', 'Please select at least one item to edit.', 'warning');
  }
}
</script>

<script>
        $(document).ready(function() {
          var usercategory = <?php echo json_encode($usercategory); ?>;

        

            if (usercategory === 'user') {
                $('.button-cus1').hide();
                $('.button-cus2').hide();
            }else if(usercategory === 'admin'){
              $('.button-cus1').show();
              $('.button-cus2').show();
            }
        });
    </script>



<!-- 

<script>
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
      html: 'File Name: <br>' + (vals.length > 0 ? vals.join('<br>') : '') +
            '<br><br><input type="file" id="fileUpload" accept=".xlsx, .xls" />' +
            '<br><br><select id="editOption" class="form-control" required>' +
            '<option value="-" disabled selected>-</option>' +
            '<option value="GA">GA</option>' +
            '<option value="IT">IT</option>' +
            '<option value="MIM">MIM</option>' +
            '<option value="PIM">PIM</option>' +
            '<option value="PNJ">PNJ</option>' +
            '</select>',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, edit it!',
      preConfirm: () => {
        const editOption = document.getElementById('editOption').value;
        if (editOption === '-') {
          Swal.showValidationMessage('Please choose an option from the dropdown.');
          return false;
        }
        return true;
      }
    }).then((result) => {
      if (result.isConfirmed) {
        const fileInput = document.getElementById('fileUpload');
        const file = fileInput.files[0];
        const editOption = document.getElementById('editOption').value;

        if (file) {
          const formData = new FormData();
          formData.append('file', file);
          // formData.append('selectedTransactionNumber', vals.join(','));
          formData.append('editOption', editOption);

          const url = `sqlupdates.php?action=commongoodsedit&category=${editOption}&user=<?php echo $fullname?>&time=<?php echo $currentDateTime?>`;

          console.log('URL:', url); // Log the constructed URL for verification

          fetch(url, {
            method: 'POST',
            body: formData
          })
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            return response.text();
          })
          .then(data => {
            console.log('Response:', data);
            Swal.fire('Success', 'Items edited successfully!', 'success');
            // Optionally, handle further actions after successful edit
          })
          .catch(error => {
            console.error('Error:', error);
            Swal.fire('Error', 'Failed to edit items. Please try again later.', 'error');
          });
        } else {
          Swal.fire('No file selected', 'Please select a file to upload.', 'error');
        }
      }
    });
  } else {
    Swal.fire('No items selected', 'Please select at least one item to edit.', 'warning');
  }
}
</script>




 -->
