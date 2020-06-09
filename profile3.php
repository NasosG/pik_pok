<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/errorFuncts.php');

$uname = $_SESSION['username'];
$query = "SELECT * FROM images WHERE username = '$uname' ORDER BY photo_id DESC";
$result = mysqli_query($con, $query);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Profile - Pik Pok</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>

<body oncontextmenu="return false;">	
	<div class="wrapper">	
		<header>
			<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="index.php" title=""><img src="images/logo.png" alt=""></a>
					</div><!--logo end-->
					<div class="search-bar">
						<form>
							<input type="text" name="search" placeholder="Search...">
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div><!--search-bar end-->
					<nav>
						<ul>
							<li>
								<a href="index.php" title="">
									<span>
									<i class="fa fa-home fa-lg"></i>
									</span>
									Home
								</a>
							</li>
							<li>
								<a href="top.php" title="">
									<span>
									<i class="fa fa-thumbs-up "></i>
									</span>
									Trending
								</a>
							</li>
							<li>
								<a href="contact.php" title="">
									<span>
									<i class="fa fa-id-card"></i>
									</span>
									Contact
								</a>
							</li>
							<?php 
							if(isset($_SESSION['username']))
							echo '
							<li>
								<a href="post.php" title="">
									<span>
									<i class="fa fa-plus"></i>
									</span>
									Post
								</a>
							</li>
							';?>
						</ul>
					</nav><!--nav end-->
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->


				<?php 
				if(isset($_SESSION['username'])) {
				
				
				// find user id from session name
				$query_picture = "SELECT email, fname, lname, picture_path, profile_pic FROM members WHERE username = '$uname'";
				$result_picture = mysqli_query($con, $query_picture);
				$row_picture = mysqli_fetch_array($result_picture);
				$picture_path = $row_picture['picture_path'];
				$picture_name = $row_picture['profile_pic'];
				$fname = $row_picture['fname'];
				$lname = $row_picture['lname'];
				$email = $row_picture['email'];
				//mysqli_close($con);
				echo "
					<div class='user-account'>
						<div class='user-info'>
							<img style=\"width:32px; height:32px;\" src=\"".$picture_path.$picture_name."\" alt=\"users photo\"/>
							
							<a href='profile3.php' title=''>";?>
							<?php if(isset($_SESSION['username']))  echo $_SESSION['username'];
							echo "</a>
							<i class='fa fa-angle-down'></i>
						</div>
						<div class='user-account-settingss'>
							<h3>Online Status</h3>
							<ul class='on-off-status'>
								<li>
									<div class='fgt-sec'>
										<input type='radio' name='cc' id='c5'>
										<label for='c5'>
											<span></span>
										</label>
										<small>Online</small>
									</div>
								</li>
								<li>
									<div class='fgt-sec'>
										<input type='radio' name='cc' id='c6'>
										<label for='c6'>
											<span></span>
										</label>
										<small>Offline</small>
									</div>
								</li>
							</ul>
							<h3>Custom Status</h3>
							<div class='search_form'>
								<form>
									<input type='text' name='search'>
									<button type='submit'>Ok</button>
								</form>
							</div><!--search_form end-->
							<h3>Setting</h3>
							<ul class='us-links'>
								<li><a href='profile-account-setting.php' title=''>Account Setting</a></li>
								<li><a href='#' title=''>Privacy</a></li>
								<li><a href='#' title=''>Faqs</a></li>
								<li><a href='termsofuse.php' title=''>Terms & Conditions</a></li>
							</ul>
							<h3 class='tc'><a href='db/logout.php' title=''>Logout</a></h3>
						</div><!--user-account-settingss end-->
					</div>
					";
				}
					else 
						echo "<div class='user-account'>
						<div class='user-info' style='margin-left:auto; margin-right:auto;'>
							
							<a href='signin.php' title=''> <i class='fa fa-sign-in fa-lg'></i> Sign In</a>
							
						</div>
					";
			?>
					
					
				</div><!--header-data end-->
			</div>
		</header><!--header end-->	

		<main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3 col-md-4 pd-left-none no-pd">
								<div class="main-left-sidebar no-margin">
									<div class="user-data full-width">
										<div class="user-profile">
											<div class="username-dt">
											<div class="user-pro-img">
												<div class="usr-pic  ">
											<img src= <?php echo '"'.$picture_path.$picture_name.'"'; ?> alt="">
											<div class="add-dp" id="OpenImgUpload">
												<input type="file" id="file">
												<label for="file"><i class="fa fa-camera" aria-hidden="true"></i></label>												
											</div>
										</div><!--user-pro-img end-->
												</div>
											</div><!--username-dt end-->
											<div class="user-specs">
												<h3><?php echo $_SESSION['username'];?></h3>
												<span><?php echo $fname.' '.$lname;?></span>
												<span><br><?php echo 'email: '.$email;?></span>
											</div>
										</div><!--user-profile end-->
										<ul class="user-fw-status">
											<li>
												<h4>Posts</h4>
												<span>20</span>
											</li>
											<li>
												<h4>whatever</h4>
												<span>155</span>
											</li>
											<li>
												<a href="my-profile.html" title="">Change Avatar</a>
											</li>
										</ul>
									</div><!--user-data end-->
									<div class="suggestions full-width">
										<div class="sd-title">
											<h3>Suggestions</h3>
											<i class="fa fa-ellipsis-v"></i>
										</div><!--sd-title end-->
										<div class="suggestions-list">
											<div class="suggestion-usd">
												
											</div>
											
											
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
									<div class="tags-sec full-width">
										<ul>
											<li><a href="#" title="">Help Center</a></li>
											<li><a href="#" title="">About</a></li>
											<li><a href="#" title="">Privacy Policy</a></li>
											<li><a href="#" title="">Community Guidelines</a></li>
											<li><a href="#" title="">Cookies Policy</a></li>
											<li><a href="#" title="">Career</a></li>
											<li><a href="#" title="">Language</a></li>
											<li><a href="#" title="">Copyright Policy</a></li>
										</ul>
										<div class="cp-sec">
											<img src="images/logo2.png" alt="">
											<p><img src="images/cp.png" alt="">Copyright <script type="text/javascript">document.write(new Date().getFullYear());</script></p>
										</div>
									</div><!--tags-sec end-->
								</div><!--main-left-sidebar end-->
							</div>
							<div class="col-lg-6 col-md-8 no-pd">
								<div class="main-ws-sec">
									<div class="post-topbar">
										<div class="user-picy">
											<img src= <?php echo '"'.$picture_path.$picture_name.'"'; ?> alt="">
										</div>
										<div class="post-st">
											<ul>
												<li><a class="post-jb active" href="#" title=""><i class="fa fa-plus"></i> Post Image</a></li>
												<li>
													<a class="active" href="profile-account-setting.php" title=""><i class="fa fa-cog"></i> Settings</a>
												</li>
											</ul>
										</div><!--post-st end-->
									</div><!--post-topbar end-->
									<div class="posts-section">
									<?php 
									while ($row = mysqli_fetch_array($result)) {
										$photo = $row['photo_path'].$row['photo_name'];
										$date_posted = date("d-m-Y", strtotime($row['date_posted']));
										echo '	
										<div class="post-bar">
											<div class="post_topbar">
												<div class="usy-dt">
													<img src="images/us-pic.png" alt="">
													<div class="usy-name">
														<h3>Posted by Me</h3>
														<span><img src="images/clock.png" alt="">'.$date_posted.'</span>
													</div>
												</div>
												<div class="ed-opts">
													<a href="#" title="" class="ed-opts-open"><i class="fa fa-ellipsis-v"></i></a>
													<ul class="ed-options">
														<li><a href="#" title="">Edit Post</a></li>
														<li><a href="#" title="">Unsaved</a></li>
														<li><a href="#" title="">Unbid</a></li>
														<li><a href="#" title="">Close</a></li>
														<li><a href="#" title="">Hide</a></li>
													</ul>
												</div>
											</div>
											<div class="epi-sec pb-3">
												
											</div>
											<div class="job_descp pb-1">
												<img src="'.$photo.'"/>
											</div>
											<form name="delete-form" class="form-delete" id="delete-form" method="post" action="db/delete_photo.php">
												<input type="hidden" name="photo_id" id="photo_id" value="'.$row['photo_id'].'" />
												<ul class="bk-links pb-2">
													<li><button style="border:none" id="trash-button" class="trash-button"><a title=""><i class="fa fa-trash"></i></a></button></li>
												</ul>
											</form>
											<div class="job-status-bar">
                                               <ul class="like-com">
													<li>
														<a href="#" class="active"><i class="fa fa-heart"></i> Like</a> </li>
														<!--<img src="images/liked-img.png" alt="">
														
													</li>
													<li><a href="#" class="com"><i class="fa fa-comment"></i> Comments 15</a></li>-->
												</ul>
												<ul style= "float:right;" class="like-com">
													<li><a style="color:#b2b2b2;" class=""><i class="fa fa-thumbs-up"></i> Likes 15</a></li>
													<li><a style="color:#b2b2b2;" class=""><i class="fa fa-comment"></i> Comments 15</a></li>
												</ul>
											</div>
										</div><!--post-bar end-->
										';
										} 
									?>
										
									</div><!--posts-section end-->
								</div><!--main-ws-sec end-->
							</div>
							<div class="col-lg-3">
								<div class="right-sidebar">
									<!--<div class="message-btn">
										<a href="profile-account-setting.php" title=""><i class="fa fa-cog"></i> Account Settings</a>
									</div>-->
									<div class="widget widget-portfolio">
										<div class="wd-heady">
											<h3>My posts</h3>
											<img src="images/photo-icon.png" alt="">
										</div>
										<div class="pf-gallery">
											<ul>
												<li><a href="#" title=""><img src="images/pf-gallery.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/pf-gallery.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/pf-gallery.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/pf-gallery.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/pf-gallery.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/pf-gallery.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/pf-gallery.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/pf-gallery.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/pf-gallery.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/pf-gallery.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/pf-gallery.png" alt=""></a></li>
												<li><a href="#" title=""><img src="images/pf-gallery.png" alt=""></a></li>
											</ul>
										</div><!--pf-gallery end-->
									</div><!--widget-portfolio end-->
								</div><!--right-sidebar end-->
							</div>
							</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>




		<div class="post-popup pst-pj">
			<div class="post-project">
				<h3>Post a project</h3>
				<div class="post-project-fields">
					<form>
						<div class="row">
							<div class="col-lg-12">
								<input type="text" name="title" placeholder="Title">
							</div>
							<div class="col-lg-12">
								<div class="inp-field">
									<select>
										<option>Category</option>
										<option>Category 1</option>
										<option>Category 2</option>
										<option>Category 3</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<input type="text" name="skills" placeholder="Skills">
							</div>
							<div class="col-lg-12">
								<div class="price-sec">
									<div class="price-br">
										<input type="text" name="price1" placeholder="Price">
										<i class="fa fa-dollar"></i>
									</div>
									<span>To</span>
									<div class="price-br">
										<input type="text" name="price1" placeholder="Price">
										<i class="fa fa-dollar"></i>
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<textarea name="description" placeholder="Description"></textarea>
							</div>
							<div class="col-lg-12">
								<ul>
									<li><button class="active" type="submit" value="post">Post</button></li>
									<li><a href="#" title="">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="fa fa-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->

	
		<div class="post-popup job_post">
			<div class="post-project">
				<h3>Post Image</h3>
				<div class="post-project-fields">
				
					<form id="post_form" name="post_form" method="post" action = "db/addnew.php" enctype= "multipart/form-data">
						<div class="row">
							<div class="col-lg-12">
								<input type="text" name="tag" placeholder="Insert Tag">
							</div>
							<!--
							<div class="col-lg-12">
								<div class="inp-field">
									<select>
										<option>Category</option>
										<option>Category 1</option>
										<option>Category 2</option>
										<option>Category 3</option>
									</select>
								</div>
							</div>
							-->
							<div class="col-lg-12">
								<input type="file" id="fileToUpload" name="fileToUpload" >
							</div>
							<div class="col-lg-12">
								<textarea name="description" placeholder="Description"></textarea>
							</div>
							<div class="col-lg-12">
								<ul>
									<li><button class="active" type="submit" value="post">Post</button></li>
									<li><a href="profile3.php" title="">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="fa fa-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->
	


		

	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script>
document.getElementsByClassName("trash-button").onclick = function() {
    	document.getElementsByClassName("form-delete").submit();
}
</script>

</body>
</html>