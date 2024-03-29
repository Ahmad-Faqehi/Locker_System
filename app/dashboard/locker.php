<?php 

include "../inc/conf.php";

if(!isset($_SESSION['admin:id'])){
    header("Location: login.php");
    die();
}

$msg = "";

$last_locker = $conn->query("SELECT locker_number FROM lockers ORDER BY id DESC LIMIT 1;")->fetch();
$last_locker = $last_locker['locker_number'];

function status($arg){
    if($arg == 1){
        return  "<span class='text-success'>Available</span>";
    }else{
        return "<span class='text-secondary'>Reserved</span>";
    }
}

function addMultiLcokers($count, $number, $build, $status){

$sql = "INSERT INTO lockers (`locker_number`,`building`,`status`) VALUES ";
for($i=1; $i<=$count; $i++){
  $number++;
  $sql .= "('$number','$build','$status'),";
}
$sql = rtrim($sql, ", ");

return $sql;
}

function chcekLockerNum($locker_number){
  global $conn;

  $sql = "SELECT locker_number FROM `lockers` where `locker_number` = '$locker_number' LIMIT 1";
  $result= $conn->query("$sql")->fetch();
  $result = $result['locker_number'];

  if($result){
    return true;
  }else{
    return false;
  }
}

function getLockerByID($id){
  global $conn;

  $sql = "SELECT locker_number FROM `lockers` where `id` = '$id' LIMIT 1";
  $result= $conn->query("$sql")->fetch();
  $result = $result['locker_number'];

  return $result;
}


if(isset($_GET['ava'])){
 

  $sql = "UPDATE `lockers` SET `status`='1'";
  $stmt = $conn->prepare("$sql");
  $executed = $stmt->execute();
  if($executed){
      $msg = '<div class="alert alert-success" role="alert">
      All lockers has been updated to available.
    </div>';
  }
}

if(isset($_POST['submit'])){
    

    $id = $_POST['id'];
    $status = $_POST['status'];
    $building = $_POST['building'];
    $locker_number = $_POST['locker_number'];

    // echo $locker_number . " == ". getLockerByID($id);
    // die();
    if(chcekLockerNum($locker_number) && $locker_number != getLockerByID($id) ){
      $msg = '<div class="alert alert-danger" role="alert">
        The Locker Number '.$locker_number.' is alerady exist.
      </div>';
    }else{

    $sql = "UPDATE `lockers` SET `status`='$status', `building` = '$building', `locker_number` = '$locker_number' WHERE id = $id";
    $stmt = $conn->prepare("$sql");
    $executed = $stmt->execute();
    if($executed){
        $msg = '<div class="alert alert-success" role="alert">
        The updete done sucessfuly.
      </div>';
    }
}
}

if(isset($_POST['add_singl'])){
    $lockers_number = $_POST['number'];
    $builden = $_POST['building_singl'];
    $status = $_POST['status'];

  //Todo: chcek if locker number already there
  if(chcekLockerNum($lockers_number)){
    $msg = '<div class="alert alert-danger" role="alert">
      The Locker Number '.$lockers_number.' is alerady exist.
    </div>';
  }else{
    $sql = "INSERT INTO `lockers`(`status`,`building`, `locker_number`) VALUES ('$status','$builden', '$lockers_number')";
    $stmt = $conn->prepare("$sql");
    $executed = $stmt->execute();
    if($executed){
        $msg = '<div class="alert alert-success" role="alert">
        The add done sucessfuly.
      </div>';
    }
  }

}elseif(isset($_POST['add_multi'])){

  $lockers_number = $_POST['number_locker'];
  $builden = $_POST['building'];
  $status = $_POST['status_multi'];

  $sql = addMultiLcokers($lockers_number,$last_locker,$builden,$status);

  //$sql = "INSERT INTO `lockers`(`status`,`building`) VALUES ('$status','$builden')";
  $stmt = $conn->prepare("$sql");
  $executed = $stmt->execute();
  if($executed){
      $msg = '<div class="alert alert-success" role="alert">
      The add done sucessfuly.
    </div>';
  }

}

if(isset($_GET['del'])){
    $id = $_GET['del'];

    $sql = "DELETE FROM `lockers` WHERE id = $id";
    $stmt = $conn->prepare("$sql");
    $executed = $stmt->execute();
    if($executed){
        $msg = '<div class="alert alert-success" role="alert">
        The delete done sucessfuly.
      </div>';
     // header("Location: requstes.php");
    }
}

$lockers = $conn->query("SELECT * FROM `lockers`")->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Lockers System </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/radio.css">


        <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include "header.php" ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Students</h1>
                    </div>

                                <!-- DataTales Example -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            </div>
            <div class="card-body">
            <?=$msg?>
              <div class="table-responsive text-center" >
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Number</th>
                      <th>Building</th>
                      <th>status</th>
                      <th>Other</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($lockers as $val): ?>
                    <tr>
                      <td><?=$val['locker_number']?></td>
                      <td><?=$val['building']?></td>
                      <td><?=status($val['status'])?></td>
                      <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$val['id']?>">Edit</a></td>
                    </tr>
                    
                    <?php  endforeach; ?>

                  </tbody>
                </table>
              </div>
              <div class="text-center p-4">
                  <!-- <a href="#" data-toggle="modal" data-target="#ModalAdd" class="btn btn-info">Add New Employee +</a> -->
                  <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#ModalAdd">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">New Locker</span>
                                    </a>
                  <a href="#" class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#ModalOps">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-cog"></i>
                                        </span>
                                        <span class="text">Option</span>
                                    </a>
              </div>

            </div>
          </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Lockers System 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


    <!-- Model's -->
    <?php
    $i=1;
    foreach($lockers as $val):
    ?>

<div class="modal fade" id="exampleModal<?=$val['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Locker Number <?=$val['id']?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="">
     
  <div class="form-group">
    <label>Locker Number</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="locker_number" style="font-size: medium;" value="<?=$val['locker_number']?>">
  </div>

      <div class="form-group">
    <label>Building</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="building" style="font-size: medium;" value="<?=$val['building']?>">
  </div>
  <div class="form-group">
  <label>Status</label>
  <input type="hidden" name="id"  value=" <?=$val['id']?>"  >
  <select name="status" class="form-control">
      <option value="1" id="approve<?=$val['id']?>">Available</option>
      <option value="2" id="waiting<?=$val['id']?>">Reserved</option>
  </select>
  </div>

    <input type="submit" value="submit" class="btn btn-primary" name="submit">

   
</div>
      <div class="modal-footer">
        <a href="?del=<?=$val['id']?>" class="btn btn-danger">Delete</a>
      </div>
      </form>
      
    </div>
    
  </div>

</div>

<script>
    <?php if($val['status'] == 1 ): ?>
       $("select option[id='approve<?=$val['id']?>']").attr("selected","selected");
    <?php else: ?>
        $("select option[id='waiting<?=$val['id']?>']").attr("selected","selected");
    <?php endif ?>
</script>

    <?php $i++; endforeach; ?>


    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Locker</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="" method="POST" >

      
      <div id="container">
        Select Option:
  <div class="tabs">
    <label class="tab">
      <input type="radio" name="tab-input" class="tab-input" id="radio_1">
      <div class="tab-box">Single Locker</div>
    </label>
    <label class="tab">
      <input type="radio" name="tab-input" class="tab-input" id="radio_2">
      <div class="tab-box">Multi Locker</div>
    </label>
  </div>
</div>

<br>

      <div class="hiden_singl">
                                <div class="form-group">
                                    <label>Locker Number</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="number" style="font-size: medium;">
                                </div>
                                <div class="form-group">
                                    <label>Building</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="building_singl" style="font-size: medium;">
                                </div>
                                <div class="form-group">
                                    <label>Roal</label>
                                    <select name="status" class="form-control">
                                        <option value="1" >Available</option>
                                        <option value="2" >Reserved</option>
                                    </select> 
                                </div>
                                <br>
                                <button type="submit" name="add_singl" class="btn btn-info">Add</button>
    </div>

      <div class="hiden_sing2">
                                <div class="form-group">
                                    <label>Number of Lockers</label>
                                    <input type="number" class="form-control" id="numberHelp" name="number_locker" style="font-size: medium;">
                                    <small id="numberHelp" class="form-text text-muted">The lcoker will start from <?=$last_locker?>.</small>

                                </div>
                                <div class="form-group">
                                    <label>Building</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="building" style="font-size: medium;">
                                </div>
                                <div class="form-group">
                                    <label>Roal</label>
                                    <select name="status_multi" class="form-control">
                                        <option value="1" >Available</option>
                                        <option value="2" >Reserved</option>
                                    </select> 
                                </div>
                                <br>
                                <button type="submit" name="add_multi" class="btn btn-info">Add</button>
    </div>
                                </form>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="ModalOps" tabindex="-1" role="dialog" aria-labelledby="ModalOps" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Set all lockers available?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="?ava=true" class="btn btn-primary" >Yes</a>
      </div>
    </div>
  </div>
</div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="js/demo/datatables-demo.js"></script>

<script>


  $(document).ready(function () {   
    $( ".hiden_singl" ).hide();
    $( ".hiden_sing2" ).hide();

    $("#radio_1, #radio_2").change(function () {
        if ($("#radio_1").is(":checked")) {
          $( ".hiden_sing2" ).hide();
             $('.hiden_singl').show();

            
        }
        else if ($("#radio_2").is(":checked")) {
          $( ".hiden_singl" ).hide();
          $('.hiden_sing2').show();
        }
       
    });        
});
</script>
</body>

</html>