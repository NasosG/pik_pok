<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/errorFuncts.php');

// this whole page is under construction and testing

if (isset($_SESSION['username']))
	$uname = ($_SESSION['username']);

// fetch some users for testing purposes
$query_users = "SELECT * FROM members WHERE username <> '$uname' LIMIT 6";
$result_users = mysqli_query($con, $query_users);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel='shortcut icon' type='image/x-icon' href='images/logo.png'/>
	<meta charset="UTF-8">
	<title>Messages - Pik Pok</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/flatpickr.min.css">
	<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
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
						<form>
							<input type="text" name="search" id="search" placeholder="Search...">
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



		<section class="messages-page">
			<div class="container">
				<div class="messages-sec">
					<div class="row">
						<div class="col-lg-4 col-md-12 no-pdd">
							<div class="msgs-list">
								<div class="msg-title">
									<h3>Messages</h3>
									<ul>
										<li><a href="#" title=""><i class="fa fa-cog"></i></a></li>
										<li><a href="#" title=""><i class="fa fa-ellipsis-v"></i></a></li>
									</ul>
								</div><!--msg-title end-->
								<div class="messages-list">
									<ul>
										<li class="active">
											<div class="usr-msg-details">
												<div class="usr-ms-img">
													<img src="images/s2.png" alt="">
													<span class="msg-status"></span>
												</div>
												<div class="usr-mg-info">
													<h3>Jenny Doe</h3>
													<p>Lorem ipsum dolor <img src="images/smley.png" alt=""></p>
												</div><!--usr-mg-info end-->
												<span class="posted_time">1:55 PM</span>
												<span class="msg-notifc">1</span>
											</div><!--usr-msg-details end-->
										</li>
										<?php while ($row_users = mysqli_fetch_array($result_users)) {
										echo '

										<li>
											<div class="usr-msg-details">
												<div class="usr-ms-img">
													<img style="width:50px; height:50px;" src="'.$row_users['picture_path'].$row_users['profile_pic'].'" alt="users photo"/>
													<span class="msg-status"></span>
												</div>
												<div class="usr-mg-info">
													<h3>'.$row_users['fname']." ".$row_users['lname'].'</h3>
													<p>consolidate look carbon random...</p>
												</div><!--usr-mg-info end-->
												<span class="posted_time">1:55 PM</span>
											</div><!--usr-msg-details end-->
										</li>
										'
										;
									}?>
									</ul>
								</div><!--messages-list end-->
							</div><!--msgs-list end-->
						</div>
						<div class="col-lg-8 col-md-12 pd-right-none pd-left-none">
							<div class="main-conversation-box">
								<div class="message-bar-head">
									<div class="usr-msg-details">
										<div class="usr-ms-img">
											<img src="images/s2.png" alt="">
										</div>
										<div class="usr-mg-info">
											<h3>Jenny Doe</h3>
											<p>Online</p>
										</div><!--usr-mg-info end-->
									</div>
									<a href="#" title=""><i class="fa fa-ellipsis-v"></i></a>
								</div><!--message-bar-head end-->
								<div class="messages-line">
									<div class="main-message-box">
										<div class="messg-usr-img">
											<img src="images/s2.png" alt="">
										</div><!--messg-usr-img end-->
										<div class="message-dt">
											<div class="message-inner-dt img-bx">
												<img src="images/mt-img1.png" alt="">
												<img src="images/mt-img2.png" alt="">
												<img src="images/mt-img3.png" alt="">
											</div><!--message-inner-dt end-->
											<span>Sat, Aug 23, 1:08 PM</span>
										</div><!--message-dt end-->
									</div><!--main-message-box end-->
									<div class="main-message-box ta-right">
										<div class="message-dt">
											<div class="message-inner-dt">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
											</div><!--message-inner-dt end-->
											<span>Sat, Aug 23, 1:08 PM</span>
										</div><!--message-dt end-->
										<div class="messg-usr-img">
											<img src="images/default-avatar.jpg" alt="">
										</div><!--messg-usr-img end-->
									</div><!--main-message-box end-->
									<div class="main-message-box st3">
										<div class="message-dt st3">
											<div class="message-inner-dt">
												<p>Cras ultricies ligula.<img src="images/smley.png" alt=""></p>
											</div><!--message-inner-dt end-->
											<span>5 minutes ago</span>
										</div><!--message-dt end-->
										<div class="messg-usr-img">
											<img src="images/s2.png" alt="">
										</div><!--messg-usr-img end-->
									</div><!--main-message-box end-->
									<div class="main-message-box ta-right">
										<div class="message-dt">
											<div class="message-inner-dt">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
											</div><!--message-inner-dt end-->
											<span>Sat, Aug 23, 1:08 PM</span>
										</div><!--message-dt end-->
										<div class="messg-usr-img">											
											<img src="images/default-avatar.jpg" alt="">
										</div><!--messg-usr-img end-->
									</div><!--main-message-box end-->
									<div class="main-message-box st3">
										<div class="message-dt st3">
											<div class="message-inner-dt">
												<p>Lorem ipsum dolor sit amet</p>
											</div><!--message-inner-dt end-->
											<span>2 minutes ago</span>
										</div><!--message-dt end-->
										<div class="messg-usr-img">
											<img src="images/s2.png" alt="">
										</div><!--messg-usr-img end-->
									</div><!--main-message-box end-->
									<div class="main-message-box ta-right">
										<div class="message-dt">
											<div class="message-inner-dt">
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
											</div><!--message-inner-dt end-->
											<span>Sat, Aug 23, 1:08 PM</span>
										</div><!--message-dt end-->
										<div class="messg-usr-img">
											<img src="images/default-avatar.jpg" alt="">
										</div><!--messg-usr-img end-->
									</div><!--main-message-box end-->
									<div class="main-message-box st3">
										<div class="message-dt st3">
											<div class="message-inner-dt">
												<p>....</p>
											</div><!--message-inner-dt end-->
											<span>Typing...</span>
										</div><!--message-dt end-->
										<div class="messg-usr-img">
											<img src="images/s2.png" alt="">
										</div><!--messg-usr-img end-->
									</div><!--main-message-box end-->
								</div><!--messages-line end-->
								<div class="message-send-area">
									<form>
										<div class="mf-field">
											<input type="text" name="message" placeholder="Type a message here">
											<button type="submit">Send</button>
										</div>
										<ul>
											<li><a href="#" title=""><i class="fa fa-smile-o"></i></a></li>
											<li><a href="#" title=""><i class="fa fa-camera"></i></a></li>
											<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
										</ul>
									</form>
								</div><!--message-send-area end-->
							</div><!--main-conversation-box end-->
						</div>
					</div>
				</div><!--messages-sec end-->
			</div>
		</section><!--messages-page end-->



		<footer>
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
		</footer>

	</div><!--theme-layout end-->

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>


</body>
</html>