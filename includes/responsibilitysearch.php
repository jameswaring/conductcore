<?php

function staffResponsibilities($id){
    session_start();
    ob_start();
    include 'includes/db_connection.php';
        try {
            $dbconn = OpenCon();
            $sqlstmnt2 = 'SELECT studentID FROM responsibilities WHERE staffID= :staffID';
            $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
            $intid = intval($id);
            $stmtUsr2 -> bindValue(':staffID', $intid);
            $stmtUsr2 -> execute();
            $rows = $stmtUsr2->fetchAll(PDO::FETCH_ASSOC);
            if(sizeof($rows) > 0)
            {
                //list found pupils
                return $rows;
            }
            else{
                // not responible for any
                return "none";
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