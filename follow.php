<?php

require "auth/config.php";
session_start();

$cat_id = $_POST['cat_id'];

$sql = "SELECT * FROM `pivot` WHERE uid=".$_SESSION['id']." AND follow=".$cat_id;
$result = $conn->query($sql);

if($result->num_rows > 0){
    $unfollow = "DELETE FROM `pivot` WHERE uid=".$_SESSION['id']." AND follow=".$cat_id;
    if($result1 = $conn->query($unfollow))
    {echo("success");}
}
else{
    $follow = "INSERT INTO `pivot` (`uid`,`follow`) VALUES (".$_SESSION['id'].",".$cat_id.")";
    if($result1 = $conn->query($follow))
    {
        echo("success");
    }
}

?>