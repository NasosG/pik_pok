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
		$new_password=($_REQUEST['new_password']);
		$repeat_password=($_REQUEST['repeat_password']);

		echo $old_password;
		echo $new_password;
		echo $repeat_password;



	//Checking if user exists in the database or not

        $query = "SELECT * FROM members WHERE username = '$username' AND password='md5($old_password)'";
		$result = mysqli_query($con,$query) or die("Not able to execute the query");
		$row = mysqli_num_rows($result);
        if(md5($old_password) == $row['password']) {

        	echo 'ola kala';
			
        }
		else {
			invalidCredentials();
		}
    }
	else {	
		myerror();
	} 

?>