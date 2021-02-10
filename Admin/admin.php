<?php
if(!isset($_SESSION)){
    session_start();
  }

  include_once('../dbConnection.php');

// Admin Login Verification
if(!isset($_SESSION['is_AdminLogin'])){
  if(isset($_POST['adminLoginUser']) && isset($_POST['adminLogEmail']) && isset($_POST['adminLogPass'])){
    $adminLogEmail=$conn->real_escape_string($_POST['adminLogEmail']);
    $adminLogPass=$conn->real_escape_string($_POST['adminLogPass']);

    $sql = "SELECT * from admin WHERE admin_email = '$adminLogEmail'";
    $result = $conn->query($sql);
    $row = $result->num_rows;
    if($row > 0){
      $_SESSION['is_AdminLogin'] = true;
      $_SESSION['adminLogEmail']=$adminLogEmail;
      echo json_encode($row);
    }else if($row === 0){
      echo json_encode($row);
    };
  }
}