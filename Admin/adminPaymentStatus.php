<?php
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires:0");
    include('./adminInclude/header.php');
    include("../dbConnection.php");

    // following files need to be included
    require_once("../config.php");

    $ORDER_ID = "";
    $requestParamList = array();
    $responseParamList = array();

    if(isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != ""){
        // In Test Page, we are taking parameters from POST request. In actual implementation these
        // can be collected from session or DB.
    }
?>

<div class="container" style="margin-top:-400px">
    <h2 class="text-center my-4">Payment Status</h2>
    <form action="" method="post">
        <div class="form-group row">
            <label class="offset-sm-3 col-form-label">Order ID:</label>
            <div>
                <input class="form-control mx-3" id="ORDER_ID" tabindex="1" size="20"
                name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
            </div>
            <div>
                <input name="submit" type="submit" value="View" class="btn btn-primary mx-4">
            </div>
        </div>
    </form>
</div>
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