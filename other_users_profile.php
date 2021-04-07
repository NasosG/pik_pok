<?php
//include general_session to files user can visit without an account too
include('db/general_session.php');
require('db/db.php');
require('db/error_functions.php');
require('db/utility_functions.php');

$uname = $_GET['photo_username'];
mysqli_set_charset($con, "utf8");
$query = "SELECT * FROM images WHERE username = '$uname' ORDER BY photo_id DESC";
$result = mysqli_query($con, $query);

// a new result, because if we fetched the array at this point, counter would then be equal to 0
// and this would be a problem when we'd want to fetch the posts later, a better way may exists though
$result_likes = mysqli_query($con, $query);
// a sum of the likes => total likes
for ($sum_likes = 0; $likes = mysqli_fetch_array($result_likes);)
    $sum_likes += $likes['photo_likes'];

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

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile - Pik Pok</title>
    <?php include_once('./includes/head.php'); ?>
    <style>
        a:focus, button:focus, textarea:focus {
            outline: none;
        }

        .like-submit-btn:hover {
            outline: none !important;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <?php include_once('./includes/other_users_profile_header.php');?>
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

                                                        </form>
                                                    </div><!--user-pro-img end-->
                                                </div>
                                            </div><!--username-dt end-->
                                            <div class="user-specs">
                                                <h3><?php echo $uname; ?></h3>
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

                                        </ul>
                                    </div><!--user-data end-->
                                    <div class="suggestions full-width">
                                        <div class="sd-title">
                                            <h3>Short Bio</h3>
                                            <i class="fa fa-ellipsis-v"></i>
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
                                                            <h3>Posted by ' . $uname . '</h3>
                                                            <span><img src="images/clock.png" alt="">' . $date_posted . '</span>
                                                        </div>
                                                    </div>
                                                    <div class="ed-opts">
                                                        <a href="#" title="" class="ed-opts-open"><i class="fa fa-ellipsis-v"></i></a>
                                                        <ul class="ed-options">
                                                        ';
                                        if (!isset($_SESSION['username'])) {
                                            echo '<li><a href="#" title="">Login or make an acount for more actions</a></li>';
                                        } else {
                                            echo '
                                                            
                                                            <li><a class="comment-ed-option" href="pic_comments.php?photo_id=' . $photos_ids[$i - 1] . '"' . ' 
                                                            title="">Comment</a></li>
                                                            
                                                            ';
                                            if (isSaved($con, $photos_ids[$i - 1])) {
                                                echo '<li><a class="saved-ed-option" href="#" title="">Saved</a></li>';
                                            } else
                                                echo '<li><a href="#" class="saved-ed-option" onclick="savePost(' . $photos_ids[$i - 1] . ')" title="">Unsaved</a></li>';
                                            echo '
    
                                                            <li><a class="close-ed-opts close-ed-option" href="#" onclick="funct" title="">Close</a></li>';
                                        }
                                        echo '
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
                                                    <ul class="bk-links  p-1"></ul>
                                                </form>';
                                        ?>

                                        <form id="likes-form" class="likes-form" name="likes-form" method="post"
                                              action="db/likes.php">
                                            <div class="job-status-bar">
                                                <?php echo '<input type="hidden" name="photo_id" id="photo_id" value="' . $row['photo_id'] . '" />'; ?>
                                                <ul class="like-com">
                                                    <li>
                                                        <?php
                                                        if (isset($_SESSION['username'])) {
                                                            echo '
                                                                <button style="background:white; border:none;" onclick=changeLikeState(this)
                                                                class="like-submit-btn"><a id="like-submit"
                                                                                           style="color:#e44d3a;"
                                                                                           class="com-page-likes"><i
                                                                        class=';

                                                                        // TODO ifs optimization
                                                                        if (post_is_liked_from($_SESSION['username'], $row['photo_id'], $con))
                                                                            echo '"fa fa-heart"';
                                                                        else
                                                                            echo '"far fa-heart"';
                                                                echo '></i>';

                                                                if (post_is_liked_from($_SESSION['username'], $row['photo_id'], $con))
                                                                    echo 'Unlike';
                                                                else
                                                                    echo 'Like';

                                                            echo '</a></button>';
                                                        }
                                                        /*else do nothing*/
                                                        ?>
                                                    </li>

                                                </ul>
                                                <ul style="float:right;" class="like-com">
                                                    <li><a style="color:#b2b2b2;" id="likes-link-red" class=""><i
                                                                    class="fa fa-thumbs-up"></i> <?php echo 'Likes ' . $row['photo_likes']; ?>
                                                        </a></li>
                                                    <?php
                                                    if (!(isset($_SESSION['username']))) {
                                                        echo '<li><a style="color:#b2b2b2;"><i class="fa fa-comment"></i>Comments ' . $row_after_count[0] . '</a></li>';
                                                    } else {
                                                        echo '<li><a href= "pic_comments.php?photo_id=' . $row['photo_id'] . '"><i class="fa fa-comment"></i>Comments ' . $row_after_count[0] . '</a></li>';
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                    }
                                    ?>

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
                                        <h3>User posts</h3>
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
                                                    echo '<li><a title="" ><img style=" border-radius:10%;height:53px;width:70px;" src="' . $photos_table[$i] . '" alt=""></a></li>';
                                                }
                                            ?>
                                        </ul>
                                    </div><!--pf-gallery end-->
                                </div><!--widget-portfolio end-->
                            </div><!--right-sidebar end-->
                        </div>
                    </div>
                </div><!-- main-section-data end-->
            </div>
    </div>
    </main>


    <div class="post-popup pst-pj">
        <div class="post-project">
            <h3>Post a project</h3>
            <div class="post-project-fields">
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="text" name="title" placeholder="Title">
                        </div>
                        <div class="col-lg-12">
                            <div class="inp-field">
                                <select>
                                    <option>Category</option>
                                    <option>Category 1</option>
                                    <option>Category 2</option>
                                    <option>Category 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <input type="text" name="skills" placeholder="Skills">
                        </div>
                        <div class="col-lg-12">
                            <div class="price-sec">
                                <div class="price-br">
                                    <input type="text" name="price1" placeholder="Price">
                                    <i class="fa fa-dollar"></i>
                                </div>
                                <span>To</span>
                                <div class="price-br">
                                    <input type="text" name="price1" placeholder="Price">
                                    <i class="fa fa-dollar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <textarea name="description" placeholder="Description"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <ul>
                                <li>
                                    <button class="active" type="submit" value="post">Post</button>
                                </li>
                                <li><a href="#" title="">Cancel</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div><!--post-project-fields end-->
            <a href="#" title=""><i class="fa fa-times-circle-o"></i></a>
        </div><!--post-project end-->
    </div><!--post-project-popup end-->


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
        document.getElementsByClassName("like-submit-btn").onclick = function () {
            document.getElementsByClassName("likes-form").submit();
        }

        $(".likes-form").submit(function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.

            let likesForm = $(this);

            $.ajax({
                type: "POST",
                url: 'db/likes.php',
                data: likesForm.serialize(), // serializes the form's elements.
                success: function (data) {
                    $(likesForm).find("#likes-link-red").html("<i class='fa fa-thumbs-up'></i> Likes " + data);
                }
            });
        });


        function changeLikeState(x1) {
            let x = x1.children;
            if (x[0].textContent.includes("Unlike")) {
                x[0].innerHTML = "<i class='far fa-heart' ></i> Like";
            } else {
                x[0].innerHTML = "<i class='fa fa-heart' aria-hidden='true'></i> Unlike";
            }
        }

        function savePost(num) {
            let values = {
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