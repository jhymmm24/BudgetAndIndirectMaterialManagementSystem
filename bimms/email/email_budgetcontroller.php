<?php
require("PhpMailer/src/PHPMailer.php");
require("PhpMailer/src/SMTP.php");
require("PhpMailer/src/Exception.php");
include 'Connection/connection.php';
//include 'forms/overall.php';
/*$reqID = 'REQ-19';*/




$transno = $_GET['transno'];


 // Explode the string to get an array of IDs
 $myArray = explode(',', $selectedItransnotemId);


 
  // Prepare the SQL statement to select item_name based on item_code
 $stmt = pg_prepare($conn, "select_query", "SELECT * FROM tbl_mim_approval WHERE transaction_number = $1 ");




        // Loop through the array and insert each item code and item name
        foreach ($myArray as $arrayVal) {
            // Trim the item code
            $arrayVal = trim($arrayVal);
        
            // Execute the prepared statement to select item_name
            $result = pg_execute($conn, "select_query", array($arrayVal));
        
            // Fetch the item details
            $row = pg_fetch_assoc($result);
			$id = $row['id'];
			$itemcode = $row['item_code'];
            $itemname = $row['item_name'];
            $itemspecification = $row['specification'];
            $itemuom = $row['uom'];
			$itemtransno = $row['transaction_number'];
			$requestdate = $row['request_date'];
			$requeststatus = $row['request_date'];
			$declinereason = $row['decline_reason'];
            $itemstock = $row['stock'];
            $itemunitcost = $row['unit_cost'];
            $itemcurrency = $row['currency'];
			$itemlt= $row['lt'];
			$itemtotaldemand = $row['total_demand_quantity'];
			$itemoverallcost = $row['overall_total_cost'];
			$sectionname = $row['section_name'];
			$deliverydate = $row['delivery_date'];

		}

 

$mail = new \PHPMailer\PHPMailer\PHPMailer();
				$mail->SMTPKeepAlive = true;
				$mail->setFrom('bimms@brother-biph.com.ph', 'BIMMS');
				$mail->Subject = '[BIPH_BPS]BIMMS - For Budget Controller Approval ['. $reqID .']';
				$mail->AltBody = 'Please do not reply to this email. Thank you!';
				$mail->isSMTP();
				$mail->Host = 'smtp.brother.co.jp';
				$mail->SMTPAuth = FALSE;
				$mail->SMTPOptions = array(
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
				); 
				$mail->Username = 'ZZPYPH04';
				$mail->Password = '.p&55worD';
				$mail->Port = 25;

				$mail->isHTML(true); // Set email format to HTML
				$mail->CharSet = 'utf-8';
				$mail->AddEmbeddedImage('email/phising.png', 'image');
                $mail->Priority = 1; // Highest priority
				


				$body = '<p style="color:black; font-family:Arial; font-weight:bold;">Good day!</p>
                <p style="color:black; font-family:Arial;">Request For Budget Controller Approval in BIMMS - Demand List has been submitted to you.</p>
				<p style="color:black; font-family:Arial;">For more details, click the <a href="http://apbiphbpsts02:8080/BIMMS/bimms/demand-list-approval.php">BIMMS</a> and login your credentials.</p>
				<table style="font-family:arial, sans-serif; border-collapse: collapse; width:100%"><tr style="background-color:#dddddd;">
				<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Request Date</th>
				<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Requestor Name</th>
				<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Section</th>
				<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Transaction Number</th>
				<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Cost Center</th>
				<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Item Code</th>
			    <th style="border:1px solid #dddddd; text-align:left;padding:8px;">Item Name</th>
				</tr>';
				$body .= "<tr>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$requestdate</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$spv_approved_by</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$spv_approved_date</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$section</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$plant</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$category</td>

				
				</tr>"; 

				$mail->Body = $body.'</table><br><h4 style="color:red;">**Note: This is a system generated email. Please do not reply to this message. ***</h4>
				<h4>🌐[SRMS] - SAP Procurement Relation Master System🌐</h4><img src="cid:image">';
				
				$mail->AddCC('johnmichael.macaraig@brother-biph.com.ph');
				

			$sql2 = "SELECT * FROM [dbo].[tbl_useraccounts] WHERE FullName = '$mgrapprover' ";
			$results2 = sqlsrv_query($conn,$sql2);
			while ($row = sqlsrv_fetch_array($results2, SQLSRV_FETCH_ASSOC)) {
				try {
					$mail->addAddress($row['Email'], $row['FullName']);
				} catch (Exception $e) {
					echo 'Invalid address skipped: ' . htmlspecialchars($row['Email']) . '<br>';
					continue;
				}
			}



	
	

?>

<script> 
        //window.location.replace("spvapprovaltable.php");
 </script>
