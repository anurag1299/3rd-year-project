<?php

include "config.php";

/* Get username */
$uname = $_POST['uname'];

/* Query */
$query = "select count(*) as cntUser from user where username='".$uname."'";

$result = mysqli_query($conn,$query);

$row = mysqli_fetch_array($result);

$count = $row['cntUser'];

echo $count;
?>