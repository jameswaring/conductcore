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
<h1>The following pupils match your search. Click one to select</h1>
<p class="welcome-message">
    <?php
        if(($_SESSION['foundPupils']) == "none"){
            echo("No pupils were found with these details");
        }
        else{
            echo("<table class = 'blueTable'>");
            echo("<tr>");
                echo("<th>First Name</th>");
                echo("<th>Surname</th>");
                echo("<th>Date of Birth</th>");
            echo("</tr>");
            foreach($_SESSION['foundPupils'] as $found){
                echo("<tr>");
                    echo("<td>");
                    echo("<a href='pupilprofile.php?id=".$found['studentID']."'>");
                    echo($found['firstName']);
                    echo("</a>");
                    echo("</td>");
                    echo("<td>");
                    echo("<a href='pupilprofile.php?id=".$found['studentID']."'>");
                    echo($found['surname']);
                    echo("</a>");
                    echo("</td>");
                    echo("<td>");
                    echo("<a href='pupilprofile.php?id=".$found['studentID']."'>");
                    echo($found['dob']);
                    echo("</a>");
                    echo("</td>");
                echo("</tr>");
                }
                echo("<table>");
        }
        // link
        // a href='pupilprofile.php?id=".$found['studentID']
    ?>
</p>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>