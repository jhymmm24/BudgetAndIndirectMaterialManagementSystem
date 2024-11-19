<?php

include 'Connection/connection.php';



// Include PHPExcel library
require_once 'PHPExcel/Classes/PHPExcel.php';

// Example data (replace with your DataTable data retrieval)
$data = array(
    array('Column 1', 'Column 2', 'Column 3'),
    array('Data 1', 'Data 2', 'Data 3'),
    // Add more rows as needed
);

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Your Name")
                             ->setLastModifiedBy("Your Name")
                             ->setTitle("Table Export")
                             ->setSubject("Table Export")
                             ->setDescription("Exported table data")
                             ->setKeywords("excel table export");

// Add data to the Excel sheet
$objPHPExcel->setActiveSheetIndex(0);
$row = 1;
foreach ($data as $rowData) {
    $col = 'A';
    foreach ($rowData as $cellData) {
        $objPHPExcel->getActiveSheet()->setCellValue($col.$row, $cellData);
        $col++;
    }
    $row++;
}

// Set headers for Excel2007 format (xlsx)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="table_export.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>