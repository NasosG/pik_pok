<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/errorFuncts.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel='shortcut icon' type='image/x-icon' href='images/logo.png'/>
	<meta charset="UTF-8">
	<title>Profile Icon - Pik Pok</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/flatpickr.min.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<!-- font awesome icons kit -->
	<script src="https://kit.fontawesome.com/fac8ebb301.js" crossorigin="anonymous"></script>
</head>

<body oncontextmenu="return false;">	
	<div class="wrapper">	

		<?php
		// include header for all web pages
		include_once('./includes/header.php');		
		?>
			
		<div class="responsive-box-2">
		<h2 style="text-align:center;margin-top:110px;margin-bottom:50px; font-size:48px;font-family: 'Sofia';">Profile Picture</h2>
			<div class="post-project">
				
				<div class="post-project-fields">
				
					<form id="post_form" name="post_form" method="post" action = "db/add_profile_pic.php" enctype= "multipart/form-data">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-6">
								<img src="images/newAvatar.png" id="add-prof-pic"></img>
								
							</div>
							
								<div class="col-lg-6 col-md-6 col-6">
									<div class="upload-btn-wrapper">
										<button class="btn-up">Upload an Image</button>
										<input type="file" id="fileToUpload" name="fileToUpload" class="input-file"></input>
									</div>
								</div>
							
							
							<div class="col-lg-12" style="margin-top:20px;">
								<textarea id="bio" name="bio" placeholder="Tell the world a few words about you, your Bio"></textarea>
							</div>
							<div class="col-lg-12">
								<ul>
									<li><button class="active" type="submit" value="post">All Ready</button></li>
									<li><a href="profile3.php" title="">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				
			</div><!--post-project end-->
		</div><!--post-project-popup end-->
	


		


	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
// from
// https://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#add-prof-pic').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#fileToUpload").change(function(){
        readURL(this);
    });
	</script>
</body>
</html>