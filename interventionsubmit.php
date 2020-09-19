<?php
session_start();
ob_start();
include 'includes/db_connection.php';

if(empty($_POST)){
    header("Location: index.php");
}
else{
        $dbconn = OpenCon();
        $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $studentID = intval($_SESSION['loggedStudent']['studentID']);
        $schoolID = $_SESSION['loggedStudent']['schoolID'];
        $logger = intval($_SESSION['loggedIn']['userID']);
        $intType = $_POST['intType'];
        $intDesc = $_POST['descInput'];
        $intDate = $_POST['intDate'];
        $sqlstmnt2 = 'INSERT INTO interventions(`type`, `comments`, `date`, `studentID`, `userID`, `schoolID`) VALUES (:intType,:intDesc,:intDate,:studentID,:logger,:schoolID)';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> bindValue(':intType', $intType);
        $stmtUsr2 -> bindValue(':intDesc', $intDesc);
        $stmtUsr2 -> bindValue(':intDate', $intDate);
        $stmtUsr2 -> bindValue(':logger', $logger);
        $stmtUsr2 -> bindValue(':schoolID', $schoolID);
        $stmtUsr2 -> bindValue(':studentID', $studentID);
        $stmtUsr2 -> execute();
        // fetch pupil's ID for use in further queries
        $sqlfetch = 'SELECT * FROM students WHERE studentID = (SELECT MAX(studentID) from students)';
        $sqlfetchexec = $dbconn -> prepare($sqlfetch);
        $sqlfetchexec -> execute();
        $row = $sqlfetchexec->fetch();
        $_SESSION['loggedStudent'] = $row;
        $id = $_SESSION['loggedStudent']['studentID'];
        //redirect to pupil's profile
        //header("Location: pupilprofile.php?id=".$id);
        //die();
}
?>