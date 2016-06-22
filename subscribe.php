<?php
require_once 'functions.php';
require_once 'mailer/class.phpmailer.php';

$email_from = $_POST['email'];
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<h1 style="color:#f40;">Hi!</h1>';
$message .= '<p style="color:#080;font-size:18px;">There is a new subscription to get 20% Summer Discount from '.$email_from.'</p>';
$message .= '</body></html>';
 
$html = $message;

$mail = new PHPMailer();

// ---------- adjust these lines ---------------------------------------
$mail->Username = "temporaryid.hcl@gmail.com"; // your GMail user name
$mail->Password = "rememberpassword"; 
$mail->AddAddress("abhatnag@nd.edu"); // recipients email
$mail->FromName = $first_name." ".$last_name; // readable name

$mail->Subject = "Subscription from website";
$mail->Body    = $html; 
//-----------------------------------------------------------------------

$mail->IsHTML(true);                                  // Set email format to HTML
$mail->Host = "ssl://smtp.gmail.com"; // GMail
$mail->Port = 465;
$mail->IsSMTP(); // use SMTP
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->From = $mail->Username;
if(!$mail->Send())
	echo "Mailer Error: " . $mail->ErrorInfo;
else
	echo "Message has been sent";
?>