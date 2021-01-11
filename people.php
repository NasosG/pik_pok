<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/errorFuncts.php');

mysqli_set_charset($con,"utf8");

if (!isset($_SESSION['username'])) {
	header('location:index.php');
}
else {
	$uname = $_SESSION['username'];	
	// find user id from session name
	$query2 = "SELECT id FROM members WHERE username = '$uname'";
	$result2 = mysqli_query($con, $query2);
	$row = mysqli_fetch_array($result2);
	$user_id = $row['id'];
}


if (isset($_GET['search']) && !empty($_GET['search'])) {		
	$search = $_GET['search'];
	$query = "SELECT *
				FROM members 
				WHERE fname LIKE '%{$search}%'
				OR lname LIKE '%{$search}%'";
}
else {
	$query = "SELECT * FROM members WHERE username <> '$uname'"; //mporoume na kanoume order by date alla kai to id petuxainei ton skopo kai den xreiazetai na kratame kai thn wra sthn bash alla mono hmeromhnia
}	

$result = mysqli_query($con, $query);

$query_requests = "SELECT * FROM relationship
  WHERE (user_one_id = '$user_id' OR user_two_id = '$user_id')
  AND status = 0
  AND action_user_id <> '$user_id'";


$result_requests = mysqli_query($con, $query_requests);

function check_friendship_status($con, $user_id, $user2_id) {
	$query_friends_status = "SELECT * FROM relationship
	  WHERE ((user_one_id = '$user_id' AND user_two_id = '$user2_id')
	  OR (user_one_id = '$user2_id'AND user_two_id = '$user_id'))
	  AND (status = 1)";

	return mysqli_query($con, $query_friends_status);
}

?>
	
<!DOCTYPE html>
<html>
<head>
<link rel='shortcut icon' type='image/x-icon' href='images/logo.png'/>
<meta charset="UTF-8">
<title>Home - Pik Pok</title>
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
<style>
.add-friend-but {
	border: 1px solid #CFCFD1;
	background-color: #F5F4F7;
	color: #55595E!important;
}

.add-friend-but:hover {
	background-color: #FCFCFC;
	
}
</style>
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
							<input type="text" name="search" id="search" placeholder="Search people...">
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
							if (isset($_SESSION['username'])) {
								echo '
								<li>
									<a href="post.php" title="">
										<span>
										<i class="fa fa-plus"></i>
										</span>
										Post
									</a>
								</li>
								';
								echo '
								<li>
									<a href="people.php" title="">
										<span>
										<i class="fa fa-user-friends"></i>
										</span>
										Friends
									</a>
								</li>
								';
								echo '
								<li>
									<a href="messages.php" title="">
										<span>
										<i class="fa fa-comments"></i>
										</span>
										Chat
									</a>
								</li>
								';
							}
							?>
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

		<section class="col-12 col-lg-2 col-md-12 col-sm-12 companies-info">
			<div class="container">
				<div class="companies-list">
					<div class="row">
						<div class="tab-pane ">
							<div class="acc-setting">
								<h3>Friend Requests</h3>
								<div class="requests-list">
								<?php 
								if (mysqli_num_rows($result_requests)==0)
									echo '
									<div class="request-details">
										<div class="request-info">
											<h3>No friend requests</h3>
										</div>
									</div>';
								while ($row = mysqli_fetch_array($result_requests)) {
									$uID = $row['user_one_id'];
									$result_user_requested = mysqli_query($con, "SELECT * FROM members WHERE id = '$uID'");
									$row_user_requested = mysqli_fetch_array($result_user_requested);
									echo '
									<div class="request-details">
										<div class="noty-user-img">
											<img src="'.$row_user_requested['picture_path'].$row_user_requested['profile_pic'].'" alt = "friend request photo"/>
										</div>
										<div class="request-info">
											<h3>'.$row_user_requested['fname'].' '.$row_user_requested['lname'].'</h3>
										</div>
										<div class="accept-feat">
											<ul>
												<li>
													<button type="submit" id="accept-request" onclick="manageRequest('.$row_user_requested['id'].', 1);" class="accept-req"><i class="fa fa-check"></i></button>
												</li>
												<li>
													<button type="submit" id="decline-request" onclick="manageRequest('.$row_user_requested['id'].', 2);" class="close-req"><i class="fa fa-close"></i></button>
												</li>
											</ul>
										</div><!--accept-feat end-->
									</div><!--request-details end-->
									';
								}?>
								</div><!--requests-list end-->
							</div><!--acc-setting end-->
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="col-12 col-lg-8 col-md-12 col-sm-12 companies-info">
			<div class="container">
				<div class="company-title">
					<h3>Find People</h3>
				</div><!--company-title end-->
				<div class="companies-list">
					<div class="row">
				<?php 
				while ($row = mysqli_fetch_array($result)) {
					
					echo '	
						<div class="col-lg-4 col-md-6 col-sm-6 col-12">						
							<div>
							<form id="people-form" class="people-form likes-comments-form company_profile_info" name="people-form" method="post" action="db/add_friend.php" >
								<div class="company-up-info">
									';
									echo '<a href="other_users_profile.php?photo_username='.$row['username'].'">';
									echo '<h3 class="">'.$row['fname'].' '.$row['lname'].'</h3>
									<img src="'.$row['picture_path'].$row['profile_pic'].'" alt="user photo" />
									<input type="hidden" name="id" id="id" value="'.$row['id'].'"/>
									</a>
									<ul class="pl-2">
									';
									if ((mysqli_num_rows(check_friendship_status($con, $user_id,$row['id'])) == 0)) 
										echo '
										<li><button id="friend-request" onclick="sendRequest();" style="all:inherit;cursor:pointer"><a id="request-link" title="" class="add-friend-but"><i style="font-size:16px;top: 0;" class="fa fa-user-plus"></i> <span style="font-weight:600;">Add Friend</span></a></button></li>
										';
									else echo '
										<li><p id="friend-request style="all:inherit;cursor:pointer"><a id="request-link" title="" class="add-friend-but"><i style="font-size:16px;top: 0;" class="fas fa-check"></i> <span style="font-weight:600;">You are friends</span></a></p></li>
									';
									echo '
									</ul>
								</div>
							</div><!--company_profile_info end-->
							</form>
						</div>
						';
					} 
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
						<li><a href="community_guidelines.php" title="">Community Guidelines</a></li>
						<li><a href="termsofuse.php" title="">Terms of Use</a></li>
						<li><a href="#" title="">Language: English</a></li>
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
var form = $(".people-form");

// button listeners
$('#friend-request').on('click', function() {
	form.submit();
});

function manageRequest(id, accepted) { 
	var values = {
        'id': id,
        'accepted': accepted
    };
    $.ajax({
        type: "POST",
        url: 'db/manage_friend_request.php',
        data: values,
        success: function(data) {
            location.reload();
            //alert("saved");
        }
    });
}

// forms' submission with ajax
form.submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
        type: "POST",
        url: 'db/add_friend.php',
        data: form.serialize(), // serializes the form's elements.
        success: function(data) {
        	location.reload();
        	// $(form).children("#request-link").html(" Likes: <img src='images/likes.png' alt='' height='18' width='18'>" + data + "</img>");
           alert("Friend request sent");
        }
    });
});

</script>
</body>
</html>