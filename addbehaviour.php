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
include 'includes/teachermenu.php';
?>
<?php

  echo '<h1>Add a behaviour for '.$_SESSION['loggedStudent']['firstName'].'</h1>';

?>
<script>
  $( function() {
    $( "#incDate" ).datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
    });
  } );
</script>
<form action="behavioursubmit.php" method="post" onsubmit="return validateBehaviour()">
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
      </select><br><div id="ertype"></div>
    Incident Description: <textarea name="descInput" id="descInput" autocomplete="off" rows="6" cols="50"></textarea><div id="erdesc"></div>
    Incident Date: <input type="text" id="incDate" name="incDate"><div id="erdate"></div>
    <input type="submit">
</form>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>