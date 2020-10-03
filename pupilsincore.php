<?php
    session_start();
    ob_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: index.php");
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <?php
        include 'includes/head.php';
    ?>
</head>
<body>
<div class="content">
<?php
include 'includes/teachermenu.php';
?>
<h1>The following pupils are currently in the core</h1>
<p class="welcome-message">
    <?php
        include_once 'includes/db_connection.php';
        $dbconn = OpenCon();
        $sqlstmnt2 = 'SELECT * FROM students WHERE active = 1';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> execute();
        $rows = $stmtUsr2->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows as $found){
                echo("<a href='pupilprofile.php?id=".$found['studentID']."'".">".$found['firstName'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$found['surname'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$found['dob']."</a><br>");
            }
    ?>
</p>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
<?php

?>
</body>
</html>