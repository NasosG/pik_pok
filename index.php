<?php
include('db/general_session.php'); //include auth.php file on all secure pages
require('db/db.php');
require('db/error_functions.php');
require('db/utility_functions.php');

mysqli_set_charset($con, "utf8");

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT *
                FROM images 
                WHERE photo_tag LIKE '%{$search}%'
                ORDER BY photo_id DESC";
}
else {
    $query = "SELECT * FROM images ORDER BY photo_id DESC"; //we can order by date but order by id achieves the same goal and we don't need to keep specific time in the database but only the date [implementation may change in the future]
}

$result = mysqli_query($con, $query) or DBorServerErrorOccurred();

if (isset ($_SESSION['username'])) {
    $uname = $_SESSION['username'];
    // find user id from session name
    $user_id = getUsersID($con, $uname);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Home - Pik Pok</title>
    <?php include_once('./includes/head.php'); ?>
</head>

<body>
    <div class="wrapper">

        <?php
        // include header for all web pages
        include_once('./includes/header.php');
        ?>

        <section class="companies-info">
            <div class="container">
                <div class="company-title">
                    <h3>All Photos</h3>
                </div><!--company-title end-->
                <div class="companies-list">
                    <div class="row">
                        <?php
                        while ($row = mysqli_fetch_array($result)) {
                            $newDate = date("d-m-Y", strtotime($row['date_posted']));
                            echo '	
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12">						
                                <div>
                                <form id="myform" class="likes-comments-form company_profile_info" name="myform" method="get" action="pic_comments.php" >
                                    <div class="company-up-info">
                                        ';

                            if (!isset ($_SESSION['username']) || $row['username'] != $_SESSION['username'])
                                echo '<a href="other_users_profile.php?photo_username=' . $row['username'] . '">';
                            else
                                echo '<a href="profile3.php">';

                            echo "<h3 class='pt-2'>" . $row['username'] . "</h3>";
                            echo "</a><h4>" . $newDate . "</h4>
                                       <a  href=\"" . $row['photo_path'] . $row['photo_name'] . "\" data-lightbox=\"image-pop". $row['photo_id'] ."\">
                             <img src=\"" . $row['photo_path'] . $row['photo_name'] . "\" alt='user's photo' />
                            </a>";

                            if (isset($_SESSION['username'])) {
                                $photo_id = $row['photo_id'];
                                $query3 = "SELECT * FROM post_likes WHERE liked_by_user = '$user_id' AND posted_photo_id = '$photo_id'";
                                $result3 = mysqli_query($con, $query3);
                                echo "
                                        <input type='hidden' name='photo_id' id='photo_id' value='" . $row['photo_id'] . "' />
                                        <ul>
                                            <li>
                                            <button class='likeBut' onclick='changeLikeState(this)' style='border:none'>";
                                if (mysqli_num_rows($result3) == 0)
                                    echo "
                                                <a id='likeLink' class='likeLink follow text-white'>Like <i class='fa fa-heart' aria-hidden='true'></i></a>";
                                else
                                    echo "
                                                <a id='likeLink' class='likeLink follow text-white'>Unlike <i class='fa fa-heart-broken' aria-hidden='true'></i></a>";
                                echo "
                                            </button>
                                                
                                            </li>
                                            <li>
                                            <button onclick = '' class='btn2' style='border:none' >
                                            <a class='hire-us text-white'>Comment <i class='fa fa-comment' aria-hidden='true'></i></a>
                                            </button>
                                            </li>
                                        </ul>
                                        ";
                            }
                            echo "
                                    </div>
                                    <a id='likesNum' class='view-more-pro'> &nbsp;Likes:
                                        <img  src='images/likes.png' alt='' height='18' width='18'>
                                        " . $row['photo_likes'] . "
                                    </a>
                                    </form>
                                </div><!--company_profile_info end-->
                                
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div><!--companies-list end-->

                <div class='process-comm'>
                    <!--<div class='spinner'>
                        <div class='bounce1'></div>
                        <div class='bounce2'></div>
                        <div class='bounce3'></div>
                    </div>
                    -->
                </div>
                <!--process-comm end-->

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
                        <li><a href="terms_of_use.php" title="">Terms of Use</a></li>
                        <li><a href="#" title="">Language: English</a></li>
                        <!--<li><a href="#" title="">Copyright Policy</a></li>-->
                    </ul>
                    <p><img src="images/copy-icon2.png" alt="">Copyright
                        <script type="text/javascript">document.write(new Date().getFullYear());</script>
                    </p>
                    <img class="fl-rgt" src="images/logo2.png" alt="">
                </div>
            </div>
        </footer>

    </div><!--theme-layout end-->


    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/flatpickr.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
    <script src="./lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
    <script>
        var formSubmit = true;

        $('.btn2').on('click', function () {
            formSubmit = false;
            $.ajax({
                //type: "GET",
                url: 'pic_comments.php',
            });
        });

        $(".likes-comments-form").submit(function (e) {

            if (!formSubmit) return;

            e.preventDefault(); // avoid to execute the actual submit of the form.

            let form = $(this);
            //var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: 'db/likes.php',
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    $(form).children("#likesNum").html(" &nbsp;Likes: <img src='images/likes.png' alt='' height='18' width='18'>" + data + "</img>");
                }
            });

        });

        function changeLikeState(x1) {
            let x = x1.children;
            //alert (x[0].textContent );
            if (x[0].textContent.includes("Unlike")) {
                x[0].innerHTML = "Like <i class='fa fa-heart' aria-hidden='true'></i>";
            } else {
                x[0].innerHTML = "Unlike <i class='fas fa-heart-broken'></i>";
            }
        }

    </script>
</body>
</html>