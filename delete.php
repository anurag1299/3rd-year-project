<?php

require "auth/config.php";

$tid = $_POST['tid'];

$sql = "delete from thread where tid='".$tid."'";
if($conn->query($sql))
{
    echo "success";
}
else{
    echo $conn->error();
}

?>