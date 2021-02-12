<?php
include("db/auth.php"); //include auth.php file on all secure pages 
require('db/db.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Help Center - Pik-Pok</title>
    <?php include_once('./includes/head.php'); ?>
</head>

<body>

    <div class="wrapper">

        <?php
        // include header for all web pages
        include_once('./includes/header.php');
        ?>

        <main>
            <div class="main-section">
                <div class="container">
                    <div class="main-section-data">
                        <div class="row">
                            <div class="col-lg-3 col-md-12">
                                <div class="filter-secs">
                                    <div class="filter-heading">
                                        <h3>Home</h3>
                                    </div><!--filter-heading end-->
                                    <div class="paddy help-paddy">
                                        <div class="filter-dd">
                                            <div class="filter-ttl filter--tt2">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Getting
                                                        Started</a>
                                                    <div class="dropdown-menu">
                                                        <a href="#" class="dropdown-item top--1 ">Searching of Pik-Pok</a>
                                                        <a href="#" class="dropdown-item">Email from Pik-Pok</a>
                                                        <a href="#" class="dropdown-item">Managing Your Feed</a>
                                                        <a href="#" class="dropdown-item">Post a Job</a>
                                                        <a href="#" class="dropdown-item">Post a Project</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filter-dd">
                                            <div class="filter-ttl filter--tt2">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage Your
                                                        Account</a>
                                                    <div class="dropdown-menu">
                                                        <a href="#" class="dropdown-item top--1 ">Account Access</a>
                                                        <a href="#" class="dropdown-item">Account Setting</a>
                                                        <a href="#" class="dropdown-item">Privacy</a>
                                                        <a href="#" class="dropdown-item">Notification</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filter-dd">
                                            <div class="filter-ttl filter--tt2">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Build Your
                                                        Profile</a>
                                                    <div class="dropdown-menu">
                                                        <a href="#" class="dropdown-item top--1 ">Build User Profile</a>
                                                        <a href="#" class="dropdown-item">Build Company Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="filter-dd">
                                            <div class="filter-ttl filter--tt2">
                                                <a href="#">Pik Pok Security</a>
                                            </div>
                                        </div>
                                        <div class="filter-dd">
                                            <div class="filter-ttl filter--tt2">
                                                <a href="#">Discovering People</a>
                                            </div>
                                        </div>
                                        <div class="filter-dd">
                                            <div class="filter-ttl filter--tt2">
                                                <a href="#">Billiing & Payments</a>
                                            </div>
                                        </div>
                                        <div class="filter-dd">
                                            <div class="filter-ttl accountnone filter--tt2">
                                                <a href="#">Reset Your Account</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--filter-secs end-->
                            </div>
                            <div class="col-lg-9 col-md-12"><!-- end-helpforum -->
                                <div class="actions">
                                    <div class="actionstitle">
                                        <h3><img src="images/rocket.png" alt="image"> Popular Actions</h3>
                                        <hr>
                                    </div>
                                    <div class="actionstext">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <a href="#">Create a Pik Pok account</a>
                                                <a href="#">Change or add email address</a>
                                                <a href="#">Reset your password</a>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <a href="#">Manage emails you get from Pik-Pok</a>
                                                <a href="#">Make your password strong</a>
                                                <a href="#">Close your account</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="actions">
                                    <div class="actionstitle">
                                        <h3><img src="images/icon2.png" alt="image"> Suggested for you</h3>
                                        <hr>
                                    </div>
                                    <div class="actionstext">
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="#">Pik-Pok Homepage - FAQ</a>
                                                <hr>
                                                <a href="#">Pik-Pok Public Profile Visibility</a>
                                                <hr>
                                                <a href="#">Editing Your Profile</a>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- main-section-data end-->
                </div>
            </div>
        </main>

        <div class="post-popup pst-pj">
            <div class="post-project">
                <h3>Post a project</h3>
                <div class="post-project-fields">
                    <form>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="title" placeholder="Title">
                            </div>
                            <div class="col-lg-12">
                                <div class="inp-field">
                                    <select>
                                        <option>Category</option>
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                        <option>Category 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="skills" placeholder="Skills">
                            </div>
                            <div class="col-lg-12">
                                <div class="price-sec">
                                    <div class="price-br">
                                        <input type="text" name="price1" placeholder="Price">
                                        <i class="fa fa-dollar"></i>
                                    </div>
                                    <span>To</span>
                                    <div class="price-br">
                                        <input type="text" name="price1" placeholder="Price">
                                        <i class="fa fa-dollar"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <textarea name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <ul>
                                    <li>
                                        <button class="active" type="submit" value="post">Post</button>
                                    </li>
                                    <li><a href="#" title="">Cancel</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div><!--post-project-fields end-->
                <a href="#" title=""><i class="fa fa-times-circle-o"></i></a>
            </div><!--post-project end-->
        </div><!--post-project-popup end-->

        <div class="post-popup job_post">
            <div class="post-project">
                <h3>Post a job</h3>
                <div class="post-project-fields">
                    <form>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="title" placeholder="Title">
                            </div>
                            <div class="col-lg-12">
                                <div class="inp-field">
                                    <select>
                                        <option>Category</option>
                                        <option>Category 1</option>
                                        <option>Category 2</option>
                                        <option>Category 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" name="skills" placeholder="Skills">
                            </div>
                            <div class="col-lg-6">
                                <div class="price-br">
                                    <input type="text" name="price1" placeholder="Price">
                                    <i class="fa fa-dollar"></i>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="inp-field">
                                    <select>
                                        <option>Full Time</option>
                                        <option>Half time</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <textarea name="description" placeholder="Description"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <ul>
                                    <li>
                                        <button class="active" type="submit" value="post">Post</button>
                                    </li>
                                    <li><a href="#" title="">Cancel</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div><!--post-project-fields end-->
                <a href="#" title=""><i class="fa fa-times-circle-o"></i></a>
            </div><!--post-project end-->
        </div><!--post-project-popup end-->

    </div><!--theme-layout end-->

    <footer class="fixed-bottom">
        <div class="footy-sec mn no-margin">
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
                <p><img src="images/copy-icon2.png" alt="">Copyright
                    <script type="text/javascript">
                        document.write(new Date().getFullYear());
                    </script>
                </p>
                <img class="fl-rgt" src="images/logo2.png" alt="">
            </div>
        </div>
    </footer>
    <!--footer end-->

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>