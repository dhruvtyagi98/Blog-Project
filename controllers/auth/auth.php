<?php 

session_start();

// checking if the user came from login form submit or not.
if (isset($_POST['login_button'])) {
    
    include '../../routes/web.php';
    include '../../models/user_model.php';

    $email    = $_POST['email'];
    $password = $_POST['password'];

    //checking if the user submitted all the required fields or not.
    if (empty($email)) {
        $_SESSION['login_email_empty'] = 'Email is Required!';
        header("Location: ../../".$homepage);
    }
    if (empty($password)) {
        $_SESSION['login_password_empty'] = 'password is Required!';
        header("Location: ../../".$homepage);
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['invalid_email_login'] = 'Invalid Email!';
        header("Location: ../../".$homepage);
    }
    else{
        $user = new user();
        //checking if the email is present or not.
        $query_email = "SELECT * FROM users WHERE email = '$email'";
        $result = $user->getUser($email);
        if ($result->num_rows == 0) {
            $_SESSION['email_not_found'] = 'Email Not Found!';
            header("Location: ../../".$homepage);
        }
        else{
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user['password']) == true) {
                
                // Setting session variables for current user
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['profile_pic'] = $user['profile_pic'];
                header("Location: ../../".$homepage);
            }
            else{
                $_SESSION['invalid_password'] = 'Invalid Password';
                header("Location: ../../".$homepage);
            }
        }
    }
}

// checking if the user came from register form submit or not.
elseif (isset($_POST["register_button"])) {

    include '../../routes/web.php';
    include '../../models/user_model.php';

    $name             = $_POST['name'];
    $email            = $_POST['email'];
    $password         = $_POST['password'];
    $confirm_password = $_POST['password_confirm'];

    //checking if the user submitted all the required fields or not.
    if (empty($name) || empty($email) || empty($password)) {
        $_SESSION['register_error'] = 'Empty Fields!';
        header("Location: ../../".$homepage);
    }

    elseif($confirm_password != $password){
        $_SESSION['password_mismatch'] = 'Password does Not Match!';
        header("Location: ../../".$homepage);
    }

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['invalid_email'] = 'Invalid Email!';
        header("Location: ../../".$homepage);
    }

    else{

        $user = new user();
        //checking if the email is already present or not.
        $result = $user->getUser($email);

        if ($result->num_rows > 0) {
            $_SESSION['email_error'] = 'Email Already Present!';
            header("Location: ../../".$homepage);
        }

        else{
            //hashing password.
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            //quering database and checking for database error.
            if ($user->add($name, $email, $hashed_password) == true) 
                $_SESSION['registered'] = 'Successfully Registered!';
            
            else
                $_SESSION['database_error'] = $connection->error;

            //redirecting to index page.
            header("Location: ../../".$homepage);
        }
    }       
}
elseif (isset($_GET['logout'])) {
    include '../../routes/web.php';

    // Unsetting Session Variables
    unset($_SESSION['username']);
    unset($_SESSION['user_id']);
    unset($_SESSION['email']);
    unset($_SESSION['profile_pic']);

    // Redirecting to homepage
    header("Location: ../../".$homepage);
    
}
else {
    header("Location: ../".$homepage);
    exit("Something went wrong!");
}