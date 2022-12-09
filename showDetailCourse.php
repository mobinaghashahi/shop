<?php
require_once "header.php";
$con=connect();
$res=selectCourseDetail($con,$_GET['id']);
$row=$res->fetch_assoc();
$cntStudent=countStudentBuyThisCourse($con,$_GET['id']);
if($row['courseState']==0)
{
    echo "<script type='text/javascript'>window.location.href='404.php'</script>";
}
?>

<div class="col-12" style="text-align: right;direction: rtl">
    <p style="font-size: 30px;margin-right: 100px"><?php echo toEnglishNumber($row['courseName'],30)?></p>
</div>
<div class="col-12 con" >
    <div class="col-4 " id="left" style="" >
        <div class="col-12" style="float: right;background-color: white;text-align: right;direction: rtl;line-height: 60px;border-radius: 10px">
            <p style="font-size: 30px;" id="name"><?php echo $row['courseName']?></p>
            <p> تعداد دانشجو <?php echo $cntStudent?> نفر</p>
            <p> هزینه آموزش <?php echo $row['coursePrice']?> تومان</p>
            <p>مدت زمان آموزش <?php echo $row['courseTime']?> ساعت</p>
            <p>حجم دانلود <?php echo $row['courseSize']?> مگابایت</p>
        </div>
        <div class="col-12" style="text-align: right;direction: rtl;padding: 0px;margin-top: 20px">
            <a href="addInCart.php?id=<?php echo $_GET['id']; ?>" class="submitAddCart" style="width: 100%;border: none">افزودن به سبد خرید</a>
        </div>
    </div>

    <div class="col-6 " id="right" >
        <div class="col-12">
            <?php
            $fliePath="picCourses/".$_GET['id'].".jpg";
            if(file_exists($fliePath)) {
                ?>
            <img src="<?php echo $fliePath;?>" width="300" height="300" style="float: right;">
                <?php
            }
            else {
                ?>
                <img src="logo/not%20found.jpg" width="400" height="400" style="float: right;">
                <?php
            }
            ?>
        </div>

        <p style="font-size: 30px">توضیحات</p>
        <p><?php echo $row['courseDescription']?></p>
        <div style="line-height: 30px;margin: 20px">
            <p style="color: gray">مدرس</p>
            <div class="col-12">
                <?php
                $fliePath="picProfessor/".$_GET['id'].".jpg";
                if(file_exists($fliePath)) {
                    ?>
                    <img src="<?php echo $fliePath;?>" width="100" height="100" style="float: right;">
                    <?php
                }
                else {
                    ?>
                    <img src="logo/not%20found.jpg" width="100" height="100" style="float: right;">
                    <?php
                }
                ?>
            </div>
            <p><?php echo $row['professorName'].' '.$row['professorFamily']?></p>
            <p style="color: #a70101"><?php echo $row['professorEvidence']?></p>
            <p style="color: darkslategrey"><?php echo $row['professorCv']?></p>
        </div>
        <p style="font-size: 30px">فهرست سرفصل ها</p>
            <p style="line-height: 25px"><?php echo $row['courseTitles']?></p>
        <p style="margin-top: 30px">این آموزش برای <?php echo ' '.$row['courseDegreeOfEducation'].' '?>مناسب است. </p>
    </div>

</div>





<?php
require_once "footer.php";

