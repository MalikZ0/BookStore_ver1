<?php 
include '../middleware/adminMiddleware.php';
include './includes/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Orders
                        <a href="orders.php" class="btn btn-warning float-end"> Back</a>
                    </h4>
                </div>
                <div class="card-body" id="category_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User ID</th>
                                <th>Tracking No</th>
                                <th>Price</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $orders = getAllOrderHistory();

                                if(mysqli_num_rows($orders) > 0)
                                {
                                    foreach($orders as $items )
                                    {
                                        ?>
                                            <tr>
                                                <td><?= $items['id'];?></td>
                                                <td><?= $items['name'];?></td>
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
