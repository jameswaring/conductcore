<?php
session_start();
ob_start();
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
    $( "#datepick" ).datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true,
      todayHighlight: true,
      maxDate: new Date()
    });
  } );
  </script>
<form class="form-style-6" action="registersubmit.php" enctype="multipart/form-data" method="post" onsubmit="return validatePupilReg()">
    First Name: <input type="text" autocomplete="off" name="fnameInput"><div id="erfirstname"></div><br>
    Surname: <input type="text" autocomplete="off" name="snameInput"><div id="ersurname"></div><br>
    Sex:      <select id="sexInput" name="sexInput">
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select><div id="ersex"></div><br>
    DOB:    <input type="text" id="datepick" name="dobInput"><div id="erdob"></div><br>
    Year:   <select id="yearInput" name="yearInput">
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
    </select><div id="eryear"></div><br>
    Form:      <select id="formInput" name="formInput">
        <option value="7a">7a</option>
        <option value="7b">7b</option>
        <option value="7c">7c</option>
        <option value="8a">8a</option>
        <option value="8b">8b</option>
        <option value="8c">8c</option>
        <option value="9a">9a</option>
        <option value="9b">9b</option>
        <option value="9c">9c</option>
        <option value="10a">10a</option>
        <option value="10b">10b</option>
        <option value="10c">10c</option>
        <option value="11a">11a</option>
        <option value="11b">11b</option>
        <option value="11c">11c</option>
    </select><div id="erform"></div><br>
    Image:
        <input type="file" name="profpic">
    <input type="submit">
</form>
</div>
<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>