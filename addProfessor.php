<?php
require_once "header.php";
$con=connect();
//دسترسی ادمین
if(selectAcces($con, $_SESSION["id"])!="admin"||empty($_SESSION["id"]))
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}



?>

    <form method="post" name="register" action="professorChange.php" enctype="multipart/form-data" style="direction: rtl;text-align: right">
        <div class="col-12">
            <div class="col-12">
                نام
            </div>
            <div class="col-5" style="float: right">
                <input class="input" name="name" type="text" value="">
            </div>
            <div class="col-12">
                نام خانوادگی
            </div>
            <div class="col-5" style="float: right">
                <input class="input" name="family" type="text" value="">
            </div>
            <div class="col-12">
                رزومه
            </div>
            <div class="col-5" style="float: right">
                <input class="input" name="cv" type="text" value="">
            </div>
            <div class="col-12">
                مدرک
            </div>
            <div class="col-5" style="float: right">
                <input class="input" name="evidence" type="text" value="">
            </div>
            <div class="col-12">
                ایمیل
            </div>
            <div class="col-5" style="float: right">
                <input class="input" name="email" type="email" value="">
            </div>
            <div class="col-12">
                شماره موبایل
            </div>
            <div class="col-5" style="float: right">
                <input class="input" name="phone" type="text" value="">
            </div>
            <div class="col-12">
                Select image to upload:

                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="col-12">
                <input class="submit" name="addProfessor" type="submit" value="اضاف کردن">
            </div>
        </div>
    </form>
    </div>
<?php
require_once "footer.php";