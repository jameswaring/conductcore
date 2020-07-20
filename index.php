<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Track Behaviour, Effectively Intervene</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript" src="scripts/accountControl.js"></script>
</head>
<body>
<h1>Welcome to Conduct Core</h1>
<p>Please login with your credentials below</p>
<form action="login.php" method="post">
    Username: <input type="text" name="usernameInput"><div id="eruser"></div><br>
    Password: <input type="text" name="passwordInput"><div id="erpass"></div><br>
    School: <input type="text" name="schoolInput"><div id="erschool"></div>
    <input type="submit" name="loginSubmit" value="login" onclick="if(validateLogin()) this.form.submit()">
</form>
<p>Or register here</p>
<form action="signup.php" method="post">
    Username: <input type="text" name="usernameInput"><div id="eruser"></div><br>
    Password: <input type="text" name="passwordInput"><div id="erpass"></div><br>
    School: <input type="text" name="schoolInput"><div id="erschool"></div>
    <input type="submit" name="loginSubmit" value="register" onclick="if(validateLogin()) this.form.submit()">
</form>
</body>
</html>