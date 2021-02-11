<?php
require('db.php');
require('error_functions.php');
require('IP_MAC_addresses.php');

// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])) {
    $username = stripslashes($_REQUEST['username']); // removes backslashes
    $username = filter_var($username, FILTER_SANITIZE_STRING); // sanitize username data
    $username = mysqli_real_escape_string($con, $username); //escapes special characters in a string

    $email = stripslashes($_REQUEST['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitize email
    $email = mysqli_real_escape_string($con, $email);

    ///////////////////////////////////////////////////////

    $query = "SELECT * FROM members WHERE username ='$username'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        echo ' Database Error Occured ';
    }

    //////////////////////////////////////////////////////

    $query = "SELECT * FROM members WHERE email ='$email'";
    $result2 = mysqli_query($con, $query);
    if (!$result2) {
        echo ' Database Error Occured ';
    }

    /////////////////////////////////////////////////////

    //if username exists
    if (mysqli_num_rows($result) > 0) ChangeUsername();

    //if email exists
    else if (mysqli_num_rows($result2) > 0) ChangeEmail();

    else {
        $password = stripslashes($_REQUEST['psw']);
        // sanitize password
        //$password = filter_var($password, FILTER_SANITIZE_STRING);
        $password = mysqli_real_escape_string($con, $password);

        $fname = stripslashes($_REQUEST['fname']);
        // sanitize fname
        $fname = filter_var($fname, FILTER_SANITIZE_STRING);
        $fname = mysqli_real_escape_string($con, $fname);

        $surname = stripslashes($_REQUEST['lname']);
        // sanitize surname
        $surname = filter_var($surname, FILTER_SANITIZE_STRING);
        $surname = mysqli_real_escape_string($con, $surname);

        $sex = stripslashes($_REQUEST['sex']);
        $sex = mysqli_real_escape_string($con, $sex);
        $sex = (int)$sex;

        $date_of_birth = stripslashes($_REQUEST['date_of_birth']);
        $date_of_birth = mysqli_real_escape_string($con, $date_of_birth);

        $profile_picture = 'default-avatar.jpg';
        $picture_path = 'images/';
        $status = 'online';

        $RegDate = date("Y-m-d H:i:s");
        mysqli_set_charset($con, "utf8");

        $query = "INSERT INTO members(username, password, fname, lname, email, date_of_registration, sex, date_of_birth, profile_pic, picture_path, bio, status) 
			VALUES ('$username','" . hash('sha256', $password) . "','$fname','$surname','$email','$RegDate', '$sex', '$date_of_birth', '$profile_picture', '$picture_path', NULL, '$status')";

        $result = mysqli_query($con, $query);

        if ($result) {
            session_start();
            $_SESSION['username'] = $username;

            $ua = getBrowser();
            $ua_browser = $ua['name'];
            //$ua_version = $ua['version'] ;
            $ua_OS = $ua['platform'];
            $is_mobile = $ua['is_mobile'];

            $query_ip_mac = "INSERT INTO ip_mac_addresses(IP_address, mac_address, user_name, login_date, mobile, OS, browser) 
			VALUES ('$IP','$MAC','$username','$RegDate', '$is_mobile', '$ua_OS', '$ua_browser')";
            $result = mysqli_query($con, $query_ip_mac);

            if ($result)
                header("Location: ../addAvatar.php");
        }
        else {
            generalError();
        }
    }
}
else {
    generalError();
}
?>
