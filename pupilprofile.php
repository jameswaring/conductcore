<?php
    session_start();
    ob_start();
    if(!isset($_SESSION['username'])){
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
<h1>Name of Pupil</h1>
<p class="welcome-message">
</p>
<p class="welcome-message">
<?php
    if(isset($_GET['id'])){
        //load logged pupil info in to loggedStudent session variable
        $_SESSION['loggedStudent'] = findbyID($_GET['id']);
    }
    echo('The following is the profile for '.$_SESSION['loggedStudent']['firstName']);
?>
</p>
Here is the information on this pupil. To add a behaviour point for this pupil, click the button underneath the profile

------pupil dashboard panel to go here-----

<a href="addbehaviourpoint.php" target="_self">Click to add behaviour point</a>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>