<?php
require('db.php');
require('error_functions.php');
require('utility_functions.php');
require('auth.php');

$username = $_POST['username'];
$password = $_POST['password'];

$trueUsername = $_SESSION['username'];
$userId = getUsersID($con, $trueUsername);
//$query = "DELETE FROM members WHERE id = '$userId'";
//$result = mysqli_query($con, $query);
echo $username.'   '.$password;
//if ($result) {
//    $query_delete_user_posts= "DELETE FROM images WHERE username = '$trueUsername'";
//    $result_delete_user_posts = mysqli_query($con, $query_delete_user_posts);
//    mysqli_close($con);
//}
//// unset the session before logout
//if (session_destroy()) {
//    $username = $_SESSION['username'];
//    header("Location: ../index.php"); // Redirect to Home page
//}
//else echo "session unset not successful";
