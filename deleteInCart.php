<?php
require_once "config.php";

function deleteProduct($idProduct){
    for($i=1;$i<$_SESSION['productCount'];$i++){
        if($idProduct==$_SESSION[creatIndex($i)]){
            for($j=$i;$j<$_SESSION['productCount'];$j++){
                $_SESSION[creatIndex($j)]=$_SESSION[creatIndex($j+1)];
            }
            break;
        }
    }
    unset($_SESSION[creatIndex($_SESSION['productCount'])]);
    $_SESSION['productCount']--;

}


if(isAddedProduct($_GET['id'])){
    deleteProduct($_GET['id']);
}

$direct="<script type='text/javascript'>window.location.href='".$_SERVER["HTTP_REFERER"]."'</script>";
echo $direct;
die();