<?php
session_start();
ob_start();
include 'includes/db_connection.php';

if(empty($_POST)){
    header("Location: index.php");
}
else{
        $dbconn = OpenCon();
        $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $studentID = intval($_SESSION['loggedStudent']['studentID']);
        $schoolID = $_SESSION['loggedStudent']['schoolID'];
        $logger = intval($_SESSION['loggedIn']['userID']);
        $incType = $_POST['incType'];
        $incDesc = $_POST['descInput'];
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
        $id = $_SESSION['loggedStudent']['studentID'];
        // redirect to pupil's profile
        header("Location: pupilprofile.php?id=".$id);
        die();
}
?>