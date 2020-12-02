<?php

// searches for an inactive pupil to reactivate. Written by James Waring

    include 'registersubmit.php';
    session_start();
    ob_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: index.php");
        die();
    }
    if(isset($_GET['confirm'])){
        addpupil();
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <?php
        include 'includes/head.php';
        include 'includes/menuloader.php';
    ?>
</head>
<body>
<div class="content">
<?php
    loadMenu();
?>
<h1>We found similar pupils already in the system</h1>
<p class="welcome-message">Click one of the following to reactivate their profile or click under the table to create a new profile</p>
<p class="welcome-message">
    <?php
        if(($_SESSION['foundpupils']) == "none"){
            echo("No pupils were found with these details");
        }
        else{
            echo("<table class = 'blueTable'>");
            echo("<tr>");
                echo("<th>First Name</th>");
                echo("<th>Surname</th>");
                echo("<th>Date of Birth</th>");
            echo("</tr>");
            foreach($_SESSION['foundpupils'] as $found){
                echo("<tr>");
                    echo("<td>");
                    echo("<a href='includes/deactivatepupil.php?react=".$found['studentID']."'>");
                    echo($found['firstName']);
                    echo("</a>");
                    echo("</td>");
                    echo("<td>");
                    echo("<a href='includes/deactivatepupil.php?react=".$found['studentID']."'>");
                    echo($found['surname']);
                    echo("</a>");
                    echo("</td>");
                    echo("<td>");
                    echo("<a href='includes/deactivatepupil.php?id=".$found['studentID']."'>");
                    echo($found['dob']);
                    echo("</a>");
                    echo("</td>");
                echo("</tr>");
                }
                echo("<table>");
        }
    ?>
    <br><br><p class="welcome-message">Click <a href="reactivatesearch.php?confirm='yes'">HERE</a> to continue with the registration of the pupil</p>
</p>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>