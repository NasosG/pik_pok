<?php
include('db/auth.php'); //include auth.php file on all secure pages
require('db/db.php');
require('db/error_functions.php');

$photo_taken = false;

if (isset($_POST['imgData'])) {
    $photo_taken = true;
    $imgData = $_POST['imgData'];
    //echo "post value " . $imgData . " end";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Post - Pik Pok</title>
    <?php include_once('./includes/head.php'); ?>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">

        <?php
        // include header for all web pages
        include_once('./includes/header.php');
        ?>

        <div class="responsive-box-2">

            <div class="post-project">
                <h2 style="text-align:center;margin-top:50px;margin-bottom:50px; font-size:48px;font-family: 'Sofia';">Post
                    Photo</h2>
                <div class="post-project-fields">

                    <form id="post_form" name="post_form" method="post" action="db/add_new.php"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <input type="text" name="tags" placeholder="Insert Tags, f.e. #summer2020#i<3beach">
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">

                                <div class="upload-btn-wrapper ">
                                    <button class="btn-up">Upload an Image</button>
                                    <input type="file" id="fileToUpload" name="fileToUpload" class="input-file"></input>
                                </div>
                                <?php

                                function isMobileDevice()
                                {
                                    return preg_match(
                                        "/(android|avantgo|blackberry|bolt|boost|cricket|docomo 
                                        |fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",
                                        $_SERVER["HTTP_USER_AGENT"]
                                    );
                                }

                                if (!isMobileDevice()) {
                                    echo '<div class="upload-btn-wrapper">
                                              <button disabled class="btn-up" id="mylink"><a class="a-up" href="webcam.php">Take a photo</a></button>
                                          </div> ';
                                }
                                ?>

                            </div>
                            <div class="pt-2 col-lg-12 col-md-12 col-12">
                                <?php

                                if ($photo_taken) {
                                    echo '<input type="hidden" name="imgData" id="imgData" value= "' . $imgData . '" />';
                                    echo '<img style="max-height:420px;" src="' . $imgData . '" id="add-prof-pic"></img>';
                                } else echo '<img style="min-height:380px;max-height:420px;" src="images/SocialMediaPost.png" id="add-prof-pic"></img>'; ?>

                            </div>

                            <div class="col-lg-12">
                                <ul>
                                    <li>
                                        <button class="active" type="submit" value="post">Post</button>
                                    </li>
                                    <li><a href="profile3.php" title="">Cancel</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>

                </div><!--post-project-fields end-->
            </div><!--post-project end-->
        </div><!--post-project-popup end-->

        <footer style="margin-top:30px;">
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
        </footer><!--footer end-->

    </div><!--theme-layout end-->


    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript">
        // from
        // https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#add-prof-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#fileToUpload").change(function () {
            readURL(this);
        });
    </script>
</body>

</html>