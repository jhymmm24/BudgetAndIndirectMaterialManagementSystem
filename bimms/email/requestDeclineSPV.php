<?php
require("PhpMailer/src/PHPMailer.php");
require("PhpMailer/src/SMTP.php");
require("PhpMailer/src/Exception.php");
include 'Connection/connection.php';
//include 'forms/overall.php';
/*$reqID = 'REQ-19';*/

$sql10 = "SELECT * FROM [dbo].[tbl_request] WHERE [Control_Number] = '$reqID'";
$results = sqlsrv_query($conn,$sql10);
while ($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC)) {
   $submittedby = $row['Submitted_By'];
   $spv_approved_by = $row['SPV_APPROVED_BY'];
   $spv_approved_date = $row['SPV_APPROVED_DATE'];
   $section = $row['Section'];
   $plant = $row['Plant'];
   $project = $row['Project'];
   $category = $row['Category'];
   $mgrapprover = $row['MGR_APPROVER'];
   $requestdate = $row['Request_Date'];
   $spvdeclinedby = $row['SPV_DECLINED_BY'];
   $spvdeclineddate = $row['SPV_DECLINED_DATE'];
   $mgrdeclinedby = $row['MGR_DECLINED_BY'];
   $mgrdeclinedate = $row['MGR_DECLINED_DATE'];
   $reasonofdeclined = $row['ReasonofDeclined'];

  }

 

$mail = new \PHPMailer\PHPMailer\PHPMailer();
				$mail->SMTPKeepAlive = true;
				$mail->setFrom('SPRMS@brother-biph.com.ph', 'SPRMS');
				$mail->Subject = 'Request have been Declined - ['. $reqID .']';
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


				$body = '<p style="font-size:16px;">Request for 2nd Approval in SPRMS - Price Input Checklist has been submitted to you.</p>
				<p style="font-size:16px;">For more details, click the <a href="http://APBIPHBPSTS01:8080/SPRMS_Approval/forms/sessionchecker.php?control=mgr&reqID='.$reqID.'">Sap Procurement Relation Management System</a> and login your credentials.</p>
				<table style="font-family:arial, sans-serif; border-collapse: collapse; width:100%"><tr style="background-color:#dddddd;">
				  <th style="border:1px solid #dddddd; text-align:left;padding:8px;">Request Date</th>
				  <th style="border:1px solid #dddddd; text-align:left;padding:8px;">[SPV] Declined By</th>
				  <th style="border:1px solid #dddddd; text-align:left;padding:8px;">Declined Date</th>
					<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Section</th>
					<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Plant</th>
					<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Category</th>
					</tr>';
				$body .= "<tr>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$requestdate</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$spvdeclinedby</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$spvdeclineddate</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$section</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$plant</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$category</td>

				
				</tr>"; 

				$mail->Body = $body.'</table><br><h4 style="color:red;">**Note: This is a system generated email. Please do not reply to this message. ***</h4>';

				$mail->AddCC('johnmichael.macaraig@brother-biph.com.ph');
				

			$sql2 = "SELECT * FROM [dbo].[tbl_useraccounts] WHERE FullName = '$submittedby' ";
			$results2 = sqlsrv_query($conn,$sql2);
			while ($row = sqlsrv_fetch_array($results2, SQLSRV_FETCH_ASSOC)) {
				try {
					$mail->addAddress($row['Email'], $row['FullName']);
				} catch (Exception $e) {
					echo 'Invalid address skipped: ' . htmlspecialchars($row['Email']) . '<br>';
					continue;
				}
			}

		try {
			$mail->send();
		} catch (Exception $e) {
			echo 'Mailer Error (' . htmlspecialchars($row['Email']) . ') ' . $mail->ErrorInfo . '<br>';
			$mail->getSMTPInstance()->reset();
		}
		$mail->clearAddresses();




?>
