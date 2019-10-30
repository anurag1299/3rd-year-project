<?php
require "auth/config.php";

$title = $_POST['title'];
$body = $_POST['body'];
$category = $_POST['category'];
$date = date("Y/m/d");



//echo $title.$body;

$sql = "insert into thread(title,body,dateOfCreation,creatorId,categoryId) values('$title','$body','$date','$_SESSION['id']','SELECT cat_id from category where cat_title="$category"')";
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