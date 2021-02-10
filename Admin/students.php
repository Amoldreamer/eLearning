<?php
    if(!isset($_SESSION)){
        session_start();
    }
    include "admininclude/header.php";
    include "../dbConnection.php";
    
    if(!isset($_SESSION['is_AdminLogin'])){
        echo '<script>window.location.href="../index.php"</script>';
    }

    $sql = "SELECT * FROM student";
    $result=$conn->query($sql);

?>
<div class="col-sm-9 mt-5">
    <!-- Table -->
    <p class="bg-dark text-white p-2">List of Student</p>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Student ID</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            if($result->num_rows>0){
                while($data =$result->fetch_assoc()){ ?>
            <tr>                
                <td><?php echo $data['stu_id']; ?></td>
                <th scope="row"><?php echo $data['stu_name']; ?></th>
                <td scope="row"><?php echo $data['stu_email']; ?></td>
                <td><?php
                        echo '<form method=POST action=updateStudent.php class=d-inline>
                        <input type="hidden" name="student_id" value="'.$data['stu_id'].'"/>
                        <button
                        type="submit"
                        class="btn btn-info mr-3"
                        name="view"
                        value="View"
                        >
                        <i class="fas fa-pen"></i>
                    </button></form>';
                    ?>
                    
                    <a href="deleteStudent.php?id=<?php echo $data['stu_id']; ?>"><button
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
    <a href="addstudent.php" class="btn btn-danger box"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div>
</body>
</html>