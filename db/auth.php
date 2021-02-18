<?php
session_start();

if (!isset($_SESSION["username"])){}

$signed_in = function() {
    return isset($_SESSION["username"]);
};

$redirect_signed_in_users = function() use ($signed_in) {
    if ($signed_in()) header('Location: ./index.php');
};

$redirect_unsigned_users = function() use ($signed_in) {
    if (!$signed_in()) header('Location: ./index.php');
};
