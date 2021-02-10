<?php
    include('./dbConnection.php');
    include('./mainInclude/header_cdn.php');
    session_start();
    if(!isset($_SESSION['stuLogEmail'])){
        echo "<script>location.href = 'loginorsignup.php'</script>";
    }else{
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        $sql="SELECT * FROM course WHERE course_id=".$id;
        $result = $conn->query($sql);
        if($result->num_rows>0){
            $data = $result->fetch_assoc();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .price{
            font-size:72px;
        }
        .currency{
            position:relative;
            font-size:25px;
            top:-31px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="price"><span class="currency">$</span>67</h2>
                </div>
                <div class="card-body test-center">
                    <div class="card-title">
                        <h1>Product 1</h1>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">Feature 1</li>
                        <li class="list-group-item">Feature 2</li>
                        <li class="list-group-item">Feature 3</li>
                        <li class="list-group-item">Feature 4</li>
                        <li class="list-group-item">Feature 5</li>
                    </ul>
                </div>
            </div>
          </div>
        </div>
    </div>               
</body>
</html>

<?php } ?>