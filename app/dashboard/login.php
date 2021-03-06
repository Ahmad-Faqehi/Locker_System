<?php 
include "../inc/conf.php";
$msg = "";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $as = $_POST['as'];


    if(empty($password) || empty($username)){
        $msg = '<div class="alert alert-danger" role="alert">
                Input must be not empty
             </div>';

    }else{

        if($as == "Administrative"){
            //
            $stm = $conn->prepare(" select * from administrative where username = '$username' ");
        }else{
            $stm = $conn->prepare(" select * from administrator where username = '$username' ");
        }

        
        $stm->execute();
        $count = $stm->rowCount();

        if ($count != 0){

            $row = $stm->fetch();

            if($row['password'] === $password){

                $_SESSION['as'] = $as;
                $_SESSION['admin:id'] = $row['id'];
                header("Location: index.php");
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        
                        <div class="row">
                      
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?=$msg?>
                                    <form class="user" method="POST" action="">
                                        <div class="form-group">
                                            <label for="Email">Username</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Login As</label>
                                            <select  class="form-control" id="exampleFormControlSelect2" name="as">
                                              <option value="Administrative">Administrative</option>
                                              <option value="Administrator">Administrator</option>
                                            </select>
                                          </div>
 
                                       <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="login">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>