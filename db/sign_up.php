<?php
require('db.php');
require('error_functions.php');
require('security_functions.php');
require('IP_MAC_addresses.php');

if (!isset($_REQUEST['username'])) generalError();
// else if form submitted, insert values into the database.
else {
    $username = sanitizeString($con, $_REQUEST['username']); // sanitize username data
    $email = sanitizeEmail($con, $_REQUEST['email']); // sanitize email

    $query = "SELECT * FROM members WHERE username ='$username'";
    $username_found_result = mysqli_query($con, $query);
    if (!$username_found_result)
        displayDatabaseError(); // Database error occurred

    $query = "SELECT * FROM members WHERE email ='$email'";
    $email_found_result = mysqli_query($con, $query);
    if (!$email_found_result)
        displayDatabaseError();

    // check if username and email already exist
    if (mysqli_num_rows($username_found_result) > 0) ChangeUsername();
    else if (mysqli_num_rows($email_found_result) > 0) ChangeEmail();
    // else if all went ok and username and email are unique
    else {
        // filter password
        $password = sanitizePassword($con, $_REQUEST['psw']);
        // sanitize first name
        $first_name = sanitizeString($con, $_REQUEST['fname']);
        // sanitize surname
        $surname = sanitizeString($con, $_REQUEST['lname']);
        $sex = removeSpecialCharacters($con, $_REQUEST['sex']);
        $sex = (int)$sex;
        $date_of_birth = removeSpecialCharacters($con, $_REQUEST['date_of_birth']);

        $profile_picture = 'default-avatar.jpg';
        $picture_path = 'images/';
        $status = 'online';

        $registration_date = date("Y-m-d H:i:s");
        mysqli_set_charset($con, "utf8");

        $query = "INSERT INTO members(username, password, fname, lname, email, date_of_registration, sex, date_of_birth, profile_pic, picture_path, bio, status) 
			VALUES ('$username','" . hash('sha256', $password) . "','$first_name','$surname','$email','$registration_date', '$sex', '$date_of_birth', '$profile_picture', '$picture_path', NULL, '$status')";

        $result = mysqli_query($con, $query);

        if (!$result) generalError();
        else {
            session_start();
            $_SESSION['username'] = $username;

            $MAC = getClientsMAC();
            $IP = getClientsIP();
            $user_agent = getBrowser();
            $user_agent_browser = $user_agent['name'];
            $user_agent_OS = $user_agent['platform'];
            $is_mobile = $user_agent['is_mobile'];

            $query_ip_mac = "INSERT INTO ip_mac_addresses(IP_address, mac_address, user_name, login_date, mobile, OS, browser) 
			VALUES ('$IP','$MAC','$username','$registration_date', '$is_mobile', '$user_agent_OS', '$user_agent_browser')";
            $result = mysqli_query($con, $query_ip_mac);

            if ($result) header("Location: ../add_avatar.php");
        }
    }
}
