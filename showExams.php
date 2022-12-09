<?php
require_once "header.php";
if(!userlogin())
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}
$id=$_SESSION['id'];
$con=connect();
$res=selectExams($con,$id);


?>
    <div class="col-12 mobile">
        <table style="width:100%">
            <tr>
                <?php
                if($res->num_rows!=0)
                {
                    ?>
                    <th style="font-size: 30px">آزمون</th>
                    <th style="font-size: 15px">شروع آزمون</th>
                    <th style="font-size: 15px">پایان آزمون</th>
                    <th style="font-size: 15px">درصد آزمون</th>
                    <?php
                }else{
                    ?>
                    <th style="text-align: center">هنوز هیچ آزمونی خریداره نشده است.</th>
                    <?php
                } ?>

            </tr>
            <?php
            for ($i=0;$i<$res->num_rows;$i++){
                $row=$res->fetch_assoc();
                ?>
                <tr>

                    <th><?php echo toEnglishNumber($row['name'],16)?></th>
                    <th style="text-align: right;direction: ltr "> <?php echo $row['startDate']?></th>
                    <th style="text-align: right;direction: ltr"> <?php echo $row['endDate']?></th>
                    <?php
                    $state = dateOfExam($row['endDate'],$row['startDate']);
                    ?>
                    <th>
                        <?php
                        //حالت 2 یعنی آزمون برگزار شده و حالت 1 یعنی در حال برگزاری است
                        if($row['state']==2)
                        {?>
                            <a  class="submitCourse" style="direction: ltr"> %   <?php echo $row['score']?></a>
                        <?php
                        }
                        else if($state==1){
                        ?>
                            <a href="exam.php?id=<?php echo $row['id']?>" class="submitCourse" style="width: 70px"> شروع</a>

                            <?php
                        }
                        else if($state==2){
                        ?>
زمان آزمون گذشته است
                            <?php
                        }
                        else if($state==0){
                            ?>
آزمون هنوز شروع نشده است
                        <?php }?>
                    </th>
                </tr>
            <?php } ?>
        </table>
    </div>

<?php
require_once "footer.php";