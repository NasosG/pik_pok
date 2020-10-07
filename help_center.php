<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
?>

<!DOCTYPE html>
<html>
<head>
	<link rel='shortcut icon' type='image/x-icon' href='images/logo.png'/>
	<meta charset="UTF-8">
	<title>Help Center - Pik-Pok</title>
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

		<header>
			<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="index.php" title=""><img src="images/logo.png" alt=""></a>
					</div><!--logo end-->
					<div class="search-bar">
						<form method="get" action="index.php">
							<input type="text" name="search" placeholder="Search...">
							<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div><!--search-bar end-->
					<nav>
						<ul>
							<li>
								<a href="index.php" title="">
									<span>
									<i style="font-size:1.2em;" class="fa fa-home"></i>
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
				
				$uname = $_SESSION['username'];
				// find user id from session name
				$query_picture = "SELECT picture_path, profile_pic FROM members WHERE username = '$uname'";
				$result_picture = mysqli_query($con, $query_picture);
				$row_picture = mysqli_fetch_array($result_picture);
				$picture_path = $row_picture['picture_path'];
				$picture_name = $row_picture['profile_pic'];

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
								<li><a href='profile3.php' title=''>My Profile</a></li>
								<li><a href='profile-account-setting.php' title=''>Account Setting</a></li>
								<li><a href='privacy_policy.php' title=''>Privacy</a></li>
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
							<div class="col-lg-3 col-md-12">
								<div class="filter-secs">
									<div class="filter-heading">
										<h3>Home</h3>
									</div><!--filter-heading end-->
									<div class="paddy help-paddy">
										<div class="filter-dd">
											<div class="filter-ttl filter--tt2">
												<div class="dropdown">
                                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Getting Started</a>
                                                   <div class="dropdown-menu">
                                                       <a href="#" class="dropdown-item top--1 ">Searching of Pik-Pok</a>
                                                       <a href="#" class="dropdown-item">Email from Pik-Pok</a>
                                                       <a href="#" class="dropdown-item">Managing Your Feed</a>
                                                       <a href="#" class="dropdown-item">Post a Job</a>
                                                       <a href="#" class="dropdown-item">Post a Project</a>
                                                   </div>
                                               </div>
											</div>
										</div>
										<div class="filter-dd">
											<div class="filter-ttl filter--tt2">
												<div class="dropdown">
                                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Your Account</a>
                                                   <div class="dropdown-menu">
                                                       <a href="#" class="dropdown-item top--1 ">Account Access</a>
                                                       <a href="#" class="dropdown-item">Account Setting</a>
                                                       <a href="#" class="dropdown-item">Privacy</a>
                                                       <a href="#" class="dropdown-item">Notification</a>                                                     
                                                   </div>
                                               </div>
											</div>
										</div>
										<div class="filter-dd">
											<div class="filter-ttl filter--tt2">
												<div class="dropdown">
                                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">Build Your Profile</a>
                                                   <div class="dropdown-menu">
                                                       <a href="#" class="dropdown-item top--1 ">Build User Profile</a>
                                                       <a href="#" class="dropdown-item">Build Company Profile</a>                                                       
                                                   </div>
                                               </div>
											</div>
										</div>
										<div class="filter-dd">
											<div class="filter-ttl filter--tt2">
												<a href="#">Pik Pok Security</a>
											</div>
										</div>
										<div class="filter-dd">
											<div class="filter-ttl filter--tt2">
												<a href="#">Discovering People</a>
											</div>
										</div>
										<div class="filter-dd">
											<div class="filter-ttl filter--tt2">
												<a href="#">Billiing & Payments</a>
											</div>
										</div>
										<div class="filter-dd">
											<div class="filter-ttl accountnone filter--tt2">
												<a href="#">Reset Your Account</a>
											</div>
										</div>
									</div>
								</div><!--filter-secs end-->
							</div>
							<div class="col-lg-9 col-md-12">
								  <!-- end-helpforum -->
								  <div class="actions">
								  	<div class="actionstitle">
								  	<h3><img src="images/rocket.png" alt="image"> Popular Actions</h3>
								  		<hr>
								  	</div>
								  		<div class="actionstext">
								  	<div class="row">
								  		<div class="col-md-6 col-sm-12">
								  			<a href="#">Create a Pik Pok account</a>
								  			<a href="#">Change or add email address</a>
								  			<a href="#">Reset your password</a>
								  		</div>
								  		<div class="col-md-6 col-sm-12">
								  			<a href="#">Manage emails you get from Pik-Pok</a>
								  			<a href="#">Make your password strong</a>
								  			<a href="#">Close your account</a>
								  		</div>
								  	</div>
								  	</div>
								  </div>
								  <div class="actions">
								  	<div class="actionstitle">
								  	<h3><img src="images/icon2.png" alt="image"> Suggested for you</h3>
								  		<hr>
								  	</div>
								  		<div class="actionstext">
								  	<div class="row">
								  		<div class="col-12">
								  			<a href="#">Pik-Pok Homepage - FAQ</a>
								  			<hr>
								  			<a href="#">Pik-Pok Public Profile Visibility</a>
								  			<hr>
								  			<a href="#">Editing Your Profile</a>
								  			<hr>
								  			
								  		</div>
								  	</div>
								  	</div>
								  </div>

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
				<h3>Post a job</h3>
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
							<div class="col-lg-6">
								<div class="price-br">
									<input type="text" name="price1" placeholder="Price">
									<i class="fa fa-dollar"></i>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="inp-field">
									<select>
										<option>Full Time</option>
										<option>Half time</option>
									</select>
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


	</div><!--theme-layout end-->
	<footer class="fixed-bottom">
			<div class="footy-sec mn no-margin">
				<div class="container">
					<ul>
						<li><a href="help_center.php" title="">Help Center</a></li>
						<li><a href="about.php" title="">About</a></li>
						<!--<li><a href="#" title="">Privacy Policy</a></li>-->
						<li><a href="community_guidelines.php" title="">Community Guidelines</a></li>
						<!--<li><a href="#" title="">Cookies Policy</a></li>-->
						<li><a href="termsofuse.php" title="">Terms of Use</a></li>
						<li><a href="#" title="">Language: English</a></li>
						<!--<li><a href="#" title="">Copyright Policy</a></li>-->
					</ul>
					<p><img src="images/copy-icon2.png" alt="">Copyright <script type="text/javascript">document.write(new Date().getFullYear());</script></p>
					<img class="fl-rgt" src="images/logo2.png" alt="">
				</div>
			</div>
		</footer><!--footer end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.range-min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>