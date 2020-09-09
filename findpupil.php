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
        $fname = $_POST['pupilfname'];
        $sname = $_POST['pupilsname'];
        $schoolID = $_SESSION['school'];
        $sqlstmnt2 = 'SELECT * FROM students WHERE firstName = :fname AND surname = :sname AND schoolID = :schoolID';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> bindValue(':fname', $fname);
        $stmtUsr2 -> bindValue(':sname', $sname);
        $stmtUsr2 -> bindValue(':schoolID', $schoolID);
        $stmtUsr2 -> execute();
        $rows = $stmtUsr2->fetchAll(PDO::FETCH_ASSOC);
        if(sizeof($rows) > 0)
        {
            //list found pupils
            $_SESSION['foundPupils'] = $rows;
            header("Location: foundpupils.php");
            die();
        }
        else{
        // redirect to pupil's profile
        $_SESSION['foundPupils'] = "none";
        header("Location: foundpupils.php");
        die();
           }
        } 
    catch (PDOException $e) {
        echo "DataBase Error: The user could not be found.<br>".$e->getMessage();
    } 
    catch (Exception $e) {
        echo "General Error: The user could not be found.<br>".$e->getMessage();
    }
}
?>