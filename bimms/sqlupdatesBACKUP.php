<?php
session_start();


include 'Connection/connection.php';

$Action = $_GET['action'];


if($Action == 'cart'){

    $fullname = $_GET['fullname'];
    $useradid = $_GET['useradid'];

    $costCenter = $_GET['costcenter'];

   $usersection = $_GET['usersection'];
   $useremail = $_GET['useremail'];



    //select userdetails 

    
    $stmt_userdetails = pg_prepare($conn,"select_info","SELECT employee_number,employee_name,adid,email FROM  tbl_accounts WHERE employee_name = $1");
        // Check if the statement preparation was successful
        if (!$stmt_userdetails) {
            echo "Failed to prepare statement.";
            exit;
        }

        
    // Execute the prepared statement to select item_name
    $resultUSER = pg_execute($conn, "select_info",array($fullname));

    // Fetch the item details
    $rowUSER = pg_fetch_assoc($resultUSER);
    $userINFO_empno = $rowUSER['employee_number'];
    $userINFO_name = $rowUSER['employee_name'];
    $userINFO_adid = $rowUSER['adid'];
    $userINFO_email = $rowUSER['email'];






     // Echo the cost center value
     echo "Selected Cost Center: " . $costCenter .'<br>';

            // Function to increment the transaction number
            function incrementTransactionNumber($transactionNumber) {
                // Extract the numeric part of the transaction number
                $numericPart = (int) substr($transactionNumber, strrpos($transactionNumber, '-') + 1);
                
                // Increment the numeric part
                $nextNumericPart = $numericPart + 1;
                
                // Construct the next transaction number
                $nextTransactionNumber = substr($transactionNumber, 0, strrpos($transactionNumber, '-') + 1) . sprintf('%03d', $nextNumericPart);
                
                return $nextTransactionNumber;
            }

$selectedItemId = $_GET['selectedItemId'];

// Explode the string to get an array of IDs
$myArray = explode(',', $selectedItemId);

// Prepare the SQL statement to select item_name based on item_code
$stmt = pg_prepare($conn, "select_query", "SELECT item_name, specification, uom, stock, unit_cost, currency, lt, delivery_date, section_name FROM tbl_mim WHERE item_code = $1");

// Check if the statement preparation was successful
if (!$stmt) {
    echo "Failed to prepare statement.";
    exit;
}

// Get the current maximum transaction number from tbl_mim_cart or tbl_mim_approval
$maxTransactionNumberQuery = "SELECT MAX(transaction_number) AS max_transaction_number FROM tbl_mim_cart UNION SELECT MAX(transaction_number) AS max_transaction_number FROM tbl_mim_approval";
$maxTransactionNumberResult = pg_query($conn, $maxTransactionNumberQuery);

// Check if the query was successful
if (!$maxTransactionNumberResult) {
    echo "Failed to fetch maximum transaction number.";
    exit;
}

$maxTransactionNumber = 0; // Initialize with 0 if there are no existing transaction numbers

while ($row = pg_fetch_assoc($maxTransactionNumberResult)) {
    $currentMax = $row['max_transaction_number'];
    if ($currentMax) {
        // If there is an existing transaction number, extract the numeric part and update max
        $numericPart = (int) substr($currentMax, strrpos($currentMax, '-') + 1);
        $maxTransactionNumber = max($maxTransactionNumber, $numericPart);
    }
}

// Increment the transaction number counter
$transactionNumberCounter = $maxTransactionNumber + 1;

// Prepare the SQL statement to insert into the table
$insert_stmt = pg_prepare($conn, "insert_query", "INSERT INTO tbl_mim_cart (transaction_number, item_code, item_name, specification, uom, request_date, stock, unit_cost, currency, lt, requestor_name,delivery_date,section_name,cost_center,requestor_email) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11,$12,$13,$14,$15)");

// Check if the statement preparation was successful
if (!$insert_stmt) {
    echo "Failed to prepare insert statement.";
    exit;
}

// Current date and time
$currentDateTime = date('Y-m-d H:i:s');

// Increment the transaction number
$nextTransactionNumber = 'TransactionNumber-' . date('Y') . '-' . sprintf('%03d', $transactionNumberCounter);

// Loop through the array and insert each item code and item name
foreach($myArray as $arrayVal) {
    // Trim the item code
    $arrayVal = trim($arrayVal);

    // Execute the prepared statement to select item_name
    $result = pg_execute($conn, "select_query", array($arrayVal));

    // Fetch the item details
    $row = pg_fetch_assoc($result);
    $itemName = $row['item_name'];
    $itemSpecification = $row['specification'];
    $itemUom = $row['uom'];
    $itemStock = $row['stock'];
    $itemUnitcost = $row['unit_cost'];
    $itemCurrency = $row['currency'];
    $itemLt = $row['lt'];
    $itemDL = $row['delivery_date'];
    $itemSectionstock = $row['section_name'];

    

    // Execute the prepared statement to insert into the table
    $insert_result = pg_execute($conn, "insert_query", array($nextTransactionNumber, $arrayVal, $itemName, $itemSpecification, $itemUom, $currentDateTime, $itemStock, $itemUnitcost, $itemCurrency, $itemLt, $fullname,$itemDL,$usersection,$costCenter,$userINFO_email));





    // Check if the execution was successful
    if ($insert_result) {
        echo "Item code: $arrayVal <br> Item name: $itemName <br> Transaction number: $nextTransactionNumber <br>  Request Datetime: $currentDateTime<br><hr>";
// SQL query to update stocks for the inserted item
               
        // SQL query to update stocks for the inserted item
        $queryUPDATESTOCKSMONTH = "
        UPDATE tbl_mim_cart AS cart
        SET
        january = (
            SELECT (testview1.stock_quantity::numeric)
            FROM testview1
            WHERE cart.item_code = testview1.item_code
            AND testview1.month_name = 'january' 
            AND testview1.cost_center = '$costCenter'
            LIMIT 1
        ),
        february = (
            SELECT (testview1.stock_quantity::numeric)
            FROM testview1
            WHERE cart.item_code = testview1.item_code
            AND testview1.month_name = 'february'
            AND testview1.cost_center = '$costCenter'
            LIMIT 1
        ),
        march = (
            SELECT (testview1.stock_quantity::numeric)
            FROM testview1
            WHERE cart.item_code = testview1.item_code
            AND testview1.month_name = 'march'
            AND testview1.cost_center = '$costCenter'
            LIMIT 1
        )
        
        WHERE EXISTS (
            SELECT 1
            FROM testview1
            WHERE cart.item_code = testview1.item_code
            AND cart.cost_center = '$costCenter'

        );
    ";

//     // Debugging output for UPDATE query
// echo "UPDATE Query: $queryUPDATESTOCKSMONTH<br>";

    // Execute the query to update stocks
    $updateResult = pg_query($conn, $queryUPDATESTOCKSMONTH);

    // Check for errors
    if (!$updateResult) {
        echo "Error executing update query for item code: $arrayVal<br>";
            }
        } else {
            echo "Failed to execute insert query for item code: $arrayVal<br>";
        }

       
}

    


echo $fullname;


    
            ?>
            <script>  
        //  alert("Added Successfully!");               
        // window.location="demand-list-input.php";
         </script>
            <?php 

}elseif($Action == 'approval'){

    $selectedItemId = $_GET['selectedItemId'];
    $requeststatus = "For Budget Controller";
    
    // Explode the string to get an array of IDs
    $myArray = explode(',', $selectedItemId);




       
    // Prepare the SQL statement to select item_name based on item_code
    $stmt = pg_prepare($conn, "select_query", "SELECT transaction_number, request_date, item_code, item_name, specification, uom , stock, unit_cost,currency,lt,requestor_name,delivery_date,section_name,cost_center,requestor_email,
    january, february, march, april, may, june, july, august, september, october, november, december FROM tbl_mim_cart WHERE item_code = $1");
    
    // Check if the statement preparation was successful
    if (!$stmt) {
        echo "Failed to prepare statement.";
        exit;
    }
    
    // Prepare the SQL statement to insert into the table
    $insert_stmt = pg_prepare($conn, "insert_query", "INSERT INTO tbl_mim_approval (transaction_number, request_date, item_code, item_name, specification, uom, request_status, stock, unit_cost,currency,lt,requestor_name,delivery_date,section_name,cost_center,requestor_email,
    january, february, march, april, may, june, july, august, september, october, november, december, total_demand_quantity, overall_total_cost) VALUES ($1, $2, $3, $4, $5, $6, $7,$8,$9,$10,$11,$12,$13,$14,$15,$16,$17,$18,$19,$20,$21,$22,$23,$24,$25,$26,$27,$28, $29, $30)");
    
    // Check if the statement preparation was successful
    if (!$insert_stmt) {
        echo "Failed to prepare insert statement.";
        exit;
    }
    
  

    
    // Loop through the array and insert each item code and item name
    foreach($myArray as $arrayVal) {
        // Trim the item code
        $arrayVal = trim($arrayVal);
    
        // Execute the prepared statement to select item_name
        $result = pg_execute($conn, "select_query", array($arrayVal));
    
        // Fetch the item details
        
    // Fetch the item details
    while ($row = pg_fetch_assoc($result)) {


                    $transactionNumber = $row['transaction_number'];

                    
        // Check if the transaction number already exists in tbl_mim_approval
                $check_result = pg_query_params($conn, "SELECT COUNT(*) FROM tbl_mim_approval WHERE transaction_number = $1", array($transactionNumber));
                $count = pg_fetch_result($check_result, 0, 0);

                // If the transaction number already exists, skip insertion
                if ($count > 0) {
                    echo "Transaction number $transactionNumber already exists. Skipping insertion.<br>";
                    continue;

                }
                
                    $itemName = $row['item_name'];
                    $itemSpecification = $row['specification'];
                    $itemUom = $row['uom'];
                    $requestdate = $row['request_date'];
                    $itemStock = $row['stock'];
                    $itemUnitcost = $row['unit_cost'];
                    $itemCurrency = $row['currency'];
                    $itemLt = $row['lt'];
                    $itemRequestorname = $row['requestor_name'];
                    $itemDeliverydate = $row['delivery_date'];
                    $sectionname = $row['section_name'];
                    $costcenter = $row['cost_center'];
                    $jan = $row['january'];
                    $feb = $row['february'];
                    $mar = $row['march'];
                    $apr = $row['april'];
                    $may = $row['may'];
                    $jun = $row['june'];
                    $jul = $row['july'];
                    $aug = $row['august'];
                    $sep = $row['september'];
                    $oct = $row['october'];
                    $nov = $row['november'];
                    $dec = $row['december'];
                    $requestoremail = $row['requestor_email'];

                    // Get the current month number (1 for January, 2 for February, ..., 12 for December)
                    $currentMonth = (int)date('n');

                    // Create an array of month values
                    $months = [$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec];

                    // Initialize total demand quantity
                    $totaldemandquantity = 0;

                    // Add all months except the previous 3 months
                    for ($i = 0; $i < 12; $i++) {
                        if ($i == ($currentMonth - 2 + 12) % 12 || $i == ($currentMonth - 3 + 12) % 12 || $i == ($currentMonth - 4 + 12) % 12) {
                            continue;
                        }
                        $totaldemandquantity += $months[$i];
                    }

                    // Output the total demand quantity
                    echo $totaldemandquantity;




                    $totaloverallcost =  $itemUnitcost * $totaldemandquantity;






                
                    // Execute the prepared statement to insert into the table
        $insert_result = pg_execute($conn, "insert_query", array($transactionNumber, $requestdate, $arrayVal, $itemName, $itemSpecification, $itemUom, $requeststatus, $itemStock, $itemUnitcost, $itemCurrency, $itemLt, $itemRequestorname, $itemDeliverydate,
        $sectionname, $costcenter,$requestoremail, $jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $sep, $oct, $nov, $dec,$totaldemandquantity, $totaloverallcost));

                }
            }


            // Truncate the tbl_mim_cart table and restart identity
            $truncate_query = "TRUNCATE TABLE tbl_mim_cart RESTART IDENTITY";
            pg_query($conn, $truncate_query);
    

    
            ?>
            <script>  
        alert("Successfully submitted for Approval!");               
        window.location="demand-list-input.php";
            </script>
            <?php 


}
elseif($Action == 'approved'){

    $selectedTransnumber = $_GET['selectedTransactionNumber'];
    $requeststatus = "For Second Approver";
    
    // Explode the string to get an array of IDs
    $myArray = explode(',', $selectedTransnumber);

    
        // Print the resulting array
        echo '<pre>';
        print_r($myArray);
        echo '</pre>';

           
    // Prepare the SQL statement to select transc based on transc_code
    $stmt = pg_prepare($conn, "select_query", "SELECT * FROM tbl_mim_approval WHERE transaction_number = $1");
    
    // Check if the statement preparation was successful
    if (!$stmt) {
        echo "Failed to prepare statement.";
        exit;
    }

    // Prepare the SQL statement for the update query
        $update_stmt = pg_prepare($conn, "update_query", "UPDATE tbl_mim_approval SET request_status = '$requeststatus' WHERE transaction_number = $1");

        // Check if the statement preparation was successful
        if (!$update_stmt) {
            echo "Failed to prepare update statement.";
            exit;
        }



        // Execute the update query for each transaction number in the array
            foreach ($myArray as $transNumber) {
                // Select the transaction to ensure it exists (optional)
                $result = pg_execute($conn, "select_query", array($transNumber));
                if (pg_num_rows($result) > 0) {
                    // Execute the update statement
                    $update_result = pg_execute($conn, "update_query", array($transNumber));
                    if ($update_result) {
                        echo "Transaction number $transNumber updated successfully.<br>";
                    } else {
                        echo "Failed to update transaction number $transNumber.<br>";
                    }
                } else {
                    echo "Transaction number $transNumber not found.<br>";
                }
            }

                    
      




}
elseif($Action == 'cartremove'){


    $selectedItemId = $_GET['selectedItemId'];

    // Explode the string to get an array of IDs
    $myArray = explode(',', $selectedItemId);

    

    // Check if the connection is successful
    if (!$conn) {
        echo "Failed to connect to PostgreSQL.";
        exit;
    }

    // Prepare the SQL statement to delete the item
    $delete_stmt = pg_prepare($conn, "delete_query", "DELETE FROM tbl_mim_cart WHERE item_code = $1");

    // Check if the statement preparation was successful
    if (!$delete_stmt) {
        echo "Failed to prepare delete statement.";
        exit;
    }

    // Loop through the array and delete each selected item
    foreach ($myArray as $arrayVal) {
        // Trim the item code
        $arrayVal = trim($arrayVal);

        // Execute the prepared statement to delete the item
        $delete_result = pg_execute($conn, "delete_query", array($arrayVal));

        // Check if the execution was successful
        if (!$delete_result) {
            echo "Failed to delete item with item code: " . $arrayVal . "<br>";
        } else {
            echo "Item with item code " . $arrayVal . " has been successfully removed.<br>";
        }
    }
    ?>
            <script>  
        alert("Deleted Successfully!");               
        window.location="demand-list-input.php";
            </script>
            <?php 

  


}


elseif($Action == 'login'){

    include 'Connection/overall.php';
    
    // Assuming $conn is your PostgreSQL connection object
    
    $adid = $_POST['biph_adid'];
    $pass  = $_POST['password'];
    
 
    
    $sql = "SELECT * FROM tbl_accounts WHERE adid = $1 AND password = $2";
    $params = array($adid, $pass);
    $result = pg_query_params($conn, $sql, $params);
    $row_count = pg_num_rows($result);
    
    if ($row_count >= 1) {
        $_SESSION['BIMMSuser_id'] = $adid;
        ?>
        <script>
          
            window.location = "dashboard.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert('ADID or Password is incorrect');
            window.location = "login.php";
        </script>
        <?php
    }
   
    
    



   
  
}
elseif($Action == 'itemrequest'){


    $fullname = $_GET['fullname'];
    $costCenter = $_GET['selectedcostcenter'];
    $selectedItemId = $_GET['selectedItemId'];
    
    $statusCAS = 'For Budget Controller';
    $systemID = 99;
    $case = 1;
    $approverID = 1;
    $details = 'TEST BIMMS';
    $remarks = 'BIMMS REMARKS';
    // Current date and time
    $currentDateTime = date('Y-m-d H:i:s');
    $currentDateTimeCAS = date('F d, Y h:i A');
    
    // Prepare the SQL statement to select email and section from tbl_accounts
    $getDETAILS = pg_prepare($conn, "select_queryDETAILS", "SELECT email, section FROM tbl_accounts WHERE employee_name = $1");
    
    // Execute the prepared query
    $result_getDETAILS = pg_execute($conn, "select_queryDETAILS", array($fullname));
    if (!$result_getDETAILS) {
        echo "Error executing query.";
        exit;
    }
    
    // Check if cost center and selected items are set
    if (empty($costCenter) || empty($selectedItemId)) {
        echo "Cost center or selected items are missing.";
        exit;
    }
    
    // Function to increment transaction number
    function incrementTransactionNumber($transactionNumber) {
        // Extract the numeric part of the transaction number
        $numericPart = (int) substr($transactionNumber, strrpos($transactionNumber, '-') + 1);
        
        // Increment the numeric part
        $nextNumericPart = $numericPart + 1;
        
        // Construct the next transaction number
        $nextTransactionNumber = substr($transactionNumber, 0, strrpos($transactionNumber, '-') + 1) . sprintf('%03d', $nextNumericPart);
        
        return $nextTransactionNumber;
    }
    
    // Explode the string to get an array of IDs
    $myArray = explode(',', $selectedItemId);
    
    // Prepare the SQL statement to select item_name based on item_code
    $stmt = pg_prepare($conn, "select_query", "SELECT * FROM tbl_mim WHERE item_code = $1 ");
    
    // Check if the statement preparation was successful
    if (!$stmt) {
        echo "Failed to prepare statement.";
        exit;
    }
    
    // Prepare the SQL statement to insert into the table
    $insert_stmt = pg_prepare($conn, "insert_query", "INSERT INTO tbl_mim_itemrequest (transaction_number, item_code, item_name, specification, uom, request_date, stock, unit_cost, currency, requestor_name, cost_center) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11)");
    
    // Check if the statement preparation was successful
    if (!$insert_stmt) {
        echo "Failed to prepare insert statement.";
        exit;
    }
    
    // Get the current maximum transaction number from tbl_mim_itemrequest_approval
    $maxTransactionNumberQuery = "SELECT MAX(transaction_number) AS max_transaction_number FROM tbl_mim_itemrequest_approval";
    $maxTransactionNumberResult = pg_query($conn, $maxTransactionNumberQuery);
    
    // Check if the query was successful
    if (!$maxTransactionNumberResult) {
        echo "Failed to fetch maximum transaction number.";
        exit;
    }
    
    $maxTransactionNumber = 0; // Initialize with 0 if there are no existing transaction numbers
    
    while ($row = pg_fetch_assoc($maxTransactionNumberResult)) {
        $currentMax = $row['max_transaction_number'];
        if ($currentMax) {
            // If there is an existing transaction number, extract the numeric part and update max
            $numericPart = (int) substr($currentMax, strrpos($currentMax, '-') + 1);
            $maxTransactionNumber = max($maxTransactionNumber, $numericPart);
        }
    }
    
    // Increment the transaction number counter
    $transactionNumberCounter = $maxTransactionNumber + 1;
    
    // Generate transaction number once
    $nextTransactionNumber = 'TransactionNumber-' . date('Y') . '-' . sprintf('%03d', $transactionNumberCounter);
    
    // Loop through the array and insert each item code and item name
    foreach ($myArray as $arrayVal) {
        // Trim the item code
        $arrayVal = trim($arrayVal);
    
        // Execute the prepared statement to select item_name
        $result = pg_execute($conn, "select_query", array($arrayVal));
    
        // Fetch the item details
        $row = pg_fetch_assoc($result);
        $itemName = $row['item_name'];
        $itemCode = $row['item_code'];
        $itemSpecification = $row['specification'];
        $itemUom = $row['uom'];
        $itemStock = $row['stock'];
        $itemUnitcost = $row['unit_cost'];
        $itemCurrency = $row['currency'];
        
        // Execute the prepared statement to insert into the table
        $insert_result = pg_execute($conn, "insert_query", array(
            $nextTransactionNumber, $itemCode, $itemName, $itemSpecification, $itemUom,
            $currentDateTime, $itemStock, $itemUnitcost, $itemCurrency, $fullname, $costCenter
        ));
    
        // Display information or perform other actions if needed
        echo "Inserted Item code: $itemCode <br>";
    }
    
    // Increment the transaction number counter for the next item
    $transactionNumberCounter++;
    ?>
    <script>  
    alert("Added Successfully!");               
    window.location="item-request-input.php";
        </script>
        <?php 



}
elseif($Action == 'commongoodsedit'){

            // Your existing script continues...
            $selectedCategory = $_GET['category'];
            echo $selectedCategory;

            $updatedby = $_GET['user'];
            echo $updatedby;

            $updatedtime = $_GET['time'];
            echo $updatedtime;


            $getfilename = $_GET['fileNames'];
            echo $getfilename;

            // Proceed with your file upload and database update code...

            if ($_FILES['fileedit']['error'] == UPLOAD_ERR_OK && $_FILES['fileedit']['tmp_name']) {
                require 'PHPExcel/Classes/PHPExcel/IOFactory.php'; // Path to PHPExcel library

                $fileTmpName = $_FILES['fileedit']['tmp_name'];
                $objPHPExcel = PHPExcel_IOFactory::load($fileTmpName);
                $worksheet = $objPHPExcel->getActiveSheet();

                // Loop through rows and execute SQL updates using pg_query()
                // Assuming $conn is your PostgreSQL connection
                foreach ($worksheet->getRowIterator() as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false); // Iterate all cells, even if they are not set

                    $values = [];
                    foreach ($cellIterator as $cell) {
                        $values[] = $cell->getValue();
                    }

                    // Assuming data starts from the first column of the second row (A2)
                    $itemName = pg_escape_string($values[1]); // Example: item name in second column
                    $specs = pg_escape_string($values[2]); // Example: specifications in third column
                    $peuom = pg_escape_string($values[3]); // Example: PE UOM in fourth column
                    $peunicost = (float) $values[4]; // Example: PE unit cost in fifth column
                    $conversion = (int) $values[5]; // Example: conversion in sixth column
                    $inventory = (int) $values[6]; // Example: inventory in seventh column
                    $fiuom = pg_escape_string($values[7]); // Example: FI UOM in eighth column
                    $fiunitcost = (float) $values[8]; // Example: FI unit cost in ninth column
                    $category = pg_escape_string($values[9]); // Example: category in tenth column
                    $warehouse = pg_escape_string($values[10]); // Example: warehouse in eleventh column
                    $itemCode = pg_escape_string($values[0]); // Assuming item code is in first column

                    // Update database based on item code
                    $sqlupdate = "UPDATE tbl_common_goods_data 
                                SET item_name = '$itemName', specification = '$specs', pe_uom = '$peuom', 
                                    pe_unit_cost = $peunicost, conversion = $conversion, inventory_out = $inventory, 
                                    fi_uom = '$fiuom', fi_unit_cost = $fiunitcost, category = '$category', 
                                    warehouse = '$warehouse'
                                WHERE im_code = '$itemCode'";

                    $result = pg_query($conn, $sqlupdate);
                    if (!$result) {
                        echo "Error updating database.";
                        exit;
                    }
                }

                echo "Update successful!";



                $currentDateTime = date('Y-m-d H:i:s'); // Example format: 2024-06-13 15:30:00

                $sqlinsertHistory = "INSERT INTO tbl_common_goods_pricelist (file_name, update_by, updated_time,category_beingupdated) VALUES ($1, $2 , $3 , $4)";

                // Execute the SQL statement with row data as parameters
                $params = array($getfilename,$updatedby, $currentDateTime, $selectedCategory);
                $result = pg_query_params($conn, $sqlinsertHistory, $params);
                
                if (!$result) {
                    die(pg_last_error($conn));
                } else {
                    // Success code can be added here if needed
                }
                





            } else {
                echo "Error uploading file.";
            }



}

elseif($Action == 'output'){
    $itemcode = $_POST['itemcode'];
    $itemname = $_POST['itemname'];
    $section = $_POST['section'];
    $cost_center = $_POST['cost_center'];
    $stockquantity = $_POST['stock_quantity'];
    $output_qty = $_POST['qty'];
    $purpose = $_POST['select4-purpose'];
    $output_date = $_POST['output_date'];
    $requestor = $_POST['requestor'];
    $remarks = $_POST['remarks'];
    $specification = $_POST['specification'];
    $unit_cost = $_POST['unit_cost'];
    $supplier = $_POST['supplier'];
    $currency = $_POST['currency'];
    $uom = $_POST['uom'];

    $warehouse = $_POST['warehouse1'];

    $output_type = 'Output';


 
   

    $newstock = $stockquantity - $output_qty;
    
    // Check if the connection is successful
    if (!$conn) {
        echo "Failed to connect to PostgreSQL.";
        exit;
    }
    
    // Prepare the SQL statement to insert the item
    $sql_output = pg_prepare($conn, "output_query", "INSERT INTO tbl_output (item_code, item_name, section, cost_center, available_qty, output_qty, purpose, output_date, requestor, remarks, specification,unit_cost,uom,supplier,currency,output_type,warehouse) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10,$11,$12,$13,$14,$15,$16,$17)");
    
    // Check if the statement preparation was successful
    if (!$sql_output) {
        echo "Failed to prepare insert statement.";
        exit;
    }
    
    // Execute the SQL statement with row data as parameters
    $params = array($itemcode, $itemname, $section, $cost_center, $stockquantity, $output_qty, $purpose, $output_date, $requestor, $remarks , $specification, $unit_cost , $uom , $supplier,$currency,$output_type,$warehouse);
    $result = pg_execute($conn, "output_query", $params);



    
  // Update database based on item code
    $sql_updateStocks = "UPDATE tbl_mim 
                                SET stock = '$newstock'
                        WHERE item_code = '$itemcode'";

                    $result = pg_query($conn, $sql_updateStocks);
                    if (!$result) {
                        echo "Error updating database.";
                        exit;
                    }
    
    if (!$result) {
        die(pg_last_error($conn));
    } else {
        // Success code can be added here if needed
        echo "Record inserted successfully.";
    }
    


    ?>
            <script>  
        alert("Output Successfully!");               
        window.location="item-output.php";
            </script>
            <?php 

  


}


?>