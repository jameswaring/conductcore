<?php
// deactivates a pupil who has been added to the core previously. Written by James Waring
session_start();
ob_start();
if(!isset($_GET['id']) or !isset($_GET['react'])){
    echo('No pupil selected . Please return to the previous page');
}
if(isset($_GET['id'])){
    include_once 'db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'UPDATE `students` SET `active` = 0 WHERE `studentID` = :studentID';
    $intid = intval($_GET['id']);
    echo($_GET['id']);
    echo($intid);
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2-> bindValue(':studentID', $intid);
    $stmtUsr2 -> execute();
    header("Location: ../pupilsincore.php");
    die();
}
if(isset($_GET['react'])){
    include_once 'db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'UPDATE `students` SET `active` = 1 WHERE `studentID` = :studentID';
    $intid = intval($_GET['react']);
    echo($_GET['react']);
    echo($intid);
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2-> bindValue(':studentID', $intid);
    $stmtUsr2 -> execute();
    header("Location: ../pupilsincore.php");
    die();
}


?>