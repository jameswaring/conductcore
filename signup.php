<?php

include 'includes/db_connection.php';

if(empty($_POST)){
    header("Location: index.php");
}
else{
    try {
        $dbconn = OpenCon();
        $username = $_POST['usernameInput'];
        $password = $_POST['passInput'];
        $passHash = password_hash($password, PASSWORD_DEFAULT);
        $school = $_POST['schoolInput'];
        $sqlstmnt2 = 'INSERT INTO users(username, password, school) VALUES(:username, :passHash, :school)';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> bindValue(':username', $username);
        $stmtUsr2 -> bindValue(':passHash', $passHash);
        $stmtUsr2 -> bindValue(':school', $school);
        $stmtUsr2 -> execute();
        header("Location: home.php");
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