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
<h1>Groups</h1>
<p class="welcome-message">On this page you will see an overview of pupils in the core. You will
 only see pupils who you have been identified as having personal responsibility for.
 To find other pupils to add a behaviour record or intervention to, click 'find
  pupils' in the menu. The following pupils are currently in the Core.
</p>

<?php
    // logic to separate groups. Non-form teachers will see no groups. Form teachers will see their form. 
    // Year heads will see the whole year and headteachers will see every pupil in the core.
?>

<p class="loggedin">You are logged in as <?php echo($_SESSION['loggedIn']['firstName']);?></p>
</div>
</body>
</html>