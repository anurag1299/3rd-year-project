<?php

session_start();
$_SESSION['username']=NULL;
$_SESSION['id']=NULL;

//echo $_SESSION['username'];
header("location: ../index.php");

?>