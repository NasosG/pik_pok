<?php

function generalError()
{
    include('../includes/echo_header.php');
    echo "<br><h1 style='font-size: 40px; padding-top:100px; font-family:\"Sofia\"; text-align:center;'>";
    echo " <span style=\"color: red; \"> Sorry, Something went wrong </span> <br> ";
    echo " We're working on it and we'll get it fixed as soon as we can <br> ";
    echo " - Click <a href='../index.php'>here</a> to return to Home";
    echo "</h1>";
    include('../includes/echo_end.php');
}

function ChangeUsername()
{
    include('../includes/echo_header.php');
    echo "<br><h1 style='font-size: 40px; padding-top:100px; font-family:\"Sofia\"; text-align:center;'>";;
    echo " <span style=\"color: red; \"> Sorry, that username already exists </span> <br> ";
    echo " - Click <a href='../signin.php'>here</a> to Sign Up<br>";
    echo " - Click <a href='../index.php'>here</a> to return to Home";
    echo "</h1>";
    include('../includes/echo_end.php');
}

function ChangeEmail()
{
    include('../includes/echo_header.php');
    echo "<br><h1 style='font-size: 40px; padding-top:100px; font-family:\"Sofia\"; text-align:center;'>";
    echo " <span style=\"color: red; \"> Sorry, that email already exists </span> <br> ";
    echo " - Click <a href='../signin.php'>here</a> to Sign Up<br>";
    echo " - Click <a href='../index.php'>here</a> to return to Home";
    echo "</h1>";
    include('../includes/echo_end.php');
}

function invalidCredentials()
{
    include('../includes/echo_header.php');
    echo "<br><h1 style='font-size: 40px; padding-top:100px; font-family:\"Sofia\"; text-align:center;'>";
    echo " <span style=\"color: red; \"> Username/password is incorrect. </span> <br> ";
    echo " - Click <a href='../signin.php'>here</a> to return to the Login screen";
    echo "</h1>";
    include('../includes/echo_end.php');
}

function ChangeUsernameSettings()
{
    include('../includes/echo_settings_header.php');
    echo "<br><h1 style='font-size: 40px; padding-top:100px; font-family:\"Sofia\"; text-align:center;'>";
    echo " <span style=\"color: red; \"> Sorry, that username already exists </span> <br> ";
    echo " - Click <a href='../profile_account_setting.php'>here</a> to go back<br>";
    echo " - Click <a href='../index.php'>here</a> to return to Home";
    echo "</h1>";
    include('../includes/echo_end.php');
}

function ChangeEmailSettings()
{
    include('../includes/echo_settings_header.php');
    echo "<br><h1 style='font-size: 40px; padding-top:100px; font-family:\"Sofia\"; text-align:center;'>";
    echo " <span style=\"color: red; \"> Sorry, that email already exists </span> <br> ";
    echo " - Click <a href='../profile_account_setting.php'>here</a> to go back<br>";
    echo " - Click <a href='../index.php'>here</a> to return to Home";
    echo "</h1>";
    include('../includes/echo_end.php');
}
