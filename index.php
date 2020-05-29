<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/errorFuncts.php');
 
mysqli_set_charset($con,"utf8");
$query = "SELECT * FROM images ORDER BY photo_id DESC"; //mporoume na kanoume order by date alla kai to id petuxainei ton skopo kai den xreiazetai na kratame kai thn wra sthn bash alla mono hmeromhnia
		
$result = mysqli_query($con, $query);
?>
	
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Home - Pik Pok</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
						<a href="index.html" title=""><img src="images/logo.png" alt=""></a>
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
				if(isset($_SESSION['username'])){
				echo "
					<div class='user-account'>
						<div class='user-info'>
							<img src='images/user.png' alt=''>
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

		<section class="companies-info">
			<div class="container">
				<div class="company-title">
					<h3>All Photos</h3>
				</div><!--company-title end-->
				<div class="companies-list">
					<div class="row">
				<?php 
				while ($row = mysqli_fetch_array($result)) {
				$newDate = date("d-m-Y", strtotime($row['date_posted']));
				echo '	
						<div class="col-lg-3 col-md-4 col-sm-6 col-12">
						
							<div >
							<form id="myform" class="company_profile_info" name="myform" method="post" action="picComments.php" >
								<div class="company-up-info">
								
									<a href="user-profile.html"><h3>';
									echo "<h3>".$row['username']."</h3>";
									echo "</a><h4>".$newDate."</h4>
									<img src=\"".$row['photo_path'].$row['photo_name']."\" alt='user's photo' >";
									
									if(isset($_SESSION['username'])) 
									{															
									echo "
									
									<input type='hidden' name='photo_id' id='photo_id' value='".$row['photo_id']."' />
									<ul>
										<li>
										<button style='border:none' >
											<a style='color:white;' id='likeLink' class='follow'>Like <i class='fa fa-heart' aria-hidden='true'></i></a>
										</button>
											
										</li>
										<li>
										<button onclick = '' class='btn2' style='border:none' >
										<a class='hire-us text-white'>Comment <i class='fa fa-comment' aria-hidden='true'></i></a>
										</button>
										</li>
									</ul>
									";
									}
								echo "
								</div>
								<a id='likesNum' class='view-more-pro'> Likes:
									<img src='images/likes.png' alt='' height='18' width='18'>
									".$row['photo_likes']."
								</a>
								</form>
							</div><!--company_profile_info end-->
							
						</div>
						";} ?>
					</div>
				</div><!--companies-list end-->
				<div class='process-comm'>
					<div class='spinner'>
						<div class='bounce1'></div>
						<div class='bounce2'></div>
						<div class='bounce3'></div>
					</div>
				</div><!--process-comm end-->
			</div>
		</section>
		
		
		<footer>
			<div class="footy-sec mn no-margin">
				<div class="container">
					<ul>
						<li><a href="help-center.html" title="">Help Center</a></li>
						<li><a href="about.php" title="">About</a></li>
						<li><a href="#" title="">Privacy Policy</a></li>
						<li><a href="#" title="">Community Guidelines</a></li>
						<li><a href="#" title="">Cookies Policy</a></li>
						<li><a href="#" title="">Career</a></li>
						<li><a href="forum.html" title="">Forum</a></li>
						<li><a href="#" title="">Language</a></li>
						<li><a href="#" title="">Copyright Policy</a></li>
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
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
<script>
var formSubmit = true;

$('.btn2').on('click', function() {

formSubmit = false;
    $.ajax({
        url : 'picComments.php',
    });
});

$("form").submit(function(e) {
	
	if(!formSubmit) return;
	
    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: 'db/likes.php',
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {  
			$(form).children("#likesNum").html( " Likes: <img src='images/likes.png' alt='' height='18' width='18'>" + data + "</img>" );
           }
         });

});
</script>
</body>
</html>