<?php 
require_once 'functions.php';
require_once 'mailer/class.phpmailer.php';

$info = $_POST['Info'];
$first_name = sanitizeString($info['first_name']);
$last_name = sanitizeString($info['last_name']);
$address = sanitizeString($info['address']);
$city = sanitizeString($info['city']);
$zip_code = sanitizeString($info['zip_code']);
$email = sanitizeString($info['email']);
$phone = sanitizeString($info['phone']);

$html = "<style type='text/css'>.table th{font-style:bold; width:50px;} {}</style>Hello, There is a new request for estimate. <br /><table class='table' cellpadding='2' cellspacing='2' border='0'><tbody><tr><th>First Name</th><td>$first_name</td></tr><tr><th>Last Name</th><td>$last_name</td></tr><tr><th>Address</th><td>$address</td></tr><tr><th>City</th><td>$city</td></tr><tr><th>Zip Code</th><td>$zip_code</td></tr><tr><th>Email</th><td>$email</td></tr><tr><th>Phone</td><th>$phone</td></tr></tbody></table>";

$mail = new PHPMailer();

	// ---------- adjust these lines ---------------------------------------
	$mail->Username = $email; // your GMail user name
	$mail->Password = "rememberpassword"; 
	$mail->AddAddress("piyushsight@yahoo.co.in"); // recipients email
	$mail->FromName = $first_name." ".$last_name; // readable name

	$mail->Subject = "New Estimation Request";
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

$query = "INSERT INTO INVO_request (first_name, last_name, address, city, zip_code, email, phone) ";
$query .= "VALUES ('$first_name', '$last_name', '$address', '$city', '$zip_code', '$email', '$phone')";

mysql_query($query);
echo "success";

 ?>


