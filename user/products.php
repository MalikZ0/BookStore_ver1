<?php 
include '../functions/authcode.php';
include '../includes/header.php';

$category_slug = $_GET['category'];
$category_data = getBySlugActive('categories',$category_slug);
$category = mysqli_fetch_array($category_data);
$c_id = $category['id'];
?>

<div class="py-3 bg-primary">
    <div class="container">
        <div class="text-white">Home / Collections / <?= $category['name']; ?> </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $category['name']; ?> </h1>
                <hr>
                <div class="row">
                    <?php
                        $products = getProductByCategory($c_id);

                        if(mysqli_num_rows($products) > 0)
                        {
                            foreach($products as $item)
                            {
                                ?>
                                    <div class="col-md-3 mb-2">
                                        <a href="#">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="../uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100">
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
