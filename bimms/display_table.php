<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

      <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

  <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php 




include 'Connection/connection.php';




// Retrieve selected common training from AJAX request
$selectedOption = $_POST['option'];
$usercategory = $_POST['usercategory'];

// Perform database query based on the selected option
if ($selectedOption === 'FY2024') {
 ?>   
   

 

   <table id="example23" class="display bordered-table"  style="width:100%;  overflow-x: auto;  white-space: nowrap;   display: block;">
    <thead>
        <tr>
            <th style="text-align: center;">Select</th>
            <th style="text-align: center; width:150px">Month</th>
            <th style="text-align: center; width:650px;">File Name</th>
            <th style="text-align: center; width:250px;">Uploaded By</th>
            <th style="text-align: center; width:150px;">Date</th>
            <th style="text-align: center;">History</th>
            <th style="text-align: center;">View</th>
        </tr>
    </thead>
    <tbody>
    <?php


            $selectcommon = "
            WITH CTE AS (
                SELECT *,
                    ROW_NUMBER() OVER (PARTITION BY file_name ORDER BY (SELECT NULL)) AS RowNum
                FROM tbl_common_goods_pricelist

            )
            SELECT *
            FROM CTE
            WHERE RowNum = 1";




        //  $selectcommon = "SELECT * FROM tbl_common_goods_pricelist";
        $stmt3 = pg_query($conn,$selectcommon);
                     
        while ($row = pg_fetch_assoc($stmt3)) {
            $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
            $month = $row['month']; // Assuming column names in PostgreSQL are in lowercase
            $file_name = $row['file_name'];
            $updatedby = $row['update_by'];
            $uploadedby = $row['uploaded_by'];
            $date = $row['uploaded_date'];
            $history = $row['history'];
        ?>
       <tr>
    <td style="width: 35px;">
        <input type="checkbox" name="selected[]" class="single-checkbox" id="selected-<?php echo $id2; ?>" value="<?php echo $file_name; ?>">
    </td>
    <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['month']; ?></td>
    <td style="font-size: 12px; text-align: center; width:650px;"><?php echo $row['file_name']; ?></td>
    <td style="font-size: 12px; text-align: center; width:250px;"><?php echo $row['uploaded_by']; ?></td>
    <td style="font-size: 12px; text-align: center; width:150px;"><?php echo $row['uploaded_date']; ?></td>
    <td style="font-size: 12px; text-align: center;">
        <button type="button" style="border: none; background: none; cursor: pointer;" data-toggle="modal" data-target="#myModalhistory" onclick="setModalContent('<?php echo $file_name; ?>')">
            <i class="fa fa-history" style="color:black; font-size: 20px;" aria-hidden="true"></i>
        </button>

     </td> 
    <td style="font-size: 12px; text-align: center; " >
    
    <?php if ($usercategory === 'admin'): ?>
        <!-- Show admin link -->
        <a href="common-goods-pricelist_masterlist.php?FileName=<?php echo $file_name;?>&usercategory=admin">
            <button type="button" style="border: none; background: none; cursor: pointer;">
                <i class="fa-solid fa-eye" style="color:black; font-size: 20px;" aria-hidden="true"></i>
            </button>
        </a>
    <?php elseif ($usercategory === 'user'): ?>
        <!-- Show user link -->
        <a href="common-goods-pricelist_masterlist.php?FileName=<?php echo $file_name;?>&usercategory=user">
            <button type="button" style="border: none; background: none; cursor: pointer;">
                <i class="fa-solid fa-eye" style="color:black; font-size: 20px;" aria-hidden="true"></i>
            </button>
        </a>
    <?php endif; ?>



     </td>

      </tr>
 
        <?php

        
        }
        ?>
    </tbody>
</table>


       <!-- Modal -->
        <div class="modal fade" id="myModalhistory">
            <div class="modal-dialog">
                <div class="modal-content">
                 
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalTitle" style="font-weight: bold;">History Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                 
                    <div class="modal-body">

                    <table id="example25" class="display bordered-table" style="width:100%; overflow-x: auto; white-space: nowrap; display: block;">
    <thead>
        <tr>
            <th style="text-align: center; width:250px;">Updated By</th>
            <th style="text-align: center;">Updated Date and Time</th>
            <th style="text-align: center;">Category</th>
        </tr>
    </thead>
    <tbody>

                <?php
                    $selecthistory = "SELECT * FROM tbl_common_goods_pricelist WHERE file_name = '$file_name'";
                    $stmt4 = pg_query($conn, $selecthistory);

                    while ($row = pg_fetch_assoc($stmt4)) {
                        $id2 = $row['id']; // Assuming 'id' is the primary key column in tbl_mim
                        $month = $row['month']; // Assuming column names in PostgreSQL are in lowercase
                        $file_name = $row['file_name'];
                        $updatedby = $row['update_by'];
                        $date = $row['uploaded_date'];
                        $history = $row['history'];
                        $time = $row['updated_time'];
                        $category = $row['category_beingupdated'];

                        // Filter rows where 'update_by' is not empty
                        if (!empty($updatedby)) {
                            ?>

                            <tr>
                                <td style="font-size: 12px; text-align: center; width:150px;"><?php echo htmlspecialchars($updatedby); ?></td>
                                <td style="font-size: 12px; text-align: center; width:250px;"><?php echo htmlspecialchars($time); ?></td>
                                <td style="font-size: 12px; text-align: center; width:250px;"><?php echo htmlspecialchars($category); ?></td>
                            </tr>

                            <?php
                        }
                    }
                ?>

                </tbody>
            </table>


                                </div>
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
   

                        
                        <?php
    

} elseif ($selectedOption === 'option2') {
    $query = "SELECT * FROM data_table WHERE column_name = 'value2'";
} elseif ($selectedOption === 'option3') {
    $query = "SELECT * FROM data_table WHERE column_name = 'value3'";
} else {
    // Handle invalid selection
    echo "Please select a valid option.";
    exit;
}


?>



<script>
       new DataTable('#example23', {
            initComplete: function () {
                this.api()
                    .columns([])
                    .every(function () {
                        let column = this;
        
                        // Create select element
                        let select = document.createElement('select');
                        select.add(new Option(''));
                        column.header().replaceChildren(select);
        
                        // Apply listener for user change in value
                        select.addEventListener('change', function () {
                            var val = DataTable.util.escapeRegex(select.value);
        
                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });
        
                        // Add list of options
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.add(new Option(d));
                            });
                    });
            },
            columnDefs: [
        { orderable: false, targets: [] }
        ]
        });


  </script>





<script>
       new DataTable('#example25', {
            initComplete: function () {
                this.api()
                    .columns([])
                    .every(function () {
                        let column = this;
        
                        // Create select element
                        let select = document.createElement('select');
                        select.add(new Option(''));
                        column.header().replaceChildren(select);
        
                        // Apply listener for user change in value
                        select.addEventListener('change', function () {
                            var val = DataTable.util.escapeRegex(select.value);
        
                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });
        
                        // Add list of options
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.add(new Option(d));
                            });
                    });
            },
            columnDefs: [
        { orderable: false, targets: [] }
        ]
        });


  </script>
  


  






  <script>
function toggleAll(source) {
  var checkboxes = document.querySelectorAll('.single-checkbox');
  checkboxes.forEach(function(checkbox) {
    checkbox.checked = source.checked;
    // Update icon color if needed
    if (source.checked) {
      $(checkbox).prev('.checkbox-icon').css('color', '#57FF22'); //green
      // Increase the value of the badge when checkbox is checked
      updateBadgeValue(1);
    } else {
      $(checkbox).prev('.checkbox-icon').css('color', '');
      // Decrease the value of the badge when checkbox is unchecked
      updateBadgeValue(-1);
    }
  });
}

// Function to update the badge value dynamically
function updateBadgeValue(change) {
  var badge = $('#badgeValue');
  var currentValue = parseInt(badge.text());
  var newValue = currentValue + change;
  badge.text(newValue);
}
</script>


<script>
    function setModalContent(fileName) {
        document.getElementById('modalTitle').innerHTML = 'History Details<br><i style="font-size: 15px;">' + fileName + '</i>';
    }
</script>