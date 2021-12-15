<?php

if (isset($_SESSION['username'])) {
    
    include 'dbh-inc.php';

    $query = "SELECT * FROM users";

    $result = $connection->query($query);

    if ($result->num_rows == 0) {
        echo '';
        $connection->close();
    }
    else{
        $users  = $result->fetch_all(MYSQLI_ASSOC); 

        foreach ($users as $user) {
            echo '<tr>
                    <td>'.$user['id'].'</td>
                    <td>'.$user['name'].'</td>
                    <td>'.$user['email'].'</td>
                    <td>'.(($user['status'] == 1)? '<div id="online"></div>':'<div id="offline"></div>').'</td>
                </tr>';
        }
        $connection->close();
    }
}
else{
    header("Location: ../index.php");
}