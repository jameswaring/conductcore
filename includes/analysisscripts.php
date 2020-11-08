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

function negPointsWhole(){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT COUNT(*) FROM `incidents`';
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

function mostLoggedPupil(){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT `studentID`, COUNT(`studentID`) AS `common` FROM `incidents` GROUP BY `studentID` ORDER BY `common` DESC LIMIT 1;';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2 -> execute();
    $rows = $stmtUsr2->fetchColumn();
    $common = $rows;
    $common = intval($common);
    $sqlfind = 'SELECT * FROM `students` WHERE `studentID` = :mostcommon';
    $stmtfind = $dbconn -> prepare($sqlfind);
    $stmtfind -> bindValue(':mostcommon', $common);
    $stmtfind -> execute();
    $mstcmn = $stmtfind->fetchAll();
    return $mstcmn;
}

function behavioursToday($id){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'select count(*) as beh from incidents where date = CURDATE() and studentID = :studentID';
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

function getAllIncidents($id){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT * FROM `incidents` WHERE `studentID` = :studentID';
    $intid = intval($id);
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2-> bindValue(':studentID', $intid);
    $stmtUsr2 -> execute();
    $rows = $stmtUsr2->fetchAll();
    return($rows);
}

function getAllIncidentsWhole(){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT * FROM `incidents`';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2 -> execute();
    $rows = $stmtUsr2->fetchAll();
    return($rows);
}

function getAllInterventions($id){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT * FROM `interventions` WHERE `studentID` = :studentID';
    $intid = intval($id);
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2-> bindValue(':studentID', $intid);
    $stmtUsr2 -> execute();
    $rows = $stmtUsr2->fetchAll();
    return($rows);
}

function getAllInterventionsWhole(){
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT * FROM `interventions`';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2 -> execute();
    $rows = $stmtUsr2->fetchAll();
    return($rows);
}

function mostEffectiveIntWhole(){
    //connect to DB
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sqlstmnt2 = 'SELECT * FROM `interventions`';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2 -> execute();
    $rows = $stmtUsr2->fetchAll();
    // Fetch all intervention data
    for ($i = 1; $i < count($rows); $i++) {
        echo $rows[$i]['type'];
        echo $rows[$i]['date'];
        $curdate = $rows[$i]['date'];
        $prevdate = $rows[$i-1]['date'];
        include_once 'includes/db_connection.php';
        $dbconn = OpenCon();
        $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $sqlstmnt2 = 'SELECT COUNT (*) as `num` from `incidents` where (`date` BETWEEN :fromdate AND :todate)';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2-> bindValue(':fromdate', $intid);
        $stmtUsr2-> bindValue(':todate', $intid);
        $stmtUsr2 -> execute();
        $rows = $stmtUsr2->fetchAll();
    }
    // Store school holidays
    //$ht1 = array("yyyy-10-29", "yyyy-11-06");
    //$xmas = array("yyyy-12-21", "yyyy-01-dd");
    //$ht2 = array("yyyy-mm-dd", "yyyy-mm-dd");
    //$easter = array("yyyy-mm-dd", "yyyy-mm-dd");
    //$summer = array("yyyy-mm-dd", "yyyy-mm-dd");
}

//working sql for current year
// select * from incidents where `date` >= concat(year(current_date), '-09-01')
?>