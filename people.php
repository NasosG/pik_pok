<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/error_functions.php');

mysqli_set_charset($con, "utf8");

if (!isset($_SESSION['username'])) {
    header('location:index.php');
}
else {
    $uname = $_SESSION['username'];
    // find user id from session name
    $query2 = "SELECT id FROM members WHERE username = '$uname'";
    $result2 = mysqli_query($con, $query2);
    $row = mysqli_fetch_array($result2);
    $user_id = $row['id'];
}

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $query = "SELECT *
				FROM members 
				WHERE fname LIKE '%{$search}%'
				OR lname LIKE '%{$search}%'";
}
else {
    $query = "SELECT * FROM members WHERE username <> '$uname'"; //mporoume na kanoume order by date alla kai to id petuxainei ton skopo kai den xreiazetai na kratame kai thn wra sthn bash alla mono hmeromhnia
}

$result = mysqli_query($con, $query);

$query_requests = "SELECT * FROM relationship
  WHERE (user_one_id = '$user_id' OR user_two_id = '$user_id')
  AND status = 0
  AND action_user_id <> '$user_id'";


$result_requests = mysqli_query($con, $query_requests);

function check_friendship_status($con, $user_id, $user2_id)
{
    $query_friends_status = "SELECT * FROM relationship
	  WHERE ((user_one_id = '$user_id' AND user_two_id = '$user2_id')
	  OR (user_one_id = '$user2_id'AND user_two_id = '$user_id'))
	  AND (status = 1)";

    return mysqli_query($con, $query_friends_status);
}

?>

<!DOCTYPE html>
<html>
<head>

    <title>Home - Pik Pok</title>
    <?php include_once('./includes/head.php'); ?>

    <style>
        .add-friend-but {
            border: 1px solid #CFCFD1;
            background-color: #F5F4F7;
            color: #55595E !important;
        }

        .add-friend-but:hover {
            background-color: #FCFCFC;

        }
    </style>
</head>

<body>
    <div class="wrapper">

        <?php
        // include header for all web pages
        include_once('./includes/header.php');
        ?>

        <section class="col-12 col-lg-2 col-md-12 col-sm-12 companies-info">
            <div class="container">
                <div class="companies-list">
                    <div class="row">
                        <div class="tab-pane ">
                            <div class="acc-setting">
                                <h3>Friend Requests</h3>
                                <div class="requests-list">
                                    <?php
                                    if (mysqli_num_rows($result_requests) == 0)
                                        echo '
                                        <div class="request-details">
                                            <div class="request-info">
                                                <h3>No friend requests</h3>
                                            </div>
                                        </div>';
                                    while ($row = mysqli_fetch_array($result_requests)) {
                                        $uID = $row['user_one_id'];
                                        $result_user_requested = mysqli_query($con, "SELECT * FROM members WHERE id = '$uID'");
                                        $row_user_requested = mysqli_fetch_array($result_user_requested);
                                        echo '
                                        <div class="request-details">
                                            <div class="noty-user-img">
                                                <img src="' . $row_user_requested['picture_path'] . $row_user_requested['profile_pic'] . '" alt = "friend request photo"/>
                                            </div>
                                            <div class="request-info">
                                                <h3>' . $row_user_requested['fname'] . ' ' . $row_user_requested['lname'] . '</h3>
                                            </div>
                                            <div class="accept-feat">
                                                <ul>
                                                    <li>
                                                        <button type="submit" id="accept-request" onclick="manageRequest(' . $row_user_requested['id'] . ', 1);" class="accept-req"><i class="fa fa-check"></i></button>
                                                    </li>
                                                    <li>
                                                        <button type="submit" id="decline-request" onclick="manageRequest(' . $row_user_requested['id'] . ', 2);" class="close-req"><i class="fa fa-close"></i></button>
                                                    </li>
                                                </ul>
                                            </div><!--accept-feat end-->
                                        </div><!--request-details end-->
                                        ';
                                    } ?>
                                </div><!--requests-list end-->
                            </div><!--acc-setting end-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="col-12 col-lg-8 col-md-12 col-sm-12 companies-info">
            <div class="container">
                <div class="company-title">
                    <h3>Find People</h3>
                </div>
                <div class="companies-list">
                    <div class="row">
                        <?php
                        while ($row = mysqli_fetch_array($result)) {

                            echo '	
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">						
                                <div>
                                <form id="people-form" class="people-form likes-comments-form company_profile_info" name="people-form" method="post" action="db/add_friend.php" >
                                    <div class="company-up-info">
                                        ';
                            echo '<a href="other_users_profile.php?photo_username=' . $row['username'] . '">';

                            echo '<h3 class="">' . $row['fname'] . ' ' . $row['lname'] . '</h3>
                                        <img src="' . $row['picture_path'] . $row['profile_pic'] . '" alt="user photo" />
                                        <input type="hidden" name="id" id="id" value="' . $row['id'] . '"/>
                                        
                                        </a>
                                        
                                        <ul class="pl-2">
                                        ';
                            if ((mysqli_num_rows(check_friendship_status($con, $user_id, $row['id'])) == 0))
                                echo '
                                            <li><button id="friend-request" onclick="sendRequest();" style="all:inherit;cursor:pointer"><a id="request-link" title="" class="add-friend-but"><i style="font-size:16px;top: 0;" class="fa fa-user-plus"></i> <span style="font-weight:600;">Add Friend</span></a></button></li>
                                            ';
                            else echo '
                                            <li><p id="friend-request style="all:inherit;cursor:pointer"><a id="request-link" title="" class="add-friend-but"><i style="font-size:16px;top: 0;" class="fas fa-check"></i> <span style="font-weight:600;">You are friends</span></a></p></li>
                                        ';
                            echo '
                                        </ul>
                                    </div>
                                </form>
                                </div>
                            </div>
                            ';
                        }
                        ?>
                    </div>
                </div>

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
                        <li><a href="community_guidelines.php" title="">Community Guidelines</a></li>
                        <li><a href="terms_of_use.php" title="">Terms of Use</a></li>
                        <li><a href="#" title="">Language: English</a></li>
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
    <script>
        var form = $(".people-form");

        // button listeners
        $('#friend-request').on('click', function () {
            this.submit();
        });

        function manageRequest(id, accepted) {
            var values = {
                'id': id,
                'accepted': accepted
            };
            $.ajax({
                type: "POST",
                url: 'db/manage_friend_request.php',
                data: values,
                success: function (data) {
                    location.reload();
                    //alert("saved");
                }
            });
        }

        // forms' submission with ajax
        form.submit(function (e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var url = form.attr('action');

            $.ajax({
                type: "POST",
                url: 'db/add_friend.php',
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    location.reload();
                    // $(form).children("#request-link").html(" Likes: <img src='images/likes.png' alt='' height='18' width='18'>" + data + "</img>");
                    alert(data);
                }
            });
        });

    </script>
</body>
</html>