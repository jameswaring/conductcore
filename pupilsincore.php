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
<h1>The following pupils are currently in the core</h1>
<p class="subtitle">Click one to view their profile</p>

    <?php
        include_once 'includes/db_connection.php';
        $dbconn = OpenCon();
        $sqlstmnt2 = 'SELECT * FROM students WHERE active = 1';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> execute();
        $rows = $stmtUsr2->fetchAll(PDO::FETCH_ASSOC);

        echo("<table class = 'blueTable'>");
                echo("<tr>");
                    echo("<th>First Name</th>");
                    echo("<th>Surname</th>");
                    echo("<th>In Core Since</th>");
                    echo("<th>Deactivate?</th>");
                echo("</tr>");
            foreach($rows as $pupils){
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
                    echo(date('Y-n-j', strtotime($pupils['creationdate'])));
                    echo("</td>");
                    echo("<td>");
                    echo('<a href="includes/deactivatepupil.php?id='.$pupils['studentID'].'">remove</a>');
                    echo("</td>");
                echo("</tr>");
                }
                echo("</table>");
    ?>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>