<?php
include("db/auth.php"); //include auth.php file on all secure pages 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Pik Pok SignIn Signup</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/slick.css">
	<link rel="stylesheet" type="text/css" href="css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
</head>

<body class="sign-in" oncontextmenu="return false;">
	<div class="wrapper">		
		<div class="sign-in-page">
			<div class="signin-popup">
				<div class="signin-pop">
					<div class="row">
						<div class="col-lg-6">
							<div class="cmp-info">
								<div class="cm-logo">
									<img src="images/pp.png" alt="">
									<p>Pik Pok, is the destination for short-form pictures. Our mission is to capture and present the world's creativity, knowledge, and precious life moments.</p>
								</div><!--cm-logo end-->	
								<img src="images/main.png" alt="">			
							</div><!--cmp-info end-->
						</div>
						<div class="col-lg-6">
							<div class="login-sec">
								<ul class="sign-control">
									<li data-tab="tab-1" class="current"><a href="#" title="">Sign in</a></li>				
									<li data-tab="tab-2"><a href="#" title="">Sign up</a></li>				
								</ul>			
								<div class="sign_in_sec current" id="tab-1">
									
									<h3>Sign in</h3>
									<form id="sign_in" name="sign_in" method = "post" action="db/login.php">
										<div class="row">
											<div class="col-lg-12 no-pdd">
												<div class="sn-field">
													<input type="text" id = "username" name="username" placeholder="Username" required>
													<i class="fa fa-user"></i>
												</div><!--sn-field end-->
											</div>
											<div class="col-lg-12 no-pdd">
												<div class="sn-field">
													<input type="password" id="psw" name="psw" placeholder="Password" required>
													<i class="fa fa-lock"></i>
												</div>
											</div>
											<div class="col-lg-12 no-pdd">
												<div class="checky-sec">
													<div class="fgt-sec">
														<input type="checkbox" name="cc" id="c1">
														<label for="c1">
															<span></span>
														</label>
														<small>Remember me</small>
													</div><!--fgt-sec end-->
													<a href="forgot_psw.php" title="">Forgot Password?</a>
												</div>
											</div>
											<div class="col-lg-12 no-pdd">
												<button type="submit" value="submit">Sign in</button>
											</div>
										</div>
									</form>
									<div class="login-resources">
										<h4>Login Via Social Account</h4>
										<ul>
											<li><a href="https://www.facebook.com" title="" class="fb"><i class="fa fa-facebook"></i>Login Via Facebook</a></li>
											<li><a href="https://twitter.com" title="" class="tw"><i class="fa fa-twitter"></i>Login Via Twitter</a></li>
										</ul>
									</div><!--login-resources end-->
								</div><!--sign_in_sec end-->
								<div class="sign_in_sec" id="tab-2">	
									<h3>Sign Up</h3>	
									<div class="dff-tab current" id="tab-3">
										<form id="sign_up" name="sign_up" method = "post" action="db/sign_up.php" enctype= "multipart/form-data">
											<div class="row">
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="text" id="fname" name="fname" placeholder="First Name" required>
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="text" id="lname" name="lname" placeholder="Surname" required>
														<i class="fa fa-user-circle"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="date" id="date_of_birth" name="date_of_birth" placeholder="date of birth" required>
														<i class="fa fa-birthday-cake"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<select id="sex" name="sex">
															<option value="0">Male</option>
															<option value="1">Female</option>
														</select>
														<i class="fa fa-venus-mars"></i>
														<span><i class="fa fa-ellipsis-h"></i></span>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="email" id="email" name="email" placeholder="email" required>
														<i class="fa fa-at"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="text" id="username" name="username" placeholder="username" required>
														<i class="fa fa-user"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="password" id ="psw" name="psw" placeholder="Password" required>
														<i class="fa fa-lock"></i>
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<div class="sn-field">
														<input type="password" name="repeat-password" placeholder="Repeat Password" required>
														<i class="fa fa-lock"></i>
													</div>
												</div>
												
												<div class="col-lg-12 no-pdd">
													<div class="checky-sec st2">
														<div class="fgt-sec">
															<input type="checkbox" name="cc" id="c2" required>
															<label for="c2">
																<span></span>
															</label>
															<small>Yes, I understand and agree to the pik pok Terms & Conditions.</small>
														</div><!--fgt-sec end-->
													</div>
												</div>
												<div class="col-lg-12 no-pdd">
													<button type="submit" value="submit">Get Started</button>
												</div>
											</div>
										</form>
									</div><!--dff-tab end-->

								</div>		
							</div><!--login-sec end-->
						</div>
					</div>		
				</div><!--signin-pop end-->
			</div><!--signin-popup end-->
			<div class="footy-sec">
				<div class="container">
					<ul>
						<li><a href="help-center.html" title="">Help Center</a></li>
						<li><a href="about.html" title="">About</a></li>
						<li><a href="#" title="">Privacy Policy</a></li>
						<li><a href="#" title="">Community Guidelines</a></li>
						<li><a href="#" title="">Cookies Policy</a></li>
						<li><a href="#" title="">Career</a></li>
						<li><a href="forum.html" title="">Forum</a></li>
						<li><a href="#" title="">Language</a></li>
						<li><a href="#" title="">Copyright Policy</a></li>
					</ul>
					<p><img src="images/copy-icon.png" alt="">Copyright <script type="text/javascript">document.write(new Date().getFullYear());</script></p>
				</div>
			</div><!--footy-sec end-->
		</div><!--sign-in-page end-->


	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>