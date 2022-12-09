<?php
require_once "config.php";


//ورود
if (isset($_POST["enter"])) {
     $connection = connect();
     $respose = validation($connection, $_POST["username"], $_POST["password"]);
     if ($respose == true) {
         $result=selectInformation($connection,$respose["id"]);
         $row = $result->fetch_assoc();
         $_SESSION["id"]=$row['id'];
         $_SESSION["name"] = $_POST["username"];
         //ثبت ورود کاربران
         date_default_timezone_set("Iran");
         logInsert($connection,$row['id'],gregorian_to_jalali(date("Y"),date("m"),date("d"),' / '),$_SERVER['REMOTE_ADDR']);
         header("Location: index.php");
     } else {
         echo "no";
         header("Location: login.php?state=wrong");
     }
 }

//ثبت نام
if (isset($_POST["register"])) {
     $connection = connect();

    //اگر ایمیل از قبل وجود داشت
    if(!emptyUser($connection,$_POST["username"]))
    {
        header("Location: login.php?state=emailUsed");
        die();
    }
    //خالی بودن ایمیل
     if(empty($_POST["username"]))
     {
         header("Location: login.php?state=emptyUssername");
         die();
     }
    //خالی بودن پسورد
     else if(empty($_POST["password"]))
    {
        header("Location: login.php?state=emptyPassword");
        die();
    }
    //ضعیف بودن پسورد
    else if(strlen($_POST["password"])<8)
    {
        header("Location: login.php?state=weakPassword");
        die();
    }
    //درست وارد نکردن پسورد دوم
    else if($_POST["password"]!=$_POST["repassword"])
    {
        header("Location: login.php?state=passmatch");
        die();
    }
    //خالی بودن نام
    else if(empty($_POST["name"]))
    {
        header("Location: login.php?state=name");
        die();
    }
    //خالی بودن نام خانوادگی
    else if(empty($_POST["family"]))
    {
        header("Location: login.php?state=family");
        die();
    }
    //خالی بودن شماره تماس
    else if(empty($_POST["number"]))
    {
        header("Location: login.php?state=number");
        die();
    }

    $respose = insertUser($connection, $_POST["username"], $_POST["password"],$_POST["name"],$_POST["family"],$_POST["number"]);
    if ($respose == true) {
        header("Location: login.php?state=Successful");
    } else {
        echo "no";
    }
 }

//ویرایش اطلاعات
if (isset($_POST["edit"])) {
    $connection = connect();
    $_POST["email"]=strtolower($_POST["email"]);
    $_SESSION["name"]=strtolower($_SESSION["name"]);


    //اگر ایمیل از قبل وجود داشت
    if(!emptyUser($connection,$_POST["email"])&&$_POST["email"]!=$_SESSION["name"])
    {
        header("Location: information.php?state=emailUsed");
        die();
    }
    //خالی بودن ایمیل
    if(empty($_POST["email"]))
    {
        header("Location: information.php?state=emailEmpty");
        die();
    }
    //برا تغییر رمز، اگر رمز را وارد کرده بود وارد این قسمت می شود
    if(!empty($_POST["OldPassword"]))
    {
        if(empty($_POST["NewPassword"]))
        {
            header("Location: information.php?state=emptyNewPass");
            die();
        }
        $respose = validation($connection, $_SESSION["name"], $_POST["OldPassword"]);
        if ($respose == true) {
            if ($_POST["NewPassword"]==$_POST["ReNewPassword"])
            {
                if(strlen($_POST["NewPassword"])>7)
                {
                    update($connection, $_POST["name"], $_POST["family"], $_POST["number"], $_POST["email"],$_POST["NewPassword"],$_SESSION['id']);
                    header("Location: information.php?state=Successful");
                    die();
                }
                else
                {
                    echo "رمز عبور شما باید بیشتر از 7 کاراکتر باشد";
                }
            }
            else
            {
                header("Location: information.php?state=dontMatchPass");
                die();
            }
        }else {
            header("Location: information.php?state=wrongPass");
            die();
        }
    }
    else
    {
        $respose = update($connection, $_POST["name"], $_POST["family"], $_POST["number"], $_POST["email"],null,$_SESSION["id"]);
        if ($respose == true) {
            $_SESSION["name"] = $_POST["email"];
            echo "yes";
            header("Location: information.php?state=Successful");
        } else {
            echo "no";
            header("Location: login.php?state=wrong");
        }
    }

}


//تست برا این که بدانیم لوگین کرده است یا خیر
function userlogin()
{
    if(isset($_SESSION["name"]))
        return true;
    return false;
    // echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}