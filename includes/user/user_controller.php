<?php

session_start();

if(isset($_POST['profile_button'])){

    include '../../routes/web.php';
    //database connection file.
    require '../../'.$db_connection;

    $name             = $_POST['name'];
    $id               = $_POST['user_id'];
    $password         = empty($_POST['password']) ? '' : $_POST['password'];
    $profile_pic      = $_FILES['profile_pic'];

    //checking if the user submitted all the required fields or not.
    if (empty($name)) {
        $_SESSION['empty_name'] = 'Name is Required!';
        $connection->close();
        header("Location: ../../".$profile_page);
    }
    else{

        // If only the name is to be changed
        if(empty($password) && empty($profile_pic['name'])){
            $query = "UPDATE users SET name = '$name' where id = '$id'";

            //quering database and checking for database error.
            if ($connection->query($query) == true){ 
                $_SESSION['update_name'] = 'Name Changed Successfully!';
                $_SESSION['username'] = $name;
            }
            else
                $_SESSION['database_error'] = $connection->error;

            //closing database connection.
            $connection->close();

            //redirecting to profile page.
            header("Location: ../../".$profile_page);
        }

        // The password is to be changed and not the profile picture
        elseif(!empty($password) && empty($profile_pic['name'])){

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $query = "UPDATE users SET name = '$name',password = '$hashed_password' where id = '$id'";

            //quering database and checking for database error.
            if ($connection->query($query) == true) 
                $_SESSION['update_password'] = 'Password Changed Successfully!';
            
            else
                $_SESSION['database_error'] = $connection->error;

            //closing database connection.
            $connection->close();

            //redirecting to profile page.
            header("Location: ../../".$profile_page);
        }

        // The profile picture is to be changed and not the password. 
        elseif(empty($password) && !empty($profile_pic['name'])){
            $path = "images/";
            $file_name = $path . basename($profile_pic['name']);
            $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
                $_SESSION['file_format'] = "Incorrect File Format!";
                $connection->close();

                //redirecting to profile page.
                header("Location: ../../".$profile_page);
            }
            else{
                if (move_uploaded_file($profile_pic['tmp_name'], "../../".$file_name)) {
                    $query = "UPDATE users SET name = '$name', profile_pic = '$file_name' where id = '$id'";

                    //quering database and checking for database error.
                    if ($connection->query($query) == true){
                        $_SESSION['update_profile_pic'] = 'Profile Picture Changed Successfully!';
                        $_SESSION['profile_pic'] = $file_name;
                    }
                    else
                        $_SESSION['database_error'] = $connection->error;

                    //closing database connection.
                    $connection->close();

                    //redirecting to profile page.
                    header("Location: ../../".$profile_page);
                } 
                else {
                    print_r($profile_pic);
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        // Both the password and profile picture is to changed.
        else{
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $path = "images/";
            $file_name = $path . basename($profile_pic['name']);
            $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            if($file_type != "jpg" && $file_type != "png" && $file_type != "jpeg") {
                $_SESSION['file_format'] = "Incorrect File Format!";
                $connection->close();

                //redirecting to profile page.
                header("Location: ../../".$profile_page);
            }
            else{
                if (move_uploaded_file($profile_pic['tmp_name'], "../../".$file_name)) {
                    $query = "UPDATE users SET name = '$name', password = '$hashed_password', profile_pic = '$file_name' where id = '$id'";

                    //quering database and checking for database error.
                    if ($connection->query($query) == true){
                        $_SESSION['update_profile_pic'] = 'Profile Picture Changed Successfully!';
                        $_SESSION['profile_pic'] = $file_name;
                    }
                    else
                        $_SESSION['database_error'] = $connection->error;

                    //closing database connection.
                    $connection->close();

                    //redirecting to profile page.
                    header("Location: ../../".$profile_page);
                } 
                else {
                    print_r($profile_pic);
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }
}

elseif (isset($_GET['change_status']) && isset($_SESSION['username'])) {
    
    include '../../routes/web.php';
    //database connection file.
    require '../../'.$db_connection;

    $id = $_SESSION['user_id'];

    $current_time = date('Y-m-d H:i:s');

    $query = "UPDATE users SET last_activity = '$current_time' WHERE id = '$id'";

    $connection->query($query);
    $connection->close();
}

else {
    header("Location: ../../index.php");
}