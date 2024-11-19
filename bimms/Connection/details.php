<?php



// overall.php

// Start session
session_start();

// Access the session variables
if (isset($_SESSION['employee_number']) && isset($_SESSION['employee_name'])) {
    // Do whatever you want with these variables, for example:
    echo "Employee Number: {$_SESSION['employee_number']}<br>";
    echo "Fullname: {$_SESSION['employee_name']}";
} else {
    // Handle the case where variables are not set
    echo "Variables not set";
}
?>


