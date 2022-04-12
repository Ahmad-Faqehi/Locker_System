<?php
session_start();
if(isset($_SESSION['admin:id'])){
    unset($_SESSION['admin:id']);
}

if(isset($_SESSION['as'])){
    unset($_SESSION['as']);
}
exit(header("Refresh:0; url=login.php"));
die();
?>