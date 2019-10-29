<?php
require "auth/config.php";

$title = $_POST['title'];
$body = $_POST['body'];

//echo $title.$body;

$sql = "insert into thread(title,body) values('$title','$body')";
if($conn->query($sql))
{
    //echo("user added");
   
    header("location: profile.php");
}
else
{
    echo $conn->error;
}

?>