<?php
	function myerror()
	{
		echo "<br><h1 align = \"center\">";
		echo " <font color=\"red\"> Sorry, Something went wrong </font> <br> ";
		echo " We're working on it and we'll get it fixed as soon as we can <br> ";
		echo " - Click <a href='../index.php'>here</a> to return to Home";
		echo "</h1>";
	}
	
	function ChangeUsername()
	{
		echo "<br><h1 align = \"center\">";
		echo " <font color=\"red\"> Sorry, that username already exists </font> <br> ";
		echo " - Click <a href='../signUp.php'>here</a> to Sign Up<br>";
		echo " - Click <a href='../index.php'>here</a> to return to Home";
		echo "</h1>";
	}
	
	function invalidCredentials()
	{
		echo "<br><h1 align = \"center\">";
		echo " <font color=\"red\"> Username/password is incorrect. </font> <br> ";
		echo " - Click <a href='../index.php'>here</a> to return to Home";
		echo "</h1>";
	}
?>