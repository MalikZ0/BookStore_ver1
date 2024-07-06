<?php
    include '../middleware/adminMiddleware.php';
    include './includes/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $product = getBy("products",$id);

                    if (mysqli_num_rows($product) > 0 ) 
                    {
                        $data = mysqli_fetch_array($product);
                ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Product
                                <a href="products.php" class="btn btn-danger float-end">BACK</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">   <!-- accept images as well -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-0" for="name">Select Category</label>
                                        <select name="category_id" class="form-select mb-2">
                                            <option selected>Select Category</option>
                                            <?php
                                                $categories = getAll("categories");
                                                if(mysqli_num_rows($categories) > 0){
                                                    foreach($categories as $item){
                                                        ?>
                                                            <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id'] ? 'selected':'';?>><?= $item['name'];?></option>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    echo "No Category Available";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="product_id" value="<?=$data['id'];?>">
                                    <div class="col-md-6">
                                        <label class="mb-0" for="name">Name</label>
                                        <input type="text" required name="name" value="<?=$data['name'];?>" id="name" class="form-control" placeholder="Enter Category Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="slug">Slug</label>
                                        <input type="text" required name="slug" value="<?=$data['slug'];?>" id="slug" class="form-control" placeholder="Enter Slug Name">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="small_description">Small Description</label>
                                        <textarea rows="3" required name="small_description" id="small_description" class="form-control" placeholder="Enter Small Description"><?=$data['small_description'];?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="description">Description</label>
                                        <textarea rows="3" required name="description" id="description" class="form-control" placeholder="Enter Description"><?=$data['small_description'];?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="original_prize">Original Prize</label>
                                        <input type="text" required name="original_prize" value="<?=$data['original_prize'];?>" id="original_prize" class="form-control" placeholder="Enter Original prize">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0" for="selling_prize">Selling Prize</label>
                                        <input type="text" required name="selling_prize" value="<?=$data['selling_prize'];?>" id="selling_prize" class="form-control" placeholder="Enter Selling Prize">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="image">Upload Image</label>
                                        <input type="file"  name="image" id="image" class="form-control" placeholder="Upload Image">
                                        
                                        <input type="hidden" name="old_image" value="<?= $data['image'];?>" id="img">
                                        <label for="img" class="mb-0">Current Image</label>
                                        <img src="../uploads/<?=$data['image'];?>" alt="product_image" height="100px" width="100px">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-0" for="quantity">Quantity</label>
                                            <input type="text" required name="qty" value="<?=$data['qty'];?>" id="quantity" class="form-control" placeholder="Enter Quantity">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="mb-0" for="status">Status</label><br>
                                            <input type="checkbox"  name="status" <?= $data['status'] ? "checked":""; ?> id="status">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="mb-0" for="trending">Trending</label><br>
                                            <input type="checkbox"  name="trending" <?= $data['trending'] ? "checked":""; ?> id="trending">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="meta-title">Meta Title</label>
                                        <input type="text" required name="meta_title" value="<?=$data['meta_title'];?>" id="meta-title" class="form-control mb-2" placeholder="Enter Meta Title">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="meta-description">Meta Description</label>
                                        <textarea rows="3" required name="meta_description" id="meta-description" class="form-control mb-2" placeholder="Enter Meta Description"><?=$data['meta_description'];?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0" for="meta-keywords">Meta Keywords</label>
                                        <textarea rows="3" required name="meta_keywords" id="meta-keywords" class="form-control mb-2" placeholder="Enter Meta Keywords"><?=$data['meta_keywords'];?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                    }
                    else
                    {
                        echo "Products Not Found";
                    }
                }
                else
                {
                    echo "Something Went: Wrong ID is missing";
                }
            ?>
        </div>
    </div>
</div>

<?php
    include './includes/footer.php';
?>