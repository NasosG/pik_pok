  <?php
	require('db.php');
	require('errorFuncts.php');
	require('IPMAC_addresses.php');
 
    if (isset($_REQUEST['username']) || isset($_REQUEST['email'])) {

    	$taken = false;

    	if (isset($_REQUEST['username'])) {
			$username = stripslashes($_REQUEST['username']); // removes backslashes
			$username = filter_var($username, FILTER_SANITIZE_STRING); // sanitize username data
			$username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
			
			$query = "SELECT * FROM members WHERE username ='$username'";
	        $result = mysqli_query($con, $query);

	        if (!$result) {
	            echo ' Database Error Occured ';
	            exit();
	        }
	        else if (mysqli_num_rows($result) > 0) $taken = true;
		}
		
		if (isset($_REQUEST['email'])) {
			$email = stripslashes($_REQUEST['email']);
			$email = filter_var($email, FILTER_SANITIZE_EMAIL); // sanitize email
			$email = mysqli_real_escape_string($con, $email);

	        $query = "SELECT * FROM members WHERE email ='$email'";
	        $result2 = mysqli_query($con, $query);

	        if (!$result2) {
	            echo ' Database Error Occured ';
	            exit();
	        }
	        //if email exists
        	else if (mysqli_num_rows($result2) > 0) $taken = true;
		}
		
  	//       //if username exists
  	//       if (mysqli_num_rows($result) > 0)  ChangeUsername();
	// 		 //if email exists
  	//       else if (mysqli_num_rows($result2) > 0)  ChangeEmail();
		

        //if username or email already exist
        if (/*username or password is*/$taken) { 
        	echo "taken"; 
        	exit(); 
        }
    }?>