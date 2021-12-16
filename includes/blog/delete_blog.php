<?php 

session_start();

if (isset($_SESSION['username'])) {
    
    include '../../includes/dbh-inc.php';

    $blog_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    $delete = "DELETE FROM blogs where id = '$blog_id' AND user_id = '$user_id'";

    if ($connection->query($delete) == true) 
            $_SESSION['blog_deleted'] = 'Blog Deleted Successfully!';
        
    else
        $_SESSION['database_error'] = $connection->error;

    //closing database connection.
    $connection->close();

    //redirecting to index page.
    header("Location: ../../user_blogs.php");
}
else {
    header("Location: ../../index.php");
}