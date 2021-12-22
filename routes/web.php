<?php 

// UI Routes
$blog_page          = "views/blogs/blog.php";
$footer             = $_SERVER['DOCUMENT_ROOT']."/test/views/components/footer.php";
$navbar             = $_SERVER['DOCUMENT_ROOT']."/test/views/components/navbar.php";
$homepage           = "views/homepage/index.php";
$profile_page       = "views/user/profile.php";
$toasts             = $_SERVER['DOCUMENT_ROOT']."/test/views/components/toasts.php";
$update_blog_page   = "views/blogs/update_blog.php";
$user_blogs_page    = "views/blogs/user_blogs.php";
$all_users_page     = "views/user/users.php";

// Auth Routes
$auth               = "controllers/auth/auth.php";
$check_password     = "controllers/auth/check_password.php";

// Blog Routes
$blog_controller    = "controllers/blog/blog_controller.php";
$comment_controller = "controllers/blog/comment_controller.php";
$get_all_blogs      = "controllers/blog/get_all_blogs.php";
$get_blog           = "controllers/blog/get_blog.php";
$get_comments       = "controllers/blog/get_comments.php";
$get_update_blog    = "controllers/blog/get_update_blog.php";
$get_user_blogs     = "controllers/blog/get_user_blogs.php";

// User Routes
$get_users          = "controllers/user/get_users.php";
$user_controller    = "controllers/user/user_controller.php";

// Database connection file route
$db_connection      = "controllers/models/dbh-inc.php";