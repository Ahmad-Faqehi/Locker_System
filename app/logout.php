<?php
session_start();
if(isset($_SESSION['user:id'])){
    unset($_SESSION['user:id']);
}

// if(isset($_SESSION['as'])){
//     unset($_SESSION['as']);
// }
exit(header("Refresh:0; url=index.php"));
die();
?>