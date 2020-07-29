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
<h1 class="display-44">Welcome to Conduct Core</h1><br>
<div class="wrap">
<div class="index-holder">
<div class="login-form">
<p>Please login with your supplied credentials below</p>
<form action="login.php" method="post">
    Username: <input type="text" autocomplete="off" name="usernameInput"><div id="eruser"></div><br>
    Password: <input type="password" autocomplete="off" name="passwordInput"><div id="erpass"></div><br>
    School:      <input type="text" name="schoolInput" autocomplete="off"><div id="erschool"></div>
    <input type="submit" name="loginSubmit" value="login" onclick="if(validateLogin()) this.form.submit()">
</form>
</div>
</div>
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
</body>
</html>