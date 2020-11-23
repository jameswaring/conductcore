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
        include 'includes/analysisscripts.php';
    ?>
</head>
<body>
<div class="content">
<?php
    loadMenu();
?>
<h1>Most Effective Intervention</h1>
<p class="welcome-message">The most effective intervention for this (pupil/school) was judged to be
</p>
<?php $result = mostEffectiveIntWhole();
    if($result == 0){
        echo('Not enough interventions for this analysis');
    }
    else{
        foreach($result as $res){
            echo($res.'<br>');
        }
    }

    $tried = getTriedInts();
?>
<p class="welcome-message">
    Get started by using the menu at the top to find a pupil, or view the behaviour report of your own groups.
</p>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>