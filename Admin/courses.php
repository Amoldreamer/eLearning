<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include "admininclude/header.php";
    include "../dbConnection.php";
    
    if(!isset($_SESSION['is_AdminLogin'])){
        echo '<script>window.location.href="../index.php"</script>';
    }

    $sql = "SELECT * FROM course";
    $result=$conn->query($sql);

?>
<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-2">List of Courses</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Course ID</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if($result->num_rows>0){
                while($data =$result->fetch_assoc()){ ?>
            <tr>                
                <td><?php echo $data['course_id']; ?></td>
                <th scope="row"><?php echo $data['course_name']; ?></th>
                <td scope="row"><?php echo $data['course_author']; ?></td>
                <td><?php
                        echo '<form method=POST action=updateCourse.php class=d-inline>
                        <input type="hidden" name="course_id" value="'.$data['course_id'].'"/>
                        <button
                        type="submit"
                        class="btn btn-info mr-3"
                        name="view"
                        value="View"
                        >
                        <i class="fas fa-pen"></i>
                    </button></form>';
                    ?>
                    
                    <a href="deleteCourse.php?id=<?php echo $data['course_id']; ?>"><button
                        type="submit"
                        class="btn btn-secondary"
                        name="delete"
                        value="Delete"
                    >
                        <i class="far fa-trash-alt"></i>
                    </button></a>
                </td>
            </tr>
            <?php   }
                    }
                ?>
        </tbody>
    </table>
    <?php
        if(isset($_GET['msg'])){
            echo '<p class="alert alert-success text-center">'.$_GET['msg'].'</p>';
        }
        ?>
</div>
</div>
<!-- div Row close from header -->
<div>
    <a href="addcourse.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div>
</body>
</html>