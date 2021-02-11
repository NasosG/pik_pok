<?php

/*
  * more checks for robots -> i'm not a robot
*/

date_default_timezone_set('Etc/UTC');

// the location of PHPMailer, where we placed its files.
require 'PHPMailer/PHPMailerAutoload.php';

// Check for empty fields
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "something went wrong";
    exit();
}

// Receive and sanitize input
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$message = wordwrap($message, 70);

/*
 * Server Configuration
 */

$mail = new PHPMailer();
$mail->isSMTP();// Set mailer to use SMTP                              
$mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
$mail->Username = "sitetest23456@gmail.com"; // Your Gmail address.
$mail->Password = "disisthecode"; // Your Gmail login password or App Specific Password.                       
$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
$mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
$mail->setFrom("noreply@pikpok.com");
$mail->addAddress("sitetest23456@gmail.com");               // Name is optional                                // Set email format to HTML
$mail->Subject = "Website Contact Form:  $name";

/*
 * (Little) Message Configuration
 */

// and finaly send the email to the user to let him know that password has been changed
$mail->Body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage: $message";

/*if($mail->send()) echo "Email sent thank you for your input"; 
else echo "an error has occurred during the procedure"; */

if (!($mail->send()))
    http_response_code(500);
?>
