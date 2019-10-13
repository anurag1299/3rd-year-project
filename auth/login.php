<?php

require "./config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select name,pass from user where name='$username' and pass='$password'";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION[username] = $row[name];
    header("location: ../index.php");
}
else{
    echo "0 result";
}

$conn->close();

?>
