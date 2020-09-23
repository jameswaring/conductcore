<?php
    session_start();
    ob_start();
    if(!isset($_SESSION['loggedIn'])){
        header("Location: index.php");
        die();
    }
    else if(!isset($_SESSION['loggedStudent'])){
            header("Location: nostudent.php");
            die();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <?php
        include 'includes/head.php';
    ?>
</head>
<body>
<div class="content">
<?php
include 'includes/teachermenu.php';
?>
<h1>Behaviour Points</h1>

<?php
    
?>

<p class="welcome-message">Below is a breakdown of the behaviour points recorded for this student
</p>

<?php



?>

<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>