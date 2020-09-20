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
        include_once 'includes/findpupilbyid.php';
    ?>
</head>
<body>
<div class="content">
<?php
    include 'includes/teachermenu.php';
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

Here is the information on this pupil. To add a behaviour point for this pupil, click the button underneath the profile

<div class="profilewrapper">
    <div class="profileitem">pupil info</div>
    <div class="profileitem">in core since</div>
    <div class="profileitem">negative number</div>
    <div class="profileitem">negative breakdown</div>
    <div class="profileitem">interventions</div>
    <div class="profileitem">most useful intervention</div>
</div>

<a href="addbehaviour.php" target="_self">Click to add a behaviour point</a>
<a href="addintervention.php" target="_self">Click to add an intervention</a>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>