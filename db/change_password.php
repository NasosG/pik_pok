 <?php
include ("auth.php"); //include auth.php file on all secure pages include("db/auth.php"); //include auth.php file on all secure pages
require ('db.php');
require ('errorFuncts.php');

$username = $_SESSION['username'];
//echo isset($_REQUEST['fname']) . ' isset value ';

// If form submitted, insert values into the database.
    if (isset($_POST['old_password'])) {
		$old_password = stripslashes($_REQUEST['old_password']);// removes backslashes de doulevei na to dw argotera
		$old_password = mysqli_real_escape_string($con, $old_password);//escapes special characters in a string de doulevei na to dw argotera
		$new_password = ($_REQUEST['new_password']); 
		$repeat_password = ($_REQUEST['repeat_password']);
		
		if ($repeat_password != $new_password){
			echo 'wrong password';
			exit;
		}

		$new_password = md5($new_password);
		$old_password = md5($old_password);
		




	//Checking if user exists in the database or not

        $query = "SELECT * FROM members WHERE username= '$username' AND password='$old_password'";
		$result = mysqli_query($con,$query) or die("Not able to execute the query");
		$row = mysqli_num_rows($result);

        if ($row > 0) {

	        $query = "UPDATE members
			SET password = '$new_password'
			WHERE username= '$username' AND password='$old_password'";
			
			$result = mysqli_query($con,$query);

			

			if (!empty($_SERVER['HTTP_REFERER']))
	    		header("Location: ".$_SERVER['HTTP_REFERER']);
			else echo "No referrer.";
		
        }
		else {
			invalidCredentials();
		}
    }
	else {	
		myerror();
	} 

?>