<?php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection
include 'Connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "POST request received.<br>"; // Debugging output

    // Debugging the entire POST data
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';


    $currentMonthToday = date('F');
    // Check if selectedItemId is set
    if (isset($_POST['selectedItemId'])) {
        $selectedItemIds = explode(',', $_POST['selectedItemId']);
        // Debugging: Ensure the array is populated correctly
        var_dump($selectedItemIds);

        // Retrieve user session and request status
        $usersession = pg_escape_string($conn, $_POST['usersession']);
        $requeststatus = "For Budget Controller";

        // Capture budget controller sections from the POST data
        $sectionBudgetController = pg_escape_string($conn, $_POST['sectionBudgetController'] ?? '');
        $sectionSupervisor = pg_escape_string($conn, $_POST['sectionSupervisor'] ?? '');
        $sectionManager = pg_escape_string($conn, $_POST['sectionManager'] ?? '');
        $peSectionSupervisor = pg_escape_string($conn, $_POST['peSectionSupervisor'] ?? '');
        $peSectionManager = pg_escape_string($conn, $_POST['peSectionManager'] ?? '');

        // Get the months array
        $months = $_POST['months'];

        // Prepare the SQL statement to select item details based on item_code (moved outside the loop)
        $stmt = pg_prepare($conn, "select_query", "SELECT * FROM tbl_mim_cart WHERE item_code = $1");

        // Process each selected item ID
        foreach ($selectedItemIds as $itemId) {
            $itemId = trim($itemId);
            echo "Processing item ID: " . htmlspecialchars($itemId) . "<br>"; // Debugging output
            $itemId = pg_escape_string($conn, $itemId); // Sanitize item ID

            // Execute the prepared statement for the current item ID
            $result = pg_execute($conn, "select_query", [$itemId]);

            // Fetch item details
            if ($row = pg_fetch_assoc($result)) {
                // Sanitize fetched item details
                $transactionNumber = pg_escape_string($conn, $row['transaction_number'] ?? '');
                $itemCode = pg_escape_string($conn, $row['item_code'] ?? '');
                $itemName = pg_escape_string($conn, $row['item_name'] ?? '');
                $itemSpecification = pg_escape_string($conn, $row['specification'] ?? '');
                $itemUom = pg_escape_string($conn, $row['uom'] ?? '');
                $requestdate = pg_escape_string($conn, $row['request_date'] ?? '');
                $itemStock = pg_escape_string($conn, $row['stock'] ?? '');
                $itemUnitcost = pg_escape_string($conn, $row['unit_cost'] ?? '');
                $itemCurrency = pg_escape_string($conn, $row['currency'] ?? '');
                $itemLt = pg_escape_string($conn, $row['lt'] ?? '');
                $itemRequestorname = pg_escape_string($conn, $row['requestor_name'] ?? '');
                $itemDeliverydate = pg_escape_string($conn, $row['delivery_date'] ?? '');
                $sectionname = pg_escape_string($conn, $row['section_name'] ?? '');
                $costcenter = pg_escape_string($conn, $row['cost_center'] ?? '');

                // Loop through each month in the months array
                foreach ($months as $monthKey => $items) {
                    // Check if the item exists for the current month
                    if (isset($items[$itemCode])) {
                        $targetquantity = (int)$items[$itemCode]; // Get the quantity for this item and month

                        // Only insert if the target quantity is greater than 0
                        if ($targetquantity > 0) {
                            // Prepare the SQL statement for insertion
                            $insert_query = "INSERT INTO tbl_mim_approvaltest (
                                transaction_number, request_date, item_code, item_name, specification, 
                                uom, request_status, stock, unit_cost, currency, lt, 
                                requestor_name, delivery_date, section_name, cost_center, 
                                approver_budgetcontroller, approver_sectionspv, approver_sectionmgr, 
                                approver_pespv, approver_pemgr, is_proceed, target_month, target_qty, input_month
                            ) VALUES (
                                '$transactionNumber', '$requestdate', '$itemCode', '$itemName',
                                '$itemSpecification', '$itemUom', '$requeststatus', '$itemStock',
                                '$itemUnitcost', '$itemCurrency', '$itemLt', '$itemRequestorname',
                                '$itemDeliverydate', '$sectionname', '$costcenter',
                                '$sectionBudgetController', '$sectionSupervisor', '$sectionManager',
                                '$peSectionSupervisor', '$peSectionManager', '1', '$monthKey', '$targetquantity','$currentMonthToday'
                            )";

                            // Execute the insertion statement
                            $insertResult = pg_query($conn, $insert_query);

                            if (!$insertResult) {
                                // Get the error message from PostgreSQL
                                $error = pg_last_error($conn);
                                echo "Failed to insert item details for item ID: " . htmlspecialchars($itemId) . ". Error: " . $error . "<br>";
                            } else {
                                echo "Item details inserted successfully for item ID: " . htmlspecialchars($itemId) . ", Target Month: {$monthKey}, Quantity: {$targetquantity}<br>";
                            }
                        }
                    }
                }

            } else {
                echo "No item found for item ID: " . htmlspecialchars($itemId) . "<br>"; // Debugging output
            }
        }

        // After processing all items, delete rows where requestor_name matches the user session
        $delete_query = "DELETE FROM tbl_mim_cart WHERE requestor_name = '$usersession'";
        $deleteResult = pg_query($conn, $delete_query);

        if (!$deleteResult) {
            $error = pg_last_error($conn);
            echo "Failed to delete rows for requestor_name: " . htmlspecialchars($usersession) . ". Error: " . $error . "<br>";
        } else {
            echo "Successfully deleted rows where requestor_name is: " . htmlspecialchars($usersession) . "<br>";
        }

    } else {
        echo "No selectedItemId found in POST data.<br>"; // Debugging output
    }





       //INSERT TO CAS


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
    echo "No POST request detected.<br>"; // Debugging output
}





?>
