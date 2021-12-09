<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><h3>Blogz</h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="float-right" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Users</a>
                </li>
                <?php 
                    if (!isset($_SESSION['name'])) {
                        echo '<li class="nav-item">
                                <button class="btn btn-primary" type="button" style="border-radius: 25px;padding: 10px;padding-inline: 30px;" data-bs-target="#login_modal" data-bs-toggle="modal">Login</button>
                            </li>';
                    }
                    else{
                        echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome, User
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="login_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="login_div">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="includes/login.php" method="post">
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="login_email">Email &nbsp;<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="login_email" name="email" placeholder="Enter Email">
                        </div>
                        <div class="mb-4">
                            <label for="login_password">Password &nbsp;<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="login_password" name="password" placeholder="Enter Password">
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
            <div id="register_div">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="includes/register.php" method="post">
                    <div class="modal-body">
                        <div class="mb-4">
                            <label for="name">Name &nbsp;<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-4">
                            <label for="register_email">Email &nbsp;<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="reqister_email" name="email" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-4">
                            <label for="register_password">Password &nbsp;<span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="register_password" name="password" placeholder="Enter Password" required minlength="6">
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
        $('#register_div').hide();

        $('#register').on('click', function(){
            $('#register_div').show();
            $('#login_div').hide();
        })

        $('#login').on('click', function(){
            $('#register_div').hide();
            $('#login_div').show();
        })
    });
</script>