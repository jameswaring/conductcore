<?php

session_start();
include 'includes/db_connection.php';

if((!isset($$_POST['schoolInput'])) || (!isset($$_POST['usernameInput'])) || (!isset($$_POST['passInput']))){
    header("Location: index.php");
}
else{
    $school = htmlspecialchars($_POST['schoolInput']);
    $username = htmlspecialchars($_POST['usernameInput']);
    $password = htmlspecialchars($_POST['passInput']);

    $users = $client->db->users;
    $document = array( 
        "username" => "Deny", 
        "password" => "1234"
     );
    $users->insertOne($document);

    header("Location: home.php");
}

?>