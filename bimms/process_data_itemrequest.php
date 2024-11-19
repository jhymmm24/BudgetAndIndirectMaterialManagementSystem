<?php 
include 'Connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selectedItemId'])) {
        // Get the array of selected item IDs
        $selectedItemIds = explode(',', $_POST['selectedItemId']);
        $requeststatus = "For Budget Controller";
        $sectionValue = $_POST['sectionValue'];

        
        if (isset($_POST['lineValues'])) {
            $lineValues = $_POST['lineValues'];
            foreach ($lineValues as $lineValue) {
                echo "Line Value: " . htmlspecialchars($lineValue) . "<br>";
            }
        }

        $lineValues = isset($_POST['lineValues']) ? $_POST['lineValues'] : [];
   


        // Prepare the SQL statement to select item details based on item_code
        $stmt = pg_prepare($conn, "select_query", "SELECT * FROM tbl_mim_itemrequest WHERE item_code = $1");

        // Check if the statement preparation was successful
        if (!$stmt) {
            echo "Failed to prepare statement.";
            exit;
        }

          // Prepare the SQL statement to insert into the table
          $insert_stmt = pg_prepare($conn, "insert_query", "INSERT INTO tbl_mim_itemrequest_approval (transaction_number, item_code, item_name, specification, request_date, section, request_status, stock, unit_cost, currency, uom, total_demand_quantity, overall_total_cost, cost_center, requestor_name,approved_qty, line, quantity, purpose, remarks) 
          VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15, $16, $17, $18, $19 , $20)");
        
        // Check if the statement preparation was successful
        if (!$insert_stmt) {
            echo "Failed to prepare insert statement.";
            exit;
        }

        


                // Loop through the array and execute the prepared statement
            foreach ($selectedItemIds as $index => $itemId) {
                // Trim the item ID
                $itemId = trim($itemId);

                // Execute the prepared statement to select item details
                $result = pg_execute($conn, "select_query", array($itemId));

                // Fetch the item details
                while ($row = pg_fetch_assoc($result)) {
                $transactionNumber = $row['transaction_number'];
                $itemCode = $row['item_code'];
                $itemName = $row['item_name'];
                $itemSpecification = $row['specification'];
                $itemUom = $row['uom'];
                $requestdate = $row['request_date'];
                $itemStock = $row['stock'];
                $itemUnitcost = $row['unit_cost'];
                $itemCurrency = $row['currency'];
                $itemRequestorname = $row['requestor_name'];
                $totaloverallcost = $row['overall_total_cost'];
                $costcenter = $row['cost_center'];
                $line = isset($lineValues[$index]) ? $lineValues[$index] : '';

                echo "<h3>Item Details for Item ID: " . htmlspecialchars($itemId) . "</h3>";
                echo "Transaction Number: " . htmlspecialchars($row['transaction_number']) . "<br>";
                echo "Request Date: " . htmlspecialchars($row['request_date']) . "<br>";
                echo "Item Code: " . htmlspecialchars($row['item_code']) . "<br>";
                echo "Item Name: " . htmlspecialchars($row['item_name']) . "<br>";
                echo "Specification: " . htmlspecialchars($row['specification']) . "<br>";
                echo "UOM: " . htmlspecialchars($row['uom']) . "<br>";
                echo "Stock: " . htmlspecialchars($row['stock']) . "<br>";
                echo "Unit Cost: " . htmlspecialchars($row['unit_cost']) . "<br>";
                echo "Currency: " . htmlspecialchars($row['currency']) . "<br>";
                echo "Requestor Name: " . htmlspecialchars($row['requestor_name']) . "<br>";
                echo "Cost Center: " . htmlspecialchars($row['cost_center']) . "<br>";
                echo "Line: " . htmlspecialchars($line) . "<br>";

                // Process month inputs for the current item
                $inputs = ['quantity', 'purpose', 'remarks'];
                $inputedValues = [];

                foreach ($inputs as $input) {
                    // Check if the value for the input is fetched from the database
                    if (isset($row[$input])) {
                        $value = $row[$input];
                    } elseif (isset($_POST[$input][$index])) {
                        // If not fetched from the database, check if provided via the form
                        $value = $_POST[$input][$index];
                    } else {
                        // If neither fetched from the database nor provided via the form, set a default value
                        $value = "0";
                    }
                    $inputedValues[$input] = $value; // Correct the indexing
                    echo ucfirst($input) . " Value: " . htmlspecialchars($value) . "<br>";
                }

                // Fetch the quantity and calculate the total demand cost
                $quantity = isset($inputedValues['quantity']) ? (int)$inputedValues['quantity'] : 0;
                $totaldemand_cost = $itemUnitcost * $quantity;
                echo "Total Demand Cost: " . htmlspecialchars($totaldemand_cost) . "<br>";

                $totaldemandquantity  = isset($inputedValues['quantity']) ? (int)$inputedValues['quantity'] : 0;

                echo "<hr>";

                // Execute the prepared statement to insert item details
              // Execute the prepared statement to insert item details
              $insertResult = pg_execute($conn, "insert_query", array_merge([
                $transactionNumber, $itemCode, $itemName, $itemSpecification, $requestdate, $sectionValue, $requeststatus, $itemStock, $itemUnitcost, $itemCurrency, $itemUom, 
                $quantity, $totaldemand_cost, $costcenter, $itemRequestorname,$quantity, $line
            ], array_values($inputedValues)));

            if (!$insertResult) {
                echo "Failed to insert item details for item ID: " . htmlspecialchars($itemId) . "<br>";
            } else {
                echo "Item details inserted successfully for item ID: " . htmlspecialchars($itemId) . "<br>";
            }

        
            }
        }


        
            // Get the current maximum transaction number from CAS
            $maxTransactionNumberQuerySQLServer = "SELECT MAX([ID]) AS max_transaction_number FROM [dbo].[Tbl_ApprovalTRANSACTION]";
            $maxTransactionNumberResultSQLServer = sqlsrv_query($connsql, $maxTransactionNumberQuerySQLServer);



              // Check if the query was successfulSQL
              if (!$maxTransactionNumberResultSQLServer) {
                echo "Failed to fetch maximum transaction number.";
                exit;
            }


            if (sqlsrv_has_rows($maxTransactionNumberResultSQLServer)) {
                $row = sqlsrv_fetch_array($maxTransactionNumberResultSQLServer, SQLSRV_FETCH_ASSOC);
                $maxTransactionNumberCAS = $row['max_transaction_number'];

                   // Increment the transaction number by 1
                $nextTransactionNumberCAS = $maxTransactionNumberCAS + 1;


                // Format the transaction number
    $formattedTransactionNumber = 'TRN-' . date('Y') . '-' . $nextTransactionNumberCAS;

                echo "Transaction Number from CAS: " . $formattedTransactionNumber . "<br>";
            } else {
                echo "No transaction numbers found.";
            }


        
                //FOR CAS


                $fullname =   $itemRequestorname;
                $statusCAS = 'For Budget Controller';
                $systemID = 16;
                $case = 5;
                $approverID = 1;
                $details = 'TEST BIMMS';
                $remarks = 'BIMMS REMARKS';


                

            $currentDateTimeCAS = date('F d, Y h:i A');


            $getDETAILS= pg_prepare($conn, "select_queryDETAILS", "SELECT email,section FROM tbl_accounts WHERE employee_name = $1");
        
                    // Execute the prepared query
                $result_getDETAILS = pg_execute($conn, "select_queryDETAILS", array($fullname));
                if (!$result_getDETAILS) {
                    echo "Error executing query.";
                    exit;
                    }
        
        
                // Fetch the email address (assuming only one result is expected)
                $row = pg_fetch_assoc($result_getDETAILS);
                if ($row) {
                    $emailUSER = $row['email'];
                    $sectionUSER = $row['section'];
                    echo "Email retrieved: " . $emailUSER . "<br>";;
                    
                    echo "Section retrieved: " . $sectionUSER . "<br>";
                } else {
                    echo "No email found for the employee: " . $fullname;
                    echo "<br>";
                    echo "No section found for the employee: " . $fullname;
                }



                


                        

                        // Prepare the SQL query for SQL Server
                        $sql_SQL = "INSERT INTO [dbo].[Tbl_ApprovalTRANSACTION] 
                        ([TRANSACTION NUMBER], 
                        [SYSTEM ID], 
                        [APPROVER ID], 
                        [SYSTEM TRANSACTION], 
                        [DETAILS], 
                        [CASE], 
                        [STATUS], 
                        [REMARKS], 
                        [REQUESTOR], 
                        [REQUESTOR EMAIL], 
                        [REQUEST SECTION], 
                        [REQUEST DATE])
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                            // Array of parameters to be passed to sqlsrv_query(), correctly ordered
                            $params = array(
                                $formattedTransactionNumber, // [TRANSACTION NUMBER]
                                $systemID, // [SYSTEM ID]
                                $approverID, // [APPROVER ID]
                                $transactionNumber, // [SYSTEM TRANSACTION]
                                $details, // [DETAILS]
                                $case, // [CASE]
                                $statusCAS, // [STATUS]
                                $remarks, // [REMARKS]
                                $fullname, // [REQUESTOR]
                                $emailUSER, // [REQUESTOR EMAIL]
                                $sectionUSER, // [REQUEST SECTION]
                                $currentDateTimeCAS // [REQUEST DATE]
                            );

                            // Echo out parameters for debugging
                            echo "Parameters for sqlsrv_query(): <br>";
                            echo "1. TRANSACTION NUMBER: " . $formattedTransactionNumber . "<br>";
                            echo "2. SYSTEM ID: " . $systemID . "<br>";
                            echo "3. APPROVER ID: " . $approverID . "<br>";
                            echo "4. SYSTEM TRANSACTION: " . $transactionNumber . "<br>";
                            echo "5. DETAILS: " . $details . "<br>";
                            echo "6. CASE: " . $case . "<br>";
                            echo "7. STATUS: " . $statusCAS . "<br>";
                            echo "8. REMARKS: " . $remarks . "<br>";
                            echo "9. REQUESTOR: " . $fullname . "<br>";
                            echo "10. REQUESTOR EMAIL: " . $emailUSER . "<br>";
                            echo "11. REQUEST SECTION: " . $sectionUSER . "<br>";
                            echo "12. REQUEST DATE: " . $currentDateTimeCAS . "<br>";

                            // Prepare and execute the SQL statement
                            $insert_sqlserver = sqlsrv_prepare($connsql, $sql_SQL, $params);

                            if ($insert_sqlserver === false) {
                                // Handle error in preparation
                                $errors = sqlsrv_errors();
                                foreach ($errors as $error) {
                                    echo "SQLSTATE: " . $error['SQLSTATE'] . "<br>";
                                    echo "Code: " . $error['code'] . "<br>";
                                    echo "Message: " . $error['message'] . "<br>";
                                }
                            } else {
                                $insert_resultSQL = sqlsrv_execute($insert_sqlserver);
                                if ($insert_resultSQL === false) {
                                    // Handle error in execution
                                    $errors = sqlsrv_errors();
                                    foreach ($errors as $error) {
                                        echo "SQLSTATE: " . $error['SQLSTATE'] . "<br>";
                                        echo "Code: " . $error['code'] . "<br>";
                                        echo "Message: " . $error['message'] . "<br>";
                                    }
                                } else {
                                    echo "Record inserted successfully.";
                                }
                            }
                    }


         
        //Truncate the tbl_mim_cart table and restart identity
        $truncate_query = "TRUNCATE TABLE tbl_mim_itemrequest RESTART IDENTITY";
        pg_query($conn, $truncate_query);

    } else {
        echo "No item IDs were selected.";
    }


pg_close($conn);
?>
<script>
    alert("Submitted Successfully!");
    window.location = 'item-request-input.php';
</script>