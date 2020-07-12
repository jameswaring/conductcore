<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Track Behaviour, Effectively Intervene</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript" link="scripts/accountControl.js"></script>
</head>
<body>
<h1>Welcome to Conduct Core</h1>
<p>Please login with your credentials below</p>
<form action="login.php" method="post">
    School: <input type="text" name="schoolInput">
    Username: <input type="text" name="usernameInput">
    Password: <input type="text" name="passwordInput">
    <input type="button" name="loginSubmit" onclick="return validateLogin()">
</form>
</body>
</html>