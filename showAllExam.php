<?php
require_once "header.php";

$con=connect();
$res=selectAllExam($con);
?>
<div class="col-12" style="display: flex;justify-content: center">
    <div class="col-12" style="background-color: white;border-radius: 10px;display: flex;justify-content: center">
        <table style="width: 100%;">
            <?php
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
                    echo $row['name'];
                    ?>
                </th>
                <th>
                    <a href="examChange.php?command=edit&idExam=<?php echo $row['id']?>"><img src="logo/edit.png" width="30" height="30"></a>
                </th>
                <th>
                    <a href="examChange.php?command=delete&idExam=<?php echo $row['id']?>"><img src="logo/delete.png" width="20" height="20"></a>
                </th>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<?php
require_once "footer.php";
?>
