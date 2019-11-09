<?php

session_start();
$_SESSION['username']=NULL;
$_SESSION['id']=NULL;
$_SESSION['email']=NULL;

//echo $_SESSION['username'];
header("location: ../index.php");

?>