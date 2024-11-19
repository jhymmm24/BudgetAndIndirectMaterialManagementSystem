<?php
include 'Connection/connection.php'; // Ensure this file establishes a PostgreSQL connection

$transno = $_GET['transaction_number'] ?? ''; // Fetch transaction_number parameter

// Use parameterized query to prevent SQL injection
$sql = "SELECT * FROM tbl_mim_itemrequest_approval WHERE transaction_number = $1";
$result = pg_query_params($conn, $sql, array($transno));

if (!$result) {
    echo "An error occurred.\n";
    exit;
}
?>

<div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" style="font-size: 16px;">Transaction ID: <?php echo htmlspecialchars($transno); ?></h4>
            <button type="button" style="color:red; border:none; background-color:white;" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <table style="width: 100%; border-collapse: collapse; border: 2px solid black;">
                <thead>
                    <tr>
                        <th style="text-align: center;">Application Date</th>
                        <th style="text-align: center;">Transaction Number</th>
                        <th style="text-align: center;">Item Code</th>
                        <th style="text-align: center;">Item Name</th>
                        <th style="text-align: center;">Specification</th>
                        <th style="text-align: center;">UOM</th>
                        <th style="text-align: center;">Unit Cost</th>
                        <th style="text-align: center;">Currency</th>
                        <th style="text-align: center;">Approved Quantity</th>
                        <th style="text-align: center;">Overall Total Cost (USD)</th>
                        <th style="text-align: center;">Requestor Name</th>
                        <th style="text-align: center;">Cost Center</th>
                        <th style="text-align: center;">Request Status</th>
                        <th style="text-align: center;">Available Stock Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = pg_fetch_assoc($result)) { 
                        $item_code = htmlspecialchars($row['item_code']);
                        $item_name = htmlspecialchars($row['item_name']);
                        $specification = htmlspecialchars($row['specification']);
                        $uom = htmlspecialchars($row['uom']);
                        $unitcost = htmlspecialchars($row['unit_cost']);
                        $currency = htmlspecialchars($row['currency']);
                        $approvedqty = htmlspecialchars($row['approved_qty']);
                        $costcenter = htmlspecialchars($row['cost_center']);
                        $stock = htmlspecialchars($row['stock'] ?? 0); // Default to 0 if null
                        $transactionnumber = htmlspecialchars($row['transaction_number']);
                        $requestorname = htmlspecialchars($row['requestor_name']);
                        $requestdate = htmlspecialchars($row['request_date']);
                        $requeststatus = htmlspecialchars($row['request_status']);
                        $overall_total_cost_approved_qty = $approvedqty * $unitcost;
                    ?>
                    <tr>
                        <td style="border: 1px solid black;"><?php echo $requestdate; ?></td>
                        <td style="border: 1px solid black;"><?php echo $transactionnumber; ?></td>
                        <td style="border: 1px solid black;"><?php echo $item_code; ?></td>
                        <td style="border: 1px solid black;"><?php echo $item_name; ?></td>
                        <td style="border: 1px solid black;"><?php echo $specification; ?></td>
                        <td style="border: 1px solid black;"><?php echo $uom; ?></td>
                        <td style="border: 1px solid black;"><?php echo $unitcost; ?></td>
                        <td style="border: 1px solid black;"><?php echo $currency; ?></td>
                        <td style="border: 1px solid black;"><?php echo $approvedqty; ?></td>
                        <td style="border: 1px solid black;"><?php echo $overall_total_cost_approved_qty; ?></td>
                        <td style="border: 1px solid black;"><?php echo $requestorname; ?></td>
                        <td style="border: 1px solid black;"><?php echo $costcenter; ?></td>
                        <td style="border: 1px solid black;"><?php echo $requeststatus; ?></td>
                        <td style="border: 1px solid black;"><?php echo $stock; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
