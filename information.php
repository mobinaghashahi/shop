<?php
require_once "header.php";

//اگر قبلا لوگین نکرده بود
if(!userlogin())
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}
?>


</div>
<div class="row col-12" style="text-align: center;font-weight: bolder;background-color: white">
<p>ویرایش اطلاعات</p>
</div>

<?php
//ارورهای هنگام ورود
if(isset($_GET['state']))
{
?>
<div class="col-12" style="text-align: center;color: <?php if($_GET['state']=="Successful")
    echo "green";
else
    echo "red";?>">
    <p><?php
        if($_GET['state']=="emailUsed")
            echo "نام کاربری قبلا استفاده شده است";
        else if($_GET['state']=="emailEmpty")
            echo "ایمیل خالی است";
        else if($_GET['state']=="emptyNewPass")
            echo "رمز عبور جدید را وارد کنید";
        else if($_GET['state']=="dontMatchPass")
            echo "رمز عبور و تایید رمز عبور یکسان نسیت";
        else if($_GET['state']=="Successful")
            echo "اطلاعات با موفقیت ویرایش شد";
        ?></p>
    <?php
    }
    ?>
</div>
<div class="row login">
    <form method="post" name="enter" action="validation.php">
        <div class="col-5" style="float: right">
            <div class="col-12" >
                نام
            </div>
            <div class="col-12">
                    <input class="input" name="name" type="text" value="<?php echo $row['name']?>">
            </div>
            <div class="col-12">
                نام خانوادگی
            </div>
            <div class="col-12">
                <input class="input" name="family" type="text" value="<?php echo $row['family']?>">
            </div>
            <div class="col-12">
                شماره موبایل
            </div>
            <div class="col-12">
                <input class="input" name="number" type="text" value="<?php echo $row['number']?>">
            </div>
        </div>
        <div class="col-5" style="float: right">

            <div class="col-12">
                ایمیل
            </div>
            <div class="col-12">
                <input class="input" name="email" type="email" value="<?php echo $row['username']?>">
            </div>
            <div class="col-12" style="display: inline">
                <input type="checkbox" id="checkShowPassBox" onclick="showPassbox()" >
                <div style="display: inline;margin: 2px">
                    تغییر رمز عبور
                </div>
            </div>
            <section id="passBox" >
                <div class="col-12">
                    رمز عبور قبلی
                </div>
                <div class="col-12">
                    <input class="input" name="OldPassword" type="password">
                </div>
                <div class="col-12">
                    رمز عبور جدید
                </div>
                <div class="col-12">
                    <input class="input" name="NewPassword" type="password">
                </div>
                <div class="col-12">
                    تکرار رمز عبور جدید
                </div>
                <div class="col-12">
                    <input class="input" name="ReNewPassword" type="password">
                </div>
            </section>
            <div class="col-12">
                <input class="submit" name="edit" type="submit" value="ویرایش">
            </div>
        </div>
    </form>
</div>


<?php
require_once 'footer.php';