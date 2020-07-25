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
        $school = $_POST['schoolInput'];
        $sqlstmnt2 = 'SELECT * FROM users WHERE username = :username AND school = :school';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> bindValue(':username', $username);
        $stmtUsr2 -> bindValue(':school', $school);
        $stmtUsr2 -> execute();
        $row = $stmtUsr2->fetch();
        if(!password_verify($_POST['passInput'], $row['password'])) {
            echo 'No user account exists. Please check your credentials'."<br>";
        }
        else{
            $_SESSION['username'] = $username;
            header("Location: home.php");
            die();
            }
        } 
    catch (PDOException $e) {
        echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
    } 
    catch (Exception $e) {
        echo "General Error: The user could not be added.<br>".$e->getMessage();
    }
}

?>