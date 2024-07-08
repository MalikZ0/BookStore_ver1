<?php 
include '../functions/functions.php';
include '../includes/header.php';
include 'authenticateUser.php';
?>

<div class="py-3 bg-primary">
    <div class="container">
        <div class="text-white">
            <h6>
                <a class='text-white text-decoration-none' href="index.php">Home</a> / 
                <a class='text-white text-decoration-none' href="completeOrder.php">My Orders</a>
            </h6>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card ">
            <div class="row">
                <div class="col-md-12">
                    
                </div>
            </div>
        </div>
        <div class="float-start mt-2">
            <a href="checkout.php" class="btn btn-outline-primary"><i class="fa fa-shopping-cart ms-2"></i>Proceed to CheckOut</a>
        </div>
    </div>
</div>
    

<?php include '../includes/footer.php'?>
