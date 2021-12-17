<!DOCTYPE html>
<?php 
    session_start();
    include 'routes/web.php';
    if(!isset($_SESSION['username'])){
        header("Location: ../test/".$homepage);
    } 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | My Blogs</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="css/custom.css">
</head>
<body>
    <!-- Navbar file -->
    <?php include($navbar) ?>

    <div class="mt-4 d-flex justify-content-end" style="margin-right: 45px;">
        <button class="btn btn-success" type="button" data-bs-target="#blog_modal" data-bs-toggle="modal" style="border-radius: 12px; padding-block: 15px;"> <b>+</b> Create Blog</button>
    </div>
    <!-- content -->
    <div class="row card_center">
        <?php include $get_user_blogs ?>
    </div>

    <!-- Add Blog Modal -->
    <div class="modal fade" id="blog_modal" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo $blog_controller ?>" method="post">
                    <div class="modal-body">
                        <div class="error empty_fields_blogs">
                            <?php if (isset($_SESSION['upload_blog'])) echo $_SESSION['upload_blog'] ?>
                        </div>
                        <div class="mb-4">
                            <label>Blog Title &nbsp;<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="blog_title" placeholder="Enter Title" required maxlength="50">
                            <div class="error title_length_error">
                                <?php if (isset($_SESSION['title_length'])) echo $_SESSION['title_length'] ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label>Description &nbsp;<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="blog_description" placeholder="Enter Description" required maxlength="100">
                            <div class="error description_length_error">
                                <?php if (isset($_SESSION['description_length'])) echo $_SESSION['description_length'] ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label>Content &nbsp;<span class="text-danger">*</span></label>
                            <textarea class="form-control" name="blog_content" rows="11" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add_blog_button">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Notification file -->
    <?php include($toasts)?>

    <!-- Footer file -->
    <!-- <?php include($footer) ?> -->

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- ion icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Custom JavaScript File -->
    <script type="text/javascript" src="js/custom.js"></script>

</body>
</html>