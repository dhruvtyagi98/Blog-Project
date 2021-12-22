<?php

session_start();

// Add comment
if (isset($_POST['add_comment_button'])) {
    
    include '../../routes/web.php';
    //database connection file.
    require '../../'.$db_connection;

    $comment = $_POST['comment'];
    $user_id = $_SESSION['user_id'];
    $blog_id = $_POST['blog_id'];

    if (empty($comment)) {
        $_SESSION['empty_comment'] = 'Please Enter Comment!';
        $connection->close();
        header("Location: ../../".$blog_page."?blog_id=".$blog_id."");
    }
    else{
        $query = "INSERT INTO comments (blog_id, user_id, content) VALUES ('$blog_id', '$user_id', '$comment')";

        //quering database and checking for database error.
        if ($connection->query($query) == true) 
            $_SESSION['comment_added'] = 'Comment Added Successfully!';
        
        else
            $_SESSION['database_error'] = $connection->error;

        //closing database connection.
        $connection->close();

        //redirecting to index page.
        header("Location: ../../".$blog_page."?blog_id=".$blog_id."");
    }
}