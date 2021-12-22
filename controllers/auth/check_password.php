<?php 

include '../../routes/web.php';
include '../../models/user_model.php';

$password = $_POST['current_password'];
$email       = $_POST['email'];

$user = new user();
$result = $user->getUser($email);

$user = $result->fetch_assoc();

if(password_verify($password, $user['password']) == 1){
    echo (true);
}
else{
    echo (false);
}        