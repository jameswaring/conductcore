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
        include 'includes/findpupilbyid.php';
        include 'includes/responsibilitysearch.php';
        include 'includes/analysisscripts.php';
    ?>
</head>
<body>
<div class="content">
<?php
    loadMenu();
?>
<h1>Groups</h1>
<p class="welcome-message">On this page you will see an overview of pupils in the core. You will
 only see pupils who you have been identified as having personal responsibility for.
 To find other pupils to add a behaviour record or intervention to, click 'find
  pupils' in the menu. <br><br>The following are your pupils that are currently in the Core.
</p>

<?php
    // logic to separate groups. Non-form teachers will see no groups. Form teachers will see their form. 
    // Year heads will see the whole year and headteachers will see every pupil in the core.
    $found = staffResponsibilities($_SESSION['loggedIn']['userID']);
    if($found == "none"){
        echo "You are not responsible for any pupils";
    }
    else{
        echo("<table class = 'blueTable'>");
            echo("<tr>");
                echo("<th>First Name</th>");
                echo("<th>Surname</th>");
                echo("<th>Today's Behaviour Points</th>");
            echo("</tr>");
        foreach($found as $pupils){
            echo("<tr>");
                echo("<td>");
                echo("<a href='pupilprofile.php?id=".$pupils['studentID']."'>");
                echo($pupils['firstName']);
                echo("</a>");
                echo("</td>");
                echo("<td>");
                echo("<a href='pupilprofile.php?id=".$pupils['studentID']."'>");
                echo($pupils['surname']);
                echo("</a>");
                echo("</td>");
                echo("<td>");
                echo("<a href='pupilprofile.php?id=".$pupils['studentID']."'>");
                echo(behavioursToday($pupils['studentID']));
                echo("</a>");
                echo("</td>");
            echo("</tr>");
            }
            echo("<table>");
    }
?>
<br><br>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>