<?php
include "../dbConnection.php";

if(isset($_POST['updateLesson'])){
    $lesson_name=$_POST['lesson_name'];
    $lesson_desc=$_POST['lesson_desc'];
    $lesson_id=$_POST['lesson_id'];
    $sql="UPDATE `lesson` SET `lesson_name`='$lesson_name',`lesson_desc`='$lesson_desc' WHERE lesson_id='$lesson_id'";
    $result=$conn->query($sql);

    header("Location:lessons.php");
}