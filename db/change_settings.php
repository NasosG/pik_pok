<?php
include('auth.php'); //include auth.php file on all secure pages
require('db.php');
require('error_functions.php');
require('security_functions.php');

$username = $_SESSION['username'];
$username_changed = false;

if (isSetAndNotEmpty($_REQUEST['fname'])) {
    // sanitize input and escape special characters
    $firstname = sanitizeString($con, $_REQUEST['fname']);

    $query = "UPDATE members
              SET fname = '$firstname'
              WHERE username = '$username'";

}
else if (isSetAndNotEmpty($_REQUEST['lname'])) {
    $lastname = sanitizeString($con, $_REQUEST['lname']);

    $query = "UPDATE members
              SET lname = '$lastname'
              WHERE username = '$username'";

}
else if (isSetAndNotEmpty($_REQUEST['username'])) {
    $new_username = sanitizeString($con, $_REQUEST['username']);

    // check if this username already exists in the database
    $query = "SELECT * FROM members WHERE username ='$new_username'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        exit('Database Error Occured');
    }

    if (mysqli_num_rows($result) > 0) {
        ChangeUsernameSettings();
        exit();
    }

    $query = "UPDATE members
              SET username = '$new_username'
              WHERE username = '$username'";

    // set session's username to the new username value
    $_SESSION['username'] = $new_username;
    $username_changed = true;
}
else if (isSetAndNotEmpty($_REQUEST['email'])) {
    $email = sanitizeEmail($con, $_REQUEST['email']); // sanitize email

    // check if this email already exists in the database
    $query = "SELECT * FROM members WHERE email ='$email'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        exit(' Database Error Occured ');
    }

    if (mysqli_num_rows($result) > 0) {
        ChangeEmailSettings();
        exit();
    }

    $query = "UPDATE members
              SET email = '$email'
              WHERE username = '$username'";

}
else if (isSetAndNotEmpty($_REQUEST['bio'])) {
    $bio = sanitizeString($_REQUEST['bio']);

    $query = "UPDATE members
              SET bio = '$bio'
              WHERE username = '$username'";

}
else if (isSetAndNotEmpty($_REQUEST['bdate'])) {
    $date_of_birth = $_REQUEST['bdate'];
    $date_of_birth = stripslashes($date_of_birth); // removes backslashes
    $date_of_birth = preg_replace("([^0-9/])", "", $date_of_birth); // removes everything except digits (0-9) and forward slash (/).

    $query = "UPDATE members
              SET date_of_birth = '$date_of_birth'
              WHERE username = '$username'";

}
else {
    echo 'Your input was wrong. Please try again!';
    // go back (if there is a referer)
    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
    else echo "No referrer.";
}

$result = mysqli_query($con, $query);
if ($result) {
    if ($username_changed) {
        $query_change_image_username = "UPDATE images SET username = '$new_username' WHERE username = '$username'";
        $result_change_image_username = mysqli_query($con, $query_change_image_username);
    }
    echo "value changed";
    // go back (if there is a referer)
    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
    else echo "No referrer.";
}
