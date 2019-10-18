<?php

include "config.php";

/* Get username */
$email = $_POST['email'];

/* Query */
$query = "select count(*) as cntUser from user where email='".$email."'";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_array($result);

$count = $row['cntUser'];

echo $count;
?>