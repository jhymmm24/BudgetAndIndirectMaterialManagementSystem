<?php
include 'Connection/connection.php'; // Assuming you have a file for PostgreSQL connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $item_ids = $_POST['item_ids'];
  $section = $_POST['section'];
  $costcenter = $_POST['costcenter'];
  $accountCodes1 = isset($_POST['account_codes1']) ? $_POST['account_codes1'] : [];
  $accountCodes2 = isset($_POST['account_codes2']) ? $_POST['account_codes2'] : [];

  // Log the incoming POST data
  error_log("POST data: " . print_r($_POST, true));
  error_log("Section: " . $section);
  error_log("Cost Center: " . $costcenter);

  // Convert item_ids to an array
  $item_ids_array = is_array($item_ids) ? $item_ids : explode(',', $item_ids);

  if (!$conn) {
    error_log("Database connection failed: " . pg_last_error());
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed.']);
    exit;
  }

  // Prepare the SQL statement to insert into the table
  $insert_to_forecast = pg_prepare($conn, "insert_query", "INSERT INTO tbl_forecast (os_code, im_code, item_name, ga_uom, ga_unit_cost, conversion, out_of_inventory, fi_uom, fi_unit_cost, supplier_name, storage_location, cost_center, specification, account_code1, account_code2) VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10, $11, $12, $13, $14, $15)");

  if (!$insert_to_forecast) {
    error_log("Failed to prepare insert statement: " . pg_last_error());
    http_response_code(500);
    echo json_encode(['error' => 'Failed to prepare insert statement.']);
    exit;
  }

  // Update query
  foreach ($item_ids_array as $id) {
    // Fetch current viewed_by_classification value to append new section
    $fetch_query = "SELECT * FROM tbl_im_list_ga WHERE im_code = $1";
    $fetch_result = pg_query_params($conn, $fetch_query, array($id));

    if (!$fetch_result) {
      error_log("Failed to fetch item details for item ID: " . htmlspecialchars($id) . " Error: " . pg_last_error());
      continue;
    }

    while ($row = pg_fetch_assoc($fetch_result)) {
      $os_code = $row['os_code'];
      $im_code = $row['im_code'];
      $item_name = $row['item_name'];
      $specification = $row['specification'];
      $ga_uom = $row['ga_uom'];
      $ga_unit_cost = $row['ga_unit_cost'];
      $conversion = $row['conversion'];
      $out_of_inventory = $row['out_of_inventory'];
      $fi_uom = $row['fi_uom'];
      $fi_unit_cost = $row['fi_unit_cost'];
      $supplier_name = $row['supplier_name'];
      $storage_location  = $row['storage_location'];
      $account_code1 = isset($accountCodes1[$im_code]) ? $accountCodes1[$im_code] : '';
      $account_code2 = isset($accountCodes2[$im_code]) ? $accountCodes2[$im_code] : '';

      $insertResult = pg_execute($conn, "insert_query", array(
        $os_code,
        $im_code,
        $item_name,
        $ga_uom,
        $ga_unit_cost,
        $conversion,
        $out_of_inventory,
        $fi_uom,
        $fi_unit_cost,
        $supplier_name,
        $storage_location,
        $costcenter,
        $specification,
        $account_code1,
        $account_code2
      ));

      if (!$insertResult) {
        error_log("Failed to insert item details for item ID: " . htmlspecialchars($id) . " Error: " . pg_last_error());
      } else {
        error_log("Item details inserted successfully for item ID: " . htmlspecialchars($id));
      }
    }
  }

  http_response_code(200);
  echo json_encode(['status' => 'success', 'message' => 'Items updated successfully']);
} else {
  http_response_code(405);
  echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
