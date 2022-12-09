<?php
require_once "config.php";

//اضاف کردن استاد
if(isset($_POST["addProfessor"]))
{
    echo "s";
    $connection = connect();
    insertProfessor($connection,$_POST['name'],$_POST['family'],$_POST['cv'],$_POST['evidence'],$_POST['email'],$_POST['phone']);
    $idPic=selectLastProfessor($connection);
    saveImage($_FILES,$idPic);
    $direct="<script type='text/javascript'>window.location.href='".$_SERVER["HTTP_REFERER"]."'</script>";
    echo $direct;
    die();
}