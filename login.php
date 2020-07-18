<?php

session_start();
include 'includes/db_connection.php';

$school = htmlspecialchars($_POST['schoolInput']);
$username = htmlspecialchars($_POST['usernameInput']);
$password = htmlspecialchars($_POST['passInput']);
$testVar = connectionTest();
header("Location: home.php");
?>