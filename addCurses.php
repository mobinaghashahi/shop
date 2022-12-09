<?php
require_once "header.php";
$con=connect();
//دسترسی ادمین
if(selectAcces($con, $_SESSION["id"])!="admin"||empty($_SESSION["id"]))
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}

?>

    <form method="post" name="register" action="coursesChange.php" enctype="multipart/form-data" style="direction: rtl;text-align: right">
        <div class="col-12">
            <div class="col-12">
                عنوان آموزش
            </div>
            <div class="col-5" style="float: right">
                <textarea class="input" name="name" type="text"></textarea>
            </div>
            <div class="col-12">
                قیمت
            </div>
            <div class="col-5" style="float: right">
                <input class="input" name="price" type="text" value="">
            </div>
            <div class="col-12">
                زمان آموزش
            </div>
            <div class="col-5" style="float: right">
                <input class="input" name="time" type="text" value="">
            </div>
            <div class="col-12">
                حجم آموزش
            </div>
            <div class="col-5" style="float: right">
                <input class="input" name="size" type="text" value="">
            </div>
            <div class="col-12">
                استاد
                <select name="idProfessor_fk" >
                    <?php
                    $con=connect();
                    $res=selectProfessor($con);
                    for($i=0;$i<$res->num_rows;$i++)
                    {
                        $profesorInfo=$res->fetch_assoc();
                        ?>
                        <option value="<?php echo $profesorInfo['id'];?>"><?php echo $profesorInfo['name'];?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>

            <div class="col-12">
                توضیحات
            </div>
            <div class="col-5" style="float: right">
                <textarea class="input" name="description" type="text"></textarea>
            </div>
            <div class="col-12">
                مقطع آموزش
            </div>
            <div class="col-5" style="float: right">
                <input class="input" name="degreeOfEducation" type="text" value="">
            </div>
            <div class="col-12">
                وضعیت آموزش
            </div>
            <div class="col-5" style="float: right">
                <input class="input" name="state" type="text" value="">
            </div>
            <div class="col-12">
                رشته مربوط
                <select name="idMajor_fk" >
                    <?php
                    $con=connect();
                    $res=selectMajor($con);
                    for($i=0;$i<$res->num_rows;$i++)
                    {
                        $majorInfo=$res->fetch_assoc();
                        ?>
                        <option value="<?php echo $majorInfo['id'];?>"><?php echo $majorInfo['name'];?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-12">
                سرفصل ها
            </div>
            <div class="col-5" style="float: right">
                <textarea class="input" name="titles" type="text"></textarea>
            </div>
            <div class="col-12">
                گروه آموزش
                <select name="idGroup_fk" >
                    <?php
                    $con=connect();
                    $res=selectGroups($con);
                    for($i=0;$i<$res->num_rows;$i++)
                    {
                        $groupInfo=$res->fetch_assoc();
                        ?>
                        <option value="<?php echo $groupInfo['id'];?>"><?php echo $groupInfo['name'];?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-12">
                گرایش مربوط به آموزش
                <select name="idGrayesh_fk" >
                    <?php
                    $con=connect();
                    $res=selectGrayesh($con);
                    for($i=0;$i<$res->num_rows;$i++)
                    {
                        $grayeshInfo=$res->fetch_assoc();
                        ?>
                        <option value="<?php echo $grayeshInfo['id'];?>"><?php echo $grayeshInfo['name'];?></option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-12">
                Select image to upload:

                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="col-12">
                <input class="submit" name="addCourse" type="submit" value="اضاف کردن">
            </div>
        </div>
    </form>
    </div>
<?php
require_once "footer.php";