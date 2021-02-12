<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/error_functions.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact - Pik Pok</title>
    <?php include_once('./includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/contact.css">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>


<body>
    <div class="wrapper">

        <?php
        // include header for all web pages
        include_once('./includes/header.php');
        ?>

        <!-- Contact Section -->
        <section id="contact" class="py-5 p-y-contact">
            <h2 class="text-uppercase text-center pt-5">Contact Us</h2>
            <h3 class="text-muted text-center pb-3">Feel free to send us your comments!</h3>
            <div class="contact-container">
                <form name="contactForm" id="contactForm" action="mail/contact_us.php" method="post">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <input type="text" id="name" name="name" placeholder="Your name.." required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 pb-3">
                            <input type="email" id="email" name="email" placeholder="Your e-mail.." minlength="5" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 pb-3">
                            <textarea style="min-height:180px;" id="messageText" name="message" placeholder="Write your message.." required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-12 pb-3 g-recaptcha mt-1" id="signup_robot"
                             data-sitekey="6LfmCc0ZAAAAAMnp0Sxs59aUCInXiUSw1r6tn1EY" required></div>
                    </div>
                    <br>
                    <div class="text-center">
                        <input type="submit" id="submit_form" value="Send">
                        <input type="reset" value="Clear">
                    </div>
                </form>
            </div>
        </section>
        <footer style="margin-top:40px;">
            <div class="footy-sec mn no-margin">
                <div class="container">
                    <ul>
                        <li><a href="help_center.php" title="">Help Center</a></li>
                        <li><a href="about.php" title="">About</a></li>
                        <!--<li><a href="#" title="">Privacy Policy</a></li>-->
                        <li><a href="community_guidelines.php" title="">Community Guidelines</a></li>
                        <!--<li><a href="#" title="">Cookies Policy</a></li>-->
                        <li><a href="terms_of_use.php" title="">Terms of Use</a></li>
                        <li><a href="#" title="">Language: English</a></li>
                        <!--<li><a href="#" title="">Copyright Policy</a></li>-->
                    </ul>
                    <p><img src="images/copy-icon2.png" alt="">Copyright
                        <script type="text/javascript">
                            document.write(new Date().getFullYear());
                        </script>
                    </p>
                    <img class="fl-rgt" src="images/logo2.png" alt="">
                </div>
            </div>
        </footer>

    </div><!--theme-layout end-->

    <script>
        window.onload = function () {
            var $recaptcha = document.querySelector('#g-recaptcha-response');

            if ($recaptcha) {
                $recaptcha.setAttribute("required", "required");
            }

        };

        var form_contact = document.getElementById("contactForm");

        document.getElementById("submit_form").addEventListener("click", function () {
            if (grecaptcha && grecaptcha.getResponse().length > 0) {
                //form_contact.submit();
                sendContactForm();
            } else {
                // The recaptcha is not cheched
                // we display an error message here
                alert('Oops, you have to check the I\'m not a robot box !');
            }

        });
    </script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="js/contact.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

</body>
</html>