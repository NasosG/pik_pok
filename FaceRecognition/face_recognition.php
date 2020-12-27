<?php
include("../db/auth.php"); //include auth.php file on all secure pages 
require('../db/db.php');
require('../db/errorFuncts.php');

$photo_taken = false;

if(isset($_POST['imgData'])) {
  $photo_taken = true;
  $imgData = $_POST['imgData'];
  //echo "post value " . $imgData . " end"; 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script defer src="scripts/face-api.min.js"></script>
  <script defer src="scripts/script.js"></script>
  <title>Face Recognition</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column
    }

    canvas {
      position: absolute;
      top: 0;
      left: 0;
    }
  </style>
</head>
<body>
  <form name="foo" method="post" action="../post.php" enctype="multipart/form-data">
    <input type="hidden" name="imgData" id="imgData" value= "" />
    <?php echo '<input type="file" id="imageUpload" value= "'.$imgData.'" />'; ?>
 <!--  <input type="file" id="imageUpload" value= <?php echo"\"".$imgData."\""?> > -->

   <button type="submit" onClick="save_photo()">Submit photo &#187;</button>
  </form>
</body>
<script>
    function save_photo() {
      // actually snap photo (from preview freeze) and display it
      Webcam.snap( function(data_uri) {
        // display results in page
        document.getElementById('results').innerHTML = 
          '<h2>Your Previous Photo:</h2>' + 
          '<img src="'+data_uri+'"/>';
        // store the data uri of the photo to our hidden field
        document.getElementById("imgData").value = data_uri;
      } );
    }
  </script>
</body>
</html>