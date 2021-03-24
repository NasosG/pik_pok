<?php
include('auth.php'); //include auth.php file on all secure pages
require('db.php');
require('error_functions.php');
require('utility_functions.php');

$username = $_SESSION['username'];

// If form submitted, get the old/new password 
if (isset($_POST['old_password'])) {
    $old_password = mysqli_real_escape_string($con, $_REQUEST['old_password']); //escapes special characters in a string
    $new_password = mysqli_real_escape_string($con, $_REQUEST['new_password']);
    $repeat_password = mysqli_real_escape_string($con, $_REQUEST['repeat_password']);

    if ($repeat_password != $new_password) {
        exit ('wrong password');
    }

    $new_password = hash('sha256', $new_password);
    $old_password = hash('sha256', $old_password);

    //Checking if user exists in the database or not
    if (userAlreadyExists($username, $old_password, $con)) {
        $query = "UPDATE members
        SET password = '$new_password'
        WHERE username= '$username' AND password='$old_password'";
        $result = mysqli_query($con, $query);

        if (!empty($_SERVER['HTTP_REFERER']))
            header("Location: " . $_SERVER['HTTP_REFERER']);
        else echo "No referrer.";
    }
    else invalidCredentials();
}
else generalError();
