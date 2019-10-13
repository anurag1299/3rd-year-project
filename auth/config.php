<?php

$server_name = "localhost";
$server_username = "anurag";
$server_password = "";
$db = "aisehi";

$conn = new mysqli($server_name, $server_username, $server_password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>