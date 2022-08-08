<?php require_once "core/auth.php"; ?>
<?php require_once "core/is_editor&admin.php";?>
<?php require_once "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/item_list.php">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4 col-xl-8">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-primary">
                        <i class=" feather-layers me-1"></i> Category Manager
                    </h4>
                    <a href="<?php echo $url; ?>/item_list.php" class="btn btn-outline-primary">
                        <i class=" feather-list"></i>
                    </a>
                </div>
                <hr>
                <?php 
                    if(isset($_POST['addcart'])){
                        category_add();
                    }
                ?>
                <form method="post">
                    <div class=" form-check-inline d-flex">
                        <input type="text" class="form-control w-50 me-2" name="title">
                        <button class="btn btn-primary" name="addcart">Add Category</button>
                    </div>
                </form>
                <?php include "category_list.php"?>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
