<?php 

require '../../includes/dbh-inc.php';

$password = $_POST['current_password'];
$id       = $_POST['id'];

$query = "SELECT * FROM users WHERE id = '$id'";
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