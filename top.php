<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/errorFuncts.php');

mysqli_set_charset($con,"utf8");

/*
	$search=get ['search'];
	1. tha kanoume get/post na pairnoume to keimeno tou input
  1. na kanoume query opou tha tou dinoume to keimeno tou search bar apo to input
  2. 
*/
if (isset($_GET['search']) && !empty($_GET['search']))	{		
	$search = $_GET['search'];
	$query = "SELECT *
				  FROM images 
				  WHERE photo_tag LIKE '%{$search}%'
				  ORDER BY photo_likes DESC";
}
else {
	$query = "SELECT * FROM images ORDER BY photo_likes DESC"; 
}	

$result = mysqli_query($con, $query);

if (isset ($_SESSION['username'])) {
	$uname = $_SESSION['username'];	
	// find user id from session name
	$query2 = "SELECT id FROM members WHERE username = '$uname'";
	$result2 = mysqli_query($con, $query2);
	$row = mysqli_fetch_array($result2);
	$user_id = $row['id'];
}

?>
	
<!DOCTYPE html>
<html>
<head>
<link rel='shortcut icon' type='image/x-icon' href='images/logo.png'/>
<meta charset="UTF-8">
<title>Trending - Pik Pok</title>
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
							<form id="myform" class="likes-comments-form company_profile_info" name="myform" method="get" action="picComments.php" >
								<div class="company-up-info">
								
									<a href="other_users_profile.php?photo_username='.$row['username'].'">';
									echo "<h3 class='pt-2'>".$row['username']."</h3>";
									echo "</a><h4>".$newDate."</h4>
									<img src=\"".$row['photo_path'].$row['photo_name']."\" alt='user's photo' />";
									
									if(isset($_SESSION['username'])) 
									{	
										$photo_id = $row['photo_id'];
										$query3 = "SELECT * FROM post_likes WHERE liked_by_user = '$user_id' AND posted_photo_id = '$photo_id'"; 
										$result3 = mysqli_query($con, $query3);									
									echo "
									<input type='hidden' name='photo_id' id='photo_id' value='".$row['photo_id']."' />
									<ul>
										<li>
										<button class='likeBut' onclick='changeLikeState(this)' style='border:none'>";
										 if (mysqli_num_rows($result3) == 0 )  
										echo "
											<a id='likeLink' class='likeLink follow text-white'>Like <i class='fa fa-heart' aria-hidden='true'></i></a>";
											else
												echo "
											<a id='likeLink' class='likeLink follow text-white'>Unlike <i class='fa fa-heart-broken' aria-hidden='true'></i></a>";
											echo "
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
						";} 
						?>
					</div>
				</div><!--companies-list end-->
				
				<div class='process-comm'>
					<!--<div class='spinner'>
						<div class='bounce1'></div>
						<div class='bounce2'></div>
						<div class='bounce3'></div>
					</div>
					-->
				</div>
				<!--process-comm end-->
				
			</div>
		</section>
		
		
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
		</footer>

	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
<script>
var formSubmit = true;

$('.btn2').on('click', function() {

formSubmit = false;
    $.ajax({
    	//type: "GET",
        url : 'picComments.php',
    });
});

$(".likes-comments-form").submit(function(e) {
	
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
			location.reload();
           }
         });

});

function changeLikeState(x1){
	
	var x = x1.children;
	//alert (x[0].textContent );
	if(x[0].textContent.includes("Unlike")) {
		x[0].innerHTML = "Like <i class='fa fa-heart' aria-hidden='true'></i>";
	}
	else {
		x[0].innerHTML = "Unlike <i class='fas fa-heart-broken'></i>";
	}
}

/*
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('search');
  filter = input.value.toUpperCase();


 // ul = document.getElementById("myUL");
  //li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}

*/
</script>
</body>
</html>