<?php 

session_start();

// Add blog
if (isset($_POST['add_blog_button'])) {
    
    include '../../routes/web.php';
    //database connection file.
    require '../../'.$db_connection;

    $title       = $_POST['blog_title'];
    $description = $_POST['blog_description'];
    $content     = $_POST['blog_content'];
    $id          = $_SESSION['user_id'];

    //checking if the user submitted all the required fields or not.
    if (empty($title) || empty($description) || empty($content)) {
        $_SESSION['upload_blog'] = 'Empty Fields!';
        $connection->close();
        header("Location: ../../".$user_blogs_page);
    }
    elseif (strlen($title) > 50) {
        $_SESSION['title_length'] = 'Maximum Length is 50!';
        $connection->close();
        header("Location: ../../".$user_blogs_page);
    }
    elseif (strlen($description) > 100) {
        $_SESSION['description_length'] = 'Maximum Length is 100!';
        $connection->close();
        header("Location: ../../".$user_blogs_page);
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
        header("Location: ../../".$user_blogs_page);
    }
}

// Delete Blog
elseif (isset($_GET['delete_id']) && isset($_SESSION['username'])) {
    include '../../routes/web.php';
    //database connection file.
    require '../../'.$db_connection;

    $blog_id = $_GET['delete_id'];
    $user_id = $_SESSION['user_id'];

    $delete = "DELETE FROM blogs where id = '$blog_id' AND user_id = '$user_id'";

    if ($connection->query($delete) == true) 
            $_SESSION['blog_deleted'] = 'Blog Deleted Successfully!';
        
    else
        $_SESSION['database_error'] = $connection->error;

    //closing database connection.
    $connection->close();

    //redirecting to index page.
    header("Location: ../../".$user_blogs_page);
}

// Update Blog
elseif (isset($_POST['update_blog_button'])) {
    include '../../routes/web.php';
    //database connection file.
    require '../../'.$db_connection;

    $title       = $_POST['blog_title'];
    $description = $_POST['blog_description'];
    $content     = $_POST['blog_content'];
    $blog_id     = $_POST['blog_id'];

    //checking if the user submitted all the required fields or not.
    if (empty($title) || empty($description) || empty($content)) {
        $_SESSION['update_blog'] = 'Empty Fields!';
        $connection->close();
        header("Location: ../../".$update_blog_page."?blog_id=".$blog_id."");
    }
    elseif (strlen($title) > 50) {
        $_SESSION['update_title_length'] = 'Maximum Length is 50!';
        $connection->close();
        header("Location: ../../".$update_blog_page."?blog_id=".$blog_id."");
    }
    elseif (strlen($description) > 100) {
        $_SESSION['update_description_length'] = 'Maximum Length is 100!';
        $connection->close();
        header("Location: ../../".$update_blog_page."?blog_id=".$blog_id."");
    }
    else{
        $query = "UPDATE blogs SET title = '$title', description = '$description', content = '$content' WHERE id = '$blog_id'";

        //quering database and checking for database error.
        if ($connection->query($query) == true) 
            $_SESSION['blog_updated'] = 'Blog Updated Successfully!';
        
        else
            $_SESSION['database_error'] = $connection->error;

        //closing database connection.
        $connection->close();

        //redirecting to index page.
        header("Location: ../../".$user_blogs_page."?blog_id=".$blog_id."");
    }
}

else {
    header("Location: ../../".$homepage);
}