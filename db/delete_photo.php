<?php
require('db.php');
require('error_functions.php');

$photo_id = $_POST['photo_id'];
$query = "DELETE FROM images WHERE photo_id = '$photo_id'";
$result = mysqli_query($con, $query);

mysqli_close($con);
if ($result) header("Location: ../profile3.php");
else echo "delete not successfull";
