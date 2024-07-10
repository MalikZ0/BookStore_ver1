<?php 
include '../functions/functions.php';
include '../includes/header.php';
include '../includes/slider.php';
?>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <hr>
                <div class="owl-carousel">
                    <?php
                            $trending_products = getAllActive('products');

                            if(mysqli_num_rows($trending_products) > 0){
                                foreach($trending_products as $item)
                                {
                                    ?>
                    <div class="item">
                        <a href="productView.php?product=<?= $item['slug']; ?>" class="text-decoration-none">
                            <div class="card shadow">
                                <div class="card-body">
                                    <img src="../uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
                                    <h6 class="text-center"><?= $item['name']; ?></h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                                }
                            }
                            else
                            {
                                echo '<div class="alert alert-warning">No products found</div>';
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-3 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h4>About Us</h4>
                <div class="underline mb-2">
                </div>
                <p>full stack developer</p>
                <br>
            </div>
        </div>
    </div>
</div>


<div class="py-3 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">E Shop</h4>
                <div class="underline mb-2">
                    <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i> Home</a><br>
                    <a href="#" class="text-white"><i class="fa fa-angle-right"></i> About us</a><br>
                    <a href="#" class="text-white"><i class="fa fa-angle-right"></i> My cart</a><br>
                    <a href="index.php" class="text-white"><i class="fa fa-angle-right"></i> Our Collections</a><br>
                </div>
            </div>
            <div class="col-md-3 text-white">
                <h4>Address</h4>
                <p>
                    #55, 2nd Floor, myhome , myhouse.
                </p>
                <a href="tel:+9412345678"><i class="fa fa-phone"></i> +94-12345678</a>
            </div>
            <div class="col-md-6">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.073292073073!2d79.8613663147725!3d6.927422994993073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a0b1b1b1b1b%3A0x1b1b1b1b1b1b1b1b!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1626823660001!5m2!1sen!2slk"
                    class="w-100" height="300" style="border:0;" loading="lazy"></iframe>
            </div>
        </div>

    </div>

</div>



<div class="py-0 bg-danger" style="display: flex;">
    <div class="text-center m-auto">
        <p class="text-white">All rights reserved. Copyright @ <a href="https://www.facebook.com/malikkumara"
                class="text-white">Malik</a> <?= date('Y'); ?></p>
    </div>
</div>


<?php include '../includes/footer.php'?>
<script>
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });
    });
</script>