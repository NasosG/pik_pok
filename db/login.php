<?php
	require('db.php');
	require('errorFuncts.php');
	session_start();
	
	
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])) {
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['psw']);
		$password = mysqli_real_escape_string($con, $password);

	//Checking if user exists in the database or not

        $query = "SELECT * FROM members WHERE username='$username' AND password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die("Not able to execute the query");
		$rows = mysqli_num_rows($result);
        if($rows==1) {
			$_SESSION['username'] = $username;
			
				// Redirect user to index.php
				header("Location: ../index.php"); 
        }
		else {
			invalidCredentials();
		}
    }
	else {	
		myerror();
	} 
 ?>


