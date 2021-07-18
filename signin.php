<?php
//include general_session to files user can visit without an account too
include('db/general_session.php');
$redirect_signed_in_users(); //signed in users haven't access to this page
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pik Pok - Login or sign up</title>
    <?php include_once('./includes/head.php'); ?>
    <meta name="google-signin-client_id" content="384750484156-dtnfro1536d097j25sq8q48fn5hh7f8a.apps.googleusercontent.com">
    <!--<script src="https://apis.google.com/js/platform.js" async defer></script>-->
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script>
        function onSuccess(googleUser) {
            alert("ooook");
            console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
            const profile = googleUser.getBasicProfile();
            //console.log('ID: ' + profile.getId());
            //console.log('Full Name: ' + profile.getName());
            // console.log('Given Name: ' + profile.getGivenName());
            // console.log('Family Name: ' + profile.getFamilyName());
            // console.log('Image URL: ' + profile.getImageUrl());
            // console.log('Email: ' + profile.getEmail());
            const fname = profile.getGivenName();
            const lname = profile.getFamilyName();
            const imageUrl = profile.getImageUrl();
            const email = profile.getEmail();
            const date_of_birth = '01/01/1975';
            const psw = '123';

            let values = {
                'username' : email,
                'psw' : psw,
                'fname' : fname,
                'lname' : lname,
                'sex' : 0,
                'email' : email,
                'date_of_birth' : date_of_birth
            };
            $.ajax({
                type: "POST",
                url: 'db/sign_up.php',
                data: values,
                success: function (data) {
                    location.reload();
                    //alert("saved");
                }
            });
        }
        function onFailure(error) {
            //alert("failed!!!!");
            console.log(error);
        }
        function renderButton() {
            gapi.signin2.render('my-signin2', {
                'scope': 'profile email',
                'width': 270,
                'height': 40,
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSuccess,
                'onfailure': onFailure
            });
        }
    </script>
    <style>

        .field-icon {
            float: right;
            position: relative;
            z-index: 2;
            cursor: pointer;
        }

        input[type=text],
        input[type=password],
        input[type=email],
        input[type=date],
        #sex {
            -webkit-transition: all 0.30s ease-in-out;
            -moz-transition: all 0.30s ease-in-out;
            -ms-transition: all 0.30s ease-in-out;
            -o-transition: all 0.30s ease-in-out;
        }

        /* Add a background color when the inputs get focus */
        input[type=text]:focus,
        input[type=password]:focus,
        input[type=email]:focus,
        input[type=date]:focus,
        #sex:focus {
            /*background-color: #F5F5F5;*/
            outline: none;
            /*
            ** blue box shadow and border below
            ** box-shadow: 0 0 5px rgba(81, 203, 238, 1);
            ** border: 1px solid rgba(81, 203, 238, 1);
            */
            box-shadow: 0 0 5px grey;
            border: 1px solid #909090;
        }
    </style>
</head>

<body class="sign-in">
    <div class="wrapper">
        <div class="sign-in-page">
            <div class="signin-popup">
                <div class="signin-pop">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="cmp-info">
                                <div class="cm-logo">
                                    <a href="index.php"><img src="images/pp.png" alt=""></a>
                                    <p>Pik Pok, is the destination for short-form pictures. Our mission is to capture and
                                        present the world's creativity, knowledge, and precious life moments.</p>
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
                                    <form id="sign_in" name="sign_in" method="post" action="db/login.php">
                                        <div class="row">
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="text" id="uname" name="username" placeholder="Username"
                                                           value="<?php if (!empty($_COOKIE["username"])) echo $_COOKIE["username"]; ?>"
                                                           required>
                                                    <i class="fa fa-user"></i>
                                                </div><!--sn-field end-->
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="sn-field">
                                                    <input type="password" id="psw" name="psw" placeholder="Password"
                                                           value="<?php if (!empty($_COOKIE["password"])) echo $_COOKIE["password"]; ?>"
                                                           required>
                                                    <span toggle="#psw" id="toggle_pass"
                                                          class="fa fa-eye fa-2x field-icon toggle-password"></span>
                                                    <i class="fa fa-lock"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 no-pdd">
                                                <div class="checky-sec">
                                                    <div class="fgt-sec">
                                                        <input type="checkbox" name="remember" id="c1">
                                                        <label style="cursor:pointer; " for="c1">
                                                            <span class="remember-me" ></span>
                                                        </label>
                                                        <small>Remember me</small>
                                                    </div><!--fgt-sec end-->
                                                    <a href="forgot_password.php" title="">Forgot Password?</a>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 no-pdd">
                                                <button type="submit" id="submit_signin" value="submit">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="login-resources">
                                        <h4>Login Via Social Account</h4>
                                        <ul>
                                            <li><div id="my-signin2" <!--data-width="270" data-height="35"--> data-onsuccess="onSignIn"></div>
                                            </li>
                                            <!--<li><a href="https://www.facebook.com" title="" class="fb"><i
                                                            class="fa fa-facebook"></i>Login Via Facebook</a></li>-->
                                            <!--<li><a href="https://twitter.com" title="" class="tw"><i
                                                            class="fa fa-twitter"></i>Login Via Twitter</a></li>-->
                                        </ul>
                                    </div><!--login-resources end-->
                                </div><!--sign_in_sec end-->
                                <div class="sign_in_sec" id="tab-2">
                                    <h3>Sign Up</h3>
                                    <div class="dff-tab current" id="tab-3">
                                        <form id="sign_up" name="sign_up" method="post" action="db/sign_up.php"
                                              enctype="multipart/form-data" onsubmit="validatePass();">
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" id="fname" name="fname" placeholder="First Name"
                                                               required>
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" id="lname" name="lname" placeholder="Surname"
                                                               required>
                                                        <i class="fa fa-user-circle"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="date" id="date_of_birth" name="date_of_birth"
                                                               placeholder="date of birth" required min='1900-01-01'>
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
                                                <span id="unique-email-span"></span>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="email" id="email" name="email" placeholder="email"
                                                               pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                                               required>
                                                        <i class="fa fa-at"></i>
                                                        <span></span>
                                                    </div>
                                                </div>
                                                <span id="unique-uname-span"></span>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="text" id="username" name="username"
                                                               placeholder="username" required>
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" id="password" name="psw"
                                                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,}"
                                                               title="password should contain at least 7 characters, one number, one uppercase and one lowercase letter"
                                                               placeholder="Password" onkeyup='check();' required>
                                                        <span toggle="#password" id="toggle_pass"
                                                              class="fa fa-eye fa-2x field-icon toggle-password"></span>
                                                        <i class="fa fa-lock"></i>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="sn-field">
                                                        <input type="password" title="" id="repeat_password"
                                                               name="repeat-password" placeholder="Repeat Password"
                                                               onkeyup='check();' required>
                                                        <span toggle="#repeat_password" id="toggle_pass"
                                                              class="fa fa-eye fa-2x field-icon toggle-password"></span>
                                                        <i class="fa fa-lock"></i>
                                                    </div>
                                                    <span id='message'></span>
                                                </div>

                                                <div class="g-recaptcha mt-1" id="signup_robot"
                                                     data-sitekey="6LfmCc0ZAAAAAMnp0Sxs59aUCInXiUSw1r6tn1EY" required></div>

                                                <div class="col-lg-12 no-pdd">
                                                    <div class="checky-sec st2">
                                                        <div class="fgt-sec">
                                                            <input type="checkbox" name="cc" id="c2" required>
                                                            <label for="c2">
                                                                <span></span>
                                                            </label>
                                                            <small>Yes, I understand and agree to the pik pok <a
                                                                        href="terms_of_use.php">Terms &
                                                                    Conditions.</a></small>
                                                        </div><!--fgt-sec end-->
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <button type="submit" id="submit_signup" value="submit">Get Started
                                                    </button>
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
                        <li><a href="help_center.php" title="">Help Center</a></li>
                        <li><a href="about.php" title="">About</a></li>
                        <!--<li><a href="#" title="">Privacy Policy</a></li>-->
                        <li><a href="community_guidelines.php" title="">Community Guidelines</a></li>
                        <!--<li><a href="#" title="">Cookies Policy</a></li>-->
                        <li><a href="terms_of_use.php" title="">Terms of Use</a></li>
                        <li><a href="#" title="">Language: English</a></li>
                        <!--<li><a href="#" title="">Copyright Policy</a></li>-->
                    </ul>
                    <p><img src="images/copy-icon.png" alt="">Copyright
                        <script type="text/javascript">
                            document.write(new Date().getFullYear());
                        </script>
                    </p>
                </div>
            </div><!--footy-sec end-->
        </div><!--sign-in-page end-->

    </div><!--theme-layout end-->

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/credentialsExistsCheck.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

    <script>
        // today's date
        date = new Date();
        // get date of birth input value
        var input = document.getElementById("date_of_birth");
        // user must be almost 16 years old
        input.setAttribute("max", date.getFullYear() - 16 + "-" + ("0" + (date.getMonth() + 1)).slice(-2) + "-01");

        // google recaptcha is required and should be checked before submitting the form
        window.onload = function () {
            var $recaptcha = document.querySelector('#g-recaptcha-response');

            if ($recaptcha) {
                $recaptcha.setAttribute("required", "required");
            }

        };

        //var form = document.getElementById("sign_in");
        var form_signup = document.getElementById("sign_in_sec");

        document.getElementById("submit_signup").addEventListener("click", function () {
            if (grecaptcha && grecaptcha.getResponse().length > 0) {
                form_signup.submit();
            }
            else {
                // The recaptcha is not checked
                // we display an error message here
                alert('Oops, you have to check the I\'m not a robot box !');
            }

        });
    </script>
    <script>
        /* Passwords do not match functionality */
        var check = function () { //check if passwords are the same

            if (document.getElementById('password').value ==
                document.getElementById('repeat_password').value) {
                document.getElementById('message').innerHTML = null;
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Passwords do not match';
            }
        }

        function validatePass() {
            if (document.getElementById('message').innerHTML == 'Passwords do not match') {
                alert("Passwords do not match");
                event.preventDefault();
            }
        }

        // toggle show/hide password
        $(".toggle-password").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            }
            else {
                input.attr("type", "password");
            }
        });


    </script>
</body>

</html>