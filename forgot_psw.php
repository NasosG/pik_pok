<?php
include("db/auth.php"); //include auth.php file on all secure pages 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pik Pok SignIn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/slick.css">
	<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/forgot_psw.css">
</head>


<body class="sign-in" oncontextmenu="return false;">
   <div class="wrapper">
      <div class="sign-in-page">
         <div class="signin-popup">
            <div class="signin-pop">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="login-sec">
                        <div class="forgot_info">
                           <span>Password retrieval</span>
                           <br>
                        </div>
                        <div class="forgot_main">
                           <form class="forgot_form" action="mail/contact_me.php" method="post">
                              <span>Please enter the email you registered with</span>
                              <input type="text" name="forgot_text" value="" placeholder="Your email.." required spellcheck="false" autofocus class="forget_text" id="forgot_text">
                              <input type="submit" name="forgot_submit" value="Recover" class="f_p_submit">
                           </form>
                        </div>
                     </div>
                  </div>
                  <!--login-sec end-->
               </div>
            </div>
         </div>
         <!--signin-pop end-->
      </div>
      <!--signin-popup end-->
      <div class="footy-sec">
         <div class="container">
            <ul>
               <li><a href="help-center.html" title="">Help Center</a></li>
               <li><a href="about.php" title="">About</a></li>
               <li><a href="#" title="">Privacy Policy</a></li>
               <li><a href="#" title="">Community Guidelines</a></li>
               <li><a href="#" title="">Cookies Policy</a></li>
               <li><a href="#" title="">Career</a></li>
               <li><a href="forum.html" title="">Forum</a></li>
               <li><a href="#" title="">Language</a></li>
               <li><a href="#" title="">Copyright Policy</a></li>
            </ul>
            <p><img src="images/copy-icon.png" alt="">Copyright 2019</p>
         </div>
      </div>
      <!--footy-sec end-->
   </div>
   <!--sign-in-page end-->
   </div><!--theme-layout end-->
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/popper.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <script type="text/javascript" src="lib/slick/slick.min.js"></script>
   <script type="text/javascript" src="js/script.js"></script>

</body>
</html>