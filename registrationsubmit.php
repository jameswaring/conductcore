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
        $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        foreach ($_POST['check'] as $id => $value) {
            $sqlstmnt2 = 'INSERT INTO attendance (`studentID`, `present`) VALUES (:studentID, True)';
            $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
            $stmtUsr2 -> bindValue(':studentID', $value);
            $stmtUsr2 -> execute();
        }
        // now add teacher's ID and date to completed registers
        $sqlstmnt2 = 'INSERT INTO compreg (`staffID`, `date`) VALUES (:staffID, now())';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> bindValue(':staffID', $_SESSION['loggedIn']['userID']);
        $stmtUsr2 -> execute();
        header("Location: home.php");
        } 
    catch (PDOException $e) {
        echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
    } 
    catch (Exception $e) {
        echo "General Error: The user could not be added.<br>".$e->getMessage();
    }
}
?>