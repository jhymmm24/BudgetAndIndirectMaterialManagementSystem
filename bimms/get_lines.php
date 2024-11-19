<?php 
include 'Connection/connection.php';


if (isset($_POST['cost_center'])) {
    $cost_center = $_POST['cost_center'];

    // Query to fetch lines based on the selected cost center
    $query = "SELECT line FROM tbl_line WHERE cost_center = $1";
    $result = pg_query_params($conn, $query, array($cost_center));

    if ($result) {
        $options_html = "<option value=''>Select Line</option>";
        while ($row = pg_fetch_assoc($result)) {
            $options_html .= "<option value='{$row['line']}'>{$row['line']}</option>";
        }
        echo $options_html;
    } else {
        echo "<option value=''>No lines found</option>";
    }
}
?>
