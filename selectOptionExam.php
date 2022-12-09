<?php
require_once "header.php";
?>

<div class="col-12" style="display: flex;justify-content: center">
    <div class="col-10" style="background-color: white;border-radius: 10px">
        <div class="col-4" style="display: flex;justify-content: center;float: right">
            <a href="addExam.php" class="submitCourse">ایجاد آزمون جدید</a>
        </div>
        <div class="col-4" style="display: flex;justify-content: center;float: right">
            <a href="showAllExam.php" class="submitCourse">ویرایش آزمون</a>
        </div>
        <div class="col-4" style="display: flex;justify-content: center;float: right">
            <a href="addStudentInExam.php" class="submitCourse">فعال کردن آزمون برای کاربر</a>
        </div>
    </div>
</div>
<?php
require_once "footer.php";
?>
