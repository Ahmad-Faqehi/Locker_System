<?php 
// hello
include "inc/conf.php";
$sql = "SELECT * FROM `lockers`";
$lockers = $conn->query($sql)->fetchAll();
$has_req = false;
$new_req = false;

$msg = "";
if(isset($_POST['submit'])){

    $user_id = $_POST['userid'];
    $locker_id = $_POST['locker_id'];
    $time = time();

    //Todo: insert the new locker to bocking table
    $stmt = $conn->prepare("INSERT INTO `booking`(`student_id`, `locker_id`, `time_on`) VALUES ($user_id,$locker_id,'$time')");
    $executed = $stmt->execute();
    
    //Todo: Update the status of locker from availbe to peding
    $stmt_update = $conn->prepare("UPDATE `lockers` SET `status`=2 WHERE id = $locker_id");
    $executed_update = $stmt_update->execute();

    if($executed && $executed_update){
      $new_req = true;
      $msg = '<div class="alert alert-success" role="alert">
      Your request has been send successfuly.
    </div>';
    }

}

// TOdo : Chcek if user already has requset to reasve locker
if(isLoged()):
  $userid = $_SESSION['user:id'];
  $sql_chcek = "SELECT * FROM `booking` WHERE student_id = $userid";
  $result = $conn->query($sql_chcek)->fetchAll();
  if(!empty($result)){
    $has_req = true;
  }
endif;
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
<?php if(!isLoged()): ?>
<div class="col-md-4">
<div class="qnRight">
<a href="login.php" class="btn-style-a">Login</a>
</div>
</div>
<?php endif ?>
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
<h3>Lock</h3>
</div>
<div class="page-breadcrumb">
<ul>
<li><a href="index.html">Home</a></li>
<li>Locker</li>
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
<p>OUR Locker</p>
<h3>Latest Locker</h3>
</div>
</div>
</div>
<?=$msg?>
<?php if(!isLoged()): ?>
<div class="alert alert-warning" role="alert">
  You have be login to reserve locker
</div>
<?php endif ?>

<?php if($has_req && !$new_req): ?>

<div class="alert alert-danger" role="alert">
You already has request for reasve locker. See you requstes <a href="request.php" class=""> Here</a>.
</div>

<?php else: ?>

<div class="row">

<?php foreach($lockers as $locker): 
    if($locker['status'] != 1){
        $class_link = "btn-style-h disabled"; 
        $class_img = "blackwite";
        $isReserved = true;
    }else{
        $class_link = "btn-style-zh";
        $class_img = "";
        $isReserved = false;
    }
    ?>


<div class="col-md-4">
<div class="single-blogV2">
<div class="sb-img">
<a href="#" <?php if(!$isReserved): ?> data-toggle="modal" data-target="#exampleModal<?=$locker['id']?> <?php else: echo 'onclick="alert(\'Already Reserve\')'; endif ?>">
<img class="<?=$class_img?>" src="../assets/img/lockers/locker.png" alt="">
</a>
</div>
<div class="sb-text">
<h3>
    <a href="#" <?php if(!$isReserved): ?> data-toggle="modal" data-target="#exampleModal<?=$locker['id']?> <?php else: echo 'onclick="alert(\'Already Reserve\')'; endif ?>">
        Locker Number: <?=$locker['id']?>
    </a>
    <div class=" pt-1 stext-btn aos-init aos-animate text-center" >
    <a  href="#"  class="<?=$class_link?> text-white" <?php if(!$isReserved): ?> data-toggle="modal" data-target="#exampleModal<?=$locker['id']?> <?php else: echo 'onclick="alert(\'Already Reserve\')'; endif ?>">Reserve</a>
    </div>
</h3>
</div>
</div>
</div>
<?php endforeach ?>

<?php endif ?>

</div>

</div>
</div>
</section>

<!-- Modal -->

<?php if(isLoged()): ?>
<!-- Modal -->

<?php 
$user_id = $_SESSION['user:id'];
$sql = "SELECT * FROM `students` where id = $user_id";
$user = $conn->query($sql)->fetch();

 foreach($lockers as $locker): 
   $locker_id = $locker['id'];
?>
<div class="modal fade" id="exampleModal<?=$locker_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form to Reserve Locker <?=$locker_id?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Your Name</label>
    <input type="email" class="form-control" id="exampleInputEmail1"  value="<?=$user['name']?>" readonly >
    <input type="hidden" name="userid"  value="<?=$user['id']?>"  >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Your Phone Number</label>
    <input type="number" class="form-control" id="exampleInputPassword1" value="<?=$user['phone_number']?>" readonly >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Locker Number</label>
    <input type="number" class="form-control" name="locker_id" value="<?=$locker_id ?>" readonly >
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="submit" class="btn btn-primary" name="submit">
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach ?>
<!--/ Modal -->
<?php endif; ?>
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
