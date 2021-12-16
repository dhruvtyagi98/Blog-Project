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
    <title>Blog | User Profile</title>

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

    <!-- Profile content -->
    <div class="card" id="profile">
        <div class="card-header" style="background-color: #EBFCE5;">
            <h3>Profile</h3>
        </div>
        <div class="card-body">
            <form action="<?php echo $update_profile ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-5" style="margin-left: 80px;">
                        <div class="mt-3">
                            <img id="profile_pic" src="<?php echo $_SESSION['profile_pic'] ?>">
                            <input class="mt-3" type="file" name="profile_pic" style="margin-left: 80px;">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb-3">
                            <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" value="<?php echo $_SESSION['username'] ?>">
                            <div class="error empty_name">
                                <?php if (isset($_SESSION['empty_name'])) echo $_SESSION['empty_name'] ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input class="form-control" type="email" value="<?php echo $_SESSION['email'] ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="password">Old Password</label>
                            <input class="form-control" type="password" id="old_password">
                            <div class="error" id="old_password_error">
                                Wrong password!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password">New Password</label>
                            <input class="form-control" type="password" name="password" id="new_password" disabled>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary" name="profile_button">Submit</button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            if ('<?php echo isset($_SESSION['empty_name']) ?>' == 1) 
            {
                $('.empty_name').show();
                '<?php unset($_SESSION['empty_name']) ?>'
            }
        });
    </script>

    <!-- Notification file -->
    <?php include($toasts)?>

    <!-- Footer file -->
    <?php include($footer) ?>

    <!-- Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Custom JavaScript File -->
    <script type="text/javascript" src="js/custom.js"></script>

</body>
</html>