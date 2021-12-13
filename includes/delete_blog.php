<?php 

session_start();

if (isset($_SESSION['username'])) {
    
    include 'dbh-inc.php';

    $id = $_GET['id'];

    $delete = "DELETE FROM blogs where id = '$id'";

    if ($connection->query($delete) == true) 
            $_SESSION['blog_deleted'] = 'Blog Deleted Successfully!';
        
    else
        $_SESSION['database_error'] = $connection->error;

    //closing database connection.
    $connection->close();

    //redirecting to index page.
    header("Location: ../user_blogs.php");
}
else {
    header("Location: ../index.php");
}