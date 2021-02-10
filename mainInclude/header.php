<?php
  include('header_cdn.php');
?>
<body>
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php">E-Learning</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <ul class="navbar-nav custom-nav">
      <li class="nav-item custom-nav-item"><a href="index.php" class="nav-link">Home</a></li>
      <li class="nav-item custom-nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
      <li class="nav-item custom-nav-item"><a href="paymentstatus.php" class="nav-link">Payment Status</a></li>
      <?php
        session_start();
        if(isset($_SESSION['is_login'])){
          echo '<li class="nav-item custom-nav-item"><a href="Student/studentProfile.php" class="nav-link">My Profile</a></li>
                <li class="nav-item custom-nav-item"><a href="logout.php" class="nav-link">Logout</a></li>';
        }else{
          echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuLoginModalCenter" onclick="clearInputFields()">Login</a></li>
                <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter" onclick="clearSignupFields()" >Signup</a></li>';
        }
      ?>
      
      
      <li class="nav-item custom-nav-item"><a href="./Student/stufeedback.php" class="nav-link">Feedback</a></li>
      <li class="nav-item custom-nav-item"><a href="#" class="nav-link">Contact</a></li>
    </ul>
  </div>
</nav>