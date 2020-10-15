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
	<title>About - Pik Pok</title>
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
	<link rel="stylesheet" type="text/css" href="css/other-styles.css">
	<!-- font awesome icons kit -->
	<script src="https://kit.fontawesome.com/fac8ebb301.js" crossorigin="anonymous"></script>
	<style>
		p{padding-bottom:30px;}
		h3{font-weight: 600;}
	</style>
</head>


<body oncontextmenu="return false;">	
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

<div style="margin: auto;  margin-bottom: 100px; padding-top:100px; max-width: 1050px; ">
<div style= "font-size: 16px; line-height: 1.5; padding: 0 8px; margin: auto;  margin-bottom: 100px; padding:0px 50px 0px 50px; background:white; border-radius:4px;  border: 2px solid lightgray;">

<h2 class="terms-h2">Privacy Policy</h2>
<h3 style="color:grey;" class="terms-h3">(If you are a user having your usual residence in Europe or USA)</h3><hr>

<p>Last update: June 14, 2020.</p>

<p>Welcome to Pik-Pok (the &ldquo;Platform&rdquo;). The Platform is provided and controlled by Pik-Pok Inc. (&ldquo;Pik-Pok&rdquo;, &ldquo;we&rdquo; or &ldquo;us&rdquo;). We are committed to protecting and respecting your privacy. This Privacy Policy covers the experience we provide for users age 16 and over on our Platform. Children under 16 years old are strictly not allowed to use Pik-Pok.</p>

<p>Capitalized terms that are not defined in this policy have the meaning given to them in the Terms of Use.</p>

<h3 class="terms-h3">What information do we collect?</h3><hr>
<p>We try not to collect personal information about you. Specifically, we collect information when you create an account and use the Platform (your name, surname, email, age, sex e.t.c). We also collect information contained in the messages you send through our Platform. More information about the categories and sources of information is provided below.  Information you choose to provide For certain activities, such as when you register, upload content to the Platform, or contact us directly, you may provide some or all of the following information:</p>

<p>Registration information, such as age, sex, username and password and email or phone number Profile information, such as name, surname and profile image User-generated content, including comments, photographs, videos, and virtual item videos that you choose to upload or broadcast on the Platform (&ldquo;User Content&rdquo;) Payment information, such as PayPal or other third-party payment information (where required for the purpose of payment) Your opt-in choices and communication preferences Information to verify an account  Information in correspondence you send to us Information you share through surveys or your participation in challenges, sweepstakes, or contests such as your gender, age, likeness, and preferences. Information we obtain from other sources We may receive the information described in this Privacy Policy from other sources, such as:</p>

<p>Social Media. if you choose to link(there is no such feature yet) or sign up using your social network (such as Facebook, Twitter, Instagram, or Google), we may collect information from these social media services, including your contact lists for these services and information relating to your use of the Platform in relation to these services.</p>

<p>Third-Party Services. We may collect information about you from third-party services, such as advertising partners and analytics providers.</p>

<p>Others Users of the Platform. Sometimes other users of the Platform may provide us information about you, including through customer service inquiries.</p>

<p>Other Sources. We may collect information about you from other publicly available sources.</p>

<p>Information we collect automatically We may automatically collect certain information from you when you use the Platform, including internet or other network activity information such as your IP address, geolocation-related data (as described below), unique device identifiers, browsing and search history (including content you have viewed in the Platform), and Cookies (as defined below).</p>

<h3>Usage Information</h3>

<p>We collect information regarding your use of the Platform and any other User Content that you generate through and broadcast on our Platform. We also link your subscriber information with your activity on our Platform across all your devices using your email, phone number, or similar information.</p>

<h3>Device Information</h3>

<p>We may collect information about the device you use to access the Platform, only your IP address.</p>

<h3>Messages</h3>

<p>We collect and process, which includes scanning and analyzing, information you provide in the context of composing, sending, or receiving messages through the Platform&rsquo;s messaging functionality. That information includes the content of the message and information about when the message has been sent, received and/or read, as well as the participants of the communication. Please be aware that messages sent to other users of the Platform will be accessible by those users and that we are not responsible for the manner in which those users use or disclose messages.</p>

<h3>Metadata</h3>

<p>When you upload User Content, you automatically upload certain metadata that is connected to the User Content. Metadata describes other data and provides information about your User Content that will not always be evident to the viewer. In connection with your User Content the metadata can describe how, when, and by whom the piece of User Content was collected and how that content is formatted. It also includes information, such as your account name, that enables other users to trace back the User Content to your user account. Additionally, metadata will consist of data that you chose to provide with your User Content, e.g. any hashtags used to mark keywords to the video and captions.</p>

<h3>Cookies</h3>

<p>We and our service providers and business partners use cookies and other similar technologies (e.g. web beacons, flash cookies, etc.) (&ldquo;Cookies&rdquo;) to automatically collect information, measure and analyze which web pages you click on and how you use the Platform, enhance your experience using the Platform, improve the Platform, and provide you with targeted advertising on the Platform and elsewhere across your different devices. Cookies are small files which, when placed on your device, enable the Platform to provide certain features and functionality. Web beacons are very small images or small pieces of data embedded in images, also known as &ldquo;pixel tags&rdquo; or &ldquo;clear GIFs,&rdquo; that can recognize Cookies, the time and date a page is viewed, a description of the page where the pixel tag is placed, and similar information from your computer or device. To learn how to disable Cookies, see the &ldquo;Your choices&rdquo; section below.</p>

<p>Additionally, we allow these service providers and business partners to collect information about your online activities through Cookies. We and our service providers and business partners link your contact or subscriber information with your activity on our Platform across all your devices, using your email or other log-in or device information. Our service providers and business partners may use this information to display advertisements on our Platform and elsewhere online and across your devices tailored to your interests, preferences, and characteristics. We are not responsible for the privacy practices of these service providers and business partners, and the information practices of these service providers and business partners are not covered by this Privacy Policy.</p>

<p>We may aggregate or de-identify the information described above. Aggregated or de-identified data is not subject to this Privacy Policy.</p>

<h3 class="terms-h3">How we use your information?</h3><hr>

<p>As explained below, we use your information to fulfill and enforce our Terms of Service, to improve and administer the Platform, and to allow you to use its functionalities. We may also use your information to, among other things, show you suggestions, promote the Platform, and customize your ad experience.</p>

<p>We generally use the information we collect:</p>

<p>to fulfill requests for products, services, Platform functionality, support and information for internal operations, including troubleshooting, data analysis, testing, research, statistical, and survey purposes and to solicit your feedback to customize the content you see when you use the Platform. For example, we may provide you with services based on the country settings you have chosen or show you content that is similar to content that you liked or interacted with to send promotional materials from us or on behalf of our affiliates and trusted third parties to improve and develop our Platform and conduct product development to measure and understand the effectiveness of the advertising we serve to you and others and to deliver targeted advertising to make suggestions and provide a customized ad experience to support the social functions of the Platform, including to permit you and other users to connect with each other through the Platform and for you and other users to share, download, and otherwise interact with User Content posted through the Platform to use User Content as part of our advertising and marketing campaigns to promote the Platform to understand how you use the Platform, including across your devices to infer additional information about you, such as your age, gender, and interests to help us detect abuse, fraud, and illegal activity on the Platform to ensure that you are old enough to use the Platform (as required by law) to communicate with you, including to notify you about changes in our services to announce you as a winner of our contest, sweepstakes, or promotions if permitted by the promotion rule, and to send you any applicable prizes to enforce our terms, conditions, and policies consistent with your permissions, to provide you with location-based services, such as advertising and other personalized content to inform our algorithms to combine all the information we collect or receive about you for any of the foregoing purposes for any other purposes disclosed to you at the time we collect your information or pursuant to your consent. How we share your information We are committed to maintaining your trust, and while Pik-Pok does not sell personal information to third parties, we want you to understand when and with whom we may share the information we collect for business purposes.</p>

<p>Service Providers and Business Partners We share the categories of personal information listed above with service providers and business partners to help us perform business operations and for business purposes, including research, payment processing and transaction fulfillment, database maintenance, administering contests and special offers, technology services, deliveries, email deployment, advertising, analytics, measurement, data storage and hosting, disaster recovery, search engine optimization, marketing, and data processing.</p>

<p>Within Our Corporate Group We may share your information with a parent, subsidiary, or other affiliate of our corporate group.</p>

<p>In Connection with a Sale, Merger, or Other Business Transfer We may share your information in connection with a substantial corporate transaction, such as the sale of a website, a merger, consolidation, asset sale, or in the unlikely event of bankruptcy.</p>

<p>For Legal Reasons We may disclose your information to respond to subpoenas, court orders, legal process, law enforcement requests, legal claims, or government inquiries, and to protect and defend the rights, interests, safety, and security of Pik-Pok Inc., the Platform, our affiliates, users, or the public. We may also share your information to enforce any terms applicable to the Platform, to exercise or defend any legal claims, and comply with any applicable law.</p>

<p>With Your Consent We may share information for other purposes pursuant to your consent or with your further direction.</p>

<p>If you access third-party services, such as Facebook, Google, or Twitter, to login to the Platform or to share information about your usage on the Platform with others, these third-party services may be able to collect information about you, including information about your activity on the Platform, and they may notify your connections on the third-party services about your use of the Platform, in accordance with their privacy policies.</p>

<p>If you choose to engage in public activities on the Platform, you should be aware that any information you share may be read, collected, or used by other users. You should use caution in disclosing personal information while engaging. We are not responsible for the information you choose to submit.</p>

<p>Your Rights You may submit a request to access or delete the information we have collected about you by sending your request to us at the email or physical address provided in the Contact section at the bottom of this policy. We will respond to your request consistent with applicable law and subject to proper verification. And we do not discriminate based on the exercise of any privacy rights that you might have.</p>

<p>Your Choices You may be able to refuse or disable Cookies by adjusting your browser settings. Because each browser is different, please consult the instructions provided by your browser. Please note that you may need to take additional steps to refuse or disable certain types of Cookies. For example, due to differences in how browsers and mobile apps function, you may need to take different steps to disable Cookies used for targeted advertising in a browser and to disable targeted advertising for a mobile application, which you may control through your device settings or mobile app permissions. In addition, your choice to disable cookies is specific to the particular browser or device that you are using when you disable cookies, so you may need to separately disable cookies for each type of browser or device. If you choose to refuse, disable, or delete Cookies, some of the functionality of the Platform may no longer be available to you. Without this information, we are not able to provide you with all the requested services, and any differences in services are related to your information. You can manage third-party advertising preferences for some of the third parties we work with to serve advertising across the Internet by clicking here and by utilizing the choices available at www.networkadvertising.org/managing/opt_out.asp and www.aboutads.info/choices. Your mobile device may include a feature that allows you to opt out of some types of targeted advertising (&quot;Limit Ad Tracking&quot; on iOS and &quot;Opt out of Interest-Based Ads&quot; on Android). You can opt out of marketing or advertising emails by utilizing the &ldquo;unsubscribe&rdquo; link or mechanism noted in marketing or advertising emails. You can switch off GPS location information functionality on your mobile device if you do not wish to share GPS information. If you have registered for an account you may access, review, and update certain personal information that you have provided to us by logging into your account and using available features and functionalities. Some browsers transmit &quot;do-not-track&quot; signals to websites. Because of differences in how browsers incorporate and activate this feature, it is not always clear whether users intend for these signals to be transmitted, or whether they even are aware of them. We currently do not take action in response to these signals. Security We use reasonable measures to help protect information from loss, theft, misuse and unauthorized access, disclosure, alteration, and destruction. You should understand that no data storage system or transmission of data over the Internet or any other public network can be guaranteed to be 100 percent secure. Please note that information collected by third parties may not have the same security protections as information you submit to us, and we are not responsible for protecting the security of such information.</p>

<p>Children The privacy of users under the age of 16, is important to us. If we become aware that personal information has been collected on the Platform from a person under the age of 16 we will delete this information and terminate the person&rsquo;s account. If you believe that we have collected information from a child under the age of 16 on the Platform, please contact us via our contact form.</p>

<p>Other Rights Sharing for Direct Marketing Purposes (Shine the Light) If you are a California resident, once a calendar year, you may be entitled to obtain information about personal information that we shared, if any, with other businesses for their own direct marketing uses. If applicable, this information would include the categories of customer information, as well as the names and addresses of those businesses with which we shared customer information for the immediately prior calendar year. To request a notice, please submit your request to privacy@Pik-Pok.com.</p>

<p>Content Removal for Users Under 18 Users of the Platform who are California residents and are under 18 years of age may request and obtain removal of User Content they posted by emailing us at privacy@Pik-Pok.com. All requests must be labeled &quot;California Removal Request&quot; on the email subject line. All requests must provide a description of the User Content you want removed and information reasonably sufficient to permit us to locate that User Content. We do not accept California Removal Requests via postal mail, telephone, or facsimile. We are not responsible for notices that are not labeled or sent properly, and we may not be able to respond if you do not provide adequate information. Please note that your request does not ensure complete or comprehensive removal of the material. For example, materials that you have posted may be republished or reposted by another user or third party.</p>

<p>Changes We may update this Privacy Policy from time to time. When we update the Privacy Policy, we will notify you by updating the &ldquo;Last Updated&rdquo; date at the top of this policy and posting the new Privacy Policy and providing any other notice required by applicable law. We recommend that you review the Privacy Policy each time you visit the Platform to stay informed of our privacy practices.</p>

<p>Contact Questions, comments and requests regarding this policy should be addressed to:</p>

<p>Mailing Address: Pik-Pok Inc., Attn: Pik-Pok Legal Department 10100 Venice Blvd, Suite 401, Culver City, CA 90232, USA Email Address: privacy@Pik-Pok.com</p>

<p>Last updated: October 2019</p>

<p> SUMMARY What information do we collect about you? We collect and process information you give us when you create an account and upload content to the Platform. This includes technical and behavioural information about your use of the Platform.</p>

<p>How will we use the information about you? We use your information to provide the Platform to you and to improve and administer it. Where it is in our legitimate interests, we use your information to, among other things, improve and develop the Platform and ensure your safety. In each case where we have your consent, we will also use your personal information to serve you targeted advertising and promote the platform. For more information, click here.</p>

<p>Who do we share your information with? We share your data with third party service providers who help us to deliver the Platform including cloud storage providers. We also share your information with business partners, other companies in the same group as Pik-Pok Inc, content moderation services, measurement providers, advertisers and analytics providers. Where required by law, we will share your information with law enforcement agencies or regulators and with third parties pursuant to a legally binding court order. For more information, click here.</p>

<p>Your Rights In certain circumstances, you have rights in relation to your information such as the right to deletion, the right to access and the right of portability. For more information, click here.</p>

<p>How long do we keep hold of your information? We retain your information for as long as it is necessary to provide you with the service so that we can fulfil our contractual obligations and rights in relation to the information involved. Where we do not need your information in order to provide the service to you, we retain it only as long as we have a legitimate business purpose in keeping such data or where we are subject to a legal obligation to retain the data. We will also retain your data if necessary for the establishment, exercise or defence of legal claims. For more information, click here.</p>

<p>How will we notify you of any changes to this Privacy Policy? We will generally notify all users of any material changes to this policy through a notice on our Platform. However, you should look at this policy regularly to check for any changes. We will also update the &ldquo;Last Updated&rdquo; date at the top of this policy, which reflects the effective date of such policy. By accessing or using the Platform, you acknowledge that you have read this policy and that you understand your rights in relation to your personal data and how we will collect, use and process it.</p>
</div>
</div>

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
		</footer><!--footer end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/flatpickr.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>