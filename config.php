<?php
require_once "jdf.php";
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
session_start();
function connect()
{

    $mysqli = new mysqli("localhost", "mobin", "00981920", "shop");

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();

    }

    return $mysqli;
}


function delet($connection)
{

    $query = "DELETE FROM shoutbox";
    $connection->query($query) or die(mysqli_errno($connection));

    return true;
}

function insertUser($connection, $user, $password,$name,$family,$number)
{

    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "INSERT INTO users(username, password,name,family,number) VALUES('$user', '$password','$name','$family','$number')";

    $connection->query($query) or die(mysqli_errno($connection));;

    return true;
}




function update($connection, $name,$family,$number,$email,$password,$id)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    if(empty($password))
    {
        $query = "UPDATE users SET username='$email',name='$name',family='$family',number='$number' WHERE id='$id' ";

        $connection->query($query) or die(mysqli_errno($connection));;

        return true;
    }
    else
    {
        $query = "UPDATE users SET username='$email',name='$name',family='$family',number='$number',password='$password' WHERE id='$id' ";

        $connection->query($query) or die(mysqli_errno($connection));;

        return true;
    }
    return false;

}

function validation($connection, $user, $password)
{
    $query = "SELECT id FROM users WHERE username='$user' and password='$password'";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();
    echo $query;
    return $row;
}
function selectName($connection, $id)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "SELECT name FROM users WHERE id='$id'" ;

    $result = $connection->query($query);
    return $result;
}
function selectInformation($connection, $id)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "SELECT * FROM users WHERE id='$id'" ;

    $result = $connection->query($query);
    return $result;
}

//???? ???????? ???????? ??????????
function emptyUser($connection, $user)
{

    $query = "SELECT * FROM users WHERE username='$user'";

    $result = $connection->query($query);
    $row=$result->fetch_assoc();
    if(empty($row))
        return true;
    else
        return false;
}


//?????????????? ?????? ???? ???????? home.php
function selectGroup($connection,$id)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT groups.name,groups.describtion FROM groups INNER JOIN title ON groups.idTitle_fk=title.id WHERE title.id=1 AND groups.id='$id'" ;
    $result = $connection->query($query);
    return $result;
}

//?????????????? ?????? ???? ???????? showCourses
function selectCoursesGroup($connection,$id)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT course.name as nameCourse,professor.name as nameProfessor, course.time,course.state,course.id FROM groups INNER JOIN course ON groups.id=course.idGroup_fk INNER JOIN professor ON course.idProfessor_fk=professor.id WHERE groups.id='$id'" ;
    $result = $connection->query($query);
    return $result;
}

//?????????????? ?????? ???? ???????? showTitleCourses
function selectCoursesTitle($connection,$id)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT course.name as nameCourse,professor.name as nameProfessor, course.time,course.state FROM groups INNER JOIN course ON groups.id=course.idGroup_fk INNER JOIN professor ON course.idProfessor_fk=professor.id INNER JOIN title ON title.id=groups.idTitle_fk WHERE title.id='$id'" ;
    $result = $connection->query($query);
    return $result;
}

//?????????? ?????? ???????????? ??????????
function selectAcces($connection,$id)
{
    $query = "SELECT access FROM users WHERE id='$id'" ;
    $result = $connection->query($query);
    $row=$result->fetch_assoc();
    if($row['access']==1)
        return "admin";
    return "user";
}

//???????? ???????? ??????
function deleteCourse($connection,$id)
{
    $query = "DELETE FROM course WHERE id='$id'" ;
    $result = $connection->query($query);
    return $result;
}

//???????????? ??????????????
function updateCourse($connection,$name,$price,$time,$size,$idProfessor_fk,$description,$degreeOfEducation,$state,$idMajor_fk,$titles,$idGroup_fk,$idGrayesh_fk,$id)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
        $query = "UPDATE course SET course.name='$name',course.price='$price',course.time='$time',course.size='$size',course.idProfessor_fk='$idProfessor_fk',course.description='$description',course.degreeOfEducation='$degreeOfEducation',course.state='$state',course.idMajor_fk='$idMajor_fk',course.titles='$titles',course.idGroup_fk='$idGroup_fk',course.idGrayesh_fk='$idGrayesh_fk' WHERE id='$id' ";
    $connection->query($query) or die(mysqli_errno($connection));;
}

//?????????? ?????????????? ???????? ???????? ???????????? ?????? ????
function selectCourse($connection,$id)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "SELECT * FROM course WHERE id='$id'" ;
    $result = $connection->query($query);
    return $result;
}

//???????? ?????????? ?????? ?? ?????? ???????? ???????????? ???????? ???????? ???????????? ?????? ????
function selectProfessor($connection)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "SELECT id, name FROM professor" ;
    $result = $connection->query($query);
    return $result;
}

//???????? ?????????? ?????? ?? ?????? ???????? ???????? ???? ???????? ???????? ???????????? ?????? ????
function selectMajor($connection)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "SELECT id, name FROM major" ;
    $result = $connection->query($query);
    return $result;
}

//???????? ?????????? ?????? ?? ?????? ???????? ???????? ???? ???????? ???????? ???????????? ?????? ????
function selectGroups($connection)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "SELECT id, name FROM groups" ;
    $result = $connection->query($query);
    return $result;
}

//???????? ?????????? ?????? ?? ?????? ???????? ?????????? ???? ???????? ???????? ???????????? ?????? ????
function selectGrayesh($connection)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "SELECT id, name FROM grayesh" ;
    $result = $connection->query($query);
    return $result;
}
//???????? ???????? ?????? ???????? ???????? ???????? ???????? ??????????
function addCourse($connection,$name,$price,$time,$size,$idProfessor_fk,$description,$degreeOfEducation,$state,$idMajor_fk,$titles,$idGroup_fk,$idGrayesh_fk)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "INSERT INTO course (course.name,course.price,course.time,course.size,course.idProfessor_fk,course.description,course.degreeOfEducation,course.state,course.idMajor_fk,course.titles,course.idGroup_fk,course.idGrayesh_fk) VALUES ('$name','$price','$time','$size','$idProfessor_fk','$description','$degreeOfEducation','$state','$idMajor_fk','$titles','$idGroup_fk','$idGrayesh_fk')";
    $connection->query($query) or die(mysqli_errno($connection));
}
//???????? ?????????? ???? ???? ?????????? ?????? ???????? ?????? ???????? ?????????? ??????????
function selectLastCourse($connection)
{

    $query = "SELECT course.id FROM course ORDER BY course.id DESC LIMIT 1";
    $result = $connection->query($query);
    $res=$result->fetch_assoc();
    return $res['id'];
}
//???????? ???????? ?????????? ?????? ?? ????
function searchCourses($connection,$value)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT course.name as nameCourse,professor.name as nameProfessor, course.time,course.state,course.id FROM groups INNER JOIN course ON groups.id=course.idGroup_fk INNER JOIN professor ON course.idProfessor_fk=professor.id WHERE course.name LIKE " ;
    $s="'%".$value."%'";
    $query=$query.$s;
    $result = $connection->query($query);
    return $result;
}
// ?????????????? ?????? ?? ????????
function searchInsert($connection,$idPerson_fk,$id,$date,$ip)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "INSERT INTO searchs (searchs.idPerson_fk,searchs.text,searchs.date,searchs.ip) VALUES ('$idPerson_fk','$id','$date','$ip')";
    $connection->query($query) or die(mysqli_errno($connection));;
}
// ?????????????? ????????
function logInsert($connection,$idPerson_fk,$date,$ip)
{
    $query = "INSERT INTO loghistory (loghistory.date,loghistory.idPerson_fk,loghistory.ip) VALUES ('$date','$idPerson_fk','$ip')";
    $connection->query($query) or die(mysqli_errno($connection));
}
//?????????? ???????? ?????????? ??????
function saveImage($_FILESs,$id)
{

    $target_dir = "picCourses/";
    $target_file = $target_dir .$id.'.jpg';

    move_uploaded_file ( $_FILESs["fileToUpload"]["tmp_name"] , $target_file );
}
//?????? ???????? ?????????? ??????
function delimage($id)
{
    $target_dir = "picCourses/";
    $target_file = $target_dir .$id.'.jpg';
    unlink($target_file);
}
//?????????? ???????? ???? ???? ???? ????????????
function savePdf($_FILESs,$id)
{

    $target_dir = "azmon/";
    $target_file = $target_dir .$id.'.pdf';

    move_uploaded_file ( $_FILESs , $target_file );
}
//???????? ???????? ??????????
function insertProfessor($connection,$name,$family,$cv,$evidence,$email,$phone)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "INSERT INTO professor (professor.name,professor.family,professor.cv,professor.evidence,professor.email,professor.phone) VALUES ('$name','$family','$cv','$evidence','$email','$phone')";
    $connection->query($query) or die(mysqli_errno($connection));
}

//?????????? ?????????????? ?????? ?? ?????????? ???????? ???????? ???????????? ?????? ????
function selectCourseDetail($connection,$id)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "SELECT course.state AS courseState,course.name AS courseName,course.price AS coursePrice,course.time AS courseTime,course.size AS courseSize,course.description AS courseDescription,course.degreeOfEducation AS courseDegreeOfEducation,course.titles AS courseTitles,professor.name AS professorName,
professor.family AS professorFamily,professor.cv AS professorCv,professor.evidence AS professorEvidence FROM course INNER JOIN professor ON course.idProfessor_fk=professor.id WHERE course.id='$id'" ;
    $result = $connection->query($query);
    return $result;
}


//?????????????? ?????? ???? ???????? cart
function selectCourseInCart($connection,$id)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT course.name as nameCourse, course.price,course.id FROM course INNER JOIN professor ON course.idProfessor_fk=professor.id WHERE course.id='$id'" ;
    $result = $connection->query($query);
    return $result;
}

//???????? ?????? ????????
function creatIndex($id){

    return $index='p'.$id;
}

//???????? ?????? ????????
function isAddedProduct($idProduct){
    for($i=$_SESSION['productCount'];$i>0;$i--){
        if($idProduct==$_SESSION[creatIndex($i)])
            return true;
    }
}

//?????????????? ???? ???????? ?????? ?????? ???????? ????????????
function exiteToken($connection,$token){
    $query = "SELECT COUNT(*) AS count FROM buy WHERE token='$token'" ;
    $result = $connection->query($query);
    $row=$result->fetch_assoc();
    if($row['count']!=0)
        return true;
    return false;
}

//?????? ??????????
function insertBuy($connection,$date,$token,$idPerson_fk,$idCourse_fk){

    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "INSERT INTO buy (buy.date,buy.token,buy.state,buy.idPerson_fk,buy.idCourse_fk) VALUES ('$date','$token',1,'$idPerson_fk','$idCourse_fk')" ;
    $connection->query($query) or die(mysqli_errno($connection));
}



//???????? ?????????? ?????????????? ?????????? ?????? ???????? ?????????? ????????
function selectBuys($connection,$id)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT course.id,course.name FROM users INNER JOIN buy ON buy.idPerson_fk=users.id INNER JOIN course ON course.id=buy.idCourse_fk WHERE users.id='$id'" ;
    $result = $connection->query($query);
    return $result;
}

//???????? ?????? ???????????? ????????
function increaseViwePage($connection,$date,$clock,$ip,$idPerson){
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "INSERT INTO viwe (viwe.date,viwe.clock,viwe.ip,viwe.idPerson_fk) VALUES ('$date','$clock','$ip','$idPerson')" ;
    $connection->query($query) or die(mysqli_errno($connection));
}

//???????? ???????? ?????????? ?????????? ???????????? ?????? ???????? ?????? ?????? ???? ??????
function isIpInsert($connection,$date,$ip,$idPerson){
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "SELECT COUNT(*) AS count FROM viwe WHERE viwe.ip='$ip' AND viwe.date='$date' AND viwe.idPerson_fk='$idPerson'" ;
    $result = $connection->query($query);
    $row=$result->fetch_assoc();
    if($row['count']==0)
        return false;
    return true;
}
//???????? ???????? ?????????? ???????????? ??????????
function viweThisDay($connection,$dateToDay){
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "SELECT COUNT(*) AS count FROM viwe WHERE date ='$dateToDay'" ;
    $result = $connection->query($query);
    $row=$result->fetch_assoc();
    return $row['count'];
}

//???????? ???????? ???????????? ????
function viweAll($connection){
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "SELECT COUNT(*) AS count FROM viwe " ;
    $result = $connection->query($query);
    $row=$result->fetch_assoc();
    return $row['count'];
}

//???????? ???????? ?????? ?????????? ?????? ???????? ?????????????? ???? ???????? download. ?????? ?????? ???????? ?????????????? ???? ?????? ?????? ???????? ??????
function buyThisCourse($connection,$idPerson_fk,$idCourse)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT COUNT(*) as count FROM buy WHERE idPerson_fk='$idPerson_fk' AND idCourse_fk='$idCourse'" ;
    $result = $connection->query($query);
    $row=$result->fetch_assoc();
    if($row['count']==0)
        return false;
    return true;
}


//???????? ???????? ?????????? ???????????????? ???????? ???????? ?????????????? ?????? ???? ?????????? ?????????????????? ???? showDetailCourse
function countStudentBuyThisCourse($connection,$idCourse_fk)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT COUNT(*) AS count FROM buy WHERE buy.idCourse_fk='$idCourse_fk'" ;
    $result = $connection->query($query);
    $row=$result->fetch_assoc();
    return $row['count'];
}

//???????? ?????????? ???? ???? ?????????? ?????????? ???????? ?????? ???????? ?????????? ??????????
function selectLastProfessor($connection)
{

        $query = "SELECT professor.id FROM professor ORDER BY professor.id DESC LIMIT 1";
    $result = $connection->query($query);
    $res=$result->fetch_assoc();
    return $res['id'];
}


//???????? ?????????? ?????????? ?????? ?????????? ?????? ???????? ?????????? ????????
function selectExams($connection,$id)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT exam.id,exam.name,exam.startDate,exam.endDate,buyexam.state,buyexam.score FROM users INNER JOIN buyexam ON buyexam.idPerson_fk=users.id INNER JOIN exam ON exam.id=buyexam.idExam_fk WHERE users.id='$id'" ;
    $result = $connection->query($query);
    return $result;
}
//???????? ?????????? ?????????????? ?????????? ???????? ???????? ??????????
function selectInfoQuestionExam($connection,$id,$idPerson)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT exam.timeSpecialtyLesson,exam.timeGeneralLesson FROM `exam` WHERE id='$id'" ;
    $result = $connection->query($query);
    $res1=$result->fetch_assoc();
    //?????????? ???????????? ???????? ??????????
    $query = "SELECT COUNT(*) as countGeneralLesson FROM question INNER JOIN courseexam ON idCourse_fk=courseexam.id WHERE courseexam.type='0' AND idExam_fk='$id'" ;
    $result = $connection->query($query);
    $res2=$result->fetch_assoc();
    //?????????? ???????????? ???????? ??????????
    $query = "SELECT COUNT(*) as countSpecialtyLesson FROM question INNER JOIN courseexam ON idCourse_fk=courseexam.id WHERE courseexam.type='1' AND idExam_fk='$id'" ;
    $result = $connection->query($query);
    $res3=$result->fetch_assoc();
    //???????? ???????? ?????? ????????????
    $query = "SELECT startExamTime FROM `buyexam` WHERE idExam_fk='$id' and idPerson_fk='$idPerson'" ;
    $result = $connection->query($query);
    $res4=$result->fetch_assoc();

    $res=$res1+$res2+$res3+$res4;
    return $res;
}

//?????????? ?????????? ??????????
function updateExamState($connection,$idExam,$idPerson,$state)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "UPDATE buyexam SET state='$state' WHERE idExam_fk='$idExam' AND idPerson_fk='$idPerson' ";
    $connection->query($query) or die(mysqli_errno($connection));;
}


//???????? ?????????? ?????????? ?????????? (???????? ???? ??????????)
function selectExamState($connection,$idExam,$idPerson)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT buyexam.state FROM `buyexam` WHERE idExam_fk='$idExam' AND idPerson_fk='$idPerson'" ;
    $result = $connection->query($query);
    $row=$result->fetch_assoc();
    return $row['state'];
}


//???????? ?????????? ???????? ?????? ?????????? ???????? ???????????? ????????
function selectTrueAnswerExam($connection,$idExam)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT numberQuestion,correctAnswer FROM `question` WHERE idExam_fk='$idExam'" ;
    $result = $connection->query($query);
    return $result;
}

//???????? ?????? ???????? ?????? ???????? ???????? ??????????
function selectedAnswerExam($connection,$idExam,$idPerson)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT selectedOption FROM answerquestion WHERE idExam_fk='$idExam' and idPerson_fk='$idPerson'" ;
    $result = $connection->query($query);
    return $result;
}

//???????? ???????? ???????? ????????????
function updateExamScore($connection,$idExam,$idPerson,$score)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "UPDATE buyexam SET state=2,score='$score' WHERE idExam_fk='$idExam' AND idPerson_fk='$idPerson' ";
    $connection->query($query) or die(mysqli_errno($connection));;
}

//???????? ?????????? ???????? ???????? ???????? ??????????
function updateStartExamTime($connection,$idExam,$idPerson,$time)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "UPDATE buyexam SET startExamTime='$time', state=1 WHERE idExam_fk='$idExam' AND idPerson_fk='$idPerson' ";
    $connection->query($query) or die(mysqli_errno($connection));;
}



function insertExamAnswer($connection,$idExam,$idPerson,$answer)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "INSERT INTO answerquestion(selectedOption,idExam_fk,idPerson_fk) VALUES ('$answer','$idExam','$idPerson')";
    $connection->query($query) or die(mysqli_errno($connection));
}
function updateExamAnswer($connection,$idExam,$idPerson,$answer)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "UPDATE answerquestion SET selectedOption='$answer' WHERE idExam_fk='$idExam' AND idPerson_fk='$idPerson' AND selectedOption LIKE ";
    $answer=substr($answer,0,strpos($answer,"."));
    $value="'".$answer."%'";
    $query=$query.$value;
    echo $query;
    $connection->query($query) or die(mysqli_errno($connection));;
}

//???????????? ?????? ???? ???????? ???? ?????????????? ?????? ?????? ?????? ???? ????
function existingThisAnswer($connection,$idExam,$idPerson,$answer)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT COUNT(*) as exist FROM `answerquestion` WHERE idExam_fk='$idExam' and idPerson_fk='$idPerson' AND selectedOption LIKE " ;
    $value="'".$answer."%'";
    $query=$query.$value;
    $result = $connection->query($query);
    $row=$result->fetch_assoc();
    return $row['exist'];
}

//???????? ?????? ???????? ????????
function deleteAnswer($connection,$idExam,$idPerson,$answer){
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "DELETE FROM answerquestion WHERE idExam_fk='$idExam' and idPerson_fk='$idPerson' and selectedOption='$answer'";
    $connection->query($query) or die(mysqli_errno($connection));
}


//?????????? ???????? ????????????
function insertExam($connection, $startDate, $endDate,$timeSpecialtyLesson,$timeGeneralLesson,$name,$idMajor)
{

    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "INSERT INTO exam(startDate, endDate,timeSpecialtyLesson,timeGeneralLesson,name,idMajor_fk) VALUES('$startDate', '$endDate','$timeSpecialtyLesson','$timeGeneralLesson','$name','$idMajor')";

    $connection->query($query) or die(mysqli_errno($connection));;

    return true;
}

//?????????? ???????? ???????????? ???????? ?????????? ?????????? ?????? ????????
function insertQuestion($connection, $numberQuestion, $correctAnswer,$idExam_fk,$idCourse_fk)
{

    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "INSERT INTO question(numberQuestion, correctAnswer,idExam_fk,idCourse_fk) VALUES('$numberQuestion', '$correctAnswer','$idExam_fk','$idCourse_fk')";

    $connection->query($query) or die(mysqli_errno($connection));;

    return true;
}

//???????? ???????? ?????????? ?????????? ???????? ??????
function selectLastIdExam($connection)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT MAX(id) AS lastId FROM `exam` ORDER BY `id`  DESC" ;
    $result = $connection->query($query);
    $row=$result->fetch_assoc();
    return $row['lastId'];
}


//???????????? ???????? ???? ???????????? ????
function selectAllExam($connection)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT id,name FROM exam" ;
    $result = $connection->query($query);
    return $result;
}

//?????? ???????? ??????????
function deleteExam($connection,$idExam){
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "DELETE FROM exam WHERE id='$idExam'";
    $connection->query($query) or die(mysqli_errno($connection));
}

//???????????? ???????? ????????????
function selectAllUsers($connection)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT id,username,name,family FROM users" ;
    $result = $connection->query($query);
    return $result;
}

//???????? ???????? ???????????? ???? ????????????
function insertBuyExam($connection,$idExam_fk,$idPerson_fk)
{

    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "INSERT INTO buyexam(idExam_fk,idPerson_fk) VALUES ('$idExam_fk','$idPerson_fk')";

    $connection->query($query) or die(mysqli_errno($connection));;

    return true;
}
//?????? ???????? ???????????? ???? ????????????
function deleteBuyExam($connection,$idExam_fk,$idPerson_fk)
{

    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "DELETE FROM buyexam WHERE idExam_fk='$idExam_fk' and idPerson_fk='$idPerson_fk'";

    $connection->query($query) or die(mysqli_errno($connection));;

    return true;
}
//?????? ?? ?????? ?????? ???? ?????? ?????? ???????? ???????? ???????? ?????? ???????????? ???????????? ?????? ?????? ???? ??????
function existingUserInExam($connection,$idExam,$idPerson)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT COUNT(*) as exist FROM buyexam WHERE idExam_fk='$idExam' and idPerson_fk='$idPerson'" ;
    $result = $connection->query($query);
    $row=$result->fetch_assoc();
    return $row['exist'];
}

//???????? ?????????? ??????
function selectTemp($connection)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);

    $query = "SELECT tempSet,tempHome FROM temp" ;
    $result = $connection->query($query);
    return $result;
}
//?????????? ???????? ???????? ?????????? ??????
function updateTempSet($connection,$temp)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "UPDATE temp SET tempSet='$temp' WHERE id=0 ";
    $connection->query($query) or die(mysqli_errno($connection));;
}
//?????????? ???????? ???????? ????????
function updateTempHome($connection,$temp)
{
    $query = "SET NAMES utf8" ;

    $result = $connection->query($query);
    $query = "UPDATE temp SET tempHome='$temp' WHERE id=0 ";
    $connection->query($query) or die(mysqli_errno($connection));;
}