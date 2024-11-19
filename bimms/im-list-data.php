<?php

// Include the PostgreSQL connection file
include 'Connection/connection.php'; // Assuming you have a file for PostgreSQL connection
require 'PHPExcel/Classes/PHPExcel.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded
    if (isset($_FILES["file"])) {
        // Check for errors in file upload
        if ($_FILES["file"]["error"] > 0) {
            echo "Error: " . $_FILES["file"]["error"];
        } else {
            // Get the uploaded file details
            $fileName = $_FILES["file"]["name"];
            $fileTmpName = $_FILES["file"]["tmp_name"];

            if (empty($fileName)) {
                die("Error: No file uploaded.");
            }


            // Get the current date
            $DateToday = date('Y-m-d'); // Or any format you need
            $MonthToday = date('F'); // Full textual representation of a month, like 'June'


       
           $currentDateTime = date('Y-m-d H:i:s'); // Example format: 2024-06-13 15:30:00
           $currentFiledate = date('Ym'); 


    
            try {
                // Read data from Excel file and insert into database
                $objPHPExcel = PHPExcel_IOFactory::load($fileTmpName);
                $worksheet = $objPHPExcel->getActiveSheet();

                // Get the highest row and column numbers
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

                $dataInserted = false;

                $sql = "INSERT INTO tbl_im_list_ga (os_code,im_code, item_name, specification, ga_uom, ga_unit_cost, conversion, out_of_inventory, fi_uom, fi_unit_cost, supplier_name, storage_location) 
                VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10,$11,$12)";
        
                    // Columns G to K indices (0-based index)
                $excludeColumns = range(6, 10); // G is index 6, K is index 10

                // Loop through each row of the Excel file
                for ($row = 2; $row <= $highestRow; $row++) { // Start from 2 to skip the header row
                    $rowData = [];
                    // Loop through each column of the row
                    for ($col = 0; $col < $highestColumnIndex; $col++) {
                        // Check if the current column index should be excluded
                        if (in_array($col, $excludeColumns)) {
                            continue; // Skip this column
                        }

                        // Get the value of the cell
                        $cellValue = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                        // If cell value is empty or null, set it to NULL
                        $cellValue = ($cellValue === '' || $cellValue === null) ? NULL : $cellValue;
                        // Add the cell value to the row data array
                        $rowData[] = $cellValue;
                    }

                    // Check if $rowData has exactly 12 elements (as per your SQL query)
                    if (count($rowData) !== 12) {
                        // Log and skip row if not exactly 12 columns
                        error_log('Error: Row ' . $row . ' does not have 12 columns.');
                        continue;
                    }


                        
                        // Execute the SQL statement with row data as parameters
                        $result = pg_query_params($conn, $sql, $rowData);
                            if (!$result) {
                                die(pg_last_error($conn));
                            } else {
                                // Set flag indicating successful insertion
                                $dataInserted = true;
                                
                       
                            }
                        }


                // If data was successfully inserted
                if ($dataInserted) {
                    echo json_encode(array('success' => true, 'message' => 'Data successfully inserted into database.'));
                   
                    
                } else {
                    echo json_encode(array('success' => false, 'message' => 'No data inserted.'));
                }



                                

            
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($fileTmpName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }
        }
    }
}
?>
