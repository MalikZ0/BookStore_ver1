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
                <a class='text-white text-decoration-none' href="checkout.php">CheckOut</a>
            </h6>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="../functions/placeOrder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Buyer Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="fw-bold">Name</label>
                                    <input type="text" required name="name" placeholder="Enter Your Name" class="form-control" id="name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="fw-bold">E-mail</label>
                                    <input type="email" required name="email" placeholder="Enter Your email" class="form-control" id="email">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="fw-bold">Phone</label>
                                    <input type="text" required name="phone" placeholder="Enter Your phone Number" class="form-control" id="phone">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="pincode" class="fw-bold">Postal Code</label>
                                    <input type="text" required name="pincode" placeholder="Enter Your Postal Code" class="form-control" id="pincode">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address" class="fw-bold">Address</label>
                                    <textarea name="address" placeholder="Enter Your address" class="form-control" id="address" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-5">
                            <div class="col">
                                <h5>Order Details</h5>
                                <hr>
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <h6>Product</h6>
                                        </div>
                                        <div class="col-md-3">
                                            <h6>Prize</h6>
                                        </div>
                                        <div class="col-md-3 justify-content-center">
                                            <h6>Quantity</h6>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $items = getCartItems();
                                    $totalPrice = 0;
                                    foreach($items as $c_item)
                                    {
                                    ?>
                                        <div class="card-body shadow-sm mb-2 product_data">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <img src="../uploads/<?= $c_item['image']; ?>" alt="Image" class="w-50">
                                                </div>
                                                <div class="col-md-4">
                                                    <h5><?= $c_item['name'];?></h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5>Rs. <?= $c_item['selling_prize'];?></h5>
                                                </div>
                                                <div class="col-md-3">
                                                    <h5 class="justify-content-center" style="display: flex;">×<?= $c_item['product_qty'];?></h5>
                                                </div>
                                            </div>
                                        </div>
                                <?php 
                                    $totalPrice += $c_item['selling_prize'] * $c_item['product_qty'];
                                        }
                                    ?>
                                    <hr>
                                <h5>Total Price : Rs. <span class="float-start fw-bold"><?=$totalPrice?></span></h5>
                                <div class="float-start mt-2">
                                    <input type="hidden" name="payment_mode" value="COD">
                                    <button type='submit' name="placeOderBtn" class="btn btn-outline-primary"><i class="fa fa-shopping-cart ms-2"></i>Proceed to CheckOut</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include '../includes/footer.php'?>