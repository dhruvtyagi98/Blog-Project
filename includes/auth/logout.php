<?php

session_start();

include '../../includes/dbh-inc.php';

// Changing user Status to offline
$email = $_SESSION['email'];
$change_status = "UPDATE users SET status = 0 WHERE email = '$email'";
$connection->query($change_status);
$connection->close();

// Unsetting Session Variables
unset($_SESSION['username']);
unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['profile_pic']);

// Redirecting to homepage
header("Location: ../../index.php");