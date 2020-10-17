<?php

function checkRegister(){
    $dbconn = OpenCon();
    $sqlstmnt2 = 'SELECT * FROM compreg WHERE staffID = :staffID AND `date` = curdate()';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2 -> bindValue(':staffID', $_SESSION['loggedIn']['userID']);
    $stmtUsr2 -> execute();
    $row = $stmtUsr2->fetch();
    if(count($row)>1){
        header("Location: home.php");
        die();
    }
    else{
        header("Location: registration.php");
        die();
    }
}

?>