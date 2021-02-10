<?php
include_once('../dbConnection.php');
if(!isset($_SESSION)){
    session_start();
}
if(isset($_SESSION['is_login'])){
    $stuLogEmail = $_SESSION['stuLogEmail'];
}
if(isset($stuLogEmail)){
    $sql="SELECT stu_img FROM student WHERE stu_email='$stuLogEmail'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $stu_img = $row['stu_img'];
}

$fullURL = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
echo $fullURL;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        if($fullURL == 'http://localhost/eLearning/Student/myCourses.php'){
            echo '<title>My Courses</title>';
        }
        else if($fullURL == 'http://localhost/eLearning/Student/stufeedback.php'){
            echo '<title>Feedback</title>';
        }
        else if($fullURL == 'http://localhost/eLearning/Student/studentChangePassword.php'){
            echo '<title>Change Password</title>';
        }
        else if($fullURL == 'http://localhost/eLearning/Student/studentProfile.php'){
            echo '<title>Profile</title>';
        }
    ?>
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="preconnect" href="https://fonts.gstatic.com">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

<!-- Font -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">


<link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Top  Navbar -->
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470">
        <a href="studentProfile.php" class="navbar-brand col-sm-3 col-md-2 mr-0">E-Learning</a>
    </nav>

    <!-- Side Bar -->
    <div class="container-fluid " style="margin-top:40px">
        <div class="row">
            <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item mb-3">
                            <img src="<?php echo $stu_img ?>" alt="studentimgage" class="img-thumbnail rounded-circle">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="studentProfile.php">
                                <i class="fas fa-user"></i>
                                Profile<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="myCourses.php" class="nav-link">
                                <i class="fab fa-accessible-icon"></i>
                                My Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stufeedback.php" class="nav-link">
                                <i class="fab fa-accessible-icon"></i>
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="studentChangePassword.php" class="nav-link">
                                <i class="fas fa-key"></i>
                                Change Password
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../logout.php" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>