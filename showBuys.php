<?php
require_once "header.php";
if(!userlogin())
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}
$id=$_SESSION['id'];
$con=connect();
$res=selectBuys($con,$id);


?>
    <div class="col-12">
        <table style="width:100%">
            <tr>
                <?php
                if($res->num_rows!=0)
                {
                ?>
                <th style="font-size: 30px">آموزش های خریداری شده</th>
                <?php
                }else{
                    ?>
                    <th style="text-align: center">هنوز هیچ آموزشی خریداره نشده است.</th>
                <?php
                } ?>
            </tr>
            <?php
            for ($i=0;$i<$res->num_rows;$i++){
                $row=$res->fetch_assoc();
            ?>
            <tr>
                <th><?php echo toEnglishNumber($row['name'],16)?></th>
                <th><a href="showPartsDownload.php?id=<?php echo $row['id']  ?>"><img src="logo/download.png" width="20" height="20"></a> </th>
            </tr>
            <?php } ?>
        </table>
    </div>

<?php
require_once "footer.php";