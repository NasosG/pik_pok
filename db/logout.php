<?php
require('db.php');
require('utility_functions.php');

session_start();

// Destroy all sessions
if (session_destroy()) {
    $status = 'offline';
    $username = $_SESSION['username'];
    set_status($con, $username, $status); // user is now offline
    // destruction procedure was successful
    header("Location: ../index.php"); // Redirect to Home page
}
