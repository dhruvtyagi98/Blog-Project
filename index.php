<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | Home</title>

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

    <!-- Homepage content -->
    <div class="row card_center">
        <?php include 'includes/blog/get_all_blogs.php';?>
    </div>

    <!-- Notification file -->
    <?php include("toasts.php")?>

    <!-- Footer file -->
    <?php include("footer.php") ?>

    <script>
        $(document).ready(function(){
            var colors = ['#FFE8E8', '#F0FEDE', '#E9FFFA', '#E9EFFF', '#F8E9FF', '#FFFCE9',]; 
            var random_color = colors[Math.floor(Math.random() * colors.length)];
            $('.homepage-card-header').css('background-color', random_color);
        });
    </script>

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- ion icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- Custom JavaScript File -->
    <script type="text/javascript" src="js/custom.js"></script>

</body>
</html>