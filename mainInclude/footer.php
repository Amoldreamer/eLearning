<?php
  include('footer_note.php');
?>
        

<!-- Start Registration Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Student Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Start Student Registration Form -->
      <form>
      <div class="form-group">
            <i class="fas fa-user"></i>
            <label for="stuname" class="font-weight-bold">Name</label>
            <input type="text" class="form-control" id="stuname" placeholder="Name">  
            <small id="showMessage1"></small>          
        </div>
        <div class="form-group">
            <i class="fas fa-envelope"></i>
            <label for="stuemail" class="pl-2 font-weight-bold">Email address</label>
            <input type="email" class="form-control" name="stuemail" id="stuemail" placeholder="Enter email">
            <small id="showMessage2"></small>   
            <small class="form-text">We'll never share your email with anyone else</small>
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i>
            <label for="stuepass" class="pl-2 font-weight-bold">Password</label>
            <input type="password" class="form-control" name="stuemail" id="stuepass" placeholder="Password">
            <small id="showMessage3"></small>   
        </div>
    </form>
    <!-- End Student Registration Form -->
      </div>
      <div class="modal-footer">
        <span class="text-center" id="successMsg"></span>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" onclick="addStu()" id="signupBtn" class="btn btn-primary">Sign Up</button>        
      </div>
    </div>
  </div>
</div>
<!-- End Registration Modal -->

<!-- Start Login Modal -->
<div class="modal fade" id="stuLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuLoginModalCenterLabel">Student Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Start Student Login Form -->
      <form id="stuLoginForm">
        <div class="form-group">
            <i class="fas fa-envelope"></i>
            <label for="stuLogEmail" class="pl-2 font-weight-bold">Email address</label>
            <input type="email" class="form-control" name="stuLogEmail" id="stuLogEmail" placeholder="Enter email">
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i>
            <label for="stuLogPass" class="pl-2 font-weight-bold">Password</label>
            <input type="password" class="form-control" name="stuLogPass" id="stuLogPass" placeholder="Password">
        </div>
    </form>
    <!-- End Student Login Form -->
      </div>
      <div class="modal-footer">
        <small id="loginMessage"></small>
        <button type="button" class="btn btn-secondary" id="cancelBtn" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="loginFunction()" class="btn btn-primary" id="stuLoginBtn">Login</button>
      </div>
    </div>
  </div>
</div>
<!-- End Login Modal -->

<!-- Start Admin Login Modal -->
<div class="modal fade" id="adminLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="adminLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminLoginModalCenterLabel">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Start Admin Login Form -->
      <form id="adminLoginForm">
        <div class="form-group">
            <i class="fas fa-envelope"></i>
            <label for="adminLogEmail" class="pl-2 font-weight-bold">Email address</label>
            <input type="email" class="form-control" name="adminLogEmail" id="adminLogEmail" placeholder="Enter email">
        </div>
        <div class="form-group">
            <i class="fas fa-key"></i>
            <label for="adminLogPass" class="pl-2 font-weight-bold">Password</label>
            <input type="password" class="form-control" name="adminLogPass" id="adminLogPass" placeholder="Password">
        </div>
    </form>
    <!-- End admindent Login Form -->
      </div>
      <div class="modal-footer">
        <small id="adminLoginStatus"></small>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" onclick="adminLoginFunction()" class="btn btn-primary" id="adminLoginBtn">Login</button>
      </div>
    </div>
  </div>
</div>
<!-- End Login Modal -->

<!-- Student Ajax Call JavaScript -->
<script type="text/javascript" src="js/ajaxrequest.js"></script>

<!-- Admin Ajax Call JavaScript -->
<script type="text/javascript" src="js/adminajaxrequest.js"></script>
</body>
</html>