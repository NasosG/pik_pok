<?php
//include general_session to files user can visit without an account too
include('db/general_session.php');
require('db/db.php');
require('db/error_functions.php');
require('db/utility_functions.php');
?>

<!DOCTYPE html>
<html>

<head>
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
                <ul class="pb-5">

                    We use cookies and other similar technologies, such local storage,
                    to help provide you with a better, faster, and safer experience and not to save your preferences,
                    show you relevant ads or intrude your privacy. We use them to log you into Pik-Pok, for example.<br>
                    <h3 class="terms-h3 pt-2">How we don't use cookies</h3>
                    We don't use cookies to save your preferences and personalize the content you see,
                    or show you more relevant ads.
                    Below we explain how Pik Pok uses these technologies,
                    your privacy settings, and the other options you have.<br>
                    <h3 class="terms-h3 pt-2">What are cookies and local storage?</h3>
                    Cookies are small files that websites place on your computer as you browse the web. Like many websites, Pik-Pok,
                    uses cookies to discover how people are using our services and to make them work better.
                    <br>
                    Local storage is an industry-standard technology that allows a website or application to store information
                    locally on your computer or mobile device. The stored data is saved across browser sessions.
                    We use local storage to customize what we show you based on your past interactions with our services.
                    <h3 class="terms-h3 pt-2"> Why do our services use these technologies?</h3>

                    Our services use these technologies to deliver, measure, and improve our services in various ways. These uses generally fall into the following category:

                    <div style="padding-left:40px;">
                        <ul style="list-style-type: disc; class=" pt-4 ml-4 pb-4">
                            <li class="pb-2 pt-2"> Authentication and security:
                                <ul class="pt-2 pl-3" style="list-style-type: circle;">
                                    <li>To remember your login into Pik-Pok</li>
                                    <li>To protect your security.</li>
                                    <li>To let you to view content with limited distribution.</li>
                                    <li>To help us detect and fight spam, abuse, and other activities that violate our rules and community guidelines.</li>
                                </ul>
                            </li>
<!--                        <li>2</li>-->
                        </ul>
                    </div>
                    <br>For example, these technologies help authenticate your access to Pik-Pok and prevent unauthorized parties from accessing your account.
                    They also let us show you appropriate content through our services.

                    <h3 class="terms-h3 pt-2">Stay safe</h3>
                    Moreover we want to keep users safe even
                    from risks that are not created by us. Cookies themselves aren’t harmful, but they can carry sensitive
                    personal data – and that makes them potential targets for malicious users aka hackers. Cookie theft is a
                    risk if you sign into Pik Pok or any other site using public WiFi, as session cookies are not encrypted.
                    A hacker can copy the cookie data and use it to impersonate you and get into your account. Something
                    similar may even happen in your home network (more rare phenomenon). It doesn’t happen often, but it is
                    a potential risk, so be carefull.
            </div>
        </div>
        <?php include_once('./includes/main_footer.php'); ?>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

</body>
</html>