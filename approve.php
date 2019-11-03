<?php

require "auth/config.php";

$tid = $_POST['tid'];

$sql = "UPDATE thread SET status=0 WHERE tid=".$tid;
if($conn->query($sql))
{
    echo "success";
}
else{
    echo $conn->error();
}

?>