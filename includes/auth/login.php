<?php 

session_start();

// checking if the user came from form subit or not.
if (isset($_POST['login_button'])) {
    
    include '../../routes/web.php';
    //database connection file.
    require '../../'.$db_connection;

    $email    = $_POST['email'];
    $password = $_POST['password'];

    //checking if the user submitted all the required fields or not.
    if (empty($email)) {
        $_SESSION['login_email_empty'] = 'Email is Required!';
        $connection->close();
        header("Location: ../../".$homepage);
    }
    if (empty($password)) {
        $_SESSION['login_password_empty'] = 'password is Required!';
        $connection->close();
        header("Location: ../../".$homepage);
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['invalid_email_login'] = 'Invalid Email!';
        $connection->close();
        header("Location: ../../".$homepage);
    }
    else{

        //checking if the email is present or not.
        $query_email = "SELECT * FROM users WHERE email = '$email'";
        $result = $connection->query($query_email);
        if ($result->num_rows == 0) {
            $_SESSION['email_not_found'] = 'Email Not Found!';
            $connection->close();
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
                $connection->close();
                header("Location: ../../".$homepage);
            }
            else{
                $_SESSION['invalid_password'] = 'Invalid Password';
                $connection->close();
                header("Location: ../../".$homepage);
            }
        }
    }
}
else {
    header("Location: ../".$homepage);
    exit("Something went wrong!");
}