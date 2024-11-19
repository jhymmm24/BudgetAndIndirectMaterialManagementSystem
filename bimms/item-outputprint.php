<?php

include 'Connection/connection.php'; // Adjust the path as needed

require 'vendor/autoload.php'; // Adjust the path as needed

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

// Check if transaction_number is provided
if (!isset($_GET['transaction_number'])) {
    die("Transaction number not provided.");
}

$fetch_transactionnumber = $_GET['transaction_number'];

// Fetch data from PostgreSQL
$query = "SELECT requestor_name, transaction_number, unit_cost, request_date, currency, cost_center FROM tbl_mim_itemrequest_approval WHERE transaction_number = $1";
$result = pg_query_params($conn, $query, array($fetch_transactionnumber));

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

// Load your Excel template file
$templateFile = 'template/ApplyingSlip.xlsx'; // Adjust the path as needed
$spreadsheet = IOFactory::load($templateFile);
$sheet = $spreadsheet->getActiveSheet();

// Populate the Excel file with data
$row = pg_fetch_assoc($result);
if ($row) {
    $sheet->setCellValue('B2', $row['requestor_name']);
    $sheet->setCellValue('D2', $row['transaction_number']);
    $sheet->setCellValue('G2', $row['unit_cost']);
    $sheet->setCellValue('B3', $row['request_date']);
    $sheet->setCellValue('D3', $row['currency']);
    $sheet->setCellValue('B4', $row['cost_center']); // Assuming this is correct cell
    // $sheet->setCellValue('D4', $row['cost_center']); // Duplicate removed
    $sheet->setCellValue('G4', $row['cost_center']); // Assuming this is correct cell
} else {
    die("No data found for transaction number: $fetch_transactionnumber");
}

// Save the populated Excel file
$outputFile = 'ApplyingSlip_Populated.xlsx'; // Adjust the path and name as needed
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save($outputFile);

// Close database connection
pg_close($conn);

echo "Data has been exported to Excel file successfully.";
?>
