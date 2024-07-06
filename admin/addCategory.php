<?php
    include '../middleware/adminMiddleware.php';
    include './includes/header.php'; 
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category Name">
                            </div>
                            <div class="col-md-6">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Slug Name">
                            </div>
                            <div class="col-md-12">
                                <label for="description">Description</label>
                                <textarea rows="3" name="description" id="description" class="form-control" placeholder="Enter Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" id="image" class="form-control" placeholder="Upload Image">
                            </div>
                            <div class="col-md-12">
                                <label for="meta-keywords">Meta Title</label>
                                <input type="text" name="meta_title" id="meta-title" class="form-control" placeholder="Enter Meta Title">
                            </div>
                            <div class="col-md-12">
                                <label for="meta-description">Meta Description</label>
                                <textarea rows="3" name="meta_description" id="meta-description" class="form-control" placeholder="Enter Meta Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="meta-keywords">Meta Keywords</label>
                                <input type="text" name="meta_keywords" id="meta-keywords" class="form-control" placeholder="Enter Meta Keywords">
                            </div>
                            <div class="col-md-6">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" id="status">
                            </div>
                            <div class="col-md-6">
                                <label for="popular">Popular</label>
                                <input type="checkbox" name="popular" id="popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
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