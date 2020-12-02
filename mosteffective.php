<?php

// shows the most effective intervention. Written by James Waring

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

<?php 
    $result = mostEffectiveIntWhole();
    if($result == 0){
        echo('Not enough interventions for this analysis');
    }
    else{
        foreach($result as $res){
            echo('<p class="welcome-message">The most effective intervention/s for this school was judged to be</p>');
            echo('<div class="studentmostname">'.$res.'</div><br>');
            $availints = array("Internal Detention", "After School Detention", "Phone Call Home", "Parental Meeting", "School Report",  "Internal Exclusion", "External Exclusion");
            $tried = getTriedIntsWhole();
            $triedArray = array();
            if(sizeof($tried)<sizeof($availints)){
                echo('<p class="welcome-message">However, the following interventions have yet to be tried</p>');
                foreach($tried as $try){
                    if(!in_array($try, $availints)){
                        array_push($triedArray, $try['type']);
                    }
                }
                echo('<p>');
                $diffs = array_diff($availints, $triedArray);
                foreach($diffs as $diff){
                    echo('<div class="studentmostname">'.$diff.'</div><p>');
                }
                
            }
        }
    }
?>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>