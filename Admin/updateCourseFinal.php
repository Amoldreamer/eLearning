<?php
    include "../dbConnection.php";

   if(isset($_POST['courseSubmitBtn'])){
        $id = $_POST['id'];
        $course_name = $conn->real_escape_string($_REQUEST['course_name']);
        $course_desc = $conn->real_escape_string($_REQUEST['course_desc']);
        $course_author = $conn->real_escape_string($_REQUEST['course_author']);
        $course_duration = $conn->real_escape_string($_REQUEST['course_duration']);
        $course_original_price = $conn->real_escape_string($_REQUEST['course_original_price']);
        $course_price = $conn->real_escape_string($_REQUEST['course_price']);
        
        $course_img = '../image/courseimages/'.$_FILES['course_img']['name'];
        $sql = "UPDATE course SET course_name='$course_name',course_desc='$course_desc',
                course_author='$course_author',course_img='$course_img',course_duration='$course_duration',
                course_price='$course_price',course_original_price='$course_original_price' WHERE course_id ='$id'";
        
        $result=$conn->query($sql);
        if($result){
            $msg='Database Updated';
            header("Location:courses.php?msg=".$msg);
            exit();
        }
    }