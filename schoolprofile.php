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
        include 'includes/analysisscripts.php';
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
        echo('<h1>Whole School Profile</h1>');
    }
    else{
        echo('Please find and select a pupil first');
    }
?>
</p>
<p class="welcome-message">

Here is the information on the whole school's core. 
To see more, click the appropriate section.

<div class="profilewrapper">
    <div class="profileitem"><a href="pupilsincore.php"><?php echo(pupilsInCore()."<br><br>total number of pupils");?></div></a>
    <div class="profileitem"><?php echo("total number of pupils");?></div>
    <div class="profileitem"><a href="behaviourovertimewhole.php"><?php echo(negPointsWhole()."<br><br>Behaviour points this year");?></div></a>
    <div class="profileitem"><a href="interventionsovertimewhole.php"><?php echo(getInterventionNumWhole()."<br><br>Interventions this year");?></div></a>
    <div class="profileitem"><a href="behaviourwhole.php"><?php echo(mostCommonInc($_SESSION['loggedStudent']['studentID']).'<br>'."most common behaviour");?></div></a>
    <div class="profileitem"><a href="interventionwhole.php"><?php echo(mostCommonInt($_SESSION['loggedStudent']['studentID']).'<br>'."most common intervention");?></div></a>
</div>

<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>