<?php    
    if(!isset($_SESSION)){
        session_start();
    }
    include "admininclude/header.php";
    include "../dbConnection.php";
    if(!isset($_SESSION['is_AdminLogin'])){
        echo '<script>window.location.href="../index.php"</script>';
    }
    $sql="SELECT * FROM course";
    $result=$conn->query($sql);
    $courses = $result->num_rows;

    $sql="SELECT * FROM student";
    $result=$conn->query($sql);
    $students = $result->num_rows;

    $sql="SELECT * FROM courseorder";
    $result=$conn->query($sql);
    $courseorder=$result->num_rows;
?>
        
            <div class="col-sm-9 mt-5">
            <h1 class="text-center">Welcome To Dashboard</h1>
                <div class="row mx-5 text-center">
                    <div class="col-sm-4 mt-5">
                        <div style="max-width:18rem;" class="card text-white bg-danger mb-3">
                            <div class="card-header">Courses</div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <?php echo $courses; ?>
                                </h4>
                                <a href="courses.php" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div style="max-width:18rem;" class="card text-white bg-success mb-3">
                            <div class="card-header">Students</div>
                            <div class="card-body">
                                <h4 class="card-title">
                                <?php echo $students; ?>
                                </h4>
                                <a href="students.php" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mt-5">
                        <div style="max-width:18rem;" class="card text-white bg-info mb-3">
                            <div class="card-header">Sold</div>
                            <div class="card-body">
                                <h4 class="card-title">
                                <?php echo $courseorder; ?>
                                </h4>
                                <a href="sellReport.php" class="btn text-white">View</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mx-5 mt-5 text-center">
                    <!-- Table -->
                    <p class="bg-dark text-white p-2">Course Ordered</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Course ID</th>
                                <th scope="col">Student Email</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">22</th>
                                <td>100</td>
                                <td>sonam@gmail.com</td>
                                <td>20/10/2020</td>
                                <td>2000</td>
                                <td><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    

    
</body>
</html>