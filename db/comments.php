<?php
require('db.php');
include('auth.php'); //include auth.php file on all secure pages

$data = array();
$uname = $_SESSION['username'];
$comment_date = date("Y-m-d H:i:s");

// If the user clicked submit on comment form...
if (isset($_POST['comment-text'])) {
    $comment_text = $_POST['comment-text'];

    // find user id from session name
    $query = "SELECT id FROM members WHERE username = '$uname'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $user_id = $row['id'];
    $photo_id = $_POST['photo_id'];
    mysqli_set_charset($con, "utf8mb4");
    $query = "INSERT INTO post_comments (post_id , user_id, comment_text, time_commented) VALUES ('$photo_id', '$user_id', '$comment_text', '$comment_date') ";
    $result = mysqli_query($con, $query);

    // return all our data to an AJAX call
    $data['success'] = true;
    $data['message'] = $comment_text;
    echo $comment_text;

}
// If the user clicked submit on reply form...
else if (isset($_POST['reply-text'])) {
    $post_id = $_POST['post_id'];
    $comment_text = $_POST['reply-text'];

    // find user id from session name
    $query = "SELECT id FROM members WHERE username = '$uname'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $user_id = $row['id'];
    mysqli_set_charset($con, "utf8mb4");
    $query = "INSERT INTO comment_replies (comment_id, user_id, comment_text, time_commented) VALUES ('$post_id', '$user_id', '$comment_text', '$comment_date') ";
    $result = mysqli_query($con, $query);

    // return all our data to an AJAX call
    $data['success'] = true;
    $data['message'] = $comment_text;
    echo $comment_text;
}
