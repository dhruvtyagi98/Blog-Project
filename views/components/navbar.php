<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><h3>Blogz</h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link navbar_link active" aria-current="page" href="../../<?php echo $homepage; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar_link" href="../../<?php echo $user_blogs_page; ?>">My Blogs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link navbar_link" href="../../<?php echo $all_users_page; ?>">Users</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <?php 
                if (!isset($_SESSION['username'])) {
                    echo '<li class="nav-item">
                            <button class="btn btn-primary" type="button" style="border-radius: 25px;padding: 10px;padding-inline: 30px;" data-bs-target="#login_modal" data-bs-toggle="modal">Login</button>
                        </li>';
                }
                else{
                    echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img id="profile_pic_navbar" src="../../'.$_SESSION['profile_pic'].'"> '. $_SESSION['username'] .'
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../../'.$profile_page.'">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../../'.$auth.'?logout='.$_SESSION['user_id'].'">Logout</a></li>
                        </ul>
                    </li>';
                }
            ?>
        </ul>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="login_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Login Modal -->
            <div id="login_div">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../../<?php echo $auth; ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="login_email">Email &nbsp;<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="login_email" name="email" placeholder="Enter Email" required>
                            <div class="error email_not_found">
                                <?php if (isset($_SESSION['email_not_found'])) echo $_SESSION['email_not_found'] ?>
                            </div>
                            <div class="error empty_email_login">
                                <?php if (isset($_SESSION['login_email_empty'])) echo $_SESSION['login_email_empty'] ?>
                            </div>
                            <div class="error invalid_email_login">
                                <?php if (isset($_SESSION['invalid_email_login'])) echo $_SESSION['invalid_email_login'] ?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="login_password">Password &nbsp;<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="login_password" name="password" placeholder="Enter Password" required>
                            <div class="error invalid_password">
                                <?php if (isset($_SESSION['invalid_password'])) echo $_SESSION['invalid_password'] ?>
                            </div>
                            <div class="error empty_password_login">
                                <?php if (isset($_SESSION['login_password_empty'])) echo $_SESSION['login_password_empty'] ?>
                            </div>
                        </div>
                        <div>
                            <p>Not Registered? <a type="button" id="register" style="color: blue;">Register</a></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="login_button">Login</button>
                    </div>
                </form>
            </div>

            <!-- Register modal -->
            <div id="register_div" style="display: none;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../../<?php echo $auth; ?>" method="post">
                    <div class="modal-body">
                        <div class="error empty_fields_register">
                            <?php if (isset($_SESSION['register_error'])) echo $_SESSION['register_error'] ?>
                        </div>
                        <div class="mb-4">
                            <label for="name">Name &nbsp;<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                        </div>
                        <div class="mb-4">
                            <label for="register_email">Email &nbsp;<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="reqister_email" name="email" placeholder="Enter Email">
                            <div class="error invalid_email">
                                <?php if (isset($_SESSION['invalid_email'])) echo $_SESSION['invalid_email']?>
                            </div>
                            <div class="error email_error">
                                <?php if (isset($_SESSION['email_error'])) echo $_SESSION['email_error']?>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="register_password">Password &nbsp;<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="register_password" name="password" placeholder="Enter Password">
                        </div>
                        <div class="mb-4">
                            <label for="register_password_confirm">Confirm Password &nbsp;<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="register_password_confirm" name="password_confirm" placeholder="Confirm Password">
                            <div class="error password_mismatch">
                                <?php if (isset($_SESSION['password_mismatch'])) echo $_SESSION['password_mismatch']?>
                            </div>
                        </div>
                        <div>
                            <p>Already Registered? <a type="button" id="login" style="color: blue;">Login</a></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="register_button">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {       

        // Add and remove active class from navlinks
        var path_name = window.location.pathname.split('/').pop();
        var nav_links = $('.navbar_link');
        for (let i = 0; i < nav_links.length; i++) 
        {
            nav_links[i].className = nav_links[i].className.replace(" active", "");

            if (path_name == nav_links[i].href.split('/').pop()) 
                nav_links[i].className += " active";
        }

        $('#register').on('click', function(){
            $('#register_div').show();
            $('#login_div').hide();
        });

        $('#login').on('click', function(){
            $('#register_div').hide();
            $('#login_div').show();
        });

        if ('<?php echo isset($_SESSION['invalid_email']) ?>' == 1) 
        {
            $('#login_modal').modal('show');
            $('#register_div').show();
            $('#login_div').hide();
            $('.invalid_email').show();
            '<?php unset($_SESSION['invalid_email']) ?>'
        }
        else if ('<?php echo isset($_SESSION['register_error']) ?>' == 1) {
            $('#login_modal').modal('show');
            $('#register_div').show();
            $('#login_div').hide();
            $('.empty_fields_register').show();
            '<?php unset($_SESSION['register_error']) ?>'
        }
        else if ('<?php echo isset($_SESSION['password_mismatch']) ?>' == 1) {
            $('#login_modal').modal('show');
            $('#register_div').show();
            $('#login_div').hide();
            $('.password_mismatch').show();
            '<?php unset($_SESSION['password_mismatch']) ?>'
        }
        else if ('<?php echo isset($_SESSION['email_error']) ?>' == 1) {
            $('#login_modal').modal('show');
            $('#register_div').show();
            $('#login_div').hide();
            $('.email_error').show();
            '<?php unset($_SESSION['email_error']) ?>'
        }
        else if ('<?php echo isset($_SESSION['email_not_found']) ?>' == 1) {
            $('#login_modal').modal('show');
            $('#login_div').show();
            $('.email_not_found').show();
            '<?php unset($_SESSION['email_not_found']) ?>'
        }
        else if ('<?php echo isset($_SESSION['login_error']) ?>' == 1) {
            $('#login_modal').modal('show');
            $('#login_div').show();
            $('.empty_fields_login').show();
            '<?php unset($_SESSION['login_error']) ?>'
        }
        else if ('<?php echo isset($_SESSION['invalid_email_login']) ?>' == 1) {
            $('#login_modal').modal('show');
            $('#login_div').show();
            $('.invalid_email_login').show();
            '<?php unset($_SESSION['invalid_email_login']) ?>'
        }
        else if ('<?php echo isset($_SESSION['login_email_empty']) ?>' == 1) {
            $('#login_modal').modal('show');
            $('#login_div').show();
            $('.empty_email_login').show();
            '<?php unset($_SESSION['login_email_empty']) ?>'
        }
        else if ('<?php echo isset($_SESSION['invalid_password']) ?>' == 1) {
            $('#login_modal').modal('show');
            $('#login_div').show();
            $('.invalid_password').show();
            '<?php unset($_SESSION['invalid_password']) ?>'
        }
        else if ('<?php echo isset($_SESSION['login_password_empty']) ?>' == 1) {
            $('#login_modal').modal('show');
            $('#login_div').show();
            $('.empty_password_login').show();
            '<?php unset($_SESSION['login_password_empty']) ?>'
        }
    });
</script>