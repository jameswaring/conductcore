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

function getInterventionNumWhole(){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT COUNT(*) FROM `interventions`';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
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

function mostCommonIncWhole(){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT `type`, COUNT(`type`) AS `value_occurrence` FROM `incidents` GROUP BY `type` ORDER BY `value_occurrence` DESC LIMIT 1';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
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

function mostCommonIntWhole(){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT `type`, COUNT(`type`) AS `value_occurrence` FROM `interventions` GROUP BY `type` ORDER BY `value_occurrence` DESC LIMIT 1';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
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

function orderByTypeWhole(){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT `type`, count(*) FROM `incidents` GROUP BY `type`';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
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

function orderedInterventions($id){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT `type`, count(*) FROM `interventions` WHERE `studentID` = :studentID GROUP BY `type`';
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

function orderedInterventionsWhole(){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT `type`, count(*) FROM `interventions` GROUP BY `type`';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
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

function behaviourByDate($id){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT monthname(`date`), COUNT(*) AS `freq` FROM `incidents` WHERE `studentID` = :studentID GROUP BY monthname(`date`) ORDER BY `date` ASC';
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

function behaviourByDateWhole(){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT monthname(`date`), COUNT(*) AS `freq` FROM `incidents` GROUP BY monthname(`date`) ORDER BY `date` ASC';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
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

function interventionsByDate($id){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT monthname(`date`), COUNT(*) AS `freq` FROM `interventions` WHERE `studentID` = :studentID GROUP BY monthname(`date`) ORDER BY `date` ASC';
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

function interventionsByDateWhole(){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT monthname(`date`), COUNT(*) AS `freq` FROM `interventions` GROUP BY monthname(`date`) ORDER BY `date` ASC';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
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

function pupilsInCore(){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT COUNT(*) FROM students';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2 -> execute();
    $rows = $stmtUsr2->fetchColumn();
    return $rows;
}

?>