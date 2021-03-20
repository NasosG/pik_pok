<?php

/**
 * This method is used to remove backslashes, sanitize and escape special characters in a string
 *
 * @param $con
 * @param string $data
 * @return string
 */
function sanitizeString($con, string $data): string
{
    $data = stripslashes($data); // removes backslashes
    $data = filter_var($data, FILTER_SANITIZE_STRING); // sanitize string data
    $data = mysqli_real_escape_string($con, $data); // escapes special characters in a string
    return $data;
}

/**
 * This method is used to remove backslashes, sanitize and escape special characters in an email
 *
 * @param $con
 * @param string $email
 * @return string
 */
function sanitizeEmail($con, string $email): string
{
    $email = stripslashes($email); // removes backslashes
    $email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitize email
    $email = mysqli_real_escape_string($con, $email); // escapes special characters in a string
    return $email;
}

/**
 * This method is used to remove backslashes and escape special characters in an string
 *
 * @param $con
 * @param string $data
 * @return string
 */
function removeSpecialCharacters($con, string $data): string
{
    $data = stripslashes($data); // strip slashes
    $data = mysqli_real_escape_string($con, $data); // escapes special characters in a string
    return $data;
}

/**
 * This method is used to check if a variable is set and not empty
 *
 * @param string $parameter
 * @return bool
 */
function isSetAndNotEmpty(string $parameter): bool
{
    return isset($parameter) && (trim($parameter) != '');
}
