<?php

class blog 
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

    public function getAllBlogs()
    {

        $this->query = "SELECT blogs.id as blog_id, blogs.title, blogs.description, blogs.content, blogs.user_id, blogs.created_at, users.id, users.name FROM blogs JOIN users ON users.id = blogs.user_id";
        return $this->runQuery();
    }

    public function addBlog($title, $description, $content, $id)
    {

        $this->query = "INSERT INTO blogs (title, description, content, user_id) VALUES ('$title', '$description', '$content', '$id')";
        return $this->runQuery();
    }

    public function deleteBlog($blog_id, $user_id)
    {

        $this->query = "DELETE FROM blogs where id = '$blog_id' AND user_id = '$user_id'";
        return $this->runQuery();
    }

    public function updateBlog($title, $description, $content, $blog_id)
    {

        $this->query = "UPDATE blogs SET title = '$title', description = '$description', content = '$content' WHERE id = '$blog_id'";
        return $this->runQuery();
    }

    public function getBlog($id)
    {

        $this->query = "SELECT * FROM blogs WHERE id = '$id'";
        return $this->runQuery();
    }

    public function getUserBlog($id)
    {

        $this->query = "SELECT * FROM blogs WHERE user_id = '$id'";
        return $this->runQuery();
    }
}

?>