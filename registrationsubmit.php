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
            echo($id);
        }
        $sqlstmnt2 = 'INSERT INTO attendance (`studentID`) VALUES (:studentID)';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> bindValue(':studentID', $studentID);
        $stmtUsr2 -> execute();
        // fetch pupil's ID for use in further queries
        //$sqlfetch = 'SELECT * FROM students WHERE studentID = (SELECT MAX(studentID) from students)';
        //$sqlfetchexec = $dbconn -> prepare($sqlfetch);
        //$sqlfetchexec -> execute();
        //$row = $sqlfetchexec->fetch();
        //$_SESSION['loggedStudent'] = $row;
        // redirect to pupil's profile
        //header("Location: pupilprofile.php?id=".$_SESSION['loggedStudent']["studentID"]);
        //die();
        } 
    catch (PDOException $e) {
        echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
    } 
    catch (Exception $e) {
        echo "General Error: The user could not be added.<br>".$e->getMessage();
    }
}
?>