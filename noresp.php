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
<h1>Behaviour</h1>
<p class="welcome-message">You are not responsible for any pupils
</p>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>