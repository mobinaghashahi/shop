<?php
require_once "header.php";

if(selectAcces($con, $_SESSION["id"])!="admin"||empty($_SESSION["id"]))
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}
?>

<script>
    $(document).ready(function() {
        $("#SpecialtyLessonBlock").fadeOut(0);
        GeneralLesson='';
        SpecialtyLesson='';


        $("#countGeneralLesson").keyup(function (e) {
            if(e.keyCode!=8)
            {
                if(e.keyCode<96||e.keyCode>105)
                {
                    $("#countGeneralLesson").val("")
                    $("#countGeneralLesson").css("background-color","red")
                }
                else {
                    $("#countGeneralLesson").css("background-color","whit")
                }
            }
        })
        $("#countGeneralLesson").change(function() {
            if($("#countGeneralLesson").val()!="")
            {
                $("#SpecialtyLessonBlock").fadeIn(1000);
            }else{
                $("#SpecialtyLessonBlock").fadeOut(1000);
                $("#countSpecialtyLesson").val("");
                GeneralLesson='';
            }
            SpecialtyLessons='';
            GeneralLesson='';



            if($("#countSpecialtyLesson").val()!="")
            {
                var gozine = new Array('الف','ب','ج','د');
                for (i=1;i<=$("#countGeneralLesson").val();i++)
                {
                    start='<div style="float: right;margin-bottom: 20px" class="col-12">' +
                        '<h1 style="text-align: right;"> سوال '+i+' </h1>\n';
                    mid='';
                    for (j=0;j<4;j++)
                    {
                        middlee='                            <div style="float: right">\n'+
                            '                                <label> <input type="radio" name="'+i+'" id="'+i.toString()+(j+1).toString()+'" value="'+i.toString()+'.'+(j+1).toString()+'.1'+'" style="margin-left: 50px">'+ gozine[j] +'</label>\n' +
                            '                            </div>\n';
                        mid+=middlee;
                    }
                    end='</div>';
                    GeneralLesson+=start+mid+end;

                }



                SpecialtyLesson='';
                var gozine = new Array('الف','ب','ج','د');
                for (i=parseInt($("#countGeneralLesson").val())+1;i<=(parseInt($("#countSpecialtyLesson").val())+parseInt($("#countGeneralLesson").val()));i++)
                {
                    start='<div style="float: right;margin-bottom: 20px" class="col-12">' +
                        '<h1 style="text-align: right;"> سوال '+i+' </h1>\n';
                    mid='';
                    for (j=0;j<4;j++)
                    {
                        middlee='                            <div style="float: right">\n'+
                            '                                <label> <input type="radio" name="'+i+'" id="'+i.toString()+(j+1).toString()+'" value="'+i.toString()+'.'+(j+1).toString()+'.2'+'" style="margin-left: 50px">'+ gozine[j] +'</label>\n' +
                            '                            </div>\n';
                        mid+=middlee;
                    }
                    end='</div>';
                    SpecialtyLesson+=start+mid+end;

                }
                GeneralLesson+=SpecialtyLesson;
                $("#testBlock").html(GeneralLesson);
            }
        })
       /* $("#countGeneralLesson").change(function() {
            if($("#countGeneralLesson").val()!="")
            {
                $("#SpecialtyLessonBlock").fadeIn(1000);
            }else{
                $("#SpecialtyLessonBlock").fadeOut(1000);
                $("#countSpecialtyLesson").val("");
                GeneralLesson='';
            }


            var gozine = new Array('الف','ب','ج','د');
            for (i=1;i<=$("#countGeneralLesson").val();i++)
            {
                start='<div style="float: right;margin-bottom: 20px" class="col-12">' +
                    '<h1 style="text-align: right;"> سوال '+i+' </h1>\n';
                mid='';
                for (j=0;j<4;j++)
                {
                    middlee='                            <div style="float: right">\n'+
                        '                                <label> <input type="radio" name="'+i+'" id="'+i.toString()+(j+1).toString()+'" value="'+i.toString()+'.'+(j+1).toString()+'" style="margin-left: 50px">'+ gozine[j] +'</label>\n' +
                        '                            </div>\n';
                    mid+=middlee;
                }
                    end='</div>';
                GeneralLesson+=start+mid+end;

            }

            $("#testBlock").html(GeneralLesson);


        })*/



        $("#countSpecialtyLesson").keyup(function (e) {
            if(e.keyCode!=8)
            {
                if(e.keyCode<96||e.keyCode>105)
                {
                    $("#countSpecialtyLesson").val("")
                    $("#countSpecialtyLesson").css("background-color","red")
                }
                else {
                    $("#countSpecialtyLesson").css("background-color","whit")
                }
            }
        })

        $("#countSpecialtyLesson").change(function() {
            SpecialtyLessons='';
            GeneralLesson='';
            if($("#countSpecialtyLesson").val()!="")
            {
                $("#SpecialtyLessonBlock").fadeIn(1000);
            }else{
                $("#SpecialtyLessonBlock").fadeOut(1000);
                $("#countSpecialtyLesson").val("");
                SpecialtyLessons='';
                GeneralLesson='';
            }



            var gozine = new Array('الف','ب','ج','د');
            for (i=1;i<=$("#countGeneralLesson").val();i++)
            {
                start='<div style="float: right;margin-bottom: 20px" class="col-12">' +
                    '<h1 style="text-align: right;"> سوال '+i+' </h1>\n';
                mid='';
                for (j=0;j<4;j++)
                {
                    middlee='                            <div style="float: right">\n'+
                        '                                <label> <input type="radio" name="'+i+'" id="'+i.toString()+(j+1).toString()+'" value="'+i.toString()+'.'+(j+1).toString()+'.1'+'" style="margin-left: 50px">'+ gozine[j] +'</label>\n' +
                        '                            </div>\n';
                    mid+=middlee;
                }
                end='</div>';
                GeneralLesson+=start+mid+end;

            }



            SpecialtyLesson='';
            var gozine = new Array('الف','ب','ج','د');
            for (i=parseInt($("#countGeneralLesson").val())+1;i<=(parseInt($("#countSpecialtyLesson").val())+parseInt($("#countGeneralLesson").val()));i++)
            {
                start='<div style="float: right;margin-bottom: 20px" class="col-12">' +
                    '<h1 style="text-align: right;"> سوال '+i+' </h1>\n';
                mid='';
                for (j=0;j<4;j++)
                {
                    middlee='                            <div style="float: right">\n'+
                        '                                <label> <input type="radio" name="'+i+'" id="'+i.toString()+(j+1).toString()+'" value="'+i.toString()+'.'+(j+1).toString()+'.2'+'" style="margin-left: 50px">'+ gozine[j] +'</label>\n' +
                        '                            </div>\n';
                    mid+=middlee;
                }
                end='</div>';
                SpecialtyLesson+=start+mid+end;

            }
            GeneralLesson+=SpecialtyLesson;
            $("#testBlock").html(GeneralLesson);
        })



        /*if($("#countGeneralLesson").val()=="")
            alert("nooo")*/

    })
</script>
        <form method="post" action="examChange.php" name="firstInfo" enctype="multipart/form-data">
            <div class="col-12" style="display: flex;justify-content: center">
                <div class="col-10" style="background-color: white;border-radius: 20px;">
                    <div class="col-2" style="float: right;text-align: right">
                        <p>نام آزمون</p>
                    </div>
                    <div class="col-10">
                        <input type="text" name="nameExam" style="border-radius: 5px;height: 30px;direction: rtl;float: right">
                    </div>
                    <div class="row"></div>
                    <div class="col-2" style="float: right;text-align: right">
                        <p>تعداد سوالات عمومی</p>
                    </div>
                    <div class="col-10">
                        <input id="countGeneralLesson" type="text" name="countGeneralLesson" style="border-radius: 5px;height: 30px;direction: rtl;float: right">
                    </div>
                    <div class="row"></div>
                    <div id="SpecialtyLessonBlock">
                        <div class="col-2" style="float: right;text-align: right">
                            <p>تعداد سوالات تخصصی</p>
                        </div>
                        <div class="col-10">
                            <input id="countSpecialtyLesson" type="text" name="countSpecialtyLesson" style="border-radius: 5px;height: 30px;direction: rtl;float: right">
                        </div>
                    </div>
                    <div class="row"></div>
                    <div class="col-2" style="float: right;text-align: right">
                        <p>تاریخ شروع آزمون</p>
                    </div>
                    <div class="col-3" style="float: right;">
                        <input type="text" name="startDate" style="border-radius: 5px;height: 30px;direction: rtl;float: right">
                    </div>
                    <div class="col-7" style="float: right;text-align: right">
                        <label style="color: #cc001b">تاریخ به این فرمت وارد شود 1392/2/7 *</label>
                    </div>
                    <div class="row"></div>
                    <div class="col-2" style="float: right;text-align: right">
                        <p>تاریخ پایان آزمون</p>
                    </div>
                    <div class="col-3" style="float: right;">
                        <input type="text" name="endDate" style="border-radius: 5px;height: 30px;direction: rtl;float: right">
                    </div>
                    <div class="col-7" style="float: right;text-align: right">
                        <label style="color: #cc001b">تاریخ به این فرمت وارد شود 1392/2/7 *</label>
                    </div>
                    <div class="row"></div>
                    <div class="col-2" style="float: right;text-align: right">
                        <p>زمان برای دروس عمومی</p>
                    </div>
                    <div class="col-3" style="float: right;">
                        <input type="text" name="timeGeneralLesson" style="border-radius: 5px;height: 30px;direction: rtl;float: right">
                    </div>
                    <div class="col-7" style="float: right;text-align: right">
                        <label style="color: #cc001b">.زمان به دقیقه وارد شود*</label>
                    </div>
                    <div class="row"></div>
                    <div class="col-2" style="float: right;text-align: right">
                        <p>زمان برای دروس تخصصی</p>
                    </div>
                    <div class="col-3" style="float: right;">
                        <input type="text" name="timeSpecialtyLesson" style="border-radius: 5px;height: 30px;direction: rtl;float: right">
                    </div>
                    <div class="col-7" style="float: right;text-align: right">
                        <label style="color: #cc001b">.زمان به دقیقه وارد شود*</label>
                    </div>
                    <div class="row"></div>
                    <div class="col-2" style="float: right;text-align: right">
                        <p>رشته</p>
                    </div>
                    <div class="col-10">
                        <select name="idMajor_fk" style="float: right;background-color: #d5d5d5;border-radius: 20px;padding: 10px;font-size: large" >
                            <?php
                            $con=connect();
                            $res=selectMajor($con);
                            for($i=0;$i<$res->num_rows;$i++)
                            {
                                $majorInfo=$res->fetch_assoc();
                                ?>
                                <option style="padding: 10px;font-size: large" value="<?php echo $majorInfo['id'];?>"><?php echo $majorInfo['name'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-12" style="float: right;text-align: right">
                        آپلود پی دی اف سوالات دروس عمومی
                        <br>

                        <input type="file" name="firstPdf" id="fileToUpload">
                    </div>
                    <div class="col-12" style="float: right;text-align: right">
                        آپلود پی دی اف سوالات دروس خصوصی
                        <br>

                        <input type="file" name="secondPdf" id="fileToUpload">
                    </div>
                    <div class="row"></div>
                    <div id="testBlock" style="float: right;margin-bottom: 20px" class="col-12">

                    </div>
                    <div class="col-12">
                        <input style="float: right" class="submit" name="choiceAnswer" type="submit" value="ذخیره">
                    </div>
                </div>
            </div>
        </form>


        <?php

require_once "footer.php";
