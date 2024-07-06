<?php 
include '../functions/authcode.php';
include '../includes/header.php';

if(isset($_GET['product']))
{

    $product_slug = $_GET['product'];
    $product_data = getBySlugActive('products',$product_slug);
    $product = mysqli_fetch_array($product_data);

    if($product)
    {
        ?>
        <div class="py-3 bg-primary">
            <div class="container">
                <div class="text-white">
                    <a class='text-white text-decoration-none' href="index.php">Home</a> / 
                    <a class='text-white text-decoration-none' href="category.php">Collections</a> / 
                    <?= $product['name']; ?>
                </div>
            </div>
        </div> 
        
        <div class="bg-light py-4">
            <div class="container product_data mt-3">
                <div class="row">
                    <div class="col-md-4 ">
                        <div class="shadow">
                            <img src="../uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-8 ">
                        <h4 class="fw-bold"><?= $product['name']; ?>
                            <span class="float-start text-danger"><?php if($product['name']){echo "Trending";}?></span>
                        </h4>
                        <hr>
                        <p><?= $product['small_description']; ?> </p>
                        <div class="row">                            
                            <div class="col-md-6">
                                <h5><span class="text-success fw-bold">Rs. <?= $product['selling_prize']; ?></span></h5>
                            </div>
                            <div class="col-md-6">
                                <h6><s class="text-danger ">Rs. <?= $product['original_prize']; ?></s></h6>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width: 125px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control text-center input-qty bg-white" value="1" disabled>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <button class="btn btn-primary px-4 addToCart_btn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"> Add to Cart</i></button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger px-4"><i class="fa fa-star me-2"> Add to Whishlist</i></button>
                            </div>
                        </div>
                        <hr>
                        <h6>Description :</h6>
                        <p><?= $product['description']; ?> </p>
                    </div>
                </div>
            </div>
        </div>
        

<?php 
    }
    else
    {
        echo "product not found";
    }
}
else
{
    echo "something went wrong";
}
include '../includes/footer.php';
?>
