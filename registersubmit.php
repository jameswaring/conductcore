<?php
session_start();
ob_start();
include 'includes/db_connection.php';

if(empty($_POST)){
    //header("Location: index.php");
}
else if(isset($_FILES['profpic'])){
        $_SESSION['profpic'] = $_FILES['profpic'];
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
           $errors[]='File size must be less than 2 MB';
        }
        
        if(empty($errors)==true){
           //move_uploaded_file($file_tmp,"images/profilepics".$file_name);
            unset($_SESSION['foundpupils']);
            $dbconn = OpenCon();
            $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $_SESSION['fnamet'] = $fname = $_POST['fnameInput'];
            $_SESSION['snamet'] = $sname = $_POST['snameInput'];
            $_SESSION['sext'] = $sex = $_POST['sexInput'];
            $_SESSION['dobt'] = $dob = $_POST['dobInput'];
            $_SESSION['formt'] = $form = $_POST['formInput'];
            $_SESSION['yeart'] = $year = intval($_POST['yearInput']);
            $_SESSION['schoolt'] = $schoolID = $_SESSION['loggedIn']['school'];
            // check if pupil already exists but isn't active
            $sqlstmnt2 = 'SELECT * FROM `students` WHERE `firstName` = :firstName AND `surname` = :surname AND schoolID = :schoolID';
            $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
            $stmtUsr2 -> bindValue(':firstName', $fname);
            $stmtUsr2 -> bindValue(':surname', $sname);
            $stmtUsr2 -> bindValue(':schoolID', $schoolID);
            unset($_SESSION['foundpupils']);
            $stmtUsr2 -> execute();
            $result = $stmtUsr2 -> fetchAll();
            $_SESSION['foundpupils'] = $result;
            if(mysqli_num_rows($result)==0){
                addPupil();
            }
            else{
                header("Location: reactivatesearch.php");
            }
        }else{
           echo("There was a problem with the image you submitted");
        }
    }

function addPupil(){
     // now add pupil
     $dbconn = OpenCon();
     $dbconn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sqlstmnt2 = 'INSERT INTO students (`firstName`, `surname`, `dob`, `gender`, `year`,`formCode`, `schoolID`) VALUES (:firstName, :surname, :dob, :gender, :year, :form, :schoolID)';
     $stmtUsr2 = $dbconn -> prepare($sqlstmnt2);
     $stmtUsr2 -> bindValue(':firstName', $_SESSION['fnamet']);
     $stmtUsr2 -> bindValue(':surname', $_SESSION['snamet']);
     $stmtUsr2 -> bindValue(':dob', $_SESSION['dobt']);
     $stmtUsr2 -> bindValue(':gender', $_SESSION['sext']);
     $stmtUsr2 -> bindValue(':schoolID', $_SESSION['schoolt']);
     $stmtUsr2 -> bindValue(':form', $_SESSION['formt']);
     $stmtUsr2 -> bindValue(':year', $_SESSION['yeart']);
     $stmtUsr2 -> execute();
     // fetch pupil's ID for use in further queries
     $sqlfetch = 'SELECT * FROM students WHERE studentID = (SELECT MAX(studentID) from students)';
     $sqlfetchexec = $dbconn -> prepare($sqlfetch);
     $sqlfetchexec -> execute();
     $row = $sqlfetchexec->fetch();
     $_SESSION['loggedStudent'] = $row;
     //put profile pic in directory with studentID as file name
     $file_tmp = $_SESSION['profpic']['tmp_name'];
     $file_ext=strtolower(end(explode('.',$_SESSION['profpic']['name'])));
     move_uploaded_file($file_tmp,"images/".$_SESSION['loggedStudent']['studentID'].".".$file_ext);
     // redirect to pupil's profile
     header("Location: pupilprofile.php?id=".$_SESSION['loggedStudent']["studentID"]);
     die();
} 
?>