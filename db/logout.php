<?php
session_start();

// Destroy all sessions
if (session_destroy()) {
	// destruction procedure was successful 
	header("Location: ../index.php"); // Redirect to Home page
}
?>