 <?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db 	= "pik_pok";

$con = mysqli_connect( $dbhost, $dbuser, $dbpass, $db);

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

?>