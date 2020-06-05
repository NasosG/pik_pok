<?php
	require('db.php');
	require('errorFuncts.php');
	
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
		
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con, $email);
		
		///////////////////////////////////////////////////////

		$query = "SELECT * FROM members WHERE username ='$username'";
        $result = mysqli_query($con, $query);
        if (!$result) {
            echo ' Database Error Occured ';
        }
		
        //////////////////////////////////////////////////////

        $query = "SELECT * FROM members WHERE email ='$email'";
        $result2 = mysqli_query($con, $query);
        if (!$result2) {
            echo ' Database Error Occured ';
        }

        /////////////////////////////////////////////////////

        //if username exists
        if (mysqli_num_rows($result) > 0)  ChangeUsername();
		
		//if email exists
        else if (mysqli_num_rows($result2) > 0)  ChangeEmail();

		else {
			$password = stripslashes($_REQUEST['psw']);
			$password = mysqli_real_escape_string($con, $password);
			
			$fname = stripslashes($_REQUEST['fname']);
			$fname = mysqli_real_escape_string($con, $fname);
			
			$surname = stripslashes($_REQUEST['lname']);
			$surname = mysqli_real_escape_string($con, $surname);
			
			$sex = stripslashes($_REQUEST['sex']);
			$sex = mysqli_real_escape_string($con, $sex);
			$sex = (int)$sex;
			
			$date_of_birth = stripslashes($_REQUEST['date_of_birth']);
			$date_of_birth = mysqli_real_escape_string($con, $date_of_birth);
			
			//$profile_pic = stripslashes($_REQUEST['fileToUpload']);
			//$profile_pic = mysqli_real_escape_string($con, $profile_pic);
			
			$RegDate = date("Y-m-d H:i:s");
			mysqli_set_charset($con,"utf8");
			$query = "INSERT INTO members(username, password, fname, lname, email, date_of_registration,sex, date_of_birth, profile_pic, picture_path) 
			VALUES ('$username','".md5($password)."','$fname','$surname','$email','$RegDate', '$sex', '$date_of_birth', null, null)";

			$result = mysqli_query($con,$query);
			if($result) {
				session_start();
				$_SESSION['username'] = $username;
				header("Location: ../addAvatar.php");
				//echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to return to <a //href='../index.php'>Home</a></div>";
			}
			else {
				myerror();
			}
		}

    }
	else {
		myerror();
	}
?>
