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
    <div class="profileitem"><?php echo('<img src="images/'.$_SESSION['loggedStudent']['studentID'].'"'.'alt="Profile Pic" width="70" height="100"');?>/></div>
    <div class="profileitem"><?php 
    $dt = new DateTime($_SESSION['loggedStudent']['dob']);
    $dt = $dt->format('Y-m-d');
    echo("Name: ".$_SESSION['loggedStudent']['firstName']." ".$_SESSION['loggedStudent']['surname'].'<br>'."Date of Birth: ".$dt.'<br>'."Gender: ".$_SESSION['loggedStudent']['gender'].'<br>'."Year Group: ".$_SESSION['loggedStudent']['year'].'<br>'."Form: ".$_SESSION['loggedStudent']['formCode']); 
    ?></div>
    <div class="profileitem"><div class = "studentmostname">In Core Since</div><br><br><?php echo($_SESSION['loggedStudent']['creationdate']);?></div>
    <div class="profileitem"><a href="behaviourovertime.php"><div class = "profileitemnum"><?php echo(negPoints($_SESSION['loggedStudent']['studentID']).'</div>'.'<br>'."total behaviour points");?></div></a>
    <div class="profileitem"><a href="interventionsovertime.php"><div class = "profileitemnum"><?php echo(getInterventionNum($_SESSION['loggedStudent']['studentID']).'<br>'.'</div>'."total interventions");?></div></a>
    <div class="profileitem"><a href="behaviour.php"><div class = "studentmostname"><?php echo(mostCommonInc($_SESSION['loggedStudent']['studentID']).'<br>'.'</div>'."most common sanction");?></div></a>
    <div class="profileitem"><a href="intervention.php"><div class = "studentmostname"><?php echo(mostCommonInt($_SESSION['loggedStudent']['studentID']).'<br>'.'</div>'."most common intervention");?></div></a>
    <div class="profileitem"><a href="intervention.php">Most Effective Intervention<div class = "studentmostname">Placeholder</div></a></div>
</div>

<a href="addbehaviour.php" target="_self">Click to add a behaviour point</a>
<a href="addintervention.php" target="_self">Click to add an intervention</a>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>