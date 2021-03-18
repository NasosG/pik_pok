<?php
//include general_session to files user can visit without an account too
include('db/general_session.php');
require('db/db.php');
require('db/error_functions.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Terms Of Use - Pik Pok</title>
    <?php include_once('./includes/head.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/other-styles.css">
</head>

<body>
    <div class="wrapper">

        <?php
        // include header for all web pages
        include_once('./includes/header.php');
        ?>

        <div style="font-size: 16px; line-height: 1.5; padding: 0 8px; margin: auto; margin-top: 100px; margin-bottom: 100px; padding-left: 50px; padding-right: 50px; max-width: 1050px; background:white; border-radius:4px;  border: 2px solid lightgray;">
            <div style="font-size: 16px; padding-bottom: 40px;">
                <h2 class="terms-h2">Terms of Use</h2>
                <hr>
                Welcome to Pik-Pok! <br/><br/> These Terms of Use govern your use of Pik-Pok and provide information about
                the Pik-Pok Service, outlined below. When you create an Pik-Pok account or use Pik-Pok, you agree to these
                terms. <br/>
            </div>
            <div class="terms_section">
                <h3 class="terms-h3"><b>The Pik-Pok Service</b></h3>
                <p>We agree to provide you with the Pik-Pok Service. The Service includes all of the Pik-Pok products,
                    features, applications, services, technologies, and software that we provide to advance Pik-Pok&#039;s
                    mission: To bring you closer to the people and things you love. The Service is made up of the following
                    aspects (the Service):</p>
                <ul class="uiList">
                    <li>
                        <div><b>Offering personalized opportunities to create, connect, communicate, discover, and
                                share.</b><br/> People are different. We want to strengthen your relationships through
                            shared experiences you actually care about. So we build systems that try to understand who and
                            what you and others care about, and use that information to help you create, find, join, and
                            share in experiences that matter to you. Part of that is highlighting content, features, offers,
                            and accounts you might be interested in, and offering ways for you to experience Pik-Pok, based
                            on things you and others do on and off Pik-Pok.
                        </div>
                    </li>
                    <li>
                        <div><b>Fostering a positive, inclusive, and safe environment.</b><br/> We develop and use tools and
                            offer resources to our community members that help to make their experiences positive and
                            inclusive, including when we think they might need help. We also have teams and systems that
                            work to combat abuse and violations of our Terms and policies, as well as harmful and deceptive
                            behavior. We use all the information we have-including your information-to try to keep our
                            platform secure. We also may share information about misuse or harmful content with other
                            Companies or law enforcement. Learn more in the <a href="#data-policy" target="_self">Data
                                Policy</a>.
                        </div>
                    </li>
                    <li>
                        <div><b>Developing and using technologies that help us consistently serve our growing community.</b><br/>
                            Organizing and analyzing information for our growing community is central to our Service. A big
                            part of our Service is creating and using cutting-edge technologies that help us personalize,
                            protect, and improve our Service on an incredibly large scale for a broad global community.
                            Technologies like artificial intelligence and machine learning give us the power to apply
                            complex processes across our Service.
                        </div>
                    </li>
                    <li>
                        <div><b> Research and innovation.</b><br/> We use the information we have to study our Service and
                            collaborate with others on research to make our Service better and contribute to the well-being
                            of our community.
                        </div>
                    </li>
                </ul>
                <br/>
            </div>
            <div class="terms_section">
                <h3 id="data-policy" class="terms-h3"><b>The Data Policy</b></h3>
                <p>Providing our Service requires collecting and using your information. The <a href="#data-policy"
                                                                                                target="_self">Data
                        Policy</a> explains how we collect, use, and share information across the pik pok Products</a>. It
                    also explains the many ways you can control your information, including in the <a href="#"
                                                                                                      target="_self">Pik-Pok
                        Privacy and Security Settings</a>.</p>
                <br/>
            </div>
            <div class="terms_section">
                <h3 class="terms-h3"><b>Your Commitments</b></h3>
                In return for our commitment to provide the Service, we require you to make the below commitments to us.
                <p></p>
                <b>Who Can Use Pik-Pok.</b> We want our Service to be as open and inclusive as possible, but we also want it
                to be safe, secure, and in accordance with the law. So, we need you to commit to a few restrictions in order
                to be part of the Pik-Pok community.
                <ul class="uiList">
                    <li>
                        <div>You must be at least 16 years old.</div>
                    </li>
                    <li>
                        <div>You must not be prohibited from receiving any aspect of our Service under applicable laws or
                            engaging in payments related Services if you are on an applicable denied party listing.
                        </div>
                    </li>
                    <li>
                        <div>We must not have previously disabled your account for violation of law or any of our
                            policies.
                        </div>
                    </li>
                    <li>
                        <div>You must not be a convicted sex offender.</div>
                    </li>
                </ul>
                <p></p>
                <b>How You Can&#039;t Use Pik-Pok.</b> Providing a safe and open Service for a broad community requires that
                we all do our part.
                <ul class="uiList">
                    <li>
                        <div><b>You can&#039;t impersonate others or provide inaccurate information.</b><br/> You don&#039;t
                            have to disclose your identity on Pik-Pok, but you must provide us with accurate and up to date
                            information (including registration information). Also, you may not impersonate someone you aren&#039;t,
                            and you can&#039;t create an account for someone else unless you have their express permission.
                        </div>
                    </li>
                    <li>
                        <div><b>You can&#039;t do anything unlawful, misleading, or fraudulent or for an illegal or
                                unauthorized purpose.</b></div>
                    </li>
                    <li>
                        <div><b>You can&#039;t violate (or help or encourage others to violate) these Terms or our policies,
                                including in particular the <a href="./community_guidelines.php?helpref=page_content"
                                                               target="_self">Pik-Pok Community Guidelines</a> or any other
                                policies that may be added in the future.</b> Learn how to report conduct or content in our
                            <a href="./help_center.php" target="_self">Help Center</a>.
                        </div>
                    </li>
                    <li>
                        <div><b>You can&#039;t do anything to interfere with or impair the intended operation of the
                                Service.</b></div>
                    </li>
                    <li>
                        <div><b>You can&#039;t attempt to create accounts or access or collect information in unauthorized
                                ways.</b><br/> This includes creating accounts or collecting information in an automated way
                            without our express permission.
                        </div>
                    </li>
                    <li>
                        <div><b>You can&#039;t attempt to buy, sell, or transfer any aspect of your account (including your
                                username) or solicit, collect, or use login credentials or badges of other users.</b></div>
                    </li>
                    <li>
                        <div><b>You can&#039;t post private or confidential information or do anything that violates someone
                                else&#039;s rights, including intellectual property.</b><br/> Learn more, including how to
                            report content that you think infringes your intellectual property rights, <a
                                    href="./help_center.php" target="_self">here</a>.
                        </div>
                    </li>
                    <li>
                        <div><b>You can&#039;t use a domain name or URL in your username without our prior written
                                consent.</b></div>
                    </li>
                </ul>
                <b>Permissions You Give to Us.</b> As part of our agreement, you also give us permissions that we need to
                provide the Service.
                <ul class="uiList">
                    <li>
                        <div><b>We do not claim ownership of your content, but you grant us a license to use it.</b><br/>
                            Nothing is changing about your rights in your content. We do not claim ownership of your content
                            that you post on or through the Service. Instead, when you share, post, or upload content that
                            is covered by intellectual property rights (like photos or videos) on or in connection with our
                            Service, you hereby grant to us a non-exclusive, royalty-free, transferable, sub-licensable,
                            worldwide license to host, use, distribute, modify, run, copy, publicly perform or display,
                            translate, and create derivative works of your content (consistent with your privacy and
                            application settings). You can end this license anytime by deleting your content or account.
                            However, content will continue to appear if you shared it with others and they have not deleted
                            it.
                    </li>
                    <li>
                        You grant us the permission to display ads. We always respect your privacy. We will not sell your
                        personal data. For example, we will not show that you liked a sponsored post created by a brand and
                        we do not accept any kind of payment to display its ads on Pik-Pok.
                    <li>
                        <div><b>You agree that we can download and install updates to the Service on your device.</b></div>
                    </li>
                </ul>
                <br/>
            </div>
            <div class="terms_section">
                <h3 class="terms-h3"><b>Additional Rights We Retain</b></h3>
                <ul class="uiList">
                    <li>
                        <div>If you select a username or similar identifier for your account, we may change it if we believe
                            it is appropriate or necessary (for example, if it infringes someone&#039;s intellectual
                            property or impersonates another user).
                        </div>
                    </li>
                    <li>
                        <div>If you use content covered by intellectual property rights that we have and make available in
                            our Service (for example, images, designs, videos, or sounds we provide that you add to content
                            you create or share), we retain all rights to our content (but not yours).
                        </div>
                    </li>
                    <li>
                        <div>You can only use our intellectual property and trademarks or similar marks as expressly
                            permitted only with our prior permission.
                        </div>
                    </li>
                    <li>
                        <div>You must obtain written permission from us or under an open source license to modify, create
                            derivative works of, decompile, or otherwise attempt to extract source code from us.
                        </div>
                    </li>
                </ul>
                <br/>
            </div>
            <div class="terms_section">
                <h3 class="terms-h3"><b>Content Removal and Disabling or Terminating Your Account</b></h3>
                <ul class="uiList">
                    <li>
                        <div>We can remove any content or information you share on the Service if we believe that it
                            violates these Terms of Use, our policies (including our <a href="./community_guidelines.php"
                                                                                        target="_self">Pik-Pok Community
                                Guidelines</a>), or we are required to do so by law. We can refuse to provide or stop
                            providing all or part of the Service to you (including terminating or disabling your account)
                            immediately if you: clearly, seriously or repeatedly violate these Terms of Use, our policies
                            (including our <a href="./community_guidelines.php" target="_self">Pik-Pok Community
                                Guidelines</a>), if you repeatedly infringe other people&#039;s intellectual property
                            rights, or where we are required to do so by law. If we take action to remove your content for
                            violating our Community Guidelines, or disable or terminate your account, we will notify you
                            where appropriate. If you believe your account has been terminated in error, or you want to
                            disable or permanently delete your account, consult our <a href="./help_center.php"
                                                                                       target="_self">Help Center</a>.
                        </div>
                    </li>
                    <li>
                        <div>Content you delete may persist for a limited period of time in backup copies and will still be
                            visible where others have shared it. This paragraph, and the section below called &quot;Our
                            Agreement and What Happens if We Disagree,&quot; will still apply even after your account is
                            terminated or deleted.
                        </div>
                    </li>
                </ul>
                <br/>
            </div>
            <div class="terms_section">
                <h3 class="terms-h3"><b>Our Agreement and What Happens if We Disagree</b></h3>
                <b>Our Agreement.</b>
                <ul class="uiList">
                    <li>
                        <div>Your use of our APIs is subject or related services, you will be provided with an opportunity
                            to agree to additional terms that will also become a part of our agreement. If any of those
                            terms conflict with this agreement, those other terms will govern.
                        </div>
                    </li>
                    <li>
                        <div>If any aspect of this agreement is unenforceable, the rest will remain in effect.</div>
                    </li>
                    <li>
                        <div>Any amendment or waiver to our agreement must be in writing and signed by us. If we fail to
                            enforce any aspect of this agreement, it will not be a waiver.
                        </div>
                    </li>
                    <li>
                        <div>We reserve all rights not expressly granted to you.</div>
                    </li>
                </ul>
                <b>Who Has Rights Under this Agreement.</b>
                <ul class="uiList">
                    <li>
                        <div>This agreement does not give rights to any third parties.</div>
                    </li>
                    <li>
                        <div>You cannot transfer your rights or obligations under this agreement without our consent.</div>
                    </li>
                    <li>
                        <div>Our rights and obligations can be assigned to others. For example, this could occur if our
                            ownership changes (as in a merger, acquisition, or sale of assets) or by law.
                        </div>
                    </li>
                </ul>
                <b>Who Is Responsible if Something Happens.</b>
                <ul class="uiList">
                    <li>
                        <div>We will use reasonable skill and care in providing our Service to you and in keeping a safe,
                            secure, and error-free environment, but we cannot guarantee that our Service will always
                            function without disruptions, delays, or imperfections. Provided we have acted with reasonable
                            skill and care, we do not accept responsibility for: losses not caused by our breach of these
                            Terms or otherwise by our acts; losses which are not reasonably foreseeable by you and us at the
                            time of entering into these Terms; any offensive, inappropriate, obscene, unlawful, or otherwise
                            objectionable content posted by others that you may encounter on our Service; and events beyond
                            our reasonable control.
                        </div>
                    </li>
                    <li>
                        <div>The above does not exclude or limit our liability for death, personal injury, or fraudulent
                            misrepresentation caused by our negligence. It also does not exclude or limit our liability for
                            any other things where the law does not permit us to do so.
                        </div>
                    </li>
                </ul>
                <b>How We Will Handle Disputes.</b>
                <blockquote> If you are a consumer and habitually reside in a Member State of the European Union, the laws
                    of that Member State will apply to any claim, cause of action, or dispute you have against us that
                    arises out of or relates to these Terms (&quot;claim&quot;), and you may resolve your claim in any
                    competent court in that Member State that has jurisdiction over the claim. In all other cases, you agree
                    that the claim must be resolved in a competent court in the Republic of Ireland and that Irish law will
                    govern these Terms and any claim, without regard to conflict of law provisions.
                </blockquote>
                <b>Unsolicited Material.</b>
                <blockquote> We always appreciate feedback or other suggestions, but may use them without any restrictions
                    or obligation to compensate you for them, and are under no obligation to keep them confidential.
                </blockquote>
                <br/>
            </div>
            <div class="terms_section">
                <h3 class="terms-h3"><b>Updating These Terms</b></h3>
                We may change our Service and policies, and we may need to make changes to these Terms so that they
                accurately reflect our Service and policies. Unless otherwise required by law, we will notify you (for
                example, through our Service) at least 30 days before we make changes to these Terms and give you an
                opportunity to review them before they go into effect. Then, if you continue to use the Service, you will be
                bound by the updated Terms. If you do not want to agree to these or any updated Terms, you can delete your
                account, <a href="./help_center.php" target="_self">here</a>. <br/>
            </div>
            <br>
            You declare that you are over the age of 16. If you are under the age of 16, please have your parent or legal
            guardian read this with you. For users who are under the age of 16 but over the age of 13, you as the
            parent/legal guardian of the user declare that you have read and acknowledged Pik Pok's Privacy Policy and Terms
            of Use and agree to the use by your child of the the Platform and registration for an account.
            <br><br>
            <div class="revision">Revised: May 19, 2020</div>
            <br><br>
        </div>
    </div><!--theme-layout end-->

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

</body>

</html>