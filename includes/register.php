<?php 

// checking if the user came from form subit or not.
if(isset($_POST["register_button"])){
    
    //database connection file.
    require 'dbh-inc.php';

    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    //checking if the user submitted all the required fields or not.
    if (empty($name) || empty($email) || empty($password)) {
        $_SESSION['register_error']['empty'] = 'Empty Fields!';
        $connection->close();
        header("Location: ../index.php");
    }

    else{

        //checking if the email is already present or not.
        $query_email = "SELECT email FROM users WHERE email = '$email'";
        $result = $connection->query($query_email);
        if ($result->num_rows > 0) {
            $_SESSION['email_error'] = 'Email Already Present!';
            $connection->close();
            header("Location: ../index.php");
        }

        else{
            //hashing password.
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            //MySQL query to inset into database
            $query = "INSERT into users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

            //quering database and checking for database error.
            if ($connection->query($query) == true) 
                $_SESSION['registered'] = 'Successfully Registered!';
            
            else
                $_SESSION['database_error'] = $connection->error;

            //closing database connection.
            $connection->close();

            //redirecting to index page.
            header("Location: ../index.php");
        }
    }       
}
else {
    header("Location: ../index.php");
    exit("Something went wrong!");
}