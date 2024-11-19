<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script> <!-- Include jQuery -->
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>


<?php
include 'Connection/connection.php';


?>



<style>
  .swal-wide {
        width: 80% !important;
        max-width: 1000px !important;
    }
</style>


<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'additemlist') {
    // Sanitize inputs (implement proper sanitization)
    $GETUSER = $_GET['user'];

    // Get form data
    $oscode = $_POST['oscode'];
    $itemcode = $_POST['itemcode'];
    $itemname = $_POST['itemname'];
    $specification = $_POST['specification'];
    $peuom = $_POST['peuom'];
    $peunitcost = $_POST['peunitcost'];

    // Get conversion data
    $con1 = $_POST['con1'];
    $con2 = $_POST['con2'];
    $con4 = $_POST['con4'];
    $con5 = $_POST['con5'];
    $conversion_data = "$con1 $con2 $con4 $con5";

    // Get other form data
    $inventoryout = $_POST['selectedComboType'];
    $fiuom = $_POST['fiuom'];
    $fiunitprice = $_POST['fiunitprice'];

    // // Debugging: Output POST data
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Check if im_code already exists
    $check_stmt = pg_prepare($conn, "check_query", "SELECT * FROM tbl_im_list_ga WHERE im_code = $1");

    if (!$check_stmt) {
        echo "Failed to prepare check statement: " . pg_last_error($conn);
        exit;
    }

    $check_result = pg_execute($conn, "check_query", array($itemcode));

    if ($check_result && pg_num_rows($check_result) > 0) {
        $existing_item = pg_fetch_assoc($check_result);
        $existing_im_code = htmlspecialchars($existing_item['im_code']);
        $existing_item_name = htmlspecialchars($existing_item['item_name']);
        $existing_item_specification = htmlspecialchars($existing_item['specification']);

        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Error</title>
            <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
      <script>
Swal.fire({
    title: 'Error!',
    html: `
        <h5>Item code already exists.</h5><br>
        <h6 style='text-align:left;'>Existing Item Details:</h6>
        <div class='container'>
            <div class='row'>
                <div class='col-md-4 mb-3'>
                    <div class='input-group'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text' style='width:120px; background-color:white;'>IM Code</span>
                        </div>
                        <input type='text' class='form-control' value=' $existing_im_code' readonly>
                    </div>
                </div>
                <div class='col-md-4 mb-3'>
                    <div class='input-group'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text' style='width:120px; background-color:white;'>Item Name</span>
                        </div>
                        <input type='text' class='form-control' value=' $existing_item_name' readonly>
                    </div>
                </div>
                <div class='col-md-4 mb-3'>
                    <div class='input-group'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text' style='width:120px; background-color:white;'>Specification</span>
                        </div>
                        <input type='text' class='form-control' value=' $existing_item_specification' readonly>
                    </div>
                </div>
            </div>
        </div>

        <br>

           <h6 style='text-align:left;'>New Item Details:</h6>
        <div class='container'>
            <div class='row'>
                <div class='col-md-4 mb-3'>
                    <div class='input-group'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text' style='width:120px; background-color:white;'>IM Code</span>
                        </div>
                        <input type='text' class='form-control' value=' $itemcode' readonly>
                    </div>
                </div>
                <div class='col-md-4 mb-3'>
                    <div class='input-group'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text' style='width:120px; background-color:white;'>Item Name</span>
                        </div>
                        <input type='text' class='form-control' value=' $itemname' readonly>
                    </div>
                </div>
                <div class='col-md-4 mb-3'>
                    <div class='input-group'>
                        <div class='input-group-prepend'>
                            <span class='input-group-text' style='width:120px; background-color:white;'>Specification</span>
                        </div>
                        <input type='text' class='form-control' value=' $specification' readonly>
                    </div>
                </div>
            </div>
        </div>
    `,
    icon: 'error',
    showCancelButton: true,
    confirmButtonText: 'Replace',
    cancelButtonText: 'Cancel',
    customClass: {
        popup: 'swal-wide'
    }
}).then((result) => {
    if (result.isConfirmed) {
        // Debugging: Output to console
        console.log('Data to be sent:');
        console.log({
            oscode: '$oscode',
            itemcode: '$itemcode',
            itemname: ' $itemname',
            specification: '$specification',
            peuom: ' $peuom',
            peunitcost: '$peunitcost',
            conversion_data: ' $conversion_data',
            inventoryout: '$inventoryout',
            fiuom: ' $fiuom',
            fiunitprice: ' $fiunitprice'
        });

      $.ajax({
    type: 'POST',
    url: 'item-list-sql-update.php',
    data: {
        oscode: '$oscode',
        itemcode: '$itemcode',
        itemname: '$itemname',
        specification: '$specification',
        peuom: '$peuom',
        peunitcost: '$peunitcost',
        conversion_data: '$conversion_data',
        inventoryout: '$inventoryout',
        fiuom: '$fiuom',
        fiunitprice: '$fiunitprice'
    },
    success: function(response) {
        console.log('Response from server:');
        console.log(response);

        if (response.trim() === 'success') {
            Swal.fire({
                title: 'Updated!',
                text: 'Item updated successfully.',
                icon: 'success'
            }).then(() => {
                window.location.href = 'im-list.php'; // Redirect on success
            });
        } else {
            Swal.fire({
                title: 'Error!',
                text: 'Failed to update item: ' + response,
                icon: 'error'
            });
        }
    },
    error: function(xhr, status, error) {
        Swal.fire({
            title: 'Error!',
            text: 'Failed to update item. ' + error,
            icon: 'error'
        });
    }
});


    } else {
        window.location.href = 'im-list.php';
    }
});
</script>

        </body>
        </html>";
    } else {
        // Prepare and execute SQL query for insert
        $insert_stmt = pg_prepare($conn, "insert_query", "INSERT INTO tbl_im_list_ga (os_code, im_code, item_name, specification, ga_uom, ga_unit_cost, conversion, out_of_inventory, fi_uom, fi_unit_cost) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)");

        if (!$insert_stmt) {
            echo "Failed to prepare insert statement: " . pg_last_error($conn);
            exit;
        }

        // Execute the prepared statement
        $insert_result = pg_execute($conn, "insert_query", array($oscode, $itemcode, $itemname, $specification, $peuom, $peunitcost, $conversion_data, $inventoryout, $fiuom, $fiunitprice));

        if ($insert_result) {
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Success</title>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
            <script>
            Swal.fire({
                title: 'Success!',
                text: 'Item added successfully.',
                icon: 'success'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'im-list.php';
                }
            });
            </script>
            </body>
            </html>";
        } else {
            $error = pg_last_error($conn);
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Error</title>
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            </head>
            <body>
            <script>
            Swal.fire({
                title: 'Error!',
                text: 'Failed to insert item: $error',
                icon: 'error'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'im-list.php';
                }
            });
            </script>
            </body>
            </html>";
        }
    }
} else {
    echo "Invalid form submission.";
}
?>
