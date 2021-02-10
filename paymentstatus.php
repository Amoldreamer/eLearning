<!-- Start including footer -->
<?php
    include "mainInclude/header.php";
    include "dbConnection.php";
?>
<!-- End including footer -->

<!-- Start Course Page Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="image/courseimages/books_stacked.jpg" alt="" srcset=""
        style="height:500px;width:100%;image-size:cover;box-shadow:10px;">
    </div>
</div>
<!-- End Course Page Banner -->

<!-- Start Main Content -->
    <div class="container">
        <h2 class="text-center my-4">Payment Status</h2>
        <form action="" method="POST">
            <div class="form-group row "style="margin-left:80px">
                <label for="" class="offset-sm-3 col-form-label">Order ID: </label>
                <div>
                    <input type="text" name="ORDER_ID" class="form-control mx-3">
                </div>
                <div>
                    <input name="submit" type="submit" class="btn btn-primary mx-4" value="View">
                </div>
            </div>
        </form>        
    </div>
<!-- End Main Content -->

<?php
if(isset($_POST['submit'])){
    $order_id = $conn->real_escape_string($_POST['ORDER_ID']);
    
    $sql="SELECT * FROM courseorder WHERE order_id='$order_id'";
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        $data=$result->fetch_assoc();
        echo '<table class="table col-md-6 offset-md-3">
                <tr>
                    <td>TXNID</td>
                    <td>'.$data['order_id'].'</td>
                </tr>
                <tr>
                    <td>TXNAMOUNT</td>
                    <td>'.$data['amount'].'</td>
                </tr>
                <tr>
                    <td>STATUS</td>
                    <td>'.$data['status'].'</td>
                </tr>
                <tr>
                    <td>RESPMSG</td>
                    <td>'.$data['respmsg'].'</td>
                </tr>
                <tr>
                    <td>TXNDATE</td>
                    <td>'. $data['order_date'].'</td>
                </tr>
                <tr>
                    <td><button class="btn btn-primary dummy"onclick="javascript:window.print()" >Print</button></td>
                </tr>
              </table>';
         
     }
} ?>

<!-- Start Contact Page -->
    <?php
        include "contact.php";
    ?>
<!-- End Contact Page -->

<!-- Start including footer -->
<?php
    include "mainInclude/footer.php";
?>
<!-- End including footer -->