<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include('./stuInclude/header.php');
    include_once('../dbConnection.php');

    if(isset($_SESSION['is_login'])){
        $stuEmail = $_SESSION['stuLogEmail'];
    }else{
        echo "<script>location.href='../index.php';</script>";
    }

    $sql="SELECT * FROM student WHERE stu_email = '$stuEmail'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $row = $result->fetch_assoc();
        $stuId = $row["stu_id"];
    }

    if(isset($_REQUEST['submitFeedbackBtn'])){
        if(($_REQUEST['f_content'] == "")){
            // msg displayed if required field missing
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill all Fields</div>';
        }else{
            $fcontent = $conn->real_escape_string($_REQUEST["f_content"]);
            $sql = "INSERT INTO feedback(f_content,stu_id) VALUES('$fcontent','$stuId')";
            if($conn->query($sql) == TRUE){
                //below msg display on form submit success
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Submitted Successfully</div>';
            }
        }
    }
    ?>
    <div class="offset-sm-3 col-sm-6 " style="margin-top:-450px;">
        <form method="POST" class="mx-5" enctype="multipart/form-data">
            <div class="form-group">
                <label for="stuId">Student ID</label>
                <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if(isset($stuId)) {echo $stuId;} ?>" readonly>
            </div>
            <div class="form-group">
                <label for="f-content">Write Feedback</label>
                <textarea name="f_content" id="f_content" rows="2" class="form-control"></textarea>
            </div>
            <button type="submit" name="submitFeedbackBtn" class="btn btn-primary">Submit</button>
            <?php if(isset($passmsg)) {echo $passmsg;} ?>
        </form>
    </div>
</div><!-- Close row div from header file -->

<?php
 include('./stuInclude/footer.php');
 ?>