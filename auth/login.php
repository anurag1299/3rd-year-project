<?php

require "./config.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select uid,username,email from user where username = '$username' and password = '$password'";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['uid'];
    $_SESSION['email'] = $row['email'];
    header("location: ../index.php");
}
else{
    echo "0 result";
}

$conn->close();

?>
