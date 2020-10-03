<?php

function staffResponsibilities($id){
    session_start();
    ob_start();
    include_once 'includes/db_connection.php';
        try {
            // check type of user and return either YEAR GROUP, FORM, ALL or NONE
            $dbconn = OpenCon();
            $sqlstmnt2 = 'SELECT job FROM users WHERE userID= :userID';
            $intid = intval($id);
            $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
            $stmtUsr2 -> bindValue(':userID', $intid);
            $stmtUsr2 -> execute();
            $rows = $stmtUsr2->fetchColumn();
            var_dump($rows);
            //now check their responsibility
            //1 --- head
            //2 --- headofyear
            //3 --- form teacher
            //4 --- non form teacher - return no pupils
            
            if($rows == "1"){
                //return all pupils
                $dbconn = OpenCon();
                $sqlstmnt2 = 'SELECT * FROM students';
                $intid = intval($id);
                $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
                $stmtUsr2 -> bindValue(':userID', $intid);
                $stmtUsr2 -> execute();
                $rows = $stmtUsr2->fetchColumn();
                return $rows;
            }
            else if($rows == "2"){
                //return all year or years
                return $rows;
            }
            else if($rows == "3"){
                //return form
                $dbconn = OpenCon();
                $sqlstmnt2 = 'SELECT group FROM responsibilities WHERE userID= :userID';
                $intid = intval($id);
                $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
                $stmtUsr2 -> bindValue(':userID', $intid);
                $stmtUsr2 -> execute();
                $rows = $stmtUsr2->fetchColumn();
                
            }
            else{
                // return no pupils
                return 
            }

        catch (PDOException $e) {
            echo "DataBase Error: The user could not be found.<br>".$e->getMessage();
        } 
        catch (Exception $e) {
            echo "General Error: The user could not be found.<br>".$e->getMessage();
        }
}

?>