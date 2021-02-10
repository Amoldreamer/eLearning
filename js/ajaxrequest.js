$(document).ready(function(){
    $('#stuemail').on('keypress blur',function(){
        var stuemail = $("#stuemail").val();

        $.ajax({
            url:'Student/addStudent.php',
            method:'POST',
            data:{
                verifyEmail:'verifyEmail',
                stuemail:stuemail
            },
            success:function(data){
                if(data!=0){
                    $('#showMessage2').html('This email has already been used. Try another.');
                    $('#signupBtn').attr('disabled',true);
                }
            }
        })
    })
})

function addStu(){
    var regEx = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stuepass").val();

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

// Student Login Function
function loginFunction(){
    var stuLogEmail = $('#stuLogEmail').val();
    var stuLogPass = $('#stuLogPass').val();

    $.ajax({
        url:'Student/addStudent.php',
        method: 'POST',
        data:{
            loginUser:'loginUser',
            stuLogEmail:stuLogEmail,
            stuLogPass:stuLogPass
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

function clearInputFields(){
    $('#stuLogEmail').val('');
    $('#stuLogPass').val('');
}
function clearSignupFields(){
    $('#stuname').val('');
    $('#stuemail').val('');
    $('#stuepass').val('');
}