<?php
    include '../dbConnection.php';
    $id = $_GET['id'];

    $sql = "DELETE FROM student WHERE stu_id = '$id'";
    if($conn->query($sql)){
        $msg = "Student record deleted";
        header("Location:students.php?msg=".$msg);
        exit();
    };

    