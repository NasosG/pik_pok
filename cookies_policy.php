<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/errorFuncts.php');
?>
	
<!DOCTYPE html>
<html>
<head>
<link rel='shortcut icon' type='image/x-icon' href='images/logo.png'/>
<meta charset="UTF-8">
	<title>Cookies Policy - Pik Pok</title>
	<?php include_once('./includes/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/other-styles.css">
</head>

<body>
	<div class="wrapper">

		<?php
		// include header for all web pages
		include_once('./includes/header.php');		
		?>
			
		<div style="font-size: 16px; line-height: 1.5; padding: 0 8px; margin: auto; margin-top: 100px; margin-bottom: 100px; padding-left: 50px; padding-right: 50px; max-width: 1050px; background:white; border-radius:4px;  border: 2px solid lightgray;">
		   <div id="faq-page">
		      <h2 class="terms-h2 ">Cookies Policy</h2>
		      <hr>
		      <div class="pb-5">We use no cookies in the time being. The reason is that we want to keep users safe even from risks that are not created by us. Cookies themselves aren’t harmful, but they can carry sensitive personal data – and that makes them potential targets for malicious users aka hackers. Cookie theft is a risk if you sign into Pik Pok or any other site using public WiFi, as session cookies are not encrypted. A hacker can copy the cookie data and use it to impersonate you and get into your account. Something similar may even happen in your home network (more rare phenomenon). It doesn’t happen often, but it is a potential risk that we would like to avoid for now.</div>
		   </div>
		</div>
	</div>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>