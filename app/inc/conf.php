<?php
$db_host = "172.27.240.1:6033";
$db_user = "ahmad";
$db_pass = "password";
$db_database = "locker";

$conn = new PDO('mysql:host='.$db_host.';dbname='.$db_database .';charset=utf8mb4', ''.$db_user .'', ''.$db_pass .'', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
session_start();
date_default_timezone_set('Asia/Riyadh');

function isLoged(){

    $user_id = @$_SESSION['user:id'];
    if(!isset($user_id) || empty($user_id)){
        return false;
    }else{
        return true;
    }
    
}
?>