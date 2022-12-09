<?php
require_once "config.php";
require_once "validation.php";


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


$filename = $id.'.pdf';

if(is_null($filename)) {
    http_response_code(404);
    die('File not found!');
}
$id=substr($id,0,strpos($id,"_"));
?>

    <a href="exam.php?id=<?php echo $id; ?>">بازگشت</a>
<?php
$direct="<script type='text/javascript'>window.location.href='/azmon/$filename'</script>";
echo $direct;

