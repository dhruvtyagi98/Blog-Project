<?php

class user
{
    public $query;

    public function runQuery()
    {
        include '../../routes/web.php';
        //database connection file.
        require '../../'.$db_connection;

        $result = $connection->query($this->query);
        $connection->close();
        return $result;
    }

    public function getUser($email)
    {
        $this->query = "SELECT * FROM users WHERE email = '$email'";
        return $this->runQuery();
    }

    public function getAllUsers()
    {
        $this->query = "SELECT * FROM users";
        return $this->runQuery();
    }

    public function add($name, $email, $password)
    {
        $this->query = "INSERT into users (name, email, password) VALUES ('$name', '$email', '$password')";
        return $this->runQuery();
    }

    public function changeStatus($current_time, $id)
    {
        $this->query = "UPDATE users SET last_activity = '$current_time' WHERE id = '$id'";
        return $this->runQuery();
    }

    public function updateName($name, $id)
    {
        $this->query = "UPDATE users SET name = '$name' where id = '$id'";
        return $this->runQuery();
    }

    public function updatePassword($name, $password, $id)
    {
        $this->query = "UPDATE users SET name = '$name',password = '$password' where id = '$id'";
        return $this->runQuery();
    }

    public function updateProfilePic($name, $file_name, $id)
    {
        $this->query = "UPDATE users SET name = '$name', profile_pic = '$file_name' where id = '$id'";
        return $this->runQuery();
    }

    public function updateAll($name, $password, $file_name, $id)
    {
        $this->query = "UPDATE users SET name = '$name', password = '$password', profile_pic = '$file_name' where id = '$id'";
        return $this->runQuery();
    }
}

?>