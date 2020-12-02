<?php

// take the attendance for the group. Written by James Waring. 

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
<h1>Attendance Register</h1>
<p class="welcome-message">Please take attendance before you go further. Promptly and frequently taken attendance will aid 
    the application in producing meaningful data analysis.
     <br><br>Check the boxes of the pupils who are present and click SUBMIT.
</p>

<?php
    // logic to separate groups. Non-form teachers will see no groups. Form teachers will see their form. 
    // Year heads will see the whole year and headteachers will see every pupil in the core.
    $found = staffResponsibilities($_SESSION['loggedIn']['userID']);
    if($found == "none"){
        echo "You are not responsible for any pupils";
    }
    else{
        echo("<form class='registerform' action='registrationsubmit.php' method='post'>");
            echo("<table class = 'blueTable'>");
                echo("<tr>");
                    echo("<th>First Name</th>");
                    echo("<th>Surname</th>");
                    echo("<th>Present?</th>");
                echo("</tr>");
            foreach($found as $pupils){
                echo("<tr>");
                    echo("<td>");
                    echo($pupils['firstName']);
                    echo("</td>");
                    echo("<td>");
                    echo($pupils['surname']);
                    echo("</td>");
                    echo("<td>");
                    echo("<input type='checkbox' name='check[]' value='".$pupils['studentID']."'");
                    echo("</td>");
                echo("</tr>");
                }
                echo("</table>");
                echo("<br>");
            echo("<input type='submit'>");
        echo("</form>");
    }
?>
<br><br>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>