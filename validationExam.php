<?php
require_once "config.php";
require_once "function.php";

$con=connect();
$countTrue=0;
$countFalse=0;

if(isset($_POST["idExam"]))
{
    $trueAnswer=selectTrueAnswerExam($con,$_POST["idExam"]);
    $selecedAnswer=selectedAnswerExam($con,$_POST["idExam"],$_SESSION['id']);
    $info=selectInfoQuestionExam($con,$_POST["idExam"],$_SESSION['id']);
    $allTest=$info["countSpecialtyLesson"]+$info["countGeneralLesson"];
    for ($i=1;$i<=$allTest;$i++) {
        $row=$trueAnswer->fetch_assoc();
        $true[$row["numberQuestion"]] = $row["correctAnswer"];


        $row2=$selecedAnswer->fetch_assoc();
        $index=substr($row2['selectedOption'],0,strpos($row2['selectedOption'],"."));
        $value=substr($row2['selectedOption'],strpos($row2['selectedOption'],".")+1);
        $seleced[$index]=$value;
    }
    for ($i=1;$i<=$allTest;$i++){
       if(isset($seleced[$i]))
       {
           if($seleced[$i]==$true[$i])
               $countTrue++;
           else
               $countFalse++;
       }
    }
    $percentage=(((3*$countTrue)-$countFalse)/($allTest*3))*100;
    updateExamScore($con,$_POST["idExam"],$_SESSION['id'],$percentage);
    echo "<script type='text/javascript'>window.location.href='showExams.php'</script>";


}
echo "<script type='text/javascript'>window.location.href='showExams.php'</script>";

