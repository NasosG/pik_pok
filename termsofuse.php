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
<title>Terms Of Use - Pik Pok</title>
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
.terms-h3{font-size: 30px; font-weight: 600; margin-bottom:10px;}
.terms-h2{font-size:40px;padding-top:20px;font-weight: 600;}
.revision, b{font-weight: bold;}
.terms_section{color:black;}
</style>
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
		
<div style="font-size: 16px; line-height: 1.5; padding: 0 8px; margin: auto; margin-top: 100px; margin-bottom: 100px; padding-left: 50px; padding-right: 50px; max-width: 1050px; background:white; border-radius:4px;  border: 2px solid lightgray;">
<div style="font-size: 16px; padding-bottom: 40px;">
   <h2 class="terms-h2">Terms of Use</h2>
   <hr>
   Welcome to Pik-Pok! <br /><br /> These Terms of Use govern your use of Pik-Pok and provide information about the Pik-Pok Service, outlined below. When you create an Pik-Pok account or use Pik-Pok, you agree to these terms. <br/>
</div>
<div class="terms_section">
   <h3 class="terms-h3"><b>The Pik-Pok Service</b></h3>
   <p class="_3p8">We agree to provide you with the Pik-Pok Service. The Service includes all of the Pik-Pok products, features, applications, services, technologies, and software that we provide to advance Pik-Pok&#039;s mission: To bring you closer to the people and things you love. The Service is made up of the following aspects (the Service):</p>
   <ul class="uiList _341 _3vz6 _4of _4kg" style="list-style: disc; color: black; display: block; -webkit-margin-after: 12px; -webkit-margin-before: 12px; -webkit-margin-end:0px; -webkit-margin-start: 0px; -webkit-padding-start: 40px;">
      <li>
         <div class="fcb"><b>Offering personalized opportunities to create, connect, communicate, discover, and share.</b><br /> People are different. We want to strengthen your relationships through shared experiences you actually care about. So we build systems that try to understand who and what you and others care about, and use that information to help you create, find, join, and share in experiences that matter to you. Part of that is highlighting content, features, offers, and accounts you might be interested in, and offering ways for you to experience Pik-Pok, based on things you and others do on and off Pik-Pok.</div>
      </li>
      <li>
         <div class="fcb"><b>Fostering a positive, inclusive, and safe environment.</b><br /> We develop and use tools and offer resources to our community members that help to make their experiences positive and inclusive, including when we think they might need help. We also have teams and systems that work to combat abuse and violations of our Terms and policies, as well as harmful and deceptive behavior. We use all the information we have-including your information-to try to keep our platform secure. We also may share information about misuse or harmful content with other Companies or law enforcement. Learn more in the <a class="_5dwo" href="http://help.Pik-Pok.com/519522125107875?helpref=page_content" target="_self">Data Policy</a>.</div>
      </li>
      <li>
         <div class="fcb"><b>Developing and using technologies that help us consistently serve our growing community.</b><br /> Organizing and analyzing information for our growing community is central to our Service. A big part of our Service is creating and using cutting-edge technologies that help us personalize, protect, and improve our Service on an incredibly large scale for a broad global community. Technologies like artificial intelligence and machine learning give us the power to apply complex processes across our Service. </div>
      </li>
      <li>
         <div><b> Research and innovation.</b><br /> We use the information we have to study our Service and collaborate with others on research to make our Service better and contribute to the well-being of our community.</div>
      </li>
   </ul>
   <br />
</div>
<div class="terms_section">
   <h3 class="terms-h3"><b>The Data Policy</b></h3>
   <p class="_3p8">Providing our Service requires collecting and using your information. The <a class="_5dwo" href="http://help.Pik-Pok.com/519522125107875?helpref=page_content" target="_self">Data Policy</a> explains how we collect, use, and share information across the <a class="_5dwo" href="https://www.facebook.com/help/1561485474074139?helpref=page_content" target="_self" rel="noopener">Facebook Products</a>. It also explains the many ways you can control your information, including in the <a class="_5dwo" href="http://help.Pik-Pok.com/285881641526716?helpref=page_content" target="_self">Pik-Pok Privacy and Security Settings</a>.</p>
   <br />
</div>
<div class="terms_section">
   <h3 class="terms-h3"><b>Your Commitments</b></h3>
   In return for our commitment to provide the Service, we require you to make the below commitments to us. 
   <p class="_3p8"></p>
   <b>Who Can Use Pik-Pok.</b> We want our Service to be as open and inclusive as possible, but we also want it to be safe, secure, and in accordance with the law. So, we need you to commit to a few restrictions in order to be part of the Pik-Pok community. 
   <ul class="uiList _341 _3vz6 _4of _4kg" style="list-style: disc; color: black; display: block; -webkit-margin-after: 12px; -webkit-margin-before: 12px; -webkit-margin-end:0px; -webkit-margin-start: 0px; -webkit-padding-start: 40px;">
      <li>
         <div >You must be at least 16 years old.</div>
      </li>
      <li>
         <div >You must not be prohibited from receiving any aspect of our Service under applicable laws or engaging in payments related Services if you are on an applicable denied party listing.</div>
      </li>
      <li>
         <div >We must not have previously disabled your account for violation of law or any of our policies.</div>
      </li>
      <li>
         <div >You must not be a convicted sex offender.</div>
      </li>
   </ul>
   <p class="_3p8"></p>
   <b>How You Can&#039;t Use Pik-Pok.</b> Providing a safe and open Service for a broad community requires that we all do our part. 
   <ul class="uiList _341 _3vz6 _4of _4kg" style="list-style: disc; color: black; display: block; -webkit-margin-after: 12px; -webkit-margin-before: 12px; -webkit-margin-end:0px; -webkit-margin-start: 0px; -webkit-padding-start: 40px;">
      <li>
         <div ><b>You can&#039;t impersonate others or provide inaccurate information.</b><br /> You don&#039;t have to disclose your identity on Pik-Pok, but you must provide us with accurate and up to date information (including registration information). Also, you may not impersonate someone you aren&#039;t, and you can&#039;t create an account for someone else unless you have their express permission.</div>
      </li>
      <li>
         <div ><b>You can&#039;t do anything unlawful, misleading, or fraudulent or for an illegal or unauthorized purpose.</b></div>
      </li>
      <li>
         <div ><b>You can&#039;t violate (or help or encourage others to violate) these Terms or our policies, including in particular the <a class="_5dwo" href="http://help.Pik-Pok.com/477434105621119?helpref=page_content" target="_self">Pik-Pok Community Guidelines</a>, <a class="_5dwo" href="https://www.Pik-Pok.com/about/legal/terms/api/" target="_self">Pik-Pok Platform Policy</a>, and <a class="_5dwo" href="https://www.facebook.com/legal/music_guidelines" target="_self" rel="noopener">Music Guidelines</a>.</b> Learn how to report conduct or content in our <a class="_5dwo" href="http://help.Pik-Pok.com/?helpref=page_content" target="_self">Help Center</a>.</div>
      </li>
      <li>
         <div ><b>You can&#039;t do anything to interfere with or impair the intended operation of the Service.</b></div>
      </li>
      <li>
         <div ><b>You can&#039;t attempt to create accounts or access or collect information in unauthorized ways.</b><br /> This includes creating accounts or collecting information in an automated way without our express permission.</div>
      </li>
      <li>
         <div ><b>You can&#039;t attempt to buy, sell, or transfer any aspect of your account (including your username) or solicit, collect, or use login credentials or badges of other users.</b></div>
      </li>
      <li>
         <div ><b>You can&#039;t post private or confidential information or do anything that violates someone else&#039;s rights, including intellectual property.</b><br /> Learn more, including how to report content that you think infringes your intellectual property rights, <a class="_5dwo" href="http://help.Pik-Pok.com/535503073130320?helpref=page_content" target="_self">here</a>.</div>
      </li>
      <li>
         <div ><b>You can&#039;t use a domain name or URL in your username without our prior written consent.</b></div>
      </li>
   </ul>
   <b>Permissions You Give to Us.</b> As part of our agreement, you also give us permissions that we need to provide the Service. 
   <ul class="uiList _341 _3vz6 _4of _4kg" style="list-style: disc; color: black; display: block; -webkit-margin-after: 12px; -webkit-margin-before: 12px; -webkit-margin-end:0px; -webkit-margin-start: 0px; -webkit-padding-start: 40px;">
      <li>
         <div ><b>We do not claim ownership of your content, but you grant us a license to use it.</b><br /> Nothing is changing about your rights in your content. We do not claim ownership of your content that you post on or through the Service. Instead, when you share, post, or upload content that is covered by intellectual property rights (like photos or videos) on or in connection with our Service, you hereby grant to us a non-exclusive, royalty-free, transferable, sub-licensable, worldwide license to host, use, distribute, modify, run, copy, publicly perform or display, translate, and create derivative works of your content (consistent with your privacy and application settings). You can end this license anytime by deleting your content or account. However, content will continue to appear if you shared it with others and they have not deleted it. To learn more about how we use information, and how to control or delete your content, review the <a class="_5dwo" href="http://help.Pik-Pok.com/519522125107875">Data Policy</a> and visit the <a class="_5dwo" href="http://help.Pik-Pok.com/">Pik-Pok Help Center</a>.</div>
      </li>
      <li>
         <div ><b>Permission to use your username, profile picture, and information about your relationships and actions with accounts, ads, and sponsored content.</b><br /> You give us permission to show your username, profile picture, and information about your actions (such as likes) or relationships (such as follows) next to or in connection with accounts, ads, offers, and other sponsored content that you follow or engage with that are displayed on Facebook Products, without any compensation to you. For example, we may show that you liked a sponsored post created by a brand that has paid us to display its ads on Pik-Pok. As with actions on other content and follows of other accounts, actions on sponsored content and follows of sponsored accounts can be seen only by people who have permission to see that content or follow. We will also respect your ad settings. You can learn more <a class="_5dwo" href="http://help.Pik-Pok.com/615366948510230">here</a> about your ad settings.</div>
      </li>
      <li>
         <div ><b>You agree that we can download and install updates to the Service on your device.</b></div>
      </li>
   </ul>
   <br />
</div>
<div class="terms_section">
   <h3 class="terms-h3"><b>Additional Rights We Retain</b></h3>
   <ul class="uiList _341 _3vz6 _4of _4kg" style="list-style: disc; color: black; display: block; -webkit-margin-after: 12px; -webkit-margin-before: 12px; -webkit-margin-end:0px; -webkit-margin-start: 0px; -webkit-padding-start: 40px;">
      <li>
         <div >If you select a username or similar identifier for your account, we may change it if we believe it is appropriate or necessary (for example, if it infringes someone&#039;s intellectual property or impersonates another user).</div>
      </li>
      <li>
         <div >If you use content covered by intellectual property rights that we have and make available in our Service (for example, images, designs, videos, or sounds we provide that you add to content you create or share), we retain all rights to our content (but not yours).</div>
      </li>
      <li>
         <div >You can only use our intellectual property and trademarks or similar marks as expressly permitted by our <a class="_5dwo" href="https://www.Pik-Pok-brand.com/" target="_self" rel="noopener">Brand Guidelines</a> or with our prior written permission.</div>
      </li>
      <li>
         <div >You must obtain written permission from us or under an open source license to modify, create derivative works of, decompile, or otherwise attempt to extract source code from us.</div>
      </li>
   </ul>
   <br />
</div>
<div class="terms_section">
  <h3 class="terms-h3"><b>Content Removal and Disabling or Terminating Your Account</b></h3>
   <ul class="uiList _341 _3vz6 _4of _4kg" style="list-style: disc; color: black; display: block; -webkit-margin-after: 12px; -webkit-margin-before: 12px; -webkit-margin-end:0px; -webkit-margin-start: 0px; -webkit-padding-start: 40px;">
      <li>
         <div >We can remove any content or information you share on the Service if we believe that it violates these Terms of Use, our policies (including our <a class="_5dwo" href="http://help.Pik-Pok.com/477434105621119" target="_self">Pik-Pok Community Guidelines</a>), or we are required to do so by law. We can refuse to provide or stop providing all or part of the Service to you (including terminating or disabling your account) immediately if you: clearly, seriously or repeatedly violate these Terms of Use, our policies (including our <a class="_5dwo" href="http://help.Pik-Pok.com/477434105621119" target="_self">Pik-Pok Community Guidelines</a>), if you repeatedly infringe other people&#039;s intellectual property rights, or where we are required to do so by law. If we take action to remove your content for violating our Community Guidelines, or disable or terminate your account, we will notify you where appropriate. If you believe your account has been terminated in error, or you want to disable or permanently delete your account, consult our <a class="_5dwo" href="http://help.Pik-Pok.com/" target="_self">Help Center</a>.</div>
      </li>
      <li>
         <div >Content you delete may persist for a limited period of time in backup copies and will still be visible where others have shared it. This paragraph, and the section below called &quot;Our Agreement and What Happens if We Disagree,&quot; will still apply even after your account is terminated or deleted.</div>
      </li>
   </ul>
   <br />
</div>
<div class="terms_section">
 <h3 class="terms-h3"><b>Our Agreement and What Happens if We Disagree</b></h3>
   <b>Our Agreement.</b>
   <ul class="uiList _341 _3vz6 _4of _4kg" style="list-style: disc; color: black; display: block; -webkit-margin-after: 12px; -webkit-margin-before: 12px; -webkit-margin-end:0px; -webkit-margin-start: 0px; -webkit-padding-start: 40px;">
      <li>
         <div >Your use of music on the Service is also subject to our <a class="_5dwo" href="https://www.facebook.com/legal/music_guidelines" target="_blank" rel="noopener">Music Guidelines</a>, and your use of our API is subject to our <a class="_5dwo" href="https://www.Pik-Pok.com/about/legal/terms/api/">Platform Policy</a>. If you use certain other features or related services, you will be provided with an opportunity to agree to additional terms that will also become a part of our agreement. For example, if you use payment features, you will be asked to agree to the <a class="_5dwo" href="https://www.facebook.com/payments_terms" target="_blank" rel="noopener">Community Payment Terms</a>. If any of those terms conflict with this agreement, those other terms will govern.</div>
      </li>
      <li>
         <div >If any aspect of this agreement is unenforceable, the rest will remain in effect.</div>
      </li>
      <li>
         <div >Any amendment or waiver to our agreement must be in writing and signed by us. If we fail to enforce any aspect of this agreement, it will not be a waiver.</div>
      </li>
      <li>
         <div >We reserve all rights not expressly granted to you.</div>
      </li>
   </ul>
   <b>Who Has Rights Under this Agreement.</b>
   <ul class="uiList _341 _3vz6 _4of _4kg" style="list-style: disc; color: black; display: block; -webkit-margin-after: 12px; -webkit-margin-before: 12px; -webkit-margin-end:0px; -webkit-margin-start: 0px; -webkit-padding-start: 40px;">
      <li>
         <div >This agreement does not give rights to any third parties.</div>
      </li>
      <li>
         <div >You cannot transfer your rights or obligations under this agreement without our consent.</div>
      </li>
      <li>
         <div >Our rights and obligations can be assigned to others. For example, this could occur if our ownership changes (as in a merger, acquisition, or sale of assets) or by law.</div>
      </li>
   </ul>
   <b>Who Is Responsible if Something Happens.</b>
   <ul class="uiList _341 _3vz6 _4of _4kg" style="list-style: disc; color: black; display: block; -webkit-margin-after: 12px; -webkit-margin-before: 12px; -webkit-margin-end:0px; -webkit-margin-start: 0px; -webkit-padding-start: 40px;">
      <li>
         <div >We will use reasonable skill and care in providing our Service to you and in keeping a safe, secure, and error-free environment, but we cannot guarantee that our Service will always function without disruptions, delays, or imperfections. Provided we have acted with reasonable skill and care, we do not accept responsibility for: losses not caused by our breach of these Terms or otherwise by our acts; losses which are not reasonably foreseeable by you and us at the time of entering into these Terms; any offensive, inappropriate, obscene, unlawful, or otherwise objectionable content posted by others that you may encounter on our Service; and events beyond our reasonable control.</div>
      </li>
      <li>
         <div >The above does not exclude or limit our liability for death, personal injury, or fraudulent misrepresentation caused by our negligence. It also does not exclude or limit our liability for any other things where the law does not permit us to do so. </div>
      </li>
   </ul>
   <b>How We Will Handle Disputes.</b>
   <blockquote> If you are a consumer and habitually reside in a Member State of the European Union, the laws of that Member State will apply to any claim, cause of action, or dispute you have against us that arises out of or relates to these Terms (&quot;claim&quot;), and you may resolve your claim in any competent court in that Member State that has jurisdiction over the claim. In all other cases, you agree that the claim must be resolved in a competent court in the Republic of Ireland and that Irish law will govern these Terms and any claim, without regard to conflict of law provisions. </blockquote>
   <b>Unsolicited Material.</b>
   <blockquote> We always appreciate feedback or other suggestions, but may use them without any restrictions or obligation to compensate you for them, and are under no obligation to keep them confidential. </blockquote>
   <br />
</div>
<div class="terms_section">
   <h3 class="terms-h3"><b>Updating These Terms</b></h3>
   We may change our Service and policies, and we may need to make changes to these Terms so that they accurately reflect our Service and policies. Unless otherwise required by law, we will notify you (for example, through our Service) at least 30 days before we make changes to these Terms and give you an opportunity to review them before they go into effect. Then, if you continue to use the Service, you will be bound by the updated Terms. If you do not want to agree to these or any updated Terms, you can delete your account, <a href="https://help.Pik-Pok.com/370452623149242?ref=igtos" target="_self">here</a>. <br />
</div>
<br>
You declare that you are over the age of 18. If you are under the age of 18, please have your parent or legal guardian read this with you. For users who are under the age of 18 but over the age of 16, you as the parent/legal guardian of the user declare that you have read and acknowledged Pik Pok's Privacy Policy and Terms of Use and agree to the use by your child of the the Platform and registration for an account.
<br><br>
<div class="revision">Revised: May 19, 2020</div>
 <br><br>


	</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>