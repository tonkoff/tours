<?php require_once 'functions.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>About</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <!-- <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico" /> -->



    <link rel="stylesheet" href="booking/css/booking.css">
    <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/loginForm.css">
    <link rel="stylesheet" href="css/loginForm1.css">

    <!--    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->


    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/script.js"></script>
    <script src="js/superfish.js"></script>
    <script src="js/jquery.ui.totop.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <script src="js/jquery.mobilemenu.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/camera.js"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->
    <script src="booking/js/booking.js"></script>
    <script>
        $(document).ready(function(){
            jQuery('#camera_wrap').camera({
                loader: false,
                pagination: false ,
                minHeight: '444',
                thumbnails: false,
                height: '48.375%',
                caption: true,
                navigation: true,
                fx: 'mosaic'
            });
            /*carousel*/
            var owl=$("#owl");
            owl.owlCarousel({
                items : 2, //10 items above 1000px browser width
                itemsDesktop : [995,2], //5 items between 1000px and 901px
                itemsDesktopSmall : [767, 2], // betweem 900px and 601px
                itemsTablet: [700, 2], //2 items between 600 and 0
                itemsMobile : [479, 1], // itemsMobile disabled - inherit from itemsTablet option
                navigation : true,
                pagination : false
            });
            $().UItoTop({ easingType: 'easeOutQuart' });
        });
    </script>
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <link rel="stylesheet" media="screen" href="css/ie.css">
    <![endif]-->
</head>
<body class="page1" id="top">
<!--==============================header=================================-->
<header>
    <div class="container_12">
        <div class="grid_12">
            <div class="menu_block">
                <nav class="horizontal-nav full-width horizontalNav-notprocessed">
                    <ul class="sf-menu">
                        <li class="current"><a href="index.php">Home</a></li>
                        <li><a href="index.php?c=toursf&m=latestoffers">LATEST OFFERS</a></li>
                        <li><a href="index.php?c=toursf">TOURS</a></li>
                        <li><a href="index.php?c=blogf">BLOG</a></li>
                        <li><a href="index.php?c=contactf">CONTACTS</a></li>
                        <li>
                            <?php if (!loggedInClient()) { ?>
                                <a href="index.php?c=loginf">Login</a>
                            <?php } ?>
                        </li>
                        <li>
                            <?php if (loggedInClient()) { ?>
                                <a href="index.php?c=loginf&m=logout">Logout</a>
                            <?php } ?>
                        </li>
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
        </div>
        <div class="grid_12">

        </div>
    </div>
</header>
<div class="slider_wrapper">
    <div id="camera_wrap" class="">
        <div data-src="images/slide.jpg"></div>
        <div data-src="images/slide1.jpg"></div>
        <div data-src="images/slide2.jpg"></div>

    </div>
</div>





<div class="form">

    <ul class="tab-group">
        <li class="tab active "><a href="#signup">Sign Up</a></li>
        <li class="tab "><a href="#login">Log In</a></li>
    </ul>

    <div class="tab-content">
        <div id="signup">
            <h1>Sign Up for Free</h1>
            <p style="color: red"><?php echo array_key_exists('username', $errors)? $errors['username'] : ''; ?></p>
            <form action="" method="post" name="">

                <div class="top-row">
                    <div class="field-wrap">
                        <label>
                            Username<span class="req">*</span>
                        </label>
                        <input type="text" id="inputUsername" name="username" required autocomplete="off" />
                    </div>

                    <div class="field-wrap">


                    </div>
                </div>

                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" name="email" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Set A Password<span class="req">*</span>
                    </label>
                    <input type="password" name="password" required autocomplete="off"/>
                </div>

                <input type="submit" name="createUser" class="button button-block" value="Get Started">


            </form>

        </div>

        <div id="login">

            <h1>Welcome Back!</h1>
            <p style="color: red"><?php echo array_key_exists('error', $errors)? $errors['error'] : ''; ?></p>

            <form action="" method="post" name="Login_Form">

                <div class="field-wrap">

                    <label>
                        Username<span class="req">*</span>
                    </label>

                    <input type="text" name="username" required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" name="password" required autocomplete="off"/>
                </div>

                <p class="forgot"><a href="#">Forgot Password?</a></p>

                <input type="submit" class="button button-block"  name="submit" value="Login" />



            </form>

        </div>

    </div><!-- tab-content -->

</div> <!-- /form -->


<script src="js/loginForm.js"></script>


</body>
</html>

<?php require_once 'footer.php' ?>