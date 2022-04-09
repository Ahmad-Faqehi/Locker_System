
<?php

include "inc/conf.php";
$msg = "";
if(isLoged()){
    header("Location: index.html");
}
if(isset($_POST['submit'])){

    $username = $_POST['cname'];
    $password = $_POST['password'];

    if(empty($password) || empty($username)){
        $msg = '<div class="alert alert-danger" role="alert">
                Input must be not empty
             </div>';

    }else{

        $stm = $conn->prepare(" select * from students where username = '$username' ");
        $stm->execute();
        $count = $stm->rowCount();

        if ($count != 0){

            $row = $stm->fetch();

            if($row['password'] === $password){

                $_SESSION['user:id'] = $row['id'];
                header("Location: index.html");
                exit();
            }else{
                $msg = '<div class="alert alert-danger" role="alert">
                Username or passowrd is not correct.
             </div>';
            }

        }else{

            $msg = '<div class="alert alert-danger" role="alert">
            Username or passowrd is not correct.
             </div>';

        }

    }

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
.btn-style-b {
    position: relative;
    font-size: 17px;
    letter-spacing: 0px;
    line-height: 25px;
    color: #fff;
    background-color: #00c3ff;
    padding: 15px 30px;
    border-radius: 30px;
    font-weight: 400;
    display: inline-block;
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
</li>
<li><a href="about.html">About</a></li>

<li><a href="#">Pages</a></li>
</ul>
</nav>
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
<h3>Login</h3>
</div>
<div class="page-breadcrumb">
<ul>
<li><a href="index.html">Home</a></li>
<li>Login</li>
</ul>
</div>
</div>
</div>
</div>
</section>


<section class="checkout-wrapper-area">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="checkout-form">
<form method="POST" action=""> 
<?=$msg?>
<div class="row">



<div class="col-md-12">
<div class="wepaint-input-group">
<label for="cname">Username</label>
<input type="text" name="cname" id="cname" class="wi-control">
</div>
</div>
<div class="col-md-12">
<div class="wepaint-input-group">
<label for="cntryname">Password</label>
<input type="password" name="password" id="cntryname" class="wi-control">
</div>
</div>

</div>

<input type="submit" value="Login" style="font-size: large;" name="submit" class="btn btn-primary">

</form>
</div>
<br>
<div class="text-left">
    <a href="singup.php" class="text-link" style="font-size: initial;">Create new account</a>
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
<script src="../assets/js/wow.min.js"></script>

<script src="../assets/js/jquery.flipping_gallery.js"></script>

<script src="../assets/js/xzoom.min.js"></script>

<script src="../assets/js/aos.js"></script>

<script src="../assets/YoutubeVideoModalPlugin/jquery.yu2fvl.js"></script>

<script src="../assets/js/bootstrap.min.js"></script>

<script src="../assets/js/theme.js"></script>
</body>
</html>
