<?php
header('Content-Type: application/json');

$labels = ["January", "February", "March", "April", "May", "June", "July"];
$barData = [12, 19, 3, 5, 2, 3, 7];
$lineData = [2, 3, 20, 5, 1, 4, 10];

$response = array(
    "labels" => $labels,
    "barData" => $barData,
    "lineData" => $lineData
);

echo json_encode($response);
?>
