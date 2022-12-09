<?php
require_once "header.php";
require_once "config.php";
$con=connect();
if(selectAcces($con, $_SESSION["id"])!="admin"||empty($_SESSION["id"]))
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}

?>
    <form method="post" action="examChange.php">
        <div class="col-12" style="display:flex;justify-content: center;direction: rtl;background-color: gray">
            <p style="font-size: 20px">آزمون&nbsp;&nbsp;&nbsp;</p>
            <select name="idExam" >
                <?php
                $con=connect();
                $res=selectAllExam($con);
                for($i=0;$i<$res->num_rows;$i++)
                {
                    $grayeshInfo=$res->fetch_assoc();
                    ?>
                    <option value="<?php echo $grayeshInfo['id'];?>"><?php echo $grayeshInfo['name'];?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-12" style="display: flex;justify-content: center">
            <div class="col-12" style="background-color: white;border-radius: 10px;display: flex;justify-content: center">
                <table style="width: 100%;">
                    <?php
                    $res=selectAllUsers($con);
                    for($i=1;$i<=$res->num_rows;$i++)
                    {
                        $row=$res->fetch_assoc();
                        ?>

                        <tr>
                            <th>
                                <?php
                                echo $i;
                                ?>
                            </th>
                            <th>
                                <?php
                                echo $row['name']." ".$row['family'];
                                ?>
                            </th>
                            <th>
                                <input type="checkbox" value="<?php echo $row['id'];?>" name="<?php echo $row['id'];?>">
                            </th>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="col-12">
            <input style="float: right;margin-left: 20px" class="submit" name="choiceStudent" type="submit" value="اضاف کردن">
            <input style="float: right;background-color: #a70101" class="submit" name="choiceStudent" type="submit" value="حذف کردن">
        </div>
    </form>


<?php
require_once "footer.php";
