<?php

include '../../models/blog_model.php';

$blog = new blog();
$result = $blog->getAllBlogs();

if ($result->num_rows == 0) {
    echo '<div>
            <div class="card">
                <div class="card-body" style="padding: 50px;">
                    <h5 class="card-title" id="no_content">No Blogs Found!</h5>
                </div>
            </div>
        </div>';
}
else{
    $blogs = $result->fetch_all(MYSQLI_ASSOC);
    
    foreach ($blogs as $blog) {
        echo '<div class="col-sm-6">
                <div class="card">
                    <div class="card-header homepage-card-header">
                        <div class="row">
                            <div class="col">
                                '.$blog['name'].' <p class="mb-0 mt-1" style="font-size: 12px; color: #8B8B8B">'.date("jS F, Y", strtotime($blog['created_at'])).'</p>
                            </div>
                        </div>
                    </div>
                    <a class="text-decoration-none text-dark" href="../../'.$blog_page.'?blog_id='.$blog['blog_id'].'">
                        <div class="card-body">
                            <h5 class="card-title">'.$blog['title'].'</h5>
                            <p class="card-text">'.$blog['description'].'</p>
                        </div>
                    </a>
                </div>
            </div>';
    }
}

?>