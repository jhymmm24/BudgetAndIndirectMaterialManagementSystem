<?php
include 'Connection/connection.php';

if (isset($_GET['transaction_number']) && !empty($_GET['transaction_number'])) {
    $transactionNumber = $_GET['transaction_number'];

    $query = "SELECT * FROM tbl_mim_itemrequest_approval WHERE transaction_number = $1";
    $stmt = pg_prepare($conn, "fetch_transaction", $query);
    $result = pg_execute($conn, "fetch_transaction", array($transactionNumber));
    $rows = pg_fetch_all($result);

    if ($rows) {
        // Assuming application number is the same for all rows in the result
        $applicationNumber = $rows[0]['transaction_number'] ?? 'N/A';
        $section = $rows[0]['section'] ?? 'N/A';
        $requestor_name = $rows[0]['requestor_name'] ?? 'N/A';
        $request_date = $rows[0]['request_date'] ?? 'N/A';


        // Start capturing the table HTML
        ob_start();

        echo "<table id='example25' class='display' style='width:100%;'>";
        echo "<thead>
                <tr>
                    <th style='text-align: center; font-size: 14px'>Item Code</th>
                    <th style='text-align: center; font-size: 14px'>Item Name</th>
                    <th style='text-align: center; font-size: 14px'>Specification</th>
                    <th style='text-align: center; font-size: 14px'>Stock</th>
                     <th style='text-align: center; font-size: 14px'>AppliedQty</th>
                    <th style='text-align: center; font-size: 14px'>UOM</th>
                    <th style='text-align: center; font-size: 14px'>Unit Cost</th>
                    <th style='text-align: center; font-size: 14px'>Currency</th>
                    <th style='text-align: center; font-size: 14px'>Supplier</th>
                </tr>
              </thead>";
        echo "<tbody>";

        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td style='font-size: 14px; text-align: center;'>" . ($row['item_code'] ?? 'N/A') . "</td>";
            echo "<td style='font-size: 14px; text-align: center;'>" . ($row['item_name'] ?? 'N/A') . "</td>";
            echo "<td style='font-size: 14px; text-align: center;'>" . ($row['specification'] ?? 'N/A') . "</td>";
            echo "<td style='font-size: 14px; text-align: center;'>" . ($row['stock'] ?? '0') . "</td>";
            echo "<td style='font-size: 14px; text-align: center;'>" . ($row['approved_qty'] ?? '0') . "</td>";
            echo "<td style='font-size: 14px; text-align: center;'>" . ($row['uom'] ?? '0') . "</td>";
            echo "<td style='font-size: 14px; text-align: center;'>" . ($row['unit_cost'] ?? '0') . "</td>";
            echo "<td style='font-size: 14px; text-align: center;'>" . ($row['currency'] ?? 'N/A') . "</td>";
            echo "<td style='font-size: 14px; text-align: center;'>" . ($row['supplier'] ?? 'N/A') . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        // Capture the table HTML
        $detailsHtml = ob_get_clean();

        // Return JSON response
        echo json_encode([
            'applicationNumber' => $applicationNumber,
            'section' => $section,
            'requestor' => $requestor_name,
            'applicationdate'  => $request_date,
            'detailsHtml' => $detailsHtml
        ]);
    } else {
        echo json_encode(['error' => 'No details found for this transaction.']);
    }
} else {
    echo json_encode(['error' => 'Invalid transaction number.']);
}



?>

