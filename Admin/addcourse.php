<?php
    include "admininclude/header.php";
    include "../dbConnection.php";
    if(!isset($_SESSION)){
        session_start();
    }
    if(!isset($_SESSION['is_AdminLogin'])){
        echo '<script>window.location.href="../index.php"</script>';
    }

    if(isset($_POST['courseSubmitBtn'])){
        if($_REQUEST['course_name']=="" || $_REQUEST['course_desc']=="" || $_REQUEST['course_author']=="" ||
         $_REQUEST['course_duration']=="" || $_REQUEST['course_original_price']=="" || $_REQUEST['course_price']==""){
              $msg= '<p class="alert alert-danger text-center mt-5">Please Fill In All The Fields</p>';
          };

          $course_name = $conn->real_escape_string($_REQUEST['course_name']);
          $course_desc = $conn->real_escape_string($_REQUEST['course_desc']);
          $course_author = $conn->real_escape_string($_REQUEST['course_author']);
          $course_duration = $conn->real_escape_string($_REQUEST['course_duration']);
          $course_original_price = $conn->real_escape_string($_REQUEST['course_original_price']);
          $course_price = $conn->real_escape_string($_REQUEST['course_price']);
          $courseName = $_FILES['course_img']['name'];
          $courseTmpName = $_FILES['course_img']['tmp_name'];
          $imageFolder = '../image/courseimages/'.$courseName;
          move_uploaded_file($courseTmpName,$imageFolder);

          $sql = "INSERT INTO course (course_name, course_desc,course_author,course_img, course_duration,
                    course_price, course_original_price) VALUES ('$course_name','$course_desc','$course_author',
                    '$imageFolder','$course_duration','$course_price','$course_original_price')";

        if($conn->query($sql)==TRUE){
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Course added successfully</div>';
        }else{
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2">Unable to Add Course</div>';
        }
    }
?>
<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Course</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea name="course_desc" id="course_desc" row=2 class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input type="text" name="course_author" class="form-control" id="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input type="text" name="course_duration" class="form-control" id="course_duration">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input type="text" name="course_original_price" class="form-control" id="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input type="text" name="course_price" class="form-control" id="course_price">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <input type="file" name="course_img" class="form-control-file" id="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Submit</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg))
        { 
            echo $msg; 
        } 
        ?>
    </form>
</div>