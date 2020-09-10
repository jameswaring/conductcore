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
</div>
</body>
</html>