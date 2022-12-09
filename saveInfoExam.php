<?php
require_once "config.php";

$con=connect();

if($_GET['command']=='start')
{
    date_default_timezone_set("Iran");
    updateStartExamTime($con,$_GET['idExam'],$_SESSION['id'],time());
}

if($_GET['command']=='endExam')
{
    updateExamState($con,$_GET['idExam'],$_SESSION['id'],2);
}

if($_POST['command']=='svaeAnswer')
{

    echo " وارد شده ";
    echo "iiiiiiiiiiiiiiiiiiiiiiiiii".existingThisAnswer($con,$_POST["idExam"],$_SESSION['id'],substr($_POST['answer'],0,strpos($_POST['answer'],".")+1))."iiiiiiiiiiiiiiiiiiiiiiiiii";
    if(existingThisAnswer($con,$_POST["idExam"],$_SESSION['id'],substr($_POST['answer'],0,strpos($_POST['answer'],".")+1))==0) {
        echo " noooooooooooooooooooo ";
        insertExamAnswer($con,$_POST['idExam'],$_SESSION['id'],$_POST['answer']);
    }else{
        echo " yessssssssssssssssssssssssssssssssssssssssss ";
        updateExamAnswer($con,$_POST['idExam'],$_SESSION['id'],$_POST['answer']);
    }
}

if($_POST['command']=='deleteAnswer'){
    if(existingThisAnswer($con,$_POST["idExam"],$_SESSION['id'],substr($_POST['answer'],0,strpos($_POST['answer'],".")+1))!=0){
        deleteAnswer($con,$_POST["idExam"],$_SESSION['id'],$_POST['answer']);
    }
}