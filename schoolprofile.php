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
<h1>School Profile</h1>
<p class="welcome-message">

Here is the information on the whole school's core. 
To see more, click the appropriate section.

<div class="profilewrapper">
    <div class="profileitem"><a href="pupilsincore.php"><div class = "profileitemnum"><?php echo(pupilsInCore())?></div>total number of pupils</div></a>
    <div class="profileitem">Most Logged Pupil<div class="studentmostname"><?php echo($commonf." ".$commons);?></div></div>
    <div class="profileitem"><a href="behaviourovertimewhole.php"><div class = "profileitemnum"><?php echo(negPointsWhole());?></div>Behaviour points this year</div></a>
    <div class="profileitem"><a href="interventionsovertimewhole.php"><div class = "profileitemnum"><?php echo(getInterventionNumWhole())?></div>Interventions this year</div></a>
    <div class="profileitem"><a href="behaviourwhole.php"><div class = "studentmostname"><?php echo(mostCommonIncWhole());?></div>Most common behaviour</div></a>
    <div class="profileitem"><a href="interventionwhole.php"><div class="studentmostname"><?php echo(mostCommonIntWhole());?></div>Most common intervention</div></a>
</div>

<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>