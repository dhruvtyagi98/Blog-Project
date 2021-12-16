<?php

include 'routes/web.php';
//database connection file.
require $db_connection;

$id = $_GET['blog_id'];

$query = "SELECT * FROM blogs WHERE id = '$id'";

$result = $connection->query($query);
$blog = $result->fetch_assoc();
$_SESSION['blog_user_id'] = $blog['user_id'];

echo '<div class="card-header" style="background-color: #EBFCE5;">
        <h3>'. $blog['title'] .'</h3>
    </div>
    <div class="card-body">
        <div class="mb-4">Description - '. $blog['description'] .'</div>
        <div style="border-bottom: 1px solid"></div>
        <div class="mt-4">'. $blog['content'] .'</div>
    </div>';

$connection->close();
?>
