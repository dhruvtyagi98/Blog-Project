<?php

// Add comments in a blog
if (isset($_POST['add_comment_button'])) {
    session_start();
    
    include '../../routes/web.php';
    include '../../models/comment_model.php';

    $content = $_POST['comment'];
    $user_id = $_SESSION['user_id'];
    $blog_id = $_POST['blog_id'];

    if (empty($content)) {
        $_SESSION['empty_comment'] = 'Please Enter Comment!';
        header("Location: ../../".$blog_page."?blog_id=".$blog_id."");
    }
    else{
        $comment = new comment();

        //quering database and checking for database error.
        if ($comment->add($blog_id, $user_id, $content) == true) 
            $_SESSION['comment_added'] = 'Comment Added Successfully!';
        
        else
            $_SESSION['database_error'] = 'Something Went Wrong!';

        //redirecting to index page.
        header("Location: ../../".$blog_page."?blog_id=".$blog_id."");
    }
}
// Get Comments of a blog
else{
    include '../../routes/web.php';
    include '../../models/comment_model.php';

    $blog_id = $_GET['blog_id'];

    $comment = new comment();

    $result = $comment->getComments($blog_id);
    if ($result->num_rows == 0) 
    {
        echo '<div class="mt-3">No Comments Found</div>';
    }
    else
    {
        $comments = $result->fetch_all(MYSQLI_ASSOC);

        foreach ($comments as $comment) {
            echo '<div class="row">
                    <div class="col-1">
                        <img class="mt-4" id="profile_pic_navbar" src="../../'.$comment['profile_pic'].'" style="margin-left: 25px;">
                    </div>
                    <div class="col-5">
                        <div class="row mt-3" style="color: #B6B6B6;">
                            '. $comment['name'] .' &nbsp; '.date("jS F, Y", strtotime($comment['created_at'])).'
                        </div>
                        <div class="row mt-2">
                            '. $comment['content'] .'
                        </div>
                    </div>
                </div>';
        }
    }
}