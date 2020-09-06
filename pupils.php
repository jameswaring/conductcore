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
<h1>Find a pupil</h1>
<p class="welcome-message">Enter the full name of the pupil below to show their page
</p>
<p class="welcome-message">
    All pupils may not be visible depending on how the system has been set up by your administrator
</p>
<div class="pupil-search">
<form action="findpupil.php" method="post">
    First Name: <input type="text" autocomplete="off" name="pupilfname"><div id="ername"></div><br>
    Surname: <input type="text" autocomplete="off" name="pupilsname"><div id="ersurname"></div><br>
    <input type="submit" name="searchSubmit" value="search" onclick="if(validatePupilSearch()) this.form.submit()">
</form>
</div>
</div>
</body>
</html>