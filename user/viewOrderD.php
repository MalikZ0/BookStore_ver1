<?php 
include '../functions/functions.php';
include '../includes/header.php';
include 'authenticateUser.php';

if(isset($_GET['t']))
{
    $tracking_no = $_GET['t'];
    $order_data = checkTrackingNo($tracking_no);

    if(mysqli_num_rows($order_data) < 0)
    {
        ?>
<h4>Order Not Found</h4>
<?php
        die();
    }
    else
    {
        $order_data_D = mysqli_fetch_array($order_data);
    }
}
else
{
    ?>
<h4>Something Went Wrong</h4>
<?php
    die();
}
?>

<div class="py-3 bg-primary">
    <div class="container">
        <div class="text-white">
            <h6>
                <a class='text-white text-decoration-none' href="index.php">Home</a> /
                <a class='text-white text-decoration-none' href="checkout.php">My Orders</a> /
                <a class='text-white text-decoration-none' href="#">view Order</a>
            </h6>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="text-white fs-4">Order</span>
                            <a href="completeOrder.php" class="btn btn-warning float-start"><i class="fa fa-reply"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="fw-bold" for="name">Name</label>
                                            <div class="border p-1">
                                                <?= $order_data_D['name']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="email">Email</label>
                                            <div class="border p-1">
                                                <?= $order_data_D['email']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="phone">Phone</label>
                                            <div class="border p-1">
                                                <?= $order_data_D['phone']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="address">Address</label>
                                            <div class="border p-1">
                                                <?= $order_data_D['address']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="tracking_no">Tracking Number</label>
                                            <div class="border p-1">
                                                <?= $order_data_D['tracking_no']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="total_price">Total Price</label>
                                            <div class="border p-1">
                                                <?= $order_data_D['total_price']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="pincode">Postal Code</label>
                                            <div class="border p-1">
                                                <?= $order_data_D['pincode']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold" for="created_at">Date</label>
                                            <div class="border p-1">
                                                <?= $order_data_D['created_at']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="fw-bold">Product</th>
                                                <th class="fw-bold">Price</th>
                                                <th class="fw-bold">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $user_id = $_SESSION['auth_user']['user_id'];
                                                $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as order_qty, p.* FROM orders o, order_items oi,
                                                                products p WHERE o.user_id='$user_id' AND oi.order_id=o.id AND p.id=oi.prod_id AND 
                                                                o.tracking_no='$tracking_no' ";
                                                $order_query_run = mysqli_query($con, $order_query);

                                                if(mysqli_num_rows($order_query_run) > 0)
                                                {
                                                    foreach($order_query_run as $items)
                                                    {
                                                        ?>
                                            <tr>
                                                <td class="align-middle">
                                                    <img src="../uploads/<?= $items['image']?>"
                                                    alt="<?= $items['name']?>" width="50px" height="50px">
                                                    <?= $items['name']; ?>
                                                </td>
                                                <td class="align-middle"><?= $items['selling_prize'];?></td>
                                                <td class="align-middle"><?= $items['order_qty'];?></td>
                                            </tr>
                                            <?php
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                            <h4>No Order Details Found</h4>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <h5 class="fw-bold">Total Price : <span class="float-start fw-bold"><?= $order_data_D['total_price']?></span></h4>
                                    
                                    <label for="">Payment Mode</label>
                                    <div class="border py-1 mb-2 fw-bold">
                                        <?= $order_data_D['payment_mode']; ?>
                                    </div>
                                    <label for="">Status</label>
                                    <div class="border py-1 mb-2 fw-bold">
                                        <?php
                                             if($order_data_D['status'] == 0)
                                             {
                                                echo "Pending";
                                             }
                                             else if($order_data_D['status'] == 1)
                                             {
                                                echo "Completed";
                                             }
                                             else if($order_data_D['status'] == 2)
                                             {
                                                echo "Cancelled";
                                             }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<?php include '../includes/footer.php'?>