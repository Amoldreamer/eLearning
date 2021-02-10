<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include "admininclude/header.php";
    include "../dbConnection.php";

    if(isset($_POST['update'])){
        $sql="SELECT * FROM lesson WHERE lesson_id=".$_POST['lesson_id'];
        $result=$conn->query($sql);
    }
    
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Lesson</h3>
    <form action="updateLessonFinal.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" class="form-control" id="course_id" name="course_id" 
            value="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];}?>" readonly>
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" class="form-control" id="course_name" name="course_name"
            value="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];}?>"readonly>
        </div>
    <?php
    if($result->num_rows > 0){ 
        while($data=$result->fetch_assoc()){
    ?>
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label>
            <input type="text" value="<?php echo $data['lesson_name'] ?>" class="form-control" id="lesson_name" name="lesson_name">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label>
            <textarea type="text" class="form-control" id="lesson_desc" name="lesson_desc"><?php echo $data['lesson_desc'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Video Link</label>
            <video src="<?php echo $data['lesson_link'] ?>" class="img-thumbnail"></video>
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link">
        </div>        
        <input type="hidden" name="lesson_id" value="<?php echo $data['lesson_id']; ?>">
    <?php
    } }?>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="lessonSubmitBtn"
            name="updateLesson">Update</button>
            <a href="lessons.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg;} ?>
    </form>
</div>