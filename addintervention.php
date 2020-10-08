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

  echo '<h1>Add an intervention for '.$_SESSION['loggedStudent']['firstName'].'</h1>';

?>
<script>
  $( function() {
    $( "#intDate" ).datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
      maxDate: new Date()
    });
  } );
</script>
<form action="interventionsubmit.php" method="post">
    Intervention Type: <select id="intType" name="intType">
        <option value="Internal Detention">In-school Detention</option>
        <option value="After School Detention">After-school Detention</option>
        <option value="Phone Call Home">Phone Call Home</option>
        <option value="Parental Meeting">Parental Meeting</option>
        <option value="School Report">School Report</option>
        <option value="Internal Exclusion">Internal Isolation</option>
        <option value="External Exclusion">External Exclusion</option>
      </select><br><div id="ertype"></div>
    Intervention Description: <textarea name="descInput" autocomplete="off" rows="6" cols="50"></textarea><div id="erdesc"></div>
    Intervention Date: <input type="text" id="intDate" name="intDate"><div id="erdate"></div>
    <input type="submit" name="loginSubmit" value="submit" onclick="if(validateIntervention()) this.form.submit()">
</form>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>