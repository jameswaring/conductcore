<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <?php
        include 'includes/head.php';
    ?>
    <script type="text/javascript" src="scripts/accountControl.js"></script>
</head>
<body>
<div class="content">
<?php
include 'includes/teachermenu.php';
?>
<h1>Add a Pupil</h1>
<p class="welcome-message">Use the form below to register a pupil for your Conduct Core. Registering a pupil
will allow you to keep a record of their behaviour, log interventions and track their progress over time. Pupils who have 
improved to a point you think they no longer need help can be removed from your Core, but their profile will
remain in case you wish to reactive it at a later date. To permanently remove a pupil (for example, someone who has left the school) contact your administrator.
</p>
<p class="welcome-message">
    Add the pupil information here.
</p>
<div class="regPupForm">
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
        endDate: new Date()
    });
  });
  </script>
<form action="registersubmit.php" method="post">
    First Name: <input type="text" autocomplete="off" name="fnameInput"><div id="erfirstname"></div><br>
    Surname: <input type="text" autocomplete="off" name="snameInput"><div id="ersurname"></div><br>
    Sex:      <input type="text" name="sexInput" autocomplete="off"><div id="ersex"></div><br>
    DOB:    <input type="text" id="datepicker" name="dobInput"><div id="erdob"></p>
    <input type="submit" name="pupilRegSubmit" value="Register" onclick="if(validatePupilReg()) this.form.submit()">
</form>
</div>
</div>
</body>
</html>