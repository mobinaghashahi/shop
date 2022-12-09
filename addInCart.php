<?php
require_once "config.php";



function addProduct($idProduct){
    $_SESSION['productCount']++;
    $index='p'.$_SESSION['productCount'];
    $_SESSION[$index]=$idProduct;
}


$con=connect();
$res=selectCourseDetail($con,$_GET['id']);
$row=$res->fetch_assoc();
if($row['courseState']==0)
{
    echo "<script type='text/javascript'>window.location.href='404.php'</script>";
}


if(empty($_SESSION['productCount']))
    $_SESSION['productCount']=0;


if(isAddedProduct($_GET['id'])==false)
    addProduct($_GET['id']);



$direct="<script type='text/javascript'>window.location.href='".$_SERVER["HTTP_REFERER"]."'</script>";
echo $direct;
die();