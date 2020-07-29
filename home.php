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
<h1>Welcome to Conduct Core</h1>
<p class="welcome-message">The idea of Conduct Core is simple. You track the behaviour of pupils on a live basis.
    Every time you have a behaviour issue, you log it. When you decide to implement an intervention, you log that too.
    Over time we can not only track the behaviour of individual pupils, but we can also see what effect our individual
    interventions are having. We can use this information to plan for a better learning environment for each pupil.
</p>
</div>
</body>
</html>