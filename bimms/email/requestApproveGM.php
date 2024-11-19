<?php
require("PhpMailer/src/PHPMailer.php");
require("PhpMailer/src/SMTP.php");
require("PhpMailer/src/Exception.php");
include 'Connection/connection.php';
//include 'forms/overall.php';
/*$reqID = 'REQ-19';*/



$reqCategory = $_GET['reqCategory'];
if($reqCategory == 'COST UP'  || $reqCategory == 'COST DOWN' || $reqCategory == 'MATERIAL CHANGE'|| $reqCategory == 'DESIGN CHANGE' || $reqCategory == 'SUPPLIER CHANGE' || $reqCategory == 'NEW PARTS'){

$sql10 = "SELECT * FROM [dbo].[tbl_request] WHERE [Control_Number] = '$reqID'";
$results = sqlsrv_query($conn,$sql10);
while ($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC)) {
   $spv_approved_by = $row['SPV_APPROVED_BY'];
   $spv_approved_date = $row['SPV_APPROVED_DATE'];
   $mgr_approved_by = $row['MGR_APPROVED_BY'];
   $mgr_approved_date = $row['MGR_APPROVED_DATE'];
   $gm_approved_by = $row['GM_APPROVED_BY'];
   $gm_approved_date = $row['GM_APPROVED_DATE'];
   $docupic = $row['DOCU_PIC'];
   $section = $row['Section'];
   $plant = $row['Plant'];
   $project = $row['Project'];
   $category = $row['Category'];
   $mgrapprover = $row['MGR_APPROVER'];
   $requestdate = $row['Request_Date'];

  }

 

$mail = new \PHPMailer\PHPMailer\PHPMailer();
				$mail->SMTPKeepAlive = true;
				$mail->setFrom('SRMS@brother-biph.com.ph', 'SPRMS');
				$mail->Subject = '【SRMS】Request for 4th Approval ['. $reqID .']';
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
                <p style="color:black; font-family:Arial;">Request for 4th Approval in SPRMS - Price Input Checklist has been submitted to you.</p>
				<p style="color:black; font-family:Arial;">For more details, click the <a href="http://APBIPHBPSTS01:8080/SPRMS_Approval/forms/sessionchecker.php?control=mgr&reqID='.$reqID.'&reqCategory='.$reqCategory.'">SPRMS</a> and login your credentials.</p>
				<table style="font-family:arial, sans-serif; border-collapse: collapse; width:100%"><tr style="background-color:#dddddd;">
				  <th style="border:1px solid #dddddd; text-align:left;padding:8px;">Request Date</th>
				  <th style="border:1px solid #dddddd; text-align:left;padding:8px;">[GM] Approved</th>
				  <th style="border:1px solid #dddddd; text-align:left;padding:8px;">Approved Date</th>
					<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Section</th>
					<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Plant</th>
					<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Category</th>
					</tr>';
				$body .= "<tr>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$requestdate</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$gm_approved_by</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$gm_approved_date</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$section</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$plant</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$category</td>

				
				</tr>"; 

                $mail->Body = $body.'</table><br><h4 style="color:red;">**Note: This is a system generated email. Please do not reply to this message. ***</h4>
				<h4>🌐[SRMS] - SAP Procurement Relation Master System🌐</h4><img src="cid:image">';

				$mail->AddCC('johnmichael.macaraig@brother-biph.com.ph');
				

			$sql2 = "SELECT * FROM [dbo].[tbl_useraccounts] WHERE FullName = '$docupic' ";
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


    }elseif($reqCategory == 'QuotaArrangement'){

        $sql10 = "SELECT * FROM [dbo].[tbl_quotarequest] WHERE [Control_Number] = '$reqID'";


        $results = sqlsrv_query($conn,$sql10);
while ($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC)) {
   $spv_approved_by = $row['SPV_APPROVED_BY'];
   $spv_approved_date = $row['SPV_APPROVED_DATE'];
   $mgr_approved_by = $row['MGR_APPROVED_BY'];
   $mgr_approved_date = $row['MGR_APPROVED_DATE'];
   $gm_approved_by = $row['GM_APPROVED_BY'];
   $gm_approved_date = $row['GM_APPROVED_DATE'];
   $docupic = $row['DOCU_PIC'];
   $section = $row['Section'];
   $plant = $row['Plant'];
   $project = $row['Project'];
   $category = $row['Category'];
   $mgrapprover = $row['MGR_APPROVER'];
   $requestdate = $row['Request_Date'];

  }

 

$mail = new \PHPMailer\PHPMailer\PHPMailer();
				$mail->SMTPKeepAlive = true;
				$mail->setFrom('SRMS@brother-biph.com.ph', 'SPRMS');
				$mail->Subject = '【SRMS】Request for 4th Approval ['. $reqID .']';
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
                <p style="color:black; font-family:Arial;">Request for 4th Approval in SPRMS -  Quota Arrangement has been submitted to you.</p>
				<p style="color:black; font-family:Arial;">For more details, click the <a href="http://APBIPHBPSTS01:8080/SPRMS_Approval/forms/sessionchecker.php?control=mgr&reqID='.$reqID.'&reqCategory='.$reqCategory.'">SPRMS</a> and login your credentials.</p>
				<table style="font-family:arial, sans-serif; border-collapse: collapse; width:100%"><tr style="background-color:#dddddd;">
				  <th style="border:1px solid #dddddd; text-align:left;padding:8px;">Request Date</th>
				  <th style="border:1px solid #dddddd; text-align:left;padding:8px;">[GM] Approved</th>
				  <th style="border:1px solid #dddddd; text-align:left;padding:8px;">Approved Date</th>
					<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Section</th>
					<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Plant</th>
					<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Category</th>
					</tr>';
				$body .= "<tr>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$requestdate</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$gm_approved_by</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$gm_approved_date</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$section</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$plant</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$category</td>

				
				</tr>"; 

                $mail->Body = $body.'</table><br><h4 style="color:red;">**Note: This is a system generated email. Please do not reply to this message. ***</h4>
				<h4>🌐[SRMS] - SAP Procurement Relation Master System🌐</h4><img src="cid:image">';

				$mail->AddCC('johnmichael.macaraig@brother-biph.com.ph');
				

			$sql2 = "SELECT * FROM [dbo].[tbl_useraccounts] WHERE FullName = '$docupic' ";
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


    }elseif($reqCategory == 'PO Price Change'){

        $sql10 = "SELECT * FROM [dbo].[tbl_porequest] WHERE [Control_Number] = '$reqID'";


        $results = sqlsrv_query($conn,$sql10);
while ($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC)) {
   $spv_approved_by = $row['SPV_APPROVED_BY'];
   $spv_approved_date = $row['SPV_APPROVED_DATE'];
   $mgr_approved_by = $row['MGR_APPROVED_BY'];
   $mgr_approved_date = $row['MGR_APPROVED_DATE'];
   $gm_approved_by = $row['GM_APPROVED_BY'];
   $gm_approved_date = $row['GM_APPROVED_DATE'];
   $docupic = $row['DOCU_PIC'];
   $section = $row['Section'];
   $plant = $row['Plant'];
   $project = $row['Project'];
   $category = $row['Category'];
   $mgrapprover = $row['MGR_APPROVER'];
   $requestdate = $row['Request_Date'];

  }

 

$mail = new \PHPMailer\PHPMailer\PHPMailer();
				$mail->SMTPKeepAlive = true;
				$mail->setFrom('SRMS@brother-biph.com.ph', 'SPRMS');
				$mail->Subject = '【SRMS】Request for 4th Approval ['. $reqID .']';
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
                <p style="color:black; font-family:Arial;">Request for 4th Approval in SPRMS -  PO Price Change has been submitted to you.</p>
				<p style="color:black; font-family:Arial;">For more details, click the <a href="http://APBIPHBPSTS01:8080/SPRMS_Approval/forms/sessionchecker.php?control=mgr&reqID='.$reqID.'&reqCategory='.$reqCategory.'">SPRMS</a> and login your credentials.</p>
				<table style="font-family:arial, sans-serif; border-collapse: collapse; width:100%"><tr style="background-color:#dddddd;">
				  <th style="border:1px solid #dddddd; text-align:left;padding:8px;">Request Date</th>
				  <th style="border:1px solid #dddddd; text-align:left;padding:8px;">[GM] Approved</th>
				  <th style="border:1px solid #dddddd; text-align:left;padding:8px;">Approved Date</th>
					<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Section</th>
					<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Plant</th>
					<th style="border:1px solid #dddddd; text-align:left;padding:8px;">Category</th>
					</tr>';
				$body .= "<tr>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$requestdate</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$gm_approved_by</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$gm_approved_date</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$section</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$plant</td>
				<td style='border:1px solid #dddddd; text-align:left;padding:8px;'>$category</td>

				
				</tr>"; 

                $mail->Body = $body.'</table><br><h4 style="color:red;">**Note: This is a system generated email. Please do not reply to this message. ***</h4>
				<h4>🌐[SRMS] - SAP Procurement Relation Master System🌐</h4><img src="cid:image">';

				$mail->AddCC('johnmichael.macaraig@brother-biph.com.ph');
				

			$sql2 = "SELECT * FROM [dbo].[tbl_useraccounts] WHERE FullName = '$docupic' ";
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


    }

?>

<script> 
        //window.location.replace("gmapprovaltable.php");
 </script>
