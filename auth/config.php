<?php

$server_name = "localhost";
$server_username = "root";
$server_password = "";
$db = "my_reddit";

$conn = new mysqli($server_name, $server_username, $server_password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>