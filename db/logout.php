<?php
session_start();
// Destroy all sessions
if(session_destroy()) 
{
	header("Location: ../index.php"); // Redirect to Home page
}
?>