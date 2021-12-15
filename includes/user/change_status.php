<?php

session_start();

if (isset($_SESSION['username'])) {
    
    include '../../includes/dbh-inc.php';

    $id = $_SESSION['user_id'];

    $current_time = date('Y-m-d H:i:s');

    $query = "UPDATE users SET last_activity = '$current_time' WHERE id = '$id'";

    $connection->query($query);
    $connection->close();
}
else{
    echo false;
}