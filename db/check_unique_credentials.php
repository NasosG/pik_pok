<?php
require('db.php');
require('error_functions.php');
require('security_functions.php');

if (isset($_REQUEST['username']) || isset($_REQUEST['email'])) {

    $taken = false;

    if (isset($_REQUEST['username'])) {
        // removes backslashes, sanitize and escape special characters
        $username = sanitizeString($con, $_REQUEST['username']);

        $query = "SELECT * FROM members WHERE username ='$username'";
        $result = mysqli_query($con, $query);

        if (!$result) {
            echo ' Database Error Occured ';
            exit();
        }
        else if (mysqli_num_rows($result) > 0) $taken = true;
    }

    if (isset($_REQUEST['email'])) {
        $email = sanitizeEmail($con, $_REQUEST['email']);

        $query = "SELECT * FROM members WHERE email ='$email'";
        $result2 = mysqli_query($con, $query);

        if (!$result2) {
            echo ' Database Error Occured ';
            exit();
        }
        //if email exists
        else if (mysqli_num_rows($result2) > 0) $taken = true;
    }

    //if username or email already exist
    if (/*username or password is*/ $taken) {
        echo "taken";
        exit();
    }
}
