<?php
// Written by James Waring. Checks whether the register has been completed
function checkRegister(){
    $dbconn = OpenCon();
    $sqlstmnt2 = 'SELECT * FROM compreg WHERE staffID = :staffID AND `date` = curdate()';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2 -> bindValue(':staffID', $_SESSION['loggedIn']['userID']);
    $stmtUsr2 -> execute();
    $row = $stmtUsr2->fetchAll(PDO::FETCH_ASSOC);
    if(sizeof($row)>1){
        header("Location: home.php");
        die();
    }
    else{
        header("Location: registration.php");
        die();
    }
}

?>