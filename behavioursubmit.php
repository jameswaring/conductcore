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
        $studentID = $_SESSION['loggedStudent']['studentID'];
        $schoolID = $_SESSION['loggedStudent']['schoolID'];
        $logger = $_SESSION['loggedIn']['userID'];
        $incType = $_POST['incType'];
        $incDesc = $_POST['incDesc'];
        $incDate = $_POST['incDate'];
        $sqlstmnt2 = 'INSERT INTO incidents (`type`, `description`, `date`, `studentID`, `userID`, `schoolID`) VALUES (:incType, :incDesc, :incDate, :studentID, :logger, :schoolID)';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> bindValue(':incType', $incType);
        $stmtUsr2 -> bindValue(':incDesc', $incDesc);
        $stmtUsr2 -> bindValue(':incDate', $incDate);
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
        // redirect to pupil's profile
        header("Location: pupilprofile.php");
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