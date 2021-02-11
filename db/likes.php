<?php
require('db.php');
include("auth.php"); //include auth.php file on all secure pages 
// ajax data
$data = array();
// variables
$uname = $_SESSION['username'];
$photo_id = $_POST['photo_id'];

// the time the image was posted
$time_posted = date("Y-m-d H:i:s");

// find user id from session name
$query = "SELECT id FROM members WHERE username = '$uname'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$user_id = $row['id'];

mysqli_set_charset($con, "utf8");
$query = "SELECT * FROM images WHERE photo_id='$photo_id'";

$result = mysqli_query($con, $query);

$row = mysqli_fetch_array($result);
$photo_likes = $row['photo_likes'];

// like +-1
// check the photo_likes table to find whether a user has liked the post or not
$query = "SELECT * FROM post_likes WHERE liked_by_user = '$user_id' AND posted_photo_id = '$photo_id'";
$result = mysqli_query($con, $query);

if (!mysqli_num_rows($result)) {
    $photo_likes++;

    $query = "INSERT INTO post_likes(liked_by_user, posted_photo_id, time)
	VALUES ('$user_id',$photo_id,'$time_posted')";

    $result = mysqli_query($con, $query);

    if (!$result) echo "error occurred";
}
else {
    $photo_likes--;

    $query = "DELETE FROM post_likes WHERE liked_by_user = '$user_id' AND posted_photo_id = '$photo_id'";

    $result = mysqli_query($con, $query);

    if (!$result) echo "error occurred";
}

mysqli_set_charset($con, "utf8");

//update likes in images table
$query = "UPDATE images SET photo_likes='$photo_likes' WHERE photo_id='$photo_id'";
$result = mysqli_query($con, $query);

//close the connection
mysqli_close($con);
// return all our data to an AJAX call
$data['success'] = true;
$data['message'] = $photo_likes;
echo $photo_likes;

?>