<?php
session_start();
echo 'testing php';
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
    School: <input type="text" name="schoolInput"><div id="erschool"></div><br>
    Username: <input type="text" name="usernameInput"><div id="eruser"></div><br>
    Password: <input type="text" name="passwordInput"><div id="erpass"></div>
    <input type="button" name="loginSubmit" value="submit" onclick="return validateLogin()">
</form>
</body>
</html>