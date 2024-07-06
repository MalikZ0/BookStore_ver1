<?php
    include '../middleware/adminMiddleware.php';
    include './includes/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
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
                                                    <option value="<?= $item['id']; ?>"><?= $item['name'];?></option>
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
                            <div class="col-md-6">
                                <label class="mb-0" for="name">Name</label>
                                <input type="text" required name="name" id="name" class="form-control" placeholder="Enter Category Name">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="slug">Slug</label>
                                <input type="text" required name="slug" id="slug" class="form-control" placeholder="Enter Slug Name">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="small_description">Small Description</label>
                                <textarea rows="3" required name="small_description" id="small_description" class="form-control" placeholder="Enter Small Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="description">Description</label>
                                <textarea rows="3" required name="description" id="description" class="form-control" placeholder="Enter Description"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="original_prize">Original Prize</label>
                                <input type="text" required name="original_prize" id="original_prize" class="form-control" placeholder="Enter Original prize">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0" for="selling_prize">Selling Prize</label>
                                <input type="text" required name="selling_prize" id="selling_prize" class="form-control" placeholder="Enter Selling Prize">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="image">Upload Image</label>
                                <input type="file" required name="image" id="image" class="form-control" placeholder="Upload Image">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0" for="quantity">Quantity</label>
                                    <input type="text" required name="qty" id="quantity" class="form-control" placeholder="Enter Quantity">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0" for="status">Status</label><br>
                                    <input type="checkbox"  name="status" id="status">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0" for="trending">Trending</label><br>
                                    <input type="checkbox"  name="trending" id="trending">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="meta-title">Meta Title</label>
                                <input type="text" required name="meta_title" id="meta-title" class="form-control mb-2" placeholder="Enter Meta Title">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="meta-description">Meta Description</label>
                                <textarea rows="3" required name="meta_description" id="meta-description" class="form-control mb-2" placeholder="Enter Meta Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0" for="meta-keywords">Meta Keywords</label>
                                <textarea rows="3" required name="meta_keywords" id="meta-keywords" class="form-control mb-2" placeholder="Enter Meta Keywords"></textarea>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include './includes/footer.php';
?>