<?php include "core/auth.php"; ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/post_list.php">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Post</li>
            </ol>
        </nav>
    </div>
</div>
<?php
    if (isset($_POST['addpost'])) {
        post_add();
    }
?>
<form class="row" method="post">
    <div class=" mb-4 col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-primary">
                        <i class=" feather-plus-circle me-1"></i>Create New Post
                    </h4>
                    <a href="<?php echo $url; ?>/post_list.php" class="btn btn-outline-primary">
                        <i class=" feather-list"></i>
                    </a>
                </div>
                <hr>
                <div class=" form-group mb-2">
                    <label class="mb-1">Post Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class=" form-group">
                    <label class="mb-1">Post Description</label>
                    <textarea type="text" name="description" rows="15" class="form-control" id="description" required></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class=" col-12 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-primary">
                        <i class=" feather-layers me-1"></i>Select Category
                    </h4>
                    <a href="<?php echo $url; ?>/category_add.php" class="btn btn-outline-primary">
                        <i class=" feather-list"></i>
                    </a>
                </div>
                <hr>
                <div class=" form-group mb-2">
                    <label class="mb-1">Select Category</label>
                    <?php foreach (categories() as $c) { ?>
                        <div class="form-check">
                            <input value="<?php echo $c['id'] ?>" name="category_id" class="form-check-input" type="radio" id="flexRadioDefault<?php echo $c['id'] ?>">
                            <label class="form-check-label" for="flexRadioDefault<?php echo $c['id'] ?>">
                                <?php echo $c['title'] ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>
                <button class="btn btn-primary" name="addpost">Add Post</button>
            </div>
        </div>
    </div>
</form>

<?php include "template/footer.php"; ?>
<script>
    $('#description').summernote({
        placeholder: 'Hello',
        tabsize: 2,
        height: 500
    });
</script>