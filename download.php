<?php
require_once "config.php";
require_once "validation.php";
$con=connect();
if(userlogin()&&buyThisCourse($con,$_SESSION['id'],$_GET['id']))
{

    error_reporting(E_ALL ^ E_NOTICE);

    $id = $_GET['id'];

    $filename = $_GET['part'].'.'.$_GET["type"];


    if(is_null($filename)) {
        http_response_code(404);
        die('File not found!');
    }

    $direct="<script type='text/javascript'>window.location.href='/amozesh/$id/$filename'</script>";
    echo $direct;
}
else{

    $direct="<script type='text/javascript'>window.location.href='index.php'</script>";
    echo $direct;
}