<?php
    include "../dbConnection.php";

   if(isset($_POST['studentSubmitBtn'])){
        $id = $_POST['id'];
        $student_name = $conn->real_escape_string($_REQUEST['student_name']);
        $student_email = $conn->real_escape_string($_REQUEST['student_email']);
        $student_password = $conn->real_escape_string($_REQUEST['student_password']);
        
        $sql = "UPDATE student SET stu_name='$student_name',stu_email='$student_email',
                stu_pass='$student_password' WHERE stu_id ='$id'";
        
        $result=$conn->query($sql);
        if($result){
            $msg='Database Updated';
            header("Location:students.php?msg=".$msg);
            exit();
        }
    }