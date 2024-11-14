<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "rest-api";

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn)
{
    die("Connection Failed:". mysqli_connect_error());
}
?>