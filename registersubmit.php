<?php
session_start();
ob_start();
include 'includes/db_connection.php';

if(empty($_POST)){
    header("Location: index.php");
}
else if(isset($_FILES['profpic'])){
        $errors= array();
        $file_name = $_FILES['profpic']['name'];
        $file_size =$_FILES['profpic']['size'];
        $file_tmp =$_FILES['profpic']['tmp_name'];
        $file_type=$_FILES['profpic']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['profpic']['name'])));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        
        if(empty($errors)==true){
           //move_uploaded_file($file_tmp,"images/profilepics".$file_name);
           completeReg($file_tmp, $file_ext);
        }else{
           echo($errors);
        }
    }
function completeReg($file_tmp, $file_ext){
    try {
        $dbconn = OpenCon();
        $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $fname = $_POST['fnameInput'];
        $sname = $_POST['snameInput'];
        $sex = $_POST['sexInput'];
        $dob = $_POST['dobInput'];
        $form = $_POST['formInput'];
        $year = intval($_POST['yearInput']);
        $schoolID = $_SESSION['loggedIn']['school'];
        $sqlstmnt2 = 'INSERT INTO students (`firstName`, `surname`, `dob`, `gender`, `year`,`formCode`, `schoolID`) VALUES (:firstName, :surname, :dob, :gender, :year, :form, :schoolID)';
        $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
        $stmtUsr2 -> bindValue(':firstName', $fname);
        $stmtUsr2 -> bindValue(':surname', $sname);
        $stmtUsr2 -> bindValue(':dob', $dob);
        $stmtUsr2 -> bindValue(':gender', $sex);
        $stmtUsr2 -> bindValue(':schoolID', $schoolID);
        $stmtUsr2 -> bindValue(':form', $form);
        $stmtUsr2 -> bindValue(':year', $year);
        $stmtUsr2 -> execute();
        // fetch pupil's ID for use in further queries
        $sqlfetch = 'SELECT * FROM students WHERE studentID = (SELECT MAX(studentID) from students)';
        $sqlfetchexec = $dbconn -> prepare($sqlfetch);
        $sqlfetchexec -> execute();
        $row = $sqlfetchexec->fetch();
        $_SESSION['loggedStudent'] = $row;
        //put profile pic in directory with studentID as file name
        move_uploaded_file($file_tmp,"images/".$_SESSION['loggedStudent']['studentID'].".".$file_ext);
        // redirect to pupil's profile
        header("Location: pupilprofile.php?id=".$_SESSION['loggedStudent']["studentID"]);
        die();
        } 
    catch (PDOException $e) {
        echo "DataBase Error: The user could not be added.<br>".$e->getMessage();
    } 
    catch (Exception $e) {
        echo "General Error: The user could not be added.<br>".$e->getMessage();
    }
}   
?>