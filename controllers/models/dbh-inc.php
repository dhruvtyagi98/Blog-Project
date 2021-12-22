<?php

$dbServerName = "localhost";
$dbUserName   = "root";
$dbPassword   = "";
$dbName       = "blog";

$connection = new mysqli($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($connection->connect_error) {
  die("Connection Failed: ". $connection->connect_error);
}
