<?php
  if(!isset($_SESSION)){
    session_start();
  }

  include_once('../dbConnection.php');

  if(isset($_POST['verifyEmail'])){
    $stuemail=$conn->real_escape_string($_POST['stuemail']);

    $sql = "SELECT stu_email FROM student WHERE stu_email='$stuemail'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    echo json_encode($row);
  }

  if(isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stuemail']) && isset($_POST['stuepass'])){

      $stuname=$conn->real_escape_string($_POST['stuname']);
      $stuemail=$conn->real_escape_string($_POST['stuemail']);
      $stupass=$conn->real_escape_string($_POST['stuepass']);

      $sql = "INSERT INTO student(stu_name, stu_email, stu_pass) VALUES ('$stuname','$stuemail','$stupass')";

      if($conn->query($sql) == TRUE){
        echo json_encode("OK");
      }else{
        echo json_encode("Failed");
      }
  }

  // Student Login Verification
if(!isset($_SESSION['is_login'])){
  if(isset($_POST['loginUser']) && isset($_POST['stuLogEmail']) && isset($_POST['stuLogPass'])){
    $stuLogEmail=$conn->real_escape_string($_POST['stuLogEmail']);
    $stuLogPass=$conn->real_escape_string($_POST['stuLogPass']);

    $sql = "SELECT * from student WHERE stu_email = '$stuLogEmail'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if($row > 0){
      $_SESSION['is_login'] = true;
      $_SESSION['stuLogEmail']=$stuLogEmail;
      echo json_encode($row);
    }else if($row === 0){
      echo json_encode($row);
    };
  }
}
?>