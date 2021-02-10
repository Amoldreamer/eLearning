function adminLoginFunction(){
    var adminLogEmail = $('#adminLogEmail').val();
    var adminLogPass = $('#adminLogPass').val();

    $.ajax({
        url:'Admin/admin.php',
        method: 'POST',
        data:{
            adminLoginUser:'adminLoginUser',
            adminLogEmail:adminLogEmail,
            adminLogPass:adminLogPass
        },
        success:function(data){
            console.log(data);
            if(data == 0){
                $('#adminLoginStatus').html('<div class="alert-danger" role="status">Invalid Email or Password!</div>');
            }else if(data == 1){
                $('#adminLoginStatus').html('<div class="spinner-border text-success" role="status"></div>');
                setTimeout(() => {
                    window.location.href='Admin/adminDashboard.php';
                }, 1000);
            }
        }
    })
}