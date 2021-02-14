<?php
require('db.php');
include('auth.php'); //include auth.php file on all secure pages

$data = array();
$uname = $_SESSION['username'];
$time_sent = date("Y-m-d H:i:s");

if (isset($_POST['message'])) {
    $message_text = $_POST['message'];

    $by_user_id = $_POST['by_user_id'];
    $to_user_id = $_POST['to_user_id'];
    mysqli_set_charset($con, "utf8mb4");
    $query = "INSERT INTO chat_message (by_user_id, to_user_id, message, time_sent, status) VALUES ('$by_user_id', '$to_user_id', '$message_text', '$time_sent', 'unread') ";
    $result = mysqli_query($con, $query);

    // return all our data to an AJAX call
    $data['success'] = true;
    $data['message'] = $message_text;
    echo $message_text;
}

?>