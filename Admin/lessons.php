<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include "admininclude/header.php";
    include "../dbConnection.php";
    
    if(!isset($_SESSION['is_AdminLogin'])){
        echo '<script>window.location.href="../index.php"</script>';
    }    
?>

<div class="col-sm-9 mt-5 mx-3">
    <form action="" method="GET" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Course ID:</label>
            <input type="text" class="form-control ml-3" id="checkid" name="checkid">
        </div>
        <button type="submit" name="search" class="btn btn-danger">Search</button>
    </form>
<?php
    $sql="SELECT course_id FROM course";
    $flag;
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()){
        if(isset($_REQUEST['checkid']) && $_REQUEST['checkid']==$row['course_id']){
            $sql="SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if(($row['course_id'])==$_REQUEST['checkid']){
                $_SESSION['course_id'] = $row['course_id'];
                $_SESSION['course_name'] = $row['course_name'];
?>
            <h3 class="mt-5 bg-dark text-white p-2">Course ID: <?php if(isset($row['course_id'])){
                $flag=true;echo $row['course_id']; } ?>Course name: <?php if(isset($row['course_name'])){ echo $row['course_name']; } ?></h3>            
            <?php }
                $checkid=$_REQUEST['checkid'];
                $sql = "SELECT * FROM lesson WHERE course_id=$checkid";
                $result = $conn->query($sql);
            ?>
        <table class="table">
            <tr>
                <td>Lesson ID</td>
                <td>Lesson Name</td>
                <td>Lesson Link</td>
                <td>Action</td>
            </tr>  
            <?php while($data=$result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $data['lesson_id']; ?></td>
                <td><?php echo $data['lesson_name']; ?></td>
                <td><?php echo $data['lesson_link']; ?></td>
                <td class="form-inline pull-left">
                    <form method="POST" action="updateLesson.php" class="mr-3">
                        <input type="hidden" value="<?php echo $data['lesson_id']; ?>" name="lesson_id">
                        <button name='update' class="btn btn-info"><i class="fas fa-pen"></i></button>
                    </form>
                    <form method="POST" action="">
                        <input type="hidden" value="<?php echo $data['lesson_id']; ?>" name="lesson_id">
                        <button type="submit" name="submit" class="btn btn-secondary"><i class="far fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr> 
            <?php } ?>  
        </table>
        <?php }
    }
    
?>
</div>
<div>
<?php
    if(isset($flag)){ ?>
        <a href="./addLesson.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a></div>
        <?php
    }
    if(isset($_POST['submit'])){
        $sql="DELETE FROM lesson WHERE lesson_id=".$_POST['lesson_id'];
        $conn->query($sql); ?>
        <meta http-equiv="refresh" content="0">
<?php
    }
    ?>
