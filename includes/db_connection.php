<?php
// connects to the database. Written by James Waring
    function OpenCon(){
        //pass the database details to variables
        $host = "eu-cdbr-west-03.cleardb.net";
        $dbuser = "b9dcd08c3b5fb6";
        $dbpass = "114ae453";
        $dbname = "heroku_353f881dea3f669";
        // old db4free creds
        //$host = "db4free.net";
        //$dbuser = "jamesadmin";
        //$dbpass = "Noentry12!";
        //$dbname = "conductcore";
        // combine host and db name in to single variable
        $dbhost = "mysql:host=$host;dbname=$dbname";
        //create PDO from database information
        $dbconn = new PDO($dbhost, $dbuser, $dbpass);
        return $dbconn;
}
?>