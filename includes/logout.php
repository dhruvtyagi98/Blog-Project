<?php

session_start();
unset($_SESSION['username']);
unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['profile_pic']);

header("Location: ../index.php");