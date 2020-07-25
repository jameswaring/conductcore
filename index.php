<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Track Behaviour, Effectively Intervene</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script type="text/javascript" src="scripts/accountControl.js"></script>
</head>
<body>
<div class="flex-container">
<h1 class="display-44">Welcome to Conduct Core</h1>
<div class="centre-holder">
<div class="centre-item">
<p>Please login with your supplied credentials below</p>
</div>
<form action="login.php" method="post">
    <div class="centre-item">Username: <input type="text" name="usernameInput"><div id="eruser"></div><br></div>
    <div class="centre-item">Password: <input type="password" name="passwordInput"><div id="erpass"></div><br></div>
    <div class="centre-item">School: <input type="text" name="schoolInput"><div id="erschool"></div></div>
    <input type="submit" name="loginSubmit" value="login" onclick="if(validateLogin()) this.form.submit()">
</form>
</div>
<!-- 
<p>Or register here</p>
<form action="signup.php" method="post">
    Username: <input type="text" name="usernameInput"><div id="eruser"></div><br>
    Password: <input type="text" name="passwordInput"><div id="erpass"></div><br>
    School: <input type="text" name="schoolInput"><div id="erschool"></div>
    <input type="submit" name="loginSubmit" value="register" onclick="if(validateLogin()) this.form.submit()">
</form>
-->
</div>
</body>
</html>