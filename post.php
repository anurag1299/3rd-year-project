<?php
require "auth/config.php";

session_start();

$title = $_POST['title'];
$body = $_POST['body'];
$category = $_POST['category'];
$date = date("Y/m/d");
$categoryId = -1;
$sql1 = "SELECT cat_id from category where cat_title='$category'";
$result = $conn->query($sql1);
if($result->num_rows > 0)
{
    $row = $result->fetch_assoc();
    $categoryId = $row[cat_id];
}
else{
    echo "0 results";
}


//echo $title.$body;

$sql = "insert into thread(title,body,dateOfCreation,creatorId,categoryId) values('".$title."','".$body."','".$date."','".$_SESSION['id']."','".$categoryId."')";
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