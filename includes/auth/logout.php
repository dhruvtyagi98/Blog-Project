<?php

session_start();

include '../../routes/web.php';

// Unsetting Session Variables
unset($_SESSION['username']);
unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['profile_pic']);

// Redirecting to homepage
header("Location: ../../".$homepage);