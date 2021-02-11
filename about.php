<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/errorFuncts.php');
?>


<!DOCTYPE html>
<html>
<head>
    <title>About - Pik Pok</title>
    <?php include_once('./includes/head.php'); ?>
</head>


<body>
    <?php
    // include header for all web pages
    include_once('./includes/header.php');
    ?>

    <section class="banner">
        <div class="bannerimage">
            <img src="images/about.png" style="width:100%;min-height:300px;max-height:300px;margin-bottom:30px;"
                 alt="image">
        </div>
        <div class="bennertext">
            <div class="innertitle">
                <h2>World's safest social network <br></h2>
                <p>We're committed to bring everyone closer to the things they love, where they can feel safe to express
                    themselves!</p>
            </div>
        </div>

    </section>
    <section class="Company-overview">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <h2>
                        What is Pik Pok
                    </h2>
                    <p>
                        Pik Pok is a social media platform for creating, sharing and discovering photos, think Tik-Tok but
                        for photos. The app can be used by people as an outlet to express themselves and their stories
                        through their photos and albums.
                    </p>
                </div>
                <div class="col-md-6 col-sm-12">
                    <img src="images/about3.png" alt="image">
                </div>
            </div>
        </div>
    </section>
    <section class="services" style="margin-top:-100px;">
        <div class="container">
            <div class="video" style="border: 2px solid red; padding: 15px; border-radius: 25px;">
                <iframe class="video-iframe" src="videos/about/PikPok.mp4"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>

        </div>
    </section>
    <footer class="fixed-bottom">
        <div class="footy-sec mn no-margin">
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
                <p><img src="images/copy-icon2.png" alt="">Copyright
                    <script type="text/javascript">document.write(new Date().getFullYear());</script>
                </p>
                <img class="fl-rgt" src="images/logo2.png" alt="">
            </div>
        </div>
    </footer><!--footer end-->

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/flatpickr.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>