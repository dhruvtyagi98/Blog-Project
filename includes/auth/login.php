<?php 

session_start();

// checking if the user came from form subit or not.
if (isset($_POST['login_button'])) {
    
    //database connection file.
    require '../../includes/dbh-inc.php';

    $email    = $_POST['email'];
    $password = $_POST['password'];

    //checking if the user submitted all the required fields or not.
    if (empty($email)) {
        $_SESSION['login_email_empty'] = 'Email is Required!';
        $connection->close();
        header("Location: ../../index.php");
    }
    if (empty($password)) {
        $_SESSION['login_password_empty'] = 'password is Required!';
        $connection->close();
        header("Location: ../../index.php");
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['invalid_email_login'] = 'Invalid Email!';
        $connection->close();
        header("Location: ../../index.php");
    }
    else{

        //checking if the email is present or not.
        $query_email = "SELECT * FROM users WHERE email = '$email'";
        $result = $connection->query($query_email);
        if ($result->num_rows == 0) {
            $_SESSION['email_not_found'] = 'Email Not Found!';
            $connection->close();
            header("Location: ../../index.php");
        }
        else{
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user['password']) == true) {
                // Setting status to online
                $change_status = "UPDATE users SET status = 1 where email = '$email'";
                $connection->query($change_status);

                // Setting session variables for current user
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['profile_pic'] = $user['profile_pic'];
                $connection->close();
                header("Location: ../../index.php");
            }
            else{
                $_SESSION['invalid_password'] = 'Invalid Password';
                $connection->close();
                header("Location: ../../index.php");
            }
        }
    }
}
else {
    header("Location: ../index.php");
    exit("Something went wrong!");
}