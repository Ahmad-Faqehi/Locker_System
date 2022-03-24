<?php 
include "inc/conf.php";

if(!isLoged()){
    header("Location: index.html");
    die();
}
$userid = $_SESSION['user:id'];
$sql = "SELECT * FROM booking INNER JOIN students ON booking.student_id = students.id WHERE students.id = $userid";
$lockers = $conn->query($sql)->fetch();
$has_req = true;
$msg = "";
// print_r($lockers);
// die();
if(empty($lockers)){

    $msg = '<div class="alert alert-danger" role="alert">
    Your do not have request yet !!
  </div>';
  $has_req = false;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>Qniko - Startup Agency HTML Template</title>
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

<link rel="stylesheet" href="../assets/fonts/avenir/stylesheet.css">
<link rel="stylesheet" href="../assets/fonts/circularSTD/stylesheet.css">
<link rel="stylesheet" href="../assets/fonts/helvetica/stylesheet.css">
<link rel="stylesheet" href="../assets/fonts/gilroy/stylesheet.css">


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

<link rel="stylesheet" href="../assets/css/xzoom.css" />

<link rel="stylesheet" href="../assets/slick/slick-theme.css">
<link rel="stylesheet" href="../assets/slick/slick.css">

<link href="../assets/YoutubeVideoModalPlugin/jquery.yu2fvl.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="../assets/css/animate.css">

<link rel="stylesheet" href="../assets/css/aos.css" />

<link rel="stylesheet" href="../assets/css/style.css">

<link rel="stylesheet" href="../assets/css/responsive.css">

<link rel="shortcut icon" type="image/png" href="../assets/img/favicon.ico">

<style>

    a.disabled {
  pointer-events: none;
  cursor: default;
  
}
.blackwite{
    filter: grayscale(1);
}
</style>
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body>
<div id="preloader"></div>

<header class="qniko-header qhV1">
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
<a href="index.html">Home</a>
<ul>
<li><a href="index.html">Home 1</a></li>
<li><a href="index-2.html">Home 2</a></li>
<li><a href="index-3.html">Home 3</a></li>
<li><a href="index-4.html">Home 4</a></li>
<li><a href="index-5.html">Home 5</a></li>
</ul>
</li>
<li><a href="about.html">About</a></li>
<li><a href="services.html">Services</a></li>
<li><a href="blog.html">News</a>
<ul>
<li><a href="blog.html">Blog Grid</a></li>
<li><a href="blog-2.html">Blog Grid 2</a>
<ul>
<li><a href="">Blog Details</a></li>
</ul>
</li>
<li><a href="blog-3.html">Blog With Sidebar</a></li>
</ul>
</li>
<li><a href="products.html">Shop</a>
<ul>
<li><a href="product-single.html">Product Details</a></li>
<li><a href="checkout.html">Checkout</a></li>
</ul>
</li>
<li><a href="#">Pages</a>
<ul>
<li><a href="about-2.html">About 2</a></li>
<li><a href="about-3.html">About 3</a></li>
<li><a href="portfolio-1.html">Portfolio</a>
<ul>
<li><a href="portfolio-2.html">Portfolio 2</a></li>
<li><a href="portfolio-single.html">Portfolio Single</a></li>
</ul>
</li>
<li><a href="service-2.html">Service 2</a></li>
<li><a href="service-3.html">Service 3</a></li>
<li><a href="team.html">Team</a></li>
<li><a href="contact-2.html">Contact 2</a></li>
<li><a href="contact-3.html">Contact 3</a></li>
<li><a href="404.html">404</a>
<ul>
<li><a href="faq.html">Faq</a></li>
<li><a href="coming-soon.html">Coming Soon</a></li>
</ul>
</li>
</ul>
</li>
</ul>
</nav>
</div>
<div class="col-md-4">
<div class="qnRight">
<a href="contact.html" class="btn-style-a">Contact US</a>
</div>
</div>
</div>
</div>
</header>


<section class="innerpage-titleV1-area">
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
<div class="row">
<div class="col-md-12">
<div class="innerpage-title">
<h3>Request</h3>
</div>
<div class="page-breadcrumb">
<ul>
<li><a href="index.html">Home</a></li>
<li>Request</li>
</ul>
</div>
</div>
</div>
</div>
</section>


<section class="blog-wrapper-area">
<div class="blog-boxV1">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="section-titleV1">
<p>Your Requests</p>
<h3>Your Requests</h3>
</div>
</div>
</div>
<?=$msg?>


<div class="row">

<?php if($has_req):
    
    if($lockers['approved']){
        $lable = "Approved";
        $class = "text-success";
    }else{
        $lable = "Pending";
        $class = "text-secondary";
    }
    ?>
    
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Locker Number</th>
      <th scope="col">Time</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?=$lockers['name']?></td>
      <td><?=$lockers['locker_id']?></td>
      <td ><?=date('h:i A m-d-Y ', $lockers['time_on'])?></td>
      <td class="<?=$class?>"><?=$lable?></td>
    </tr>
  </tbody>
</table>
<?php endif; ?>

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
<div class="row">
<div class="col-md-4">
<div class="f-widget fw-logo-text">
<img src="../assets/img/logo3.png" alt="Logo">
<p>Materfront avenue, street
2005F, USA</p>
<a href="tel:+1720.661.2231">+1 720.661.2231</a>
<div class="footer-social">
<ul class="social-list">
<li><a href="https://twitter.com/voidcoders"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
<li><a href="https://www.facebook.com/voidcoders/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<li><a href="https://www.instagram.com/voidcoders/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
<li><a href="https://www.linkedin.com/company/voidcoders"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>
<div class="col-md-8">
<div class="row">
<div class="col-md-4">
<div class="f-widget">
<h4>Services</h4>
<ul class="fw-links">
<li><a href="#">Web Design</a></li>
<li><a href="#">Web Development</a></li>
<li><a href="#">Branding</a></li>
<li><a href="#">Online Marketing</a></li>
<li><a href="#">Content</a></li>
</ul>
</div>
</div>
<div class="col-md-4">
<div class="f-widget">
<h4>About Us</h4>
<ul class="fw-links">
<li><a href="#">About us</a></li>
<li><a href="#">Work Portfolio</a></li>
<li><a href="#">Team</a></li>
<li><a href="#">Plan & Pricing</a></li>
</ul>
</div>
</div>
<div class="col-md-4">
<div class="f-widget">
<h4>Resources</h4>
<ul class="fw-links">
<li><a href="#">Redources</a></li>
<li><a href="#">News</a></li>
<li><a href="#">API Docs</a></li>
<li><a href="#">Help Center</a></li>
<li><a href="#">Career</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="footer-copyright">
<div class="row">
<div class="col-md-6">
<div class="copyright-text">
<p>© 2020 Qniko. All Rights Reserved By VoidCoders</p>
</div>
</div>
<div class="col-md-6">
<div class="fc-links">
<ul>
<li><a href="#">Privace & Policy.</a></li>
<li><a href="#">Faq.</a></li>
<li><a href="#">Terms.</a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</footer>



<script src="../assets/js/jquery-3.2.0.min.js"></script>
<script src="../assets/js/jquery-ui.js"></script>

<script src="../assets/js/jquery.smartmenus.min.js"></script>

<script src="../assets/js/owl.carousel.min.js"></script>

<script src="../assets/slick/slick.min.js"></script>

<script src="../assets/js/jquery.counterup.min.js"></script>
<script src="../assets/js/countdown.js"></script>
<script src="../assets/js/jquery.scrollUp.js"></script>
<script src="../assets/js/jquery.waypoints.min.js"></script>
<script src="../assets/js/jquery.fancybox.min.js"></script>
<script src="../assets/js/shuffle.min.js"></script>
<script src="../assets/js/wow.min.js"></script>

<script src="../assets/js/jquery.flipping_gallery.js"></script>

<script src="../assets/js/xzoom.min.js"></script>

<script src="../assets/js/aos.js"></script>

<script src="../assets/YoutubeVideoModalPlugin/jquery.yu2fvl.js"></script>

<script src="../assets/js/bootstrap.min.js"></script>

<script src="../assets/js/theme.js"></script>
</body>
</html>
