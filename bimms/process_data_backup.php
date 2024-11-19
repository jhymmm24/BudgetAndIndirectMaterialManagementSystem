<?php
include 'Connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['selectedItemId'])) {
        // Get the array of selected item IDs
        $selectedItemIds = explode(',', $_POST['selectedItemId']);
        $usersession = $_POST['usersession'];
        $requeststatus = "For Budget Controller";

$sectionBudgetController = isset($_POST['sectionBudgetController']) ? $_POST['sectionBudgetController'] : '';
$sectionSupervisor = isset($_POST['sectionSupervisor']) ? $_POST['sectionSupervisor'] : '';
$sectionManager = isset($_POST['sectionManager']) ? $_POST['sectionManager'] : '';
$peSectionSupervisor = isset($_POST['peSectionSupervisor']) ? $_POST['peSectionSupervisor'] : '';
$peSectionManager = isset($_POST['peSectionManager']) ? $_POST['peSectionManager'] : '';



        // Prepare the SQL statement to select item details based on item_code
        $stmt = pg_prepare($conn, "select_query", "SELECT * FROM tbl_mim_cart WHERE item_code = $1");

        // Check if the statement preparation was successful
        if (!$stmt) {
            echo "Failed to prepare statement.";
            exit;
        }

        // // Prepare the SQL statement to check if item exists in tbl_mim_approval
        $check_exist_stmt = pg_prepare($conn, "check_exist_query", "SELECT * FROM tbl_mim_approval WHERE item_code = $1 AND cost_center = $2 AND request_status != 'For Budget Controller'");

        // Check if the statement preparation was successful
        if (!$check_exist_stmt) {
            echo "Failed to prepare check exist statement.";
            exit;
        }

        // Prepare the SQL statement to insert into the table
        $insert_stmt = pg_prepare($conn, "insert_query", "INSERT INTO tbl_mim_approval (transaction_number, request_date, item_code, item_name, specification, uom, request_status, stock, unit_cost, currency, lt, requestor_name, delivery_date, section_name, cost_center, 
        approver_budgetcontroller, approver_sectionspv, approver_sectionmgr, approver_pespv, approver_pemgr,is_proceed, january, february, march, april, may, june, july, august, september, october, november, december) VALUES ($1, $2, $3, $4, $5, $6, $7,$8,$9,$10,$11,$12,$13,$14,$15,$16,$17,$18,$19,$20,$21,$22,$23,$24,$25,$26,$27,$28,$29,$30,$31,$32,$33)");

        // Check if the statement preparation was successful
        if (!$insert_stmt) {
            echo "Failed to prepare insert statement.";
            exit;
        }

        // Prepare the SQL statement to update the table (it will be prepared only once)
        $update_stmt_prepared = false;

        // Loop through the array and execute the prepared statement
        foreach ($selectedItemIds as $index => $itemId) {
            // Trim the item ID
            $itemId = trim($itemId);

            // Execute the prepared statement to select item details
            $result = pg_execute($conn, "select_query", array($itemId));

            // Fetch the item details
            while ($row = pg_fetch_assoc($result)) {
                // Fetch item details
                $transactionNumber = $row['transaction_number'];
                $itemCode = $row['item_code'];
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
                $requestoremail = $row['requestor_email'];

                // Check if the item exists in tbl_mim_approval
                $check_exist_result = pg_execute($conn, "check_exist_query", array($itemCode, $costcenter));
                $existing_record = pg_fetch_assoc($check_exist_result);

                if ($existing_record) {
                    // Array of months
                    $months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
                    
                    $monthValues = [];
                    
                    $updateClauses = [];
                    $params = [];
                    $paramIndex = 1;

                    // Fetch existing values
                    $select_query = "SELECT " . implode(', ', $months) . " FROM tbl_mim_approval WHERE item_code = $1 AND cost_center = $2";
                    $select_params = [$itemCode, $costcenter];
                    $select_result = pg_query_params($conn, $select_query, $select_params);

                    if ($select_result) {
                        $existingValues = pg_fetch_assoc($select_result);

                        // Loop through each month to calculate the new values
                        foreach ($months as $month) {
                            if (isset($_POST[$month][$index]) && $_POST[$month][$index] !== "") {
                                // Form value is provided and not empty
                                $newValue = $_POST[$month][$index];
                                $existingValue = isset($existingValues[$month]) ? $existingValues[$month] : 0;
                                $sumValue = $existingValue + $newValue;

                                // Store the new summed value in monthValues array
                                $monthValues[$month] = $sumValue;
                                $updateClauses[] = "$month = \$$paramIndex";
                                $params[] = $sumValue;
                                $paramIndex++;
                            }
                        }

                        // Add item_code and cost_center to the parameters
                        $params[] = $itemCode;
                        $params[] = $costcenter;

                        if (!empty($updateClauses)) {
                            // Only run the update if there are fields to update
                            $update_query = "UPDATE tbl_mim_approval 
                                SET " . implode(', ', $updateClauses) . "
                                WHERE 
                                    item_code = \$$paramIndex
                                    AND 
                                    cost_center = \$" . ($paramIndex + 1);

                            if (!$update_stmt_prepared) {
                                $update_stmt = pg_prepare($conn, "update_query", $update_query);
                                if (!$update_stmt) {
                                    echo "Failed to prepare update statement.";
                                    exit;
                                }
                                $update_stmt_prepared = true;
                            }

                            $update_result = pg_execute($conn, "update_query", $params);

                            if (!$update_result) {
                                echo "Failed to update item details for item ID: " . htmlspecialchars($itemId) . "<br>";
                            } else {
                                echo "Item details updated successfully for item ID: " . htmlspecialchars($itemId) . "<br>";
                            }
                        } else {
                            echo "No fields to update for item ID: " . htmlspecialchars($itemId) . "<br>";
                        }
                    } else {
                        echo "Failed to fetch existing values.";
                    }

                } else {
                    // Item does not exist, insert new record
                    // Process month inputs for the current item
                    $months = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
                    $monthValues = [];
                    foreach ($months as $month) {
                        // Check if the value for the month is fetched from the database
                        if (isset($row[$month])) {
                            $value = $row[$month];
                        } elseif (isset($_POST[$month][$index])) {
                            // If not fetched from the database, check if provided via the form
                            $value = $_POST[$month][$index];
                        } else {
                            // If neither fetched from the database nor provided via the form, set a default value
                            $value = "0"; // Set to 0 if null
                        }

                        // Replace blank or null values with 0
                        $value = ($value === "" || $value === null) ? "0" : $value;

                        $monthValues[] = $value;
                    }
                 
                    
                    // Execute the prepared statement to insert item details
                    $insertResult = pg_execute($conn, "insert_query", array_merge([$transactionNumber, $requestdate, $itemCode, $itemName, $itemSpecification, $itemUom, $requeststatus, $itemStock, $itemUnitcost, $itemCurrency, $itemLt, $itemRequestorname, $itemDeliverydate, $sectionname, $costcenter,$sectionBudgetController,$sectionSupervisor,$sectionManager,$peSectionSupervisor,$peSectionManager,"1"], $monthValues));

                    if (!$insertResult) {
                        echo "Failed to insert item details for item ID: " . htmlspecialchars($itemId) . "<br>";
                    } else {
                        echo "Item details inserted successfully for item ID: " . htmlspecialchars($itemId) . "<br>";
                    }
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
        $fullname = $itemRequestorname;
        $statusCAS = 'For Budget Controller';
        $systemID = 16;
        $case = 4;
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
            echo "Email retrieved: " . $emailUSER . "<br>";
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

    

    } else {
        echo "No item IDs were selected.";
    }
} else {
    echo "Invalid request method.";
}
    // Truncate the tbl_mim_cart table and restart identity
    $delete_itemcode_query = "DELETE FROM tbl_mim_cart WHERE requestor_name = '$usersession'";
    pg_query($conn, $delete_itemcode_query);

pg_close($conn);


?>
<!-- <script>
    alert('Submitted Successfully!');
window.location.href = 'demand-list-input.php';
</script> -->