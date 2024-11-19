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


            // Remove the file extension from the filename
            $fileNameWithoutExt = pathinfo($fileName, PATHINFO_FILENAME);

            // Get the current date
            $DateToday = date('Y-m-d'); // Or any format you need
            $MonthToday = date('F'); // Full textual representation of a month, like 'June'


           $uploadedby = $_GET['user'];


           $currentDateTime = date('Y-m-d H:i:s'); // Example format: 2024-06-13 15:30:00
           $currentFiledate = date('Ym'); 


            $currentFilename = "COMMON GOODS PRICE LIST-".$currentFiledate;

            try {
                // Read data from Excel file and insert into database
                $objPHPExcel = PHPExcel_IOFactory::load($fileTmpName);
                $worksheet = $objPHPExcel->getActiveSheet();

                // Get the highest row and column numbers
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

                $dataInserted = false;

                $sql = "INSERT INTO tbl_common_goods_data (im_code, item_name, specification, pe_uom, pe_unit_cost, conversion, inventory_out, fi_uom, fi_unit_cost, category, warehouse,filename) 
                VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10,$11,$12)";
        
        for ($row = 2; $row <= $highestRow; $row++) { // Start from 2 to skip the header row
            $rowData = [];
            // Loop through each column of the row
            for ($col = 0; $col < $highestColumnIndex; $col++) {
                // Get the value of the cell
                $cellValue = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                // If cell value is empty or null, set it to NULL
                $cellValue = ($cellValue === '' || $cellValue === null) ? NULL : $cellValue;
                // Add the cell value to the row data array
                $rowData[] = $cellValue;
            }
        

            $rowData[] = $currentFilename;


          // Check if $rowData has exactly 11 elements
    if (count($rowData) !== 12) {
        // Handle error or skip row
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


                $sqlCommonGoodsPricelist = "INSERT INTO tbl_common_goods_pricelist (month, file_name, uploaded_by, uploaded_date, uploaded_month) VALUES ($1, $2, $3, $4, $5)";

                // Execute the SQL statement with row data as parameters
                $params = array($MonthToday, $currentFilename, $uploadedby, $DateToday, $MonthToday);
                $result = pg_query_params($conn, $sqlCommonGoodsPricelist, $params);
                
                if (!$result) {
                    die(pg_last_error($conn));
                } else {
                    // Success code can be added here if needed
                }
                

                // Check if any data was inserted successfully and display alert
                if ($dataInserted) {
                    echo "<script>alert('Data inserted successfully');</script>";
                    echo "<script>setTimeout(function(){ window.location.href = 'common-goods-pricelist.php'; }, 2000);</script>";
                    exit; // Ensure no further code is executed after redirection
                } else {
                    echo "<script>alert('No new data inserted');</script>";
                }
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($fileTmpName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }
        }
    }
}
?>
