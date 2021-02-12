<?php
include("db/auth.php"); //include auth.php file on all secure pages include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/error_functions.php');

$username = $_SESSION['username'];
mysqli_set_charset($con, "utf8");
$query = "SELECT * FROM members WHERE username='$username'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

////////////////////////////////////

$password = $row['password'];
$fname = $row['fname'];
$lname = $row['lname'];
$email = $row['email'];
$date_of_registration = $row['date_of_registration'];
$date_of_birth = $row['date_of_birth'];
$bio = $row['bio'] == null ? "Tell us a little about yourself" : $row['bio'];

$datetime1 = new DateTime('NOW');
$datetime2 = new DateTime($date_of_registration);

// the difference between today and date of registration is the days since registration 
$member_for = $datetime1->diff($datetime2)->days;
//print_r($difference);
$query = "SELECT COUNT(*), SUM(photo_likes) FROM images WHERE username = '$username'";
$result1 = mysqli_query($con, $query);
$num = mysqli_fetch_array($result1);

////////////////////////////////////
$current_month = date("m");

if (!isset($_SESSION['username']))
    header('Location: index.php');

// code below may get optimized in the future
$uname = $_SESSION['username'];

// find user id from session name
$query_uid = "SELECT id FROM members WHERE username = '$uname'";
$result_uid = mysqli_query($con, $query_uid);
$row_uid = mysqli_fetch_array($result_uid);

$query_month_likes = "SELECT COUNT(*) FROM post_likes WHERE liked_by_user = '$row_uid[0]' AND MONTH(time) ='$current_month' ";
$result_month_likes = mysqli_query($con, $query_month_likes);
$likes_month = mysqli_fetch_array($result_month_likes);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Settings - Pik Pok</title>
    <?php include_once('./includes/head.php'); ?>
</head>

<body>
    <div class="wrapper">

        <?php
        // include header for all web pages
        include_once('./includes/header.php');
        ?>

        <section class="profile-account-setting">
            <div class="container">
                <div class="account-tabs-setting">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="acc-leftbar">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-acc-tab" data-toggle="tab" href="#nav-acc"
                                       role="tab" aria-controls="nav-acc" aria-selected="false"><i class="fa fa-cog"></i>General</a>
                                    <a class="nav-item nav-link" id="nav-blockking-tab" data-toggle="tab" href="#general"
                                       role="tab" aria-controls="nav-general-tab" aria-selected="true"><i
                                                class="fa fa-cogs"></i>Account Setting</a>
                                    <a class="nav-item nav-link" id="nav-status-tab" data-toggle="tab" href="#nav-status"
                                       role="tab" aria-controls="nav-status" aria-selected="false"><i
                                                class="fa fa-line-chart"></i>Status</a>
                                    <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab"
                                       href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false"><i
                                                class="fa fa-lock"></i>Change Password</a>
                                    <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab"
                                       href="#nav-notification" role="tab" aria-controls="nav-notification"
                                       aria-selected="false"><i class="fa fa-flash"></i>Notifications</a>
                                    <a class="nav-item nav-link" id="nav-privcy-tab" data-toggle="tab" href="#privcy"
                                       role="tab" aria-controls="privacy" aria-selected="false"><i class="fa fa-group"></i>Requests</a>
                                    <a class="nav-item nav-link" id="security" data-toggle="tab" href="#security-login"
                                       role="tab" aria-controls="security-login" aria-selected="false"><i
                                                class="fa fa-user-secret"></i>Security and Login</a>
                                    <a class="nav-item nav-link" id="nav-privacy-tab" data-toggle="tab" href="#privacy"
                                       role="tab" aria-controls="privacy" aria-selected="false"><i class="fa fa-paw"></i>Privacy</a>
                                    <a class="nav-item nav-link" id="nav-deactivate-tab" data-toggle="tab"
                                       href="#nav-deactivate" role="tab" aria-controls="nav-deactivate"
                                       aria-selected="false"><i class="fa fa-random"></i>Delete Account</a>
                                </div>
                            </div><!--acc-leftbar end-->
                        </div>
                        <div class="col-lg-9">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-acc" role="tabpanel"
                                     aria-labelledby="nav-acc-tab">
                                    <div class="acc-setting">
                                        <h3>General Account Settings</h3>
                                        <form id="settings-form" name="settings-form" method="post"
                                              action="db/change_settings.php">
                                            <div class="cp-field">
                                                <h5>First Name</h5>
                                                <div class="cpp-fiel">
                                                    <table>
                                                        <th style="width:100%;">
                                                            <input type="text" name="fname"
                                                                   placeholder="<?php echo $fname; ?>"/>
                                                        </th>
                                                        <th style="">
                                                            <button class="btn" type="submit">Change</button>
                                                        </th>
                                                    </table>
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Last Name</h5>
                                                <div class="cpp-fiel">

                                                    <table>
                                                        <th style="width:100%;">
                                                            <input type="text" name="lname"
                                                                   placeholder="<?php echo $lname; ?>"/>
                                                        </th>
                                                        <th style="">
                                                            <button class="btn penciled" type="submit">Change</button>
                                                        </th>
                                                    </table>


                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Contact</h5>
                                                <div class="cpp-fiel">

                                                    <table>
                                                        <th style="width:100%;">
                                                            <input type="text" name="email"
                                                                   placeholder="<?php echo $email; ?>"/>
                                                        </th>
                                                        <th style="">
                                                            <button class="btn" type="submit">Change</button>
                                                        </th>
                                                    </table>


                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Username</h5>
                                                <div class="cpp-fiel">

                                                    <table>
                                                        <th style="width:100%;">
                                                            <input type="text" name="username"
                                                                   placeholder="<?php echo $username; ?>"/>
                                                        </th>
                                                        <th style="">
                                                            <button class="btn" type="submit">Change</button>
                                                        </th>
                                                    </table>


                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Birth Date</h5>
                                                <div class="cpp-fiel">

                                                    <table>
                                                        <th style="width:100%;">
                                                            <input type="date" name="bdate"
                                                                   placeholder="<?php echo $date_of_birth; ?>"
                                                                   value="<?php echo $date_of_birth; ?>"/>
                                                        </th>
                                                        <th>
                                                            <button class="btn" type="submit">Change</button>
                                                        </th>
                                                    </table>


                                                    <i class="fa fa-birthday-cake"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Short Bio</h5>
                                                <div class="cpp-fiel">

                                                    <table>
                                                        <th style="width:100%;">
                                                            <input type="text" name="bio"
                                                                   placeholder="<?php echo $bio; ?>"/>
                                                        </th>
                                                        <th>
                                                            <button class="btn" type="submit">Change</button>
                                                        </th>
                                                    </table>


                                                    <i class="fa fa-file"></i>
                                                </div>
                                            </div>
                                            <div class="save-stngs pd3"></div>
                                        </form>
                                    </div><!--acc-setting end-->
                                </div>
                                <div class="tab-pane fade" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
                                    <div class="acc-setting">
                                        <h3>Profile Status</h3>
                                        <div class="profile-bx-details">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="profile-bx-info">
                                                        <div class="pro-bx">
                                                            <img src="images/posts_settings.png" alt="">
                                                            <div class="bx-info">
                                                                <h3><?php echo $num[0] . ""; ?></h3>
                                                                <h5>Total Posts</h5>
                                                            </div><!--bx-info end-->
                                                        </div><!--pro-bx end-->
                                                        <p>Check the number of posts you've made. Incredible!!</p>
                                                    </div><!--profile-bx-info end-->
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="profile-bx-info">
                                                        <div class="pro-bx">
                                                            <img src="images/like_settings.png" alt="">
                                                            <div class="bx-info">
                                                                <h3><?php echo $num[1] == null ? 0 : $num[1] . ""; ?></h3>
                                                                <h5>Likes</h5>
                                                            </div><!--bx-info end-->
                                                        </div><!--pro-bx end-->
                                                        <p>Wow, go on because you are liked, quite... a lot!!!</p>
                                                    </div><!--profile-bx-info end-->
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="profile-bx-info">
                                                        <div class="pro-bx">
                                                            <img src="images/days_settings.png" alt="">
                                                            <div class="bx-info">
                                                                <h3><?php echo $member_for . ""; ?></h3>
                                                                <h5>Days Registered</h5>
                                                            </div><!--bx-info end-->
                                                        </div><!--pro-bx end-->
                                                        <p>Pik-Pok thanks you for your support. It means a lot!!</p>
                                                    </div><!--profile-bx-info end-->
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <div class="profile-bx-info">
                                                        <div class="pro-bx">
                                                            <img src="images/likes_month_settings.png" alt="">
                                                            <div class="bx-info">
                                                                <h3><?php echo $likes_month[0]; ?></h3>
                                                                <h5>Likes this Month</h5>
                                                            </div>
                                                        </div>
                                                        <p>The likes you got his month. Stay fresh and post something
                                                            new!</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--profile-bx-details end-->
                                        <div class="pro-work-status">
                                            <!-- <h4>Work Status  -  Last Months Working Status</h4> -->
                                        </div><!--pro-work-status end-->
                                    </div><!--acc-setting end-->
                                </div>
                                <div class="tab-pane fade" id="nav-password" role="tabpanel"
                                     aria-labelledby="nav-password-tab">
                                    <div class="acc-setting">
                                        <h3>Change Password</h3>
                                        <form id="change_password-form" name="change_password-form" method="post"
                                              action="db/change_password.php" onsubmit="validatePass();">
                                            <div class="cp-field">
                                                <h5>Old Password</h5>
                                                <div class="cpp-fiel">
                                                    <input type="text" name="old_password" placeholder="Old Password"
                                                           required>
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>New Password</h5>
                                                <div class="cpp-fiel">
                                                    <input type="password" id="new_password" name="new_password"
                                                           placeholder="New Password" onkeyup='check();' required>
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Repeat Password</h5>
                                                <div class="cpp-fiel">
                                                    <input type="password" id="repeat_password" name="repeat_password"
                                                           placeholder="Repeat Password" onkeyup='check();' required>
                                                    <span id='message'></span>
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                            </div>
                                            <!--   <div class="cp-field">
                                                   <h5><a href="#" title="">Forgot Password?</a></h5>
                                            </div>   -->
                                            <div class="save-stngs pd2">
                                                <ul>
                                                    <li>
                                                        <button type="submit">Change Password</button>
                                                    </li>
                                                    <li>
                                                        <button type="clear" id="clear">Clear Form</button>
                                                    </li>

                                                </ul>
                                            </div><!--save-stngs end-->

                                        </form>
                                    </div><!--acc-setting end-->
                                </div>
                                <div class="tab-pane fade" id="nav-notification" role="tabpanel"
                                     aria-labelledby="nav-notification-tab">
                                    <div class="acc-setting">
                                        <h3>Notifications</h3>
                                        <div class="notifications-list">
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/s5.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Mary Jones</a> Commented on your post.</h3>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div><!--notfication-details end-->
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/s5.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">George Argiros</a> Liked your post.</h3>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div><!--notfication-details end-->
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/s5.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Mike Boyd</a> Commented on your post.</h3>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div><!--notfication-details end-->
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/s5.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">Jessica Turner</a> Commented on your post.</h3>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div><!--notfication-details end-->
                                            <div class="notfication-details">
                                                <div class="noty-user-img">
                                                    <img src="images/s5.png" alt="">
                                                </div>
                                                <div class="notification-info">
                                                    <h3><a href="#" title="">John Wick</a> Commented on your post.</h3>
                                                    <span>2 min ago</span>
                                                </div><!--notification-info -->
                                            </div><!--notfication-details end-->
                                        </div><!--notifications-list end-->
                                    </div><!--acc-setting end-->
                                </div>
                                <div class="tab-pane fade" id="privcy" role="tabpanel" aria-labelledby="nav-privcy-tab">
                                    <div class="privac">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Requests</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="dropdown privacydropd">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Who can send
                                                        you friend requests?</a>
                                                    <div class="dropdown-menu">
                                                        <p>Choose who can send you friend requestson</p>
                                                        <div class="row">
                                                            <div class="col-md-9 col-sm-12">
                                                                <form class="radio-form">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="requests_everyone"
                                                                               name="requests" class="custom-control-input">
                                                                        <label class="custom-control-label"
                                                                               for="requests_everyone">Everyone</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="requests_friends"
                                                                               name="requests" class="custom-control-input">
                                                                        <label class="custom-control-label"
                                                                               for="requests_friends">Friends of
                                                                            Friends</label>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="security-login" role="tabpanel" aria-labelledby="security">
                                    <div class="privacy security">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Security and Login</h3>
                                                <hr>
                                                <h3>Two - Step Verification</h3>
                                                <p>Help protect your account by enabling extra layers of security.</p>
                                                <hr>
                                                <h3>Security question</h3><i class="fa fa-edit"></i>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Conform your
                                                        identity with a question only you know the answer to</label>
                                                </div>
                                                <hr>
                                                <h3>Security question</h3>
                                                <p>Before can you set a new security question,</p>
                                                <hr>
                                                <h3>Current Question</h3>
                                                <p>Q: Your favorite actor?</p>
                                                <br>
                                                <h3>New Question</h3>
                                                <form>
                                                    <div class="form-group">
                                                        <select class="form-control" id="exampleFormControlSelect1"
                                                                style="-webkit-appearance: menulist-button;">
                                                            <option>Please Select New Question</option>
                                                            <option>Select Second Queston</option>
                                                        </select>
                                                    </div>
                                                </form>
                                                <h3>Answer</h3>
                                                <form>

                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="exampleInputPassword1"
                                                               placeholder=" Answer here">
                                                    </div>
                                                </form>
                                                <div class="checkbox">
                                                    <div class="form-check">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1" name="customRadio"
                                                                   class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio1">I
                                                                understand my account will be locked if I am unable to
                                                                answer this question</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio2" name="customRadio"
                                                                   class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio2">Remember
                                                                this device</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="btns">
                                            <a href="#">Save</a>
                                            <a href="#">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="nav-general-tab">
                                    <div class="acc-setting">
                                        <h3>Account Setting</h3>
                                        <form>
                                            <div class="notbar">
                                                <h4>Notification Sound</h4>
                                                <p>A "ding" sound. Something wild may have happened. Chances are it's a new
                                                    notification from Pik Pok. Enable this feature to be the first to know
                                                    about everything!</p>
                                                <div class="toggle-btn">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="customSwitch1">
                                                        <label class="custom-control-label" for="customSwitch1"></label>
                                                    </div>
                                                </div>
                                            </div><!--notbar end-->
                                            <div class="notbar">
                                                <h4>Notification Email</h4>
                                                <p>Emails are so fun!! ok in the 80s maybe. But of course we can send an
                                                    email to let you know when something important has come up</p>
                                                <div class="toggle-btn">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="customSwitch2">
                                                        <label class="custom-control-label" for="customSwitch2"></label>
                                                    </div>
                                                </div>
                                            </div><!--notbar end-->
                                            <div class="notbar">
                                                <h4>Chat Message Sound</h4>
                                                <p>Don't let your friends (or the love of your life) waiting. Receive a
                                                    special 'tout tout' sound to know when it's time to answer, or not. It's
                                                    your life as Bon Jovi says :-)</p>
                                                <div class="toggle-btn">
                                                    <div class="custom-control custom-switch">
                                                        <input type="checkbox" class="custom-control-input"
                                                               id="customSwitch3">
                                                        <label class="custom-control-label" for="customSwitch3"></label>
                                                    </div>
                                                </div>
                                            </div><!--notbar end-->
                                            <div class="save-stngs">
                                                <ul>
                                                    <li>
                                                        <button type="submit">Save Setting</button>
                                                    </li>
                                                    <li>
                                                        <button type="submit">Restore Setting</button>
                                                    </li>
                                                </ul>
                                            </div><!--save-stngs end-->
                                        </form>
                                    </div><!--acc-setting end-->


                                </div>
                                <div class="tab-pane fade" id="privciy" role="tabpanel" aria-labelledby="nav-privcy-tab">
                                    <div class="acc-setting">
                                        <h3>Requests</h3>
                                        <div class="requests-list">
                                            <div class="request-details">
                                                <div class="noty-user-img">
                                                    <img src="images/s5.png" alt="">
                                                </div>
                                                <div class="request-info">
                                                    <h3>Jessica William</h3>
                                                    <span>Graphic Designer</span>
                                                </div>
                                                <div class="accept-feat">
                                                    <ul>
                                                        <li>
                                                            <button type="submit" class="accept-req">Accept</button>
                                                        </li>
                                                        <li>
                                                            <button type="submit" class="close-req"><i
                                                                        class="fa fa-close"></i></button>
                                                        </li>
                                                    </ul>
                                                </div><!--accept-feat end-->
                                            </div><!--request-detailse end-->
                                            <div class="request-details">
                                                <div class="noty-user-img">
                                                    <img src="images/s5.png" alt="">
                                                </div>
                                                <div class="request-info">
                                                    <h3>John Doe</h3>
                                                    <span>PHP Developer</span>
                                                </div>
                                                <div class="accept-feat">
                                                    <ul>
                                                        <li>
                                                            <button type="submit" class="accept-req">Accept</button>
                                                        </li>
                                                        <li>
                                                            <button type="submit" class="close-req"><i
                                                                        class="fa fa-close"></i></button>
                                                        </li>
                                                    </ul>
                                                </div><!--accept-feat end-->
                                            </div><!--request-detailse end-->
                                            <div class="request-details">
                                                <div class="noty-user-img">
                                                    <img src="images/s5.png" alt="">
                                                </div>
                                                <div class="request-info">
                                                    <h3>Poonam</h3>
                                                    <span>Wordpress Developer</span>
                                                </div>
                                                <div class="accept-feat">
                                                    <ul>
                                                        <li>
                                                            <button type="submit" class="accept-req">Accept</button>
                                                        </li>
                                                        <li>
                                                            <button type="submit" class="close-req"><i
                                                                        class="fa fa-close"></i></button>
                                                        </li>
                                                    </ul>
                                                </div><!--accept-feat end-->
                                            </div><!--request-detailse end-->
                                            <div class="request-details">
                                                <div class="noty-user-img">
                                                    <img src="images/s5.png" alt="">
                                                </div>
                                                <div class="request-info">
                                                    <h3>Bill Gates</h3>
                                                    <span>C & C++ Developer</span>
                                                </div>
                                                <div class="accept-feat">
                                                    <ul>
                                                        <li>
                                                            <button type="submit" class="accept-req">Accept</button>
                                                        </li>
                                                        <li>
                                                            <button type="submit" class="close-req"><i
                                                                        class="fa fa-close"></i></button>
                                                        </li>
                                                    </ul>
                                                </div><!--accept-feat end-->
                                            </div><!--request-detailse end-->
                                            <div class="request-details">
                                                <div class="noty-user-img">
                                                    <img src="images/s5.png" alt="">
                                                </div>
                                                <div class="request-info">
                                                    <h3>Jessica William</h3>
                                                    <span>Graphic Designer</span>
                                                </div>
                                                <div class="accept-feat">
                                                    <ul>
                                                        <li>
                                                            <button type="submit" class="accept-req">Accept</button>
                                                        </li>
                                                        <li>
                                                            <button type="submit" class="close-req"><i
                                                                        class="fa fa-close"></i></button>
                                                        </li>
                                                    </ul>
                                                </div><!--accept-feat end-->
                                            </div><!--request-detailse end-->
                                            <div class="request-details">
                                                <div class="noty-user-img">
                                                    <img src="images/s5.png" alt="">
                                                </div>
                                                <div class="request-info">
                                                    <h3>John Doe</h3>
                                                    <span>PHP Developer</span>
                                                </div>
                                                <div class="accept-feat">
                                                    <ul>
                                                        <li>
                                                            <button type="submit" class="accept-req">Accept</button>
                                                        </li>
                                                        <li>
                                                            <button type="submit" class="close-req"><i
                                                                        class="fa fa-close"></i></button>
                                                        </li>
                                                    </ul>
                                                </div><!--accept-feat end-->
                                            </div><!--request-detailse end-->
                                        </div><!--requests-list end-->
                                    </div><!--acc-setting end-->
                                </div>
                                <div class="tab-pane fade" id="privacy" role="tabpanel" aria-labelledby="nav-privacy-tab">
                                    <div class="privac">
                                        <div class="row">
                                            <div class="col-12">
                                                <h3>Privacy</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="dropdown privacydropd">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Who can see
                                                        your email address</a>
                                                    <div class="dropdown-menu">
                                                        <p>Choose who can see your email address on your profile</p>
                                                        <div class="row">
                                                            <div class="col-md-9 col-sm-12">
                                                                <form class="radio-form">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                               id="customCheck1">
                                                                        <label class="custom-control-label"
                                                                               for="customCheck1">Everyone</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                               id="customCheck2">
                                                                        <label class="custom-control-label"
                                                                               for="customCheck2">Friends</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                               id="customCheck3">
                                                                        <label class="custom-control-label"
                                                                               for="customCheck3">Only Me</label>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <p style="float: right;">Everyone</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="dropdown privacydropd">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Who can see
                                                        your Friends</a>
                                                    <div class="dropdown-menu">
                                                        <p>Choose who can see your list of connections</p>
                                                        <div class="row">
                                                            <div class="col-md-9 col-sm-12">
                                                                <form class="radio-form">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                               id="customCheck4">
                                                                        <label class="custom-control-label"
                                                                               for="customCheck4">Everyone</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                               id="customCheck5">
                                                                        <label class="custom-control-label"
                                                                               for="customCheck5">Friends</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                               id="customCheck6">
                                                                        <label class="custom-control-label"
                                                                               for="customCheck6">Only Me</label>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <p style="float: right;">Everyone</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="dropdown privacydropd">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage who
                                                        can discover your profile from your email address</a>
                                                    <div class="dropdown-menu">
                                                        <p>Choose who can discover your profile if they are not connected to
                                                            you but have your email address</p>
                                                        <div class="row">
                                                            <div class="col-md-9 col-sm-12">
                                                                <form class="radio-form">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                               id="customCheck7">
                                                                        <label class="custom-control-label"
                                                                               for="customCheck7">Everyone</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                               id="customCheck8">
                                                                        <label class="custom-control-label"
                                                                               for="customCheck8">Friends</label>
                                                                    </div>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                               id="customCheck9">
                                                                        <label class="custom-control-label"
                                                                               for="customCheck9">Only Me</label>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="col-md-3 col-sm-12">
                                                                <p style="float: right;">Everyone</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="dropdown privacydropd">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Search
                                                        history</a>
                                                    <div class="dropdown-menu">
                                                        <p>Clear all previous searches performed on PikPok</p>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <form class="radio-form">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input"
                                                                               id="customCheck10">
                                                                        <label class="custom-control-label"
                                                                               for="customCheck10">Clear All History</label>
                                                                    </div>
                                                                </form>
                                                                <div class="privabtns">
                                                                    <a href="#">Clear All History</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="dropdown privacydropd">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Making your
                                                        profile visible</a>
                                                    <div class="dropdown-menu">
                                                        <p>Profile Visibility</p>
                                                        <div class="row">
                                                            <div class="col-md-9 col-sm-12">
                                                                <form class="radio-form">
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="customRadio5"
                                                                               name="customRadio"
                                                                               class="custom-control-input">
                                                                        <label class="custom-control-label"
                                                                               for="customRadio5">Public</label>
                                                                    </div>
                                                                    <div class="custom-control custom-radio">
                                                                        <input type="radio" id="customRadio6"
                                                                               name="customRadio"
                                                                               class="custom-control-input">
                                                                        <label class="custom-control-label"
                                                                               for="customRadio6">Private</label>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="privabtns">
                                                    <a href="#">Save</a>
                                                    <a href="#">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-deactivate" role="tabpanel"
                                     aria-labelledby="nav-deactivate-tab">
                                    <div class="acc-setting">
                                        <h3>Delete Account</h3>
                                        <form>
                                            <div class="cp-field">
                                                <h5>Username</h5>
                                                <div class="cpp-fiel">
                                                    <input type="text" name="username" placeholder="Username">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Password</h5>
                                                <div class="cpp-fiel">
                                                    <input type="password" name="password" placeholder="Password">
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                            </div>
                                            <div class="cp-field">
                                                <h5>Please Explain Further</h5>
                                                <textarea></textarea>
                                            </div>
                                            <div class="cp-field">
                                                <div class="fgt-sec">
                                                    <input type="checkbox" name="cc" id="c4">
                                                    <label for="c4">
                                                        <span></span>
                                                    </label>
                                                    <small>Email option out</small>
                                                </div>
                                                <p>Your profile will be permanently deleted and your name and photos may be
                                                    removed from many things you've shared or posted. You'll not be able to
                                                    continue using Pik-Pok with that account.</p>
                                            </div>
                                            <div class="save-stngs pd3">
                                                <ul>
                                                    <li>
                                                        <button type="submit">Save Setting</button>
                                                    </li>
                                                    <li>
                                                        <button type="submit">Restore Setting</button>
                                                    </li>
                                                </ul>
                                            </div><!--save-stngs end-->
                                        </form>
                                    </div><!--acc-setting end-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--account-tabs-setting end-->
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
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script>
        /* make clear button onclick to clear and not submit the form */
        $("#clear").click(function (event) {
            event.preventDefault(); //prevent submiting the form
            document.getElementById('change_password-form').reset(); //clear form
        });
    </script>

    <script>
        /* Passwords do not match functionality */
        var check = function () { //check passwords if are the same
            if (document.getElementById('new_password').value ==
                document.getElementById('repeat_password').value) {
                document.getElementById('message').innerHTML = null;
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Passwords do not match';
            }
        }

        function validatePass() {
            if (document.getElementById('message').innerHTML == 'Passwords do not match') {
                alert("Passwords do not match");
                event.preventDefault();
            }
        }
    </script>
</body>
</html>