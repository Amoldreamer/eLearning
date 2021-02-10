<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include "admininclude/header.php";
    include "../dbConnection.php";
    
    if(!isset($_SESSION['is_AdminLogin'])){
        echo '<script>window.location.href="../index.php"</script>';
    }

    if(isset($_POST['course_id'])){
        $id = $_POST['course_id'];
    
        $sql="SELECT * FROM course WHERE course_id='$id'";
        $result = $conn->query($sql);
        if($result){
            $data = $result->fetch_assoc();
        }
    }
    
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Course</h3>
    <form action="updateCourseFinal.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input value="<?php echo $data['course_name']; ?>" type="text" class="form-control" id="course_name" name="course_name">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label>
            <textarea name="course_desc" id="course_desc" row=2 class="form-control"><?php echo $data['course_desc']; ?>"</textarea>
        </div>
        <div class="form-group">
            <label for="course_author">Author</label>
            <input value="<?php echo $data['course_author']; ?>" type="text" name="course_author" class="form-control" id="course_author">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label>
            <input value="<?php echo $data['course_duration']; ?>" type="text" name="course_duration" class="form-control" id="course_duration">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label>
            <input value="<?php echo $data['course_original_price']; ?>" type="text" name="course_original_price" class="form-control" id="course_original_price">
        </div>
        <div class="form-group">
            <label for="course_price">Course Selling Price</label>
            <input value="<?php echo $data['course_price']; ?>" type="text" name="course_price" class="form-control" id="course_price">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label>
            <img src="<?php echo $data['course_img']; ?>" class="img-thumbnail" alt="">
            <input type="file" name="course_img" class="form-control-file" id="course_img">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="courseSubmitBtn" name="courseSubmitBtn">Update</button>
            <a href="courses.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>