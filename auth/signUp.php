<?php

require "./config.php";

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "insert into user(username,password,email) values('$username','$password','$email')";
if($conn->query($sql))
{
    //echo("user added");
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $row['uid'];
    $_SESSION['email'] = $row['email'];
    header("location: ../index.php");
}
else
{
    echo $conn->error;
}

?>