<?php
include ("auth.php"); //include auth.php file on all secure pages include("db/auth.php"); //include auth.php file on all secure pages
require ('db.php');
require ('errorFuncts.php');

$username = $_SESSION['username'];
//echo isset($_REQUEST['fname']) . ' isset value ';

if (isset($_REQUEST['fname']) && (trim($_REQUEST['fname']) != '')) {
    $fname = stripslashes($_REQUEST['fname']); // removes backslashes
    $fname = mysqli_real_escape_string($con, $fname); //escapes special characters in a string

    $query = "UPDATE members
			  SET fname = '$fname'
              WHERE username = '$username'";

}
else if (isset($_REQUEST['lname']) && (trim($_REQUEST['lname']) != '')) {
    $lname = stripslashes($_REQUEST['lname']); // removes backslashes
    $lname = mysqli_real_escape_string($con, $lname); //escapes special characters in a string

    $query = "UPDATE members
			  SET lname = '$lname'
              WHERE username = '$username'";

}
else if (isset($_REQUEST['username']) && (trim($_REQUEST['username']) != '')) {
    $uname = stripslashes($_REQUEST['username']); // removes backslashes
    $uname = mysqli_real_escape_string($con, $uname); //escapes special characters in a string

    
    // check if this username already exists in the database
    $query = "SELECT * FROM members WHERE username ='$uname'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        echo ' Database Error Occured '; 
        exit();
    }

    if (mysqli_num_rows($result) > 0)  {
        ChangeUsernameSettings(); 
        exit();
    }

    $query = "UPDATE members
			  SET username = '$uname'
              WHERE username = '$username'";

    // set session's username to the new username value
    $_SESSION['username'] = $uname;

}
else if (isset($_REQUEST['email']) && (trim($_REQUEST['email']) != '')) {
    $email = stripslashes($_REQUEST['email']); // removes backslashes
    $email = mysqli_real_escape_string($con, $email); //escapes special characters in a string

    // check if this email already exists in the database
    
    $query = "SELECT * FROM members WHERE email ='$email'";
    $result = mysqli_query($con, $query);

    if (!$result) {
        echo ' Database Error Occured '; 
        exit();
    }

    if (mysqli_num_rows($result) > 0)  {
        ChangeEmailSettings(); 
        exit();
    }

    $query = "UPDATE members
			  SET email = '$email'
              WHERE username = '$username'";

}
else if (isset($_REQUEST['bdate']) && (trim($_REQUEST['bdate']) != '')) {
    $date_of_birth = $_REQUEST['bdate'];
    $date_of_birth = stripslashes($date_of_birth); // removes backslashes
    //echo "adasdas : ".$date_of_birth;
    //$date_of_birth = mysqli_real_escape_string($con, $date_of_birth); //escapes special characters in a string

    $query = "UPDATE members
			  SET date_of_birth = '$date_of_birth'
              WHERE username = '$username'";

}
else {
	echo 'Your input was wrong. Please try again!';
	//exit;

	// go back (if there is a referer)
	if (!empty($_SERVER['HTTP_REFERER']))
    	header("Location: ".$_SERVER['HTTP_REFERER']);
	else echo "No referrer.";
}

$result = mysqli_query($con, $query);
if ($result) { 
	echo "value changed";

	// go back (if there is a referer)
	if (!empty($_SERVER['HTTP_REFERER']))
    	header("Location: ".$_SERVER['HTTP_REFERER']);
	else echo "No referrer.";
}

?>
