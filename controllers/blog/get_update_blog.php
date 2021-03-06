<?php 

if (isset($_SESSION['username'])) {

    include '../../routes/web.php';
    include '../../models/blog_model.php';


    $blog_id = isset($_GET['blog_id'])? $_GET['blog_id'] : '';

    $blog = new blog();
    $result = $blog->getBlog($blog_id);
    $blog   = $result->fetch_assoc();

    echo '<div class="row">
            <div class="col">
                <input type="hidden" name="blog_id" value="'.$blog['id'].'">
                <label for="update_blog_title">Blog Title &nbsp;<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="blog_title" placeholder="Enter Title" required maxlength="50" value="'.$blog['title'].'">
                <div class="error update_blog_title_length">
                    <?php if (isset($_SESSION["update_title_length"])) echo $_SESSION["update_title_length"] ?>
                </div>
            </div>
            <div class="col">
                <label for="update_blog_description">Blog Description &nbsp;<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="blog_description" placeholder="Enter Description" required maxlength="100" value="'.$blog['description'].'">
                <div class="error update_blog_title_description">
                    <?php if (isset($_SESSION["update_description_length"])) echo $_SESSION["update_description_length"] ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mt-3">
                <label>Content &nbsp;<span class="text-danger">*</span></label>
                <textarea class="form-control" name="blog_content" rows="10" required>'.$blog['content'].'</textarea>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary mt-3" type="submit" name="update_blog_button">Update</button>
        </div>';
}
else{
    header("Location: ../index.php");
}