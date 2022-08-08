<?php include "core/auth.php"; ?>
<?php include "template/header.php"; ?>
<?php
$id = $_GET['id'];
$table = $_GET['table'];
$current = ads_list($table, $id);
?>
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/ads_list.php">Ads Manager</a></li>
                <li class="breadcrumb-item active" aria-current="page">Section One Edit</li>
            </ol>
        </nav>
    </div>
</div>
<?php
if (isset($_POST['updateAdsOne'])) {
    ads_update('one', $id);
    linkTo('ads_list.php');
}
?>
<div class="row col-12">
    <div class="col-md-6">
        <form method="post">
            <div class="">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0 text-primary">
                                <i class=" feather-plus-circle me-1"></i>Edit Ads
                            </h4>
                            <h4 class="text-primary">
                                For Section One
                            </h4>
                        </div>
                        <hr>
                        <input type="hidden" name="id" value="<?php echo $current['id'] ?>">
                        <div class=" form-group mb-2">
                            <label class="mb-1">Owner Name</label>
                            <input type="text" name="owner_name_one" value="<?php echo $current['owner_name_one'] ?>" class="form-control" required>
                        </div>
                        <div class=" form-group mb-2">
                            <label class="mb-1">Photo Link</label>
                            <input type="text" name="photo_link_one" value="<?php echo $current['photo_one'] ?>" class="form-control" required>
                        </div>
                        <div class=" form-group mb-2">
                            <label class="mb-1">Link</label>
                            <input type="text" name="link_one" value="<?php echo $current['link_one'] ?>" class="form-control" required>
                        </div>
                        <div class=" form-group mb-2 d-flex">
                            <div class="w-50 me-1">
                                <label class="mb-1">Start Date</label>
                                <input type="date" name="start_one" value="<?php echo $current['start_one'] ?>" class="form-control" required>
                            </div>
                            <div class="w-50 ms-1">
                                <label class="mb-1">End Date</label>
                                <input type="date" name="end_one" value="<?php echo $current['end_one'] ?>" class="form-control" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" name="updateAdsOne" onclick="return confirm('Are you sure to update this?')">Update Ads</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include "template/footer.php"; ?>