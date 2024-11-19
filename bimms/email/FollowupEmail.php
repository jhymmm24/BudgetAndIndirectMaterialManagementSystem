<?php
require("../PhpMailer/src/PHPMailer.php");
require("../PhpMailer/src/SMTP.php");
require("../PhpMailer/src/Exception.php");

include '../Connection/connection.php';

$title= $_GET['title'];


//array email
$sql_email = "SELECT DISTINCT(Email) FROM [dbo].[tbl_elearningstatus] WHERE [Title] = '$title' AND TotalNumber_Finished IS NULL";
$results_email = sqlsrv_query($conn,$sql_email);

$emailArray = array(); // Initialize an array to store email addresses

while ($row = sqlsrv_fetch_array($results_email, SQLSRV_FETCH_ASSOC)) {
   
    $emailArray[] = $row['Email']; // Store each email address in the array
}

  


/*$reqID = 'REQ-19';*/
$sql_details = "SELECT * FROM [dbo].[tbl_elearningstatus] WHERE [Title] = '$title'";
$results = sqlsrv_query($conn,$sql_details);
while ($row = sqlsrv_fetch_array($results, SQLSRV_FETCH_ASSOC)) {
   $fullname = $row['Target_Employee'];
   $email = $row['Email'];
   $employeenumber = $row['EmployeeNumber'];
   $startdate = $row['Target_Date'];
   $enddate = $row['End_Date'];
   

  }

 


  $mail = new \PHPMailer\PHPMailer\PHPMailer();
  $mail->SMTPKeepAlive = true;
  $mail->setFrom('TMS@brother-biph.com.ph', 'TMS');
  $mail->Subject = '[BIPH_TMS] - E-Learning - Follow-Up';
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
  $mail->AddEmbeddedImage('../assets/img/phishingalert.png', 'image');
  
  // Compose email body
  $body = '
  <p style="font-size:16px; font-family:Century Gothic, sans-serif;"> Good day! </p>
  <p style="font-size:16px; font-family:Century Gothic, sans-serif;">This is a kind follow-up for the E-learning you have not finished yet as of <span style="background-color: yellow;">' . $today . '.</span></p>
  <p style="font-size:16px; font-family:Century Gothic, sans-serif;">E-Learning Title: ' . $title . '</p>
  <p style="font-size:16px; font-family:Century Gothic, sans-serif;">Start Date: ' . $startdate . '</p>
  <p style="font-size:16px; font-family:Century Gothic, sans-serif;"><span style="background-color: yellow;">End Date: '.$enddate.'</span> </p>
  <p style="font-size:16px; font-family:Century Gothic, sans-serif;"> Click this link to answer and Login your credentials <a href="http://apbiphbpsts01:8080/TMS/forms/sessionchecker.php?control=exam&usercategory=0">Training Management System</a>.</p>
  <br>
  <h4 style="color:red; font-family:Century Gothic, sans-serif;">**Note: This is a system generated email. Please do not reply to this message. ***</h4>
  <h4 style="font-size:14px; font-family:Century Gothic, sans-serif;">🌐[TMS] - Training Management System🌐</h4><img src="cid:image">';
  
  $mail->Body = $body;
  
    // Set high priority
    $mail->Priority = 1;
    $mail->addCustomHeader("X-MSMail-Priority: ".$m."");
    $mail->addCustomHeader("X-Message-Flag: ".$flag.""); 
  
  // Add all recipients from $emailArray
  foreach ($emailArray as $email) {
      try {
          $mail->addAddress($email);
      } catch (Exception $e) {
          echo 'Invalid address skipped: ' . htmlspecialchars($email) . '<br>';
      }
  }
  
  // Add BCC recipient
  $mail->AddBCC('johnmichael.macaraig@brother-biph.com.ph');


  try {
      // Send the email
      $mail->send();
  } catch (Exception $e) {
      echo 'Mailer Error: ' . $mail->ErrorInfo . '<br>';
      $mail->getSMTPInstance()->reset();
  }

  
?>


<script> 
        alert("Follow-up Email Successfully sent!");

        window.location.replace("../uploading.php");
 </script>

