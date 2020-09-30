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
    <div class="profileitem"><?php echo("total number of pupils");?></div>
    <div class="profileitem"><?php echo("total number of pupils");?></div>
    <div class="profileitem"><a href="behaviourovertime.php"><?php echo("Behaviour points this year")?></div></a>
    <div class="profileitem"><?php echo("interventions this year");?></div>
    <div class="profileitem"><a href="behaviour.php"><?php echo(mostCommonInc($_SESSION['loggedStudent']['studentID']).'<br>'."most common behaviour");?></div></a>
    <div class="profileitem"><a href="intervention.php"><?php echo(mostCommonInt($_SESSION['loggedStudent']['studentID']).'<br>'."most common intervention");?></div></a>
</div>

<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>