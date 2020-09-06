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
<h1>Add an intervention</h1>
<script>
  $( function() {
    $( "#incdate" ).datepicker();
  } );
</script>
<form action="login.php" method="post">
    Student Name: <input type="text" autocomplete="off" name="usernameInput"><br>
    Incident Type: <select id="incType" name="incType">
        <option value="Classwork">classwork</option>
        <option value="Homework">homework</option>
        <option value="Break incident">break</option>
        <option value="Lunch Incident">lunch</option>
        <option value="Racism">racism</option>
        <option value="Sexism">sexism</option>
        <option value="Truancy">truancy</option>
        <option value="Bullying">bullying</option>
        <option value="Homophobia">homophobia</option>
        <option value="Hate Speech">hatespeech</option>
      </select><br>
    Incident Description: <textarea name="descInput" autocomplete="off" rows="6" cols="50"></textarea><div id="erdesc"></div>
    Incident Date: <input type="text" id="incdate" name="incdate"><div id="erdate"></div>
    <input type="submit" name="loginSubmit" value="login" onclick="if(validateLogin()) this.form.submit()">
</form>
</div>
</body>
</html>