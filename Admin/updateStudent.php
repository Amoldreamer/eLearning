<?php
    include "admininclude/header.php";
    include "../dbConnection.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['is_AdminLogin'])){
        echo '<script>window.location.href="../index.php"</script>';
    }

    if(isset($_POST['student_id'])){
        $id = $_POST['student_id'];
    
        $sql="SELECT * FROM student WHERE stu_id='$id'";
        $result = $conn->query($sql);
        if($result){
            $data = $result->fetch_assoc();
        }
    }
    
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Student</h3>
    <form action="updateStudentFinal.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input value="<?php echo $data['stu_name']; ?>" type="text" class="form-control" id="student_name" name="student_name">
        </div>
        <div class="form-group">
            <label for="student_email">Student Email</label>
            <input value="<?php echo $data['stu_email']; ?>" name="student_email" id="student_email" row=2 class="form-control"/>
        </div>
        <div class="form-group">
            <label for="student_password">Student Password</label>
            <input type="text" name="student_password" class="form-control" id="student_password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="studentSubmitBtn" name="studentSubmitBtn">Update</button>
            <a href="students.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>