<?php
if(!isset($_SESSION)){
    session_start();
}
include "admininclude/header.php";
include "../dbConnection.php";

if(!isset($_SESSION['is_AdminLogin'])){
    echo '<script>window.location.href="../index.php"</script>';
}

if(isset($_POST['changePassBtn'])){
    $admin_email=$conn->real_escape_string($_POST['admin_email']);
    $admin_pass=$conn->real_escape_string($_POST['admin_pass']);

    $sql="UPDATE admin SET admin_pass='$admin_pass' WHERE admin_email='$admin_email'";
    $result = $conn->query($sql);
    if($result){
        $msg='Password Changed';
    }
}
?>
<div class="col-md-6 mt-5 mx-3 jumbotron">
  <form method="POST" action="">
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="admin_email" class="form-control">
    </div>
    <div class="form-group">
        <label for="">New Password</label>
        <input type="text" class="form-control" name="admin_pass">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-danger" id="changePassBtn" name="changePassBtn">Submit</button>
    </div>
  </form>
  <?php if(isset($msg)){ echo '<p class="alert alert-success text-center mt-2">'.$msg.'</p>'; } ?>
</div>