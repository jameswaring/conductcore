<?php
session_start();
ob_start();
include 'includes/db_connection.php';

if(empty($_POST)){
    header("Location: index.php");
}
else{
    try {
        $dbconn = OpenCon();
        $username = $_POST['usernameInput'];
        $password = $_POST['passInput'];
        $fname = $_POST['fnameInput'];
        $surname = $_POST['surnameInput'];
        $passHash = password_hash($password, PASSWORD_DEFAULT);
        $school = $_POST['schoolInput'];
        $job = $_POST['jobInput'];
        $sqlstmnt2 = 'INSERT INTO users(username, firstName, surname, password, school, job) VALUES(:username, :fname, :surname, :passHash, :school, :job)';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> bindValue(':username', $username);
        $stmtUsr2 -> bindValue(':fname', $fname);
        $stmtUsr2 -> bindValue(':surname', $surname);
        $stmtUsr2 -> bindValue(':passHash', $passHash);
        $stmtUsr2 -> bindValue(':school', $school);
        $stmtUsr2 -> bindValue(':job', $job);
        $stmtUsr2 -> execute();
        //header("Location: index.php");
        die();
        } 
    catch (PDOException $e) {
        echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
    } 
    catch (Exception $e) {
        echo "General Error: The user could not be added.<br>".$e->getMessage();
    }
}
?>