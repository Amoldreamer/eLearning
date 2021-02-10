<?php
if(!isset($_SESSION)){
    session_start();
}
include('./stuInclude/header.php');
include_once('../dbConnection.php');

if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogEmail'];
}else{
    echo "<script>location.href='./index.php';</script>";
}

if(isset($_REQUEST['stuPassUpdateBtn'])){
    if(($_REQUEST['stuNewPass'] == "")){
        // msg displayed if required field missing
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    }else{
        $sql="SELECT * FROM student WHERE stu_email='$stuEmail'";
        $result = $conn->query($sql);
        if($result->num_rows==1){
            $stuPass = $_REQUEST['stuNewPass'];
            $sql="UPDATE student SET stu_pass = '$stuPass' WHERE stu_email = '$stuEmail'";
            if($conn->query($sql) == TRUE){
                // Below msg display on form submit success
                $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
            }else{
                $passmsg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to update</div>';
            }
        }
    }
}
?>

<div class="offset-sm-3 col-sm-6" style="margin-top:-450px;">
            <form method="POST" class="mt-5 mx-5">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $stuEmail ?>"readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label>
                    <input type="password" name="stuNewPass" class="form-control" id="inputnewpassword" placeholder="New Password">
                </div>
                <button class="btn btn-primary mr-4 mt-4" type="submit" name="stuPassUpdateBtn">Update</button>
                <button class="btn btn-secondary mt-4" type="reset" name="stuPassUpdateBtn">Reset</button>
                <?php if(isset($passmsg)) {echo $passmsg;} ?>
            </form>
</div>
</div><!-- Close Row Div from header file -->
<?php
include('./stuInclude/footer.php');
?>