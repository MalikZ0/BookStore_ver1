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
                        <a class='text-white text-decoration-none' href="cartView.php">Cart</a>
                    </h6>
                </div>
            </div>
        </div>
<div class="py-5">
    <div class="container">
        <div class="card ">
            <div class="row">
                <div class="col-md-12">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h6>Product</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Prize</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Quantity</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Action</h6>
                                </div>
                            </div>
                        </div>
                        <div id="viewCart">
                            <?php
                                $items = getCartItems();
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
                                                <div class="col-md-2">
                                                    <h5>Rs. <?= $c_item['selling_prize'];?></h5>
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="hidden" class="prodId" value="<?= $c_item['product_id'];?>">
                                                    <div class="input-group mb-3" style="width: 125px;">
                                                        <button class="input-group-text decrement-btn updateQty">-</button>
                                                        <input type="text" class="form-control text-center input-qty bg-white" value="<?= $c_item['product_qty'];?>" disabled>
                                                        <button class="input-group-text increment-btn updateQty">+</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <button class="btn btn-danger btn-sm deleteItem" value="<?= $c_item['cid']; ?>"><i class="fa fa-trash ms-2"></i>Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
    

<?php include '../includes/footer.php'?>
