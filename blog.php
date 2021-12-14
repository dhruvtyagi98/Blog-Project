<!DOCTYPE html>
<?php 
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="css/custom.css">
</head>
<body>
    <!-- Navbar file -->
    <?php include("navbar.php") ?>

    <!-- Profile content -->
    <div class="card" id="profile">
        <?php include 'includes/get_blog.php' ?>
        <div class="card-body">
            <h5 class="card-title">Comments</h5>
            <div class="row mt-3">
                <div class="col-1">
                    <img id="profile_pic_navbar" src="<?php echo $_SESSION['profile_pic'] ?>" style="margin-left: 25px;">
                </div>
                <div class="col">
                    <form action="includes/add_comment.php" method="POST">
                        <input type="hidden" name="blog_id" value="<?php echo isset($_GET['blog_id'])? $_GET['blog_id'] : ''; ?>">
                        <input type="text" class="form-control" name="comment" placeholder="Add Comment...">
                        <div class="d-flex justify-content-end">
                            <button name="add_comment_button" type="submit" class="btn btn-primary mt-1">COMMENT</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php include 'includes/get_comments.php' ?>
        </div>
    </div>

    <!-- Notification file -->
    <?php include("toasts.php")?>

    <!-- Footer file -->
    <!-- <?php include("footer.php") ?> -->

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- ion icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>
