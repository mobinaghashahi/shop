<?php
require_once "config.php";
$con=connect();
if(selectAcces($con, $_SESSION["id"])!="admin"||empty($_SESSION["id"]))
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}
//پاک کردن آزمون
if(isset($_GET['command'])) {
    if($_GET['command']=='delete'){
        deleteExam($con,$_GET['idExam']);
    }
    echo "<script type='text/javascript'>window.location.href='showAllExam.php'</script>";
}
//اضاف کردن آزمون
else if(isset($_POST['nameExam'])) {
    insertExam($con, $_POST['startDate'], $_POST['endDate'], $_POST['timeSpecialtyLesson'], $_POST['timeGeneralLesson'], $_POST['nameExam'], $_POST['idMajor_fk']);
    $lastId = selectLastIdExam($con);
    savePdf($_FILES["firstPdf"]["tmp_name"],$lastId."_1");
    savePdf($_FILES["secondPdf"]["tmp_name"],$lastId."_2");
    $i = 1;
    while (isset($_POST[$i])) {
        var_dump($_POST[$i]);
        $number = substr($_POST[$i], 0, strpos($_POST[$i], "."));
        $text = substr($_POST[$i], strpos($_POST[$i], ".") + 1);
        $answer = substr($text, 0, strpos($text, "."));
        $type = substr($text, strpos($text, ".") + 1);
        if ($type == 1) {
            $idMajor = 1;
        } else {
            $idMajor = 6;
        }
        insertQuestion($con, $number, $answer, $lastId, $idMajor);
        $i++;

    }
    echo "<script type='text/javascript'>window.location.href='showAllExam.php'</script>";
}
//اضاف کردن دانشجو به آزمون
else if(isset($_POST['choiceStudent']))
{
    if ($_POST['choiceStudent']=="اضاف کردن") {
        $idExam = $_POST['idExam'];
        unset($_POST['idExam']);
        unset($_POST['choiceStudent']);
        $count = 1;
        foreach ($_POST as $val) {
            if (existingUserInExam($con, $idExam, $val) == 0)
                insertBuyExam($con, $idExam, $val);
        }
    }else if($_POST['choiceStudent']=="حذف کردن"){
        $idExam = $_POST['idExam'];
        unset($_POST['idExam']);
        unset($_POST['choiceStudent']);
        $count = 1;
        foreach ($_POST as $val) {
            if (existingUserInExam($con, $idExam, $val) != 0)
                deleteBuyExam($con, $idExam, $val);
        }
    }

    echo "<script type='text/javascript'>window.location.href='selectOptionExam.php'</script>";
}
echo "<pre>";
var_dump($_POST);
echo "</pre>";