<?php
require('db.php');
include('auth.php'); //include auth.php file on all secure pages

$data = array();
$uname = $_SESSION['username'];
$time_saved = date("Y-m-d H:i:s");

function isSaved($con, $post_id) {
    $query_count_saves = mysqli_query($con, "SELECT * FROM saved_posts WHERE post_id = $post_id");
    return (mysqli_num_rows($query_count_saves) > 0);
}

if (isset($_POST['photo_id']) && (!isSaved($con, $_POST['photo_id']))) {
    $post_id = $_POST['photo_id'];
    // find user id from session name
    $query = "SELECT id FROM members WHERE username = '$uname'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $user_id = $row['id'];

    mysqli_set_charset($con, "utf8");
    $query = "INSERT INTO saved_posts (user_id, post_id, time_saved) VALUES ('$user_id', '$post_id', '$time_saved')";
    $result = mysqli_query($con, $query);
}

?>