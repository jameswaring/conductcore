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
   The following is the profile for <?php echo $_SESSION['loggedStudentFirstName'];?>
</p>
</div>
</body>
</html>