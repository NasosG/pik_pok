<header class="sticky-top">
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
                    if (isset($_SESSION['username'])) {
                        // find user id from session name
                        $query_picture = "SELECT email, fname, lname, picture_path, profile_pic, bio FROM members WHERE username = '$uname'";
                        $result_picture = mysqli_query($con, $query_picture);
                        $row_picture = mysqli_fetch_array($result_picture);
                        $picture_path = $row_picture['picture_path'];
                        $picture_name = $row_picture['profile_pic'];
                        $fname = $row_picture['fname'];
                        $lname = $row_picture['lname'];
                        $email = $row_picture['email'];
                        $bio = $row_picture['bio'];
                        //mysqli_close($con);
                        echo "
                        <div class='user-account'>
                            <div class='user-info'>
                                <img style=\"width:32px; height:32px;\" src=\"" . $picture_path . $picture_name . "\" alt=\"users photo\"/>
                                
                                <a href='profile3.php' title=''>"; ?>
                        <?php if (isset($_SESSION['username'])) echo $_SESSION['username'];
                        echo "</a>
                                <i class='fa fa-angle-down'></i>
                            </div>
                            <div class='user-account-settingss'>
                                <h3>Online Status</h3>
                                <ul class='on-off-status'>
                                    <li>
                                        <div class='fgt-sec'>
                                            <input type='radio'";
                                            if (get_status($con, $_SESSION['username']) === 'online') echo 'checked="checked"';
                                            echo "name='cc' id='c5'>
                                            <label class='cursor-pointer' for='c5'>
                                                <span></span>
                                            </label>
                                            <small>Online</small>
                                        </div>
                                    </li>
                                    <li>
                                        <div class='fgt-sec'>
                                            <input type='radio' style='cursor:pointer;'";
                                            if (get_status($con, $_SESSION['username']) === 'offline') echo 'checked="checked"';
                                            echo "name='cc' id='c6'>
                                            <label class='cursor-pointer' for='c6'>
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
                                    <li><a href='profile_account_setting.php' title=''>Account Setting</a></li>
                                    <li><a href='privacy_policy.php' title=''>Privacy</a></li>
                                    <li><a href='terms_of_use.php' title=''>Terms & Conditions</a></li>
                                </ul>
                                <h3 class='tc'><a href='db/logout.php' title=''>Logout</a></h3>
                            </div><!--user-account-settingss end-->
                        </div>
                        ";
                    } else
                        echo "<div class='user-account'>
                            <div class='user-info' style='margin-left:auto; margin-right:auto;'>
                                
                                <a href='signin.php' title=''> <i class='fa fa-sign-in fa-lg'></i> Sign In</a>
                                
                            </div>
                        ";
                    ?>
                </div><!--header-data end-->
            </div>
        </header><!--header end-->