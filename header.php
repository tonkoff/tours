<?php
require_once "functions.php";
?>
<?php
 $toursCollection = new ToursCollection();
 $toursHeader = $toursCollection->getF(array(), $limit = -1, $offset = -0, $like = null, $orderBy = array());

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>About</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <!-- <link rel="icon" href="images/favicon.ico">
    <link rel="shortcut icon" href="images/favicon.ico" /> -->
    <link rel="stylesheet" href="booking/css/booking.css">
    <link rel="stylesheet" href="css/camera.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
    <link href="css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
        $(document).ready(function () {
            jQuery('#camera_wrap').camera({
                loader: false,
                pagination: false,
                minHeight: '444',
                thumbnails: false,
                height: '48.375%',
                caption: true,
                navigation: true,
                fx: 'mosaic'
            });
            /*carousel*/
            var owl = $("#owl");
            owl.owlCarousel({
                items: 2, //10 items above 1000px browser width
                itemsDesktop: [995, 2], //5 items between 1000px and 901px
                itemsDesktopSmall: [767, 2], // betweem 900px and 601px
                itemsTablet: [700, 2], //2 items between 600 and 0
                itemsMobile: [479, 1], // itemsMobile disabled - inherit from itemsTablet option
                navigation: true,
                pagination: false
            });
            $().UItoTop({easingType: 'easeOutQuart'});
        });
    </script>
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
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
        <?php if(loggedInClient()) { ?>
            <div class="username">
                <p>Hello:</p>
                <?php echo $_SESSION['client'][0]->getUsername(); ?>
            </div>
        <?php } ?>

        <div class="grid_12">
            <h1>
                <a href="index.html">
                    <img src="images/logo.png" alt="Your Happy Family">
                </a>
            </h1>
        </div>
    </div>
</header>


<div class="slider_wrapper">
    <div id="camera_wrap" class="">
        <?php foreach ($toursHeader as $value) : ?>

            <div data-src="admin/uploads/<?php echo $value->getImage(); ?>">
                <div class="caption fadeIn">
                    <h2><?php echo $value->getName(); ?></h2>
                    <div class="price">
                        ОТ
                        <span><?php echo $value->getTourPrice(); ?>лв</span>
                    </div>
                    <a href="common/views/frontend/tours/singleTour.php?id=<?php echo $value->getId(); ?>">LEARN MORE</a>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

