<?php
include 'Connection/connection.php';

$category = $_POST['category'];

// Adjust the query based on the selected category
if ($category == '' || $category == '-') {
    $query = "SELECT * FROM tbl_mim";
} else {
    $query = "SELECT * FROM tbl_mim WHERE storage_location = '$category'";
}

$result = pg_query($conn, $query);

while ($row = pg_fetch_assoc($result)) {
    $id2 = $row['id'];
    $item_code = $row['item_code'];
    $item_name = $row['item_name'];
    $specification = $row['specification'];
    $uom = $row['uom'];
    $stock = $row['stock'];

    echo '<tr>
            <td style="width: 15px;">
                <i class="fa-solid fa-cart-shopping checkbox-icon" id="icon-'.$id2.'"></i>
                <input type="hidden" name="selected[]" class="single-checkbox2" id="selected-'.$id2.'" value="'.$item_code.'">
            </td>
            <td style="font-size: 12px; text-align: center;">'.$item_code.'</td>
            <td style="font-size: 12px; text-align: center;">'.$item_name.'</td>
            <td style="font-size: 12px; text-align: center;">'.$specification.'</td>
            <td style="font-size: 12px; text-align: center;">'.$uom.'</td>
            <td style="font-size: 12px; text-align: center;">'.($stock === null ? 0 : $stock).'</td>
          </tr>';
}
?>
