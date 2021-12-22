<?php 

session_start();

// Add blog
if (isset($_POST['add_blog_button'])) {
    
    include '../../routes/web.php';
    include '../../models/blog_model.php';

    $title       = $_POST['blog_title'];
    $description = $_POST['blog_description'];
    $content     = $_POST['blog_content'];
    $id          = $_SESSION['user_id'];

    //checking if the user submitted all the required fields or not.
    if (empty($title) || empty($description) || empty($content)) {
        $_SESSION['upload_blog'] = 'Empty Fields!';
        header("Location: ../../".$user_blogs_page);
    }
    elseif (strlen($title) > 50) {
        $_SESSION['title_length'] = 'Maximum Length is 50!';
        header("Location: ../../".$user_blogs_page);
    }
    elseif (strlen($description) > 100) {
        $_SESSION['description_length'] = 'Maximum Length is 100!';
        header("Location: ../../".$user_blogs_page);
    }
    else{
        $blog = new blog();

        //quering database and checking for database error.
        if ($blog->addBlog($title, $description, $content, $id) == true) 
            $_SESSION['Blog_added'] = 'Blog Added Successfully!';
        
        else
            $_SESSION['database_error'] = 'Something Went Wrong!';

        //redirecting to index page.
        header("Location: ../../".$user_blogs_page);
    }
}

// Delete Blog
elseif (isset($_GET['delete_id']) && isset($_SESSION['username'])) {
    include '../../routes/web.php';
    include '../../models/blog_model.php';

    $blog_id = $_GET['delete_id'];
    $user_id = $_SESSION['user_id'];

    $blog = new blog(); 

    if ($blog->deleteBlog($blog_id, $user_id) == true) 
            $_SESSION['blog_deleted'] = 'Blog Deleted Successfully!';
        
    else
        $_SESSION['database_error'] = 'Something Went Wrong!';

    //redirecting to index page.
    header("Location: ../../".$user_blogs_page);
}

// Update Blog
elseif (isset($_POST['update_blog_button'])) {
    include '../../routes/web.php';
    include '../../models/blog_model.php';

    $title       = $_POST['blog_title'];
    $description = $_POST['blog_description'];
    $content     = $_POST['blog_content'];
    $blog_id     = $_POST['blog_id'];

    //checking if the user submitted all the required fields or not.
    if (empty($title) || empty($description) || empty($content)) {
        $_SESSION['update_blog'] = 'Empty Fields!';
        header("Location: ../../".$update_blog_page."?blog_id=".$blog_id."");
    }
    elseif (strlen($title) > 50) {
        $_SESSION['update_title_length'] = 'Maximum Length is 50!';
        header("Location: ../../".$update_blog_page."?blog_id=".$blog_id."");
    }
    elseif (strlen($description) > 100) {
        $_SESSION['update_description_length'] = 'Maximum Length is 100!';
        header("Location: ../../".$update_blog_page."?blog_id=".$blog_id."");
    }
    else{
        $blog = new blog();

        //quering database and checking for database error.
        if ($blog->updateBlog($title, $description, $content, $blog_id) == true) 
            $_SESSION['blog_updated'] = 'Blog Updated Successfully!';
        
        else
            $_SESSION['database_error'] = 'Something Went Wrong!';

        //redirecting to index page.
        header("Location: ../../".$user_blogs_page."?blog_id=".$blog_id."");
    }
}

else {
    header("Location: ../../".$homepage);
}