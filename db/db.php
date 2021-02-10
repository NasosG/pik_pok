 <?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db 	= "pik_pok";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (!$con) {
	echo "con not established".mysqli_error();
	die('Connection Failed'.mysqli_error());
}

// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//set timezone
date_default_timezone_set('Europe/Athens');

/*utility functions*/
$set_status = function($con, $username, $status) {
	$query = "UPDATE members SET status='$status' WHERE username = '$username' ";
	$result = mysqli_query($con,$query) or die("Not able to execute the query");
	return $result;
};

$get_status = function($con, $username) {
	$query = "SELECT status FROM members WHERE username = '$username' ";
	$result = mysqli_query($con, $query) or die("Not able to execute the query");
	$row = mysqli_fetch_array($result);
	$user_status = $row[0];
	return $user_status;
};

?>