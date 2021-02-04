<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
require('db/errorFuncts.php');
?>
	
<!DOCTYPE html>
<html>
<head>
   <title>Guidelines - Pik Pok</title>
   <?php include_once('./includes/head.php'); ?>
   <link rel="stylesheet" type="text/css" href="css/other-styles.css">
</head>


<body oncontextmenu="return false;">
	<div class="wrapper">

	<?php
	// include header for all web pages
	include_once('./includes/header.php');		
	?>
		
	<div style="font-size: 16px; line-height: 1.5; padding: 0 8px; margin: auto; margin-top: 100px; margin-bottom: 100px; padding-left: 50px; padding-right: 50px; max-width: 1050px; background:white; border-radius:4px;  border: 2px solid lightgray;">
   <div id="faq-page">
      <h2 class="terms-h2 ">Community Guidelines</h2><hr>

      <h3 class="terms-h3">The Short</h3>
      <p class="_3p8">We want pik-pok to continue to be an authentic and safe place for inspiration and expression. Help us foster this community. Post only your own photos and videos and always follow the law. Respect everyone on pik-pok, don’t spam people or post nudity.</p>
      <h3 class="terms-h3 pt-2">The Long</h3>
      <p class="_3p8">pik-pok is a reflection of our diverse community of cultures, ages, and beliefs. We’ve spent a lot of time thinking about the different points of view that create a safe and open environment for everyone.</p>
      <p class="_3p8">We created the Community Guidelines so you can help us foster and protect this amazing community. By using pik-pok, you agree to these guidelines and our <a class="_5dwo" href="https://www.pik-pok.com/legal/terms">Terms of Use</a>. We’re committed to these guidelines and we hope you are too. Overstepping these boundaries may result in deleted content, <a class="_5dwo" href="http://help.pik-pok.com/366993040048856?helpref=page_content">disabled accounts</a>, or other restrictions.</p>
      <ul class="uiList">
         <li>
            <div class="fcb">
               <h4>Share only photos and videos that you’ve taken or have the right to share.</h4>
               <p class="_3p8">As always, you own the content you post on pik-pok. Remember to post authentic content, and don’t post anything you’ve copied or collected from the Internet that you don’t have the right to post. Learn more about <a class="_5dwo" href="http://help.pik-pok.com/126382350847838?helpref=page_content">intellectual property rights</a>.</p>
            </div>
         </li>
         <li>
            <div class="fcb">
               <h4>Post photos and videos that are appropriate for a diverse audience.</h4>
               <p class="_3p8">We know that there are times when people might want to share nude images that are artistic or creative in nature, but for a variety of reasons, we don’t allow nudity on pik-pok. This includes photos, videos, and some digitally-created content that show sexual intercourse, genitals, and close-ups of fully-nude buttocks. It also includes some photos of female nipples, but photos of post-mastectomy scarring and women actively breastfeeding are allowed. Nudity in photos of paintings and sculptures is OK, too.</p>
               <p class="_3p8">People like to share photos or videos of their children. For safety reasons, there are times when we may remove images that show nude or partially-nude children. Even when this content is shared with good intentions, it could be used by others in unanticipated ways. You can learn more on our <a class="_5dwo" href="http://help.pik-pok.com/154475974694511?helpref=page_content">Tips for Parents page</a>.</p>
            </div>
         </li>
         <li>
            <div class="fcb">
               <h4>Foster meaningful and genuine interactions.</h4>
               <p class="_3p8">Help us stay spam-free by not artificially collecting likes, followers, or shares, posting repetitive comments or content, or repeatedly contacting people for commercial purposes without their consent. Don’t post content that engages in, promotes, encourages, facilitates, or admits to the offering, solicitation or trade of fake and misleading user reviews or ratings.</p>
               <p class="_3p8">You don’t have to use your real name on pik-pok, but we do require pik-pok users to provide us with accurate and up to date information. Don&#039;t impersonate others and don&#039;t create accounts for the purpose of violating our guidelines or misleading others.</p>
            </div>
         </li>
         <li>
            <div class="fcb">
               <h4>Follow the law.</h4>
               <p class="_3p8">pik-pok is not a place to support or praise terrorism, organized crime, or hate groups. Offering sexual services, buying or selling firearms, alcohol, and tobacco products between private individuals, and buying or selling illegal or prescription drugs (even if legal in your region) are also not allowed. pik-pok also prohibits the sale of live animals between private individuals, though brick-and-mortar stores may offer these sales. No one may coordinate poaching or selling of endangered species or their parts.</p>
               <p class="_3p8">Remember to always follow the law when offering to sell or buy other regulated goods. Accounts promoting online gambling, online real money games of skill or online lotteries must get our prior written permission before using any of our products.</p>
               <p class="_3p8">We have zero tolerance when it comes to sharing sexual content involving minors or threatening to post intimate images of others.</p>
            </div>
         </li>
         <li>
            <div class="fcb">
               <h4>Respect other members of the pik-pok community.</h4>
               <p class="_3p8">We want to foster a positive, diverse community. We remove content that contains credible threats or hate speech, content that targets private individuals to degrade or shame them, personal information meant to blackmail or harass someone, and repeated unwanted messages. We do generally allow stronger conversation around people who are featured in the news or have a large public audience due to their profession or chosen activities. </p>
               <p class="_3p8">It&#039;s never OK to encourage violence or attack anyone based on their race, ethnicity, national origin, sex, gender, gender identity, sexual orientation, religious affiliation, disabilities, or diseases. When hate speech is being shared to challenge it or to raise awareness, we may allow it. In those instances, we ask that you express your intent clearly.</p>
               <p class="_3p8">Serious threats of harm to public and personal safety aren&#039;t allowed. This includes specific threats of physical harm as well as threats of theft, vandalism, and other financial harm. We carefully review reports of threats and consider many things when determining whether a threat is credible. </p>
            </div>
         </li>
         <li>
            <div class="fcb">
               <h4>Maintain our supportive environment by not glorifying self-injury.</h4>
               <p class="_3p8">The pik-pok community cares for each other, and is often a place where people facing difficult issues such as eating disorders, cutting, or other kinds of self-injury come together to create awareness or find support. We try to do our part by providing education in the app and adding information in the <a class="_5dwo" href="http://help.pik-pok.com/?helpref=page_content">Help Center</a> so people can get the help they need.</p>
               <p class="_3p8">Encouraging or urging people to embrace self-injury is counter to this environment of support, and we’ll remove it or disable accounts if it’s reported to us. We may also remove content identifying victims or survivors of self-injury if the content targets them for attack or humor.</p>
            </div>
         </li>
         <li>
            <div class="fcb">
               <h4>Be thoughtful when posting newsworthy events.</h4>
               <p class="_3p8">We understand that many people use pik-pok to share important and newsworthy events. Some of these issues can involve graphic images. Because so many different people and age groups use pik-pok, we may remove videos of intense, graphic violence to make sure pik-pok stays appropriate for everyone.</p>
               <p class="_3p8">We understand that people often share this kind of content to condemn, raise awareness or educate. If you do share content for these reasons, we encourage you to caption your photo with a warning about graphic violence. Sharing graphic images for sadistic pleasure or to glorify violence is never allowed.</p>
            </div>
         </li>
      </ul>
      <div>
      	<h3 class="terms-h3">Help us keep the community strong:</h3>
      </div>
      <ul>
         <li>
            <p class="pt-1">Each of us is an important part of the pik-pok community. If you see something that you think may violate our guidelines, please help us by using our <a class="_5dwo" href="http://help.pik-pok.com/165828726894770?helpref=page_content">built-in reporting option</a>. We have a global team that reviews these reports and works as quickly as possible to remove content that doesn’t meet our guidelines. Even if you or someone you know doesn’t have an pik-pok account, you can still <a class="_5dwo" href="http://help.pik-pok.com/contact/383679321740945?helpref=page_content">file a report</a>. When you complete the report, try to provide as much information as possible, such as links, usernames, and descriptions of the content, so we can find and review it quickly. We may remove entire posts if either the imagery or associated captions violate our guidelines. </p>
         </li>
         <li>
            <p class="pt-1">You may find content you don’t like, but doesn’t violate the Community Guidelines. If that happens, you can <a class="_5dwo" href="http://help.pik-pok.com/286340048138725?helpref=page_content">unfollow</a> or <a class="_5dwo" href="http://help.pik-pok.com/426700567389543?helpref=page_content">block</a> the person who posted it. If there&#039;s something you don&#039;t like in a comment on one of your posts, you can <a class="_5dwo" href="http://help.pik-pok.com/289098941190483?helpref=page_content">delete that comment</a>.</p>
         </li>
         <li>
            <p class="pt-1">Many disputes and misunderstandings can be resolved directly between members of the community. If one of your photos or videos was posted by someone else, you could try commenting on the post and asking the person to take it down. If that doesn’t work, you can <a class="_5dwo" href="http://help.pik-pok.com/126382350847838?helpref=page_content">file a copyright report</a>. If you believe someone is violating your trademark, you can <a class="_5dwo" href="http://help.pik-pok.com/222826637847963?helpref=page_content">file a trademark report</a>. Don&#039;t target the person who posted it by posting screenshots and drawing attention to the situation because that may be classified as harassment.</p>
         </li>
         <li>
            <p class="fcb">We may work with law enforcement, including when we believe that there’s risk of physical harm or threat to public safety.</p>
         </li>
      </ul>
      <p class="pt-3">For more information, check out our <a href="http://help.pik-pok.com/?helpref=page_content">Help Center</a> and <a href="http://pik-pok.com/legal/terms/#">Terms of Use</a>.</p>
      <p class="">Thank you for helping us create one of the best communities in the world,</p>
      <p class="pb-3">The pik-pok Team</p>
   </div>
</div>
</div></div>
</div><!--theme-layout end-->



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>