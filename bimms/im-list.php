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



<div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              
                           
                           <h2>IM LIST</h2>
                           
                          
                           </div>
                        </div>
                     </div>


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
                                    
                     
                      <br>

                      
                     </div>






          <div class="card" >
            <div class="card-body">
          
            <?php
$file = 'template\Template - IM LIST.xlsx';



// Function to sanitize the filename
function sanitizeFilename($filename) {
    $filename = basename($filename); // Get the basename of the file
    return preg_replace("/[^a-zA-Z0-9\s\-\.\_\(\)]+/", "", $filename); // Remove unwanted characters
}

// Sanitize the filename
$filename = sanitizeFilename($file);
?>

<div style="text-align: right;"> 
    <a href="<?php echo htmlspecialchars($file); ?>" download="<?php echo htmlspecialchars($filename); ?>" style="text-decoration: none;">
        <button type="button" class="button-cus1" name="btntemplate" id="btntemplate"style="position: relative; width: 250px;">
            <i class="fa fa-download" style="color:black; margin-right:10px; font-size: 15px;" aria-hidden="true"></i>
            DOWNLOAD TEMPLATE
        </button>
    </a>
</div>

<br>



  
<div style="text-align: right;"> 

  


 
<button type="button" data-toggle="modal" data-target="#myModal" name="btnupload" id="btnupload" onclick="showSelectedValue()" class="button-cus2" role="button" style="position: relative; width: 150px;">
    <i class="fa-solid fa-file-upload" style="color:black; margin-right:10px;" aria-hidden="true"></i> UPLOAD
</button>


<button type="button"  data-toggle="modal" data-target="#myModalAdd"  name="btnadd" id="btnadd" onclick="showSelectedValueAdd()" class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fa-solid fa-plus" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            ADD
</button>


<button type="button"  class="button-cus2" role="button"  name="btnedit" id="btnedit"  style="position: relative; width: 150px;"   onclick="return confirm_edit()"   ><i class="fa-solid fa-pencil" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            EDIT
</button>




<button type="button"  data-toggle="modal" data-target="#myModalAddLIST"  name="btnaddlist" id="btnaddlist" onclick="return confirm_addlist()"  class="button-cus2" role="button" style="position: relative; width: 150px;  "    ><i class="fa-solid fa-plus" style="color:black; margin-right:10px;"aria-hidden="true"></i>
            ADD TO LIST
</button>


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
    <select class="form-control" id="cost_center" name="cost_center">
      <option value="">Select Cost Center</option>
      <?php echo $options_html; ?>
    </select>
  </div>
</div>



  <div class="col-md-3" hidden>
    <div class="form-floating">
        <label for="floatingSelect" style="font-size:15px;">Select Item Category :</label>
        <select class="form-select" id="selectedComboType" aria-label="State" style="font-size:15px;">
            <option selected>-</option>
            <option value="ALL">ALL</option>
            <option value="GA">GA</option>
            <option value="IT">IT</option>
            <option value="PIM">PIM</option>
            <option value="MIM">MIM</option>
            <option value="PNJ">PNJ</option>
        </select>
    </div>
</div>

<!-- Modal HTML -->
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
                <form id="form1" enctype="multipart/form-data">
                    <div id="selectedValueDisplay">
                        <p>Selected option: <span id="selectedValue"></span></p>
                    </div>
                    <br>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="file" name="file" accept=".xlsx, .xls" required>
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
</div>

<input type="text" hidden name="hiddenitemid" id="hiddenitemid" value="">



<!-- Modal HTML -->
<div class="modal fade" id="myModalAdd">
<div class="modal-dialog custom-modal-width">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">IM List- Add</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                
                    <div id="selectedValueDisplay">
                        <p>Selected option: <span id="selectedValueAdd"></span></p>
                    </div>
                    <br>
                   
                    <h4>Item Details</h4>



   <form action="item-list-sql.php?user=<?php echo $fullname;?>" id="form1" method="post" enctype="multipart/form-data">

   <input type="hidden" name="action" value="additemlist">

 


    <div class="container">
  <div class="row  align-items-center">

    <div class="col-md-5 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:150px; background-color:white;">OS Code</span>
        </div>
        <input type="text" class="form-control" id="oscode" name="oscode">
      </div>
    </div>

    <div class="col-md-5 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:150px; background-color:white;">Item Code</span>
        </div>
        <input type="text" class="form-control" id="itemcode" name="itemcode" required>
      </div>
    </div>

    <div class="col-md-5 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:150px; background-color:white;">Item Name</span>
        </div>
        <input type="text" class="form-control" id="itemname" name="itemname" required>
      </div>
    </div>

    <div class="col-md-5 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:150px; background-color:white;">Specification</span>
        </div>
        <input type="text" class="form-control" id="specification" name="specification" required>
      </div>
    </div>

    <div class="col-md-5 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:150px; background-color:white;">PE UOM</span>
        </div>
        <input type="text" class="form-control" id="peuom" name="peuom" required>
      </div>
    </div>

    <div class="col-md-5 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:150px; background-color:white;">PE Unit Price / Cost</span>
        </div>
        <input type="text" class="form-control" id="peunitcost" name="peunitcost" required>
      </div>
    </div>

          <div class="col-md-5 mb-3">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" style="width:150px; background-color:white;">Conversion</span>
            <div class = 'form-container d-flex'>
                <input class="form-control" type="text" id="con1" name="con1" style="text-align:center;">
                <input class="form-control" type="text" id="con2" name="con2" style="text-align:center;">
                <input class="form-control" type="text" id="con3" name="con3" style="text-align:center;" placeholder="=" readonly >
                <input class="form-control" type="text" id="con4" name="con4" style="text-align:center;">
                <input class="form-control" type="text" id="con5" name="con5" style="text-align:center;">
            </div>
          </div>
         
        </div>
      </div>

    <div class="col-md-5 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:150px; background-color:white;">Inventory Out</span>
        </div>
        <!-- <input type="text" class="form-control" id="inventoryout" name="inventoryout" required> -->

        <select class="form-control" id="selectedComboType" name="selectedComboType" aria-label="State" style="font-size:15px;">
    <option selected>-</option>
    <option value="YES">YES</option>
    <option value="NO">NO</option>
</select>


      </div>
    </div>

    <div class="col-md-5 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:150px; background-color:white;">FI UOM</span>
        </div>
        <input type="text" class="form-control" id="fiuom" name="fiuom" >
      </div>
    </div>

    <div class="col-md-5 mb-3">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" style="width:150px; background-color:white;">FI Unit Price / Cost</span>
        </div>
        <input type="text" class="form-control" id="fiunitprice" name="fiunitprice" >
      </div>
    </div>

  </div>
</div>
          

                    <br>



                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" id="submitButtonADD" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
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



            <br>
<!--               
           <div id="loading">
             
          <img src="bimms/images/logo/loadinggif.gif" alt="Loading...">
        </div> -->

<br>


        <div id="table-container"   ></div>


        <script>
          $(document).ready(function(){
              // Function to handle AJAX request
              function handleAjaxRequest(selectedOption) {
                  var usercategory = "<?php echo $usercategory; ?>"; // Assuming $usercategory is a PHP variable
                  var usersection = "<?php echo $section; ?>"; // Assuming $usercategory is a PHP variable
               

                  $.ajax({
                      url: 'display_table_imlist.php',
                      method: 'POST',
                      data: { option: selectedOption, usercategory: usercategory , usersection: usersection},
                      success: function(response){
                          $('#table-container').html(response);
                      }
                  });
              }
              
              // Trigger AJAX request on initial page load based on selected option
              var initialSelectedOption = $('#selectedComboType').val();
              handleAjaxRequest(initialSelectedOption);
              
              // Click event handler for item buttons
              $('.item-button').click(function(){
                  var selectedOption = $(this).data('option');
                  $('#selectedComboType').val(selectedOption); // Set the dropdown value
                  
                  // Trigger AJAX request
                  handleAjaxRequest(selectedOption);
              });
              
              // Change event handler for select element
              $('#selectedComboType').change(function(){
                  var selectedOption = $(this).val();
                  handleAjaxRequest(selectedOption);
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
        data: { itemIdentification: itemid },
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
