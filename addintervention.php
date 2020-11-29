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

  echo '<h1>Add an intervention for '.$_SESSION['loggedStudent']['firstName'].'</h1>';

?>
<script>
  $( function() {
    $( "#intDate" ).datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
      endDate: new Date,
      
    });
  } );

  const textarea = document.querySelector("textarea");
</script>
<form action="interventionsubmit.php" method="post">
    Intervention Type: <select id="intType" name="intType" required>
        <option value="Internal Detention">In-school Detention</option>
        <option value="After School Detention">After-school Detention</option>
        <option value="Phone Call Home">Phone Call Home</option>
        <option value="Parental Meeting">Parental Meeting</option>
        <option value="School Report">School Report</option>
        <option value="Internal Exclusion">Internal Isolation</option>
        <option value="External Exclusion">External Exclusion</option>
      </select><br><br>
    Intervention Description: <textarea name="descInput" id="descInput" autocomplete="off" rows="6" cols="50" maxlength="500" required></textarea><div id="erdesc"></div>
    <div id="remaining">Remaining: 500</div><br>
    Intervention Date: <input type="text" id="intDate" name="intDate" required><div id="erdate"></div>
    
    <input type="submit" name="loginSubmit" value="submit">
</form>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
<script>
    a = document.querySelector("#descInput");
    a.addEventListener("input", event => {
    const target = event.currentTarget;
    const maxLength = 500;
    const currentLength = target.value.length;
    if (currentLength >= maxLength) {
        return console.log("You have reached the maximum number of characters.");
    };
    document.getElementById("remaining").innerHTML = "Remaining: " + (maxLength-currentLength);
    });
</script>
</body>
</html>