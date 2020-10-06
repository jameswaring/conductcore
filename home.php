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
    ?>
</head>
<body>
<div class="content">
<?php
if($_SESSION['loggedIn']['job'] == 1){
    include 'includes/headmenu.php';
}
else if($_SESSION['loggedIn']['job'] == 2){
    include 'includes/hoymenu.php';
}
else if($_SESSION['loggedIn']['job'] == 3){
    include 'includes/formtmenu.php';
}
else if($_SESSION['loggedIn']['job'] == 4){
    include 'includes/teachermenu.php';
}
else{
    include 'includes/teachermenu.php';
}


?>
<h1>Welcome to Conduct Core</h1>
<p class="welcome-message">The idea of Conduct Core is simple. You track the behaviour of pupils on a live basis.
    Every time you have a behaviour issue, you log it. When you decide to implement an intervention, you log that too.
    Over time we can not only track the behaviour of individual pupils, but we can also see what effect our individual
    interventions are having. We can use this information to plan for a better learning environment for each pupil.
</p>
<p class="welcome-message">
    Get started by using the menu at the top to find a pupil, or view the behaviour report of your own groups.
</p>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>