<?php
require_once "header.php";


//اگر قبلا لوگین کرده بود
if(userlogin())
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}


//ارورهای هنگام ورود
if(isset($_GET['state']))
{
?>
<div class="col-12" style="text-align: center;color: <?php if($_GET['state']=="Successful")
    echo "green";
else
    echo "red";?>">
    <p><?php
        if($_GET['state']=="Successful")
            echo "ثبت نام با موفقیت انجام شد";
        else if($_GET['state']=="emptyUssername")
            echo "ایمیل را وارد کنید";
        else if($_GET['state']=="emptyPassword")
            echo "رمزعبور را وارد کنید";
        else if($_GET['state']=="passmatch")
            echo "رمز عبور و تایید رمز عبور یکسان نسیت";
        else if($_GET['state']=="weakPassword")
            echo "رمز عبور شما باید بیشتر از 7 کاراکتر باشد";
        else if($_GET['state']=="wrong")
            echo "نام کاربری یا رمز عبور اشتباه است";
        else if($_GET['state']=="emailUsed")
            echo "نام کاربری قبلا استفاده شده است";
        else if($_GET['state']=="name")
            echo "نام را وارد کنید";
        else if($_GET['state']=="family")
            echo " نام خانوادگی را وارد کنید";
        else if($_GET['state']=="number")
            echo "شماره موبایل را وارد کنید";
        ?></p>
</div>
<?php
}
?>
<div class="row login">
    <form method="post" name="enter" action="validation.php">
        <div class="col-5"  >
            <div class="col-12" >
                نام کاربری
            </div>
            <div class="col-12">
                <input class="input" name="username" type="email">
            </div>
            <div class="col-12">
                رمز عبور
            </div>
            <div class="col-12">
                <input class="input" name="password" type="password">
            </div>
            <div class="col-12">
                <input class="submit" name="enter" type="submit" value="ورود" >
            </div>
        </div>
    </form>
    <form method="post" name="register" action="validation.php">
        <div class="col-5">
            <div class="col-12">
                ایمیل
            </div>
            <div class="col-12">
                <input class="input" name="username" type="email">
            </div>
            <div class="col-12">
                نام
            </div>
            <div class="col-12">
                <input class="input" name="name" type="text">
            </div>
            <div class="col-12">
                نام خانوادگی
            </div>
            <div class="col-12">
                <input class="input" name="family" type="text">
            </div>
            <div class="col-12">
                شماره تماس
            </div>
            <div class="col-12">
                <input class="input" name="number" type="text">
            </div>
            <div class="col-12">
                رمز عبور
            </div>
            <div class="col-12">
                <input class="input" name="password" type="password">
            </div>
            <div class="col-12">
                تایید گذرواژه
            </div>
            <div class="col-12">
                <input class="input" name="repassword" type="password">
            </div>
            <div class="col-12">
                <input class="submit" name="register" type="submit" value="ثبت نام">
            </div>
        </div>
    </form>
</div>
<?php
require_once "footer.php";