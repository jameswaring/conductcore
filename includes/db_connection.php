<?php
    function OpenCon(){
        //pass the database details to variables
        $host = "localhost";
        $dbuser = "id14279363_admin";
        $dbpass = "Noentry123!!!";
        $dbname = "id14279363_conductore";
        // combine host and db name in to single variable
        $dbhost = "mysql:host=$host;dbname=$dbname";
        //create PDO from database information
        $dbconn = new PDO($dbhost, $dbuser, $dbpass);
        return $dbconn;
}
?>