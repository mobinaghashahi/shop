
<?php
require_once "header.php";
if(empty($_GET))
{
    echo "<script type='text/javascript'>window.location.href='index.php'</script>";
}
$con=connect();
$row = selectGroup($con,$_GET['id']);
$res=$row->fetch_assoc();
if(empty($res['name']))
{
    echo "<script type='text/javascript'>window.location.href='404.php'</script>";
}
?>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <h2 class="showContent" style="text-align: center">
               <?php
               echo $res['name'];
               ?>
            </h2>
        </div>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <p class="showContent">
                <?php
                    echo $res['describtion'];
                ?>
            </p>
        </div>
        <div class="col-2"></div>
    </div>


<?php
require_once "footer.php";
