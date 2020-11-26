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
    // test timer
    $time = microtime(TRUE);
    //connect to DB
    include_once 'includes/db_connection.php';
    $dbconn = OpenCon();
    $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    // redirect if less than 10 interventions
    $sqlchk = 'SELECT * FROM `interventions`';
    $stmtchk = $dbconn -> prepare($sqlchk);
    $stmtchk -> execute();
    $totalints = $stmtchk->fetchAll();
    if(count($totalints)<10){
        //redirect to a not enough interventions page
        return(0);
    }
    // fetch array of all student studentIDs (only students who have interventions to aid efficiency)
    $sqlstmnt2 = 'SELECT DISTINCT `studentID` FROM `interventions`';
    $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
    $stmtUsr2 -> execute();
    $students = $stmtUsr2->fetchAll();
    $behStack = array();
    $intervStack = array();
    // if less than 10 whole school interventions then redirect to message

    // select all interventions for student
    foreach($students as $student){
        $sqlstmnt2 = 'SELECT * FROM `interventions` WHERE `studentID` = :studentID ORDER BY `date`';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2-> bindValue(':studentID', $student['studentID']);
        $stmtUsr2 -> execute();
        $intervRows = $stmtUsr2->fetchAll();
        // only include students with more than 1 intervention
        if(count($intervRows)>1){
            for ($i = 1; $i < count($intervRows); $i++) {
                array_push($intervStack, $intervRows[$i]['type']);
                $curdate = $intervRows[$i]['date'];
                $prevdate = $intervRows[$i-1]['date'];
                include_once 'includes/db_connection.php';
                $sqlstmnt2 = 'SELECT COUNT(*) as `num` from `incidents` where (`date` BETWEEN :fromdate AND :todate) and `studentID` = :studentID';
                $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
                $stmtUsr2-> bindValue(':fromdate', $prevdate);
                $stmtUsr2-> bindValue(':todate', $curdate);
                $stmtUsr2-> bindValue(':studentID', $student['studentID']);
                $stmtUsr2 -> execute();
                $behRows = $stmtUsr2->fetchColumn();
                array_push($behStack, $behRows);
                unset($behRows);
            }
        }
    }
    // now get rid of repeating types and find averages for them
    $finalIntervNames = array();
    $finalTotals = array();
    for ($i = 0; $i < count($intervStack); $i++) {
        if(in_array($intervStack[$i], $finalIntervNames)){
            $k = array_search($intervStack[$i], $finalIntervNames);
            $prevTotal = $finalTotals[$k];
            $averageTotal = ceil(($prevTotal+$behStack[$i])/2);
            unset($behStack[$i]);
            $finalTotals[$k] = $averageTotal;
            $intervStack[$i] = "blanked";
        }
        else{
            array_push($finalIntervNames, $intervStack[$i]);
            array_push($finalTotals, $behStack[$i]);
        }
    }
    // total outputter for testing purposes
    //echo('final totals<br>');
    //for ($i = 0; $i < count($finalIntervNames); $i++) {
     //   echo($finalIntervNames[$i]."   ");
      //  echo($finalTotals[$i]);
       // echo("<br>");
    $maxs = array_keys($finalTotals, max($finalTotals));
    $result = array();
    foreach($maxs as $max){
        array_push($result, $finalIntervNames[$max]);
    }
    echo ((microtime(TRUE)-$time). ' seconds');
    return $result;

}

function getTriedInts(){
    
}
?>