<?php
require_once "config.php";
require_once "validation.php";
$con=connect();
if(userlogin()&&buyThisCourse($con,$_SESSION['id'],$_GET['id']))
{
?>

<div class="col-12">
        <table style="width:100%;direction: ltr;text-align: center;">
            <th style="border: 1px solid black;border-collapse: collapse;">قسمت</th>
            <th style="border: 1px solid black;border-collapse: collapse;">حجم فایل</th>
            <?php
            $id=$_GET['id'];
            $part=1;
            $filename=$part.'.rar';
            while (is_file("amozesh/$id/$filename"))
            {
            ?>
            <tr style="border: 1px solid black;border-collapse: collapse;">
                <th style="border: 1px solid black;border-collapse: collapse;"><a href="download.php?id=<?php echo $id;?>&part=<?php echo $part;?>&type=rar">part<?php echo $part?></a></th>
                <th style="border: 1px solid black;border-collapse: collapse;"><?php echo round(filesize("amozesh/$id/$filename")/1024/1024,0)." MB"?></a></th>
            </tr>
            <?php
                $part++;
                $filename=$part.'.rar';
            }

            $id=$_GET['id'];
            $part=1;
            $filename=$part.'.pdf';
            while (is_file("amozesh/$id/$filename"))
            {
                ?>
                <tr style="border: 1px solid black;border-collapse: collapse;">
                    <th style="border: 1px solid black;border-collapse: collapse;"><a href="download.php?id=<?php echo $id;?>&part=<?php echo $part;?>&type=pdf">part<?php echo $part." pdf"?></a></th>
                    <th style="border: 1px solid black;border-collapse: collapse;"><?php echo round(filesize("amozesh/$id/$filename")/1024/1024,0)." MB"?></a></th>
                </tr>
                <?php
                $part++;
                $filename=$part.'.pdf';
            }

            ?>
        </table>
    </div>
<?php
}
else{
    $direct="<script type='text/javascript'>window.location.href='index.php'</script>";
    echo $direct;
}