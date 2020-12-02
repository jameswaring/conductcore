<?php

// teacher view of a standard student. Written by James Waring. 

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
        include 'includes/menuloader.php';
        include 'includes/findpupilbyid.php';
        include 'includes/responsibilitysearch.php';
        include 'includes/analysisscripts.php';
    ?>
</head>
<body>
<div class="content">
<?php
    loadMenu();
?>
<?php
    if(isset($_GET['id'])){
        //load logged pupil info in to loggedStudent session variable
        $_SESSION['loggedStudent'] = findbyID($_GET['id']);
        echo('<h1>'.$_SESSION['loggedStudent']['firstName']." ".$_SESSION['loggedStudent']['surname'].'</h1>');
    }
    else{
        echo('Please find and select a pupil first');
    }

?>
</p>
<p class="welcome-message">

Click to add either a behaviour point or an intervention for this student<br>
</p>

<a href="addbehaviour.php" target="_self">Click to add a behaviour point</a><br>
<a href="addintervention.php" target="_self">Click to add an intervention</a>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>