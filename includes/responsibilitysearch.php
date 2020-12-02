<?php
// finds the role of a specific staff member. Written by James Waring

function staffResponsibilities($id){
    session_start();
    ob_start();
    include_once 'includes/db_connection.php';
            // check type of user and return either YEAR GROUP, FORM, ALL or NONE
            $dbconn = OpenCon();
            $sqlstmnt2 = 'SELECT job FROM users WHERE userID= :userID';
            $intid = intval($id);
            $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
            $stmtUsr2 -> bindValue(':userID', $intid);
            $stmtUsr2 -> execute();
            $rows = $stmtUsr2->fetchColumn();
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
                $rows = $stmtUsr2->fetchAll();
                return $rows;
            }
            else if($rows == "2"){
                //return all year or years
                $dbconn = OpenCon();
                $sqlstmnt2 = 'SELECT chargeof FROM responsibilities WHERE staffID = :userID';
                $intid = intval($id);
                $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
                $stmtUsr2 -> bindValue(':userID', $intid);
                $stmtUsr2 -> execute();
                $charge = $stmtUsr2->fetchColumn();
                $charge = intval($charge);
                // now fetch all students from year group
                $sqlstmntcharge = 'SELECT * FROM students WHERE `year` = :charge';
                $stmtUsr1 = $dbconn -> prepare($sqlstmntcharge);
                $stmtUsr1 -> bindValue(':charge', $charge);
                $stmtUsr1 -> execute();
                $rows = $stmtUsr1 ->fetchAll();
                return $rows;
            }
            else if($rows == "3"){
                //return form
                $dbconn = OpenCon();
                $sqlstmnt2 = 'SELECT chargeof FROM responsibilities WHERE staffID = :userID';
                $intid = intval($id);
                $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
                $stmtUsr2 -> bindValue(':userID', $intid);
                $stmtUsr2 -> execute();
                $charge = $stmtUsr2->fetchColumn();
                // now fetch all students from year group
                $sqlstmntcharge = 'SELECT * FROM students WHERE `formCode` = :charge';
                $stmtUsr1 = $dbconn -> prepare($sqlstmntcharge);
                $stmtUsr1 -> bindValue(':charge', $charge);
                $stmtUsr1 -> execute();
                $rows = $stmtUsr1 ->fetchAll();
                return $rows;
                
            }
            else{
                // return no pupils
                header("Location: noresp.php");
            }
        }

?>