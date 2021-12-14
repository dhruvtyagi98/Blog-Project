<?php 

include 'dbh-inc.php';

$blog_id = $_GET['blog_id'];

$query = "SELECT content, comments.created_at, user_id, blog_id, users.id, name, profile_pic FROM comments JOIN users ON comments.user_id = users.id WHERE blog_id = '$blog_id'";

$result = $connection->query($query);

if (empty($result)) {
    echo '<div class="mt-3">No Comments Found</div>';
    $connection->close();
}
else{
    $comments = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($comments as $comment) {
        echo '<div class="row">
                <div class="col-1">
                    <img class="mt-4" id="profile_pic_navbar" src="'.$comment['profile_pic'].'" style="margin-left: 25px;">
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
    $connection->close();
}
?>