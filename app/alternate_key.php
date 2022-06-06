<?php 
include "inc/conf.php";

if(!isLoged()){
    header("Location: index.php");
    die();
}

$userid = $_SESSION['user:id'];
$sql = "SELECT * FROM booking INNER JOIN students ON booking.student_id = students.id WHERE students.id = $userid";
$lockers = $conn->query($sql)->fetch();
$booking_id = $conn->query("SELECT booking.id FROM booking INNER JOIN students ON booking.student_id = students.id WHERE students.id = $userid")->fetch();
$booking_id = $booking_id['id'];

$has_req = true;
$msg = "";
// print_r($lockers);
// die();
if(empty($lockers)){

    $msg = '<div class="alert alert-danger" role="alert">
    Your do not have request yet !!. to make order click <a href="locker.php" class="btn-link">here</a>
  </div>';
  $has_req = false;
}

if($lockers['alternate_key'] == 2){

  $emp_id = $lockers['employee_alternate'];
//   if($emp_id):
    $employee_sql = "SELECT * FROM `administrative` WHERE id = $emp_id"; 
    $employee = $conn->query($employee_sql)->fetch();
//   endif;
}

if(isset($_POST['submit'])){
  $bookingid = $_POST['bookingid'];

  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];
  $folder = "uploads/".$filename;

  if(move_uploaded_file($tempname,$folder)){
    $sql = "UPDATE `booking` SET `attachment`='$folder', alternate_key = 1 WHERE id = '$booking_id'";
    $stmt= $conn->prepare($sql);
    $executed = $stmt->execute();
    $msg = '<div class="alert alert-success" role="alert">
    Your request done successfuly.</a>
  </div>';
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


</nav>
</div>
<div class="col-md-4">
<div class="qnRight">
<a href="logout.php" class="btn-style-a">Logout</a>
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
<h3>Alternate Key</h3>
</div>
<div class="page-breadcrumb">
<ul>
<li><a href="index.php">Home</a></li>
<li>Alternate Key</li>
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
<p>Alternate Key</p>
<h3>Your Alternate Key</h3>
</div>
</div>
</div>
<?=$msg?>


<div class="row">

<?php if($has_req):
    
    if($lockers['alternate_key'] == 2){
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
      <th scope="col">Order Number</th>
      <th scope="col">Locker Number</th>
      <th scope="col">Alternate Key Status</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?=$booking_id?></td>
      <td><?=$lockers['locker_id']?></td>
      <td class="<?=$class?>"><?=$lable?></td>
    </tr>
  </tbody>
</table>
<?php endif; 
if ($has_req):
if($lockers['alternate_key'] == "2")?>

<div class="row">
<div class="col-md-12">
<div class="product-info-tab" style="padding: 14px 0px;">
<nav>
<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
<a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"> <?=$lockers['alternate_key']?> Employee Details</a>
</div>
</nav>
<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
<div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

<p>
  The employee who accept your request for Alternate Key is: 
  <br>
  <br>
  Name: <b><?=$employee['name']?></b> <br>
  Phone Number: <a href="tel:<?=$employee['phone_number']?>"> <b><?=$employee['phone_number']?></b> </a>
</p>

</div>
</div>
</div>
</div>
</div>

<?php endif ?>
<?php //endif ?>

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
