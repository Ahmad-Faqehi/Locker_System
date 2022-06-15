<?php session_start();

// *** THIS CONECTION WHEN USING DOCKER COMPOSE *** //
$db_host = $_ENV['dbhost'];
$db_user = $_ENV['dbuser'];
$db_pass = $_ENV['dbpass'];
$db_database = $_ENV['dbname'];

// *** THIS CONECTION WHEN USING LOCAL SERVER *** //
// $db_host = "localhost";
// $db_user = "root";
// $db_pass = "";
// $db_database = "lockers";


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