<?php include "core/auth.php"; ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Ads</li>
            </ol>
        </nav>
    </div>
</div>
<?php
if (isset($_POST['addAdsOne'])) {
    ads_one_add();
}
if (isset($_POST['addAdsTwo'])) {
    ads_two_add();
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
                                <i class=" feather-plus-circle me-1"></i>Add Ads
                            </h4>
                            <h4 class="text-primary">
                                For Section One
                            </h4>
                        </div>
                        <hr>
                        <div class=" form-group mb-2">
                            <label class="mb-1">Owner Name</label>
                            <input type="text" name="owner_name_one" class="form-control" required>
                        </div>
                        <div class=" form-group mb-2">
                            <label class="mb-1">Photo Link</label>
                            <input type="text" name="photo_link_one" class="form-control" required>
                        </div>
                        <div class=" form-group mb-2">
                            <label class="mb-1">Link</label>
                            <input type="text" name="link_one" class="form-control" required>
                        </div>
                        <div class=" form-group mb-2 d-flex">
                            <div class="w-50 me-1">
                                <label class="mb-1">Start Date</label>
                                <input type="date" name="start_one" class="form-control" required>
                            </div>
                            <div class="w-50 ms-1">
                                <label class="mb-1">End Date</label>
                                <input type="date" name="end_one" class="form-control" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" name="addAdsOne">Add Ads</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form method="post">
            <div class="">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0 text-primary">
                                <i class=" feather-plus-circle me-1"></i>Add Ads
                            </h4>
                            <h4 class="text-primary">
                                For Section Two
                            </h4>
                        </div>
                        <hr>
                        <div class=" form-group mb-2">
                            <label class="mb-1">Owner Name</label>
                            <input type="text" name="owner_name_two" class="form-control" required>
                        </div>
                        <div class=" form-group mb-2">
                            <label class="mb-1">Photo Link</label>
                            <input type="text" name="photo_link_two" class="form-control" required>
                        </div>
                        <div class=" form-group mb-2">
                            <label class="mb-1">Link</label>
                            <input type="text" name="link_two" class="form-control" required>
                        </div>
                        <div class=" form-group mb-2 d-flex">
                            <div class="w-50 me-1">
                                <label class="mb-1">Start Date</label>
                                <input type="date" name="start_two" class="form-control" required>
                            </div>
                            <div class="w-50 ms-1">
                                <label class="mb-1">End Date</label>
                                <input type="date" name="end_two" class="form-control" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" name="addAdsTwo">Add Ads</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 mt-4">
        <div class="card mb-4 col-xl-12">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-primary">
                        <i class=" feather-list me-1"></i>Section One Ads
                    </h4>
                    <div class="">
                        <a href="#" class="btn btn-outline-secondary maximizeBtn">
                            <i class=" feather-maximize-2"></i>
                        </a>
                    </div>
                </div>
                <hr>
                <table class=" table table-hover mt-3 mb-0 table-bordered">
                    <thead>
                        <th class="text-nowrap">Owner Name</th>
                        <th>Photo Link</th>
                        <th>Link</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Control</th>
                        <th class="text-nowrap">Created at</th>
                    </thead>
                    <tbody>
                        <?php foreach (ads_all('ads_one') as $a) { ?>
                            <tr>
                                <td class=" text-capitalize"><?php echo $a['owner_name_one'] ?></td>
                                <td><?php echo short($a['photo_one']) ?></td>
                                <td><?php echo short($a['link_one'],'30') ?></td>
                                <td class="text-nowrap"><?php echo $a['start_one'] ?></td>
                                <td class="text-nowrap"><?php echo $a['end_one'] ?></td>
                                <td class="text-nowrap">
                                    <a href="ads_delete.php?id=<?php echo $a['id']?>&table=ads_one" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete this?')">
                                        <i class=" feather-trash"></i>
                                    </a>
                                    <a href="ads_edit_one.php?id=<?php echo $a['id']?>&table=ads_one" class="btn btn-outline-warning">
                                        <i class=" feather-edit"></i>
                                    </a>
                                </td>
                                <td class="text-nowrap"><?php echo showtime($a['created_at']) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mb-4 col-xl-12">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-primary">
                        <i class=" feather-list me-1"></i>Section Two Ads
                    </h4>
                    <div class="">
                        <a href="#" class="btn btn-outline-secondary maximizeBtn">
                            <i class=" feather-maximize-2"></i>
                        </a>
                    </div>
                </div>
                <hr>
                <table class=" table table-hover mt-3 mb-0 table-bordered">
                    <thead>
                        <th class="text-nowrap">Owner Name</th>
                        <th>Photo Link</th>
                        <th>Link</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Control</th>
                        <th class="text-nowrap">Created at</th>
                    </thead>
                    <tbody>
                        <?php foreach (ads_all('ads_two') as $a) { ?>
                            <tr>
                                <td class=" text-capitalize"><?php echo $a['owner_name_two'] ?></td>
                                <td><?php echo short($a['photo_two']) ?></td>
                                <td><?php echo short($a['link_two']) ?></td>
                                <td class="text-nowrap"><?php echo $a['start_two'] ?></td>
                                <td class="text-nowrap"><?php echo $a['end_two'] ?></td>
                                <td class="text-nowrap">
                                    <a href="ads_delete.php?id=<?php echo $a['id']?>&table=ads_two" class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete this?')">
                                        <i class=" feather-trash"></i>
                                    </a>
                                    <a href="ads_edit_two.php?id=<?php echo $a['id']?>&table=ads_two" class="btn btn-outline-warning">
                                        <i class=" feather-edit"></i>
                                    </a>
                                </td>
                                <td class="text-nowrap"><?php echo showtime($a['created_at']) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "template/footer.php"; ?>