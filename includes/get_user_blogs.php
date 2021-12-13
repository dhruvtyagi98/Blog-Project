<?php

if (isset($_SESSION['username'])) {
    
    include 'dbh-inc.php';

    $id = $_SESSION['user_id'];

    $query = "SELECT * FROM blogs WHERE user_id = '$id'";

    $result = $connection->query($query);
    if ($result->num_rows == 0) {
        echo '<div>
                <div class="card">
                    <div class="card-body" style="padding: 50px;">
                        <h5 class="card-title" id="no_content">No Blogs Found!</h5>
                    </div>
                </div>
            </div>';
        $connection->close();
    }
    else{
        $blogs = $result->fetch_all(MYSQLI_ASSOC);
        
        foreach ($blogs as $blog) {
            echo '<div class="col-sm-6">
                    <div class="card">
                        <div class="card-header" style="background-color: #FFE8E8">
                            <div class="row">
                                <div class="col">
                                    '.$_SESSION['username'].' <p class="mb-0 mt-1" style="font-size: 12px; color: #8B8B8B">'.$blog['created_at'].'</p>
                                </div>
                                <div class="mt-1 col-2">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary"><ion-icon name="create-outline"></ion-icon></button>
                                        <a href="includes/delete_blog.php?id='.$blog['id'].'" type="button" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="text-decoration-none text-dark" href="blog.php">
                            <div class="card-body">
                                <h5 class="card-title">'.$blog['title'].'</h5>
                                <p class="card-text">'.$blog['description'].'</p>
                            </div>
                        </a>
                    </div>
                </div>';
        }
        $connection->close();
    }
}

?>