<?php
require_once "header.php";
if(empty($_GET['id']))
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}
$con=connect();
$row = selectCoursesGroup($con,$_GET['id']);
$res=null;
?>


<div class="showBoxCourses">
<?php
$arr = array("0","1","2","3","4","5","6","7","8","9");
if($row->num_rows!=0)
{
    for($i=0;$i<$row->num_rows;$i++)
    {
        $res=$row->fetch_assoc();
    ?>
        <div class="col-3 boxCourse">
            <div class="col-12" style="display: flex;justify-content: center">
                <?php
                $fliePath="picCourses/".$res['id'].".jpg";
                if(file_exists($fliePath)) {
                    ?>
                    <img src="<?php echo $fliePath;?>" width="100" height="100">
                    <?php
                }
                else {
                    ?>
                    <img src="logo/not%20found.jpg" width="100" height="100">
                <?php
                }
                ?>

            </div>
            <h1 style="text-align: right; direction: rtl">
                <?php


                //رفع ایراد اعداد انگیلیس که به فارسی تبدیل میشد.
                $nameCours=toEnglishNumber($res['nameCourse'],16);
                echo $nameCours;
                //echo $res['nameCourse'];


            ?></h1>
            <h1 style="text-align: right; direction: rtl"> مدرس: <?php echo $res['nameProfessor'];?></h1>
            <h1 style="text-align: right; direction: rtl"> مدت زمان آموزش: <?php echo $res['time'];?> ساعت</h1>
                <?php
                if(!empty($_SESSION["id"]))
                    if(selectAcces($con,$_SESSION["id"])=="admin")
                    {
                        ?>
                        <div class="col-12">
                            <form method="get" name="enter" action="coursesChange.php" style="display: inline">

                                <input type="text" name="id" readonly="true" value="<?php echo $res['id']?>" style="border: none; display: none">
                                <input class="submit" name="deleteCourse" type="submit" value="حذف" style="width: 30%" >

                            </form>
                            <form method="get" name="enter" action="coursesEdit.php" style="display: inline">
                                <input type="text" name="id" readonly="true" value="<?php echo $res['id']?>" style="border: none; display: none">
                                <input class="submit" name="editCourse" type="submit" value="ویرایش" style="width: 30%" >
                            </form>
                        </div>

                        <?php
                    }
                if($res['state']!=0)
                {
                ?>
                    <a href="showDetailCourse.php?id=<?php echo $res['id']; ?>" class="submitCourse"> شروع آموزش</a>
                <?php
                }else{
                ?>
                <a class="submitCourse">درحال آماده سازی دوره</a>
                <?php
                }
                ?>
        </div>
        <?php
    }
}
else
{
    ?>
    <div style="float: right;width: 100%;margin-top: 50px;margin-bottom: 10px">
        <p style="text-align: center;font-size: 50px">آموزشی وجود ندارد</p>
    </div>

    <img src="logo/notResault.png" width="20%" height="20%" style="display: block">
    <?php
}
        ?>
</div>




<?php
require_once "footer.php";
?>