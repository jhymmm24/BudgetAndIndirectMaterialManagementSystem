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




      <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+5hb7MbS2RwBj2Vk2U+ltlBkZf0nUck+kzO5bUw" crossorigin="anonymous">

<!-- Bootstrap JS (with Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBvuZZVnx0AUsScyD6FmYY8nsKU9KqE5z6jbs//fq3Os4IC9" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76Aq8E/qi4W8QHOCLi2BvoSsoh1Fp5e6IDoC3OKY1pBbF9WfW7SX0B7s9Ed5p1s" crossorigin="anonymous"></script>



      
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
              
      

              <div class="midde_cont">
    <div class="container-fluid">
        <div class="row column_title">
            <div class="col-md-12">
                <div class="page_title">
                    <h2>Item Issuance</h2>
                </div>
            </div>
        </div>

        <!-- Card with Search Form -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Search Transaction Number</h4>
                    </div>
                    <div class="card-body">
                        <form id="searchForm">
                            <div class="input-group mb-3 w-50">
                                <input type="text" class="form-control" placeholder="Input Transaction Number here" id="searchQuery" name="searchQuery" aria-label="Search Item">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for displaying table if transaction number exists -->
        <div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="transactionModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="transactionModalLabel">Transaction Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Transaction Number</th>
                                    <th>Item</th>
                                    <th>Approved Quantity</th>
                                    <th>Stock Quantity</th>
                                    <th>Status</th>
                                    <th>Issued Quantity</th>
                                </tr>
                            </thead>
                            <tbody id="transactionDetails">
                                <!-- Data will be injected here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>

document.getElementById("searchForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const searchQuery = document.getElementById("searchQuery").value;

    fetch("search_transaction.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `searchQuery=${searchQuery}`,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.status === "not_found") {
                // Show SweetAlert if transaction number not found
                Swal.fire({
                    icon: "error",
                    title: "Transaction Not Found",
                    text: "The transaction number you searched for does not exist / not For Item Out.",
                });
            } else {
    // Populate the modal with the transaction details
    let tableBody = document.getElementById("transactionDetails");
    tableBody.innerHTML = ""; // Clear any previous data

    data.forEach((transaction) => {
        const row = `
            <tr>
                <td>${transaction.transaction_number}</td>
                <td>${transaction.item_code}</td>
                <td>${transaction.approved_qty}</td>
                <td>${transaction.stock}</td>
                <td>${transaction.request_status}</td>
                <td><input type="text" class="form-control" id="input-${transaction.item_code}" value=""></td>
            </tr>
        `;
        tableBody.insertAdjacentHTML("beforeend", row);
    });

    // Ensure any previous button is removed before adding a new one
    const existingButton = document.getElementById("submitTransaction");
    if (existingButton) {
        existingButton.parentNode.remove();
    }

    // Adding a button below the table
    const buttonHTML = `
        <div class="mt-3 text-end">
            <button type="button" class="btn btn-success" id="submitTransaction">Submit</button>
        </div>
    `;

    // Add the button after the table
    tableBody.insertAdjacentHTML("afterend", buttonHTML);

    // Show the modal
    const transactionModal = new bootstrap.Modal(document.getElementById("transactionModal"));
    transactionModal.show();

    // Handle the button click event
    document.getElementById("submitTransaction").addEventListener("click", function() {
        console.log("Submit button clicked!");

        // Collect input data
        let inputData = [];
        data.forEach((transaction) => {
            const inputId = `input-${transaction.item_code}`;
            const inputValue = document.getElementById(inputId).value;
            inputData.push({
              item_code: transaction.item_code,
        transaction_number: transaction.transaction_number, // Add transaction_number here
        value: inputValue
            });
        });

        fetch('update_items.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(inputData)
})
.then(response => {
    return response.text().then(text => {
        try {
            return JSON.parse(text);
        } catch (error) {
            throw new Error('Failed to parse JSON: ' + text);
        }
    });
})
.then(data => {
    if (data.error) {
        throw new Error(data.error);
    }
    console.log("Update successful:", data);
    // Handle success (e.g., show a confirmation message)
    Swal.fire({
            icon: 'success',
            title: 'Update Successful',
            text: data.message || 'The items have been updated successfully.',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                // Reload the page after success
                location.reload();
            }
        });
})
.catch((error) => {
    console.error("Error updating items:", error.message);
    console.error("Error stack:", error.stack);
    Swal.fire({
            icon: 'error',
            title: 'Update Failed',
            text: error.message,
            confirmButtonText: 'OK'
        });
    // Handle error
});


    });
            }
        })
        .catch((error) => {
            console.error("Error:", error);
        });
});

    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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