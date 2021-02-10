<?php
include('./dbConnection.php');
// Header Include from mainInclude
include('./mainInclude/header_cdn.php');
?>
    <div class="container-fluid bg-dark"><!--Start Course Page Banner -->
        <div class="row">
            <img src="./image/coursebanner.jpg" alt="courses" style="height:300px; width:100%; object-fit:cover;box-shadow:10px;"/>
        </div>    
    </div><!-- End Course Page Banner --> 

    <div class="container jumbotron mb-5">
        <div class="row">
            <div class="col-md-4">
                <h5 class="mb-3">If Already Registered !! Login</h5>
               <form role="form" id="studentLoginForm">
                    <div class="form-group">
                        <i class="fas fa-envelope"></i><label for="studentLogEmail" class="pl-2 font-weight-bold">Email</label>
                        <small id="statusLogMsg1"></small><input type="email" class="form-control" placeholder="Email" name="stuLogEmail"
                        id="studentLogEmail">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="studentLogPass" class="pl-2 font-weight-bold">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="stuLogPass" id="studentLogPass">
                    </div>
                    <button type="button" class="btn btn-primary" id="studentLoginBtn" onclick="loginFunction()">Login</button>
               </form><br/>
               <small id="statusLogMsg"></small>
            </div>
            <div class="col-md-6 offset-md-1">
            <h5 class="mb-3">New User || Sign Up</h5>
                <form role="form" id="stuRegForm">
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label>
                        <small id="statusMsg1"></small><input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">Email</label>
                        <small id="statusMsg2"></small><input type="email" name="stuemail" id="stuemail">
                        <small class="form-text">We'll never share your email with anyone else</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New Password</label><small id="statusMsg3">
                        </small><input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass">
                    </div>
                    <button type="button" class="btn btn-primary" id="signup" onclick="addStu()">Sign Up</button>
                </form><br/>
                <small id="successMsg"></small>
            </div>
        </div>
    </div>
    <hr/>
<script>
    // Student Login Function
    function loginFunction(){
        var studentLogEmail = $('#studentLogEmail').val();
        var studentLogPass = $('#studentLogPass').val();
        $.ajax({
            url:'Student/addStudent.php',
            method: 'POST',
            data:{
                loginUser:'loginUser',
                stuLogEmail:studentLogEmail,
                stuLogPass:studentLogPass
            },
            success:function(data){
                if(data == 0){
                    $('#loginMessage').html('<div class="alert-danger" role="status">Invalid Email or Password!</div>');
                }else if(data == 1){
                    $('#loginMessage').html('<div class="spinner-border text-success" role="status"></div>');
                    setTimeout(() => {
                        window.location.href='index.php';
                    }, 1000);
                }
            }
        })
    }

    function addStu(){
    var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    if(stuname.trim()==""){
        $('#showMessage1').html('<small class="text-info">This field cannot be empty</small>');
        $('#stuname').focus();
        return false;
    }else if(stuemail.trim()==""){
        $('#showMessage2').html('<small class="text-info">This field cannot be empty</small>');
        $('#stuemail').focus();
        return false;
    }else if(stuemail.trim()!="" && !regEx.test(stuemail)){
        $('#showMessage2').html('<small class="text-info">Please Enter a valid email e.g. example@example.com</small>');
        $('#stuemail').focus();
        return false;
    }else if(stupass.trim()==""){
        $('#showMessage3').html('<small class="text-info">This field cannot be empty</small>');
        $('#stupass').focus();
        return false;
    }else{
        $.ajax({
            url:'Student/addstudent.php',
            method:'POST',
            dataType:'json',
            data:{
                stusignup: "stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stuepass: stupass
            },
            success:function(data){
                console.log(data)
                if(data == 'OK'){
                    $('#successMsg').html('<span class="alert alert-success">Student Registered Successfully</span>');
                    $("#stuname").val('');
                    $("#stuemail").val('');
                    $("#stuepass").val('');
                }else if(data == 'Failed'){
                    $('#successMsg').html('<span class="alert alert-danger">Could Not Register</span>');
                }
            }
        })

    }
}

</script>
<?php
// Contact Us
include('./contact.php');
?>
<?php
// Footer Include from mainInclude
include('./mainInclude/footer_note.php');
?>