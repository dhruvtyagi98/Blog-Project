<?php

if (isset($_SESSION['username'])) {
    
    include 'routes/web.php';
    //database connection file.
    require $db_connection;

    $query = "SELECT * FROM users";

    $result = $connection->query($query);

    if ($result->num_rows == 0) {
        echo '';
        $connection->close();
    }
    else{
        $users  = $result->fetch_all(MYSQLI_ASSOC); 

        foreach ($users as $user) {
            $status = checkLastActivity($user['last_activity']);
            echo '<tr>
                    <td>'.$user['id'].'</td>
                    <td>'.$user['name'].'</td>
                    <td>'.$user['email'].'</td>
                    <td>'.(($status == true)? '<div id="online"></div>':'<div id="offline"></div>').'</td>
                </tr>';
        }
        $connection->close();
    }
}
else{
    header("Location: ../../index.php");
}

/**
 * checkLastActivity used to check the difference between the supplied time and current time 
 * and is used to check if the user is online or offline. If the difference is greater than
 * 10 minutes the user is offline
 *
 * @param string $timestamp
 * @param float $current_time
 * @param float $time_difference
 * @return boolean
 */
function checkLastActivity($timestamp)
{
    $current_time    = strtotime(date("Y-m-d H:i:s"));
    $last_activity   = strtotime($timestamp);
    $time_difference = round(abs($last_activity - $current_time), 2);
    
    if ($time_difference > 5) 
        return false;
    else
        return true;
}