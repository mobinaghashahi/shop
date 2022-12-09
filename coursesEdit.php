<?php
require_once "header.php";

$con=connect();
//دسترسی ادمین
if(selectAcces($con, $_SESSION["id"])!="admin"||empty($_GET["id"])||empty($_GET))
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}



?>


<?php
//بدست آوردن اطلاعات درس مربوطه
$con=connect();
$result=selectCourse($con,$_GET["id"]);
$row=$result->fetch_assoc();

?>
        <form method="post" name="register" action="coursesChange.php" enctype="multipart/form-data"  style="direction: rtl;text-align: right">
            <div class="col-12">
                <div class="col-5" style="float: right">
                    <input type="text" name="id" readonly="true" value="<?php echo $_GET['id'];?>" style="border: none">
                </div>
                <div class="col-12">
                    عنوان آموزش
                </div>
                <div class="col-5" style="float: right">
                    <textarea class="input" name="name" type="text"><?php echo $row['name'];?></textarea>
                </div>
                <div class="col-12">
                    قیمت
                </div>
                <div class="col-5" style="float: right">
                    <input class="input" name="price" type="text" value="<?php echo $row['price']?>">
                </div>
                <div class="col-12">
                    زمان آموزش
                </div>
                <div class="col-5" style="float: right">
                    <input class="input" name="time" type="text" value="<?php echo $row['time']?>">
                </div>
                <div class="col-12">
                    حجم آموزش
                </div>
                <div class="col-5" style="float: right">
                    <input class="input" name="size" type="text" value="<?php echo $row['size']?>">
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
                    <textarea class="input" name="description" type="text"><?php echo $row['description'];?></textarea>
                </div>
                <div class="col-12">
                    مقطع آموزش
                </div>
                <div class="col-5" style="float: right">
                    <input class="input" name="degreeOfEducation" type="text" value="<?php echo $row['degreeOfEducation']?>">
                </div>
                <div class="col-12">
                    وضعیت آموزش
                </div>
                <div class="col-5" style="float: right">
                    <input class="input" name="state" type="text" value="<?php echo $row['state']?>">
                </div>
                <div class="col-12">
                    رشته مربوط
                    <?php echo $row['idMajor_fk']?>
                    <select name="idMajor_fk" >
                        <option value="<?php echo $row['idMajor_fk'];?>">بدون تغییر</option>
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
                    <textarea class="input" name="titles" type="text" style="text-align: right;direction: initial"><?php echo $row['titles'];?></textarea>
                </div>
                <div class="col-12">
                    گروه آموزش
                    <?php echo $row['idGroup_fk']?>
                    <select name="idGroup_fk" >
                        <option value="<?php echo $row['idGroup_fk'];?>">بدون تغییر</option>
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
                    <?php echo $row['idGrayesh_fk']?>
                    <select name="idGrayesh_fk" >
                        <option value="<?php echo $row['idGrayesh_fk'];?>">بدون تغییر</option>
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
                    <p style="color: red">حذف عکس</p>
                    <input type="checkbox" name="delPic" >
                </div>
                <div class="col-12">
                    Select image to upload:

                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>

                    <input type="text" name="URL" value="<?php
                    $direct="<script type='text/javascript'>window.location.href='".$_SERVER["HTTP_REFERER"]."'</script>";
                    echo $direct;?>" style="visibility: hidden">
                <div class="col-12">
                    <input class="submit" name="editCourse" type="submit" value="ویرایش">
                </div>

            </div>
        </form>
    </div>
<?php
require_once "footer.php";