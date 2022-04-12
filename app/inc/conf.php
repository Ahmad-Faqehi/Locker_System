<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


//$db_host = "localhost";
//$db_user = "root";
//$db_pass = "";
$db_database = "lockers";
 $db_host = "database";
 $db_user = "ahmad";
 $db_pass = "password";
 $db_database = "locker";

$conn = new PDO('mysql:host='.$db_host.';dbname='.$db_database .';charset=utf8mb4', ''.$db_user .'', ''.$db_pass .'', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

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