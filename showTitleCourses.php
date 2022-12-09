<?php
require_once "header.php";
if(empty($_GET['id']))
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}
$con=connect();
$row = selectCoursesTitle($con,$_GET['id']);
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
                        <img src="logo/not%20found.jpg" width="100" height="100">
                    </div>
                    <h1 style="text-align: right; direction: rtl">
                        <?php
                        for($j=0;$j<=9;$j++){
                            $r='<span style="font-family: Arial">'.$arr[$j].'</span>';
                            $nameCours=str_replace($arr[$j],$r,$res['nameCourse'],$count);
                            if($count!=0)
                                break;
                        }
                        echo $nameCours;
                        //echo $res['nameCourse'];


                        ?></h1>
                    <h1 style="text-align: right; direction: rtl"> مدرس: <?php echo $res['nameProfessor'];?></h1>
                    <h1 style="text-align: right; direction: rtl"> مدت زمان آموزش: <?php echo $res['time'];?> ساعت</h1>
                    <?php
                    if($res['state']!=0)
                    {
                        ?>
                        <a href="index.php" class="submitCourse"> شروع آموزش</a>
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