<?php
require('db.php');
require('error_functions.php');
require('IP_MAC_addresses.php');
require('../mail/send_security_alert.php');

session_start();

$public_key = "6LfmCc0ZAAAAAMnp0Sxs59aUCInXiUSw1r6tn1EY";
$private_key = "6LfmCc0ZAAAAANAT6_nLc8Icy0SY5Tgg9vTFHrQu";

// maybe make another check here for i'm not a robot
$login_date = date("Y-m-d H:i:s");
// If form submitted, get the values by post/get
if (isset($_POST['username'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    // sanitize username data
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    // escapes special characters in a string
    $username = mysqli_real_escape_string($con, $username);

    $password = stripslashes($_REQUEST['psw']);
    $password = strip_tags($password);

    // sanitize password
    // $password = filter_var($password, FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($con, $password);

    //Checking if user exists in the database or not
    $query = "SELECT * FROM members WHERE BINARY username='$username' AND password='" . hash('sha256', $password) . "'";
    $result = mysqli_query($con, $query) or die("Not able to execute the query");
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {

        $status = 'online';
        $set_status($con, $username, $status);

        $_SESSION['username'] = $username;

        $get_mac = "SELECT MAC_address, IP_address FROM ip_mac_addresses WHERE user_name='$username'";
        $result1 = mysqli_query($con, $get_mac) or die("Not able to execute the query");
        $values_db = mysqli_fetch_array($result1);

        if ($values_db[0] != $MAC && $values_db[1] != $IP) {
            send_security_alert(); // Device or network may have changed;
        }

        $search_addresses = "DELETE FROM ip_mac_addresses WHERE user_name='$username' AND IP_address='$IP' AND MAC_address='$MAC'";
        $result = mysqli_query($con, $search_addresses) or die("Not able to execute the query");

        $ua = getBrowser();
        $ua_browser = $ua['name'];
        $ua_OS = $ua['platform'];
        $is_mobile = $ua['is_mobile'];

        $query_ip_mac = "INSERT INTO ip_mac_addresses(IP_address, mac_address, user_name, login_date, mobile, OS, browser) 
		VALUES ('$IP','$MAC','$username','$login_date', '$is_mobile', '$ua_OS', '$ua_browser')";
        $result = mysqli_query($con, $query_ip_mac);

        if ($result) {
            mysqli_close($con);
            // Redirect user to index.php
            header("Location: ../index.php");
        }
    }
    else {
        invalidCredentials();
    }
}
else {
    generalError();
}

?>
