<?php
require('db.php');
require('utility_functions.php');
include('auth.php'); //include auth.php file on all secure pages

if (!isset($_POST['id'])) die("id is not set");

$user_two_id = $_POST['id'];
$username = $_SESSION['username'];
$user_one_id = getUsersID($con, $username);
$status = 0; //0 means request pending

mysqli_set_charset($con, "utf8mb4");
$query = "INSERT INTO relationship (user_one_id, user_two_id, status, action_user_id) VALUES ('$user_one_id', '$user_two_id', '$status', '$user_one_id')";
$result = mysqli_query($con, $query);

$success_text = 'Request Sent';
// return all our data to an AJAX call
$data['success'] = true;
$data['message'] = $success_text;
echo $success_text;
