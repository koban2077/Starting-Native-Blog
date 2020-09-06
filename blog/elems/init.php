<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'blog';
session_start();

$link = mysqli_connect($host, $user, $password, $db_name);
mysqli_query($link, "SET NAMES 'utf8'");
?>
