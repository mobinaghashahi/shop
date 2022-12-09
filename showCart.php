<?php
require_once "header.php";
$con=connect();
$sumPrice=0;
?>
    <div class="col-12">
        <table style="width:100%">
            <tr>
                <th>آموزش</th>
                <th>هزینه</th>
            </tr>
            <?php
for($i=$_SESSION['productCount'];$i>0;$i--){
    $rew[$i]=selectCourseInCart($con,$_SESSION[creatIndex($i)]);
    $row=$rew[$i]->fetch_assoc();
    ?>


            <tr>
                <th><?php echo toEnglishNumber($row['nameCourse'],16)?></th>
                <th><?php echo $row['price']?></th>
                <th><a href="deleteInCart.php?id=<?php echo $_SESSION[creatIndex($i)]?>"><img src="logo/delete.png" width="10" height="10"></a> </th>
            </tr>


    <?php

    $sumPrice+=$row['price'];
   /* echo creatIndex($i);
    echo "<pre>";
    var_dump($row);
    echo "</pre>"; */
}
?>
            <tr>
                <th>جمع کل</th>
                <th><?php echo $sumPrice?></th>
            </tr>
        </table>
        <?php

        if(isset($_SESSION['id'])&&$_SESSION['id']!=0)
        {
        ?>
        <a href="pay/send.php?price=<?php echo $sumPrice?>" class="submit" style="float: right;width: 100px;text-decoration: none"> نهای کردن خرید </a>
  <?php
  }
        else
        {
            ?>
            <a href="login.php" class="submit" style="float: right;width: 100px;text-decoration: none">وارد سایت شوید </a>
        <?php }?>

    </div>
<?php
require_once "footer.php";