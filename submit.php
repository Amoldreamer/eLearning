<?php
require('config.php');
require('dbConnection.php');
require('mainInclude/header_cdn.php');
session_start();

if(isset($_POST['stripeToken'])){
    $token = $_POST['stripeToken'];

    $data=\Stripe\Charge::create(array(
        "amount"=>5000,
        "currency"=>"inr",
        "description"=>"Programming with Amol Desc",
        "source"=>$token,
    ));

    echo "<pre>";
    $id=$data['id'];
    $amount=$data['amount'];
    if(isset($_SESSION['is_login'])){
      $email=$_SESSION['stuLogEmail'];
  }
    $status=$data['status'];
    $balance=$data['balance_transaction'];
    $id=$data['id'];
    if(isset($_POST['id'])){
        $course_id=$_POST['id'];
    }
    $date=date( "Y/m/d");

    $sql="INSERT INTO `courseorder`(`order_id`, `stu_email`, `course_id`, `status`, `respmsg`, `amount`, `order_date`) 
    VALUES ('$id','$email','$course_id','$status','$balance','$amount','$date')";
    $conn->query($sql);
}
?>
<div class="jumbotron text-center">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete your account setup.</p>
  <hr>
  <p>
    Having trouble? <a href="">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="index.php" role="button">Continue to homepage</a>
  </p>
</div>