<?php

require "./config.php";

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "insert into user(email,name,pass) values('$email','$username','$password')";
if($conn->query($sql))
{
    echo("user added");
}
else
{
    echo $conn->error;
}

?>