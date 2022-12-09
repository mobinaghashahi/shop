<?php
require_once "config.php";
require_once "validation.php";
require_once "function.php";


//برای تعداد بازید سایت
if(empty($_SESSION['name']))
{
    $con=connect();
    date_default_timezone_set("Iran");
    $clock=date("h:i:sa");
    $date = gregorian_to_jalali(date("Y"),date("m"),date("d"),' / ');
    if(!isIpInsert($con,$date,$_SERVER['REMOTE_ADDR'],0)) {
        increaseViwePage($con, $date, $clock, $_SERVER['REMOTE_ADDR'], 0);
    }
}else{
    $con=connect();
    date_default_timezone_set("Iran");
    $clock=date("h:i:sa");
    $date = gregorian_to_jalali(date("Y"),date("m"),date("d"),' / ');
    if(!isIpInsert($con,$date,$_SERVER['REMOTE_ADDR'],$_SESSION['id'])) {
        increaseViwePage($con, $date, $clock, $_SERVER['REMOTE_ADDR'], $_SESSION['id']);
    }
}
date_default_timezone_set("Iran");
$dateToDay=gregorian_to_jalali(date("Y"),date("m"),date("d"),' / ');
$con=connect();
$viweThisDay=viweThisDay($con,$dateToDay);
$viweAll=viweAll($con);

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="shortcut icon" type="image/x-icon" href="https://img.techpowerup.org/201030/logo449.png">
    <link href='http://www.fontonline.ir/css/BZar.css' rel='stylesheet' type='text/css'>
    <title>بزرگ‌ترین مرکز آموزش دانشگاهی، توانمندی های ورود به بازار کار و مشاوره تحصیلی</title>
    <script src="jQuery.js"></script>
    <script type="text/javascript">
        //باز شدن ورودی های تغییر رمز عبور برای ویرایش اطلاعات
        function showPassbox() {
            if(document.getElementById("checkShowPassBox").checked==true)
                document.getElementById("passBox").style.display="inline";
            else
                document.getElementById("passBox").style.display="none";
        }
        function setLayer() {
            if(window.innerWidth<1086)
            {
                document.getElementById("right").style.position="static";
                document.getElementById("left").style.position="static";
                document.getElementById("right").style.left="19%";
                document.getElementById("name").style.display="none";
            }
        }
        function setPadding() {
            // window.pageYOffset
            //alert(window.pageYOffset);
            if(window.pageYOffset>270&&window.innerWidth>1086)
            {
                document.getElementById("left").style.position="fixed";
                document.getElementById("right").style.position="relative";
                document.getElementById("left").style.left="8%";
                document.getElementById("left").style.top="0%";
                document.getElementById("right").style.left="16.6%";
                document.getElementById("right").style.backgroundColor="white";
                document.getElementById("name").style.display="inline";
            }

            if (window.pageYOffset<270&&window.innerWidth>1086){
                document.getElementById("name").style.display="none";
                document.getElementById("left").style.position="relative";
                document.getElementById("right").style.position="relative";
                document.getElementById("left").style.left="0%";
                document.getElementById("left").style.top="0%";
                document.getElementById("right").style.left="0%";
                document.getElementById("right").style.backgroundColor="white";


            }

        }


    </script>



    <style>

        #passBox{
            display: none;
        }
        #name{
            display: none;
        }
        *
        {

            box-sizing : border-box;
            font-size: 17px;
            padding: 0px;
            margin: 0px;
        }
        #left{
            padding: 0px;
            margin: 0px 0px 20px 0px;
        }
        #right{
            float: right;
            background-color: white;
            text-align: right;
            direction: rtl;
            line-height: 60px;
            border-radius: 10px;
            margin: 0px 0px 0px 20px;
        }

        table, th, td {
            text-align: right;
            direction: rtl;
            border-radius: 8px;
            border-collapse: collapse;
            background-color: white;
            padding: 20px;
            margin-top: 30px;
            margin-bottom: 30px;
        }
         #left:hover{
             z-index: 0;
         }
         #right:hover
         {
             z-index: 0;
         }


        .educations{
            text-align: center;
            font-weight: bolder;
            margin: 15px;
            display: flex;
            justify-content: center;
        }

        .header{
            display: inline;
            background-color: #3793fb;
            box-shadow: 0px 1px 10px black;
        }
        .header1{
            display: none;
        }
        nav ul li a {
            display: block;
            padding: 10px 0px;
            color: #4e4e4e;
            text-decoration: none;
            direction: rtl;

        }
        .col-1{width:8.33%;}
        .col-2{width:16.66%;}
        .col-3{width:25%;}
        .col-4{width:33.33%;}
        .col-5{width:41.66%;}
        .col-6{width:50%;}
        .col-7{width:58.33%;}
        .col-8{width:66.66%;}
        .col-9{width:75%;}
        .col-10{width:83.33%;}
        .col-11{width:91.66%;}
        .col-12{width:100%;}
        [class*="col-"]
        {
            float : left;
            padding : 15px;

        }
        html
        {
            font-family : "B" , sans-serif;
        }
        .row:after
        {
            content : "";
            clear : both;
            display : block;
        }

        .menu ul{
            list-style-type : none;
            margin : 0;
            padding : 0;
        }

        .menu li{
            padding : 8px;
            margin-bottom : 7px;
            background-color : #33b5e5;
            color : #ffffff;
            box-shadow : 0 1px 3px rgba(0,0,0,0.12) , 0 1px 2px rgba(0,0,0,0.24);
        }

        .menu li:hover
        {
            background-color : #0099cc;
        }


        .footer{
            background-color : #3793fb;
            color : #ffffff;
            text-align : center;
            font-size : 12px;
            padding : 15px;
        }


        body {
            background: #fbf551;
            font-family: 'Segoe UI', sans-serif;
            font-size: 15px;
            line-height: 24px;
        }

        nav {
            text-align: center;
        }

        nav ul ul {
            display: none;
        }

        nav ul li:hover > ul {
            display: block;
            z-index: 1000;
        }

        nav ul {
            background: #f1f4f7;
            box-shadow: 0px 0px 9px rgba(0,0,0,0.15);
            border-radius: 10px;
            list-style: none;
            position: relative;
            display: inline-table;
        }
        nav ul:after {
            content: "";
            clear: both;
            display: block;
        }

        nav ul li {
            float: right;
            position: relative;
            font-weight: bold;
        }

        nav ul li:hover {
            background: gray;
        }

        nav ul li:hover a {
            color: black;
        }

        nav ul li a {
            display: block;
            padding: 10px 7px;
            color: #4e4e4e;
            text-decoration: none;
        }

        nav ul ul {
            color: #fff;
            border-radius: 0px;
            padding: 0;
            position: absolute;
            top: 100%;
            right: 0;
            width: 200px;
        }
        nav ul ul li {
            float: none;
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            font-size: 12px;
            position: relative;
        }
        nav ul ul li a {
            padding: 5px 0px;
            color: #fff;
        }
        nav ul ul li a:hover {
            background: gray;
        }

        nav ul ul ul {
            position: absolute;
            right: 100%;
            top:0px;
        }
        .toppic{
            padding-top:100px;padding-bottom:100px;
            background-image: url('logo/background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .toppic h1{
            font-size: 40px;
            text-align: center;
            color: white;
            text-shadow: 2px 2px black;
            line-height: 50px;
        }
        .toppic p{
            font-size: 20px;
            text-align: center;
            color: white;
            text-shadow: 2px 2px black;
            padding-top: 50px;
        }

        .login div{
            text-align: right;
            margin: 40px;
        }
        .login div div{
            margin: -10px;
        }
        .submit{
            width: 90px;
            background-color : #035d91;
            border-radius: 8px;
            color: white;
            padding: 5px;
        }

        .submitAddCart{
            display: block;
            text-align: center;
            text-decoration: none;
            background-color : #3793fb;
            border-radius: 8px;
            color: white;
            padding: 5px;
        }
        .submitAddCart:hover {
            background-color: #035d91;

        }
        .input{
            border-radius: 8px;
            padding: 5px;
            width: 100%;
            text-align: right;
        }
        .showContent
        {
            text-align: justify;
            font-size: 24px;
            direction: rtl;
            line-height: 40px;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
        }
        .link{
            text-decoration:none;
            color: black;
        }
        .blockContent div{
            display: none;
        }
        .blockContent:hover div{
            display: inline;
            position: relative;
            top: 100%;
            left: 25%;
            width: 50%;
        }
        .content *{
            font-size: 25px;
        }
        .content{
            display: none;
            list-style: none;
            margin: 10px;
        }
        .content ul{
            list-style: none;
        }
        .content ul li{
            background-color: white;
            margin-bottom: 10px;
            border-radius: 5px;
            padding: 20px;
        }
        .content ul li a{
            text-decoration: none;
            color: black;
        }
        .content li{
            padding: 5px;
        }
        .content ul li li{
            background-color: #a9afb5;
            border-radius: 5px;
            list-style: none;
            margin: 20px;
            padding: 20px;
        }
        .content ul ul{
            display: none;
            background-color: gray;
            list-style: none;
        }
        .content ul :hover ul{
            display: inline;

        }
        .content ul li ul li a{
            text-decoration: none;
            color: black;
        }

        .showBoxCourses{
            display: flex;
            justify-content: center;
            flex-wrap: wrap;

        }
        .boxCourse{
            background-color: white;
            margin: 20px;
            border-radius: 10px;
            border: 2px solid gray;

        }
        .submitCourse{
            background-color: #33b5e5;
            border-radius: 5px;
            padding: 5px;
            text-decoration: none;
            color: black;
            display: flex;
            justify-content: center;
            margin-top: 10px
        }
        .submitCourse:hover{
            background-color: #0099cc;
        }

        .blinking{     animation:blinkingText 2s infinite;
        }
        .textShowDetailCourse{
            direction: rtl;
            text-align: right;
            font-size: 30px;
            padding-top: 20px;
            font-size: 20px;
        }
        .con{
            display: flex;
            justify-content: center;
        }
        .showDetailLeft{

        }
        .mobile{

        }


        @keyframes blinkingText{     0%{     color: black;  }
            30%{    color: red; }
            60%{    color: yellow; }
            100%{   color: black;  } }



        @media only screen and (max-width:1320px){


        }


        @media only screen and (max-width:1086px){
            [class*="col-"]
            {
                float : left;
                padding : 15px;
            }
            .con
            {
                display: block;
            }


            [class*="col-"]{
                width : 100%;
            }
            .header{
                display: none;
            }
            .content
            {
                display: inline;
            }
            .header1{
                background-color : #3793fb;
                display: inline;
            }
            .educations{
                margin: 0px;
                display: inline;
                justify-content: center;
            }
            .educations div{
                margin: 10px 0px;
                background-color: #f1f4f7;
            }
            nav ul li a {
                padding: 4px 10px;
            }
            .login div{
                text-align: right;
                margin: 0px;
            }
            .login div div{
                margin: -10px;
            }
            .mobile *{

                font-size: 10px;
            }
        }
    </style>
</head>
<body onscroll="setPadding();" onresize="setLayer();">

<!-- نوار بالا مخصوص لپ تاپ-->
<div class="header col-12 headHight">

    <div style="width: 9%;float: left;padding-top: 40px" >
        <?php
        if(isset($_SESSION['productCount']) and $_SESSION['productCount']!=0 )
        {
            ?>
            <a href="showCart.php" class="submitCourse" style="float: right;background-color: #4caf50">سبد خرید <?php echo $_SESSION['productCount'] ?></a>
            <?php
        }
        ?>
    </div>

    <div class="h" style="width: 81%;float: left;padding-top: 50px">
        <nav>
            <ul>
                <?php
                if(isset($_SESSION["name"]))
                {
                    $connection = connect();
                    $result = selectInformation($connection,$_SESSION['id']);
                    $row = $result->fetch_assoc();
                    ?>
                    <li style="background-color: #33b5e5;border-radius: 5px;"><a href=""><?php
                            echo $row["name"];;
                            ?></a>
                        <ul>
                            <?php
                            if(selectAcces($connection,$_SESSION['id'])=='admin')
                            {
                                ?>
                                <li  style="background-color: yellow"><a href="addCurses.php">اضاف کردن دوره</a></li>
                                <li  style="background-color: yellow"><a href="addProfessor.php">اضاف کردن استاد</a></li>
                                <li  style="background-color: yellow"><a href="selectOptionExam.php">تنظیمات آزمون</a></li>
                                <?php
                            }
                            ?>
                            <li  style="background-color: white"><a href="showBuys.php">محصولات خریده شده</a></li>
                            <li  style="background-color: white"><a href="showExams.php">آزمون ها</a></li>
                            <li><a href="information.php">ویرایش اطلاعات</a></li>
                            <li style="background-color: #9c0000"><a href="logout.php">خروج</a></li>
                        </ul>
                    </li>
                    <?php
                }
                else{
                    ?>
                    <li style="background-color: #33b5e5;border-radius: 5px;"><a href="login.php">ورود/ثبت نام</a></li>
                    <?php
                }
                ?>
                <li><a href="index.php">خانه</a>
                    <ul>
                        <li><a href="home.php?id=1">نیازمندی های بازار کار مهندسی</a></li>
                        <li><a href="home.php?id=2">خلاءهای موجود در دانشگاه</a></li>
                        <li><a href="home.php?id=4">راهکارهایی جهت بهبود بازارکار <br>    رشته های مهندسی</a></li>
                        <li><a href="home.php?id=5"> آزمون های نظام مهندسی </a></li>
                    </ul>
                </li>
                <li><a href="">آموزش تخصصی نرم افزار</a>
                    <ul>
                        <li><a href="showCourses.php?id=6">رشته مهندسی معدن</a></li>
                        <li><a href="showCourses.php?id=7">رشته مهندسی برق</a></li>
                        <li><a href="showCourses.php?id=8">رشته مهندسی عمران</a></li>
                        <li><a href="showCourses.php?id=9">رشته مهندسی کامپیوتر</a></li>
                        <li><a href="showCourses.php?id=10">رشته مهندسی مکانیک</a></li>
                        <li><a href="showCourses.php?id=11">رشته مهندسی صنایع</a></li>
                        <li><a href="showCourses.php?id=12">رشته مهندسی مواد</a></li>
                        <li><a href="showCourses.php?id=13">رشته حسابداری</a></li>
                    </ul>
                </li>
                <li><a href="">آموزش دروس دانشگاه</a>
                    <ul>
                        <li><a href="showCourses.php?id=14">دروس عمومی رشته ها</a></li>
                        <li><a href="showCourses.php?id=15">دروس تخصصی رشته برق</a></li>
                        <li><a href="showCourses.php?id=16">دروس تخصصی رشته معدن</a></li>
                        <li><a href="showCourses.php?id=17">دروس تخصصی رشته مکانیک</a></li>
                        <li><a href="showCourses.php?id=18">دروس تخصصی رشته عمران</a></li>
                        <li><a href="showCourses.php?id=19">دروس تخصصی رشته کامپیوتر</a></li>
                        <li><a href="showCourses.php?id=20">دروس تخصصی رشته مهندسی صنایع</a></li>
                        <li><a href="showCourses.php?id=21">دروس تخصصی رشته مهندسی مواد</a></li>
                        <li><a href="showCourses.php?id=22">دروس تخصصی رشته حسابداری</a></li>
                        <li><a href="showCourses.php?id=23">دروس تخصصی رشته معماری</a></li>
                    </ul>
                </li>
                <li><a href="">مقاله و پایان نامه نویسی</a>
                    <ul>
                        <li><a href="showCourses.php?id=24">مقاله داخلی</a></li>
                        <li><a href="showCourses.php?id=25">مقاله ISI</a></li>
                        <li><a href="showCourses.php?id=26">پروپوزال نویسی</a></li>
                        <li><a href="showCourses.php?id=27">پایان نامه کارشناسی</a></li>
                        <li><a href="showCourses.php?id=28">پایان نامه ارشد</a></li>
                        <li><a href="showCourses.php?id=29">همانندجویی مقالات</a></li>
                    </ul>
                </li>
                <li><a href="">دوره های حضوری و آنلاین</a>
                    <ul>
                        <li><a href="showCourses.php?id=30">رشته برق</a></li>
                        <li><a href="showCourses.php?id=31">رشته معدن</a></li>
                        <li><a href="showCourses.php?id=32">رشته عمران</a></li>
                        <li><a href="showCourses.php?id=33">رشته کامپیوتر</a></li>
                        <li><a href="showCourses.php?id=34">رشته مکانیک</a></li>
                        <li><a href="showCourses.php?id=35">رشته صنایع</a></li>
                        <li><a href="showCourses.php?id=36">رشته مواد</a></li>
                        <li><a href="showCourses.php?id=37">رشته حسابداری</a></li>
                    </ul>
                </li>
                <li><a href="">دوره های عمومی</a>
                    <ul>
                        <li><a href="showCourses.php?id=38">دوره جامع آموزش Word</a></li>
                        <li><a href="showCourses.php?id=39">دوره جامع آموزش Power Point</a></li>
                        <li><a href="showCourses.php?id=40">دوره جامع آموزش فن بیان</a></li>
                        <li><a href="showCourses.php?id=41">دوره جامع آزمون های تافل و آیلتس</a></li>
                        <li><a href="showCourses.php?id=42">دوره جامع آموزش رزومه نویسی</a></li>
                        <li><a href="showCourses.php?id=43">دوره آموزش جامع و پیشرفته بورس</a></li>
                    </ul>
                </li>
                <li><a href="about.php">درباره ما</a></li>

            </ul>
        </nav>
    </div>

    <div style="width: 8%;float: left;padding-top: 10px" >
        <img src="logo/logo.png" height="110" width="110" style="float: right">
    </div>
    <div class="col-12" style="display: flex;justify-content: center">
        <form action="showSearch.php" method="get">
            <input type="submit" name="btnSearch" value="جست و جو" class="submit" style="background-color: #0099cc;border: none">
            <input type="text" name="searchText" style="border-radius: 5px;height: 30px;direction: rtl;">
        </form>
    </div>
    <?php
    if(isset($_SESSION["id"])) {
        if (selectAcces($con,$_SESSION['id'])=="admin"){
            ?>
            <div style="float: right;direction: rtl;padding: 20px">بازدید امروز: <?php echo $viweThisDay;?></div>
            <div style="float: right;direction: rtl;padding: 20px">بازدید کل:  <?php echo $viweAll;?></div>
            <?php
        }
    }
    ?>
</div>

<!-- نوار بالا مخصوص موبایل-->
<div class="header1 col-12">
    <div style="width: 20%;float: left;padding-top: 40px;" >
        <?php
        if(isset($_SESSION['productCount']) and $_SESSION['productCount']!=0 )
        {
            ?>
            <a href="showCart.php" class="submitCourse" style="float: right;margin-left: 10px;background-color: #4caf50;text-align: center">سبد خرید <?php echo $_SESSION['productCount'] ?></a>
            <?php
        }
        ?>
    </div>
    <div style="width: 60%;float: left;padding-top: 50px">
        <nav>
            <ul>
                <?php
                if(isset($_SESSION["name"]))
                {
                    $connection = connect();
                    $result = selectInformation($connection,$_SESSION['id']);
                    $row = $result->fetch_assoc();
                    ?>
                    <li style="background-color: #33b5e5;border-radius: 5px;"><a><?php
                            echo $row["name"];;
                            ?></a>
                        <ul>
                            <?php
                            if(selectAcces($connection,$_SESSION['id'])=='admin')
                            {
                                ?>
                                <li  style="background-color: yellow"><a href="addCurses.php">اضاف کردن دوره</a></li>
                                <li  style="background-color: yellow"><a href="addProfessor.php">اضاف کردن استاد</a></li>
                                <li  style="background-color: yellow"><a href="selectOptionExam.php">تنظیمات آزمون</a></li>
                                <li  style="background-color: white"><a href="showExams.php">آزمون ها</a></li>
                                <?php
                            }
                            ?>
                            <li  style="background-color: white"><a href="showBuys.php">محصولات خریده شده</a></li>
                            <li><a href="information.php">ویرایش اطلاعات</a></li>
                            <li style="background-color: #9c0000"><a href="logout.php">خروج</a></li>
                        </ul>
                    </li>
                    <?php
                }
                else{
                    ?>
                    <li style="background-color: #33b5e5;border-radius: 5px;"><a href="login.php">ورود/ثبت نام</a></li>
                    <?php
                }
                ?>
                <li><a href="index.php">خانه</a></li>
                <li><a href="about.php">درباره ما</a></li>
            </ul>
        </nav>
    </div>

    <div style="width: 5%;float: left;display: flex; justify-content: center;padding-top: 10px;padding-left: 30px" >
        <img src="logo/logo.png" height="90" width="90" >
    </div>
    <div class="col-12" style="display: flex;justify-content: center">
        <form action="showSearch.php" method="get">
            <input type="submit" name="btnSearch" value="جست و جو" class="submit" style="background-color: #0099cc;border: none">
            <input type="text" name="searchText" style="border-radius: 5px;height: 30px;direction: rtl;">
        </form>
    </div>
    <?php
    if(isset($_SESSION["id"])) {
        if (selectAcces($con,$_SESSION['id'])=="admin"){
            ?>
            <div style="float: right;direction: rtl;padding: 20px">بازدید امروز: <?php echo $viweThisDay;?></div>
            <div style="float: right;direction: rtl;padding: 20px">بازدید کل:  <?php echo $viweAll;?></div>
            <?php
        }
    }
    ?>
</div>


<div class="row"></div>
<!----------------------- header ---------- -->
