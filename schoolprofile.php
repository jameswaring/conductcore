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
    $commonArray = mostLoggedPupil();
    $commonf = $commonArray[0]['firstName'];
    $commons = $commonArray[0]['surname'];
?>
</p>
<p class="welcome-message">

Here is the information on the whole school's core. 
To see more, click the appropriate section.

<div class="profilewrapper">
    <div class="profileitem"><a href="pupilsincore.php"><?php echo(pupilsInCore()."<br><br>total number of pupils");?></div></a>
    <div class="profileitem"><?php echo("most logged pupil"."<br><br>".$commonf." ".$commons);?></div>
    <div class="profileitem"><a href="behaviourovertimewhole.php"><?php echo(negPointsWhole()."<br><br>Behaviour points this year");?></div></a>
    <div class="profileitem"><a href="interventionsovertimewhole.php"><?php echo(getInterventionNumWhole()."<br><br>Interventions this year");?></div></a>
    <div class="profileitem"><a href="behaviourwhole.php"><?php echo(mostCommonIncWhole().'<br>'."most common behaviour");?></div></a>
    <div class="profileitem"><a href="interventionwhole.php"><?php echo(mostCommonIntWhole().'<br>'."most common intervention");?></div></a>
</div>

<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>