<?php
require("PhpMailer/src/PHPMailer.php");
require("PhpMailer/src/SMTP.php");
require("PhpMailer/src/Exception.php");

include 'Connection/connection.php';




$selected = $_POST['selected_rows'];


//get elearning details

	$sql_edetails = "SELECT * FROM [dbo].[tbl_elearningstatus] WHERE [ElearningTransID] = '$elearningUNIQUE'";
    $result_details = sqlsrv_query($conn, $sql_edetails);

    while ($row = sqlsrv_fetch_array($result_details, SQLSRV_FETCH_ASSOC)) {
        $ElearningTransID = $row['ElearningTransID'];
        $title = $row['Title'];
        $targetemployee = $row['Target_Employee'];
		$targetemployeenumber = $row['EmployeeNumber'];
	
    }
	$mail = new \PHPMailer\PHPMailer\PHPMailer();
	$mail->SMTPKeepAlive = true;
	$mail->setFrom('TMS@brother-biph.com.ph', 'TMS');
	$mail->Subject = '[BIPH_BPS] TMS - E-Learning Enlistment';
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
	$mail->AddEmbeddedImage('assets/img/phishingalert.png', 'image');
	

	$recipientEmails = array(); // Array to store recipient email addresses

	foreach ($selected as $selectedValue) {
    $sqlreset = "SELECT * FROM [dbo].[tbl_ems] WHERE [EmpNo] = '$selectedValue'";
    $results = sqlsrv_query($conn, $sqlreset);
    while ($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC)) {
        // Retrieve recipient details
        $fullname = $row['Full_Name'];
        $adid = $row['ADID'];
        $email = $row['Email'];
        $employeenumber = $row['EmpNo'];
        $section = $row['Section'];
        $title = "<span style='color: blue; font-weight: bold;'>$title</span>";

        // Add recipient email to the array
        $recipientEmails[] = array('email' => $email, 'fullname' => $fullname);
    }
}

// Construct email body

$body = '
    <p style="font-size:16px; font-family:Century Gothic, sans-serif;"> Good day! </p>
    <p style="font-size:16px; font-family:Century Gothic, sans-serif;">This is to inform that you have enlisted in E-learning created at exactly ' . $today . '.</p>
    <p style="font-size:16px; font-family:Century Gothic, sans-serif;">E-Learning Title: ' . $title . '</p>
    <p style="font-size:16px; font-family:Century Gothic, sans-serif;">Start Date: ' . $startdate . '</p>
    <p style="font-size:16px; font-family:Century Gothic, sans-serif;">End Date: ' . $enddate . '</p>
    <p style="font-size:16px; font-family:Century Gothic, sans-serif;"> Click this link to answer and Login your credentials <a href="http://apbiphbpsts01:8080/TMS/forms/sessionchecker.php?control=exam&usercategory=0">Training Management System</a>.</p>
    <br>
    <h4 style="color:red; font-family:Century Gothic, sans-serif;">**Note: This is a system generated email. Please do not reply to this message. ***</h4>
    <h4 style="font-size:14px; font-family:Century Gothic, sans-serif;">🌐[TMS] - Training Management System🌐</h4><img src="cid:image">';
$mail->Body = $body;

// Add all recipients
foreach ($recipientEmails as $recipient) {
    $mail->addAddress($recipient['email'], $recipient['fullname']);
}

// Add CC
$mail->AddBCC('johnmichael.macaraig@brother-biph.com.ph');
// You can add more CCs or BCCs here if needed

// Send the email
try {
    $mail->send();
} catch (Exception $e) {
    echo 'Error sending email: ' . $e->getMessage() . '<br>';
}

// Clear addresses after sending
$mail->clearAddresses();




?>





