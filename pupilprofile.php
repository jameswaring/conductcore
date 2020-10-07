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
        echo('<h1>'.$_SESSION['loggedStudent']['firstName']." ".$_SESSION['loggedStudent']['surname'].'</h1>');
    }
    else{
        echo('Please find and select a pupil first');
    }

    if($_SESSION['loggedIn']['job'] == 4){
        header("Location: teacherpupprof.php?id=".$_GET['id']);
    }

?>
</p>
<p class="welcome-message">

Here is the information on this pupil. 
To see more, click the appropriate section.
To add a behaviour point for this pupil, click the button underneath the profile. 

<div class="profilewrapper">
    <div class="profileitem"><?php echo("Name: ".$_SESSION['loggedStudent']['firstName']." ".$_SESSION['loggedStudent']['surname'].'<br>'."Date of Birth: ".$_SESSION['loggedStudent']['dob'].'<br>'."Gender: ".$_SESSION['loggedStudent']['gender'].'<br>'."Year Group: ".$_SESSION['loggedStudent']['year'].'<br>'."Form: ".$_SESSION['loggedStudent']['formCode'].'<br>') ?></div>
    <div class="profileitem">in core since<br><br><?php echo($_SESSION['loggedStudent']['creationdate']);?></div>
    <div class="profileitem"><a href="behaviourovertime.php"><?php echo(negPoints($_SESSION['loggedStudent']['studentID']).'<br>'."total behaviour points");?></div></a>
    <div class="profileitem"><a href="interventionsovertime.php"><?php echo(getInterventionNum($_SESSION['loggedStudent']['studentID']).'<br>'."total interventions");?></div></a>
    <div class="profileitem"><a href="behaviour.php"><?php echo(mostCommonInc($_SESSION['loggedStudent']['studentID']).'<br>'."most common sanction");?></div></a>
    <div class="profileitem"><a href="intervention.php"><?php echo(mostCommonInt($_SESSION['loggedStudent']['studentID']).'<br>'."most common intervention");?></div></a>
</div>

<a href="addbehaviour.php" target="_self">Click to add a behaviour point</a>
<a href="addintervention.php" target="_self">Click to add an intervention</a>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>