<?php
    function OpenCon(){
        //pass the database details to variables
        $host = "db4free.net";
        $dbuser = "jamesadmin";
        $dbpass = "Noentry12!";
        $dbname = "conductcore";
        // combine host and db name in to single variable
        $dbhost = "mysql:host=$host;dbname=$dbname";
        //create PDO from database information
        $dbconn = new PDO($dbhost, $dbuser, $dbpass);
        return $dbconn;
}
?>