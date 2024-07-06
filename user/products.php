<?php 
include '../functions/authcode.php';
include '../includes/header.php';

if(isset($_GET['category']))
{

    $category_slug = $_GET['category'];
    $category_data = getBySlugActive('categories',$category_slug);
    $category = mysqli_fetch_array($category_data);

    if($category)
    {
        $c_id = $category['id'];
        ?>

        <div class="py-3 bg-primary">
            <div class="container">
                <div class="text-white">
                    <a class='text-white text-decoration-none' href="index.php">Home</a> / 
                    <a class='text-white text-decoration-none' href="category.php">Collections</a> / 
                    <?= $category['name']; ?> </div>
            </div>
        </div>
        
        <div class="py-3">
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
                                                <a href="productView.php?product=<?= $item['slug']; ?>" class="text-decoration-none">
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
        

<?php 
        include '../includes/footer.php';
    }
    else
    {
        echo "category not found";
    }
}
else
{
    echo "something went wrong";
}

?>
