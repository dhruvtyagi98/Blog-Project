<?php 

session_start();

if (isset($_POST['add_blog_button'])) {
    
    include '../../includes/dbh-inc.php';

    $title       = $_POST['blog_title'];
    $description = $_POST['blog_description'];
    $content     = $_POST['blog_content'];
    $id          = $_SESSION['user_id'];

    //checking if the user submitted all the required fields or not.
    if (empty($title) || empty($description) || empty($content)) {
        $_SESSION['upload_blog'] = 'Empty Fields!';
        $connection->close();
        header("Location: ....//user_blogs.php");
    }
    elseif (strlen($title) > 50) {
        $_SESSION['title_length'] = 'Maximum Length is 50!';
        $connection->close();
        header("Location: ../../user_blogs.php");
    }
    elseif (strlen($description) > 100) {
        $_SESSION['description_length'] = 'Maximum Length is 100!';
        $connection->close();
        header("Location: ../../user_blogs.php");
    }
    else{
        $query = "INSERT INTO blogs (title, description, content, user_id) VALUES ('$title', '$description', '$content', '$id')";

        //quering database and checking for database error.
        if ($connection->query($query) == true) 
            $_SESSION['Blog_added'] = 'Blog Added Successfully!';
        
        else
            $_SESSION['database_error'] = $connection->error;

        //closing database connection.
        $connection->close();

        //redirecting to index page.
        header("Location: ../../user_blogs.php");
    }
}
else {
    header("Location: ../../index.php");
}