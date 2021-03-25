<?php
require('db.php');
require('error_functions.php');
require('IP_MAC_addresses.php');
require('utility_functions.php');
require('security_functions.php');
require('../mail/send_security_alert.php');

session_start();

$public_key = "6LfmCc0ZAAAAAMnp0Sxs59aUCInXiUSw1r6tn1EY";
$private_key = "6LfmCc0ZAAAAANAT6_nLc8Icy0SY5Tgg9vTFHrQu";
// maybe make another check here for i'm not a robot

if (!isSetAndNotEmpty($_POST['username'])) {
    generalError();
}

$login_date = date("Y-m-d H:i:s");
// sanitize username and password data
$username = sanitizeString($con, $_REQUEST['username']);
$password = sanitizePassword($con, $_REQUEST['psw']);

if (userAlreadyExists($username, $password, $con)) {

    $status = 'online';
    set_status($con, $username, $status);

    $_SESSION['username'] = $username;

    $values_from_db = fetchDatabaseMacAndIP(/* where username equals */ $username, $con);
    $MAC = getClientsMAC();
    $IP = getClientsIP();

    if ($values_from_db['mac_address'] != $MAC && $values_from_db['ip_address'] != $IP) {
        send_security_alert(); // Device or network may have changed;
    }

    $user_agent = getBrowser();
    $save_login_result = saveUserAgentAndLogin($IP, $MAC, $username, $login_date, $user_agent, $con);

    if ($save_login_result) {
        mysqli_close($con);
        header("Location: ../index.php"); // Redirect user to home page
    } else {
        displayDatabaseError();
    }
} else {
    invalidCredentials();
}
