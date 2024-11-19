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

            // Get the selected data type
            $dataType = isset($_POST["datatype"]) ? $_POST["datatype"] : '';

            // Read data from Excel file and insert into database
            $objPHPExcel = PHPExcel_IOFactory::load($fileTmpName);
            $worksheet = $objPHPExcel->getActiveSheet();

            // Get the highest row and column numbers
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

            // Define table name based on data type
            $tableName = "";
            if ($dataType == "MIM") {
                $tableName = "tbl_mim";
            } elseif ($dataType == "PIM") {
                $tableName = "tbl_pim";
            } elseif ($dataType == "P&J") {
                $tableName = "tbl_pnj";
            }

            // Check if a valid table name was determined
            if (!empty($tableName)) {
                // Flag to track successful insertion
                $dataInserted = false;

                // Prepare the SQL statement for insertion
                $sql = "INSERT INTO $tableName (item_code, item_name, specification, uom,stock,unit_cost,currency,lt) VALUES ($1, $2, $3, $4,$5,$6,$7,$8)";

                // Insert data into the appropriate table
                for ($row = 3; $row <= $highestRow; $row++) { // Start from 2 to skip the header row
                    $rowData = [];
                    // Loop through each column of the row
                    for ($col = 1; $col < $highestColumnIndex; $col++) {
                        // Get the value of the cell
                        $cellValue = $worksheet->getCellByColumnAndRow($col, $row)->getValue();
                        // If cell value is empty, set it to NULL
                        $cellValue = empty($cellValue) ? NULL : $cellValue;
                        // Add the cell value to the row data array
                        $rowData[] = $cellValue;
                    }
                    // Now $rowData contains all the values for this row

                    // Execute the SQL statement with row data as parameters
                    $result = pg_query_params($conn, $sql, array_slice($rowData, 0,8)); // Pass only the first 4 parameters
                    if (!$result) {
                        die(pg_last_error($conn));
                    } else {
                        // Set flag indicating successful insertion
                        $dataInserted = true;
                    }
                }

                // Check if any data was inserted successfully and display alert
                if ($dataInserted) {
                    echo "<script>alert('Data inserted successfully');</script>";
                    echo "<script>setTimeout(function(){ window.location.href = 'demand-list-input.php'; }, 2000);</script>";
                    exit; // Ensure no further code is executed after redirection

                } else {
                    echo "<script>alert('No new data inserted');</script>";
                }

                pg_close($conn); // Close the connection
            } else {
                echo "Invalid data type selected.";
            }
        }
    }
}

?>
