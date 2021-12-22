<?php

class comment
{
    public $query ;

    public function runQuery()
    {
        include '../../routes/web.php';
        //database connection file.
        require '../../'.$db_connection;

        $result = $connection->query($this->query);
        $connection->close();
        return $result;
    }

    public function add($blog_id, $user_id, $comment)
    {
        $this->query = "INSERT INTO comments (blog_id, user_id, content) VALUES ('$blog_id', '$user_id', '$comment')";
        return $this->runQuery();
    }

    public function getComments($blog_id)
    {
        $this->query = "SELECT content, comments.created_at, user_id, blog_id, users.id, name, profile_pic FROM comments JOIN users ON comments.user_id = users.id WHERE blog_id = '$blog_id'";
        return $this->runQuery();
    }
}

?>