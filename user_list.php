<?php include "core/auth.php"; ?>
<?php include "core/is_admin.php" ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo $url ?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4 col-xl-12">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 text-primary">
                        <i class=" feather-users me-1"></i>Users List
                    </h4>
                    <a href="#" class="btn btn-outline-secondary maximizeBtn">
                        <i class=" feather-maximize-2"></i>
                    </a>
                </div>
                <hr>
                <table class=" table table-hover mt-3 mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Viewed Posts</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (users() as $c) {
                        ?>
                            <tr>
                                <td><?php echo $c['id'] ?></td>
                                <td><?php echo $c['name'] ?></td>
                                <td><?php echo $c['email'] ?></td>
                                <td><?php echo $role[$c['role']] ?></td>
                                <td>
                                    <?php echo count(viewer_count_by_user($c['id']));?>
                                    <?php if(count(viewer_count_by_user($c['id']))!=0){?>
                                        <a href="post_viewed_by_user.php?id=<?php echo $c['id']?>" class=" btn btn-sm btn-outline-info ms-2">
                                        <i class=" feather-info"></i>
                                    </a>
                                    <?php } ?>
                                </td>
                                <td>

                                </td>
                                <td><?php echo showtime($c['created_at']) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
<script>
    $('.table').dataTable({
        "order": [0, 'desc']
    });
</script>