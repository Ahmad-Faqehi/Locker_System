<?php include "inc/conf.php";

if (isLoged()){
    header("Location: index.php");
    exit();
}
$msg = "";

if(isset($_POST['submit'])){

    $fname = $_POST['fname'];
    $re_password = $_POST['Re_password'];
    $password = $_POST['password'];
    $username = $_POST['cname'];
    $phone_number = $_POST['number'];

    if (empty($fname) || empty($re_password) || empty($password) || empty($username) || empty($phone_number)){
        $msg = '<div class="alert alert-danger" role="alert">
        All the fileds must be enter it.
       </div>';
    }else{

    
    $num_user = $conn->query("select count(*) from  students where student_id = '$username' ")->fetchColumn();

    if($password !== $re_password){
        $msg = '<div class="alert alert-danger" role="alert">
                 Password is not match
                </div>';
    }elseif($num_user != 0){

        $msg = '<div class="alert alert-danger" role="alert">
        Student ID is already used
     </div>';

    }else{
        $stmt = $conn->prepare("INSERT INTO `students`(`name`, `phone_number`, `student_id`, `password`) VALUES ('$fname','$phone_number','$username','$password')");
        $executed = $stmt->execute();
        $lastID = $conn->lastInsertId();
        $msg = '<div class="alert alert-success" role="alert">
                   You resisted successfully. To login click <a href="login.php" class="btn-link"> here </a>
                </div>';
                $_SESSION['user:id'] = $lastID;
                header("Location: index.php");
                exit();
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<title>Locker System</title>
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
<h3>Singup</h3>
</div>
<div class="page-breadcrumb">
<ul>
<li><a href="index.php">Home</a></li>
<li>Singup</li>
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
    <?=$msg?>
<form method="POST" action="">

<div class="row">


<div class="col-md-12">
<div class="wepaint-input-group">
<label for="cname">Full Name</label>
<input type="text" name="fname" id="cname" class="wi-control" require>
</div>
</div>
<div class="col-md-12">
<div class="wepaint-input-group">
<label for="cname">Phone Number</label>
<input type="number" name="number" id="cname" class="wi-control" require>
</div>
</div>
<div class="col-md-12">
<div class="wepaint-input-group">
<label for="cname">Student ID</label>
<input type="text" name="cname" id="cname" class="wi-control" require>
</div>
</div>

<div class="col-md-12">
<div class="wepaint-input-group">
<label for="cntryname">Password</label>
<input type="password" name="password" id="cntryname" class="wi-control" require>
</div>
</div>
<div class="col-md-12">
<div class="wepaint-input-group">
<label for="cntryname">Re-Password</label>
<input type="password" name="Re_password" id="cntryname" class="wi-control" require>
</div>
</div>

</div>

<input type="submit" name="submit" value="Singup" style="font-size: large;" class="btn btn-primary">

</form>
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
