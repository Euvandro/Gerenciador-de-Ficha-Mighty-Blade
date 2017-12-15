<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
$id=$_POST['id'];

session_start();
$_SESSION['id']=$id;

header("Location: ../ficha.php");
?>

