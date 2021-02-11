<?php
include("db/auth.php"); //include auth.php file on all secure pages include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/errorFuncts.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pik Pok SignIn</title>
   <?php include_once('./includes/head.php'); ?>
	<link rel="stylesheet" type="text/css" href="css/forgot_psw.css">
</head>


<body class="sign-in">
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
                           <form class="forgot_form" action="mail/send_new_password.php" method="post">
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
                  <li><a href="help_center.php" title="">Help Center</a></li>
                  <li><a href="about.php" title="">About</a></li>
                  <!--<li><a href="#" title="">Privacy Policy</a></li>-->
                  <li><a href="community_guidelines.php" title="">Community Guidelines</a></li>
                  <!--<li><a href="#" title="">Cookies Policy</a></li>-->
                  <li><a href="termsofuse.php" title="">Terms of Use</a></li>
                  <li><a href="#" title="">Language: English</a></li>
                  <!--<li><a href="#" title="">Copyright Policy</a></li>-->
               </ul>
            <p><img src="images/copy-icon.png" alt="">Copyright <script type="text/javascript">document.write(new Date().getFullYear());</script></p>
         </div>
      </div>
      <!--footy-sec end-->
   </div>
   <!--sign-in-page end-->
   </div><!--theme-layout end-->
   <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/popper.js"></script>
   <script type="text/javascript" src="js/bootstrap.min.js"></script>
   <script type="text/javascript" src="js/slick.min.js"></script>
   <script type="text/javascript" src="js/script.js"></script>

</body>
</html>