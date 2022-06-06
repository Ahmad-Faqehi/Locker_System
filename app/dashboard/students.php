<?php 

include "../inc/conf.php";

if(!isset($_SESSION['admin:id'])){
    header("Location: login.php");
    die();
}

$msg = "";

function finduserbyid($id){
    global $conn;
    $stuent = $conn->query("SELECT * FROM `students` where id = $id")->fetch();
    
    if(!empty($stuent)):
        return $stuent['name'];
    else:
        return "Unknown";
    endif;
}
function findphonebyid($id){
    global $conn;
    $stuent = $conn->query("SELECT * FROM `students` where id = $id")->fetch();
    
    if(!empty($stuent)):
        return $stuent['phone_number'];
    else:
        return "Unknown";
    endif;
}

function status($arg){
    if($arg == "Approve"){
        return  "<span class='text-success'>Approved</span>";
    }else{
        return "<span class='text-secondary'>Pending</span>";
    }
}


if(isset($_POST['submit'])){
    

    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    $sql = "UPDATE `students` SET `name`='$name',`phone_number`='$phone',`student_id`='$username',`password`='$password' WHERE id = $id";
    $stmt = $conn->prepare("$sql");
    $executed = $stmt->execute();
    if($executed){
        $msg = '<div class="alert alert-success" role="alert">
        The updete done sucessfuly.
      </div>';
    }
}

if(isset($_GET['del'])){
    $id = $_GET['del'];

    $sql = "DELETE FROM `students` WHERE id = $id";
    $stmt = $conn->prepare("$sql");
    $executed = $stmt->execute();
    if($executed){
        $msg = '<div class="alert alert-success" role="alert">
        The delete done sucessfuly.
      </div>';
     // header("Location: requstes.php");
    }
}

$students = $conn->query("SELECT * FROM `students`")->fetchAll();
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
                      <th>#</th>
                      <th>Name</th>
                      <th>Phone Number</th>
                      <th>Other</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($students as $val): ?>
                    <tr>
                      <td><?=$val['id']?></td>
                      <td><?=$val['name']?></td>
                      <td><a href="tel:<?=$val['phone_number']?>"><?=$val['phone_number']?></a></td>
                      <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$val['id']?>">Edit</a></td>
                    </tr>
                    
                    <?php  endforeach; ?>

                  </tbody>
                </table>
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
    foreach($students as $val):
    ?>

<div class="modal fade" id="exampleModal<?=$val['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Student Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" style="font-size: medium;"  value="<?=$val['name']?>"  >
    <input type="hidden" name="id"  value=" <?=$val['id']?>"  >
  </div>

  <div class="form-group">
    <label>Student ID</label>
    <input type="text" class="form-control" name="username" style="font-size: medium;" value="<?=$val['student_id'] ?>" >
  </div>

  <div class="form-group"> 
    <label for="exampleInputPassword1">Phone Number</label>
    <input type="number" class="form-control" name="phone" id="exampleInputPassword1" style="font-size: medium;" value="<?=$val['phone_number']?>"  >
  </div>

  <div class="form-group"> 
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" style="font-size: medium;" value="<?=$val['password']?>"  >
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

    <?php $i++; endforeach; ?>

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


</body>

</html>