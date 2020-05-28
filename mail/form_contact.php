<?php
$name = $_POST['Name'];
$Full_name = $_POST['FullName'];
$email = $_POST['Email'];
$message = $_POST['comments'];

$to = "gnasos219@gmail.com";
$subject = "Contact Form";
$body = "From: $name". "\r\n" . "$Full_name" . "\r\n" ."Message: $message";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . $name. "  " . $Full_name . ' <' . $email .'>' . "\r\n". 
			'Reply-To: ' .$email. "\r\n" . 
			'X-Mailer: PHP/' . phpversion();
if (mail($to, $subject, $body, $headers)) {
echo("<p>Email successfully sent!</p>");
} else {
echo("<p>Email delivery failed…</p>");
}
?>