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
<?php

  echo '<h1>Add a behaviour for '.$_SESSION['loggedStudent']['firstName'].'</h1>';

?>
<script>
  $( function() {
    $( "#incDate" ).datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
      endDate: new Date
    });
  } );
</script>
<form action="behavioursubmit.php" method="post" onsubmit="return validateBehaviour()">
    Incident Type: <select id="incType" name="incType">
        <option value="Classwork">Classwork</option>
        <option value="Homework">Homework</option>
        <option value="Break incident">Break Incident</option>
        <option value="Lunch Incident">Lunch Incident</option>
        <option value="Racism">Racism</option>
        <option value="Sexism">Sexism</option>
        <option value="Truancy">Truancy</option>
        <option value="Bullying">Bullying</option>
        <option value="Homophobia">Homophobia</option>
        <option value="Hate Speech">Hatespeech</option>
      </select><br><div id="ertype"></div>
    Incident Description: <textarea name="descInput" id="descInput" autocomplete="off" rows="6" cols="50" maxlength="500"></textarea>
    Incident Date: <input type="text" id="incDate" name="incDate"><div id="erdate"></div>
    <input type="submit">
</form>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>