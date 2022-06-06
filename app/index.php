<?php include "inc/conf.php"; 
$isLogend = isLoged();
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>University Lockers Reservation System</title>
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/fonts/avenir/stylesheet.css">
<link rel="stylesheet" href="../assets/fonts/circularSTD/stylesheet.css">
<link rel="stylesheet" href="../assets/fonts/helvetica/stylesheet.css">


<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

<link rel="stylesheet" href="../assets/css/jquery-ui.css">

<link rel="stylesheet" href="../assets/css/sm-core-css.css" />
<link rel="stylesheet" href="../assets/css/sm-simple.css" />

<link rel="stylesheet" href="../assets/css/font-awesome.min.css">

<link rel="stylesheet" href="../assets/flaticon/flaticon.css">

<link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
<link rel="stylesheet" href="../assets/css/owl.theme.default.min.css">

<link rel="stylesheet" href="../assets/css/flipping_gallery.css">
<link rel="stylesheet" href="../assets/css/jquery.fancybox.min.css" />

<link rel="stylesheet" href="../assets/slick/slick-theme.css">
<link rel="stylesheet" href="../assets/slick/slick.css">

<link href="../assets/YoutubeVideoModalPlugin/jquery.yu2fvl.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="../assets/css/animate.css">

<link rel="stylesheet" href="../assets/css/aos.css" />

<link rel="stylesheet" href="../assets/css/style.css">

<link rel="stylesheet" href="../assets/css/responsive.css">

<link rel="shortcut icon" type="image/png" href="../assets/img/favicon.ico">


<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
<div id="preloader"></div>

<header class="qniko-header qhV2">
<div class="header-box">
<div class="row">
<div class="col-md-8">
<nav class="main-nav qnikoNav" role="navigation">

<input id="QnikoMenu-state" type="checkbox" />
<label class="QnikoMenu-btn" for="QnikoMenu-state">
<span class="QnikoMenu-btn-icon"></span>
</label>
<div class="nav-brand">
<a href="#">
<img src="../assets/img/logo.png" alt="">
</a>
</div>

<ul id="QnikoMenu" class="sm sm-simple qnikoMenu">
        <li>
        <a href="index.php">Home</a>
        </li>
        <li><a href="#about">About</a></li>
        <li><a href="#FEATURES">Features</a></li>
        <li><a href="request.php">Your Orders</a></li>
</ul>

</nav>
</div>
<div class="col-md-4">
        <div class="qnRight">
         <?php if(!$isLogend): ?>
                <a href="login.php" class="btn-style-a">Login</a>
        <?php else: ?>
                <a href="logout.php" class="btn-style-a">Logout</a>
        <?php endif ?>
        </div>
</div>
</div>
</div>
</header>


<div class="side-panel hide">
<div class="sp-box">
<div class="sp-close">
<span class="close-sp"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
</div>
<div class="sp-logo">
<a href="#">
<img src="../assets/img/logo.png" alt="">
</a>
</div>
<div class="sp-text">
<p>We create experience that transform brands, grow business and make people live better. Let's create something special together.</p>
</div>
 <div class="sp-recent-post">
<h4>Recent Post</h4>
<div class="sp-single-rp">
<div class="ssrp-img">
<img src="../assets/img/blog/hblog3-1.jpg" alt="">
</div>
<div class="ssrp-text">
<a href="#">Best marketing tools.</a>
<span class="date-meta"><i class="fa fa-calendar" aria-hidden="true"></i>01 Dec 2019 </span>
</div>
</div>
<div class="sp-single-rp">
<div class="ssrp-img">
<img src="../assets/img/blog/hblog3-2.jpg" alt="">
</div>
<div class="ssrp-text">
<a href="#">Latest SEO Technic</a>
<span class="date-meta"><i class="fa fa-calendar" aria-hidden="true"></i>25 Nov 2019 </span>
</div>
</div>
<div class="sp-single-rp">
<div class="ssrp-img">
<img src="../assets/img/blog/hblog3-3.jpg" alt="">
</div>
<div class="ssrp-text">
<a href="#">Top rated agency</a>
<span class="date-meta"><i class="fa fa-calendar" aria-hidden="true"></i>30 Nov 2019 </span>
</div>
</div>
</div>
<div class="sp-contact">
<h4>Contact</h4>
<div class="spc-text">
<p>143 castle road 517 district,
kiyev port south, New York</p>
<h5>Phone:</h5>
<p>8 800 2534 236</p>
<h5>Email:</h5>
<p><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a8cdc5c9c1c4e8cdd0c9c5d8c4cd86cbc7c5">[email&#160;protected]</a></p>
</div>
</div>
<div class="sp-social">
<ul class="social-list">
<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>


<section class="hero-area heroV2">
<div class="container">
<div class="hero-content">
<div class="row">
<div class="col-md-7">
<div class="hero-text">
<h2 data-aos="fade-right" data-aos-delay="150" data-aos-duration="1000">
        University <span class="hcolor_a">Lockers </span>Reservation <span class="hcolor_b">System.</span>
</h2>
<p data-aos="fade-right" data-aos-delay="250" data-aos-duration="1000" >
        An electronic system to assist the university in managing the locker reservation process. The system administrator can log into the system and edit the information of the lockers.
</p>
<div class="hero-btn" data-aos="flip-up" data-aos-delay="100" data-aos-duration="2000">
<a href="locker.php" class="btn-style-d">Get Started Now<i class='flaticon-right'></i></a>
</div>
</div>
</div>
<div class="col-md-5">
<div class="hero-img" data-aos="fade" data-aos-delay="50" data-aos-duration="1000">
<img src="../assets/img/section-img/hero2-img.png" alt="">
</div>
</div>
</div>
</div>
 </div>
</section>


<section class="features-area" id="FEATURES">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="section-titleV1">
<p data-aos="fade" data-aos-delay="50" data-aos-duration="1000">Features</p>
<h3 data-aos="fade" data-aos-delay="100" data-aos-duration="1000">Lockers Features</h3>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4" data-aos="fade" data-aos-delay="100" data-aos-duration="1000">
<div class="single-hiw single-features">
<div class="sh-icon">
<img src="../assets/img/icons/service-1.png" alt="">
</div>
<div class="sh-text">
<h4>Automate</h4>
<p>Minimizing personal contact between students and staff.  </p>
</div>
</div>
</div>
<div class="col-md-4" data-aos="fade" data-aos-delay="200" data-aos-duration="1000">
<div class="single-hiw single-features">
<div class="sh-icon">
<img src="../assets/img/icons/service-2.png" alt="">
</div>
<div class="sh-text">
<h4>Efficiency</h4>
<p>Increase the efficiency of the use of lockers.</p>
</div>
</div>
</div>
<div class="col-md-4" data-aos="fade" data-aos-delay="300" data-aos-duration="1000">
<div class="single-hiw single-features">
<div class="sh-icon">
<img src="../assets/img/icons/service-3.png" alt="">
</div>
<div class="sh-text">
<h4>Secure</h4>
<p>Facilities the reservation of lockers for students on campuses.</p>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="collaboration-area" id="about">
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="collaboration-img" data-aos="fade" data-aos-delay="100" data-aos-duration="1000">
<img src="../assets/img/section-img/collaborationt-img.png" alt="">
</div>
</div>
<div class="col-md-6">
<div class="collaboration-text">
<div class="section-titleV1">
<p data-aos="fade" data-aos-delay="150" data-aos-duration="1000">COLLABORATION</p>
<h3 data-aos="fade" data-aos-delay="200" data-aos-duration="1000">Learn More About our Lockers Reservation System</h3>
</div>
<div class="section-text">
<p style="text-align: justify;" data-aos="fade" data-aos-delay="250" data-aos-duration="1000">An electronic system to assist the university in managing the locker reservation process. The system administrator can log into the system and edit the information of the lockers, s/he can add the campus and the buildings then lockers that are available already. In addition to registering new lockers, or deleting any existing lockers. The employee can also update and modify locker statuses such as (Available, Busy, Need Maintenance). </p>
<div class="stext" data-aos="flip-up" data-aos-delay="50" data-aos-duration="1000">
<a href="#" class="btn-style-d">Learn More<i class='flaticon-right'></i></a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<footer class="footerV2-area">
<div class="graphicanimation-area">
<div class="ga-set-A">
<ul>
<li><img src="../assets/img/graphic/set-a/g-1.png" alt=""></li>
<li><img src="../assets/img/graphic/set-a/g-2.png" alt=""></li>
<li><img src="../assets/img/graphic/set-a/g-3.png" alt=""></li>
<li><img src="../assets/img/graphic/set-a/g-4.png" alt=""></li>
<li><img src="../assets/img/graphic/set-a/g-5.png" alt=""></li>
<li><img src="../assets/img/graphic/set-a/g-6.png" alt=""></li>
<li><img src="../assets/img/graphic/set-a/g-8.png" alt=""></li>
<li><img src="../assets/img/graphic/set-a/g-9.png" alt=""></li>
<li><img src="../assets/img/graphic/set-a/g-10.png" alt=""></li>
<li><img src="../assets/img/graphic/set-a/g-11.png" alt=""></li>
<li><img src="../assets/img/graphic/set-a/g-12.png" alt=""></li>
<li><img src="../assets/img/graphic/set-a/g-13.png" alt=""></li>
<li><img src="../assets/img/graphic/set-a/g-14.png" alt=""></li>
</ul>
</div>
</div>
<div class="container">

<div class="footer-copyright">
<div class="row">
<div class="col-md-12">
<div class="copyright-text text-center">
<p>© 2022 All Rights Reserved</p>
</div>
</div>
</div>
</div>
</div>
</footer>



<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../assets/js/jquery-3.2.0.min.js"></script>
<script src="../assets/js/jquery-ui.js"></script>

<script src="../assets/js/jquery.smartmenus.min.js"></script>

<script src="../assets/js/owl.carousel.min.js"></script>

<script src="../assets/slick/slick.min.js"></script>

<script src="../assets/js/jquery.counterup.min.js"></script>
<script src="../assets/js/countdown.js"></script>
<script src="../assets/js/jquery.scrollUp.js"></script>
<script src="../assets/js/jquery.waypoints.min.js"></script>
<script src="../assets/js/shuffle.min.js"></script>
<script src="../assets/js/jquery.fancybox.min.js"></script>
<script src="../assets/js/wow.min.js"></script>

<script src="../assets/js/aos.js"></script>

<script src="../assets/js/jquery.flipping_gallery.js"></script>

<script src="../assets/YoutubeVideoModalPlugin/jquery.yu2fvl.js"></script>

<script src="../assets/js/bootstrap.min.js"></script>

<script src="../assets/js/theme.js"></script>
</body>
</html>
