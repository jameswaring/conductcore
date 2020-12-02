<?php

// Pupil has now been reactivated. Written by James Waring. 

    session_start();
    ob_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: index.php");
        die();
    }
    else if(!isset($GET['react'])){
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
    $id = $_GET['react'];

?>
<h1>Pupil Reactivated</h1>
<p class="welcome-message">You can now find them in the core
</p>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>