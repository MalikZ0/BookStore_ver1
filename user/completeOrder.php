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
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tracking No</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $orders = getOders();

                                if(mysqli_num_rows($orders) > 0)
                                {
                                    foreach($orders as $items )
                                    {
                                        ?>
                                            <tr>
                                                <td><?= $items['id'];?></td>
                                                <td><?= $items['tracking_no'];?></td>
                                                <td><?= $items['total_price'];?></td>
                                                <td><?= $items['created_at'];?></td>
                                                <td>
                                                    <a href="viewOrderD.php?t=<?= $items['tracking_no'];?>" class="btn btn-primary">View Details</a>
                                                </td>
                                            </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                        <tr>
                                            <td colspan="5">No Orders Yet</td>
                                        </tr>
                                    <?php
                                    echo "No Orders Found";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include '../includes/footer.php'?>