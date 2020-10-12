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
    ?>
</head>
<body>
<div class="content">
<?php
    loadMenu();
?>
<h1>Success</h1>
<p class="welcome-message">The behaviour point has been submitted and added to the pupil's profile.
</p>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>