<?php

$dbServerName = "localhost";
$dbUserName   = "root";
$dbPassword   = "";
$dbName       = "blog";

$connection = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

if (!$connection) {
  die("Connection Failed: ".mysqli_connect_error());
}
