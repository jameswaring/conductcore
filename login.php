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
        $passHash = password_hash($password, PASSWORD_DEFAULT);
        $school = $_POST['schoolInput'];
        $sqlstmnt2 = 'SELECT * FROM users WHERE username = :username AND password = :passHash and school = :school';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> bindValue(':username', $username);
        $stmtUsr2 -> bindValue(':passHash', $passHash);
        $stmtUsr2 -> bindValue(':school', $school);
        $stmtUsr2 -> execute();
        $rows = $stmtUsr -> fetchAll();
        $n = count($rows);
        if($n<1) {
            echo 'No user account exists. Please check your credentials';
        }
        else{
            foreach($rows as $row){
                $loggedUser = $row['username'];
                $_SESSION['username'] = $loggedUser;
        }
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