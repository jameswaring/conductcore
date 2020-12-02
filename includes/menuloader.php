<?php
// Loads the correct menu for the user. Written by James Waring
    function loadMenu(){
        if($_SESSION['loggedIn']['job'] == 1){
        include 'includes/headmenu.php';
        }
        else if($_SESSION['loggedIn']['job'] == 2){
            include 'includes/hoymenu.php';
        }
        else if($_SESSION['loggedIn']['job'] == 3){
            include 'includes/formtmenu.php';
        }
        else if($_SESSION['loggedIn']['job'] == 4){
            include 'includes/teachermenu.php';
        }
        else{
            include 'includes/teachermenu.php';
        }
    }
?>