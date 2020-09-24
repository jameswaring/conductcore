<?php
// Contained here are the scripts that deal with the analysis of pupil behaviour and intervention methods. Include once in dashboards
// and profile pages

function negPoints($id){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT COUNT(*) FROM `incidents` WHERE `studentID` = :studentID';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $intid = intval($id);
    $stmtUsr2 -> bindValue(':studentID', $intid);
    $stmtUsr2 -> execute();
    $rows = $stmtUsr2->fetchColumn();
    //list found pupils
    if(is_null($rows))
            {
                //list found pupils
                return 0;
            }
    return $rows;
        }


function getInterventionNum($id){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT COUNT(*) FROM `interventions` WHERE `studentID` = :studentID';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $intid = intval($id);
    $stmtUsr2 -> bindValue(':studentID', $intid);
    $stmtUsr2 -> execute();
    $rows = $stmtUsr2->fetchColumn();
    //list found pupils
    if(is_null($rows))
            {
                //list found pupils
                return 0;
            }
    return $rows;
}

function mostCommonInc($id){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT `type`, COUNT(`type`) AS `value_occurrence` FROM `incidents` WHERE `studentID` = :studentID GROUP BY `type` ORDER BY `value_occurrence` DESC LIMIT 1';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $intid = intval($id);
    $stmtUsr2 -> bindValue(':studentID', $intid);
    $stmtUsr2 -> execute();
    $rows = $stmtUsr2->fetchColumn();
    //list found pupils
    if(is_null($rows))
            {
                //list found pupils
                return 0;
            }
    return $rows;
}

function mostCommonInt($id){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT `type`, COUNT(`type`) AS `value_occurrence` FROM `interventions` WHERE `studentID` = :studentID GROUP BY `type` ORDER BY `value_occurrence` DESC LIMIT 1';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $intid = intval($id);
    $stmtUsr2 -> bindValue(':studentID', $intid);
    $stmtUsr2 -> execute();
    $rows = $stmtUsr2->fetchColumn();
    //list found pupils
    if(is_null($rows))
            {
                //list found pupils
                return 0;
            }
    return $rows;
}

function orderByType($id){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT `type`, count(*) FROM `incidents` WHERE `studentID` = :studentID GROUP BY `type`';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $intid = intval($id);
    $stmtUsr2 -> bindValue(':studentID', $intid);
    $stmtUsr2 -> execute();
    $rows = $stmtUsr2->fetchAll();
    //list found pupils
    if(is_null($rows))
            {
                //list found pupils
                return 0;
            }
    return $rows;
}
?>