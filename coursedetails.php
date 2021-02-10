<!-- Start including footer -->
<?php
    include "dbConnection.php";
    include "mainInclude/header.php";

    if(isset($_GET['course_id'])){
        $id = $_GET['course_id'];
        $_SESSION['course_id'] = $course_id;
        $sql = "SELECT * FROM course WHERE course_id =".$id;
        $result = $conn->query($sql);
         
    }
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
<div class="container mt-5">
    <div class="row">
    <?php
        if($result->num_rows > 0){
            $data=$result->fetch_assoc();
    ?>
        <div class="col-md-4">
            <img src="<?php echo str_replace("..",".",$data['course_img']) ?>" class="card-img-top" alt="guitar" />
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Course Name: Learn <?php echo $data['course_name']; ?></h5>
                <p class="card-text"><?php echo $data['course_desc']; ?></p>
                <p class="card-text">Duration: <?php echo $data['course_duration']; ?></p>
                <form action="submit.php" method="post">
                    <p class="card-text d-inline">Price:<small><del>&#8377 <?php echo $data['course_original_price']; ?></del></small><span class="font-weight-bolder">&#8377 <?php echo $data['course_price']; ?></span></p>
                    <input type="hidden" name="id" value="<?php echo $data['course_id'] ?>">
                    <?php
                        require('config.php');
                    ?>
                        <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="<?php echo $publishableKey ?>"
                            data-amount="<?php echo $data['course_price']*100; ?>"
                            data-name="Programming with Vishal"
                            data-description="Programming with Vishal Desc"
                            data-image="https://www.logostack.com/wp-content/uploads/designers/eclipse42/small-panda-01-600x420.jpg";
                            data-currency="inr"
                        >
                        </script>
                </form>
       
            </div>
        </div>
        <?php
        }
        ?>
    </div>
<div>
    <table class="table">
        <tr>
            <td>Lesson No</td>
            <td>Lesson Name</td>
        </tr>
    <?php
        $sql="SELECT * FROM lesson WHERE course_id=".$id;
        $result=$conn->query($sql);
        $count=0;
        if($result->num_rows>0){
            while($data=$result->fetch_assoc()){;
    ?>
        <tr>
            <td><?php echo ++$count ?></td>
            <td><?php echo $data['lesson_name'] ?></td>
        </tr>
    <?php } } ?>
    </table>
</div>
</div>

<!-- End Main Content -->


<!-- Start including footer -->
<?php
    include "mainInclude/footer.php";
?>
<!-- End including footer -->