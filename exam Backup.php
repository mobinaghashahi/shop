<?php
require_once "header.php";


$id=$_GET["id"];
$con=connect();




if(!userlogin())
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}
if(selectExamState($con,$id,$_SESSION['id'])!=0||selectExamState($con,$id,$_SESSION['id'])==null)
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}

$res=selectInfoQuestionExam($con,$id);
echo "<pre>";
var_dump($res);
echo "</pre>";
//updateExamState($con,$id,$_SESSION['id']);
?>

    <script>


        minutesGeneralLesson= <?php echo $res['timeGeneralLesson'];?>;
        minutesSpecialtyLesson=<?php echo $res['timeSpecialtyLesson'];?>;

        minutes=minutesGeneralLesson
        seconds=1;

        endExam=1;




        //پاک کردن گزینه های یک سطر
        function setnull(mo) {
            for (i=1;i<=4;i++)
            {
                document.getElementById(i+mo*10).checked=false
            }
        }


        function timer(){
            var time=setInterval(function () {
                seconds--;


                //نمایش ساعت
                if(seconds<10&&minutes<10)
                {
                    document.getElementById("time").innerText="0"+minutes+":"+"0"+seconds;
                }
                else if(seconds<10)
                {
                    document.getElementById("time").innerText=minutes+":"+"0"+seconds;
                }
                else if(minutes<10)
                {
                    document.getElementById("time").innerText="0"+minutes+":"+seconds;
                }
                else {
                    document.getElementById("time").innerText=minutes+":"+seconds;
                }




                if(minutes>=1&&minutes<=5)
                {
                    document.getElementById("time").style.backgroundColor="yellow"
                }
                if(minutes<=1)
                {
                    document.getElementById("time").style.backgroundColor="red"
                }
                if(minutes==0&&seconds==0&&endExam==0){
                    clearInterval(time);
                    document.getElementById("SpecialtyLessons").style.display="none";
                    document.getElementById("time").style.backgroundColor="green"
                    document.getElementById("time").innerText="زمان شما به پایان رسید! برای ارسال جواب ها بر روی ثبت کلیک کنید.";
                }
                else if(minutes==0&&seconds==0&&endExam!=0){
                    endExam--;
                    minutes=minutesSpecialtyLesson;
                    seconds=1;
                    document.getElementById("SpecialtyLessons").style.display="inline";
                    document.getElementById("GeneralLessons").style.display="none";
                }
                else if(seconds==0)
                {
                    minutes--;
                    seconds=59;
                }

            },1000)
            document.getElementById("questionsBlock").style.display="inline";
            document.getElementById("GeneralLessons").style.display="inline";
            document.getElementById("timeblok").style.display="inline";
            document.getElementById("start").style.display="none";
        }
        

    </script>

    <div id="timeblok" class="col-12" style="position: fixed;top: 0px;left: 0px;margin: 0px;padding: 0px;display: none" >
        <p id="time" style="text-align: center;background-color: green; padding: 10px; font-size: 30px;direction: rtl">00:00</p>
    </div>

    <div class="col-1">
    </div>
    <div id="start" class="col-10">
        <a href="exam.php?id=<?php echo $id; ?>&start=1" class="submitCourse"> شروع آزمون</a>

        <h1 style="text-align: center;direction: rtl;padding-top: 20px">
            لطفا قبل از شروع آزمون، فایل مربوط به سوالات را از این قسمت دانلود کنید.
            <a href="downlaodExam.php?id=<?php echo $id  ?>" style="display: flex;justify-content: center;padding-top: 20px"><img src="logo/download.png" width="20" height="20"></a>
            <br>
            <span style="color: red">بعد از شروع آزمون، از خارج شدن و یا بازیابی صفحه (رفرش کردن صفحه) خودداری کنید، در غیر این صورت نمره شما صفر در نظر گرفته می شود.</span>
            <br>
            <span style="color: red">بعد از اتمام زمان آزمون، گزینه ها برای شما پنهان می شود و شما تنها قادر به ارسال جواب هایی می باشید که قبل از اتمام آزمون انتخاب نموده اید.</span>

        </h1>

    </div>
    <form method="post" action="validationExam.php">

        <div onload="timer();" id="questionsBlock" style="background-color: white;display: none;" class="col-10"  >


            <div id="GeneralLessons" style="display: none">
                <div class="col-12">
                    <p style="font-weight: bolder;text-align: center;background-color: rgba(18,42,137,0.47);border-radius: 10px;padding: 10px">سوالات دروس عمومی</p>
                </div>
                <?php
                $gozine=['الف','ب','ج','د'];
                for($i=1;$i<=$res['countGeneralLesson'];$i++)
                {
                    ?>
                    <div style="float: right;margin-bottom: 20px" class="col-12">
                        <h1 style="text-align: right;"> سوال <?php echo $i;?> </h1>
                        <?php for ($j=0;$j<4;$j++) {?>
                            <div style="float: right">
                                <label> <input type="radio" name="<?php echo $i;?>" id="<?php echo $i.$j+1;?>" value="<?php echo $i.$j+1;?>" style="margin-left: 50px"> <?php echo $gozine[$j];?> </label>
                            </div>
                        <?php }?>
                        <input onclick="setnull(<?php echo $i;?>);" type="button" class="submit" value="پاک کردن">
                    </div>

                    <?php
                }
                ?>
            </div>
            <div id="SpecialtyLessons" style="display: none;margin:0px 10px 0px 10px">
                <div class="col-12">
                    <p style="font-weight: bolder;text-align: center;background-color: rgba(18,42,137,0.47);border-radius: 10px;padding: 10px">سوالات دروس تخصصی</p>
                </div>
                <?php
                $gozine=['الف','ب','ج','د'];
                for($i=$res['countGeneralLesson'];$i<=$res['countSpecialtyLesson']+$res['countGeneralLesson'];$i++)
                {
                    ?>
                    <div style="float: right;margin-bottom: 20px" class="col-12">
                        <h1 style="text-align: right;"> سوال <?php echo $i;?> </h1>
                        <?php for ($j=0;$j<4;$j++) {?>
                            <div style="float: right">
                                <label> <input type="radio" name="<?php echo $i;?>" id="<?php echo $i.$j+1;?>" value="<?php echo $i.$j+1;?>" style="margin-left: 50px"> <?php echo $gozine[$j];?> </label>
                            </div>
                        <?php }?>
                        <input onclick="setnull(<?php echo $i;?>);" type="button" class="submit" value="پاک کردن">
                    </div>

                    <?php
                }
                ?>
            </div>
            <script>
                $()
            </script>
            <div>
                <input type="text" name="idExam" readonly="true" value="<?php echo $id?>" style="border: none;visibility: hidden">
            </div>


            <div id="send" style="justify-content: center;display: flex" >
                <input class="submit" name="calExam" type="submit" style="background-color: green" value="ثبت">
            </div>

        </div>
    </form>
    <div class="col-1">
    </div>
<?php
if(isset($_GET['start']))
{
    ?>
    <script>
        timer();
    </script>
    <?php
}
require_once "footer.php";
