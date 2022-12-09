<?php
require_once "config.php";
//حذف کردن درس
if(isset($_GET["deleteCourse"]) )
{
    $connection = connect();
    deleteCourse($connection,$_GET['id']);
    $fliePath="picCourses/".$_GET['id'].".jpg";
    if(file_exists($fliePath)) {
        delimage($_GET['id']);
    }

    $direct="<script type='text/javascript'>window.location.href='".$_SERVER["HTTP_REFERER"]."'</script>";
    echo $direct;
    die();
}
//برای قسمت ادیت درس ها
else if(isset($_POST["editCourse"]))
{
    $connection = connect();
    updateCourse($connection,$_POST['name'],$_POST['price'],$_POST['time'],$_POST['size'],$_POST['idProfessor_fk'],$_POST['description'],$_POST['degreeOfEducation'],$_POST['state'],$_POST['idMajor_fk'],$_POST['titles'],$_POST['idGroup_fk'],$_POST['idGrayesh_fk'],$_POST['id']);
    if($_FILES["fileToUpload"]["size"]!=0&&empty($_POST['delPic']))
    {
            saveImage($_FILES,$_POST['id']);
    }
    if(isset($_POST['delPic']))
    {
        delimage($_POST['id']);
    }
    //برای برگشت به صفحه ای که بوده
    echo $_POST['URL'];
    /*$direct="<script type='text/javascript'>window.location.href='".$_SERVER["HTTP_REFERER"]."'</script>";
    echo $direct;
    die();*/
}

//برای قسمت اضاف کردن درس ها
else if(isset($_POST["addCourse"]))
{
    $connection = connect();
    addCourse($connection,$_POST['name'],$_POST['price'],$_POST['time'],$_POST['size'],$_POST['idProfessor_fk'],$_POST['description'],$_POST['degreeOfEducation'],$_POST['state'],$_POST['idMajor_fk'],$_POST['titles'],$_POST['idGroup_fk'],$_POST['idGrayesh_fk']);
    $idPic=selectLastCourse($connection);
    saveImage($_FILES,$idPic);
    $direct="showCourses.php?id=".$_POST['idGroup_fk'];
    $direct="<script type='text/javascript'>window.location.href='$direct'</script>";
    echo $direct;
    die();
}