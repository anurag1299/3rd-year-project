<?php

session_start();
$_SESSION['username']=NULL;

//echo $_SESSION['username'];
header("location: ../index.php");

?>