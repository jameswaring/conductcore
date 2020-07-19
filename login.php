<?php

include 'includes/db_connection.php';

if((!isset($$_POST['schoolInput'])) || (!isset($$_POST['usernameInput'])) || (!isset($$_POST['passInput']))){
    try {
    $dbconn = OpenCon();
    $username = "Harry";
    $password = "mypass";
    $school = "slc";
    $sqlstmnt2 = 'INSERT INTO users(username, password, school) VALUES(:username, :password, :school)';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2 -> bindValue(':username', $username);
    $stmtUsr2 -> bindValue(':password', $password);
    $stmtUsr2 -> bindValue(':school', $school);
    $stmtUsr2 -> execute();
    echo 'problem with post';
    } 
    catch (PDOException $e) {
        echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
    } 
    catch (Exception $e) {
        echo "General Error: The user could not be added.<br>".$e->getMessage();
    }
}
else{
    echo 'have run get client';
}
?>