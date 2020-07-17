<?php

session_start();
include 'includes/db_connection.php';

if(!isset($_POST['usernameInput']) or !isset($_POST['passInput']) or !isset($_POST['schoolInput'])){
    echo 'No username or password entered. Please return and try again';
}
else{
    $school = htmlspecialchars($_POST['schoolInput']);
    $username = htmlspecialchars($_POST['usernameInput']);
    $password = htmlspecialchars($_POST['passInput']);
}

connectionTest();

?>

