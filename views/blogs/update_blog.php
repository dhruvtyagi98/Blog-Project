<!DOCTYPE html>
<?php 
    session_start();
    include '../../routes/web.php';
    if(!isset($_SESSION['username'])){
        header("Location: ../test/".$homepage);
    } 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Update Blog</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom CSS -->
    <link type="text/css" rel="stylesheet" href="../../css/custom.css">
</head>
<body>
    <!-- Navbar file -->
    <?php include($navbar) ?>

    <!-- Profile content -->
    <div class="card" id="profile">
        <div class="card-header" style="background-color: #EBFCE5;">
            <h3>Update Blog</h3>
        </div>
        <div class="card-body">
            <form action="../../<?php echo $blog_controller ?>" method="POST">
                <?php include '../../'.$get_update_blog ?>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            if ('<?php echo isset($_SESSION['update_title_length']) ?>' == 1) 
            {
                $('.update_blog_title_length').show();
                '<?php unset($_SESSION['update_title_length']) ?>'
            }
            if ('<?php echo isset($_SESSION['update_description_length']) ?>' == 1) 
            {
                $('.update_blog_title_description').show();
                '<?php unset($_SESSION['update_description_length']) ?>'
            }
        });
    </script>

    <!-- Notification file -->
    <?php include($toasts)?>

    <!-- Footer file -->
    <!-- <?php include($footer) ?> -->

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Custom JavaScript File -->
    <script type="text/javascript" src="js/custom.js"></script>

</body>
</html>