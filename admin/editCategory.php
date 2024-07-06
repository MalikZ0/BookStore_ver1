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
                    $category = getBy("categories",$id);

                    if (mysqli_num_rows($category) > 0 ) 
                    {
                        $data = mysqli_fetch_array($category);
            ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category
                        <a href="category.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="category_id" value="<?= $data['id']; ?>">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="<?= $data['name']; ?>" id="name"
                                    class="form-control" placeholder="Enter Category Name">
                            </div>
                            <div class="col-md-6">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" value="<?= $data['slug']; ?>" id="slug"
                                    class="form-control" placeholder="Enter Slug Name">
                            </div>
                            <div class="col-md-12">
                                <label for="description">Description</label>
                                <textarea rows="3" name="description" id="description" class="form-control"
                                    placeholder="Enter Description"><?= $data['description']; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" id="image" class="form-control"
                                    placeholder="Upload Image">
                                <label for="img">Current Image</label>
                                <input type="hidden" name="old_image" value="<?= $data['image'];?>" id="img">
                                <img src="../uploads/<?= $data['image'];?>" heigth="100px" width="100px"
                                    alt="<?= $data['name'];?>">
                            </div>
                            <div class="col-md-12">
                                <label for="meta-keywords">Meta Title</label>
                                <input type="text" name="meta_title" value="<?= $data['meta_title']; ?>" id="meta-title"
                                    class="form-control" placeholder="Enter Meta Title">
                            </div>
                            <div class="col-md-12">
                                <label for="meta-description">Meta Description</label>
                                <textarea rows="3" name="meta_description" id="meta-description" class="form-control"
                                    placeholder="Enter Meta Description"><?= $data['meta_description']; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="meta-keywords">Meta Keywords</label>
                                <input type="text" name="meta_keywords" value="<?= $data['meta_keywords']; ?>"
                                    id="meta-keywords" class="form-control" placeholder="Enter Meta Keywords">
                            </div>
                            <div class="col-md-6">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" <?= $data['status'] ? "checked":""; ?> id="status">
                            </div>
                            <div class="col-md-6">
                                <label for="popular">Popular</label>
                                <input type="checkbox" name="popular" <?= $data['popular'] ? "checked":""; ?>
                                    id="popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
                    }
                    else
                    {
                        echo "Category Not Found";
                    }
                }
                else
                {
                    echo "Something Went Wrong ID is missing";
                }
            ?>

        </div>
    </div>
</div>

<?php
    include './includes/footer.php';
?>