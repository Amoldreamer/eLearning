<?php
    include "admininclude/header.php";
    include "../dbConnection.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['is_AdminLogin'])){
        echo '<script>window.location.href="../index.php"</script>';
    }

    if(isset($_POST['studentSubmitBtn'])){
        if($_REQUEST['student_name']==""|| $_REQUEST['student_email']=="" ||
         $_REQUEST['student_password']==""){
              $msg= '<p class="alert alert-danger text-center mt-5">Please Fill In All The Fields</p>';
          };

          $student_name = $conn->real_escape_string($_REQUEST['student_name']);
          $student_email = $conn->real_escape_string($_REQUEST['student_email']);
          $student_password = $conn->real_escape_string($_REQUEST['student_password']);

          $sql = "INSERT INTO student (stu_name, stu_email,stu_pass) VALUES ('$student_name','$student_email','$student_password')";

        if($conn->query($sql)==TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Student added successfully</div>';
        }else{
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Unable to Add Student</div>';
        }
    }
?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" class="form-control" id="student_name" name="student_name">
        </div>
        <div class="form-group">
            <label for="student_email">Student Email</label>
            <input name="student_email" id="student_email" row=2 class="form-control" />
        </div>
        <div class="form-group">
            <label for="student_password">Student Password</label>
            <input type="password" name="student_password" class="form-control" id="student_password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="studentSubmitBtn" name="studentSubmitBtn">Submit</button>
        </div>
        <?php if(isset($msg))
        { 
            echo $msg; 
        } 
        ?>
    </form>
</div>