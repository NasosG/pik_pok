<?php
include('db/auth.php'); //include auth.php file on all secure pages
require('db/db.php');
require('db/error_functions.php');
require('db/utility_functions.php');

$uname = $_SESSION['username'];
mysqli_set_charset($con, "utf8");
$query = "SELECT * FROM images WHERE username = '$uname' ORDER BY photo_id DESC";
$result = mysqli_query($con, $query);

// a new result, because if we fetched the array at this point, counter would then be equal to 0
// and this would be a problem when we'd want to fetch the posts later
// may a better way exists though
$result_likes = mysqli_query($con, $query);
// a sum of the likes => total likes
for ($sum_likes = 0; $likes = mysqli_fetch_array($result_likes);)
    $sum_likes += $likes['photo_likes'];

///////////////////////////////////////////

$query1 = "SELECT * FROM images WHERE username = '$uname' ORDER BY photo_likes DESC LIMIT 12";
$result1 = mysqli_query($con, $query1);
// get user id from username
$query_uid = "SELECT id FROM members WHERE username = '$uname' LIMIT 1";
$result_uid = mysqli_query($con, $query_uid);
$row_uid = mysqli_fetch_array($result_uid);
$uid = $row_uid[0];
// saved posts ordered by their date (max 12 rows again)
$query_save_post = "SELECT * FROM images, saved_posts WHERE saved_posts.user_id='$uid' AND images.photo_id=saved_posts.post_id LIMIT 12";
$result_save_post = mysqli_query($con, $query_save_post);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile - Pik Pok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once('./includes/head.php'); ?>
    <style>
        .like-submit-btn:hover {
            outline: none !important;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <header>
            <div class="container">
                <div class="header-data">
                    <div class="logo">
                        <a href="index.php" title=""><img src="images/logo.png" alt=""></a>
                    </div><!--logo end-->
                    <div class="search-bar">
                        <form method="get" action="index.php">
                            <input type="text" name="search" placeholder="Search...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!--search-bar end-->
                    <nav>
                        <ul>
                            <li>
                                <a href="index.php" title="">
                                        <span>
                                        <i style="font-size:1.2em;" class="fa fa-home"></i>
                                        </span>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="top.php" title="">
                                        <span>
                                        <i class="fa fa-thumbs-up "></i>
                                        </span>
                                    Trending
                                </a>
                            </li>
                            <li>
                                <a href="contact.php" title="">
                                        <span>
                                        <i class="fa fa-id-card"></i>
                                        </span>
                                    Contact
                                </a>
                            </li>
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo '
                                    <li>
                                        <a href="post.php" title="">
                                            <span>
                                            <i class="fa fa-plus"></i>
                                            </span>
                                            Post
                                        </a>
                                    </li>
                                    ';
                                echo '
                                    <li>
                                        <a href="people.php" title="">
                                            <span>
                                            <i class="fa fa-user-friends"></i>
                                            </span>
                                            Friends
                                        </a>
                                    </li>
                                    ';
                                echo '
                                    <li>
                                        <a href="messages.php" title="">
                                            <span>
                                            <i class="fa fa-comments"></i>
                                            </span>
                                            Chat
                                        </a>
                                    </li>
                                    ';
                            }
                            ?>
                        </ul>
                    </nav><!--nav end-->
                    <div class="menu-btn">
                        <a href="#" title=""><i class="fa fa-bars"></i></a>
                    </div><!--menu-btn end-->

                    <?php
                    if (isset($_SESSION['username'])) {
                        // find user id from session name
                        $query_picture = "SELECT email, fname, lname, picture_path, profile_pic, bio FROM members WHERE username = '$uname'";
                        $result_picture = mysqli_query($con, $query_picture);
                        $row_picture = mysqli_fetch_array($result_picture);
                        $picture_path = $row_picture['picture_path'];
                        $picture_name = $row_picture['profile_pic'];
                        $fname = $row_picture['fname'];
                        $lname = $row_picture['lname'];
                        $email = $row_picture['email'];
                        $bio = $row_picture['bio'];
                        //mysqli_close($con);
                        echo "
                        <div class='user-account'>
                            <div class='user-info'>
                                <img style=\"width:32px; height:32px;\" src=\"" . $picture_path . $picture_name . "\" alt=\"users photo\"/>
                                
                                <a href='profile3.php' title=''>"; ?>
                        <?php if (isset($_SESSION['username'])) echo $_SESSION['username'];
                        echo "</a>
                                <i class='fa fa-angle-down'></i>
                            </div>
                            <div class='user-account-settingss'>
                                <h3>Online Status</h3>
                                <ul class='on-off-status'>
                                    <li>
                                        <div class='fgt-sec'>
                                            <input type='radio'";
                                            if ($get_status($con, $_SESSION['username']) === 'online') echo 'checked="checked"';
                                            echo "name='cc' id='c5'>
                                            <label for='c5'>
                                                <span></span>
                                            </label>
                                            <small>Online</small>
                                        </div>
                                    </li>
                                    <li>
                                        <div class='fgt-sec'>
                                            <input type='radio'";
                                            if ($get_status($con, $_SESSION['username']) === 'offline') echo 'checked="checked"';
                                            echo "name='cc' id='c6'>
                                            <label for='c6'>
                                                <span></span>
                                            </label>
                                            <small>Offline</small>
                                        </div>
                                    </li>
                                </ul>
                                <h3>Custom Status</h3>
                                <div class='search_form'>
                                    <form>
                                        <input type='text' name='search'>
                                        <button type='submit'>Ok</button>
                                    </form>
                                </div><!--search_form end-->
                                <h3>Setting</h3>
                                <ul class='us-links'>
                                    <li><a href='profile3.php' title=''>My Profile</a></li>
                                    <li><a href='profile_account_setting.php' title=''>Account Setting</a></li>
                                    <li><a href='privacy_policy.php' title=''>Privacy</a></li>
                                    <li><a href='terms_of_use.php' title=''>Terms & Conditions</a></li>
                                </ul>
                                <h3 class='tc'><a href='db/logout.php' title=''>Logout</a></h3>
                            </div><!--user-account-settingss end-->
                        </div>
                        ";
                    } else
                        echo "<div class='user-account'>
                            <div class='user-info' style='margin-left:auto; margin-right:auto;'>
                                
                                <a href='signin.php' title=''> <i class='fa fa-sign-in fa-lg'></i> Sign In</a>
                                
                            </div>
                        ";
                    ?>
                </div><!--header-data end-->
            </div>
        </header><!--header end-->

        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">
                            <div class="col-lg-3 col-md-4 pd-left-none no-pd">
                                <div class="main-left-sidebar no-margin">
                                    <div class="user-data full-width">
                                        <div class="user-profile">
                                            <div class="username-dt">
                                                <div class="user-pro-img">
                                                    <div class="usr-pic  ">
                                                        <img style="max-height:150px;"
                                                             src= <?php echo '"' . $picture_path . $picture_name . '"'; ?> alt="">
                                                        <form id="changeAvatar" name="changeAvatar" method="post"
                                                              action="db/add_profile_pic.php" enctype="multipart/form-data">
                                                            <div class="add-dp" id="OpenImgUpload">
                                                                <input type="file" id="file" name="fileToUpload">
                                                                <label for="file"><i class="fa fa-camera"
                                                                                     aria-hidden="true"></i></label>
                                                            </div>
                                                        </form>
                                                    </div><!--user-pro-img end-->
                                                </div>
                                            </div><!--username-dt end-->
                                            <div class="user-specs">
                                                <h3><?php echo $_SESSION['username']; ?></h3>
                                                <span><?php echo $fname . ' ' . $lname; ?></span>
                                                <span><br><?php echo 'email: ' . $email; ?></span>
                                            </div>
                                        </div><!--user-profile end-->
                                        <ul class="user-fw-status">
                                            <li>
                                                <h4>Posts</h4>
                                                <span><?php echo mysqli_num_rows($result); ?></span>
                                            </li>
                                            <li>
                                                <h4>Total Likes</h4>
                                                <span><?php echo $sum_likes; ?></span>
                                            </li>
                                            <li>
                                                <a href="profile_account_setting.php" title="">More Settings</a>
                                            </li>
                                        </ul>
                                    </div><!--user-data end-->
                                    <div class="suggestions full-width">
                                        <div class="sd-title">
                                            <h3>Short Bio</h3>
                                            <div class="">
                                                <a href="#" title="" class="bio-opts ed-opts-open"><i
                                                            class="fa fa-ellipsis-v"></i></a>
                                                <ul class="ed-options">
                                                    <li><a href="profile_account_setting.php" title="">Edit Bio</a></li>
                                                    <!--<li><a href="#" title="">Clear Bio</a></li>-->
                                                </ul>
                                            </div>
                                        </div><!--sd-title end-->
                                        <div class="suggestions-list">
                                            <div class="suggestion-usd">
                                                <?php echo $bio; ?>
                                            </div>
                                            <ul class="user-bio">
                                                <!--<li>
                                                    <a href="profile3.php" title="">Change Bio</a>
                                                </li>-->
                                            </ul>
                                        </div><!--suggestions-list end-->
                                    </div><!--suggestions end-->
                                    <div class="tags-sec full-width">
                                        <ul>
                                            <li><a href="help_center.php" title="">Help Center</a></li>
                                            <li><a href="about.php" title="">About</a></li>
                                            <li><a href="terms_of_use.php" title="">Privacy Policy</a></li>
                                            <li><a href="community_guidelines.php" title="">Community Guidelines</a></li>
                                            <li><a href="cookies_policy.php" title="">Cookies Policy</a></li>
                                            <li><a href="#" title="">Career</a></li>
                                            <li><a href="#" title="">Language</a></li>
                                            <li><a href="community_guidelines.php" title="">Copyright Policy</a></li>
                                        </ul>
                                        <div class="cp-sec">
                                            <img src="images/logo2.png" alt="">
                                            <p><img src="images/cp.png" alt="">Copyright
                                                <script type="text/javascript">document.write(new Date().getFullYear());</script>
                                            </p>
                                        </div>
                                    </div><!--tags-sec end-->
                                </div><!--main-left-sidebar end-->
                            </div>
                            <div class="col-lg-6 col-md-8 no-pd">
                                <div class="main-ws-sec">
                                    <div class="post-topbar">
                                        <div class="user-picy">
                                            <img src= <?php echo '"' . $picture_path . $picture_name . '"'; ?> alt="">
                                        </div>
                                        <div class="post-st">
                                            <ul>
                                                <li><a class="post-jb active" href="#" title=""><i class="fa fa-plus"></i>
                                                        Post Image</a></li>
                                                <li>
                                                    <a class="active" href="profile_account_setting.php" title=""><i
                                                                class="fa fa-cog"></i> Settings</a>
                                                </li>
                                            </ul>
                                        </div><!--post-st end-->
                                    </div><!--post-topbar end-->
                                    <div class="posts-section">
                                        <?php
                                        $i = 0;
                                        $photos_table = array();
                                        $photos_ids = array();
                                        while ($row = mysqli_fetch_array($result)) {

                                        $photo = $row['photo_path'] . $row['photo_name'];
                                        $date_posted = date("d-m-Y", strtotime($row['date_posted']));

                                        $photo_id = $row['photo_id'];
                                        $count_comments = "SELECT COUNT(post_id) FROM post_comments WHERE post_id = '$photo_id'";
                                        $result_of_count = mysqli_query($con, $count_comments);

                                        $row_after_count = mysqli_fetch_row($result_of_count);

                                        // store all the photos in an array to use them later
                                        $photos_ids[$i] = $photo_id;
                                        $photos_table[$i++] = $photo;

                                        echo '	
                                            <div class="post-bar">
                                                <div class="post_topbar">
                                                    <div class="usy-dt">
                                                        <img src="" alt="">
                                                        <div class="usy-name">
                                                            <h3>Posted by Me</h3>
                                                            <span><img src="images/clock.png" alt="">' . $date_posted . '</span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i class="fa fa-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                            <li><a href="#" title="">Edit Post</a></li>
                                                            <li><a href="pic_comments.php?photo_id=' . $photos_ids[$i - 1] . '"' . ' title="">Comment</a></li>
                                                            ';
                                        if (isSaved($con, $photos_ids[$i - 1])) {
                                            echo '<li><a href="#" title="">Saved</a></li>';
                                        } else
                                            echo '<li><a href="#" onclick="savePost(' . $photos_ids[$i - 1] . ')" title="">Unsaved</a></li>';
                                        echo '
                                                            
                                                            <li><a class="close-ed-opts" href="#" onclick="funct" title="">Close</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="epi-sec pb-3">
                                                    
                                                </div>
                                                <div class="job_descp pb-1">
                                                    <img src="' . $photo . '"/>
                                                </div>
                                                <form name="delete-form" class="form-delete" id="delete-form" method="post" action="db/delete_photo.php">
                                                    <input type="hidden" name="photo_id" id="photo_id" value="' . $row['photo_id'] . '" />
                                                    <ul class="bk-links pb-2">
                                                        <li><button style="border:none" id="trash-button" class="trash-button"><a title=""><i class="fa fa-trash"></i></a></button></li>
                                                    </ul>
                                                </form>';
                                        ?>

                                        <form id="likes-form" class="likes-form" name="likes-form" method="post"
                                              action="db/likes.php">
                                            <div class="job-status-bar">
                                                <?php echo '<input type="hidden" name="photo_id" id="photo_id" value="' . $row['photo_id'] . '" />'; ?>
                                                <ul class="like-com">
                                                    <li>
                                                        <button style="background:white; border:none;"
                                                                class="like-submit-btn"><a id="like-submit"
                                                                                           style="color:#e44d3a;"
                                                                                           class="com-page-likes"><i
                                                                        class=
                                                                        <?php
                                                                        if (post_is_liked_from($_SESSION['username'], $row['photo_id'], $con))
                                                                            echo '"fa fa-heart"';
                                                                        else
                                                                            echo '"far fa-heart"';?>
                                                                ></i> Like</a></button>
                                                    </li>
                                                </ul>
                                                <ul style="float:right;" class="like-com">
                                                    <li><a style="color:#b2b2b2;" class=""><i
                                                                    class="fa fa-thumbs-up"></i> <?php echo 'Likes ' . $row['photo_likes']; ?>
                                                        </a></li>
                                                    <li>
                                                        <a href=<?php echo "pic_comments.php?photo_id=" . $row['photo_id'] . ""; ?>  class=""><i
                                                                    class="fa fa-comment"></i> <?php echo 'Comments ' . $row_after_count[0]; ?>
                                                        </a></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div><!--post-bar end-->
                                    <?php }    // while-end ?>
                                </div><!--posts-section end-->
                            </div><!--main-ws-sec end-->
                        </div>
                        <div class="col-lg-3">
                            <div class="right-sidebar">
                                <!--<div class="message-btn">
                                    <a href="profile-account-setting.php" title=""><i class="fa fa-cog"></i> Account Settings</a>
                                </div>-->
                                <div class="widget widget-portfolio">
                                    <div class="wd-heady">
                                        <h3>My posts</h3>
                                        <img src="images/photo-icon.png" alt="">
                                    </div>
                                    <div class="pf-gallery">
                                        <ul>
                                            <?php
                                            $len = count($photos_table);
                                            if ($len === 0) echo 'No posts yet';
                                            else
                                                for ($i = 0; $i < $len; $i++) {
                                                    /*	width height may change
                                                        45/60 possible
                                                        45/72-73 golden ratio
                                                    */
                                                    echo '<li><a href="pic_comments.php?photo_id=' . $photos_ids[$i] . '" title="" ><img style=" border-radius:10%;height:53px;width:70px;" src="' . $photos_table[$i] . '" alt=""></a></li>';
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="widget widget-portfolio">
                                    <div class="wd-heady">
                                        <h3>Best-liked posts</h3>
                                        <img src="images/photo-icon.png" alt="">
                                    </div>
                                    <div class="pf-gallery">
                                        <ul>
                                            <?php
                                            $len = mysqli_num_rows($result1);
                                            if ($len === 0) echo 'No posts yet';

                                            else
                                                while ($row_likes = mysqli_fetch_array($result1)) {
                                                    echo '<li><a href="pic_comments.php?photo_id=' . $row_likes['photo_id'] . '" title="" ><img style=" border-radius:10%;height:53px;width:70px;" src="' . $row_likes['photo_path'] . $row_likes['photo_name'] . '" alt=""></a></li>';
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>

                                <div class="widget widget-portfolio">
                                    <div class="wd-heady">
                                        <h3>Saved posts</h3>
                                        <img src="images/photo-icon.png" alt="">
                                    </div>
                                    <div class="pf-gallery">
                                        <ul>
                                            <?php
                                            $len = mysqli_num_rows($result_save_post);

                                            if ($len === 0) echo 'No posts yet';

                                            else
                                                while ($row_saves = mysqli_fetch_array($result_save_post)) {
                                                    echo '<li><a href="pic_comments.php?photo_id=' . $row_saves['post_id'] . '" title="" ><img style=" border-radius:10%;height:53px;width:70px;" src="' . $row_saves['photo_path'] . $row_saves['photo_name'] . '" alt=""></a></li>';
                                                }
                                            ?>
                                        </ul>
                                    </div>

                                </div>
                            </div><!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
    </div>
    </main>

    <div class="post-popup job_post">
        <div class="post-project">
            <h3>Post Image</h3>
            <div class="post-project-fields">
                <form id="post_form" name="post_form" method="post" action="db/add_new.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <input type="text" name="tags" placeholder="Insert Tags, f.e. #summer2020#i<3beach">
                        </div>
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="upload-btn-wrapper">
                                <button class="btn-up">Upload an Image</button>
                                <input type="file" id="fileToUpload" name="fileToUpload" class="input-file"></input>
                            </div>
                            <?php
                            function isMobileDevice()
                            {
                                return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo 
                                        |fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
                                    , $_SERVER["HTTP_USER_AGENT"]);
                            }

                            if (!isMobileDevice()) {
                                echo '<div class="upload-btn-wrapper">
                                                  <button disabled class="btn-up" id="mylink"><a class="a-up" href="webcam.php">Take a photo</a></button>
                                                </div> ';
                            }
                            ?>
                        </div>
                        <img style="max-height:32vh;margin-left:auto;margin-right:auto" src="images/SocialMediaPost.png"
                             id="add-prof-pic"></img>
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
            <a href="#" title=""><i class="fa fa-times-circle-o"></i></a>
        </div><!--post-project end-->
    </div><!--post-project-popup end-->

    </div><!--theme-layout end-->

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script>
        document.getElementsByClassName("trash-button").onclick = function () {
            document.getElementsByClassName("form-delete").submit();
        }

        document.getElementById("file").onchange = function () {
            document.getElementById("changeAvatar").submit();
        };

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

        document.getElementsByClassName("like-submit-btn").onclick = function () {
            document.getElementsByClassName("likes-form").submit();
        }

        $(".likes-form").submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: 'db/likes.php',
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    location.reload();
                }
            });

        });

        function savePost(num) {
            var values = {
                'photo_id': num
            };
            $.ajax({
                type: "POST",
                url: 'db/save_post.php',
                data: values,
                success: function (data) {
                    location.reload();
                    //alert("saved");
                }
            });
        }
    </script>

</body>
</html>