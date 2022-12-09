<?php
require_once "../config.php";
include_once("functions.php");
$api = 'test';
$token = $_GET['token'];
$result = json_decode(verify($api,$token));
$con=connect();
exiteToken($con,$token);
if(isset($result->status)){
    if($result->status == 1&&!exiteToken($con,$token)){
        echo "<h1>تراکنش با موفقیت انجام شد</h1>";
        for($i=$_SESSION['productCount'];$i>0;$i--) {
            date_default_timezone_set("Iran");
            $date = gregorian_to_jalali(date("Y"),date("m"),date("d"),' / ');
            insertBuy($con,$date, $token, $_SESSION['id'],$_SESSION[creatIndex($i)]);
            unset($_SESSION[creatIndex($i)]);
        }
        unset($_SESSION['productCount']);
    } else {
       // echo gregorian_to_jalali(date("Y"),date("m"),date("d"),' / ');
        echo "<h1>تراکنش با خطا مواجه شد</h1>";
    }
} else {
    if($_GET['status'] == 0){
        echo "<h1>تراکنش با خطا مواجه شد</h1>";
    }
}
?>
    <a href="../../index.php">بازگشت به سایت</a>
<?php
