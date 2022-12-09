<?php
require_once "header.php";


$id=$_GET["id"];
$con=connect();


if(!userlogin())
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}
if(selectExamState($con,$id,$_SESSION['id'])==2) {
    echo "<script type='text/javascript'>window.location.href='showExams.php'</script>";
}



$res=selectInfoQuestionExam($con,$id,$_SESSION['id']);
//echo "min=". floor((time()-$res['startExamTime'])/60)." sec=".(((time()-$res['startExamTime'])/60)-floor((time()-$res['startExamTime'])/60))*60;
$difTime=GetTimeDifference(time(),$res['startExamTime']);
$difTime['sec']=round($difTime["sec"]);
$difTime['min']=round($difTime["min"]);








//updateExamState($con,$id,$_SESSION['id']);
?>

    <script>
        $(document).ready(function(){

            min=0;
            sec=1;

            <?php
                //اگر کاربر رفرش کرد اینجا مشخص میکند که کاربر در چه مرحله بود
            if(selectExamState($con,$id,$_SESSION['id'])==1)
            {


            $selectedAnswer=selectedAnswerExam($con,$id,$_SESSION['id']);

            for ($i=1;$i<=$selectedAnswer->num_rows;$i++){
                $row2=$selectedAnswer->fetch_assoc();
                $index=substr($row2['selectedOption'],0,strpos($row2['selectedOption'],"."));
                $value=substr($row2['selectedOption'],strpos($row2['selectedOption'],".")+1);
                $seleced[$index]=$value;
            }

            //نمایش دادن درس های عمومی
                if($difTime['min']<$res['timeGeneralLesson']) {
                        ?>
                    $('#timeblok').slideDown(0)
                    $("#send").fadeOut(0);
                    levelExam=1;
                    <?php
                    if((60-$difTime['sec'])!=0)
                    {
                    ?>
                        min=<?php echo $res['timeGeneralLesson']-$difTime['min']-1?>;
                        sec=<?php echo 60-$difTime['sec']?>;
                    <?php
                    }else{
                    ?>
                        min=<?php echo $res['timeGeneralLesson']-$difTime['min']?>;
                        sec=0;
                    <?php
                    }
                }

                //نمایش درس های تخصصی
                else if($difTime['min']<$res['timeSpecialtyLesson']+$res['timeGeneralLesson']){
                    ?>
                    $('#timeblok').slideDown(0)
                    $("#questionsBlock").slideDown(0);
                    $("#SpecialtyLessons").slideDown(0);
                    $("#GeneralLessons").fadeOut(0);
                    $("#send").slideDown(0);
                    levelExam=2;
                    <?php
                    if((60-$difTime['sec'])!=0){
                        ?>
                        min=<?php echo $res['timeSpecialtyLesson']+$res['timeGeneralLesson']-$difTime['min']-1?>;
                        sec=<?php echo 60-$difTime['sec']?>;
                        <?php
                    }else{
                        ?>
                        min=<?php echo $res['timeSpecialtyLesson']+$res['timeGeneralLesson']-$difTime['min']?>;
                        sec=0;
                        <?php
                    }
                }
                else
                {
                 ?>
                    levelExam=2;
                    min=0;
                    sec=0;
                    $("#send").slideDown(0);
                    $("#questionsBlock").slideDown(0);
                    $("#SpecialtyLessons").fadeOut(0);
                    $("#toSpecialtyLesson").fadeOut(0);
                    $("#timeblok").fadeOut(0);
                    $("#GeneralLessons").fadeOut(0);
                 <?php
                }
                ?>


                time =setInterval(function(){
                    sec--
                    //نمایش صحیح دقیقه . ثانیه
                    if(sec<10&&min<10)
                    {
                        $("#time").text("0"+min+":"+"0"+sec);
                    }
                    else if(sec<10)
                    {
                        $("#time").text(min+":"+"0"+sec);
                    }
                    else if(min<10)
                    {
                        $("#time").text("0"+min+":"+sec);
                    }
                    else {
                        $("#time").text(min+":"+sec);
                    }


                    if(min<=0&&sec<=0&&levelExam==2){
                        clearInterval(time);
                        $("#send").slideDown(0);
                        $("#questionsBlock").slideDown(0);
                        $("#SpecialtyLessons").fadeOut(0);
                        $("#toSpecialtyLesson").fadeOut(0);
                        $("#timeblok").fadeOut(0);
                        $("#GeneralLessons").fadeOut(0);
                    }
                    else if(min==0&&sec==0&&levelExam==1) {
                        levelExam++;
                        min =<?php echo $res['timeSpecialtyLesson']?>;
                        sec = 1;
                        $("#questionsBlock").slideDown(0);
                        $("#SpecialtyLessons").slideDown(0);
                        $("#GeneralLessons").fadeOut(0);
                        $("#send").slideDown(0);
                    }
                    else if(sec==0)
                    {
                        min--;
                        sec=59;
                    }
                }, 1000);
            //setInterval(function(){ alert("Hello"); }, 1000);
            $("#startBlock").fadeOut(0);
            $("#questionsBlock").slideDown(1000);
                <?php
            }
            ?>

            $("#startBtn").click(function () {
                levelExam=1;
                min=<?php echo $res['timeGeneralLesson']?>;
                $("#timeblok").slideUp(100);
                $("#send").fadeOut(0);
                time =setInterval(function(){
                    sec--
                    //نمایش صحیح دقیقه . ثانیه
                    if(sec<10&&min<10)
                    {
                        $("#time").text("0"+min+":"+"0"+sec);
                    }
                    else if(sec<10)
                    {
                        $("#time").text(min+":"+"0"+sec);
                    }
                    else if(min<10)
                    {
                        $("#time").text("0"+min+":"+sec);
                    }
                    else {
                        $("#time").text(min+":"+sec);
                    }


                    if(min<=0&&sec<=0&&levelExam==2){
                        clearInterval(time);
                        $("#send").slideDown(0);
                        $("#questionsBlock").slideDown(0);
                        $("#SpecialtyLessons").fadeOut(0);
                        $("#toSpecialtyLesson").fadeOut(0);
                        $("#send").slideDown(0);
                        $("#timeblok").slideUp(0);
                        $("#GeneralLessons").fadeOut(0);
                    }
                    else if(min<=0&&sec==0&&levelExam==1) {
                        levelExam++;
                        min =<?php echo $res['timeSpecialtyLesson']?>;
                        sec = 1;
                        $("#questionsBlock").slideDown(0);
                        $("#SpecialtyLessons").slideDown(0);
                        $("#GeneralLessons").fadeOut(0);
                        $("#send").slideDown(0);
                    }
                    else if(sec==0)
                    {
                        min--;
                        sec=59;
                    }
                }, 1000);

                $('#timeblok').slideDown(1000)

                //setInterval(function(){ alert("Hello"); }, 1000);
                $("#startBlock").fadeOut(0);
                $("#questionsBlock").slideDown(1000);
                $("#time").innerHTML="sad";
                $.ajax({
                    url : 'saveInfoExam.php',
                    type : 'get' ,
                    data:{idExam: <?php echo $id;?>,command: "start"},
                    success : function(){},
                    error : function(){}
                })

            })

            $("input:radio").click(function () {
                $.ajax({
                    url : 'saveInfoExam.php',
                    type : 'post' ,
                    data:{idExam: <?php echo $id;?>,answer:$(this).val(),command: "svaeAnswer"},
                    success : function(){ },
                    error : function(){alert("Check your connection")}
                })
            })


            $("input:button").click(function () {
                for (i=1;i<=4;i++)
                {
                    id=i+$(this).attr("id")*10;
                    id="#"+id;
                    if($(id).prop('checked')==true){
                        $.ajax({
                            url : 'saveInfoExam.php',
                            type : 'post' ,
                            data:{idExam: <?php echo $id;?>,answer:$(id).val(),command: "deleteAnswer"},
                            success : function(){ },
                            error : function(){alert("Check your connection")}
                        })
                    }
                    $(id).prop('checked', false);

                   /*$.ajax({
                        url : 'saveInfoExam.php',
                        type : 'post' ,
                        data:{idExam: <?php echo $id;?>,answer:$(this).val(),command: "svaeAnswer"},
                        success : function(){ },
                        error : function(){alert("error")}
                    })*/
                }
            })
        })

    </script>

    <div id="timeblok" class="col-12" style="position: fixed;top: 0px;left: 0px;margin: 0px;padding: 0px;display: none" >
        <p id="time" style="text-align: center;background-color: green; padding: 10px; font-size: 30px;direction: rtl"></p>
    </div>
    <div class="col-1">
    </div>
    <div id="startBlock" class="col-10" >
        <div  class="col-12" style="display: flex;justify-content: center">
            <input id="startBtn" class="submit" type="button" value="شروع آزمون">
        </div>

        <h1 id="text" style="text-align: center;direction: rtl; background-color: white;border-radius: 10px;padding: 30px">
            لطفا قبل از شروع آزمون، فایل مربوط به سوالات را از این قسمت دانلود کنید.
            <br>
            <a style="text-align: center">دروس تخصصی</a>
            <div style="display: flex;justify-content: center;">
                <a href="downlaodExam.php?id=<?php echo $id."_1"  ?>" style="padding-top: 20px;width: 10%"><img src="logo/download.png" width="20" height="20"></a>
            </div>
            <a style="text-align: center">دروس عمومی</a>
            <div style="display: flex;justify-content: center;border-radius: 20px">
                <a href="downlaodExam.php?id=<?php echo $id."_2"  ?>" style="padding-top: 20px;width: 10%"><img src="logo/download.png" width="20" height="20"></a>
            </div>

            <span style="color: red">* سوالات دروس تخصصی بعد از اتمام زمان سوالات عمومی برای شما باز خواهد شد.</span>
            <br>
            <br>
            <span style="color: red">* بعد از اتمام زمان دروس تخصصی، پاسخنامه دروس تخصصی بسته خواهد شد و شما اجازه برگشت و تغییر آن را نخواهید داشت.</span>
            <br>
            <br>
            <span style="color: red">* بعد از اتمام زمان دروس عمومی، پاسخنامه بسته خواهد شد.</span>
            <br>
            <br>
            <span style="color: red">* برای محاسبه درصد آزمون، بر روی دکمه ثبت کلیک کنید.</span>
        </h1>
    </div>
    <form method="post" action="validationExam.php">

        <div id="questionsBlock" style="background-color: white;display: none;" class="col-10">
            <div id="GeneralLessons" style="display: inline">
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
                                <?php
                                if(isset($seleced[$i]))
                                {
                                    if($seleced[$i]==$j+1)
                                    {
                                        ?>
                                        <label> <input type="radio" name="<?php echo $i;?>" id="<?php echo $i.$j+1;?>" value="<?php echo $i.".".($j+1);?>" checked="checked" style="margin-left: 50px"> <?php echo $gozine[$j];?> </label>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <label> <input type="radio" name="<?php echo $i;?>" id="<?php echo $i.$j+1;?>" value="<?php echo $i.".".($j+1);?>" style="margin-left: 50px"> <?php echo $gozine[$j];?> </label>
                                    <?php
                                    }
                                 }else{
                                    ?>
                                    <label> <input type="radio" name="<?php echo $i;?>" id="<?php echo $i.$j+1;?>" value="<?php echo $i.".".($j+1);?>" style="margin-left: 50px"> <?php echo $gozine[$j];?> </label>
                                    <?php
                                }
                                ?>
                            </div>
                        <?php }?>
                        <input onclick="setnull(<?php echo $i;?>);" id="<?php echo $i;?>" type="button" class="submit" value="پاک کردن">
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
                for($i=$res['countGeneralLesson']+1;$i<=$res['countSpecialtyLesson']+$res['countGeneralLesson'];$i++)
                {
                    ?>
                    <div style="float: right;margin-bottom: 20px" class="col-12">
                        <h1 style="text-align: right;"> سوال <?php echo $i;?> </h1>
                        <?php for ($j=0;$j<4;$j++) {?>
                            <div style="float: right">
                                <?php
                                if(isset($seleced[$i]))
                                {
                                    if($seleced[$i]==$j+1)
                                    {
                                        ?>
                                        <label> <input type="radio" name="<?php echo $i;?>" id="<?php echo $i.$j+1;?>" value="<?php echo $i.".".($j+1);?>" checked="checked" style="margin-left: 50px"> <?php echo $gozine[$j];?> </label>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <label> <input type="radio" name="<?php echo $i;?>" id="<?php echo $i.$j+1;?>" value="<?php echo $i.".".($j+1);?>" style="margin-left: 50px"> <?php echo $gozine[$j];?> </label>
                                        <?php
                                    }
                                }else{
                                    ?>
                                    <label> <input type="radio" name="<?php echo $i;?>" id="<?php echo $i.$j+1;?>" value="<?php echo $i.".".($j+1);?>" style="margin-left: 50px"> <?php echo $gozine[$j];?> </label>
                                    <?php
                                }
                                ?>
                            </div>
                        <?php }?>
                        <input onclick="setnull(<?php echo $i;?>);" id="<?php echo $i;?>" type="button" class="submit" value="پاک کردن">
                    </div>

                    <?php
                }
                ?>
            </div>

            <div>
                <input id="idExam" type="text" name="idExam" readonly="true" value="<?php echo $id?>" style="border: none;visibility: hidden">
            </div>


            <div id="send" style="justify-content: center;display: flex" >
                <input class="submit" name="calExam" type="submit" style="background-color: green;" value="ثبت" >
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

