<!DOCTYPE html>
<html>
<head>
    <link rel='shortcut icon' type='image/x-icon' href='images/logo.png'/>
    <meta charset="UTF-8">
    <title>Errors - Pik Pok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="../lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="../lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <!-- font awesome icons kit -->
    <script src="https://kit.fontawesome.com/fac8ebb301.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="wrapper">
    <header>
        <div class="container">
            <div class="header-data">
                <div class="logo">
                    <a href="../index.php" title=""><img src="../images/logo.png" alt=""></a>
                </div><!--logo end-->
                <div class="search-bar">
                    <form method="get" action="../index.php">
                        <input type="text" name="search" placeholder="Search...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div><!--search-bar end-->
                <nav>
                    <ul>
                        <li>
                            <a href="../index.php" title="">
                                <span>
                                    <i style="font-size:1.2em;" class="fa fa-home"></i>
                                </span>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="../top.php" title="">
                                <span>
                                    <i class="fa fa-thumbs-up "></i>
                                </span>
                                Trending
                            </a>
                        </li>
                        <li>
                            <a href="../contact.php" title="">
                                <span>
                                    <i class="fa fa-id-card"></i>
                                </span>
                                Contact
                            </a>
                        </li>
                    </ul>
                </nav><!--nav end-->
                <div class="menu-btn">
                    <a href="#" title=""><i class="fa fa-bars"></i></a>
                </div><!--menu-btn end-->


                <?php
                if (isset($_SESSION['username'])) {
                    header('Location:../index.php');
                }
                else
                    echo "<div class='user-account'>
                        <div class='user-info' style='margin-left:auto; margin-right:auto;'>
                            <a href='../signin.php' title=''> <i class='fa fa-sign-in fa-lg'></i> Sign In</a>
                        </div>
                    ";
                ?>


            </div><!--header-data end-->
        </div>
    </header><!--header end-->