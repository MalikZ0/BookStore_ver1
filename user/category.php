<?php 
include '../functions/authcode.php';
include '../includes/header.php';
?>

<div class="py-3 bg-primary">
    <div class="container">
        <div class="text-white">
                <a class='text-white text-decoration-none' href="index.php">Home</a> / 
                Collections</div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>OUR Collections</h1>
                <hr>
                <div class="row">
                    <?php
                        $categories = getAllActive('categories');

                        if(mysqli_num_rows($categories) > 0)
                        {
                            foreach($categories as $item)
                            {
                                ?>
                                    <div class="col-md-3 mb-2">
                                        <a href="products.php?category=<?= $item['slug']; ?>" class="text-decoration-none">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="../uploads/<?= $item['image']; ?>" alt="Category Image" class="w-100">
                                                <h4 class="text-center"><?= $item['name']; ?></h4>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                <?php
                            }
                        }
                        else
                        {
                            echo "No Data Found";
                        }
                    ?>
                </div>
                
            </div>
        </div>
    </div>
</div>
    

<?php include '../includes/footer.php'?>
