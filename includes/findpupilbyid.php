<?php
// WARNING - only use this function if you are CERTAIN that the pupil id exists and have checked this already. Removes a pupil by ID. Written by James Waring

function findbyID($id){
    session_start();
    ob_start();
    include_once 'includes/db_connection.php';
        try {
            $dbconn = OpenCon();
            $sqlstmnt2 = 'SELECT * FROM students WHERE studentID = :studentID';
            $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
            $intid = intval($id);
            $stmtUsr2 -> bindValue(':studentID', $intid);
            $stmtUsr2 -> execute();
            $rows = $stmtUsr2->fetch();
            if(!is_null($rows))
            {
                //list found pupils
                return $rows;
            }
            else{
                // just in case, although you should never get here
                echo "DataBase Error: The user could not be found.<br>";
                die();
               }
            } 
        catch (PDOException $e) {
            echo "DataBase Error: The user could not be found.<br>".$e->getMessage();
        } 
        catch (Exception $e) {
            echo "General Error: The user could not be found.<br>".$e->getMessage();
        }
}

?>