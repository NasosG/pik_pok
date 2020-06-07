 <?php
include ("auth.php"); //include auth.php file on all secure pages include("db/auth.php"); //include auth.php file on all secure pages
require ('db.php');
require ('errorFuncts.php');

$username = $_SESSION['username'];
//echo isset($_REQUEST['fname']) . ' isset value ';

// If form submitted, insert values into the database.
    if (isset($_POST['old_password'])) {
		$old_password = stripslashes($_REQUEST['old_password']);// removes backslashes
		$old_password = mysqli_real_escape_string($con, $old_password);//escapes special characters in a string


	//Checking if user exists in the database or not

        $query = "SELECT * FROM members WHERE password='".md5($old_password)."'";
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