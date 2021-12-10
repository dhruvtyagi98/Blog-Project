<?php

if(isset($_POST['profile_button'])){

    require 'dbh-inc.php'; 

    $name             = $_POST['name'];
    $id               = $_POST['user_id'];
    $password         = $_POST['password'];
    $profile_pic      = $_FILES['profile_pic'];

    //checking if the user submitted all the required fields or not.
    if (empty($name)) {
        $_SESSION['empty_name'] = 'Please Enter Name!';
        $connection->close();
        header("Location: ../index.php");
    }


}