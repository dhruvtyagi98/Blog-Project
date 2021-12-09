<?php 

// checking if the user came from form subit or not.
if (isset($_POST['login_button'])) {
    
    //database connection file.
    require 'dbh-inc.php';

    $email    = $_POST['email'];
    $password = $_POST['password'];

    //checking if the user submitted all the required fields or not.
    if (empty($email) || empty($password)) {
        $_SESSION['login_error']['empty'] = 'Empty Fields!';
        $connection->close();
        header("Location: ../index.php");
    }
    else{

        $query_email = "SELECT * FROM users WHERE email = '$email'";
        $result = $connection->query($query_email);
        if ($result->num_rows == 0) {
            $_SESSION['email_error'] = 'Email Not Found!';
            $connection->close();
            header("Location: ../index.php");
        }
        else{
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user['password']) == true) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['name'];
                $connection->close();
                header("Location: ../index.php");
            }
        }
    }
}
else {
    header("Location: ../index.php");
    exit("Something went wrong!");
}