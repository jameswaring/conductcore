<?php
session_start();
include 'includes/db_connection.php';
include 'includes/registerscripts.php';

if(empty($_POST)){
    header("Location: index.php");
}
else{
    try {
        $dbconn = OpenCon();
        $username = $_POST['usernameInput'];
        $password = $_POST['passwordInput'];
        $school = $_POST['schoolInput'];
        $sqlstmnt2 = 'SELECT * FROM users WHERE username = :username AND school = :school';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> bindValue(':username', $username);
        $stmtUsr2 -> bindValue(':school', $school);
        $stmtUsr2 -> execute();
        $row = $stmtUsr2->fetch();
        if(!password_verify($password, $row['password'])) {
            echo 'No user account exists. Please check your credentials'."<br>";
        }
        else{
            $_SESSION['regComplete'] = 1;
            $_SESSION['loggedIn'] = $row;
            // now check whether form teacher for register to be checked
            if($_SESSION['loggedIn']['job'] == 3){
                checkRegister();
            }
            else{
                header("Location: home.php");
                die();
                }
            }
        } 
    catch (PDOException $e) {
        echo "DataBase Error: The user could not be logged in.<br>".$e->getMessage();
    } 
    catch (Exception $e) {
        echo "General Error: The user could not be logged in.<br>".$e->getMessage();
    }
}

?>