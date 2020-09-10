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
<h1>The following pupils match your search. Click one to select</h1>
<p class="welcome-message">
    <?php
        if(($_SESSION['foundPupils']) == "none"){
            echo("No pupils were found with these details");
        }
        else{
            foreach($_SESSION['foundPupils'] as $found){
                    echo("<a href='pupilprofile.php?id=".$found['studentID']."'".">".$found['firstName'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$found['surname'].'&nbsp;&nbsp;&nbsp;&nbsp;'.$found['dob']."</a><br>");
                }
        }
    ?>
</p>
<p class="loggedin">You are logged in as <?php echo($_SESSION['firstName']);?></ps>
</div>
</body>
</html>