<?php 

include '../../routes/web.php';
require '../../'.$db_connection;

$password = $_POST['current_password'];
$email       = $_POST['email'];

$query = "SELECT * FROM users WHERE email = '$email'";
$result = $connection->query($query);

$user = $result->fetch_assoc();

if(password_verify($password, $user['password']) == 1){
    echo (true);
    $connection->close();
}
else{
    echo (false);
    $connection->close();
}        