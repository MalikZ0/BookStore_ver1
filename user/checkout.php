<?php 
include '../functions/functions.php';
include '../includes/header.php';
include 'authenticateUser.php';

$carts = getCartItems();
if(mysqli_num_rows($carts) == 0)
{
    redirect("index.php", "No items in cart");
}
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
                                    <input type="text" required name="name" placeholder="Enter Your Name"
                                        class="form-control" id="name">
                                        <small class="text-danger name"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="fw-bold">E-mail</label>
                                    <input type="email" required name="email" placeholder="Enter Your email"
                                        class="form-control" id="email">
                                        <small class="text-danger email"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="fw-bold">Phone</label>
                                    <input type="text" required name="phone" placeholder="Enter Your phone Number"
                                        class="form-control" id="phone">
                                        <small class="text-danger phone"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="pincode" class="fw-bold">Postal Code</label>
                                    <input type="text" required name="pincode" placeholder="Enter Your Postal Code"
                                        class="form-control" id="pincode">
                                        <small class="text-danger pincode"></small>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address" class="fw-bold">Address</label>
                                    <textarea name="address" placeholder="Enter Your address" class="form-control"
                                        id="address" rows="5"></textarea>
                                        <small class="text-danger address"></small>
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
                                            <h5 class="justify-content-center" style="display: flex;">
                                                ×<?= $c_item['product_qty'];?></h5>
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
                                    <button type='submit' name="placeOderBtn" class="btn btn-outline-primary"><i
                                            class="fa fa-shopping-cart ms-2"></i>Proceed to CheckOut</button>
                                    <div id="paypal-button-container" class="mt-3"></div>

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
<!-- Replace the "test" client-id value with your client-id -->
<script
    src="https://www.paypal.com/sdk/js?client-id=AekRET0nBn6Rcs0RRnnKRUHEGb1yTfV1x2Iqkj2vgbX1L6mfCmRXqF0jmNAVt52eyGmccuMXjRilQ-TM&currency=USD">
</script>
<script>
   

    paypal.Buttons({
        onClick() {
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var pincode = $('#pincode').val();
            var address = $('#address').val();
            if(name.length == 0)
            {
                $('.name').text("name field is required");
            }
            else
            {
                $('.name').text("");
            }
            if(email.length == 0)
            {
                $('.email').text("email field is required");
            }
            else
            {
                $('.email').text("");
            }
            if(phone.length == 0)
            {
                $('.phone').text("phone field is required");
            }
            else
            {
                $('.phone').text("");
            }
            if(pincode.length == 0)
            {
                $('.pincode').text("pincode field is required");
            }
            else
            {
                $('.pincode').text("");
            }
            if(address.length == 0)
            {
                $('.address').text("address field is required");
            }
            else
            {
                $('.address').text("");
            }
            if(name.length == 0 || email.length == 0 || phone.length == 0 || pincode.length == 0 || address.length == 0)
            {
                return false;
            }
        },
        // Set up the transaction
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?=$totalPrice?>'
                    }
                }]
            });
        },
        // onApprove function is called when the buyer approves the payment
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                console.log("Capture Result", details, JSON.stringify(details, null, 2));
                const transactions = details.purchase_units[0].payments.captures[0];
                // alert('Transaction ' + transactions.status + ': ' + transactions.id +
                //     '\n\nSee console for all available details');

                var data = {
                    'name': $('#name').val(),
                    'email': $('#email').val(),
                    'phone': $('#phone').val(),
                    'pincode': $('#pincode').val(),
                    'address': $('#address').val(),
                    'payment_mode': 'Paypal',
                    'payment_id': transactions.id,
                    'placeOderBtn': true
                    
                };
                $.ajax({
                    method: "POST",
                    url: "../functions/placeOrder.php",
                    data: data,
                    success: function (response) {
                        if (response == 201 ) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: 'Order Placed Successfully',
                                position: 'top',
                                showConfirmButton: false,
                                timer: 3000
                            });
                            window.location.href = "../user/completeOrder.php";
                        }
                    }
                });
            });
        }
    }).render('#paypal-button-container');
</script>