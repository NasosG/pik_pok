<?php
include('db/auth.php'); //include auth.php file on all secure pages
require('db/db.php');
require('db/error_functions.php');
require('db/utility_functions.php');

// this whole page is under construction and testing

if (!isset($_SESSION['username'])) {
    header('location:index.php');
}

$uname = ($_SESSION['username']);

// fetch some users for testing purposes
$query_users = "SELECT * FROM members WHERE username <> '$uname' LIMIT 7";
$result_users = mysqli_query($con, $query_users);


if (isset($_GET['receiver_id'])) {
    // check if id exists or path id has been changed manually
    if (receiverIdNotExists($con, $_GET['receiver_id']))
        header('location:messages.php');
    $receiver_id = $_REQUEST['receiver_id'];
}
$query_uid = mysqli_query($con, "SELECT id FROM members WHERE username = '$uname' LIMIT 1");
$row_uid = mysqli_fetch_array($query_uid);
$sender_id = $row_uid[0];

$query_sender_rows = mysqli_query($con, "SELECT * FROM members WHERE id='$sender_id'");
$sender_row = mysqli_fetch_array($query_sender_rows);

$row_uid = mysqli_fetch_array($query_uid);

$query_requests = "SELECT * FROM members, relationship
   WHERE (relationship.user_one_id = '$sender_id' OR relationship.user_two_id = '$sender_id') AND relationship.status = '1' 
    AND members.username <> '$uname' AND (members.id = relationship.user_one_id OR members.id = relationship.user_two_id)";

$result_users = mysqli_query($con, $query_requests);

$no_friends = mysqli_num_rows($result_users) == 0;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Messages - Pik Pok</title>
    <?php include_once('./includes/head_scrollbar.php'); ?>
</head>

<body>
    <div class="wrapper">

        <?php
        // include header for all web pages
        include_once('./includes/header.php');
        ?>

        <section class="messages-page">
            <div class="container">
                <div class="messages-sec">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 no-pdd">
                            <div class="msgs-list">
                                <div class="msg-title">
                                    <h3>Messaging</h3>
                                    <ul>
                                        <li><a href="#" title=""><i class="fa fa-cog"></i></a></li>
                                        <li><a href="#" title=""><i class="fa fa-ellipsis-v"></i></a></li>
                                    </ul>
                                </div><!--msg-title end-->
                                <form action="messages.php" action="get" id="k">
                                    <div class="messages-list">
                                        <ul>
                                            <?php
                                            while ($row_users = mysqli_fetch_array($result_users)) {

                                                if (!isset($receiver_id))
                                                    $receiver_id = $row_users['id'];

                                                $current_user_id = $row_users['id'];

                                                $query_receiver_rows = mysqli_query($con, "SELECT * FROM members WHERE id='$receiver_id'");
                                                $receiver_row = mysqli_fetch_array($query_receiver_rows);

                                                $query_get_time = mysqli_query($con, "SELECT time_sent FROM chat_message WHERE by_user_id='$current_user_id' OR to_user_id='$current_user_id' ORDER BY chat_message_id DESC LIMIT 1;");
                                                $last_message_time = mysqli_fetch_array($query_get_time);

                                                if (empty($last_message_time))
                                                    $time_sent = '<i class="fas fa-paper-plane"></i>';
                                                else $time_sent = date("g:i a", strtotime($last_message_time[0]));

                                                echo '
                                                <a onclick="userDetails(' . $row_users['id'] . ');" href="messages.php?receiver_id=' . $row_users['id'] . '">
                                                <li class="btns';

                                                if ($receiver_id == $row_users['id']) echo ' active"';

                                                echo ' onclick="userDetails(' . $row_users['id'] . ');">
                                                    <div class="usr-msg-details">
                                                        <div class="usr-ms-img">
                                                            <img style="width:50px; height:50px;" src="' . $row_users['picture_path'] . $row_users['profile_pic'] . '" alt="users photo"/>
                                                            <span class="msg-status"></span>
                                                        </div>
                                                        <div class="usr-mg-info">
                                                            <h3 id="flname">' . $row_users['fname'] . " " . $row_users['lname'] . '</h3>
                                                            <!--<p>Lorem ipsum carbon random...</p>-->
                                                        </div><!--usr-mg-info end-->
                                                                           
                                                        <span class="posted_time text-uppercase">' . $time_sent . '</span>
                                                        <!--<span class="msg-notifc">1</span>-->
                                                    </div><!--usr-msg-details end-->
                                                </li></a>
                                                ';
                                            } ?>
                                        </ul>
                                    </div><!--messages-list end-->
                                </form>
                            </div><!--msgs-list end-->
                        </div>
                        <div class="col-lg-8 col-md-12 pd-right-none pd-left-none">
                            <div class="main-conversation-box">
                                <div class="message-bar-head">
                                    <div class="usr-msg-details">
                                        <?php
                                        if ($no_friends) {
                                            echo '<p style="font-size:24px; min-height:50px;">No friends to chat yet <i class="far fa-frown"></i></p>';
                                            exit();
                                        } ?>
                                        <div class="usr-ms-img">
                                        <?php
                                            echo '<img id="chat-upper-image" src="' . $receiver_row['picture_path'] . $receiver_row['profile_pic'] . '" alt="users photo"/>';
                                        ?>
                                        </div>
                                        <div class="usr-mg-info">
                                        <?php
                                            echo '<h3 id="chat-upper-name">' . $receiver_row['fname'] . ' ' . $receiver_row['lname'] . '</h3>';
                                        ?>
                                            <p id="message-user-status" class="capitalize-first-letter"><?php echo $receiver_row['status'];?></p>
                                        </div><!--usr-mg-info end-->
                                    </div>
                                    <a href="#" title=""><i class="fa fa-ellipsis-v"></i></a>
                                </div><!--message-bar-head end-->

                                <div id="messages-line" class="messages-line" style="margin-top:100px;">
                                    <div id="messages-main-body">
                                    <?php
                                    $query_show_messages = mysqli_query($con, "SELECT * FROM chat_message WHERE (by_user_id='$sender_id' OR to_user_id='$sender_id') AND (by_user_id='$receiver_id' OR to_user_id='$receiver_id') ");
                                    $num = mysqli_num_rows($query_show_messages);

                                    while ($row_show_messages = mysqli_fetch_array($query_show_messages)) {
                                        if ($row_show_messages['by_user_id'] == $sender_id)
                                            echo '
                                            <div class="main-message-box st3">
                                                <div class="message-dt st3">
                                                    <div class="message-inner-dt">
                                                        <p>' . $row_show_messages['message'] . '</p>
                                                    </div><!--message-inner-dt end-->
                                                    <span>' . date("F j, Y, g:i a", strtotime($row_show_messages['time_sent'])) . '</span>
                                                </div><!--message-dt end-->
                                                <div class="messg-usr-img">
                                                    <img src="' . $sender_row['picture_path'] . $sender_row['profile_pic'] . '" alt="users photo"/>
                                                </div><!--messg-usr-img end-->
                                            </div><!--main-message-box end--> ';
                                        else
                                            echo '
                                            <div class="main-message-box ta-right">
                                                <div class="message-dt">
                                                    <div class="message-inner-dt message-inner-dt2">
                                                        <p>' . $row_show_messages['message'] . '</p>
                                                    </div><!--message-inner-dt end-->
                                                    <span>' . date("F j, Y, g:i a", strtotime($row_show_messages['time_sent'])) . '</span>
                                                </div><!--message-dt end-->
                                                <div class="messg-usr-img">
                                                    <img src="' . $receiver_row['picture_path'] . $receiver_row['profile_pic'] . '" alt="users photo"/>
                                                </div><!--messg-usr-img end-->
                                            </div><!--main-message-box end-->';
                                    }
                                    ?>
                                    </div>
                                </div><!--messages-line end-->

                                <div class="message-send-area">
                                    <form id="chat-form" name="chat-form">
                                        <div class="mf-field">
                                            <input type="text" id="message-text" name="message"
                                                   placeholder="Type a message here">
                                            <button id="message-submit" type="submit">Send</button>
                                        </div>
                                        <ul>
                                            <li><a href="#" title=""><i class="fa fa-smile-o"></i></a></li>
                                            <li><a href="#" title=""><i class="fa fa-camera"></i></a></li>
                                            <li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
                                        </ul>
                                    </form>
                                </div><!--message-send-area end-->
                            </div><!--main-conversation-box end-->
                        </div>
                    </div>
                </div><!--messages-sec end-->
            </div>
        </section><!--messages-page end-->

        <footer>
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
    <script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
    <script type="text/javascript" src="js/scrollbar.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script>
        var form = $('#chat-form');

        function textIsEmpty() {
            return document.getElementById("message-text").value.trim() === '';
        }

        form.submit(function (e) {
            e.preventDefault();

            if (textIsEmpty()) return;

            var message = $('#message-text').val();
            let by_user_id = <?php echo $sender_id ?>;
            let to_user_id = <?php echo $receiver_id ?>;
            $.ajax({
                type: 'POST',
                url: 'db/insert_chat_message.php',
                data: {
                    by_user_id: by_user_id,
                    to_user_id: to_user_id,
                    message: message
                },
                success: function (data) {
                    $.ajax({
                        type: 'GET',
                        url: 'generate_messages.php',
                        data: {
                            sender_id: by_user_id,
                            receiver_id: to_user_id,
                        },
                        success: function (data) {
                            $("#messages-main-body").html(data);
                            $('.demo-yx').mCustomScrollbar('scrollTo',['bottom','right']);
                            $('#message-text').val("");
                        }
                    });
                    //location.reload();
                }
            });
        });

        // window.onbeforeunload = function () {
        //     localStorage.setItem("message", $('#message-text').val());
        // }
        //
        // window.onload = function () {
        //     var message = localStorage.getItem("message");
        //     if (message !== null) $('#message-text').val(message);
        // }

        $(document).ready(function () {
            $('#message-text').focus();
        });

        // setTimeout(function () {
        //     window.location.reload(1);
        // }, 10000);

        setInterval(function () {
            let by_user_id = <?php echo $sender_id ?>;
            let to_user_id = <?php echo $receiver_id ?>;
            $.ajax({
                type: 'GET',
                url: 'generate_messages.php',
                data: {
                    sender_id: by_user_id,
                    receiver_id: to_user_id,
                },
                success: function (data) {
                    $("#messages-main-body").html(data);
                    //$('.demo-yx').mCustomScrollbar('scrollTo',['bottom','right']);
                }
            });
        }, 5000);

        function scrollTextArea() {
            const wholeArea = document.getElementsByClassName('messages-page');
            wholeArea.scrollTop = wholeArea.scrollHeight;
        }
        scrollTextArea();

    </script>
</body>
</html>