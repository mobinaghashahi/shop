<?php
require_once "jdf.php";
function toEnglishNumber($res,$fontSize)
{
    $arr = array("0","1","2","3","4","5","6","7","8","9");
    for ($j = 0; $j <= 9; $j++) {
        $r = '<span style="font-family: Arial;font-size:'. $fontSize.'px">' . $arr[$j] . '</span>';
        $nameCours = str_replace($arr[$j], $r, $res, $count);
        if ($count != 0)
            break;
    }
    return $nameCours;
}
dateOfExam("1399/10/30","1399/9/10");
function dateOfExam($endDate,$startDate){
    date_default_timezone_set("Iran");
    $todayDate= gregorian_to_jalali(date("Y"),date("m"),date("d"),' / ');
    $firstSlash=strpos($todayDate,"/");
    $yaerToday=substr($todayDate,0,$firstSlash-1);
    //echo "year=".$yaerToday."/";
    $secondSlash= strpos($todayDate,"/",$firstSlash+1);
    $monthToday=substr($todayDate,$firstSlash+2,$secondSlash-$firstSlash-3);
   // echo $monthToday."/";
    $dayToday=substr($todayDate,$secondSlash+2);
    //echo $dayToday;

    //بدست آوردن تاریخ پایان و جدا کردن روز و ماه و سال از یک دیگر
    $firstSlash=strpos($endDate,"/");
    $yaerEnd=substr($endDate,0,$firstSlash);
    //echo "year=".$yaerEnd."s";
    $secondSlash= strpos($endDate,"/",$firstSlash);
    $monthEnd=substr($endDate,$firstSlash+1,$secondSlash-$firstSlash-3);
    //echo $monthEnd."s";
    $dayEnd=substr($endDate,$secondSlash+4);
    //echo $dayEnd;


    //بدست آوردن تاریخ شروع و جدا کردن روز و ماه و سال از یک دیگر
    $firstSlash=strpos($startDate,"/");
    $yaerStart=substr($startDate,0,$firstSlash);
    //echo "year=".$yaerStart."/";
    $secondSlash= strpos($startDate,"/",$firstSlash);
    $monthStart=substr($startDate,$firstSlash+1,$secondSlash-$firstSlash-3);
    //echo $monthStart."/";
    $dayStart=substr($startDate,$secondSlash+4);
    //echo $dayStart;
    //echo "yaerToday=".$yaerToday."|yaerStart".$yaerStart."|monthToday=".$monthToday."|monthStart".$monthStart;
    if($yaerToday<$yaerStart)
        return 0;
    if($yaerToday>$yaerEnd)
        return 2;
    if($monthToday<$monthStart)
        return 0;
    if ($monthToday>$monthEnd)
        return 2;
    if($dayToday<$dayStart)
        return 1;
    if($dayToday>$dayEnd)
        return 2;
    return 1;


}


function separateAnswer($ans)
{
    $answerSend=array();
    for($i=1;$i<=count($ans)-2;$i++)
    {
        $answerSend["$i"]=current($ans);
        next($ans);
    }
    return $answerSend;
}

//بدست آوردن اختلاف بین دو زمان
function GetTimeDifference($time1,$time2)
{
    $time["min"]=floor(($time1-$time2)/60);
    $time["sec"]=((($time1-$time2)/60)-floor(($time1-$time2)/60))*60;
    return $time;
}

