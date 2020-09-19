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
    $( "#intDate" ).datepicker({
      dateFormat: 'yy-mm-dd',
      autoclose: true,
      todayHighlight: true,
      maxDate: new Date()
    });
  } );
</script>
<form action="interventionsubmit.php" method="post">
    Incident Type: <select id="intType" name="intType">
        <option value="schoolDet">in-school detention</option>
        <option value="outDet">after-school detention</option>
        <option value="call">phone call home</option>
        <option value="parentMeet">parental meeting</option>
        <option value="report">school report</option>
        <option value="Sexism">internal isolation</option>
        <option value="Truancy">external exclusion</option>
      </select><br><div id="ertype"></div>
    Incident Description: <textarea name="descInput" autocomplete="off" rows="6" cols="50"></textarea><div id="erdesc"></div>
    Incident Date: <input type="text" id="intDate" name="intDate"><div id="erdate"></div>
    <input type="submit" name="loginSubmit" value="submit" onclick="if(validateIntervention()) this.form.submit()">
</form>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>