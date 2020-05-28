<?php
 
date_default_timezone_set('Etc/UTC');

// Edit this path if PHPMailer is in a different location.
require 'PHPMailer/PHPMailerAutoload.php';

// Check for empty fields
if(empty($_POST['forgot_text']) || !filter_var($_POST['forgot_text'],FILTER_VALIDATE_EMAIL)) {
	header("Location: ../formError.html"); 
}

/*
 * Server Configuration
 */

// Emails form data to this email and the person submitting the form
$myemail = 'sitetest23456@gmail.com';

    
$mail = new PHPMailer();
$mail->isSMTP();// Set mailer to use SMTP                              
$mail->Host = 'smtp.gmail.com'; // Which SMTP server to use.
$mail->SMTPAuth = true; // Whether you need to login. This is almost always required.
$mail->Username = "sitetest23456@gmail.com"; // Your Gmail address.
$mail->Password = "disisthecode"; // Your Gmail login password or App Specific Password.                       
$mail->SMTPSecure = 'tls'; // Which security method to use. TLS is most secure.
$mail->Port = 587; // Which port to use, 587 is the default port for TLS security.
$mail->setFrom("sitetest23456@gmail.com");
$mail->addAddress($_POST['forgot_text']);               // Name is optional
$mail->addReplyTo($myemail, 'Team pikpok');
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Activate your Pik-Pok account';

/*
 * Message Configuration
 */
 
function password_generate($chars) 
{
	$data = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
	return substr(str_shuffle($data), 0, $chars);
}

$pass = password_generate(7);
//edo tha prepei na chekaroume an uparxei o xrhsths sth bash
//.....

//an uparxei tha tou allazoume ton kodiko tou sth bash
// kai tha tou stelnoume to parakato email
$mail->Body = "<span>Hello, You're receiving this email because you requested a password reset for your Pik-Pok Account.</span><br><br>
<span>Your new password is $pass</span><br><br>
<span>Click on the button below to login with your new password</span><br><br>		
<a href='localhost/tselikas/signin.php' style='border: 1px solid #1b9be9; font-weight: 600; color: #fff; border-radius: 3px; cursor: pointer; outline: none; background: #1b9be9; padding: 4px 15px; display: inline-block; text-decoration: none;'>Login</a>";

if($mail->send()) echo "A new password has been sent to your email. Check your inbox"; 
else echo "an error has occurred during the procedure"; 

//an den uparxei to email stous xrhstes tha ton parapempoume sth selida tou signup

?>
